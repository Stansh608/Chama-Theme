<?php
session_start();

$conn=mysqli_connect("localhost","root","root","local");
$broadcast=$_POST['broadcast'];

$query="update users_info set broadcast='$broadcast'";
mysqli_query($conn,$query);
mysqli_close($conn);
header("Location: ../notification")

?>
    
    
    