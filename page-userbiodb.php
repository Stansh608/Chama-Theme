<?php
session_start();
$conn=mysqli_connect("localhost","root","root","local");
$bio=$_POST['bio'];
$user=$_SESSION['user_loginn'];
$query="update users_info set bio='$bio' where username='$user' ";


if(mysqli_query($conn,$query)){
	$_SESSION['bio']="sucess";
    mysqli_close($conn);
    header("Location: ../userprofile");

}

?>
