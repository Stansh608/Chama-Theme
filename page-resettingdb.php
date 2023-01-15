<?php
session_start();
$conn=mysqli_connect("localhost","root","root","local");
if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];

if(!($pass1==$pass2))
{
    $_SESSION['mismatch']=$pass2;
    header('Location: ../resetting');
    
}


$id=$_SESSION['resetid'];
$query="update users_info set pass='$pass1' where id='$id' ";


if(mysqli_query($conn,$query)){
	$_SESSION['respass']="done";
   
}else{
    echo "error!!";
}
mysqli_close($conn);
header("Location: ../login");
?>
