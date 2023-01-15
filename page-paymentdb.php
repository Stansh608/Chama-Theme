<?php



session_start();
if(isset($_POST['pay'])){
    $phonenumber=$_POST['phone-no'];
    $amount=$_POST['amount'];

        $url="https://tinypesa.com/api/v1/express/initialize";
        $data = array(
            'amount' => $amount,
            'msisdn' => $phonenumber,
            'account_no'=>'0190177461948'
        );
        $headers = array(
            "Content-Type: application/x-www-form-urlencoded",
            "ApiKey: iTzsGSeZKrl"
        );
        $options = array(
            'http' => array(
                'header' => $headers,
                'method' => 'POST',
                'content' => http_build_query($data)
            )
            );
            $context = stream_context_create($options);
            $resp = file_get_contents($url, false, $context);
           // var_dump($resp);


            

}
$user=$_SESSION['user_loginn'];
$det=date("Y-m-d h:i:sa");

$conn=mysqli_connect("localhost","root","root","local");
$sql="insert into payment(username,phone, amount,det)values('$user','$phonenumber','$amount','$det')";
mysqli_query($conn, $sql);
mysqli_close($conn);

header("Location: ../dashboard");
?>