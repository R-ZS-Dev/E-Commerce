<?php include "include/db.php" ?>
<?php 
if (!isset($_GET['menu_id']) && !isset($_GET['category_id'])) {
	echo "<script>window.location='index.php'</script>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include "include/meta.php" ?>
	<?php include "include/css.php" ?>
	<?php include "include/title.php" ?>
	<link rel="stylesheet" type="text/css" href="assets/css/imghover.css">

</head>
<body>
	<?php include "include/navbar.php" ?>

	<div class="row">
		
		<div class="col-2">
			<div style="margin-left: 45px;">

		<p><b>Filters</b></p>

		<!-- Left side Menu category names Start-->
		<p>
			<?php 
			$menu_id=$_GET['menu_id']; 
			$category_id=$_GET['category_id']; 
			$m=$conn->query("SELECT * FROM category WHERE menu_id='$menu_id'"); ?>
            <?php while ($rm=$m->fetch_array()) { ?>
        	<a class="text-dark" href="category.php?category_id=<?php echo $rm['id'] ?>&menu_id=<?php echo $_GET['menu_id'] ?>"><?php echo $rm['category_name'] ?></a>
        </p>
    		<?php } ?>  
        <!-- Left side Menu category names End-->
    </div>
		</div>

		
		<div class="col-10">
			<div class="main-wrapper">
		<div class="container">
			<div class="title">
				<p class="text-center">New In</p>
			</div>
			<div class="product-grid">
				<?php   $q="SELECT *, (SELECT name FROM menu WHERE id=product.menu_id) AS menu_name, (SELECT category_name FROM category WHERE id=product.category_id) AS category_name FROM product WHERE menu_id='$menu_id' AND category_id='$category_id' "; $pr=$conn->query($q); ?>
				<?php while ($rr=$pr->fetch_array()) { ?>
				<div class="product">
					<div class="product-img">
						<a href="product.php?p_id=<?php echo $rr['id'] ?>">
							<img src="upload/product/<?php echo $rr['img1'] ?>" >
							<img src="upload/product/<?php echo $rr['img2'] ?>" class="rear-img">
						</a>
					</div>
					<div class="product-info">
						<div>
							<span class="product-name"><?php echo $rr['title'] ?></span>
							<span class="product-price">$ <?php echo $rr['price'] ?></span>
						</div>
						<!-- <a href="#" class="product-btn text-white">Buy Now</a> -->
					</div>
				</div>
			<?php } ?>
				
				
			</div>
		</div>
	</div>
		</div>
	</div>



	<?php include 'include/footer.php'; ?>
	<?php include "include/js.php" ?>
</body>
</html>