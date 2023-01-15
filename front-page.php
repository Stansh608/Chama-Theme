<?php
session_start();
get_header();
//wp_mail("stanleymunene56@gmail.com","Message","hae there","hoobd","C:\Users\stanl\Local Sites\chamaserver\app\public\wp-content\themes\theme_server\img\main-bg1.jpg");

?>

<div id="banner">
        <h1 id="banner-text">Elite Self-Help Group</h1>
        

        <h3 id="banner-text">Secure your future by Investing together</h3><br><br><br>
        <div class="get-started">
        <a href="../signupp" style="color:white; text-decoration:none;">Get Started <b>-></b></a></div>
    </div>

<br>
<main>
       
       <h2 class="section-heading">Welcome to our<?php echo $_SESSION['datt'];?> platform  </h2>
        <br><br>

        <section>
            <div class="card">
                <div class="card-image1">
                    
                        <img src="http://chama.local/wp-content/uploads/2022/03/investments3.jpg" height="200px"width="200px" style="border-radius:100%;" alt="Card Image">
                        
                  
                   
                        <h2>Mission</h2>
                   
                </div>

                <div class="card-description">
                    
                    <p>
                    To provide an <b>informative and real-time automated system</b> for Chamas that saves on both time and costs by being readily available
                    from anywhere and at anytime.                     
                       
                
                  
                    </p>
                    
                </div>
            </div> 
             
            <div class="card">
                
                <div class="card-image1">
                    
                        <img src="http://chama.local/wp-content/uploads/2022/03/invesett.jpg" height="200px"width="200px" style="border-radius:100%;" alt="Card Image">
                        
                  
                   
                        <h2>Vision</h2>
                   
                </div>

                <div class="card-description">
                    
                    <p>
                        
                        Transforming Lives and touching communities by saving time and money through oferring a <b>quick, transparent and interactive</b>
                        Chama System.
                  
                    </p>
                    
                </div>
            </div> 
            
        
            <div class="card">
                <br><br><br>
                <div class="card-image1">
                    
                        <img src="http://chama.local/wp-content/uploads/2022/03/JoinMembership.png" height="200px"width="200px" style="border-radius:100%;" alt="Card Image">
                        
                  
                   
                        <h2>Membership</h2>
                   
                </div>

                <div class="card-description">
                    
                    <p>
                       1. Be a <b>Kenyan citizen</b> aged above 18yrs<br>
                       2. Have basic <b>knowledge about surfing the web</b>.<br>
                       3. Be a person of <b>good conduct</b>. <br> 
                       
                    
                  
                    </p>
                    
                </div>
            </div>
             <div class="card">
                <div class="card-image1">
                    <br><br><br>
                        <img src="http://chama.local/wp-content/uploads/2022/03/1_PcPEL8Sb7fgU6wNNh4fAIA.jpg" height="200px"width="200px" style="border-radius:100%;" alt="Card Image">
                        
                  
                   
                        <h2>Core values</h2>
                   
                </div>

                <div class="card-description">
                    
                    <ol><li><b>Integrity</b></li>
                    <li><b>Safe and Secure</b></li>
                <li><b>Transparency</b></li></ol>
                    
                </div>
            </div>
        
        </section>





       <p class="padd"></p> 
</main>

<?php

$conn=mysqli_connect("localhost","root","root","local");




$d1=strtotime("Today");
$today=strtotime(date("Y-m-d h:i:sa",$d1));

$cont_d=$_SESSION['cont_date'];

$dd1=date("Y-m-d",$cont_d);
$dd2= date("Y-m-d",$today);


$count=0;
if(!$_SESSION['sent']){
if($dd1==$dd2){
    $sql="select email from users_info";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($result)){
        $email=$row['email'];
    
        wp_mail($email,"Contribution Date Alert", "Hi Member!.Today is the contribution day. Make effort and contribute to avoid penalties.");
    }
    $_SESSION['sent']="sent";
}
}
if($cont_d<$today){
    session_unset();
    session_destroy();

}

get_footer();
?>