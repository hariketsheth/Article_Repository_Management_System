<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.7" />
    <link rel="icon" type="image/jpg" href="https://athena-dbms.42web.io/account/img/logo.ico" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	  <script src="../account/js/sweetalert2.all.min.js"> </script>
	  <script src="../account/js/jquery-3.4.1.min.js"></script> 
	  <link rel="stylesheet" href="../account/css/sweetalert2.min.css" />
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
	  
    <title>ATHENA</title>
  </head>
<body oncontextmenu="return false;" bgcolor="#6a6a6e">
<?php
include 'connection.php';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
$sql=mysqli_query($con,"SELECT * FROM users WHERE activationcode='$code'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
  
$st=0;
$result =mysqli_query($con,"SELECT id FROM users WHERE activationcode='$code' and status='$st'");
$result4=mysqli_fetch_array($result);   

if($result4>0) 
  {    $fetch_data = "SELECT * FROM users WHERE activationcode='$code' and status='$st'";
        $run_query = mysqli_query($con, $fetch_data);
        $fetch_info = mysqli_fetch_assoc($run_query); 
        $verify66 = $fetch_info['username'];
       $sql = "DELETE FROM users WHERE activationcode='$code' and status='$st'";
        $sql2 = "DELETE FROM pwd_change WHERE username ='$verify66'";
        $result1=mysqli_query($con,$sql);
        $result2=mysqli_query($con,$sql2);
        if($result1 && $result2){
        echo "<script>
        Swal.fire('Account Deleted !!',
        'Thanks for reporting this issue to us. We hope that this issue is not repeated again in future.',
        'success'

        ).then((value) => {
            location.href='https://athena-dbms.42web.io/account/login.php'
            });</script>";
        }
        else{
            echo "<script>
        Swal.fire('Account Deletion Error !!',
        'Please try again later. We are facing an internal server issue and could not delete your account. Sorry !',
        'error'

        ).then((value) => {
            location.href='https://athena-dbms.42web.io/account/login.php'
            });</script>";
        }
}
else
{
echo "<script>
Swal.fire('Already Verfied !!',
'You have already verified your account and are a part of Athena family :)<br><br><b>So, We cannot allow you to delete your account from here (for security reasons). You may send a mail to hariket.sukeshkumar2020@gmail.com. We will delete your account soon.</b>',
'info'

).then((value) => {
	 location.href='https://athena-dbms.42web.io/account/login.php'
	 });</script>";
}
}
else
{
echo "<script>
Swal.fire('Invalid Deletion Request',
'Uhh.. Ohh..  <br>Seems like the account deletion link has expired for your account.<br><br><b>Please forward the mail immediately to hariket.sukeshkumar2020@gmail.com for account deletion.</b>',
'question'

).then((value) => {
	 location.href='https://athena-dbms.42web.io/account/login.php'
	 });</script>";
}
}
else{
    echo "<script>
Swal.fire('Stop There!',
'You are trying to access a page for which the user do not have proper permission. <br><b>Do not try to access this page without permission again !</b>',
'error'

).then((value) => {
	 location.href='https://athena-dbms.42web.io/account/login.php'
	 });</script>";
}

?>
</body>
</html>
