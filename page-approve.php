<?php
$conn=mysqli_connect("localhost","root","root","local");
if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
$idi=$_POST['btn'];

$sql="select * from register where id='$idi'";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);	
$idd=$row["id"];
$uname=$row["username"];
$names=$row["Names"];
$phone=$row["phone"];
$email=$row["email"];
$passw=$row["pass"];

$d1=strtotime("Today");
$today=strtotime(date("Y-m-d h:i:sa",$d1));
$dat=date("d M Y h:i:sa", $today);

$query="insert into users_info(id,username,Names,email,phone,pass,dat)
values('$idd','$uname','$names','$email','$phone','$passw','$dat')";
if(mysqli_query($conn,$query)){
	$queryy="Delete from request where id='$idi'";
    mysqli_query($conn,$queryy);
}else{
	echo "Error!".mysqli_error($conn);
}
wp_mail($email,"Confirmation Email","Hi $names. Your membership request has been approved.You can now login to Elite Self-Help Group.
");

mysqli_close($conn);
header("Location: ../adminn");
mysqli_close($conn);
?>