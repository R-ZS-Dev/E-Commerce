<?php include 'db.php'; ?>
<?php 
	
if (isset($_POST["usrlogin"])) {

	$email = $_POST["email"];
	$password = $_POST["password"];

		$qry="SELECT * FROM user_login WHERE email= '".$email."' AND password='".$password."'";
		$result=$conn->query($qry);
		if ($row=$result->fetch_array()) {
			$_SESSION['admins'] = $row[0];

			$_SESSION['session_login']=true;
			
		header("Location:ship2.php");
	}else{
		echo "Wrong password or Username";
	}
}

 ?>