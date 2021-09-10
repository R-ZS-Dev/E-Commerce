<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/imghover.css">
	<style>
		/**{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		.main-wrapper{
			min-height: 100vh;
			padding: 3rem 1rem;
		}
		.container{
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 1rem;
		}
		.product{
			background-color: #fff;
			border-radius: 0.4rem;
			overflow: hidden;
			box-shadow: 0 6px 12px -7px rgba(171, 171, 171, 1);
			transition: box-shadow 0.4s ease-out;
			position: relative;
		}
		.product:hover{
			box-shadow: 0 10px 12px -7px rgba(171, 171, 171, 1);
		}
		.product-img img{
			width: 100%;
		}
		.product-img .rear-img{
			opacity: 0;
			position: absolute;
			top: 0;
			left: 0;
			z-index: -1;
			transition: opacity 0.4s ease-out;
		}
		.product:hover .rear-img{
			opacity: 1;
			z-index: 0;
		}
		.product-info{
			padding: 1.2rem 1.2rem 2rem;
			text-align: center;
		}
		.product-info div{
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-bottom: 1rem;
		}
		.product-name{
			font-weight: 600;
			font-size: 1.1rem;
		}
		.product-price{
			color: #868686;
		}
		.product-btn{
			background-color: #f62f5e;
			color: #fff;
			text-decoration: none;
			font-weight: 300;
			padding: 0.5rem 1.8rem;
			border-radius: 1.2rem;
			transition: background-color 0.5s ease-out;
		}
		.product-btn:hover{
			background-color: #f50e45;
		}
		.product-grid{
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			align-items: center;
			justify-content: center;
			gap: 1.4rem;
		}*/
	</style>
</head>
<body>
	<div class="main-wrapper">
		<div class="container">
			<div class="title">
				<p class="text-center">New In</p>
			</div>
			<div class="product-grid">
				<?php  $q="SELECT *, (SELECT name FROM menu WHERE id=product.menu_id) AS menu_name, (SELECT category_name FROM category WHERE id=product.category_id) AS category_name FROM product LIMIT 4"; $pr=$conn->query($q); ?>
				<?php while ($rr=$pr->fetch_array()) { ?>
				<a href="product.php?p_id=<?php echo $rr["id"] ?>"><div class="product">
					<div class="product-img">
						<img src="upload/product/<?php echo $rr['img1'] ?>" >
						<img src="upload/product/<?php echo $rr['img2'] ?>" class="rear-img">
					</div>
					<div class="product-info">
						<div>
							<span class="product-name"><?php echo $rr['title'] ?></span>
							<span class="product-price">$ <?php echo $rr['price'] ?></span>
						</div>
						<!-- <a href="#" class="product-btn text-white">Buy Now</a> -->
					</div>
				</div></a>
			<?php } ?>
			</div>
		</div>
	</div>

</body>
</html>