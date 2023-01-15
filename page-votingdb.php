<?php
session_start();

$conn=mysqli_connect("localhost","root","root","local");
$project=$_POST['proname'];
$identity=$_SESSION['user_loginn'];
$query="update users_info set voteStatus='voted' where username='$identity'";
if(mysqli_query($conn,$query)){
    
    $query1="select * from project where proname='$project'";
    $result=mysqli_query($conn,$query1);
        
        $row=mysqli_fetch_array($result);
            
         $val=$row['votes']; 
         $cash=$row['percent'];
         $total=$val+1;
         $mul=$total*$cash;
         $_SESSION['voted-project']=$project;

    $sql="update project set votes='$total', combination='$mul' where proname='$project'";
    mysqli_query($conn,$sql);
   
    
}


mysqli_close($conn);
header("Location: ../proview");
?>