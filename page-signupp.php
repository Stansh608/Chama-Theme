
<?php 
session_start();
get_header();
?>

		<!--login form-->
		<br><br><br><br>
        <div class="login_container" >
		<form method="POST" action="../signupdb" name="form1" >
		
        <h1 id="login-header"> Sign Up Platform</h1>
        <hr>
			  <label for="email"><b>Username</b></label>

			  <input type="text" placeholder="Enter username" name="username" required>
			  <p id="uname" style="color:red; display:none;">Username already taken!!</p><br><br>
			  <label for="email"><b>Full Names</b></label>
			  <input type="text" placeholder="First_Name                     Second_Name" name="names" required>
			  <label for="email"><b>Email</b></label>
			  <input type="email" placeholder="Enter Email" name="email" required>
			  <label for="email"><b>Phone</b></label>
			  <input id="phn" type="number" onblur="check()" placeholder="0700000000" name="phone"  required>
			  <p id="num">This Phone number has already been used to create an account</p><br><br>
		
			  <label for="psw"><b>Password</b></label>
			  <input type="password" id="passw" onblur="checkpassword()" placeholder="Enter Password" name="passw" required>
		<p id="passm" style="color:red"></p>
			  <label for="psw-repeat"><b>Repeat Password</b></label>
			  <input type="password" placeholder="Repeat Password" name="passw-rep" required>
			  <p id="pass">Password mismatch!!</p><br><br>
			  	
			  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
		
			  <div class="clearfix">
				<button type="button" onclick="document.getElementById('popup').style.display='none'" class="cancelbtn">Cancel</button>
				<button id="sbtn" type="submit" class="signupbtn" name="sign">Sign Up</button>
                </div>
        </form>
</div>
<script>
	function check(){
		var a=document.getElementById("phn").value;
		if(a.length<10 || a.length>10 ){
			document.getElementById("num").style.display="block";
			document.getElementById("num").innerHTML="The phone number should be 10 numbers";
			document.getElementById("sbtn").disabled=true;

		}else{
			document.getElementById("num").style.display="none";
			document.getElementById("sbtn").disabled=false;

		}
		}
		function checkpassword(){
		var b=document.getElementById("passw").value;
		if(b.length<6 ){
			document.getElementById("passm").style.display="block";
			document.getElementById("passm").innerHTML="The password must be more than six characters";
			document.getElementById("sbtn").disabled=true;

		}else{
			document.getElementById("passm").style.display="none";
			document.getElementById("sbtn").disabled=false;

		}

	}
</script>

<?php

if($_SESSION['phone']){
		?>
		<script>
			document.getElementById('num').style.display="block";
		</script>
	<?php
	
	$_SESSION['phone']=false;
	
}
if($_SESSION['error']){
		?>
		<script>
			document.getElementById('pass').style.display="block";
		</script>
	<?php
	
	$_SESSION['error']=false;
	
}
if($_SESSION['uname']){
	?>
	<script>
		document.getElementById('uname').style.display="block";
	</script>
<?php

$_SESSION['uname']=false;

}
?>
<br><br><br>