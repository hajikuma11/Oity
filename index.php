<html>
<head>
<meta charset='utf-8'>
</head>
<title>HTML5</title>
<body>
<canvas width="300" height="300"></canvas>

<script>
var a = document.querySelector("canvas"),
    c = a.getContext("2d");

a.ontouchstart = function (e) {
  e.preventDefault();
  c.moveTo(e.touches[0].pageX, e.touches[0].pageY);
};

a.ontouchmove = function (e) {
  c.lineTo(e.touches[0].pageX, e.touches[0].pageY);
  c.stroke();
};

</script>
</body>
</html>
