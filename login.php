<?php include 'include/session.php'; ?>
<?php include 'include/db.php'; ?>
<?php 	
if (isset($_POST["usrlogin"])) {

	$email = $_POST["email"];
	$password = $_POST["password"];

		$qry="SELECT * FROM user_login WHERE email= '".$email."' AND password='".$password."'";
		$result=$conn->query($qry);
		if ($row=$result->fetch_array()) {
			$_SESSION['admins'] = $row['id'];

			$_SESSION['session_login']=true;
			
		header("Location:ship.php");
	}else{
		echo "Wrong password or Username";
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
				}*/
		</style>
</head>
<body>
	<?php include "include/navbar.php" ?>

		<div class="container">
			<div class="row">
		<div class="col-6">
	<form action="" method="POST">	  
  		<div class="form-group">
  			<label>Email Address</label>
    		<input type="text" name="email" class="form-control" placeholder="Email">
  		</div>
  		<div class="form-group">
            <label>Password</label>
              <input id="password-field" type="password" class="form-control" name="password" >
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          </div><br>
  		<button type="submit" name="usrlogin" class="btn btn-outline-secondary">Log-In</button>&emsp;
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

	<script>
		$(".toggle-password").click(function() {
 		$(this).toggleClass("fa-eye fa-eye-slash");
  		var input = $($(this).attr("toggle"));
  		if (input.attr("type") == "password") {
    input.attr("type", "text");
  		} else {
    		input.attr("type", "password");
  		}
	});
	</script>

</body>
</html>