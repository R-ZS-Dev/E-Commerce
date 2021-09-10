<?php include 'include/db.php'; ?>
<?php include 'include/session.php'; ?>
<?php 
	//if (!isset($_GET['admins'])) {
	//echo "<script>window.location='index.php'</script>";
	// } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include "include/meta.php" ?>
	<?php include "include/css.php" ?>
	<?php include "include/title.php" ?>
	<link rel="stylesheet" type="text/css" href="assets/css/product.css">
	<title></title>
</head>
<body>
	<?php include "include/navbar.php" ?>

	<?php 
					if(isset($_POST['addtocart'])){
						$transactionno = "pending";
						$qty = $_POST['quantity'];
						$proid = $_POST['product_id'];
						$size = $_POST['sizes'];
						$pric = $_POST['price'];
						$usrid = $_SESSION['admins'];
						// Below 6 lines code are use for don't add to cart same id product
						$cart = "SELECT * FROM add_cart WHERE product_id = $proid AND user_id='$usrid'";
						$result = $conn->query($cart);
						$row=$result->num_rows;
						if ($row > 0) {
							echo "already add";
						}else{
							$qq="insert into add_cart (transaction_number, quantitys, product_id, sizes, price, user_id) values ('$transactionno', '$qty', '$proid', '$size', '$pric', '$usrid')";

						$insert = $conn->query($qq);
						if ($insert) {
						echo "<script>window.location='product.php?p_id=$proid&res=Successfully Add to cart'</script>";
							}
						else{
						echo "<script>window.location='product.php?p_id=$proid&res=try again for Cart'</script>";
							}
						}
					} 
				?>
	<!-- Image Portation on page product Start -->

					
	<div class="row">
		<div class="col-1"></div>
		<div class="col-2">
		<div class="row">
			<?php
				$pid=$_GET["p_id"];
				$q=$conn->query("SELECT * FROM product WHERE id='$pid'");
				$rr=$q->fetch_array();
	 		?>
	 <div class="col-12">
				<br>
				<img src="upload/product/<?php echo $rr['img1'] ?>" class="getImgSrc" style="width: 110px; height: 150px;" >
			</div>
			<div class="col-12">
				<br>
				<img src="upload/product/<?php echo $rr['img2'] ?>" class="getImgSrc" style="width: 110px; height: 150px;" >
			</div>
			<?php
				$qt=$conn->query("SELECT * FROM  product_img WHERE product_id='$pid'");
				while($rrt=$qt->fetch_array()) { 
			?>
			
			<div class="col-12">
				<br>
				<img src="upload/product/<?php echo $rrt['img'] ?>" class="getImgSrc" style="width: 110px; height: 150px;" >
			</div>
			<?php } ?>
			
		</div>
	</div>
	<!-- Image Portation on page product End -->

		
		<div class="col-4">
		<br>
			<img src="upload/product/<?php echo $rr['img1'] ?>" class="remImgSrc" style="width: 100%; height: 670px;" >
			<div class="useImgSrc"></div>
		</div>

	
		<div class="col-4">
			<div class="container"><br>

				<div class="Detail">
					<?php if (isset($_GET['res'])): ?>
						<h5 class="alert alert-success  text-center"><?php echo $_GET['res'] ?></h5>
					<?php endif ?>
					<p style="font-size: 23px;"><?php echo $rr['title']?></p>
					<p>Price: $ <?php echo $rr['price']?></p>
					<hr class="new1">

					<h6>Product Details:</h6>
					<ul>
						<li><?php echo $rr['detail'] ?></li>
					</ul>

					<a><b>Color: </b><?php echo $rr['color'] ?></a><br>
					<a><b>Length: </b><?php echo $rr['length'] ?></a><br>
					<a><b>Model Wearing Size: </b>XS</a><br><br>
 				

				</div>
				<form action="" method="post">
				<select class="form-control" name="sizes">
					<option value="XXS">XXS</option>
					<option value="XS">XS</option>
					<option value="S">S</option>
					<option value="M">M</option>
					<option value="L">L</option>
					<option value="XL">XL</option>
					<option value="2XL">2XL</option>
					<option value="3XL">3XL</option>
					<option><a href="#">Size Chart</a></option>
				</select><br>

	<!-- Quantity Plus Minus HTML CODE Start -->
	
		<input type="hidden" name="product_id" value="<?php echo $_GET['p_id'] ?>">
		<input type="hidden" name="price" value="<?php echo $rr['price'] ?>">
		
		<div class="quantity">
        	<button class="btn minus-btn disabled" type="button">-</button>
        	<input  type="text" name="quantity" id="quantity" value="1">
        	<button class="btn plus-btn" type="button">+</button>
    	</div><br>
	<!-- Quantity Plus Minus HTML CODE End -->
			
				<br>
				<!-- START MODAL -->
<div class="box1 form-control">
					
					<button type="submit" name="addtocart" style="border: none; background-color: #fff;" >ADD TO CAkRT</button>

					<!-- <div class="content1" data-toggle="modal" data-target="#myModal"></div> -->
					</div>
					</form>
				<div class="containers">
					
			</div>
			<br>
				<!-- <div class="box1 form-control">
				<button style="border: none; background-color: #fff;">BUY IT NOW</button>
					<a href="ship.php?p_id=<?php echo $rr['id'] ?>"><div class="content1"></div></a>
				</div> -->
		</div>
	</div>
				<!-- END MODAL -->


			</div>
		</div>
	</div>

	<br><br>
	<hr class="new2">	

	<?php include 'include/footer.php'; ?>
	<?php include "include/js.php" ?>


	<!-- Quantity Plus Minus JS CODE Start -->
	<script>
    			document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

    			var valueCount;

    			document.querySelector(".plus-btn").addEventListener("click", function() {
            	//getting value of input
            	valueCount = document.getElementById("quantity").value;

           		 //input value increment by 1
           		 valueCount++;

           		 //setting increment input value
           		 document.getElementById("quantity").value = valueCount;

           		 if (valueCount > 1) {
                document.querySelector(".minus-btn").removeAttribute("disabled");
                document.querySelector(".minus-btn").classList.remove("disabled")
           			 }
           		})

           		document.querySelector(".minus-btn").addEventListener("click", function() {
            	//getting value of input
            	valueCount = document.getElementById("quantity").value;

           		 //input value increment by 1
           		 valueCount--;

           		 //setting increment input value
           		 document.getElementById("quantity").value = valueCount;
    		
           		 if (valueCount == 1) {
                document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
            	}
            })
    		</script>
	<!-- Quantity Plus Minus JS CODE END -->

	<!-- Left Image Move In Picture-Box START -->
	<script type="text/javascript">
	$(document).ready(function(){
		// alert("dfd");
		// mouseover is use for move the cursor on the image box than it will display on the box NO NEED to click & display
		$(".getImgSrc").mouseover(function(){
			var imgSrc=$(this).attr('src');
			$(".remImgSrc").hide();
			$(".useImgSrc").html('<img src="'+imgSrc+'" class="useImgSrc" style="width: 100%; height: 670px;" >');
		});
		});
	</script>
	<!-- Left Image Move In Picture-Box END-->



</body>
</html>