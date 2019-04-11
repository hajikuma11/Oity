<html>
<head>
<meta charset='utf-8'>
</head>
<title>HTML5</title>
<body>
<canvas id="canvas" width="640px" height="480px">残念ながらHTML5に対応していません</canvas>
<script>
/canvasの読み込み設定
<pre class="lang:js decode:true " title="javascript-canvas" >
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");

//マウスを操作する
var mouse = {x:0,y:0,x1:0,y1:0,color:"black"};
var draw = false;

//マウスの座標を取得する
canvas.addEventListener("mousemove",function(e) {
  var rect = e.target.getBoundingClientRect();
  ctx.lineWidth = document.getElementById("lineWidth").value;
	ctx.globalAlpha = document.getElementById("alpha").value/100;

  mouseX = e.clientX - rect.left;
  mouseY = e.clientY - rect.top;


  //クリック状態なら描画をする
  if(draw === true) {
    ctx.beginPath();
    ctx.moveTo(mouseX1,mouseY1);
    ctx.lineTo(mouseX,mouseY);
    ctx.lineCap = "round";
    ctx.stroke();
    mouseX1 = mouseX;
    mouseY1 = mouseY;
  }
});

  //クリックしたら描画をOKの状態にする
  canvas.addEventListener("mousedown",function(e) {
    draw = true;
    mouseX1 = mouseX;
    mouseY1 = mouseY;
    undoImage = ctx.getImageData(0, 0,canvas.width,canvas.height);
});

//クリックを離したら、描画を終了する
canvas.addEventListener("mouseup", function(e){
  draw = false;
});</pre>
	
//スマホ用
	var finger=new Array;
	for(var i=0;i<10;i++){
		finger[i]={
			x:0,y:0,x1:0,y1:0,
			color:"rgb("
			+Math.floor(Math.random()*16)*15+","
			+Math.floor(Math.random()*16)*15+","
			+Math.floor(Math.random()*16)*15
			+")"
		};
	}

	//タッチした瞬間座標を取得
	canvas.addEventListener("touchstart",function(e){
		e.preventDefault();
		var rect = e.target.getBoundingClientRect();
		ctx.lineWidth = document.getElementById("lineWidth").value;
		ctx.globalAlpha = document.getElementById("alpha").value/100;
		undoImage = ctx.getImageData(0, 0,canvas.width,canvas.height);
		for(var i=0;i<finger.length;i++){
			finger[i].x1 = e.touches[i].clientX-rect.left;
			finger[i].y1 = e.touches[i].clientY-rect.top;



		}
	});

	//タッチして動き出したら描画
	canvas.addEventListener("touchmove",function(e){
		e.preventDefault();
		var rect = e.target.getBoundingClientRect();
		for(var i=0;i<finger.length;i++){
			finger[i].x = e.touches[i].clientX-rect.left;
			finger[i].y = e.touches[i].clientY-rect.top;
			ctx.beginPath();
			ctx.moveTo(finger[i].x1,finger[i].y1);
			ctx.lineTo(finger[i].x,finger[i].y);
			ctx.lineCap="round";
			ctx.stroke();
			finger[i].x1=finger[i].x;
			finger[i].y1=finger[i].y;

		}
	});

	//線の太さの値を変える
lineWidth.addEventListener("touchmove",function(){
var lineNum = document.getElementById("lineWidth").value;
document.getElementById("lineNum").innerHTML = lineNum;
});

//透明度の値を変える
alpha.addEventListener("touchmove",function(){
var alphaNum = document.getElementById("alpha").value;
document.getElementById("alphaNum").innerHTML = alphaNum;
});
</script>
</body>
</html>
