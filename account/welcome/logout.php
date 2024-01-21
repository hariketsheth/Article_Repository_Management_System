<?php

session_start();

if(isset($_SESSION['uname'])){

    session_destroy();

    echo "<script>location.href='https://pdc-fallsem.42web.io/'</script>";

}

else {

  echo "<script>location.href='https://pdc-fallsem.42web.io/index.php'</script>";  

}

?>