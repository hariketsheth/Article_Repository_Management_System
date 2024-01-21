

<?php 

session_start();
$con = mysqli_connect('sql210.epizy.com', 'epiz_29868134', 'RHfJN2hyR34WY', 'epiz_29868134_arms');
if (!$con){
    $_SESSION['connectiondb']="false";
}
else {
     $_SESSION['connectiondb']="true";
}

?>



