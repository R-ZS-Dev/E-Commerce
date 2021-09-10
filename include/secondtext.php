<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		hr.new1 {
  			border-top: 1px solid LightGray;
			}

		.box1{
			width: 250px;
			height: 57px;
			position: relative;
			overflow: hidden;
			border: 1px solid black;
			text-align: center;  
			padding-top: 16px; 

			margin-top: 50px;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		
		.content1{
			color: #fff;
			background: rgba(0, 0, 0, 0.3);
			position: absolute;
			top: 0;
			left: -100%;
			height: 100%;
			width: 100%;
			padding: 20px;
			box-sizing: border-box;
			transition: all 0.5s;
		}
		.box1:hover .content1{
			left: 0;
		}
	</style>
</head>
<body>
<hr class="new1">

<p class="text-center" style="font-size: 25px;">STYLE - COMFORT - BUDGET FRIENDLY</p><br>
<p class="text-center">From 90s trends to comfy street wear, Power suits to <br> minimalist tops, 999 has it all. </p>

	<div class="box1">
		<button class="a" style=" background-color: Transparent; font-size: 18px;   border: 0px ;">VIEW ALL PRODUCTS</button>
			<div class="content1">
			</div>
	</div><br>
</body>
</html>