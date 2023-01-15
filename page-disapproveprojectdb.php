<?php


$conn=mysqli_connect("localhost","root","root","local");
$id=$_POST['dis-email'];
$email=$_POST['passing_email'];
$reason=$_POST['projectdisreason'];


	

$sql="delete from projectrequest where id='$id'";
mysqli_query($conn,$sql);
wp_mail($email,"Project Rejection",$reason);

header("Location: ../proviewadmin");
mysqli_close($conn);
?>
    