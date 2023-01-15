<?php
session_start();
$conn=mysqli_connect("localhost","root","root","local");
$day=$_POST['putDate'];
$month=$_POST['putMonth'];
$year=$_POST['putYear'];
$money=$_POST['pesa'];
$pen=$_POST['pen'];

$sql="update admin set day='$day', month='$month', year='$year'";
mysqli_query($conn, $sql);
$datee=mktime(11, 14, 54, $month, $day, $year);
$contrdate=strtotime( date("Y-m-d h:i:sa",$datee));
$_SESSION['cont_date']=$contrdate;
$_SESSION['dat']="olk";
if($money & $pen){
    $sqll="update admin set amount='$money',penalty='$pen'";  
    mysqli_query($conn, $sqll);
    $_SESSION['money']="done";
}
mysqli_close($conn);

header("Location: ../contribution");

?>