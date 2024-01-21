<?php 
session_start();
$con = mysqli_connect('sql210.epizy.com', 'epiz_29868134', 'RHfJN2hyR34WY', 'epiz_29868134_arms');
if (!$con){
    $_SESSION['connectiondb']="false";
}
else {
     $_SESSION['connectiondb']="true";
}
define('CONTACTFORM_RECAPTCHA_SITE_KEY', '6LcQCtYcAAAAANwwq1q_QWUlpdq40sCQmEj511Fs');
define('CONTACTFORM_RECAPTCHA_SECRET_KEY', '6LcQCtYcAAAAAPtWTFt_S1q_-icOALu-1Kn1kQQ0');

?>



