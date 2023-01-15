<?php
session_start();
if($_SESSION['user_login']){
    unset($_SESSION['user_login']);
}
session_destroy();
header("Location: ../");
?>
