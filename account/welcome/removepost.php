<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <title>Profile | Athena</title>

  <meta content="width=device-width, initial-scale=0.7, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/jpg" href="https://athena-dbms.42web.io/account/img/logo.ico" />

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://athena-dbms.42web.io/account/js/sweetalert2.all.min.js"> </script>

  <link rel="stylesheet" href="https://athena-dbms.42web.io/account/css/sweetalert2.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://athena-dbms.42web.io/account/js/ckeditor/ckeditor.js"></script>

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />

  <meta http-equiv="Pragma" content="no-cache" />

  <meta http-equiv="Expires" content="0" />



</head>

<body>

  <style>
    a {

      text-decoration: none;

    }

    label {

      font-weight: bolder;

    }

    @font-face {

      font-family: Orion;

      src: url(https://athena-dbms.42web.io/font/Orion.otf);

    }
  </style>

  <?php

  session_start();

  require_once('../connection.php');

  require_once('function.php');

  $test = $_SESSION['connectiondb'];

  $email = $_SESSION['uname'];

  $status = $_SESSION['status'];

  if ($email == false) {

  ?>

    <link rel="stylesheet" href="https://athena-dbms.42web.io/account/css/style.css" />

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <script>
      Swal.fire({

          title: 'STOP THERE',

          text: "You are trying to enter without proper authorization, authentication & permission. Hence your IP address is copied and will be monitored by Cyber Security Team.",

          icon: 'warning',

          confirmButtonColor: '#d33',

          confirmButtonText: 'Warning'

        })

        .then((value) => {

          location.href = 'https://athena-dbms.42web.io/index.php'

        });
    </script>

  <?php

  } else if ($test == false) {

  ?>

    <link rel="stylesheet" href="https://athena-dbms.42web.io/account/css/style.css" />

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <script>
      Swal.fire({

          title: 'Internal Server Issue !!',

          text: "We weren't able to connect to our servers at this point of time. Please try in some time.",

          icon: 'error',

          confirmButtonColor: '#d73',

          confirmButtonText: 'Continue'

        })

        .then((value) => {

          location.href = 'https://athena-dbms.42web.io/account/welcome/logout.php'

        });
    </script>

    <?php

  } else if (($email == true) && ($test == true) && ($status == "active")) {



    $fetch_data = "SELECT * FROM users WHERE username = '$email'";

    $run_query = mysqli_query($con, $fetch_data);

    $fetch_info = mysqli_fetch_assoc($run_query);

    $id1 = $_GET['remove_encryption_post'];

    $fetch_data1 = "SELECT * FROM posts WHERE id = '$id1'";

    $run_query1 = mysqli_query($con, $fetch_data1);

    $fetch_info1 = mysqli_fetch_assoc($run_query1);

    $xceding = (time() - $_SESSION['last_login_timestamp']);



    if (isset($_GET['remove_encryption_post']) && isset($_POST['delete']) && $fetch_info['role_2'] != "Contributor") {

      DeletePost($con, $id1);

      unset($_POST['delete']);

      echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
    }

    if (isset($_GET['remove_encryption_post']) && isset($_POST['confirm']) && $fetch_info['role_2'] != "Contributor") {

      $res = $_POST['o1'];

      ReviewPost($con, $id1, $res);

      unset($_POST['confirm']);

      echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
    }

    if (isset($_GET['remove_encryption_post']) && $fetch_info['role_2'] != "Contributor") {

    ?>



      <script>
        Swal.fire({

          title: 'DELETE POSTS',

          html: `<style>*{font-family:Arial; padding: 12px; text-align: center; }</style><p>Greetings <?php echo $fetch_info['author']; ?>, <br>You are about to request the author of following post to make the necessary edits: </p><table border="1"><tr><td>Post Title </td><td> <b><?php echo $fetch_info1['title']; ?></b></td></tr><tr><td>Post Category </td><td> <b><?= getCategory($con, $fetch_info1['category_id']) ?></b></td></tr><tr><td>Editor Name </td><td> <b><?= $fetch_info['author'] ?></b></td></tr></table>

  <form action="" method="POST">

  <input type="text" name="o1" id="p1" class="swal2-input" autocomplete="off" placeholder="Reason for Rejection / Deletion" required>



  <input type="submit" name="confirm" onMouseOver="this.style.background='#d49946'" onMouseOut="this.style.background='#f0ad4e'" value="REVIEW" style="color: #ffffff; font-weight: bolder; width: auto; height; auto; display: inline; border-radius: 10px; background:#f0ad4e; font-size: 1rem; margin: 5px; padding: 10px; border:0px;">

  <input type="submit" name="delete" onMouseOver="this.style.background='#c24744'" onMouseOut="this.style.background='#d9534f'" value="DELETE FOREVER" style="color: #ffffff; font-weight: bolder; width: auto; height; auto; display: inline; border-radius: 10px; background:#d9534f; font-size: 1rem; margin: 5px; padding: 10px; border:0px;"></form>`,

          showCancelButton: false,

          showConfirmButton: false,

          focusConfirm: false,

        })
      </script>

    <?php

    } elseif (isset($_GET['retract_post']) && isset($_GET['encryption_id'])) {

      $temp1 = $_GET['retract_post'];

      $temp2 = $_GET['encryption_id'];

      $fetch_data2 = "SELECT * FROM posts WHERE id = '$temp1' AND username = '$temp2'";

      $run_query2 = mysqli_query($con, $fetch_data2);

      $fetch_info2 = mysqli_fetch_assoc($run_query2);

      if ($temp2 == $email && $fetch_info2['status'] == "Pending") {

        $query1 = "UPDATE posts SET status ='Draft' WHERE id='$temp1' AND username = '$temp2'";

        $run_q = mysqli_query($con, $query1);

        $d = mysqli_fetch_assoc($run_q);

        echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
      } elseif ($temp2 == $email && $fetch_info2['status'] == "Draft") {

        $query1 = "DELETE FROM posts WHERE id='$temp1' AND username = '$temp2'";

        $run_q = mysqli_query($con, $query1);

        $d = mysqli_fetch_assoc($run_q);

        echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
      } else {

        echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
      }
    } else {

      echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
    }
  } else if (($email == true) && ($test == true) && ($status == "inactive")) {

    $fetch_data = "SELECT * FROM users WHERE username = '$email'";

    $run_query = mysqli_query($con, $fetch_data);

    $fetch_info = mysqli_fetch_assoc($run_query);

    $xceding = (time() - $_SESSION['last_login_timestamp']);

    if ($xceding > 899) {

      session_destroy();

    ?>



      <link rel="stylesheet" href="https://athena-dbms.42web.io/account/css/style.css" />

      <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

      <script>
        Swal.fire({

            title: 'SESSION TIMED OUT !!',

            text: "You are now redirected to the homepage. Please contact us at hariket.sukeshkumar2020@gmail.com for any queries.",

            icon: 'warning',

            confirmButtonColor: '#d63',

            confirmButtonText: 'Continue'

          })

          .then((value) => {

            location.href = 'https://athena-dbms.42web.io/account/welcome/logout.php'

          });
      </script>



    <?php

    } else {

    ?>



      <link rel="stylesheet" href="https://athena-dbms.42web.io/account/css/style.css" />

      <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

      <script>
        Swal.fire({

            title: 'Sorry <?php echo $fetch_info['name'] ?>',

            text: "You are trying to get into your account the wrong way. Your account is currently inactive. Please do notify us at hariket.sukeshkumar2020@gmail.com for re-activation.",

            icon: 'info',

            confirmButtonColor: '#0af',

            confirmButtonText: 'Continue'

          })

          .then((value) => {

            location.href = 'https://athena-dbms.42web.io/account/welcome/logout.php'

          });
      </script>



  <?php

    }
  } else {

    echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/logout.php'</script>";
  }



  ?>

</body>

</html>