



<?php 
DB_HOST


session_start();

$con = mysqli_connect('sql210.epizy.com', 'DB_USER', 'DB_PASS', 'DB_USER_arms');

if (!$con){

    $_SESSION['connectiondb']="false";

}

else {

     $_SESSION['connectiondb']="true";

}



?>







