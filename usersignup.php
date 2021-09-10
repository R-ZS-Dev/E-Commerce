<?php include 'include/db.php' ?>
	<?php if (isset($_POST['signup'])) {
		$name = $_POST['first_name'];
		$lnam = $_POST['last_name'];
		$phn = $_POST['phone_number'];
		$add = $_POST['address'];
		$eml = $_POST['email'];
		$pass = $_POST['password'];
		$conpass = $_POST['confirmpass'];

		if ($pass === $conpass) {
			$insert = $conn->query("insert into user_login (first_name, last_name, phone_number, address, email, password, confirmpass) values ('$name', '$lnam', '$phn', '$add', '$eml', '$pass', '$conpass')");
		}else{
			echo "Password not equal";
		};
	
	if ($insert) {
		echo "<script>window.location='usersignup.php?mess=Registered Successfully'</script>";
	}
		else{
		echo "<script>window.location='usersignup.php?mess=Not Successfully Registered/Password not equal'</script>";
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
		<?php include "include/meta.php" ?>
		<?php include "include/css.php" ?>
		<?php include "include/title.php" ?>
		<link rel="stylesheet" type="text/css" href="assets/css/usersignup.css">
		<style>
			/*.field-icon {
  				float: right;
  				margin-left: -25px;
  				margin-top: -25px;
  				position: relative;
  				padding-right: 5px;
				}
*/		</style>
</head>
<body>
	<?php include "include/navbar.php" ?>
		<div class="container">
			<?php if (isset($_GET['mess'])): ?>
			<h2 class="text-info"><?php echo $_GET['mess'] ?></h2>
			<?php endif ?>
			<div class="row">
		<div class="col-6">
	<form action="" method="POST">	
  <div class="row">
  <div class="col">
  	<label>First Name</label>
    <input type="text" name="first_name" class="form-control" placeholder="First name">
  </div>
  <div class="col">
  	<label>Last Name</label>
    <input type="text" name="last_name" class="form-control" placeholder="Last name">
  </div>
</div><br>
  <div class="form-group">
  	<label>Mobile Number</label>
    <input type="number" name="phone_number" class="form-control" placeholder="Phone number">
  </div>
  <div class="form-group">
  	<label>Address</label>
    <input type="text" name="address" class="form-control" placeholder="H.no #, Street, Town name, City, District">
  </div>
  <div class="form-group">
  	<label>Email Address</label>
    <input type="text" name="email" class="form-control" placeholder="Email">
  </div>
  <div class="row">
  <div class="col">
  	<label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password">
  </div>
  <div class="col">
  	<label>Confirm Password</label>
    <input type="password"  class="form-control" name="confirmpass" placeholder="Confirm Password">
  </div>
</div>
<br>
  
  <button type="submit" id="btnSubmit" name="signup" class="btn btn-outline-secondary">Sign-up</button>&emsp;
  <a href="index.php" style="text-decoration: none">Cancel</a>
</form>
	</div>
		<div class="col-6 align-self-center d-flex justify-content-center">
			<img src="assets/img/userloginimg.jpg">
		</div>
	</div>
	</div>

	<?php include 'include/footer.php'; ?>
	<?php include "include/js.php" ?>



</body>
</html>