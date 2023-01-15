<?php


session_start();


get_header();
?>
<script>
    document.getElementById('btnlogin').style.display="none";
    
</script><br><br><br>

		<!--login form-->
        <div class="login_container" >
		<form class="modall-content" method="POST" action="../logindb" id="login" name="form1">
			  
			
				
			  <h1 id="login-header">Log in</h1>
		  
			  <hr>
			  <label for="email"><b>Username</b></label>
			  <input type="text" placeholder="Enter Username" style="font-size:19px;" name="username" required>
		
			  <label for="psw"><b>Password</b></label>
			  <input type="password" placeholder="Enter Password" style="font-size:19px;" name="pass" required>

			  <p id="wrong">Incorrect username or password !</p>	
		
			  <div class="clearfix">
              <div class="clearf">
                  <a href="../signupp">
				<button type="button" id="ben" onclick="" class="cancelbtn">Sign up</button></a>
				</div>
                <div class="clearfi"> <button type="submit" class="signupbtn">Login</button></div>
            </div>
			
			<p><a onclick="openForm()" style="color:dodgerblue"><i>Forgot password?</i></a>.</p>

		
			
            
				
			
		</form>
        </div>
		<form action="../adminlogin" method="post">
			<div ><input class="adminloginbtn" type="submit" value="To admin Login >>"></div><br>
		</form>
 <br><br><br><br>

<style>

</style>



<div class="form-popup" id="myForm">
  <form action="../resetpopupdb" method="POST" class="form-container">
    <h3 style="text-align:center;">Reset Password</h3>
	<br>

    <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usernamepass" required>

    <label for="psw"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="emailpass" required>

    <button type="submit" class="btn">Reset</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>



      <?php  
	  if($_SESSION['error_loginn']){
		?>
		<script>
			document.getElementById('wrong').style.display="block";
		</script>
	<?php
	
	unset($_SESSION['error_loginn']);
	
	}get_footer();
	
	if($_SESSION["resetpasssuccess"]){
		$rr=$_SESSION["resetpasssuccess"];
		echo "<script>alert('A link to reset your password has been sent to $rr .');</script>";

		unset($_SESSION["resetpasssuccess"]);
		
	}
	if($_SESSION["resetpass"]){
		echo "<script>alert('The details does not match any account!!. ');</script>";

		unset($_SESSION["resetpass"]);
		session_destroy();
	}
	if($_SESSION['respass']){
		echo "<script>alert('You changed your Password. Use the new Password to login. ');</script>";
		$_SESSION['respass']=false;
	}
	if(	$_SESSION['sent']){
		echo "<script>alert('An email with a link to login has been sent to your Mail. ');</script>";
		$_SESSION['sent']=false;
	}
	if($_SESSION['user_requestt']){
		echo "<script>";
			echo 'alert("Your membership request is still being processed. Keep Checking your email for notification")';
			echo "</script>";
		unset($_SESSION['user_requestt']);
		session_destroy();
	}

	
	?>