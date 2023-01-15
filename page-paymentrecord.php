<?php
session_start();
if(!isset($_SESSION['user_loginn'])){
    header("Location: ../login");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/7b3db13e0c.js" crossorigin="anonymous"></script>
    
    <?php wp_head(); ?>

    <title>www.chama.com</title>
</head>

<body>
   

    <nav style="top:0;left:0;">
        <div id="logo-img">
            <a href="#">
                <img src="http://chama.local/wp-content/uploads/2022/07/elitedev_logo.png" alt="EliteDevs Logo">
            </a>
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
                <a class="active" style="background:#020a2b;" href="../dashboard"><i class="fas fa-home"></i>Home</a>
            </li>
          
            <li>
                <a href="../logout">Log out</a>
            </li>
           
            <li>
               
            </li>
        </ul>
    </nav>

<br><br><br><br>
<?php

//Getting the date from the user
$conn=mysqli_connect("localhost","root","root","local");
$user=$_SESSION['user_loginn'];
$sq="select dat from users_info where username='$user'";
$get=mysqli_query($conn, $sq);
$row=mysqli_fetch_array($get);
$date=$row["dat"];
$reg_dat=strtotime($date);

//getting persons contributions


$sqll="select SUM(amount) from payment where username='$user'";
$res=mysqli_query($conn, $sqll);
$roww=mysqli_fetch_array($res);
$person=$roww["SUM(amount)"];

//getting the total amount
$sqlll="select SUM(amount) from payment";
$results=mysqli_query($conn, $sqlll);
$row1=mysqli_fetch_array($results);
$total=$row1["SUM(amount)"];


//picking the project amount required

$ordercol="det";
$order="desc";
$query="select * from selected_project ORDER BY ".$ordercol. " ". $order;
$re=mysqli_query($conn, $query);
$ro=mysqli_fetch_array($re);
$pro_fund= $ro["capital"];

//chama money
$chama_money=$total-$pro_fund;

?>
<p id="padd"></p>
<div class="chamamoney">
<div class="chamamoneyc">
    <h2>Chama Wallet: </h2><p id="money">Ksh 0.00</p> 
</div>
<div class="chamamoneyc" style="padding: 60px;">
<h2>Your Contributions: </h2><p id="money1">Ksh 0.00</p> 
<h2>Balance: </h2><p id="bal">Ksh 0.00</p> 
</div>
<?php

//setting a cont date ,,,amount and penalty
$conn=mysqli_connect("localhost","root","root","local");
$sqlss="select * from admin ";
$ress=mysqli_query($conn, $sqlss);
$rows=mysqli_fetch_array($ress);
$d=$rows['day'];
$m=$rows['month'];
$y=$rows['year'];
$p=$rows['penalty'];
$amount=$rows['amount'];

//penalty calculation
$finaldate = new DateTime($y."-".$m."-".$d);
$today = new DateTime(date("Y-m-d"));

$pos_diff = $finaldate->diff($today)->format("%r%a");
if($pos_diff>0){
$pp=$pos_diff*$p;
if($_SESSION['sp']){
    $pp=0;
    $_SESSION['sp']=false;
}

}
//displaying the contribution date
$datee=mktime(11, 14, 54, $m, $d, $y);
$contrdate=strtotime( date("Y-m-d h:i:sa",$datee));
if($reg_dat > $contrdate)
{
    $pp=0;
    
}
//balance calc
$bal=$amount+$pp-$person;
if($bal<=0){
    $_SESSION['sp']="paid";
    $pp=0; 
 }


if($total>0){
    ?>
    <script>
        document.getElementById("money").innerHTML="Ksh <b><?php echo $chama_money; ?>.00 <b>";
        </script><?php
}
?>

<script>
    document.getElementById("bal").innerHTML="Ksh <b><?php echo $bal; ?>.00 </b>";
    </script>
<div class="date" style="font-size: 25px;"><u>Contribution Date:</u> <br> <i><b><?php echo date("d M Y", $contrdate); ?><br> </b></i></div><br>
<br><p id="padd"></p><br><p id="padd"></p><br><p id="padd"></p>
<div class="penalty"style="font-weight:1000;"><u> Accumulated Penalty:</u><p id="pen"> Ksh 0.00 </p> </div>


</div>
<?php
if($person>0){
    ?>
    <script>
        document.getElementById("money1").innerHTML="Ksh <b><?php echo $person; ?>.00 </b>";
        </script><?php
}
if($pp>0){
    ?>
    <script>
        document.getElementById("pen").innerHTML="Ksh <b><?php echo $pp; ?>.00 </b>";
        </script><?php
}

?>
<br><br>
<h2 class="section-heading">Your contribution History

</h2>

<?php

$conn=mysqli_connect("localhost","root","root","local");
$user=$_SESSION['user_loginn'];
$sql="select * from payment where username='$user'";?>
<table CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
	<tr><th>Username</th><th>Phone</th><th>Amount</th><th>Date</th> </tr>
<?php
$res=mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($res))
{
    ?>
<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['det']; ?></td>
            
</tr>
    <?php
}
echo "</table>";
mysqli_close($conn);


?>


<br><br>

<?

get_footer();?>