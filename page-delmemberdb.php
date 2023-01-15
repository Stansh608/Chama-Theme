<?php

session_start();
$conn=mysqli_connect("localhost","root","root","local");

$id=$_POST['del-email'];
$ssql="select * from users_info where id='$id'";
$result=mysqli_query($conn,$ssql);
$row=mysqli_fetch_array($result);
$_SESSION['completedel']=$id;



$email=$row['email'];
$reason=$_POST['projectdisreason'];

wp_mail($email, "Account Deletion", $reason);

$sql="delete from users_info where id='$id'";
mysqli_query($conn,$sql);


header("Location: ../delmember");
mysqli_close($conn);
?>