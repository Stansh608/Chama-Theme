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
                <img src="http://chamaserver.local/wp-content/uploads/2021/10/elitedev_logo-1.png" alt="EliteDevs Logo">
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
                <a href="../adminlogout">Log out</a>
            </li>
           
            <li>
               
            </li>
        </ul>
    </nav>

    <div class="sidenav">
		<a href="#" class="active" >Dashboard</a>
		<a href="../proviewadmin">Suggested Projects</a>
        <a href="../proview">Approved Projects</a>
		<a href="../adminn" >Approve Members</a>
		<a href="../delmember">Delete Member</a>
		
		<a href="../notification">Notifications</a>
		<a href="../contribution">Contributions</a>		
		<a href="../adminpass">Change Password</a>
			

	</div>

    <div class="admindashboard"><div class="admindashboard1">
        <br><br>

  <h1 style="text-align:center; color:white; ">
      Admin Panel
  </h1>
  <div class="adminprofilepic" style="margin-top: 3%;">
      <img src="http://chamaserver.local/wp-content/uploads/2021/11/admin.png" width=150 height=150 
      style="border-radius:100%"
      alt=""><br> 
  </div><br><br>
  <div class="admindesc">
   <b style="color: blue;">Name:</b> Stanley Munene <br><br>
   <b style="color: blue;">Email:</b> stanleymunene56@gmail.com <br><br>
   <b style="color: blue;">Phone:</b> 0798 000 000

   </div>
</div>
</div>

