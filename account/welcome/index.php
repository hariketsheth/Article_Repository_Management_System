<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile | Athena</title>
    <meta content="width=device-width, initial-scale=0.4, maximum-scale=1" name="viewport">
    <link rel="icon" type="image/jpg" href="https://athena-dbms.42web.io/account/img/logo.ico" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://athena-dbms.42web.io/account/js/sweetalert2.all.min.js"> </script>
    <link rel="stylesheet" href="https://athena-dbms.42web.io/account/css/sweetalert2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://athena-dbms.42web.io/account/js/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />


    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
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
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    session_start();
    include('../connection.php');
    $test = $_SESSION['connectiondb'];
    $email = $_SESSION['uname'];
    $status11  = $_SESSION['status'];
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
                    allowOutsideClick: false,
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
                    allowOutsideClick: false,
                    confirmButtonText: 'Continue'
                })
                .then((value) => {
                    location.href = 'https://athena-dbms.42web.io/account/welcome/logout.php'
                });
        </script>
        <?php
    } else if (($email == true) && ($test == true) && ($status11 == "active")) {

        $fetch_data = "SELECT * FROM users WHERE username = '$email'";
        $run_query = mysqli_query($con, $fetch_data);
        $fetch_info = mysqli_fetch_assoc($run_query);

        $fetch_data1 = "SELECT * FROM pwd_change WHERE username = '$email'";
        $run_query1 = mysqli_query($con, $fetch_data1);
        $fetch_info2 = mysqli_fetch_assoc($run_query1);

        $xceding = (time() - $_SESSION['last_login_timestamp']);
        if ($xceding > 7200) {
            session_destroy();
        ?>

            <link rel="stylesheet" href="https://athena-dbms.42web.io/css/style.css" />
            <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
            <script>
                Swal.fire({
                        title: 'SESSION TIMED OUT !!',
                        text: "You were automatically logged out from your account due to inactivity of more than 2 Hours.",
                        icon: 'warning',
                        confirmButtonColor: '#d63',
                        allowOutsideClick: false,
                        confirmButtonText: 'Continue'
                    })
                    .then((value) => {
                        location.href = 'https://athena-dbms.42web.io/account/welcome/logout.php'
                    });
            </script>

            <?php
        } else {
            if ($xceding > 0 && $xceding < 72) {
            ?>
                <script>
                    window.addEventListener('load', () => {
                        var loader = document.querySelector(".loaderwww");
                        loader.classList.add('loadwww-finish');

                    });
                </script>
                <style>
                    .loaderwww {
                        background-color: #000;
                        height: 104vh;
                        width: 100%;
                        overflow-x: hidden;
                        overflow-y: hidden;
                        position: fixed;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        transition: opacity 1.5s 1s ease-in-out;
                        z-index: 100;
                        margin-top: -50px;
                    }

                    .loaderwww img {
                        width: 50%;
                        animation: fade_in 1.5s;
                    }

                    .loadwww-finish {
                        opacity: 0;
                        pointer-events: none;
                    }
                </style>
                <div class="loaderwww">
                    <img src="https://athena-dbms.42web.io/account/img/welcome.png" alt="Welcome!!" class="img-fluid">
                </div>
            <?php
            }
            require('function.php');
            $fetch_data = "SELECT * FROM users WHERE username = '" . $_SESSION['uname'] . "'";
            $fetch_data1 = "SELECT * FROM pwd_change WHERE username = '" . $_SESSION['uname'] . "'";
            $run_query = mysqli_query($con, $fetch_data);
            $run_query1 = mysqli_query($con, $fetch_data1);
            $fetch_info = mysqli_fetch_assoc($run_query);
            $fetch_info1 = mysqli_fetch_assoc($run_query1);

            if ($fetch_info['role_3'] == "inactive" && (!isset($_POST['update1']))) { ?>
                <script>
                    setTimeout(function() {
                        const steps = ['1', '2', '3']
                        const swalQueueStep = Swal.mixin({
                            confirmButtonText: 'Next',
                            cancelButtonText: 'Back',
                            progressSteps: steps,
                            reverseButtons: true,
                        })
                        async function backAndForth() {
                            const values = []
                            let currentStep
                            for (currentStep = 0; currentStep < steps.length;) {
                                if (steps[currentStep] == 1) {
                                    var result = await swalQueueStep.fire({
                                        allowOutsideClick: false,
                                        title: '!! WELCOME !!',
                                        html: '<p>Greetings <?= $fetch_info["fullname"] ?><br><br><img style="border-radius: 100%;" src="../img/logo.png" width="90" height="90"><img src="https://i.gifer.com/4vss.gif" width="90" height="90"><br><br>Welcome to <b>Athena.</b> Since this is your first time contributing to our blog - Kindly do follow the instructions mentioned to ensure that your contributions are handled properly and are helpful to the viewers. <br><br>After completing, further permissions would be provided to you ! Happy Contributing',
                                        showCancelButton: currentStep > 0,
                                        currentProgressStep: currentStep
                                    })
                                } else if (steps[currentStep] == 2) {
                                    var result = await swalQueueStep.fire({
                                        allowOutsideClick: false,
                                        title: 'INSTRUCTIONS',
                                        html: '<br><ol><li><b><u>What is Author Profile? </u></b> - The details entered in the Author profile would be made available with all of your published blogs. The users would be able to connect and contact with you in case of any doubts / queries.</li><li><b><u>Mandatory Fields</u></b> - Apart from Author Name (The name which has to be displayed on the blogs), we also request you to fill in atleast one of your social media profile handles</li></ol>',
                                        showCancelButton: currentStep > 0,
                                        currentProgressStep: currentStep
                                    })
                                } else if (steps[currentStep] == 3) {
                                    var result = await swalQueueStep.fire({
                                        allowOutsideClick: false,
                                        title: 'REVIEW AND SUGGESTIONS',
                                        html: '<ul><li>Your contributions would be sent for review to our editor team, who could request you for some improvements (if any) and then your Blog would be finally published</li><li>Suggestions - You are free to suggest any blog category which you think is missing and should be there. We will review your suggestions and revert back to you</li></ul>',
                                        inputValue: values[currentStep],
                                        showCancelButton: currentStep > 0,
                                        currentProgressStep: currentStep
                                    })
                                } else {
                                    break
                                }
                                if (result.value) {
                                    values[currentStep] = result.value
                                    currentStep++
                                } else if (result.dismiss === 'cancel') {
                                    currentStep--
                                } else {
                                    break
                                }
                            }
                        }
                        backAndForth();

                    }, 4500);
                </script>
                <?php }
            $old_stat = '"enabled"';
            $expire = date_create(date_format(date_create($fetch_info1['time_e_pwd']), "Y-m-d"));
            $today = date("Y-m-d");
            $today = date_create(date_format($today, "Y-m-d"));
            $diff = date_diff($today, $expire);
            if ($diff->format('%R') == '+') {
                if ($diff->format('%a') == '0') {
                    $result1 = mysqli_query($con, "UPDATE pwd_change SET password_change = '$old_stat' WHERE username = '$email'");
                }
            } else {
                $result1 = mysqli_query($con, "UPDATE pwd_change SET password_change = '$old_stat' WHERE username = '$email'");
            }
            $diff = $diff->format("%a");
            if ($diff > 1) {
                $diff = $diff . " days";
            } else {
                $diff = $diff . " day";
            }
            if ($fetch_info['author'] != NULL && ($fetch_info['github'] != NULL || $fetch_info['facebook'] != NULL || $fetch_info['instagram'] != NULL || $fetch_info['twitter'] != NULL || $fetch_info['linkedin'] != NULL || $fetch_info['website'] != NULL)) {
                $result2 = mysqli_query($con, "UPDATE users SET role_3 = 'active' WHERE username = '$email'");
                $d = mysqli_fetch_assoc($result2);
            } else {
                $result2 = mysqli_query($con, "UPDATE users SET role_3 = 'inactive' WHERE username = '$email'");
                $d = mysqli_fetch_assoc($result2);
            }
            if ($fetch_info['github'] == NULL && $fetch_info['facebook'] == NULL && $fetch_info['instagram'] == NULL && $fetch_info['twitter'] == NULL && $fetch_info['linkedin'] == NULL && $fetch_info['website'] == NULL) {
                $result2 = mysqli_query($con, "UPDATE users SET role_3 = 'inactive' WHERE username = '$email'");
                $d = mysqli_fetch_assoc($result2);
            }
            if ($fetch_info['author'] == NULL) {
                $result2 = mysqli_query($con, "UPDATE users SET role_3 = 'inactive' WHERE username = '$email'");
                $d = mysqli_fetch_assoc($result2);
            }

            if (isset($_POST['update3'])) {
                $categ_name = $_POST['form1-update-categname'];
                $categ_reason = $_POST['form1-update-categreason'];
                $author = $fetch_info['username'];
                $query1 = mysqli_query($con, "insert into category(name, status, author, reason) values ('$categ_name', 'Pending', '$author', '$categ_reason')");
                if ($query1) {
                ?>
                    <script>
                        Swal.fire({
                                title: 'Thanks for your Suggestion ! ',
                                html: "Our Team wlll be reviewing your suggestion. Upon Approval, the category would be available to all the users. ",
                                icon: 'success',
                                confirmButtonColor: '#5cb85c',
                                confirmButtonText: 'Continue',
                                allowOutsideClick: false
                            })
                            .then((value) => {
                                location.href = 'https://athena-dbms.42web.io/account/welcome/index.php'
                            });
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        Swal.fire({
                                title: '#ERROR !!',
                                html: "Due to some issue, the details entered weren't saved properly. <br><br><b>We request you to send your suggestion again once the internal issue is rectified. </b>",
                                icon: 'error',
                                confirmButtonColor: '#d9534f',
                                confirmButtonText: 'Continue',
                                allowOutsideClick: false
                            })
                            .then((value) => {
                                location.href = 'https://athena-dbms.42web.io/account/welcome/index.php'
                            });
                    </script>

                <?php
                }
            }

            require('comments.php');
            if (isset($_POST['update1'])) {
                $name = $_POST['form1-update-name'];
                $photo = $_POST['form1-update-photo'];
                $author = $_POST['form1-update-author'];
                $email1 = $_POST['form1-update-email'];
                $phone = '+91-' . $_POST['form1-update-phone'];
                $bio = $_POST['form1-update-bio'];
                $github = $_POST['github'];
                $instagram = $_POST['instagram'];
                $twitter = $_POST['twitter'];
                $facebook = $_POST['facebook'];
                $website = $_POST['website'];
                $linkedin = $_POST['linkedin'];
                $result11 = mysqli_query($con, "UPDATE users SET author='$author', fullname='$name', photo='$photo', bio='$bio', email='$email1' , phone='$phone' , github='$github', instagram='$instagram',  facebook='$facebook',  twitter='$twitter',  linkedin='$linkedin',  website='$website' WHERE username='$email'");

                if ($result11) {
                ?>
                    <script>
                        Swal.fire({
                                title: 'AUTHOR PROFILE UPDATED',
                                html: "Your information is updated in our records. <br><br> Please note that the data provided would be used for your author profile in blogs posted by you.<br><b>Please refresh your page, in case the changes made aren't visible</b>",
                                icon: 'success',
                                confirmButtonColor: '#5cb85c',
                                confirmButtonText: 'Continue',
                                allowOutsideClick: false
                            })
                            .then((value) => {
                                location.href = 'https://athena-dbms.42web.io/account/welcome/index.php'
                            });
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        Swal.fire({
                                title: '#ERROR !!',
                                html: "Due to some issue, the details entered weren't saved properly. <br><br><b>Please do update your details again.</b>",
                                icon: 'error',
                                confirmButtonColor: '#d9534f',
                                confirmButtonText: 'Continue',
                                allowOutsideClick: false
                            })
                            .then((value) => {
                                location.href = 'index.php'
                            });
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>
                <?php
                }
            }

            if (isset($_GET['category_del'])) {
                $temp = $_GET['category_del'];
                if ($fetch_info['role_2'] != "Contributor") {
                    DeleteCategory($con, $temp);
                    echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
                }
            }
            if (isset($_GET['category_aprv'])) {
                $temp = $_GET['category_aprv'];
                if ($fetch_info['role_2'] != "Contributor") {
                    ApproveCategory($con, $temp);
                    echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
                }
            }
            if (isset($_GET['publish_successful'])) {
                $temp = $_GET['publish_successful'];
                if ($fetch_info['role_2'] != "Contributor") {
                    PublishPost($con, $temp);
                    echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
                }
            }

            if (isset($_GET['send_successful']) && isset($_GET['encryption_id'])) {
                $temp1 = $_GET['send_successful'];
                $temp2 = $_GET['encryption_id'];
                $fetch_data2 = "SELECT * FROM posts WHERE id = '$temp1' AND username = '$temp2'";
                $run_query2 = mysqli_query($con, $fetch_data2);
                $fetch_info2 = mysqli_fetch_assoc($run_query2);
                if ($temp2 == $email && $fetch_info2['status'] == "Draft") {
                    $query1 = "UPDATE posts SET status ='Pending' WHERE id='$temp1' AND username = '$temp2'";
                    $run_q = mysqli_query($con, $query1);
                    $d = mysqli_fetch_assoc($run_q);
                    echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
                } else {
                    echo "<script>location.href='https://athena-dbms.42web.io/account/welcome/index.php';</script>";
                }
            }
            if (isset($_POST['add_submit']) || isset($_POST['add_draft'])) {
                $username = $email;
                $title = $_POST['post_title'];
                $header = $_POST['post_image'];
                $content = $_POST['editor1'];
                $status = ((isset($_POST['add_submit'])) ? "Pending" : "Draft");
                $category = $_POST['post_category'];
                $query1 = mysqli_query($con, "insert into posts(username, title, header, content, status, category_id) values ('$username', '$title', '$header', '$content', '$status', '$category')");
                if ($query1) {
                ?>
                    <script>
                        Swal.fire({
                                title: 'Super ! Successful Contribution',
                                html: "Thank you, <?= $fetch_info['author'] ?> for your contribution. Your blog <b>(<?= $title ?>)</b> is sent to our Editing Team for Review. Please keep checking the portal for the status of your posted blogs.",
                                icon: 'success',
                                confirmButtonColor: '#5cb85c',
                                confirmButtonText: 'Continue',
                                allowOutsideClick: false
                            })
                            .then((value) => {
                                location.href = 'https://athena-dbms.42web.io/account/welcome/index.php#mypost'
                            });
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        Swal.fire({
                                title: '#ERROR !!',
                                html: "Due to some issue, the post wasn't saved properly. <br><br><b>We request you to add your contributions once the internal issue is rectified. </b>",
                                icon: 'error',
                                confirmButtonColor: '#d9534f',
                                confirmButtonText: 'Continue',
                                allowOutsideClick: false
                            .then((value) => {
                                location.href = 'https://athena-dbms.42web.io/account/welcome/index.php'
                            });
                    </script>

                <?php
                }
                ?>
                <script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>
                <?php
            }

            if (isset($_POST['update2'])) {
                if ($fetch_info1['password_change'] == '"disabled"') {
                ?>
                    <script>
                        Swal.fire({
                            title: 'RECENT PASSWORD CHANGE',
                            html: 'Password cannot be changed since you recently changed your password. <br><br>Password can be changed again only after:<b style="color:#d9534f;"> <?php echo $diff; ?></b>',
                            icon: 'warning',
                            confirmButtonColor: '#e83',
                            allowOutsideClick: false
                        })
                    </script>
                    <?php
                } else {
                    $check = false;
                    $new_pass = $_POST['new_pass'];
                    $new_stat = '"' . 'disabled' . '"';
                    $date = date("Y-m-d 00:00:00");
                    $date_change = $date;
                    $date = date_create($date);
                    date_add($date, date_interval_create_from_date_string("31 days"));
                    $date_expiry = date_format($date, "Y-m-d 00:00:00");

                    if ($_COOKIE['s1'] == true && $_COOKIE['s2'] == true && $_COOKIE['s3'] == true && $_COOKIE['s4'] == true && $_COOKIE['s5'] == true) {
                        $check = true;
                    }
                    if ($_POST['old_pass'] != $fetch_info['codekey'] || $check == false) {
                    ?>
                        <script>
                            Swal.fire({
                                    title: '#ERROR !!',
                                    html: "Please satisfy all the conditions mentioned for changing the Password. <br><br><b>Please do update your details again.</b>",
                                    icon: 'error',
                                    confirmButtonColor: '#d9534f',
                                    confirmButtonText: 'Continue',
                                    allowOutsideClick: false
                                })
                                .then((value) => {
                                    location.href = 'https://athena-dbms.42web.io/account/welcome/index.php'
                                });
                        </script>
                        <?php
                    } else {
                        $result1 = mysqli_query($con, "UPDATE users SET codekey='$new_pass' WHERE username='$email'");
                        $result2 = mysqli_query($con, "UPDATE pwd_change SET codekey='$new_pass', password_change='$new_stat', time_s_pwd='$date_change', time_e_pwd='$date_expiry' WHERE username='$email'");
                        if ($result1 && $result2) {
                        ?>
                            <script>
                                Swal.fire({
                                    title: 'Password Changed Successfully !!',
                                    text: "You have changed your account password, <?php echo $fetch_info['fullname']; ?>.",
                                    footer: "In case of login issues with new password, Please mail at hariket.sukeshkumar2020@gmail.com. We will provide a temporary password, in case of genuine issues.",
                                    icon: 'success',
                                    confirmButtonColor: '#5cb85c',
                                    confirmButtonText: 'Next',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.isConfirmed) {

                                        Swal.fire({
                                                confirmButtonText: 'Continue',
                                                confirmButtonColor: '#5bc0de',
                                                allowOutsideClick: false,
                                                icon: 'info',
                                                title: 'INSTRUCTIONS',
                                                text: 'Greetings <?php echo $fetch_info['fullname ']; ?>, Since your password has changed, Please use the new password to login.'
                                            })
                                            .then((value) => {
                                                location.href = 'https://athena-dbms.42web.io/account/welcome/logout.php'
                                            });
                                    }
                                })
                            </script>

                        <?php
                        } else {
                        ?>
                            <script>
                                Swal.fire({
                                        title: '#ERROR !!',
                                        html: "Due to some issue, the details entered weren't saved properly. <br><br><b>We request you to update it again once the internal issue is rectified. </b>",
                                        icon: 'error',
                                        confirmButtonColor: '#d9534f',
                                        confirmButtonText: 'Continue',
                                        allowOutsideClick: false
                                    })
                                    .then((value) => {
                                        location.href = 'https://athena-dbms.42web.io/account/welcome/index.php'
                                    });
                            </script>

            <?php
                        }
                    }
                }
            }
            ?>
            <section class="py-5 my-5">
                <div class="container">
                    <div class="shadow rounded-lg d-block d-sm-flex" style="background: rgba( 255, 255, 255, 0.93); background-image: url('https://athena-dbms.42web.io/account/img/logo.png'); background-blend-mode: overlay; background-size: contain; background-position: center;  background-repeat: no-repeat;">
                        <div class="profile-tab-nav border-right">
                            <div class="p-4">
                                <div class="img-circle text-center mb-3">
                                    <?php
                                    if ($fetch_info['photo'] == '') {
                                        if ($fetch_info['gender'] == "male" || $fetch_info['gender'] == "others") {
                                    ?>
                                            <img src="https://bit.ly/3xgJuiM" alt="Image" class="shadow">
                                        <?php
                                        } elseif ($fetch_info['gender'] == "female") {
                                        ?>
                                            <img src="https://bit.ly/3Cb76ZO" alt="Image" class="shadow">
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <img src=<?php echo $fetch_info['photo']; ?> alt="Image" class="shadow">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                                <h4 class="text-center"><?php echo $fetch_info['fullname']; ?></h4>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                                    <i class="fa fa-home text-center mr-1"></i>
                                    Account
                                </a>
                                <?php if ($fetch_info['role_3'] == "active") { ?>
                                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                                        <i class="fa fa-key text-center mr-1"></i>
                                        Password
                                    </a>
                                    <a class="nav-link" id="addpost-tab" data-toggle="pill" href="#addpost" role="tab" aria-controls="addpost" aria-selected="false">
                                        <i class="fa fa-plus-circle text-center mr-1"></i>
                                        Add Posts
                                    </a>
                                  <a class="nav-link" id="addDpost-tab" data-toggle="pill" href="#addDpost" role="tab" aria-controls="addDpost" aria-selected="false">
                                        <i class="fa fa-plus-circle text-center mr-1"></i>
                                        Add Draft Posts
                                    </a>
                                    <?php if ($fetch_info['role_2'] == "Admin") { ?>
                                        <a class="nav-link" id="users-tab" data-toggle="pill" href="#users" role="tab" aria-controls="users" aria-selected="false">
                                            <i class="fa fa-users text-center mr-1"></i>
                                            Manage Users
                                        </a><?php } ?>
                                    <?php if ($fetch_info['role_2'] == "Admin") { ?>
                                        <a class="nav-link" id="visitors-tab" data-toggle="pill" href="#visitors" role="tab" aria-controls="visitors" aria-selected="false">
                                            <i class="fa fa-user text-center mr-1"></i>
                                            Manage Visitors
                                        </a><?php } ?>
                                    <?php if ($fetch_info['role_2'] == "Admin") { ?>
                                        <a class="nav-link" id="dbback-tab" data-toggle="pill" href="#dbback" role="tab" aria-controls="dbback" aria-selected="false">
                                            <i class="fa fa-database text-center mr-1"></i>
                                            Database Backup
                                        </a><?php } ?>
                                    <?php if ($fetch_info['role_2'] == "Admin" || $fetch_info['role_2'] == "Editor") { ?>
                                        <a class="nav-link" id="posts-tab" data-toggle="pill" href="#posts" role="tab" aria-controls="posts" aria-selected="false">
                                            <i class="fa fa-file text-center mr-1"></i>
                                            Manage Posts
                                        </a><?php } ?>
                                    <a class="nav-link" id="mypost-tab" data-toggle="pill" href="#mypost" role="tab" aria-controls="mypost" aria-selected="false">
                                        <i class="fa fa-code text-center mr-1"></i>
                                        My Posts
                                    </a>
                                    <a class="nav-link" id="managecomment-tab" data-toggle="pill" href="#managecomment" role="tab" aria-controls="managecomment" aria-selected="false">
                                        <i class="fa fa-sitemap" text-center mr-1"></i>
                                        Manage Comments
                                    </a>
                                    <a class="nav-link" id="category-tab" data-toggle="pill" href="#category" role="tab" aria-controls="category" aria-selected="false">
                                        <i class="fa fa-pencil-square text-center mr-1"></i>
                                        Suggest Categories
                                    </a>
                                    <?php if ($fetch_info['role_2'] == "Admin" || $fetch_info['role_2'] == "Editor") { ?>
                                        <a class="nav-link" id="managecat-tab" data-toggle="pill" href="#managecat" role="tab" aria-controls="managecat" aria-selected="false">
                                            <i class="fa fa-sitemap" text-center mr-1"></i>
                                            Manage Categories
                                        </a><?php }
                                    } ?>
                                <a class="nav-link" id="logout-tab" data-toggle="pill" href="#logout" role="tab" aria-controls="logout" aria-selected="false">
                                    <i class="fa fa-arrow-circle-right text-center mr-3"></i>
                                    Logout
                                </a>
                                <br><br>
                            </div>
                        </div>
                        <style>
                            .required-field::after {
                                content: " *";
                                color: red;
                            }
                        </style>
                        <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <h3 class="mb-4" style="font-family: Orion;">Account Settings</h3>
                                <form action=" " method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username: <button disabled="true" style="cursor: not-allowed;  color: #fff; width: auto; height; auto; display: inline; border-radius: 10px; background: #17a2b8; font-size: 1.1rem; margin: 1px; padding: 6px 30px 6px 25px; border:0px;"><b><?php echo '@' . $fetch_info['username']; ?></b></button></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label class="required-field">Author / Pen Name <i>(Name displayed on
                                                        blogs)</i></label>
                                                <input type="text" class="form-control" autocomplete="off" name="form1-update-author" value=<?php echo '"' . $fetch_info['author'] . '"'; ?> required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required-field">Full Name</label>
                                                <input type="text" class="form-control" autocomplete="off" name="form1-update-name" value=<?php echo '"' . $fetch_info['fullname'] . '"'; ?> required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required-field">Email</label>
                                                <input type="email" class="form-control" autocomplete="off" name="form1-update-email" value=<?php echo '"' . $fetch_info['email'] . '"'; ?> required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required-field">Phone number</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">+91</span>
                                                    </div>
                                                    <input type="text" class="form-control" autocomplete="off" name="form1-update-phone" value=<?php echo '"' . explode("-", $fetch_info['phone'])[1] . '"'; ?> required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Profile Picture</label>

                                                <input type="text" class="form-control" autocomplete="off" name="form1-update-photo" value=<?php echo '"' . $fetch_info['photo'] . '"'; ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Role</label>
                                                <input type="text" class="form-control" autocomplete="off" value=<?php echo '"' . $fetch_info['role_2'] . '"'; ?> disabled="true">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bio</label><br>
                                                <small><i>Author Profile will not save the details if the bio is too-long. Keep
                                                        the bio short and within 250 words. </i></small>
                                                <textarea type="text" class="form-control" name="form1-update-bio" rows="4" placeholder="Tell Us More About You !! "><?php echo $fetch_info['bio']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <style>
                                                table {
                                                    margin: 0px;
                                                }

                                                td {
                                                    padding: 10px;
                                                }
                                            </style>
                                            <br>
                                            <h3 style="font-family: Orion;">Social Media Profiles</h3>
                                            <table>
                                                <tr>
                                                    <td><label class="col-sm-2.8 col-form-label"><i class="fa fa-github"></i>
                                                            Github:</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                            </div>
                                                            <input type="text" class="form-control" name="github" id="github" value="<?= $fetch_info['github'] ?>" placeholder="Github Username">
                                                        </div>
                                                    </td>
                                                    <td><label class="col-sm-2.8 col-form-label" style="margin: 7px;"><i class="fa fa-instagram"></i> Instagram:</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                            </div>
                                                            <input type="text" class="form-control" name="instagram" id="instagram" value="<?= $fetch_info['instagram'] ?>" placeholder="Instagram Username">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <label class="col-sm-2.8 col-form-label"><i class="fa fa-linkedin"></i>
                                                            LinkedIn:</label></td>
                                                    <td> <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?= $fetch_info['linkedin'] ?>" placeholder="LinkedIn Profile URL"></td>
                                                    <td><label class="col-sm-2.8 col-form-label"><i class="fa fa-twitter"></i>
                                                            Twitter:</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                            </div>
                                                            <input type="text" class="form-control" id="twitter" name="twitter" value="<?= $fetch_info['twitter'] ?>" placeholder="Twitter Username">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <label class="col-sm-2.8 col-form-label"><i class="fa fa-facebook"></i>
                                                            Facebook:</label></td>
                                                    <td> <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $fetch_info['facebook'] ?>" placeholder="Facebook Profile URL"></td>
                                                    <td><label class="col-sm-2.8 col-form-label"><i class="fa fa-globe"></i>
                                                            Website:</label></td>
                                                    <td><input type="text" class="form-control" id="website" name="website" value="<?= $fetch_info['website'] ?>" placeholder="Website URL"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div>
                                        <br><br>
                                        <input type="submit" class="btn btn-primary" value="Update" name="update1">
                                        <button class="btn btn-light">Cancel</button>
                                    </div>
                                </form>
                            </div>

                            <?php if ($fetch_info['role_3'] == "active") { ?>
                                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Password Settings</h3>
                                    <form action=" " method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Old password</label>
                                                    <input type="password" class="form-control pd2-password-validation" name="old_pass" autocomplete="off" required />
                                                    <small class="pd2-password-message form-text text-muted"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>New password</label>
                                                    <input type="password" class="form-control pd-password-validation" name="new_pass" autocomplete="off" required />
                                                    <small class="pd-password-message form-text text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Confirm new password</label>
                                                    <input type="password" class="form-control pd1-password-validation" autocomplete="off" required />
                                                    <small class="pd1-password-message form-text text-muted"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <style>
                                            .pd-password-valid {
                                                color: #5cb85c;
                                            }

                                            .pd-password-valid:before {
                                                left: -5px;
                                                content: "✔ ";
                                            }

                                            .pd-password-invalid {
                                                color: #d9534f;
                                            }

                                            .pd-password-invalid:before {
                                                left: -5px;
                                                content: "✖ ";
                                            }

                                            .pd-password-message h3 {
                                                font-size: 12px;
                                                margin-top: 10px;
                                            }

                                            .pd-password-message p {
                                                margin: 7px 0 0 0;
                                            }
                                        </style>
                                        <script>
                                            var true1 = "true";
                                            var false1 = "false";
                                            class POD {
                                                passwordValidation() {
                                                    var passValidate = document.querySelector('.pd-password-validation');
                                                    passValidate.setAttribute('title',
                                                        'Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters'
                                                    );
                                                    var passMessage = document.querySelector('.pd-password-message');
                                                    if (passMessage) {
                                                        passMessage.innerHTML = passValidate.getAttribute('title');
                                                    }
                                                    passValidate.addEventListener('blur', function() {
                                                        passMessage.innerHTML = passValidate.getAttribute('title');
                                                    });
                                                    passValidate.addEventListener('keyup', function() {
                                                        var passInfo = '';
                                                        passInfo +=
                                                            '<h3><b>Password must contain the following:</b></h3>';
                                                        passInfo +=
                                                            '<p style="font-weight: 350px;" id="pd-password-letter" class="pd-password-invalid">Only one or more <b>lowercase</b> letter</p>'
                                                        passInfo +=
                                                            '<p style="font-weight: 350px;" id="pd-password-capital" class="pd-password-invalid">Only one or more <b>capital (uppercase)</b> letter</p>'
                                                        passInfo +=
                                                            '<p style="font-weight: 350px;" id="pd-password-number" class="pd-password-invalid">Only one or more <b>number</b></p>'
                                                        passInfo +=
                                                            '<p style="font-weight: 350px;" id="pd-password-length" class="pd-password-invalid">Minimum <b>8 characters</b> letter or number</p>'
                                                        passMessage.innerHTML = passInfo;
                                                        var lowerCaseLetters = /[a-z]/g;
                                                        var letter = document.getElementById('pd-password-letter');
                                                        if (passValidate.value.match(lowerCaseLetters)) {
                                                            letter.classList.remove("pd-password-invalid");
                                                            letter.classList.add("pd-password-valid");
                                                            document.cookie = "s1=" + true1;
                                                        } else {
                                                            letter.classList.remove("pd-password-valid");
                                                            letter.classList.add("pd-password-invalid");
                                                            document.cookie = "s1=" + false1;
                                                        }
                                                        var upperCaseLetters = /[A-Z]/g;
                                                        var capital = document.getElementById('pd-password-capital');
                                                        if (passValidate.value.match(upperCaseLetters)) {
                                                            capital.classList.remove("pd-password-invalid");
                                                            capital.classList.add("pd-password-valid");
                                                            document.cookie = "s2=" + true1;
                                                        } else {
                                                            capital.classList.remove("pd-password-valid");
                                                            capital.classList.add("pd-password-invalid");
                                                            document.cookie = "s2=" + false1;
                                                        }
                                                        var numbers = /[0-9]/g;
                                                        var number = document.getElementById('pd-password-number');
                                                        if (passValidate.value.match(numbers)) {
                                                            number.classList.remove("pd-password-invalid");
                                                            number.classList.add("pd-password-valid");
                                                            document.cookie = "s3=" + true1;
                                                        } else {
                                                            number.classList.remove("pd-password-valid");
                                                            number.classList.add("pd-password-invalid");
                                                            document.cookie = "s3=" + false1;
                                                        }
                                                        var length = document.getElementById('pd-password-length');
                                                        if (passValidate.value.length >= 8) {
                                                            length.classList.remove("pd-password-invalid");
                                                            length.classList.add("pd-password-valid");
                                                            document.cookie = "s4=" + true1;
                                                        } else {
                                                            length.classList.remove("pd-password-valid");
                                                            length.classList.add("pd-password-invalid");
                                                            document.cookie = "s4=" + false1;
                                                        }
                                                    });
                                                }

                                                checkpass() {
                                                    var passValidate = document.querySelector('.pd-password-validation');
                                                    var passValidate1 = document.querySelector('.pd1-password-validation');
                                                    passValidate1.setAttribute('title', 'Both Passwords should match!');
                                                    var passMessage = document.querySelector('.pd1-password-message');
                                                    passValidate1.addEventListener('keyup', function() {
                                                        var passInfo = '';
                                                        passInfo +=
                                                            '<p style="font-weight: 350px; display: none;" id="pd-password-l1" class="pd-password-invalid"><b>PASSWORDS DO NOT MATCH! </b></p>'
                                                        passInfo +=
                                                            '<p style="font-weight: 350px; display: none;" id="pd-password-l2" class="pd-password-valid"><b>PASSWORDS MATCH! </b></p>'
                                                        passMessage.innerHTML = passInfo;

                                                        if (passValidate1.value == passValidate.value) {
                                                            document.getElementById("pd-password-l1").style.display =
                                                                "none";
                                                            document.getElementById("pd-password-l2").style.display =
                                                                "block";
                                                            document.cookie = "s5=" + true1;
                                                        } else {
                                                            document.getElementById("pd-password-l1").style.display =
                                                                "block";
                                                            document.getElementById("pd-password-l2").style.display =
                                                                "none";
                                                            document.cookie = "s5=" + false1;
                                                        }
                                                    });
                                                }

                                            }
                                            let pass = new POD();
                                            pass.passwordValidation();
                                            pass.checkpass();
                                        </script>
                                        <div>
                                            <input type="submit" class="btn btn-success" value="Change Password" name="update2">
                                            <a href="https://athena-dbms.42web.io/account/welcome/index.php"><button type="button" class="btn btn-light">Cancel</button></a>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Manage Users</h3>
                                    <div class="row" style="overflow-y:auto; height: 550px;">
                                        <div class="col-lg-12">
                                            <section class="panel">

                                                <table id="myTable" class="table table-striped table-advance table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <?php
                                                        $users = getAllUsers($con, $fetch_info['username']);
                                                        $count = 1;
                                                        foreach ($users as $user) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $user['fullname'] ?></td>
                                                                <td><?= $user['username'] ?></td>
                                                                <td><?php $fstatus = getUserStatus($con, $user);
                                                                    if ($fstatus == "Active2") {
                                                                    ?>
                                                                        Active | <b><?= $user['role_2'] ?>
                                                                        <?php
                                                                    } else {
                                                                        echo $fstatus;
                                                                    }
                                                                        ?></td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Options
                                                                        </button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                                                            <?php if ($user['role_2'] != "Contributor") { ?><a style="text-decoration:none;" href="manageusers.php?encryption_id"><button class="dropdown-item" type="button">Role:
                                                                                        Contributor</button></a><?php } ?>
                                                                            <?php if ($user['role_2'] != "Editor") { ?><button class="dropdown-item" type="button">Role:
                                                                                    Editor</button><?php } ?>
                                                                            <?php if ($user['role_2'] != "Adminr") { ?><button class="dropdown-item" type="button">Role:
                                                                                    Administrator</button><?php } ?>
                                                                            <?php if ($user['role_1'] != "inactive") { ?><button class="dropdown-item" type="button">Account:
                                                                                    Block</button><?php } ?>
                                                                            <?php if ($user['role_1'] != "active") { ?><button class="dropdown-item" type="button">Account:
                                                                                    Unblock</button><?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="visitors" role="tabpanel" aria-labelledby="visitors-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Manage Visitors</h3>
                                    <div class="btn-group"><a href="https://athena-dbms.42web.io/account/FPDF/tuto5.php" style="color: #fff;" class="btn btn-success"><b><?= "Generate Authenticated Report" ?></b></a></div><br><br>
                                    <div class="row" style="overflow-y:auto; height: 550px;">
                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <table class="table table-striped table-advance table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th>User Details</th>
                                                            <th>Link</th>
                                                            <th>Time</th>
                                                        </tr>
                                                        <?php
                                                        $visitors = manageVisit($con);
                                                        $count = 1;
                                                        foreach ($visitors as $visitor) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="btn-group"><a style="color: #fff;" class="btn btn-info"><?= "IP Address: " ?><b><?= $visitor['ip_address'] ?></b></a></div>
                                                                    <br><?= "MAC Address: " . $visitor['mac_address'] ?>
                                                                </td>
                                                                <td><?= $visitor['link'] ?></td>
                                                                <td><?= $visitor['time_created_at'] ?></td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Manage Posts</h3>
                                    <div class="row" style="overflow-y:auto; height: 550px;">
                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <table class="table table-striped table-advance table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Category</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr style="background-color: rgba(240,173,78,0.7);">
                                                            <th colspan="4" style="text-align: center; color: #fff;">PENDING</th>
                                                        </tr>
                                                        <?php
                                                        $posts = getAllPost($con, 0);
                                                        if (empty($posts)) { ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;">No Pending Articles</td>
                                                            </tr>
                                                        <?php }
                                                        $count = 1;
                                                        foreach ($posts as $post) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $post['title'] ?></td>
                                                                <td><?= getCategory($con, $post['category_id']) ?></td>
                                                                <td><?= $post['status'] ?></td>

                                                                <td style="width: 290px;">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-success <?= ((($post['status'] == 'Published') || ($fetch_info['role_2'] != 'Admin')) ? 'disabled' : '') ?>" href="?publish_successful=<?= $post['id'] ?>">Publish<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-primary <?= (($post['status'] == 'Published') ? 'disabled' : '') ?>" href="editpost.php?encryption_post=<?= $post['id'] ?>">Review<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-danger" style="color: #fff;" href="removepost.php?remove_encryption_post=<?= $post['id'] ?>"><?= ((($post['status'] == "In Review") || ($post['status'] == "Pending")) ? "Reject" : "Remove") ?><i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td height="50" colspan="4"></td>
                                                        </tr>
                                                        <tr style="background-color: rgba(2,117,216,0.7);">
                                                            <th colspan="4" style="text-align: center; color: #fff;">IN REVIEW</th>
                                                        </tr>
                                                        <?php
                                                        $posts = getAllPost($con, 1);
                                                        if (empty($posts)) { ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;">No Articles In Review</td>
                                                            </tr>
                                                        <?php }
                                                        $count = 1;
                                                        foreach ($posts as $post) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $post['title'] ?></td>
                                                                <td><?= getCategory($con, $post['category_id']) ?></td>
                                                                <td><?= $post['status'] ?></td>

                                                                <td style="width: 290px;">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-success <?= ((($post['status'] == 'Published') || ($fetch_info['role_2'] != 'Admin')) ? 'disabled' : '') ?>" href="?publish_successful=<?= $post['id'] ?>">Publish<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-primary <?= (($post['status'] == 'Published') ? 'disabled' : '') ?>" href="editpost.php?encryption_post=<?= $post['id'] ?>">Review<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-danger" style="color: #fff;" href="removepost.php?remove_encryption_post=<?= $post['id'] ?>"><?= ((($post['status'] == "In Review") || ($post['status'] == "Pending")) ? "Reject" : "Remove") ?><i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td height="50" colspan="4"></td>
                                                        </tr>
                                                        <tr style="background-color: rgba(92,184,92,0.7);">
                                                            <th colspan="4" style="text-align: center; color: #fff;">PUBLISHED</th>
                                                        </tr>
                                                        <?php
                                                        $posts = getAllPost($con, 2);
                                                        if (empty($posts)) { ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;"> No Published Articles</td>
                                                            </tr>
                                                        <?php }
                                                        $count = 1;
                                                        foreach ($posts as $post) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $post['title'] ?></td>
                                                                <td><?= getCategory($con, $post['category_id']) ?></td>
                                                                <td><?= $post['status'] ?></td>

                                                                <td style="width: 290px;">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-success <?= ((($post['status'] == 'Published') || ($fetch_info['role_2'] != 'Admin')) ? 'disabled' : '') ?>" href="?publish_successful=<?= $post['id'] ?>">Publish<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-primary <?= (($post['status'] == 'Published') ? 'disabled' : '') ?>" href="editpost.php?encryption_post=<?= $post['id'] ?>">Review<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-danger" style="color: #fff;" href="removepost.php?remove_encryption_post=<?= $post['id'] ?>"><?= ((($post['status'] == "In Review") || ($post['status'] == "Pending")) ? "Reject" : "Remove") ?><i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="addpost" role="tabpanel" aria-labelledby="addpost-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Add Posts</h3>
                                    <div class="col-lg-12">
                                        <section class="panel">
                                            <div class="panel-body">
                                                <div class="form">
                                                    <form action=" " method="POST" class="form-horizontal">

                                                        <hr style="border-width: 5px;">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <label class="required-field">Post Title</label>
                                                                <input style="display: inline;" type="text" class="form-control" name="post_title" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-sm-6">
                                                                <div class="col-sm-12">
                                                                    <label class="required-field">Select Post Category</label>

                                                                    <select name="post_category" class="form-control" required>
                                                                        <?php
                                                                        $categories = getAllCategory($con);
                                                                        foreach ($categories as $ct) {
                                                                        ?>
                                                                            <option value=<?php echo '"' . $ct['id'] . '"'; ?>>
                                                                                <?php echo $ct['name']; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <div class="col-sm-12">
                                                                    <label class="required-field">Header Blog Photo</label>

                                                                    <input type="text" class="form-control" name="post_image" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <div class="col-sm-12">
                                                                <label class="required-field">Post Content</label>
                                                                <textarea class="form-control ckeditor" id="editor1" name="editor1" rows="10" required></textarea>
                                                            </div>
                                                        </div>
                                                        <hr style="border-width: 5px;">
                                                        <div class="form-group row">
                                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Author
                                                                Name</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" id="colFormLabel" value="<?= $fetch_info['author'] ?>" disabled="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Date</label>
                                                            <div class="col-sm-5">
                                                                <?php $date = new DateTime("now", new DateTimeZone('Asia/Kolkata')); ?>
                                                                <input type="text" class="form-control" id="colFormLabel" value="<?= $date->format('d/m/Y') ?>" disabled="true">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <input type="submit" name="add_submit" class="btn btn-success" value="Submit">
                                                        <input type="submit" name="add_draft" class="btn btn-primary" value="Save as Draft">
                                                        <input type="button" name="add_cancel" class="btn btn-secondary" value="Cancel">
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="addDpost" role="tabpanel" aria-labelledby="addpost-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Add Draft Posts</h3>
                                    <div class="col-lg-12">
                                        <section class="panel">
                                            <div class="panel-body">
                                                <div class="form">
                                                    <form action=" " method="POST" class="form-horizontal">

                                                        <hr style="border-width: 5px;">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <label class="required-field">Post Title</label>
                                                                <input style="display: inline;" type="text" class="form-control" name="post_title" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-sm-6">
                                                                <div class="col-sm-12">
                                                                    <label class="required-field">Select Post Category</label>

                                                                    <select name="post_category" class="form-control" required>
                                                                        <?php
                                                                        $categories = getAllCategory($con);
                                                                        foreach ($categories as $ct) {
                                                                        ?>
                                                                            <option value=<?php echo '"' . $ct['id'] . '"'; ?>>
                                                                                <?php echo $ct['name']; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <div class="col-sm-12">
                                                                    <label class="required-field">Header Blog Photo</label>

                                                                    <input type="text" class="form-control" name="post_image" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <div class="col-sm-12">
                                                                <label class="required-field">Post Content</label>
                                                                <textarea class="form-control ckeditor" id="editor1" name="editor1" rows="10" required></textarea>
                                                            </div>
                                                        </div>
                                                        <hr style="border-width: 5px;">
                                                        <div class="form-group row">
                                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Author
                                                                Name</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" id="colFormLabel" value="<?= $fetch_info['author'] ?>" disabled="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Date</label>
                                                            <div class="col-sm-5">
                                                                <?php $date = new DateTime("now", new DateTimeZone('Asia/Kolkata')); ?>
                                                                <input type="text" class="form-control" id="colFormLabel" value="<?= $date->format('d/m/Y') ?>" disabled="true">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <input type="submit" name="add_submit" class="btn btn-success" value="Submit">
                                                        <input type="submit" name="add_draft" class="btn btn-primary" value="Save as Draft">
                                                        <input type="button" name="add_cancel" class="btn btn-secondary" value="Cancel">
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            
                                <div class="tab-pane fade" id="dbback" role="tabpanel" aria-labelledby="dbback-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Add Posts</h3>
                                    <div class="col-lg-12">
                                        <section class="panel">
                                            <div class="panel-body">

                                            </div>
                                        </section>
                                    </div>
                                </div>
                                
                                 <div class="tab-pane fade" id="dbback" role="tabpanel" aria-labelledby="dbback-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Add Draft Posts</h3>
                                    <div class="col-lg-12">
                                        <section class="panel">
                                            <div class="panel-body">

                                            </div>
                                        </section>
                                    </div>
                                </div>    
                                <div class="tab-pane fade" id="mypost" role="tabpanel" aria-labelledby="mypost-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">My Posts</h3>
                                    <div class="row" style="overflow-y:auto; height: 550px; width: auto;">
                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <table class="table table-striped table-advance table-hover" style="overflow-y:scroll;">
                                                    <tbody>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Status</th>
                                                            <th>Comments</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr style="background-color: rgba(23,162,184,0.7);">
                                                            <th colspan="4" style="text-align: center; color: #fff;">DRAFTS</th>
                                                        </tr>
                                                        <?php
                                                        $posts = getPost($con, $email, 0);
                                                        if (empty($posts)) { ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;">No Drafts Saved Yet</td>
                                                            </tr>
                                                        <?php }
                                                        $count = 1;
                                                        foreach ($posts as $post) {
                                                        ?>
                                                            <tr>
                                                                <?php $prev_link = "https://athena-dbms.42web.io/preview.php?post_link=" . $post['id']; ?>
                                                                <td><?= $post['title'] ?></td>
                                                                <td><?= $post['status'] ?></td>
                                                                <td><?= $post['reason'] ?></td>
                                                                <td style="width: 290px;">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-success" href=<?php echo '"' . $prev_link . '"'; ?>>View</a>

                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-info <?= (($post['status'] != 'Draft') ? 'disabled' : '') ?>" href="?send_successful=<?= $post['id'] ?>&encryption_id=<?= $fetch_info['username'] ?>">Send<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-primary <?= (($post['status'] != 'Draft') ? 'disabled' : '') ?>" href="editpost.php?encryption_post=<?= $post['id'] ?>">Edit<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-danger <?= ((($post['status'] == 'Published') || ($post['status'] == 'In Review')) ? 'disabled' : '') ?>" href="removepost.php?retract_post=<?= $post['id'] ?>&encryption_id=<?= $fetch_info['username'] ?>"><?= ((($post['status'] == "In Review") || ($post['status'] == "Pending")) ? "Retract" : "Delete") ?><i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td height="50" colspan="4"></td>
                                                        </tr>
                                                        <tr style="background-color: rgba(2,117,216,0.7);">
                                                            <th colspan="4" style="text-align: center; color: #fff;">PENDING / IN
                                                                REVIEW</th>
                                                        </tr>
                                                        <?php
                                                        $posts = getPost($con, $email, 1);
                                                        if (empty($posts)) { ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;">No Posts currently In Review
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                        $count = 1;
                                                        foreach ($posts as $post) {
                                                        ?>
                                                            <tr>
                                                                <?php $prev_link = "https://athena-dbms.42web.io/preview.php?post_link=" . $post['id']; ?>
                                                                <td><?= $post['title'] ?></td>
                                                                <td><?= $post['status'] ?></td>
                                                                <td><?= $post['reason'] ?></td>
                                                                <td style="width: 290px;">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-success" href=<?php echo '"' . $prev_link . '"'; ?>>View</a>

                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-info <?= (($post['status'] != 'Draft') ? 'disabled' : '') ?>" href="?send_successful=<?= $post['id'] ?>&encryption_id=<?= $fetch_info['username'] ?>">Send<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-primary <?= (($post['status'] != 'Draft') ? 'disabled' : '') ?>" href="../includes/removepost.php?id=<?= $post['id'] ?>">Edit<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-danger <?= ((($post['status'] == 'Published') || ($post['status'] == 'In Review')) ? 'disabled' : '') ?>" href="removepost.php?retract_post=<?= $post['id'] ?>&encryption_id=<?= $fetch_info['username'] ?>"><?= ((($post['status'] == "In Review") || ($post['status'] == "Pending")) ? "Retract" : "Delete") ?><i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td height="50" colspan="4"></td>
                                                        </tr>
                                                        <tr style="background-color: rgba(92,184,92,0.7);">
                                                            <th colspan="4" style="text-align: center; color: #fff;">PUBLISHED</th>
                                                        </tr>
                                                        <?php
                                                        $posts = getPost($con, $email, 2);
                                                        if (empty($posts)) { ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;">No Published Posts</td>
                                                            </tr>
                                                        <?php }
                                                        $count = 1;
                                                        foreach ($posts as $post) {
                                                        ?>
                                                            <tr>
                                                                <?php $prev_link = "https://athena-dbms.42web.io/preview.php?post_link=" . $post['id']; ?>
                                                                <td><?= $post['title'] ?></td>
                                                                <td><?= $post['status'] ?></td>
                                                                <td><?= $post['reason'] ?></td>
                                                                <td style="width: 290px;">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-success" href=<?php echo '"' . $prev_link . '"'; ?>>View</a>

                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-info <?= (($post['status'] != 'Draft') ? 'disabled' : '') ?>" href="?send_successful=<?= $post['id'] ?>&encryption_id=<?= $fetch_info['username'] ?>">Send<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-primary <?= (($post['status'] != 'Draft') ? 'disabled' : '') ?>" href="../includes/removepost.php?id=<?= $post['id'] ?>">Edit<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-danger <?= ((($post['status'] == 'Published') || ($post['status'] == 'In Review')) ? 'disabled' : '') ?>" href="removepost.php?retract_post=<?= $post['id'] ?>&encryption_id=<?= $fetch_info['username'] ?>"><?= ((($post['status'] == "In Review") || ($post['status'] == "Pending")) ? "Retract" : "Delete") ?><i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="managecomment" role="tabpanel" aria-labelledby="managecomment-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Manage Comments</h3>
                                    <div class="row" style="overflow-y:auto; height: 550px; width: auto;">
                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <table class="table table-striped table-advance table-hover" style="overflow-y:scroll;">
                                                    <tbody>
                                                        <tr>
                                                            <th>Comment</th>
                                                            <th>Name</th>
                                                            <th>Post</th>
                                                            <th>Tag</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <?php
                                                        $comments = getFinalComment($con, $email);
                                                        if (empty($comments)) { ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;">No Comments</td>
                                                            </tr>
                                                        <?php }
                                                        $count = 1;
                                                        foreach ($comments as $comment) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $comment['comment'] ?></td>
                                                                <td><?= $comment['name'] ?></td>
                                                                <td><?= $comment['title'] ?></td>
                                                                <td><?= GetTagName($con, $comment['tag_id']) ?></td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Add Tag
                                                                        </button>
                                                                        <a href = "deletecomment.php">
                                                                         <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Delete Comment
                                                                        </button> </a>
                                                                       

                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background: #0d1117;">
                                                                            <script>
                                                                                if (window.history.replaceState) {
                                                                                    window.history.replaceState(null, null, window.location.href);
                                                                                }
                                                                            </script>
                                                                            <form action="" method="POST">
                                                                                <input name="commentid" type="hidden" id="commentid" value="<?= $comment['cid'] ?>">
                                                                                <button name="comment-tag-1" id="comment-tag-1" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px; font-size: 0.85rem; margin: 8px; font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #737679; background: #393c41; color: #ffffff;">Approved</span>
                                                                                </button>
                                                                                <button name="comment-tag-2" id="comment-tag-2" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px; font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #686b39; background: #343726; color: #e5e566;">Improvement</span>
                                                                                </button>
                                                                                <button name="comment-tag-3" id="comment-tag-3" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px; font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #653b1a; background: #342215; color: #ffa860;">Best</span>
                                                                                </button>

                                                                                <button name="comment-tag-4" id="comment-tag-4" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px; font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #724246; background: #38151a; color: #f2abab;">Hatred</span>
                                                                                </button>
                                                                                <button name="comment-tag-5" id="comment-tag-5" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #633246; background: #26111d; color: #f380a3;">Spam</span>
                                                                                </button>
                                                                                <button name="comment-tag-6" id="comment-tag-6" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px; font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #5c3a67; background: #32233c; color: #c79ceb;">Enhancement</span>
                                                                                </button>
                                                                                <button name="comment-tag-7" id="comment-tag-7" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #174c72; background: #0b2337; color: #68c4fd;">Feedback</span>
                                                                                </button>
                                                                                <button name="comment-tag-8" id="comment-tag-8" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #243459; background: #0d1423; color: #638ce0;">Uplifting</span>
                                                                                </button>
                                                                                <button name="comment-tag-9" id="comment-tag-9" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #105e1a; background: #0e2717; color: #52f155;">Helpful</span>
                                                                                </button>
                                                                                <button name="comment-tag-10" id="comment-tag-10" class="dropdown-item" type="submit">
                                                                                    <span style="padding: 3px 10px;  font-size: 0.85rem; margin: 8px;  font-weight: bolder; display: block; text-align: center; border-radius: 30px;  border: 2px solid #645b53; background: #373637; color: #ccb494;">Optimistic</span>
                                                                                </button>


                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Suggest Categories</h3>
                                    <form action=" " method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" disabled value=<?php echo '"' . $fetch_info['fullname'] . '"'; ?>>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <input type="text" class="form-control" value=<?php echo '"' . $fetch_info['role_2'] . '"'; ?> disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="required-field">Category Name</label><br>
                                                    <i>(Ensure that the Category entered, is not already prsent in the Category
                                                        List. In case of any repetition - the suggestions will be automatically
                                                        scrutinized.)</i>
                                                    <input type="text" class="form-control" autocomplete="off" name="form1-update-categname" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="required-field">Reason</label>
                                                    <textarea type="text" class="form-control" name="form1-update-categreason" rows="4" placeholder="Enter a valid reason for the approving the category suggested. Mention any blog idea/topics you are planning to post under this category" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div>

                                            <input type="submit" class="btn btn-primary" value="Submit" name="update3">
                                            <button type="button" class="btn btn-light">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="managecat" role="tabpanel" aria-labelledby="managecat-tab">
                                    <h3 class="mb-4" style="font-family: Orion;">Manage Categories</h3>
                                    <div class="row" style="overflow-y:auto; height: 550px;">
                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <table class="table table-striped table-advance table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th>Category</th>
                                                            <th>Reason</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr style="background-color: rgba(217,83,79,0.7);">
                                                            <th colspan="4" style="text-align: center; color: #fff;">PENDING</th>
                                                        </tr>
                                                        <?php
                                                        $categories = getSuggestCategory($con, 0);
                                                        if (empty($categories)) { ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;">No More Suggested Categories
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                        $count = 1;
                                                        foreach ($categories as $category) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $category['name'] ?></td>
                                                                <td style="max-width: 200px;"><?= $category['reason'] ?></td>
                                                                <td><?= $category['status'] ?></td>

                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-success <?= (($category['status'] == 'Approved') ? 'disabled' : '') ?>" href="?category_aprv=<?= $category['id'] ?>">Approve<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-danger" href="?category_del=<?= $category['id'] ?>"><?= (($category['status'] == 'Approved') ? 'Remove' : 'Deny') ?><i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td height="50" colspan="4"></td>
                                                        </tr>
                                                        <tr style="background-color: rgba(92,184,92,0.7);">
                                                            <th colspan="4" style="text-align: center; color: #fff;">APPROVED</th>
                                                        </tr>
                                                        <?php
                                                        $categories = getSuggestCategory($con, 1);
                                                        if (empty($categories)) { ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;">No Approved Categories</td>
                                                            </tr>
                                                        <?php }
                                                        $count = 1;
                                                        foreach ($categories as $category) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $category['name'] ?></td>
                                                                <td style="max-width: 200px;"><?= $category['reason'] ?></td>
                                                                <td><?= $category['status'] ?></td>

                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-success <?= (($category['status'] == 'Approved') ? 'disabled' : '') ?>" href="?category_aprv=<?= $category['id'] ?>">Approve<i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-danger" href="?category_del=<?= $category['id'] ?>"><?= (($category['status'] == 'Approved') ? 'Remove' : 'Deny') ?><i class="icon_close_alt2"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div><?php } ?>
                            <div class="tab-pane fade" id="logout" role="tabpanel" aria-labelledby="logout-tab">
                                <h3 class="mb-4" style="font-family: Orion;">Logout</h3>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label" for="notification1">
                                            Great ! Thanks a lot, <?php echo $fetch_info['fullname']; ?> for giving your
                                            valuable contributions to the Athena Blog. <br>
                                            Before logging out, make sure you have pressed <b style="color: #5cb85c;">SAVE /
                                                UPDATE</b> after making any contributions/ updations.
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <script>
                                        function logout() {
                                            Swal.fire({
                                                title: 'Are you sure, <?php echo $fetch_info['name '] ?>?',
                                                text: "You want to logout from your account.",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#e83',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Logout',
                                                allowOutsideClick: false
                                            }).then((result) => {
                                                if (result.isConfirmed) {

                                                    Swal.fire({
                                                            confirmButtonText: 'Have a great day !',
                                                            confirmButtonColor: '#06a944',
                                                            allowOutsideClick: false,
                                                            icon: 'success',
                                                            title: 'LOGOUT SUCCESSFUL',
                                                            text: 'Greetings <?php echo $fetch_info['name '] ?>, Have a nice day ahead. Keep checking the Account time-to-time for new updates & announcements.'
                                                        })

                                                        .then((value) => {
                                                            location.href =
                                                                'https://athena-dbms.42web.io/account/welcome/logout.php'
                                                        });
                                                }
                                            })
                                        }
                                    </script>
                                    <button class="btn btn-danger" onclick="logout()">Logout</button>
                                    <button class="btn btn-light">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
            </script>
        <?php
        }
    } else if (($email == true) && ($test == true) && ($status11 == "inactive")) {
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
                        allowOutsideClick: false,
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
                        title: 'Sorry <?php echo $fetch_info['name '] ?>',
                        text: "You are trying to get into your account the wrong way. Your account is currently inactive. Please do notify us at hariket.sukeshkumar2020@gmail.com for re-activation.",
                        icon: 'info',
                        confirmButtonColor: '#0af',
                        allowOutsideClick: false,
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
