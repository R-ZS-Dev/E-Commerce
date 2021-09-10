<?php 
     include 'include/db.php';
     include 'include/session.php';
     if(!isset($_SESSION['admins'])){
     header("Location:index.php");  
   }
 ?>
 <?php 
 // $customerDetail=$_SESSION['customerDetail'];
 // var_dump($customerDetail);
        if (isset($_POST['ordercomp'])) {
        $ship = $_POST['shipping'];
        $tpric = $_POST['t_price'];
        $customerDetail=$_SESSION['customerDetail'];
        //below line time funcation is use for create rand transcation number
         $time = time();
// These 3 methods are can use for enter data from another page by using index (use same database names) and then '$customerDetail[0]', 
        $r="INSERT INTO customer (transaction_number, user_id, shipping, t_price , email, f_name, l_name, p_address, o_address, country, p_code, p_number) values ('$time', '".$_SESSION["admins"]."', '$ship', '$tpric', '$customerDetail[0]', '$customerDetail[1]', '$customerDetail[2]', '$customerDetail[3]', '$customerDetail[4]', '$customerDetail[5]', '$customerDetail[6]', '$customerDetail[7]')";
        $insert = $conn->query($r);
        $dataup = $conn->query("UPDATE add_cart set transaction_number = '$time' where user_id='".$_SESSION["admins"]."' AND transaction_number = 'pending' ");
      if ($insert) {
        // echo "<script>window.location='index.php'</script>";
      }
        else{
        echo "<script>window.location='ship2.php'</script>";
        }
      }
  ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/ship2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
  <?php include "include/meta.php" ?>
  <?php include "include/css.php" ?>
  <?php include "include/title.php" ?>
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

	<div class="container">
		<div class="row">
		<div class="col-6">
		<h4 class="text-center">Nine Ninety Nine</h4>
		<h6 class="text-center">Heading</h6>
    <?php 
     $admin=$_SESSION['admins'];
     

// in this query item*qty & qty+item*shipping and show sum
        $add=$conn->query("SELECT *, SUM(200*(SELECT SUM(quantitys) FROM add_cart WHERE user_id='$admin' AND transaction_number='pending')) AS shippingCost, (SELECT SUM(quantitys*price) FROM add_cart WHERE user_id='$admin' AND transaction_number='pending') AS totalPrice FROM customer where id='".$_SESSION["admins"]."'"); 
        $show=$add->fetch_array();
        
      ?> 
	<form action="" method="POST">      
	  <div class="input-group">
      <div class="input-group-prepend">
        <span style="width:100px" class="btn btn-outline-secondary disabled">Contact</span>
        </div>
      <input type="text" name="p_number" value="<?php echo $show['p_number'] ?>" class="form-control">
<!--       <div class="input-group-append">
        <a class="btn btn-outline-secondary" href="?dataup=<?php echo $show['id'] ?>">Change</a>
      </div> -->
    </div>

    <div class="input-group">
      <div class="input-group-prepend">
        <span style="width:100px" class="btn btn-outline-secondary disabled">Ship to</span>
        </div>
      <input type="text" name="p_address" value="<?php echo $show['p_address'] ?>" class="form-control">
<!--       <div class="input-group-append">
        <a class="btn btn-outline-secondary" href="?dataup=<?php echo $show['id'] ?>">Change</a>
      </div> -->
    </div>
  <br>

  <p>Shipping Method</p>
    <div class="input-group input-group-lg">
      <div class="input-group-prepend">
      <span class="input-group-text form-control" style="height: 50px; width: 100px;">Standard</span>
    </div>
      <input type="text" disabled="" placeholder="Delivery By Hand" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
    </div>
      <br>

      <input type="hidden" name="shipping" placeholder="shipping" value="<?php echo $show['shippingCost'] ?>">
      <input type="hidden" name="t_price" placeholder="shipping" value="<?php echo $show['totalPrice'] ?>">
      <input name="ordercomp" class="btn btn-outline-secondary" type="submit" value="Order Complete">&emsp;
      <!-- <a href="ship.php" style="text-decoration: none">Return to information</a> -->
      <?php if(isset($_POST["ordercomp"])) {
        $phn = $_POST['p_number'];
        $add = $_POST['p_address'];
        
          $dataup = $conn->query("UPDATE customer set p_number='$phn', p_address='$add' where id='".$_SESSION["admins"]."'");
          
          if ($dataup) {
          // echo "<script>window.location='index.php' </script>";
        }else{
          echo "Something went Wrong";
        }
      } ?>
      
</form>
	</div>
  
  <div class="col-6 p-4">   
  <?php
        $shipping = 0;
        $totalPrice=0;
        

        $q=$conn->query("SELECT *, add_cart.id AS aid FROM add_cart LEFT JOIN product ON add_cart.product_id=product.id WHERE add_cart.user_id=$admin AND add_cart.transaction_number = 'pending' ");
        while($rr=$q->fetch_array()){

          
          $shipping +=(200*$rr['quantitys']);
          $totalPrice +=($rr['price'] );
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
          <span>Shipping: <span style="float:right;"><?php echo $shipping ?></span></span>
        </div>
      <hr class="new1">
      <div class="pading">
        <span>Item Bill: <span style="float: right;"><?php echo $totalPrice ?></span></span>
      </div>
      <hr class="new1">
       <div class="pading">
        <span>Total Bill: <span style="float: right;"><?php echo  $shipping+$totalPrice ?></span></span>
      </div>
    </div>
  </div>
	</div>

  <?php include 'include/footer.php'; ?>
  <?php include "include/js.php" ?>

</body>
</html>