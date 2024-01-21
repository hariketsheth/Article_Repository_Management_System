
<?php 
session_start();
$con = mysqli_connect('sql210.epizy.com', 'epiz_29868134', 'RHfJN2hyR34WY', 'epiz_29868134_arms');
if (!$con){
    $_SESSION['connectiondb']="false";
}
else {
     $_SESSION['connectiondb']="true";
}

define('CONTACTFORM_RECAPTCHA_SITE_KEY', '6Lc97uMiAAAAANO7vVT1Bco4nz-5eYFQ2-MBFz7e');
define('CONTACTFORM_RECAPTCHA_SECRET_KEY', '6Lc97uMiAAAAANtRbXZStVRlRyCe6n-5xJ1oMwwj');
?>

