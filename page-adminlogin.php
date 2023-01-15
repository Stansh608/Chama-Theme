<?php

session_start();

get_header();
?>
<script>
    document.getElementById('btnlogin').style.display="none";
    
</script><br><br><br>
<br>
		<!--login form-->
        <div class="login_container" >
		<form class="modall-content" method="POST" action="../admindb" id="login">
			  
			
				
			  <h1 id="login-header">Admin Login Panel</h1>
		  
			  <hr>
			  <label for="email"><b>Email/Username</b></label>
			  <input type="text" placeholder="Enter Email" name="username" required>
		
			  <label for="psw"><b>Password</b></label>
			  <input type="password" placeholder="Enter Password" name="pass" required>
              
			
			  <p id="wrongad">incorrect username or password!!!!!!!!!</p>  <br>
		
			  <div class="clearfix">
              
                <div id="btnlogadmin"  > <button style="border-radius:10px;" type="submit" class="signupbtn">Login</button></div>
            </div>
			<br><br>
			
			
            
				
			
		</form>
        </div>
 

      <?php 
	  if($_SESSION['error_admin']){
		?>
		<script>
			document.getElementById('wrongad').style.display="block";
		</script>
	<?php
	
	unset($_SESSION['error_admin']);
	
	}
	session_destroy();
	 get_footer();?>