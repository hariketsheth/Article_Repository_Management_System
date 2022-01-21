<?php

session_start();

if (isset($_SESSION['uname'])) {

  session_destroy();
  echo "<script>location.href='https://athena-dbms.42web.io/'</script>";
} else {

  echo "<script>location.href='https://athena-dbms.42web.io/index.php'</script>";
}
?>