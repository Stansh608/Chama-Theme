<?php 
session_start();

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


  

    <nav style="top:0;left:0;">
        <div id="logo-img">
            <a href="#">
                <img src="http://chamaserver.local/wp-content/uploads/2021/10/elitedev_logo-1.png" alt="EliteDevs Logo">
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
<?php

$conn=mysqli_connect("localhost","root","root","local");
$sql="select * from selected_project";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);
$author=$row["author"];

$proname=$row["proname"];
$descr=$row["descr"];
$capital=$row["capital"];
$ROI=$row["ROI"];
$det=$row["det"];
$perod=$row["perod"];
$moth=$row["moth"];
$equip=$row["equip"];
$labour=$row["labour"];
$material=$row["material"];
$utility=$row["utility"];
$vote=$row["votes"];
$percent=$row["percent"];


?>

<body style="background:black;">
    <br><br><br><p class="padd"></p>
    <input class="btnPrint" type="button" value="Print" style="width:10%;" onclick="printProject()">
    <div class="budget" id="budg">
        <div class="titles">
        <p class="probudgethead"><b>Project Name:</b> <?php echo $proname ?></p>
        <p > 	&nbsp;<b> Author's Name:   &nbsp;</b><?php echo $author ?></p>
        <p> 	&nbsp; <b>Starting Date:</b>   &nbsp;  &nbsp;<?php echo $det ?> 	&nbsp; 	&nbsp; 	&nbsp; 	&nbsp; 	&nbsp;	&nbsp;	&nbsp;  &nbsp;   &nbsp;    &nbsp;   &nbsp;  &nbsp;	&nbsp;	&nbsp;<b>Duration: 
</b>  &nbsp;  &nbsp;<?php echo $perod." ".$moth;?><br><br></p> 

        </div>
        <div class="analysis">
            <b>Lobs:</b> <?php echo $vote ?>  &nbsp;  &nbsp;  &nbsp;  &nbsp; <b>Cash Analysis:</b> <?php echo $percent ?>%
        </div>
        <h2 style="margin-left:100px;"> <u>Expenditure Breakdown</u></h2>
        <div class="budgetbody">
           
            <p> <b>Equipment Costs:</b> &nbsp; &nbsp;Kshs <?php echo $equip ?>.00 </p>
            <p> <b>Labour Costs:</b> &nbsp;  &nbsp;&nbsp;     &nbsp; &nbsp; Kshs <?php echo $labour ?>.00 </p>
            <p> <b>Material Costs: </b>&nbsp;  &nbsp;     &nbsp; &nbsp; Kshs <?php echo $material ?>.00 </p>
            <p> <b>Utility Costs:</b> &nbsp;   &nbsp;  &nbsp;&nbsp;  &nbsp;     &nbsp; &nbsp;Kshs <?php echo $utility ?>.00 </p>
            

            
            
        </div>
        <table width=95% style="margin-left:20px; " ><tr><th>Capital Required</th><th>Return on Investments</th><th>Expected Profit</th></tr>
            <tr><td>Kshs <?php echo $capital ?>.00</td><td>Kshs <?php echo $ROI ?>.00</td><td>Kshs <?php echo $ROI-$capital ?>.00</td></tr> 
            </table>
            <br><br>
            <div class="copy" style="text-align:center;"><i>2021 / copyrights Elite self-help Group</i></div>
    </div>
    



    
<script>
        function printProject() {
            var divContents = document.getElementById("budg").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h1 style="text-align:center;">The Project Budget </h1><br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>

</body>
</html>