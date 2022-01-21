<?php 
session_start();
$con = mysqli_connect('DB_HOST', 'DB_USER', 'DB_PASS', 'DB_NAME');
if (!$con){
    $_SESSION['connectiondb']="false";
}
else {
     $_SESSION['connectiondb']="true";
}
define('CONTACTFORM_RECAPTCHA_SITE_KEY', 'PLACE_YOUR_OWN');
define('CONTACTFORM_RECAPTCHA_SECRET_KEY', 'PLACE_YOUR_OWN');
?>