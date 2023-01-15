<?php
session_start();
$conn=mysqli_connect("localhost","root","root","local");
if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
$uname=$_POST['usernamepass'];
$email=$_POST['emailpass'];



$query="select * from users_info where username='$uname' and email='$email'";
$result=mysqli_query($conn,$query);

if($row=mysqli_fetch_array($result)){
	
    $_SESSION['resetpasssuccess']=$email;
    wp_mail($email,"Reset Password", "Please click this link to reset your password. http://chamaserver.local/resetting/");
    $_SESSION['resetid']=$row['id'];

    header("Location: ../login");
}else{
    $_SESSION['resetpass']="error";  
    header("Location: ../login");

}
mysqli_close($conn);
?>
