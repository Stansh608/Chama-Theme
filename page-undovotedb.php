<?php
session_start();

$proname=$_POST['proname'];
$uname=$_POST['uname'];
$not="null";
$conn=mysqli_connect("localhost","root","root","local");

$sql="update users_info set voteStatus='$not' where username='$uname'";
mysqli_query($conn,$sql);

$query="select * from project where proname='$proname'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_array($result)){
    $value=$row['votes'];
    $cash=$row['percent'];
    
    $res=$value-1;
    $combination=$cash*$res;
    $query1="update project set votes='$res',combination='$combination' where proname='$proname'";
    mysqli_query($conn,$query1);
    header("Location: ../proview");
    
}

mysqli_close($conn);
?>


