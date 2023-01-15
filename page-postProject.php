<?php session_start();
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
</head>

<body>
    

    <nav style="top:0;left:0;">
        <div id="logo-img">
            <a href="#">
                <img src="http://chama.local/wp-content/uploads/2022/07/elitedev_logo.png"  alt="EliteDevs Logo">
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
           
           
        </ul>
    </nav>
    <?php
      

      $conn=mysqli_connect("localhost","root","root","local");

      $uname=$_SESSION['user_loginn'];
          
          $sql="select Names from users_info where username='$uname'";
      
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_array($result)){
              $cff=$row["Names"];
          }
       
       
           ?>
  
    
  

<br><br><br><br>
<div class="formpost" style="font-size:20px; font-weight:bold;">
<form action="../projectdb" method="POST"><br><br>
<h1 class="section-heading" style="text-align:center;">Fill in the form below to post a Project </h1>

    <table  CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
        <tr>
            <td>Author's Name :</td><td><input type="text" readonly="readonly" value="<?php echo $cff; ?>" style="font-size:20px;" name="author"></td>
        </tr>
        <tr>
            <td>Project Name :</td><td><input type="text" required  placeholder="Project Title..." style="font-size:20px;" name="pname"></td>
        </tr>
       
</table><br>
<b> <h2 class="section-heading">Project Description: </b></h2> <br>

        <textarea required  placeholder="Type here..." style="font-size:20px;" class="desc" name="description"  cols=100 rows=15></textarea><br>
       <br>
       <h3 class="section-heading">Also Provide the following costs estimates: </h3>
    
        <table CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
        <tr>
            <th>Equipment Costs</th><th>Labour cost</th><th>Material  costs</th><th>Utility Bills </th><th>Capital Required</th>
        </tr>
        <tr><td><input type="text" required id="i1" placeholder="e.g 20000" onchange="Compute()" style="font-size:20px;" name="equip"></td>
        <td><input type="text" required id="i2" placeholder="e.g 20000" onchange="Compute()" style="font-size:20px;" name="labour"></td>
        <td><input type="text" required id="i3"  placeholder="e.g 20000" onchange="Compute()" style="font-size:20px;" name="material"></td>
        <td><input type="text" required id="i4" placeholder="e.g 20000" onchange="Compute()" style="font-size:20px;" name="utility"></td>
        <td><input type="text" required id="i5"  placeholder="0.00"  readonly="readonly" style="font-size:20px; "  name="capital"></td>
    </tr>
</table>
<table CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
        <tr>
            <td>Returns On Investments: Kshs</td> <td><input placeholder="e.g 25000" required   style="font-size:20px;" type="text" name="ROI"></td>
        </tr>
        <tr>
            <td>Estimated Duration in Months: </td><td><input placeholder="e.g 2" required  type="number" style="font-size:20px;" name="duration" default=0> 
            
            </td>
        </tr>
        
            
        
        
    </table>
    <br>
   

       <input class="btnpost" type="submit" value="Post">
    
</form>
</div>
<br>
<script>
        function Compute(){
            var a=Number(document.getElementById("i1").value);
            var b=Number(document.getElementById("i2").value);
            var c=Number(document.getElementById("i3").value);
            var d=Number(document.getElementById("i4").value);
            var e=a+b+c+d;
            document.getElementById("i5").value =e;

        }
            
        
        </script>
<?php 

get_footer();?>