<?php

class Weather{
    private $city;
    private $info;
 
    public function __construct($city){ //コンストラクタ
        $this->city = $city;
        $this->info = $this->GetWeather();
    }
 
    private function FtoC($f){ // 華氏→摂氏変換
        return round(($f - 32) * 0.555, 1);
    }
 
    private function Translation($weather){ //翻訳
        switch ($weather) {
            case 'Sunny':
            case 'Clear':
            case 'Mostly Sunny':
            case 'Mostly Clear':
                $weather=" 晴れ ";
                break;
            case 'Partly Cloudy':
            case 'Mostly Cloudy':
                $weather=" 晴れときどき曇り ";
                break;
            case 'Cloudy':
                $weather=" 曇り ";
                break;
            case 'Breezy':
                $weather=" そよ風 ";
                break;
            case 'Windy':
                $weather=" 風が強い ";
                break;
            case 'Scattered Showers':
            case 'Showers':
            case 'Rain':
            case 'Thunderstorms':
            case 'Scattered Thunderstorms':
                $weather=" 雨 ";
                break;
        }
        return $weather;
    }
 
    private function GetWeather(){ //天気情報取得
        return json_decode(file_get_contents(
            'https://query.yahooapis.com/v1/public/yql?q=select%09*%20from%20%09weather.forecast%20%20where%20%09woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22'
            . $this->city
            . '%2C%20jp%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys'
            ))->query->results->channel->item;
    }
 
    public function GetCondition(){ //現在の天気
        $now = [
            'weather' => $this->Translation($this->info->condition->text)
            , 'temp'  => $this->FtoC($this->info->condition->temp)
        ];
        return $now;
    }
 
    public function GetToday(){ //今日の天気
        $today = [
            'weather' => $this->Translation($this->info->forecast[0]->text)
            , 'high'  => $this->FtoC($this->info->forecast[0]->high)
            , 'low'   => $this->FtoC($this->info->forecast[0]->low)
        ];
        return $today;
    }
 
    public function GetTomorrow(){ //明日の天気
        $tomorrow = [
            'weather' => $this->Translation($this->info->forecast[1]->text)
            , 'high'  => $this->FtoC($this->info->forecast[1]->high)
            , 'low'   => $this->FtoC($this->info->forecast[1]->low)
        ];
        return $tomorrow;
    }
}

$accessToken = 'HjUjwJORNXxUyK/BJ3zw5+IVAnZ9lOcUHkgTxN7FGECcmS3jnIAndMcuUfW5qpazytxUVR62hXsqpv00JeXU9kjw9WLqesWYATfEmXabOoEt/FeYJPk2d4UJstPKwrlvRfdRHVpiucEX3K1n17qYDAdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

// 送られてきたメッセージの中身からレスポンスのタイプを選択
if ($message->{"text"} == '天気') {
    
    $time = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
 
    $weather  = new Weather('nagareyama');
    $now    = $weather->GetCondition();
    $today   = $weather->GetToday();
    
     $messageData = [
        'type' => 'text',
        'text' => '$time->format('m/d H:i')
          ')'
           PHP_EOL
           ' 現在における運河の天気は'
           PHP_EOL
          '  '
           $now['weather']
           '('
           $now['temp']
           '℃)'
           PHP_EOL
           'です。'
           PHP_EOL
           '今日の天気は'
           PHP_EOL
          '  '
           $today["weather"]
           'で,'
           PHP_EOL
          ' 　 '
           '最高気温は'
           $today['high']
           '℃, 最低気温は'
           $today['low']
           '℃'
           PHP_EOL
          'でしょう。'
    ];
}

$response = [
    'replyToken' => $replyToken,
    'messages' => [$messageData]
];
error_log(json_encode($response));

$ch = curl_init('https://api.line.me/v2/bot/message/reply');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
));
$result = curl_exec($ch);
error_log($result);
curl_close($ch);