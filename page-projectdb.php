<?php
session_start();
$conn= mysqli_connect("localhost","root","root","local");
if(!$conn){
    die("ERROR!!".mysqli_connect_error());
}
$proname=$_POST['pname'];
$author=$_POST['author'];

$descr=$_POST["description"];
$capital=$_POST['capital'];  
$ROI=$_POST['ROI'];
$period=$_POST['duration'];
$mont=$_POST['mont'];
$equip=$_POST['equip'];
$labour=$_POST['labour'];
$material=$_POST['material'];
$utility=$_POST['utility'];
$percent=($ROI-$capital);
$x=$percent/$ROI;
$z=$x*100;
$j=$z/$period;

$d1=strtotime("Today");
$today=strtotime(date("Y-m-d h:i:sa",$d1));
$dat=date("d M Y ", $today);


$query="insert into projectrequest (author, proname, det, descr, capital,equipment,material,labour,utility, ROI, period, percent)
values('$author','$proname','$dat','$descr','$capital','$equip','$material','$labour','$utility','$ROI','$period','$j')";

if(mysqli_query($conn, $query)){
    $_SESSION['afterpost']="posted";
    header('Location: ../dashboard');
}
else{
    echo "Error!".mysqli_error($conn);
}
mysqli_close($conn);
?>