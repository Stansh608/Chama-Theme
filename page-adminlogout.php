<?php
if($_SESSION['admin']){
    unset($_SESSION['admin']);
    session_destroy();
}
header("Location: ../adminlogin");