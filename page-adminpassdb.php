<?php
$conn=mysqli_connect("localhost","root","root","local");
if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
$p1=$_POST['p1'];
$p2=$_POST['p2'];
if($p1==$p2){
	$sp="update table admin set pass='$p1' where id=1";
	mysqli_query($conn, $sp);
}else{
	header("Location: ../adminpass");
}