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
                <a   href="../dashboard"><i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a href="#" class="active" style="background:#020a2b;"><i class="fas fa-address-card"></i> Profile</a>
            </li>
            <li>
                <a href="../logout">Log out</a>
            </li>
           
           
        </ul>
    </nav>
<br><br><br>
<p id="padd"></p><p id="padd"></p>
<div class="userinfo">
    <div class="userimage">
        <img src="http://chama.local/wp-content/uploads/2022/07/24-248729_stockvader-predicted-adig-user-profile-image-png-transparent.png" height="300px" width="300px" style="border-radius=100%;" alt="user_profile">
</div><br>
<h2><u>Personal Details</u></h2>
<?php 

$conn=mysqli_connect("localhost","root","root","local");

$user=$_SESSION['user_loginn'];
$sql="select * from users_info where username='$user'";
$res=mysqli_query($conn, $sql);

while($row=mysqli_fetch_array($res)){
    $username=$row['username'];
    $names=$row['Names'];
    $email=$row['email'];
    $phone=$row['phone'];
    $bio=$row['bio'];
};
?>
 
<p class="usertopic">Username:  <?php echo $username; ?></p>

<p class="usertopic">Full Names: <?php echo $names; ?></p>

<p class="usertopic">Your Email: <?php echo $email; ?></p>

<p class="usertopic">Phone No: <?php echo $phone; ?></p>



</div>
<br>
<p id="padd"></p>

<div class="userbody">
    <div class="formbio">
    <form action="../userbiodb" method="post">
<h2><i class="fas fa-plus"></i> Add Bio</h2>
<textarea name="bio"  cols="60"  rows="6" style="font-size:17px; font-weight:900; font-size:20px;"><?php echo $bio; ?></textarea>
<div class="btnupdateuser">
    <input class="btnclearbio" type="reset" value="Clear">
 <input class="btnsubmitbio" type="submit" name="btnbio" value="Update" >
 </div>
</form></div>
<br>
    <h2 class="section-heading">Change Portal Password</h2>

    
<br>
<form action="../changeuserpassdb" method="post">
<div class="inputPass"><br>
<h3>New Password: </h3>

<input type="password" class="inputPass" id="passw" name="newPass">
<h3>Confirm New Password: </h3>
<input type="password" class="inputPass" id="passw1" name="conPass">
<input type="checkbox"  onclick="showPass()">Show Passwords <br><br>

<input class="submit_passBtn" type="submit" value="Submit">
<br><br>
</div>
</form>

</div>

<!-- All js files in this context -->
<script>
//show Password
function showPass() {
  var x = document.getElementById("passw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  var y = document.getElementById("passw1");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>

<?php

if($_SESSION['bio'])
{
    ?>
    <script>
        alert("Your Bio Status has been Updated Successfully");
        </script>
        <?php
        $_SESSION['bio']=false;
}

if($_SESSION['pass_changed'])
{
    ?>
    <script>
        alert("Your portal Password has been Changed");
        </script>
        <?php
        $_SESSION['pass_changed']=false;
}

if( $_SESSION['p_mismatch'])
{
    ?>
    <script>
        alert("Password Mismatch !!");
        </script>
        <?php
        $_SESSION['p_mismatch']=false;
}
?>
