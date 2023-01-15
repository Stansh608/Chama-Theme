
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

    <div class="sidenav"><br><br>
		<a href="../adminDashboard"  >Dashboard</a>
		<a href="../proviewadmin">Suggested Projects</a>
        <a href="../proview">Approved Projects</a>
		<a href="../adminn" >Approve Members</a>
		<a href="../delmember">Delete Member</a>
		
		<a href="../notification">Notifications</a>
		<a href="#" class="active">Contributions</a>		
		<a href="#">Change Password</a>
			

	</div>

<br><br>
    <div class="setDate"><br><br>
<h2 class="section-heading">Contribution Information</h2>
<br><br>
<div class="selectdate">
<b style="color: blue; font-size: 25px;">Contribution Date</b>
    <br><br>
    <form action="../formdatedb" method="post">
    Day    <select name="putDate" style="font-size:18px">
    <option value="" selected></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option><option value="6">6</option><option value="7">7</option>
<option value="8">8</option><option value="9">9</option><option value="10">10</option>
<option value="11">11</option><option value="12">12</option><option value="13">13</option>
<option value="14">14</option><option value="15">15</option><option value="16">16</option>
<option value="17">17</option><option value="18">18</option><option value="19">19</option>
<option value="20">20</option><option value="21">21</option><option value="22">22</option>
<option value="23">23</option><option value="24">24</option><option value="25">25</option>
<option value="26">26</option><option value="27">27</option><option value="28">28</option>
<option value="29">29</option><option value="30">30</option><option value="31">31</option> 
</select>   Month 
<select name="putMonth" style="font-size:18px">
<option value="" selected></option>
    <option value="1">1</option><option value="1">2</option><option value="3">3</option>
 <option value="4">4</option><option value="5">5</option><option value="6">6</option>
 <option value="5">7</option><option value="8">8</option><option value="7">9</option>
 <option value="10">10</option><option value="11">11</option><option  value="12">12</option>
 </select>  Year 
<select name="putYear" style="font-size:18px">
<option value="" selected></option>
    <option value="2019">2019</option><option value="2020">2020</option><option  value="2021">2021</option>
    <option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option>
    <option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option>
    <option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option>
</select>

<br><br>
<b style="color: blue; font-size: 25px;">Amount payable Per Person</b>

<input type="text" name="pesa" placeholder="e.g 3000">
<br>
<b style="color: blue; font-size: 25px;">Penalty per day for late payment </b>
<input type="text" name="pen" placeholder="e.g 200">

<input type="submit" class="btn-sendnotification" style="width:15%; float:right; margin-bottom:10px; margin-right:250px;"  value="Save">
</form>
<br><br></div>
<p id="p1" style="display:none; color:green;">Contribution Amount and Penalty has been updated successfully</p><br>
<p id="p2 " style="display:none; color:green;">The contribution date has been updated successfully</p>

</div>
<?php
if($_SESSION['money']){
   ?> <script>
       document.getElementById("p1").style.display="block";
       </script>
       <?php
       $_SESSION['money']=false;
}
if($_SESSION['dat']){
    ?> <script>
         document.getElementById("p2").style.display="block";
        </script>
        <?php
        $_SESSION['dat']=false;
 }
?>