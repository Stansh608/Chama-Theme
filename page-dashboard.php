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
    
    <?php
     wp_head(); ?>

    <title>www.chama.com</title>
</head>

<body>
    <div id="slideout-menu">
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="blogslist.html">About us</a>
            </li>
            <li>
                <a href="blogslist.html">Login</a>
            </li>
            <li>
                <a href="about.html">Sign up</a>
            </li>
            <li>
                <input type="text" placeholder="Search Here">
            </li>
        </ul>
    </div>

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
                <a class="active" style="background:#020a2b;" href="#"><i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a href="../about"><i class="fas fa-address-card"></i>About us</a>
            </li>
            <li>
                <a href="../logout">Log out</a>
            </li>
           
            <li>
               
            </li>
        </ul>
    </nav>

   
<?php
$conn=mysqli_connect("localhost","root","root","local");
$sqlss="select * from admin";
$ress=mysqli_query($conn, $sqlss);
$rows=mysqli_fetch_array($ress);
$d=$rows['day'];
$m=$rows['month'];
$y=$rows['year'];



$dat=strtotime("Today");
$today=strtotime(date("Y-m-d h:i:sa",$dat));
$datee=mktime(11, 14, 54, $m, $d, $y);
$finaldate=strtotime( date("Y-m-d h:i:sa",$datee));
$count=0;
while ($today < $finaldate) {
  $count+=1;
  $today = strtotime("+1 Day", $today);
}



$ddue=0;
while($finaldate < $today ){
$ddue +=0;
$finaldate=strtotime("+1 Day", $finaldate);

}
?>





    <div id="banner1">
    <h2>Welcome to:</h2>
        <h1 id="banner-text">Elite Self-Help Group</h1>
        <h3 id="banner-text">Secure your future by Investing together</h3>
        
    </div>

    <main>
        <br>
       
       <h2 class="section-heading">The DashBoard </h2>
       
        <br>
        <div class="dayRemain" id="dateRemain"><marquee><?php echo $count ." Days remaining to Contribution Day."; ?></marquee></div>

        <div class="dark" style="text-align:right;">
        
        <a href="../userprofile"><button class="btn-dark-mode" >Your Profile</button></a> 
</div>
<?php
if(($count ==0) && ($ddue==0) ){
  ?>
  <script>
    document.getElementById("dateRemain").innerHTML="<marquee>Today is the Contribution Day.</marquee> Make effort and avoid Penalties";
  </script>
  <?php
}
  

if($ddue>0 ){
  ?>
  <script>
    document.getElementById("dateRemain").innerHTML="<marquee> <?php echo $ddue ." Days past Contribution date. Kindly check that you've cleared your balance to avoid more Penalties";?></marquee>";
  </script>
  <?php
}
  ?>
<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>

        <section style="background:#f1f1f1;">
        


           
            <div class="card2" style="background:#f1f1f1;">
                <div class="card-image2">
                    
                        <img src="http://chama.local/wp-content/uploads/2022/03/MicrosoftTeams_image__24_.60f1fc7605afe.png" height="200px"width="200px" style="border-radius:100%;" alt="Card Image">
                                       
                   
                        <h2>Projects</h2>
                   
                </div>

                <div class="card-description2">
                    <a href="../postProject"><input id="fs1_btn" type="button" name="post_project" value="Post Project"></a><br>
                    <a href="../proview"><input id="fs1_btn" type="button" name="View Project"  value="View Projects"></a>
                            
                    
                </div>
            </div>   
            <div class="card2" style="background:#f1f1f1;">
                <div class="card-image2">
                    
                        <img src="http://chama.local/wp-content/uploads/2022/03/EGb8YMWXYAA31Qo.jpg" height="200px"width="200px" style="border-radius:100%;" alt="Card Image">
                                     
                   
                        <h2>Funds</h2>
                   
                </div>

                <div class="card-description2">
                    <input id="fs1_btn" type="button" name="post_project" onclick="openForm2()" value="Make Payments"><br>
                   <a href="../paymentrecord"> <input id="fs1_btn" type="button" name="View Project" value="Payments Records"></a>
                            
                </div>
            </div>   
            
   <?php
  
   $log=$_SESSION['user_loginn'];
   $query="select * from users_info where username='$log'";
   $row=mysqli_fetch_array(mysqli_query($conn,$query));     
   $simu = $row['phone'];
  
   ?>

<div class="form-pop" id="myForm2">

<form action="../paymentdb" method="POST" class="form-container">
  <h3 style="text-align:center;">Payment Plattform</h3>
  <div>
      <p id="message" style="display: none; color: green;"><b>Wait for stk push...</b></p>
  <b>Phone: </b><input type="text" value="<?php echo $simu; ?>" name="phone-no" >
  </div>
  <b>Amount: </b><input type="text" value="" name="amount" ><br>
  <button type="submit" name="pay" value="" onclick="showmsg()" class="btn1-sendMail">Pay</button>
  <button type="button" class="btn2-cancel" onclick="closeForm()">Close</button>
 
</form>
</div>

<script>
function openForm2() {
document.getElementById("myForm2").style.display = "block";
}
function showmsg() {
document.getElementById("message").style.display = "block";
}

function closeForm() {
document.getElementById("myForm2").style.display = "none";
}
</script>

                   
                       
        </section>

        <!--<p class="padd"></p>-->
        <br>


       <h2 class="section-heading">Notifications <i class="fas fa-bell"></i></h2>

    

<div class="row">
  <div class="columnn">
    <div class="cardn">
    <h3>Broadcast Information</h3>
    <div class="info">
    <?php
    $conn=mysqli_connect("localhost","root","root","local");


    $uname=$_SESSION['user_loginn'];
        
        $sql="select * from users_info where username='stan'";
    
        $result=mysqli_query($conn,$sql);
        
        if($row=mysqli_fetch_array($result)){
            ?>
                    
                <p><?php echo $row['broadcast'] ?></p>
            <?php
    
        }	
         ?> </div><br>

          <img src="http://chama.local/wp-content/uploads/2022/03/admin.png" height="70px"width="70px" style="border-radius:100%;" alt="Card Image"> <br><div class="info-desc"><b>Admin</b><br><i><b>Email:</b>adminchama@gmail.com</i></div>
                
     
     
    </div>
  </div>
  

  <div class="columnn">
    <div class="cardn">
      <h3>Individual Notifications</h3>
      <div class="info">
      <?php
      



    $uname=$_SESSION['user_loginn'];
        
        $sql="select * from users_info where username='$uname'";
    
        $result=mysqli_query($conn,$sql);
        
        if($row=mysqli_fetch_array($result)){
            ?>
                    
                <p><?php echo $row['individual'] ?></p>
            <?php
            mysqli_close($conn);
    
        }	
         ?>


    </div><br>
    <img src="http://chama.local/wp-content/uploads/2022/03/admin.png" height="70px"width="70px" style="border-radius:100%;" alt="Card Image"> <br><div class="info-desc">
        <b>Admin</b><br><i><b>Email:</b>adminchama@gmail.com</i></div>
  </div></div>
</div>




<h2 class="section-heading">Access Limit</h2>
<div class="col-md-3  col-xs-12 hiw-cols-first">
          <picture>
             <img class="hiw-tab-images" src="http://chama.local/wp-content/uploads/2022/07/ethical-investing.jpg" height=200 width=500 style="bottom:0;
             border-radius:20px;margin-right:10px;margin-bottom:0px;">
             
          </picture>
          <div> 
          <div class="hiw_heading"> Connectivity and <b style="color:blueviolet;">Network</b></div>
          <div class="hiw-subpara"> Elite self-help group came into place in <b>8th September 2018.</b> Over the years the 
        organization has acquired an uptrend linking members from all walks of life. Our platform is dedicated in quality service delivery to our clients in timely manner at the comfort of your home.
      </div>
          </div>
</div>


<br><br>
<h2 class="section-heading">Projects Previously evaluated</h2>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img class="img-hi" src="http://chama.local/wp-content/uploads/2022/07/A-real-estate.png" style="width:100%">
  <div class="text">Real Estate</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img class="img-hi" src="http://chama.local/wp-content/uploads/2022/07/FISH_FARMING.jpg" style="width:100%">
  <div class="text">Fish Farming</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <img class="img-hi" src="http://chama.local/wp-content/uploads/2022/07/poultryfarm1_1.jpg" style="width:100%">
  <div class="text">Poultry Rearing</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img class="img-hi" src="http://chama.local/wp-content/uploads/2022/07/unnamed.jpg" style="width:100%">
  <div class="text">Bee Keeping</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img class="img-hi" src="http://chama.local/wp-content/uploads/2022/07/agricultural_land.png" style="width:100%">
  <div class="text">Land For Sale</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>





<?php

if($_SESSION['afterpost']){
  echo "<script> alert('Project Posted as Successfully.');</script>";
  $_SESSION['afterpost']=false;
}


get_footer();
?>