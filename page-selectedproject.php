<?php
session_start();
if(!isset($_SESSION['user_loginn'])){
    header("Location: ../login");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/7b3db13e0c.js" crossorigin="anonymous"></script>
    
    <?php wp_head(); ?>

    <title>www.chama.com</title>
	<style>
		body{
			background-color: black;
		}
		</style>
</head>

<body>
   

    <nav style="top:0;left:0;">
        <div id="logo-img">
            <a href="#">
                <img src="http://chamaserver.local/wp-content/uploads/2021/10/elitedev_logo-1.png" alt="EliteDevs Logo">
            </a>
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
           
            
           
            <li>
               <h3 style="color:white;">Selected Project Description</h3>
            </li>
        </ul>
    </nav>
<body>
<br><br><br><br>

<div class="full-project">
<input class="btnPrint" type="button" value="Print" onclick="printProject()">
<?php
$conn=mysqli_connect("localhost","root","root","local");
if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
$idi=$_POST['btn'];

$sql="select * from selected_project";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);

$author=$row["author"];
$proname=$row["proname"];
$det=$row["det"];
$descr=$row["descr"];
$capital=$row["capital"];

$ROI=$row["ROI"];
$perod=$row["perod"];
$month=$row["moth"];
$profit=$ROI-$capital;
?>
<div id="print" class="innerfullproject">
<?php

echo"<br><h2>The Project Author </h2> $author <br><br>";
echo"<h2>The Project Name </h2> $proname <br><br>";
echo"<h2>The Project  Posting Date </h2> $det <br><br>";
echo"<h2>The Project Description </h2> $descr <br><br>";
echo"<h2>The Project Estimated cost</h2> Ksh: $capital <br><br>";
echo"<h2>The Project Estimated Profit</h2> Ksh: $profit  <br><br>";
echo"<h2>Estimated time to carry out the project </h2> $perod $month <br><br>";
?>
</div> 
</div>
<br><br>


<script>
        function printProject() {
            var divContents = document.getElementById("print").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h1 style="color:green;">Selected Project Details <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>

</body>
</html>