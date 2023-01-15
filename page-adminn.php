
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
		<a href="#">Change Password</a>
	

	</div>
<br><br>
<br><br>
<h1 id="admin-heading">Membership Requests</h1>
<div style="margin-left:60px;" class="admindashboard">
   
    <div class="form-admin">
   
    <form  name="form" method="POST" action="../approve/">
<table>
	<tr><th>Id</th> <th>Name</th><th>Phone</th><th>Email</th> <th>Action</th></tr>

<?php
$conn=mysqli_connect("localhost","root","root","local");

$query="select * from register";
$result=mysqli_query($conn,$query);
	//let get the item one by one for each individual
	
	while($row=mysqli_fetch_array($result)){
		
		//each entry in the data will be outputted in this format
		
		?><tr><td><?php echo $row['id']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['email']; ?></td>
			
			<td><button name="btn" type="submit" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">Approve</button></td>
</tr>
<?php
	}


		echo "</table>";
		echo "</form>";
        echo"</div>";


?>


</div>
