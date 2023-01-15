<?php
session_start();
get_header();

?>
<br><br><br><br><br><br>
<div class="resetp">
	<form method="POST" action="../resettingdb" name="form1" >
    <h2 style="text-align:center;">Reset Your password</h2>
<br><br>
<label for="psw"><b> New Password</b></label>
			  <input type="password" placeholder="Enter Password" name="pass1" required>
		
			  <label for="psw-repeat"><b>Repeat Password</b></label>
			  <input type="password" placeholder="Repeat Password" name="pass2" required>
              <p id="num">Password mismatch!!!</p><br><br>
              <button type="submit" class="btnreset" name="sign">Reset</button>
              <br><br><br><br><br>
</form>
</div>
<?php
get_footer();

if($_SESSION['mismatch']){
    ?>
    <script>
        document.getElementById('num').style.display="block";
    </script>
    
    <?php
    unset($_SESSION['mismatch']);
  
}
?>