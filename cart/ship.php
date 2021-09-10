<?php 
     include 'include/session.php';
     if(!isset($_SESSION['admins'])){
     header("Location:login.php");  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php include "include/meta.php" ?>
	<?php include "include/css.php" ?>
	<?php include "include/title.php" ?>
	<link rel="stylesheet" type="text/css" href="assets/css/ship.css">
	<style>
		/*.containers{
	        display: flex;
	        padding-left: 30px;
      }
      	.images img {
        	height:  90px;
       		width: 70px;
       		border: 1px solid grey;
       		border-radius: 12px;
      }
      	.text {
        	font-size: 15px;
        	padding-left: 8px;
      }
      .new1 {
  				border-top: 1px solid black;
			}
		.pading{
			padding-left: 30px;
		}*/

	</style>
	
</head>
<body>
	<?php include "include/navbar.php" ?>
	<?php include 'include/db.php'; ?>
	<?php 
			if (isset($_POST['addinfo'])) {
			$mail = $_POST['email'];
			$fnam = $_POST['f_name'];
			$lnam = $_POST['l_name'];
			$padd = $_POST['p_address'];
			$oadd = $_POST['o_address'];
			$cntr = $_POST['country'];
			$pcode = $_POST['p_code'];
			$pnum = $_POST['p_number'];

// Below These 3 methods which are comment can use for enter data from another page by using index

			// $_SESSION['customerDetail']=[$mail,$fnam,$lnam,$padd,$oadd,$cntr,$pcode,$pnum];
			$_SESSION['customerDetail']=array($mail,$fnam,$lnam,$padd,$oadd,$cntr,$pcode,$pnum);
			// $_SESSION['customerDetail']=array('mail' => $mail, 'fnam' => $fnam, 'lnam' => $lnam, 'padd' => $padd, 'oadd' => $oadd, 'cntr' =>  $cntr,    'pcode' =>  $pcode, 'pnum' => $pnum);
			// $insert = $conn->query("INSERT INTO customer (user_id, email, f_name, l_name, p_address, o_address, country, p_code, p_number) values ('".$_SESSION["admins"]."', '$mail', '$fnam', '$lnam', '$padd', '$oadd', '$cntr', '$pcode', '$pnum')");
			// if ($insert) {
				echo "<script>window.location='ship2.php'</script>";
			// 	echo "Registered Successfully";
			// }
			// 	else{
			// 	echo "<script>window.location='ship2.php'</script>";
			// 	}
		}
	?>

	<div class="container">
		<div class="row">
		<div class="col-6">
		<h4 class="text-center">Nine Ninety Nine</h4>
		<h6 class="text-center">Heading</h6>
	<form action="" method="POST">	
	<div class="form-group">
    <label>Connection information</label>
    <input type="text" name="email" class="form-control" placeholder="Email">
  </div>
  <div class="row">
  <div class="col">
    <input type="text" name="f_name" class="form-control" placeholder="First name">
  </div>
  <div class="col">
    <input type="text" name="l_name" class="form-control" placeholder="Last name">
  </div>
</div><br>
  <div class="form-group">
    <input type="text" name="p_address" required="" class="form-control" placeholder="Address">
  </div>
  <div class="form-group">
    <input type="text" name="o_address" class="form-control" placeholder="Apartment, suite, etc (optional)">
  </div>
  <div class="row">
  <div class="col">
    <input type="text" name="country" class="form-control" placeholder="Country/region">
  </div>
  <div class="col">
    <input type="text" name="p_code" class="form-control" placeholder="Postal code">
  </div>
</div><br>
  <div class="form-group">
    <input type="number" name="p_number" required="" class="form-control" placeholder="Phone number">
  </div>
  <div class="form-check">
  		<input class="form-check-input" type="checkbox">
  		<label>Save this information for next time</label>
	</div><br>
	
	<button type="submit" class="btn btn-outline-secondary" name="addinfo">Continue to shipping</button>&emsp;
  <!-- <a href="ship2.php?p_id=<?php echo $_SESSION['admins'] ?>" ></a> -->
  <a href="cart.php" style="text-decoration: none">Return to cart</a>
</form>
	</div>
		<div class="col-6 p-4">   
  <?php
        $admin=$_SESSION['admins'];
        // for show and calculate total price of items
        $totalPrice=0;
        $shipping = 0;
        $q=$conn->query("SELECT *, add_cart.id AS aid FROM add_cart LEFT JOIN product ON add_cart.product_id=product.id WHERE user_id=$admin AND add_cart.transaction_number = 'pending' ");
        while($rr=$q->fetch_array()){
        // for show and calculate total price of items
        	$totalPrice +=($rr['quantitys']*$rr['price']);
        	$shipping +=(200*$rr['quantitys']);
      ?>  
      <div class="containers">
        <div class="images">
          <img src="upload/product/<?php echo $rr['img1'] ?>" height="180px">
        </div>
        <div class="text">
        	
          <span>Title: &emsp; <?php echo $rr['detail'] ?></span><br>
          <span>Item Price: &emsp; <?php echo $rr['price'] ?></span><br>
          <span>T-QTY: &emsp; <?php echo $rr['quantitys'] ?></span><br>
          <span class="showNetPrice<?php echo $rr['aid'] ?>">T-Item-Price: &emsp; <?php echo $rr['price']*$rr['quantitys'] ?> </span>
          
        </div>
      </div><br>
    <?php } ?>
			
			<hr class="new1">
				<div class="pading">
					<!-- <span>Subtotal: <span style="float:right;">?</span></span><br> -->
					<span>Shipping: <span style="float:right;"><?php echo $shipping ?></span></span>
				</div>
			<hr class="new1">
			<div class="pading">
				<!-- below 1 line for show and calculate total price of items  id&php -->
				<span>Total Item Price: <span style="float:right;"><?php echo $totalPrice ?></span></span>
			</div>

		</div>
	</div>
	</div>
	
<?php include 'include/footer.php'; ?>
	<?php include "include/js.php" ?>
</body>
</html>