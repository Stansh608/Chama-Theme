<?php 
session_start();
if(!isset($_SESSION['user_loginn'])){
    header("Location: ../adminlogin");
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

<body style="background:wheat;">
  

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
                <a id="hom1" style="background:#020a2b; display:none; " href="../adminDashboard"><i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a id="hom2" style="background:#020a2b;" href="../dashboard"><i class="fas fa-home"></i>Home</a>
            </li>
           
            <li>
                <a href="../logout">Log out</a>
            </li>
           
            <li>
                
            </li>
        </ul>
    </nav>
    <div class="sidenav" id="sidenavigation" style="display; "><br><br>
		<a href="../adminDashboard" >Dashboard</a>
		<a href="../proviewadmin" >Suggested Projects</a>
        <a href="../proview" class="active">Approved Projects</a>
		<a href="../adminn">Approve Members</a>
		<a href="../delmember">Delete Member</a>
		
		<a href="../notification" >Notifications</a>
		<a href="../contribution">Contributions</a>		
		<a href="../adminpass">Change Password</a>
			

	</div>
    

<br><br>
<br><br>
<div id="projectd">
<h1 id="admin-heading">Approved  Projects </h1>
<br>
<?php
$conn=mysqli_connect("localhost","root","root","local");
$sq="select det as Date from project";
$re=mysqli_query($conn, $sq);
$ro=mysqli_fetch_array($re);

$dat=strtotime($ro['Date']);
$dateNow=strtotime(date("Y-m-d h:i:sa",$dat));
$fdate=strtotime("+3 days", $dateNow);
$toda=strtotime("Today");
$todayN=strtotime(date("Y-m-d h:i:sa",$toda));
$_SESSION['DATE']=$fdate;

$count=0;
while ($todayN < $fdate) {
    $count+=1;
    $todayN = strtotime("+1 Day", $todayN);
  }


?>
<div class="dispDays"><marquee> <?php echo $count; ?> Days Remaining to closure of Lobbing</marquee></div>
    
    <div  id="form-admin">
   
    <form  name="form" method="POST" action="../fullproject/">
<table CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
	<tr><th>Author</th><th>Project Name</th><th>Approved on</th><th>Lobs</th> <th>Cash Analysis</th>
    <th>Action</th></tr>

<?php
$conn=mysqli_connect("localhost","root","root","local");
$ordercol="combination";
$order="desc";
$query="select * from project ORDER BY ".$ordercol. " ". $order;
$result=mysqli_query($conn,$query);
	//let get the item one by one for each individual
	
	while($row=mysqli_fetch_array($result)){
		
		//each entry in the data will be outputted in this format
		?><tr>
			<td><?php echo $row['author']; ?></td>
			<td><?php echo $row['proname']; ?></td>
			<td><?php echo $row['det']; ?></td>
            <td><?php echo $row['votes']; ?></td>
            <td><?php echo $row['percent']; ?>%</td>
			
			<td><button name="btn" type="submit" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">view</button></td>
</tr>
<?php
	}

	//session_destroy();


		echo "</table>";
		echo "</form>";
        echo"</div>";


        



?>
</div>
<div class="budgetview" id="budgetview" style="display:none;">
<br>
<?php

if($_SESSION['user_loginn']){
    ?>
    <script>
      
        document.getElementById('sidenavigation').style.display="none";
       
    </script>
<?php
}
?>
<div class="contentb">
<p class="head"><u>ONGOING PROJECT </u></p>
<p>You cannot view a list of project in this page because <b>A project was selected  and is currently been worked on. </b>Once the 
    Project is completed you will have access to a variety of projects where you can read more about each and 
express your thoughts via <b>Lobbing</b>. 
<br>
</p>
<p class="head"><u>Selected Project Details </u></p>

<div class="selectinfo">
    <form action="../budget" method="post">
    <input class="budgetbtn" type="submit" value="Project Budget">
    </form>
    <form action="../selectedproject" method="post">
    <input class="budgetbtn" type="submit" value="Project Information">
    </form>
</div>
<br><br><br>
</div>

</div>
<?php
if ($count==0){

    $conn=mysqli_connect("localhost","root","root","local");

   /* $fdate=$_SESSION['DATE'];
    
    $final=date("Y-m-d", $fdate);
    $finaldate = new DateTime($final);
    $today = new DateTime(date("Y-m-d"));
    
    $pos_diff = $today->diff($finaldate)->format("%r%a");
    
   */
   if($ro>0){
   
    
    $ordercol="combination";
    $order="desc";
    $query="select * from project ORDER BY ".$ordercol. " ". $order;
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $author=$row["author"];
    
    $proname=$row["proname"];
    $descr=$row["descr"];
    $capital=$row["capital"];
    $ROI=$row["ROI"];
    $perod=$row["perod"];
    $moth=$row["moth"];
    $equip=$row["equipment"];
    $labour=$row["labour"];
    $material=$row["material"];
    $utility=$row["utility"];
    $vote=$row["votes"];
    $percent=$row["percent"];
    
    $dat=strtotime("Today");
    $fulld=strtotime(date("Y-m-d h:i:sa",$dat));
    $det= date("d M Y",$fulld);
    //Pick a project
    $sql="insert into selected_project(author,proname,descr,capital,equip,material,labour,utility,ROI,perod,moth,percent,votes,det)
    values('$author','$proname','$descr','$capital','$equip','$material','$labour','$utility','$ROI','$perod','$moth','$percent','$vote','$det')";
    mysqli_query($conn,$sql);
    
    //Delete all the other Projects
    $querydel="DELETE FROM project";
    mysqli_query($conn,$querydel);
    
    
   }
    ?>
    <script>
        document.getElementById("projectd").style.display="none";
        document.getElementById("budgetview").style.display="block";
           

    </script>
    
    
    
    
    
    <?php
}
?>
