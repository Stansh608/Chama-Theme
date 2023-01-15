<?php
session_start();

$conn=mysqli_connect("localhost","root","root","local");

	$username=$_POST['username'];
	$password=$_POST['pass'];

	$sql="select  * from register where username='$username' and pass='$password'";
    $sqll="select  * from users_info where username='$username' and pass='$password'";

	$result=mysqli_query($conn,$sql);
    
	if(mysqli_fetch_array($result)){
		$_SESSION['user_requestt']="abc";
		
        header("Location: ../login");

       	//header("Location: ./home.php");
	}
    elseif(mysqli_fetch_array(mysqli_query($conn,$sqll)))
    {
        $_SESSION['user_loginn']=$username;
		
      
        header("Location: ../dashboard");


    }
    else{
		$_SESSION['error_loginn']="bde";
		header("Location: ../login");
	}

?>