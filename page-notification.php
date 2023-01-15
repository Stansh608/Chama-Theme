<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../login");

}

if($_SESSION["individual"]){
    $identity=$_SESSION['individual'];
    echo "<script>alert('Message sent successfull to: $identity');</script>";

		$_SESSION["individual"]=false;
		
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
                <img src="http://chamaserver.local/wp-content/uploads/2021/10/elitedev_logo-1.png" alt="EliteDevs Logo">
            </a>
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
                <a class="active" style="background:#020a2b;" href="../adminDashboard"><i class="fas fa-home"></i>Home</a>
            </li>
          
            <li>
                <a href="../adminlogout">Log out</a>
            </li>
           
            <li>
               
            </li>
        </ul>
    
<div class="sidenav">
    <br><br>
		<a href="../adminDashboard" >Dashboard</a>
		<a href="../proviewadmin">Suggested Projects</a>
        <a href="../proview">Approved Projects</a>
		<a href="../adminn">Approve Members</a>
		<a href="../delmember">Delete Member</a>
		
		<a href="#" class="active">Notifications</a>
		<a href="../contribution">Contributions</a>		
		<a href="#">Change Password</a>
		

	</div>
    </nav>
<p class="padd"></p>

<div class="adminNotification">
<div class="form-broadcast">
    <h2>Broadcast Notifications</h2>
    <form action="../broadcast" method="post">
        <textarea name="broadcast" placeholder="Type here..." class="textnotify" cols="60" rows="10"></textarea><br><br>
        <input type="submit" value="Broadcast" class="btn-sendnotification">
    </form>
</div>
<br><br><br>

<div class="form-individual">
<h2>Individual Notification</h2>
    <form action="../individual" method="post">
    <textarea name="individual" placeholder="Type here..." class="textnotify" cols="60" rows="10"></textarea><br><br>
    <br><b>Specify Email:</b> <select class="selectemail" name="owner">
           
		   <?php 
		   $conn=mysqli_connect("localhost","root","root","local");
		   $sql = mysqli_query($conn, "SELECT email FROM users_info");
		   while ($row =mysqli_fetch_array($sql) ){
		   echo "<option >" . $row['email'] . "</option>";
			   }
		   ?>
</select><br><br><br>
        <input type="submit" value="Send  " class="btn-sendnotification">

    </form>
</div>
</div>
            </body>
            </html>