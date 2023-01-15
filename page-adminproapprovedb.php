<?php
$conn=mysqli_connect("localhost","root","root","local");
if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
$idi=$_POST['btnn'];

$sql="select * from projectrequest where id='$idi'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$author=$row["author"];
$proname=$row["proname"];
$descr=$row["descr"];
$capital=$row["capital"];
$ROI=$row["ROI"];
$period=$row["period"];

$equip=$row['equipment'];
$labour=$row['labour'];
$material=$row['material'];
$utility=$row['utility'];
$percent=$row['percent'];
$d1=strtotime("Today");
$today=strtotime(date("Y-m-d h:i:sa",$d1));
$det=date("d M Y h:i:sa", $today);

$query="insert into project(author,proname,det,descr,capital,equipment,material,labour,utility,ROI,period,percent)
values('$author','$proname','$det','$descr','$capital','$equip','$material','$labour','$utility','$ROI','$period','$percent')";

if(mysqli_query($conn,$query)){
	$queryy="Delete from projectrequest where id='$idi'";
    mysqli_query($conn,$queryy);
    header("Location: ../proviewadmin");

}else{
	echo "Error!".mysqli_error($conn);
}

mysqli_close($conn);
?>