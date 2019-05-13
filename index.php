<!DOCTYPE html>
<html>
<head>
<title>Test</title>

<?php
$userID = 'U59e8d04370fd44f663dd5045f0c4ee1b';

 $set = 'mysql:host=mysql1017.db.sakura.ne.jp;dbname=oity_data;charset=utf8';
 $user = 'oity';
 $password = '1999-1111';
 try {
     $dbh = new PDO($set,$user,$password);
 } catch (PDOException $e) {
     echo 'Can not access database!!';
     exit;
}


$sql = "SELECT EXISTS(SELECT * FROM user_data WHERE userid = '".$userID."')";

        $stmt = $dbh->query($sql);

        foreach ($stmt as $row) {
            $result = $row[0];
        }
echo $result;

?>

</head>
  
<body>
</body>
</html>