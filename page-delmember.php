
<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: ../login");

}
?>

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
                <a class="active" style="background:#020a2b;" href="../dashboard"><i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-address-card"></i>About us</a>
            </li>
            <li>
                <a href="../adminlogout">Log out</a>
            </li>
           
            <li>
                
            </li>
        </ul>
    </nav>

    <div class="sidenav" id="sidenavigation">
		<a href="../dashboard" >Dashboard</a>
		<a href="../proviewadmin">Suggested Projects</a>
        <a href="../proview">Approved Projects</a>
		<a href="../adminn">Approve Members</a>
		<a href="#" class="active">Delete Member</a>
		
		<a href="../notification" >Notifications</a>
		<a href="../contribution">Contributions</a>		
		<a href="#">Change Password</a>	

	</div>
    <br><br>


<div class="admindashboard">
<h1 id="admin-heading">Chama Members</h1>
    
    <div style="margin-left:20px;" class="form-admin">
   
    <form  name="form" action="../delmemberdb" method="POST">
<table>
	<tr><th>Id</th><th>Username</th><th>Names</th><th>Email</th><th>phone</th><th>Action</th></tr>

<?php
$conn=mysqli_connect("localhost","root","root","local");

$query="select * from users_info";
$result=mysqli_query($conn,$query);
	//let get the item one by one for each individual
	
	while($row=mysqli_fetch_array($result)){
		
		//each entry in the data will be outputted in this format
		?><tr>
            <td><?php echo $row['id']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['Names']; ?></td>
			<td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
          
			<td><button name="btn-email" type="button" value="<?php  $row['id']; ?>" class="btn-delete" onclick="openForm1('<?php echo $row['id']; ?>')">Delete</button></td>
</tr>
<?php
	}
		echo "</table>";
		echo "</form>";
        echo"</div>";
        ?>
</div>
</div>

<div class="form-pop" id="myForm1">

  <form action="../delmemberdb" method="POST" class="form-container">
  
    <h3 style="text-align:center;">Reason for Account Deletion</h3>
    <div class="notview">
    <input type="text" value="<?php echo $row['email']; ?>" name="passing_email" >
    </div>
    <textarea  class="desc" name="projectdisreason" placeholder="Type here ..."  cols=35 rows=10></textarea><br>
    <button id="btn1" type="submit" name="del-email" class="btn1-sendMail">Send</button>
    <button type="button" class="btn2-cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<p id="demo"></p>
<script>
function openForm1(valu) {
    document.getElementById("btn1").value=valu;
    <?php $_SESSION['id-user']?>
    
  document.getElementById("myForm1").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm1").style.display = "none";
}
</script>
<?php
if($_SESSION['completedel']){
    echo "<script>alert('Account Deleted Successfull.');</script>";

    unset($_SESSION['completedel']);
    session_destroy();
}?>