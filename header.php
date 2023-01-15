<?php
session_start();
$conn=mysqli_connect("localhost","root","root","local");
$ordercol="combination";
$order="desc";
$query="select * from project ORDER BY ".$ordercol. " ". $order;

$re=mysqli_query($conn, $query);
$ro=mysqli_fetch_array($re);

$dat=strtotime($ro['det']);
$dateApprove=strtotime(date("Y-m-d h:i:sa",$dat));
$fdate=strtotime("+2 weeks", $dateApprove);

$_SESSION['DATE']=$fdate;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7b3db13e0c.js" crossorigin="anonymous"></script>
	
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>

    <title>www.chama.com</title>
</head>

<body>
  

    <nav style="top:0;left:0;">
        <div id="logo-img">
            <a href="#">
                <img src="http://chama.local/wp-content/uploads/2022/03/elitedev_logo.png" alt="EliteDevs Logo">
            </a>
        </div>
        
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
                <a id="home" href="../"><i class="fas fa-home"></i> Home</a>
            </li>
            <li>
                <a href="../about"><i class="fas fa-address-card"> </i>About us</a>   
            </li>
            <li>
                <a id="login" href="../login">Login</a>
            </li>
            <li>
                <a id="signup" href="../signupp">Sign up</a>
            </li>
            <li><!--
                <div id="search-icon">
                    <i class="fas fa-search"></i>
                </div>
-->
            </li>
        </ul>
    </nav>

   
  