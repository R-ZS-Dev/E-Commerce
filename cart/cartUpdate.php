<?php session_start();
include "include/db.php";

// this is use for + - quantity of the product run time on the web page

$id=$_POST['id'];
$qty=$_POST['qty'];
$conn->query("UPDATE add_cart SET quantitys='$qty' WHERE id='$id' ");

// below 4 line are use for show and calculate total price of items run time
$u_id=$_SESSION['admins'];
$q=$conn->query("SELECT SUM(quantitys*price) AS totalPrice FROM add_cart WHERE user_id='$u_id' AND transaction_number ='pending'");
$row=$q->fetch_array();
echo $row['totalPrice'];

 ?>