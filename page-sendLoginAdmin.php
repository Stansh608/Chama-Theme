<?php
session_start();

$conn=mysqli_connect("localhost","root","root","local");

	

	$sql="select  email from admin";
   
	$result=mysqli_query($conn,$sql);
    

	$email=$row=mysqli_fetch_array($result);

	
wp_mail($email,"Login","Hi Admin. Click this link to login. http://chamaserver.local/adminlogin/
");	
mysqli_close($conn);
$_SESSION['sent']="success";
header("Location: ../login");
?>
       

 