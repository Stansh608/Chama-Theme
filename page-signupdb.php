<?php
session_start();

$conn=mysqli_connect("localhost","root","root","local");
$username=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['passw'];
$password1=$_POST['passw-rep'];
$Names=$_POST['names'];
session_start();
if(!($password==$password1)){

    
    $_SESSION['error']=$password;

    header('Location: ../signupp');
    exit;
    
}
$sql="select * from users_info where username='$username'";
$resllt=mysqli_query($conn,$sql);
if(mysqli_fetch_array($resllt))
{
    
    $_SESSION['uname']="same";
    header('Location: ../signupp');
}

$sql="select * from users_info where phone='$phone'";
$resullt=mysqli_query($conn,$sql);
if(mysqli_fetch_array($resullt))
{
    session_start();
    $_SESSION['phone']="same";
    header('Location: ../signupp');
}





$query="insert into register(username,Names, email,phone,pass)values('$username','$Names','$email','$phone','$password')";
if(mysqli_query($conn,$query)){
    $_SESSION['approval']=$username;
    //echo "Account Created Successfully";
    
    
    
}

mysqli_close($conn);
get_header();
?>
<br><br><br>
<html>
    <br><br><br><br><br><br><br><br><br><br><br>
    <h3 style="text-align:center;">Your membership request has been sent succcessfully. It now awaits approval</h3><br><br>
    <h4 style="text-align:center;">As soon as Your Account Is approved You will receive an email notification TO: <?php echo "$email"; ?></h4><br><br>
    <div class="proceed">
        <a href="http://chama.local" style="color: blue;">Homepage>></a> </div>
    </html>
    <br><br>

<?php
get_footer();
?>