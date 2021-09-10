<?php include 'include/db.php'; ?>
<?php 
if (isset($_GET['remove'])) {
  $add_cart_id=$_GET['add_cart_id'];
  $user_id=$_SESSION['admins'];
  $dell=$conn->query("DELETE FROM add_cart WHERE id='$add_cart_id' AND user_id='$user_id' ");
  echo "<script>window.location='index.php'</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="assets/css/navbar.css">
<link rel="stylesheet" type="text/css" href="assets/css/product.css">
<title>Navbar</title>
<style>
 /*.navbar a:hover {
  background: #FAF9F6;
  color: black;
}*/
.modal.right .modal-content {
    height: auto;
  }
</style>
</head>
<body>
  <div id="navbarCollapse" >
    <div class="row bg-white p-1">
        <div class="col-4 text-center">
          <select>
            <option>PKR</option>
            <option>EUR</option>
            <option>USD</option>
            <option>ADE</option>
          </select>
        </div>
          <div class="col-4 text-center">
            <a href="index.php"><img src="assets/img/logo.png" height="30px"></a></div>
          <div class="col-4 text-center"><a href=""><img src="assets/img/search.png" height="25px"></a>
            <button  data-toggle="modal" data-target="#myModal">
              <img src="assets/img/cart.png" class="text-center" height="25px">
            </button>
          
          </div>
    </div>

    <div class="modal right fade"  id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p style="font-size: 25px;" class="modal-title">Cart</p>
                <button class="close" data-dismiss="modal">
                  <span>&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <?php 
                  if(isset($_SESSION['admins'])){
                  $id=$_SESSION['admins'];
                  $ddd=$conn->query("SELECT product.detail, product.length, product.price, product.img1, product.title, add_cart.quantitys, add_cart.id  FROM add_cart LEFT JOIN product ON add_cart.product_id=product.id WHERE user_id='$id'AND add_cart.transaction_number = 'pending' "); ?>
 <!-- Above  AND add_cart.transaction_number = 'pending' is use for show empty cart after user complete order -->
                  <?php while($rt=$ddd->fetch_array()){ ?>
                <div class="containerr">
                    <div class="image">
                      <img src="upload/product/<?php echo $rt['img1'] ?>">

                    </div>
                    <div class="text">
                      <span>Title: <?php echo $rt['detail']?></span><br>
                          <span>Size: <?php echo $rt['length']?></span><br>
                          <span >Product Price: $ <span class="singlePrice<?php echo $rt['id'] ?>"> <?php echo $rt['price'] ?></span> </span><br>
                          
                          <span>QTY: $<?php echo $rt['quantitys']?> </span><br>

                          <span class="showNetPrice<?php echo $rt['id'] ?>">Net Price: $<?php echo $rt['price']*$rt['quantitys'] ?> </span><br>
                          <a style="color: red;" href="?add_cart_id=<?php echo $rt['id'] ?>&remove=1">Remove</a>
                          <br>
                          <br>
            <div>
<!-- quantity + - -->
            <button style="border: 1px solid #000;" class="btn decreaseBtn" id="<?php echo $rt['id'] ?>" type="button">-</button>
            <input type="text" name="quantity" id="quantity<?php echo $rt['id'] ?>" value="<?php echo $rt['quantitys'] ?>">
            <button style="border: 1px solid #000;" class="btn increaseBtns" id="<?php echo $rt['id'] ?>" type="button">+</button>
            </div>
               </div>
                  </div>
                  <br>
                  
                <?php } }?>

              </div>
              <div class="bottom p-3">
                <hr class="new2">
              <a style="font-size: 20px;">Add Order Note</a><br>
              <a style="font-size: 15px;">Shipping & taxes calculated at Checkout</a><br><br>
              <div class="box1 form-control">
                <button style="border: none; background-color: #fff;">CHECK-OUT</button>
                  <a href="cart.php?user_id=<?php echo $_SESSION['admins'] ?>"><div class="content1"></div></a>
                </div><br>
        
              </div>
            </div>
          </div>
        </div>

<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-white ">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">

            <div class="navbar-nav">
              <?php $m=$conn->query("SELECT * FROM menu"); ?>
              <?php while ($rm=$m->fetch_array()) { ?>
                <a class="nav-link text-secondary active" href="menu.php?menu_id=<?php echo $rm['id'] ?>"><?php echo $rm['name'] ?></a>
              <?php } ?>
            </div>
        </div> 

        <?php if(isset($_SESSION['session_login'])): ?>
          <a class="btn btn-danger" href="logout.php">Log-Out</a>
        <?php else: ?>
          <a class="btn btn-primary" href="login.php">Log-In</a>
        <?php endif ?>

    </nav>

</div>
 </div>
 <script>
   document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY ) {
        document.getElementById('navbarCollapse').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('navbarCollapse').classList.remove('fixed-top');
         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
}); 
 </script>

</body>
</html>