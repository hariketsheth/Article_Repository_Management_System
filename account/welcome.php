<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.7" />
    <link rel="icon" type="image/jpg" href="https://pdc-fallsem.42web.io/account/img/logo.ico" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	  <script src="https://pdc-fallsem.42web.io/account/js/sweetalert2.all.min.js"> </script>
	  <script src="https://pdc-fallsem.42web.io/account/js/jquery-3.4.1.min.js"></script> 
	  <link rel="stylesheet" href="https://pdc-fallsem.42web.io/account/css/sweetalert2.min.css" />
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="css/style.css" />
	  <script>
		  $(document).bind("contextmenu",function(e) {
 e.preventDefault();
});
		  $(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});
	  </script>
		  <script language="text/javascript">
              document.onmousedown=disableclick;
		  status="Right Click Disabled";
		  function disableclick(event){ 
			  if(event.button==2) { 
				  alert(status); 
				  return false; }
		  }
.</script>
<script>
		  document.addEventListener('contextmenu', event=> event.preventDefault());
document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
	  </script>
	  
    <title>HARIKET SHETH</title>
  </head>
<body oncontextmenu="return false;" bgcolor="#6a6a6e">
<?php 
session_start();
require_once('connection.php');
$email=$_POST['uname'];
$test1=$_SESSION['connectiondb'];
$fetch_data = "SELECT * FROM users WHERE username = '".$_POST['uname']."'";
$run_query = mysqli_query($con, $fetch_data);
$fetch_info = mysqli_fetch_assoc($run_query); 

if (((strlen($_POST['uname']) == 0) && (strlen(md5($_POST['pass'])) == 0)))
{
echo "<script>
Swal.fire('Stop There!',
'Without entering details, you cannot access anything. Your IP address is copied & sent to Cyber Security Team. If it was done by mistake, please do not click the button without entering details next time',
'warning'

).then((value) => {
	 location.href='https://pdc-fallsem.42web.io/account/login.php'
	 });</script>";
}

else if ((strlen($_POST['uname']) != 0) || (strlen(md5($_POST['pass'])) != 0) ) {

if(($_SESSION['connectiondb']=="false") ){
 ?>

<script>Swal.fire({
  title: 'Internal Server Issue !!',
  text: "We weren't able to connect to our servers at this point of time. Please try in some time.",
  icon: 'error',
  confirmButtonColor: '#d73',
  confirmButtonText: 'Continue'
})
      .then((value) => {
     location.href='https://pdc-fallsem.42web.io/account/login.php'
	 });
      </script>
<?php
}

else if (($_SESSION['connectiondb']=="true")){
    
if ($_POST['uname']== $fetch_info['username'] && md5($_POST['pass'])==$fetch_info['codekey'] && $fetch_info['status']==1){
    if($fetch_info['role_1']=="active"){
    $_SESSION['uname']=$_POST['uname'];
    $_SESSION['last_login_timestamp'] = time(); 
    $_SESSION['status']="active";
    ?>
	 <script>
    swal.fire( 'Greetings <?php echo $fetch_info['name']; ?>' ,  
	  'You have successfully logged in.<br> Press the <b>OK</b> to continue to your account.<br>Please contact us if you face any difficulty.' ,  
	  'success' )
.then((value) => {
	 location.href='welcome/index.php'
	 });
     </script>
     <?php
    }
    else if($fetch_info['role_1']=="inactive"){
          $_SESSION['uname']=$_POST['uname'];
    $_SESSION['last_login_timestamp'] = time(); 
    $_SESSION['status']="active";
    ?>
    <script>Swal.fire({
  title: 'Greetings <?php echo $fetch_info['name']; ?>' ,
  text: 'Your account is temporarily banned because of suspicious activity. Please notify us at hariket.sukeshkumar2020@gmail.com if you want to re-activate your account' ,
  icon: 'warning',
  confirmButtonColor: '#d73',
  confirmButtonText: 'RE-ACTIVATE'
})
      .then((value) => {
     location.href='mailto:hariket.sukeshkumar2020@gmail.com'
	 location.href='https://pdc-fallsem.42web.io/account/login.php'
	 });
      </script>
	 <?php
    }
else {
echo "<script>
Swal.fire('Account Not Verified !!',
'To maintain the integrity of portal and ensure security, it is mandatory to verify your identity. Hence, Please check your mail (<b>Including SPAM folder</b>) for the verification mail.<br><br><b>If you have not recieved the mail, its possible that you have entered the wrong mail ID. In that case, Please SIGN UP again carefully' ,
'info'

).then((value) => {
	 location.href='https://pdc-fallsem.42web.io/account/login.php'
	 });</script>";
}
}



else if ($_POST['uname']== $fetch_info['username'] && md5($_POST['pass'])==$fetch_info['codekey'] && $fetch_info['role_1']=="inactive"){
    $_SESSION['uname']=$_POST['uname'];
    $_SESSION['last_login_timestamp'] = time(); 
    $_SESSION['status']="active";
    ?>
    <script>Swal.fire({
  title: 'Greetings <?php echo $fetch_info['name']; ?>' ,
  text: 'Your account is temporarily banned because of suspicious activity. Please notify us at hariket.sukeshkumar2020@gmail.com if you want to re-activate your account' ,
  icon: 'warning',
  confirmButtonColor: '#d73',
  confirmButtonText: 'RE-ACTIVATE'
})
      .then((value) => {
     location.href='mailto:hariket.sukeshkumar2020@gmail.com'
	 location.href='https://pdc-fallsem.42web.io/account/login.php'
	 });
      </script>
	 
     <?php
}

else if ( ($_POST['uname']==$fetch_info['username'] && md5($_POST['pass'])!=$fetch_info['codekey']) && ((strlen($_POST['uname']) != 0) &&( (strlen(md5($_POST['pass'])) >= 6) ) )) {
?>
 <script>
      const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: true
})

swalWithBootstrapButtons.fire({
  title: 'Incorrect Password',
  text: "Check the details sent on your mail. Have you entered correct Password?",
  icon: 'info',
  showCancelButton: true,
  confirmButtonColor: '#ec3e13',
  cancelButtonColor: '#00ad42',
  confirmButtonText: 'No, made mistake!',
  cancelButtonText: 'Yes, correct!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    swalWithBootstrapButtons.fire(
      'Humans can make mistakes :)',
      'You can enter the correct details and login to your account',
      'success'
    )
   .then((value) => {
	 location.href='https://pdc-fallsem.42web.io/account/login.php'
	 });
  } else if (
    
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Sorry for the inconvenience',
      'You can leave a mail at hariket.sukeshkumar2020@gmail.com.',
      'error'
    )
      .then((value) => {
	 location.href='https://pdc-fallsem.42web.io/account/login.php'
	 });
  }
})</script>
<?php
} 
else if ((strlen($_POST['uname']) > 0) && ($_POST['uname']==$fetch_info['username'] && md5($_POST['pass'])!=$fetch_info['codekey']) && ((strlen(md5($_POST['pass'])) > 0) &&( (strlen(md5($_POST['pass'])) < 6) ) )) {
    ?>
    

<script>Swal.fire({
  title: 'PASSWORD ERROR:',
  text: "We will not permit you to enter the Portal. If you have lost your password then you can contact us!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#06a944',
  cancelButtonColor: '#68bf00',
  confirmButtonText: 'Forgot Password'
}).then((result) => {
  if (result.value) {
      Swal.fire({
  title: 'PASSWORD RECOVERY',
  text: "<?php echo $fetch_info['name']; ?> proceed to contact us via mail. Please mention your name & username in the mail to get your password.",
  icon: 'success',
  confirmButtonText: 'Proceed',
  confirmButtonColor: '#06a944'
})

	.then((value) => {
	 window.open("mailto:hariket.sukeshkumar2020@gmail.com?subject=LOST MY PORTAL PASSWORD");
     location.href='https://pdc-fallsem.42web.io/account/login.php' 
	 });
  }
  else {
      location.href='https://pdc-fallsem.42web.io/account/login.php' 
  }
})  </script>
<?php
}
else if ((strlen(md5($_POST['pass'])) > 0) && (strlen($_POST['uname']) == 0))
{
 ?>
 <script>Swal.fire({
  title: 'Where is your Username?',
  text: "Without entering Username, we will not permit you to enter the Portal.",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#06a944',
  cancelButtonColor: '#68bf00',
  confirmButtonText: 'Lost my Username'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Not an Issue',
      'Your data & assignments are still safe with us. Please write a mail at hariket.sukeshkumar2020@gmail.com to get your username',
      'success'
    )
	.then((value) => {
	 window.open("mailto:hariket.sukeshkumar2020@gmail.com?subject=LOST MY PORTAL USERNAME");
     location.href='https://pdc-fallsem.42web.io/account/login.php' 
	 });
  }
  else {
      location.href='https://pdc-fallsem.42web.io/account/login.php' 
  }
})  </script>
<?php
}
else if ((strlen($_POST['uname']) > 0) && (strlen(md5($_POST['pass'])) == 0))
{
 ?>
 <script>Swal.fire({
  title: 'Where is your Password?',
  text: "Without entering Password, we will not permit you to enter the Portal.",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#06a944',
  cancelButtonColor: '#68bf00',
  confirmButtonText: 'Lost my Password'
}).then((result) => {
  if (result.value) {
    Swal.fire(
       'Uhh.. Ohh !',
      'Please write a mail at hariket.sukeshkumar2020@gmail.com to get your password. Please mention your username while requesting for password in the mail.',
      'success'
    )
	.then((value) => {
	 window.open("mailto:hariket.sukeshkumar2020@gmail.com?subject=LOST MY PORTAL PASSWORD");
     location.href='https://pdc-fallsem.42web.io/account/login.php' 
	 });
  }

  else {
      location.href='https://pdc-fallsem.42web.io/account/login.php' 
  }
})  </script>
<?php
}
  else if (($_POST['uname']!= $fetch_info['username']) && (strlen(md5($_POST['pass'])) != 0)  ){
  echo "<script>swal.fire( 'Sorry !!' ,  
	  'This username does not exist. If you are a new member, then please SIGN UP first' ,  
	  'error' )
      .then((value) => {
     location.href='https://pdc-fallsem.42web.io/account/login.php' 
	 });
      </script>";
  }
  else {
    echo "<script>swal.fire( 'Sorry !!' ,  
	  'Error. Something unexpected as happened. Please wait, we will repair it soon' ,  
	  'error' )
      .then((value) => {
     location.href='https://pdc-fallsem.42web.io/account/login.php' 
	 });
      </script>";
  }



}
else {
    echo "<script>swal.fire( 'Sorry !!' ,  
	  'Error. Something unexpected as happened. Please wait, we will repair it soon' ,  
	  'error' )
      .then((value) => {
     location.href='https://pdc-fallsem.42web.io/account/login.php' 
	 });
      </script>";
}
}
else 
{
    echo "<script>swal.fire( 'Sorry !!' ,  
	  'Error. Something unexpected as happened. Please wait, we will repair it soon' ,  
	  'error' )
      .then((value) => {
     location.href='https://pdc-fallsem.42web.io/account/login.php' 
	 });
      </script>";
}
?>

</body>
</html>