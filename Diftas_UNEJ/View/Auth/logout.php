<?php 
require_once 'config/config.php';
session_start();
$_SESSION['session_id'] = "";
$_SESSION['session_password'] = "";
$_SESSION['stat_admin'] = "";
session_destroy();

$cookie_name = "cookie_user";
$cookie_value = "";
$time = time() - (60 * 60);
setcookie($cookie_name,$cookie_value,$time,"/");

$cookie_name = "cookie_password";
$cookie_value = "";
$time = time() - (60 * 60);
setcookie($cookie_name,$cookie_value,$time,"/");

$cookie_name = "cookie_stat_admin";
$cookie_value = "";
$time = time() - (60 * 60);
setcookie($cookie_name,$cookie_value,$time,"/");
header("location: " .BASEURL);