<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		body{
  margin: 0px;
  padding: 0;
  height: 100vh;
}
.containerss{
  position: relative;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
ul{
  margin: 0 0 40px;
  padding: 0;
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: flex-end;
}
ul li{
  list-style: none;
  margin: 0 0 70px;
}
ul li .slides{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: transform 0.5s;
  transform: rotateY(90deg);
  transform-origin: left;
}
ul li input[type="radio"]{
	position: relative;
	z-index: 1;
	height: 0px;
	width: 0px;
	}
	ul li input[type="radio"]:checked ~ .slides{
		transition: transform 0.5s;
 		transform: rotateY(0deg);
  		transform-origin: right;
	}
	ul li .slides img{
		object-fit: cover;
		position: absolute;
		top: 0;
		left: 0;
	}
	ul li input[type="radio"]:checked ~ .slides img{
		animation: animate 40s linear infinite;
	}
	@keyframes animate{
		0%
		{
			transform: scale(1);
		}
		50%
		{
			transform: scale(1.5);
		}
		100%
		{
			transform: scale(1);
		}
	}
	</style>
</head>
<body>
	<div class="containerss">
		<ul>
			<li>
				<input type="radio" checked="checked" name="slides">
				<div class="slides">
					<img src="assets/img/women.jpg">
				</div>
			</li>
 		</ul>
	</div>
</body>
</html>