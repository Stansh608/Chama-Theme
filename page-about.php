<?php
session_start();
/*
if(!isset($_SESSION['user_loginn'])){
  header("Location: ../login");
}
*/

get_header();






if($_SESSION['user_loginn']){

  ?>
  <script>
    document.getElementById('signup').style.display='none';
    document.getElementById('login').style.display='none';
    document.getElementById('home').style.display='none';


  </script>
  <?php
}
?>
<br>
<hr>

<h2 class="about-head">EliteDevs Web Applications Developers</h2>
<hr>
<p class="aboutp">
    
We specialise in web application development bringing your vision for a interactive web experience to reality.

<b>Fast, efficient</b> web applications with <b>excellent user experience</b> are what we do best.

And it's not just about what you see.
 We make sure the code base behind the scenes is well written and easily maintainable.
  This means future upgrades or extensions to your webapp are built on top notch foundations.</p><br>


  <p class="aboutp">

  Let us build you a clean and professional website/webapp on a solid foundation of robust technologies,
   well written code and with SEO friendly HTML.
  </p>


















<?php
get_footer();

if(!($_SESSION['user_loginn'])){
  header("Location: ../");
  exit;
}
?>

