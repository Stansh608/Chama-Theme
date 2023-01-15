<?php
session_start();

$conn=mysqli_connect("localhost","root","root","local");

	$username=$_POST['username'];
	$password=$_POST['pass'];

	$sql="select  * from admin where username='$username' and pass='$password'";
   

	$result=mysqli_query($conn,$sql);
    
	if(mysqli_fetch_array($result)){
		
		$_SESSION['admin']=$username;
		mysqli_close($conn);
        header("Location: ../adminDashboard");

       	//header("Location: ./home.php");
	 }
    else{
		$_SESSION['error_admin']="adminerror";
		mysqli_close($conn);
		header("Location: ../adminlogin");
	}

?>