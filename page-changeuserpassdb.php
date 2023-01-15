<?php
session_start();
$conn=mysqli_connect("localhost","root", "root", "local");
$user=$_SESSION['user_loginn'];
$newP=$_POST['newPass'];
$conPass=$_POST['conPass'];
if($conPass==$newP){
$query="update users_info set pass ='$newP' where username='$user'";
mysqli_query($conn, $query);
$_SESSION['pass_changed']="ok";
header("Location: ../userprofile");

}else{
    $_SESSION['p_mismatch']="mismatch";
    header("Location: ../userprofile");
}
?>