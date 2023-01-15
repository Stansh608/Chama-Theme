


<?php
session_start();
if(!isset($_SESSION['admin'])){
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
    </nav>

	<div class="sidenav">
		<a href="../adminDashboard" >Dashboard</a>
		<a href="../proviewadmin">Suggested Projects</a>
        <a href="../proview">Approved Projects</a>
		<a href="#" class="active">Approve Members</a>
		<a href="../delmember">Delete Member</a>
		
		<a href="../notification">Notifications</a>
		<a href="../contribution">Contributions</a>		
		<a href="../adminpass">Change Password</a>
	

	</div>
<br><br>
<br><br>
<div class="passadmin">
<h1 id="admin-heading">Change Password</h1>
<form action="../adminpassdb" method="post">
<h3 id="pass-head">New Password</h3>
<input type="password" name="p1">
<h3 id="pass-head">Confirm Password</h3>
<input type="password" name="p2">
<br>
<input type="submit" name="Submit">
</form>
 <br><br>
 </div>
<?php

get_footer();


?>


