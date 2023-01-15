<?php
session_start();

$conn=mysqli_connect("localhost","root","root","local");
$broadcast=$_POST['individual'];
$email=$_POST['owner'];

$query="update users_info set individual='$broadcast' where email='$email'";
mysqli_query($conn,$query);
mysqli_close($conn);

$_SESSION['individual']="$email";
header("Location: ../notification");

?>