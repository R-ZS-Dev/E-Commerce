<?php include 'include/session.php' ?>
<?php include 'include/db.php'; ?>
<?php 
if (isset($_GET['remove'])) {
  $add_cart_id=$_GET['add_cart_id'];
  $user_id=$_SESSION['admins'];
  $dell=$conn->query("DELETE FROM add_cart WHERE id='$add_cart_id' AND user_id='$user_id'");
  echo "<script>window.location='cart.php'</script>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include "include/meta.php" ?>
	<?php include "include/css.php" ?>
	<?php include "include/title.php" ?>
	<link rel="stylesheet" type="text/css" href="assets/css/cart.css">
	<style>
	
	/*.containers {
        display: flex;
      }
      .images img {
        max-width: 100%
      }
      .image {
        flex-basis: 25%
      }
      .text {
        font-size: 15px;
        padding-left: 15px;
      }
      .btns {
		    border: 1px solid #000;
		    width: 105px;
		    text-align: center;
		    align-items: center;
		    margin-top: 70px;
		}

		button {
		    border: 1px solid #000;
		    color: #000;
		    border-radius: 0;
		    background: #fff
		}

		input {
		    border: none;
		    text-align: center;
		    width: 20px;
		    color: #000;
		}*/

		/*BUTTON CSS Add to CarT & Add to Wish-List
		/*.box1{
			position: relative;
			overflow: hidden;
			text-align: center;  
			left: 50%;
			transform: translate(-50%, -50%);
			width: 150px;
		}
		
		.content1{
			color: #fff;
			background: rgba(0, 0, 0, 0.3);
			position: absolute;
			top: 0;
			left: -100%;
			height: 100%;
			width: 100%;
			box-sizing: border-box;
			transition: all 0.5s;
		}
		.box1:hover .content1{
			left: 0;
		}
		hr.new2 {
  				border-top: 1px solid black;
			}*/

	</style>
</head>
<body>
	<?php include "include/navbar.php" ?>

	<div class="container p-3">
							
		<p style="font-size: 25px;" >Cart</p>
							
		<div class="row ">
			<div class="col-7"><p>Product</p></div>
			<div class="col-1"><p>Quantity</p></div>
			<div class="col-4"><p style="float: right;">Total</p></div>
			<hr class="new2">
		</div>
								
		<div class="row">
			<?php
				$admin=$_SESSION['admins'];
        // below 1 line for show and calculate total price of items
				$totalPrice=0;
				$q=$conn->query("SELECT *, add_cart.id AS aid FROM add_cart LEFT JOIN product ON add_cart.product_id=product.id WHERE user_id=$admin AND add_cart.transaction_number = 'pending' ");
//above AND add_cart.transaction_number = 'pending' is use for show empty cart after user complete order it is a condition
				while($rr=$q->fetch_array()){
					// below 1 line for show and calculate total price of items
				$totalPrice +=($rr['quantitys']*$rr['price']);
	 		?>
			<div class="col-7">
				<div class="containers p-3">
					<div class="images">
						<img src="upload/product/<?php echo $rr['img1'] ?>" height="180px">
					</div>
					<div class="text">
						<p>Title: &emsp; <?php echo $rr['detail'] ?></p>
					    <p>Size: &emsp; <?php echo $rr['length'] ?></p>
					    <!-- Below show singlePrice item on webPage -->
					    <p>Price: &emsp; <span class="singlePrices<?php echo $rr['aid'] ?>"><?php echo $rr['price'] ?></span></p>
					    <!-- Below single item price * with qty -->
					    <p> <span class="showNetPrice<?php echo $rr['aid'] ?>">New Price: <?php echo $rr['price']*$rr['quantitys'] ?></span></p>
					</div>
				</div>
			</div>
		<div class="col-2">
			<div >
				<button style="border: 1px solid #000;" class="btn decreaseBtn" id="<?php echo $rr['aid'] ?>"  type="button">-</button>
				<input type="text" name="quantity" id="cquantity<?php echo $rr['aid'] ?>" value="<?php echo $rr['quantitys'] ?>">
				<button style="border: 1px solid #000;" class="btn increaseBtn" id="<?php echo $rr['aid'] ?>" type="button">+</button>
			</div><br>
				<a style="color: red;" href="?add_cart_id=<?php echo $rr['aid'] ?>&remove=1">Remove</a>
		</div>
	<?php } ?>
		<div class="col-2">
		</div>
		</div>
							
			<hr class="new2">
			<div class="row">
			<div class="col-6">
			  <span style="font-size: 20px;">Add Order Note</span><br>
				<textarea rows="3" cols="30" placeholder="How we can help you?"></textarea>
			</div>
			<div class="col-2"></div>
			<div class="col-4">
				<!-- below 1 line for show and calculate total price of items  id&php -->
				<span>Total: <span style="float:right;" id="totalPrice"><?php echo $totalPrice ?></span></span><br>
				<span style="font-size: 15px;">Shipping & taxes calculated at Checkout</span><br><br>
			<div class="box1 form-control">
				<button type="submit" style="border: none; background-color: #fff;" >CHECK-OUT</button>

			<a href="ship.php?p_id=<?php echo $_SESSION['admins'] ?>"><div class="content1"></div></a>
			</div><br>
			</div>
			</div>
			<br>
					
		
	</div>


	<?php include 'include/footer.php'; ?>
	<?php include "include/js.php" ?>

	<script>
        $(document).ready(function(){
        	// .increaseBtn use in html class name
          $(".increaseBtn").click(function(){
          	var id=$(this).attr('id');
          	var val=$("#cquantity"+id).val();
          	var newVal=parseInt(val)+1;
          	var singlePrice=$(".singlePrices"+id).text();
          	var netPrice=parseInt(singlePrice)*newVal;
          	// alert(id);
          	// alert(val);
          	// alert(newVal);
          	// alert(singlePrice);
          	// alert(netPrice);
          	$("#cquantity"+id).val(newVal);

          	$(".showNetPrice"+id).text("Net Price: : "+netPrice);
          	// below 6 lines are use for change the price values at the run time item-price * by qty on web page
          	$.ajax({
          		url : 'cartUpdate.php',
          		method: 'POST',
          		data: {id:id,qty:newVal},
          		success:function(d){
          			// below 1 line use for show and calculate total price of items run time
          			$("#totalPrice").html(d);
          		}
          	});
          });
          $(".decreaseBtn").click(function(){
        	// .decreaseBtn use in html class name
          	var id=$(this).attr('id');
          	var val=$("#cquantity"+id).val();
          	var newVal=parseInt(val) > 1 ? parseInt(val)-1 : parseInt(val);
          	var singlePrice=$(".singlePrices"+id).text();
          	var netPrice=parseInt(singlePrice)*newVal;
          	// alert(newVal);
          	$("#cquantity"+id).val(newVal);
          	$(".showNetPrice"+id).text("Net Price: : "+netPrice);
          	// below 6 lines are use for change the price values at the run time item-price * by qty on web page
          	$.ajax({
          		url : 'cartUpdate.php',
          		method: 'POST',
          		data: {id:id,qty:newVal},
          		success:function(d){
          			// below 1 line use for show and calculate total price of items run time
          			$("#totalPrice").html(d);
          		}
          	});
          });          
        });

                </script>
</body>
</html>