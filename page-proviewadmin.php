
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
		<a href="../adminDashboard" >Dashboard</a>
		<a href="../proviewadmin" class="active">Suggested Projects</a>
        <a href="../proview">Approved Projects</a>
		<a href="../adminn">Approve Members</a>
		<a href="../">Delete Member</a>
		
		<a href="../notification" >Notifications</a>
		<a href="../contribution">Contributions</a>		
		<a href="#">Change Password</a>
		

	</div>
    

   

<br><br>
<br>
<h1 id="admin-heading">Proposed Projects</h1>
<div class="admindashboard">

    
    <div style="margin-left:20px;" class="form-admin">
   
    <form  name="form" method="POST" action="../fullprojectadmin">
<table CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
	<tr><th>Author</th><th>Project Name</th><th>Posted on</th> <th>Action</th></tr>

<?php
$conn=mysqli_connect("localhost","root","root","local");

$query="select * from projectrequest";
$result=mysqli_query($conn,$query);
	//let get the item one by one for each individual
	
	while($row=mysqli_fetch_array($result)){
		
		//each entry in the data will be outputted in this format
		?><tr>
			<td><?php echo $row['author']; ?></td>
			<td><?php echo $row['proname']; ?></td>
			<td><?php echo $row['det']; ?></td>
			
			<td><button name="btn" type="submit" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">view</button></td>
</tr>
<?php
	}
	


		echo "</table>";
		echo "</form>";
        echo"</div>";
        ?>
</div>