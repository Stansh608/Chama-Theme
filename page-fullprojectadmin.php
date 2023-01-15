
<?php
session_start();

?>
<?php
get_header();
$conn=mysqli_connect("localhost","root","root","local");
if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
$idi=$_POST['btn'];

$sql="select * from projectrequest where id='$idi'";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);

$author=$row["author"];
$proname=$row["proname"];
$det=$row["det"];
$email=$row["email"];
$descr=$row["descr"];
$capital=$row["capital"];
$ROI=$row["ROI"];
$perod=$row["perod"];

?>
<br><br><br>
<form action="../adminproapprovedb" method="POST">
<?php
echo '<div class="full-project">';
echo"<h2 >The Project Author </h2> $author <br><br>";
echo"<h2>The Project Name </h2> $proname <br><br>";
echo"<h2>The Project  Posting Date </h2> $det <br><br>";
echo"<h2>The Project Description </h2> $descr <br><br>";
echo"<h2>The Project Estimated cost</h2> Ksh: $capital <br><br>";
echo"<h2>The Project Estimated Profit</h2> Ksh: $ROI <br><br>";
echo"<h2>Estimated time to carry out the project in Months </h2> $perod <br><br>";
echo "</div>";
?>
<button type="submit" class="btn1-adminProject" name="btnn"   value="<?php echo $row['id']; ?>">Approve</button>

<input type="button" value="Disapprove" class="btn2-adminProject" onclick="openForm1()">
</form>

<div class="form-pop" id="myForm1">

  <form action="../disapproveprojectdb" method="POST" class="form-container">
    <h3 style="text-align:center;">Reason for Disapproval</h3>
    <div class="notview">
    <input type="text" value="<?php echo $row['email']; ?>" name="passing_email" >
    </div>
    <textarea  class="desc" name="projectdisreason" placeholder="Type here ..."  cols=35 rows=10></textarea><br>
    <button type="submit" name="dis-email" value="<?php echo $row['id']; ?>" class="btn1-sendMail">Send</button>
    <button type="button" class="btn2-cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm1").style.display = "none";
}
</script>
