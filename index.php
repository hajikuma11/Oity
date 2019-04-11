<html>
<head>
<meta charset='utf-8'>
</head>
<title>HTML5</title>
<body>
<canvas id='canvas'>
</canvas>
<script>
startX=0;
startY=0;
mousedown=false;
window.onload=function(){
	canvas=$('canvas');
	expandCanvas();
	}


function expandCanvas(){
    var b = document.body;
    var d = document.documentElement;
    canvas.width = Math.max(b.clientWidth , b.scrollWidth, d.scrollWidth, d.clientWidth);
    canvas.height = Math.max(b.clientHeight , b.scrollHeight, d.scrollHeight, d.clientHeight);
}


canvas.onmousedown
	= function(e){
		startX=e.pageX;
		startY=e.pageY;
		mousedown=true;
		console.log(startX,startY);
		}

canvas.onmousemove
	= function(e){
			if(mousedown){
			draw(e.pageX,e.pageY);
			}
canvas.onmouseup
	=function(e){
		mousedown=false;
	}
}


function draw(x,y){
	var target=$("canvas");
	var context=target.getContext('2d');
	context.beginPath();
	context.moveTo(startX,startY);
	context.lineTo(x,y);
	context.closePath();
	context.stroke();
	startX=x;
	startY=y;
	}

		
function $(id){
	return document.getElementById(id);
}


</script>
</body>
</html>
