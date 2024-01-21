<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.7" />
	  <link rel="icon" type="image/jpg" href="img/logo.ico" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	  <script src="https://athena-dbms.42web.io/account/js/sweetalert2.all.min.js"> </script>
	  <script src="https://athena-dbms.42web.io/account/js/jquery-3.4.1.min.js"></script> 
	  <link rel="stylesheet" href="https://athena-dbms.42web.io/account/css/sweetalert2.min.css" />
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
require_once  ('connection.php');
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.smtp.php';
require_once 'PHPMailer/class.phpmailer.php';
if(isset($_POST['submit1']))

{

$name=$_POST['name1'];
$fname = $_POST['name2'];
$email=$_POST['email1'];
$email_c = $_POST['email1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

$phone = preg_replace('/[^0-9]/', '', $_POST['phone1']);
if(strlen($phone) === 10) {
    $phone = '+91-'.$phone; 
$count1 = 0;
$qqq2 = "SELECT COUNT(*) AS count1 FROM users WHERE phone = '$phone'";
$result = mysqli_query($con,$qqq2);
$row = mysqli_fetch_assoc($result);
$count1 = $row['count1'];
$password=rand(10000000, 99999999);
$role = 'active';

$a1 = explode("@", $email);
    $ema = $a1[0];
    $dom = '@'.$a1[1];
    $mailto = '"mailto:'.$email.'"';
    $verify1 = strtolower(preg_replace("/\s+/", "", $name)).rand(100,999);
    $name = ucwords(preg_replace("/\s+/", "", $name));
    $fname = ucwords($fname);
    $qqq3 = "SELECT COUNT(*) AS count2 FROM users WHERE username = '$verify1'";
    $result = mysqli_query($con,$qqq3);
    $row = mysqli_fetch_assoc($result);
    $count2 = $row['count2'];
    while($count2 != 0) {
        $verify1 = strtolower(preg_replace("/\s+/", "", $name)).rand(100,999);
        $qqq3 = "SELECT COUNT(*) AS count2 FROM users WHERE username = '$verify1'";
        $result = mysqli_query($con,$qqq3);
        $row = mysqli_fetch_assoc($result);
        $count2 = $row['count2'];
    }
$status=0;

$b1 ="inactive";

$count = 0;
$qqq1 = "SELECT COUNT(*) AS count FROM users WHERE mailto = '$mailto'";

if (empty($_POST['g-recaptcha-response'])) {
		  echo "<script>
Swal.fire('RECAPTCHA ERROR !!',
'Sorry, Without Recaptcha - we could not verify your identity as a Human. Continous Signup requests without Recaptcha would lead to IP Address Ban.<br><br><b>Do not repeat. Complete ReCaptcha and then submit !</b>',
'error'

).then((value) => {
	 location.href='login.php'
	 });</script>";
}
else{
		$secretKey = 'PLACE_YOUR_OWN'; 
             
            // Verify the reCAPTCHA response 
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
            // Decode json data 
            $responseData = json_decode($verifyResponse); 
             
            if(!$responseData->success){ 

			     echo "<script>
Swal.fire('RECAPTCHA ERROR !!',
'Unexpected error occured with ReCaptcha. It is possible that the ReCaptcha filled by you has expired/ there was a problem with ReCaptcha. Please re-submit. <br><br><b>If this issue was from our servers, We are really sorry for the inconvinience.</b>',
'info'

).then((value) => {
	 location.href='login.php'
	 });</script>";			
		  }
          if($responseData->success){



$result = mysqli_query($con,$qqq1);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];
$activationcode=md5($email.time());
$roles = "Contributor";
$gib1 = '"enabled"';
$validity = $_POST['name1'];
$gender = $_POST['gender'];
if($gender == "male"){
    $profilepic = "https://bit.ly/3xgJuiM";
}
else{
    $profilepic = "https://bit.ly/3Cb76ZO";
}
$secure = md5($password);
if($count==0 && $count1==0){
$query=mysqli_query($con,"insert into users(username, codekey, author, fullname, name, phone, gender, email, mailto, photo, role_1,role_2, role_3, activationcode,status) values('$verify1', '$secure', '$name', '$fname', '$validity', '$phone', '$gender', '$email', '$mailto', '$profilepic', '$role', '$roles', '$b1', '$activationcode', '$status')");
$query1 = mysqli_query($con, "insert into pwd_change(username, codekey, password_change) values ('$verify1', '$secure', '$gib1')");
$query2 = mysqli_query($con, "insert into newsletter(email) values ('$email')");
	if($query && $query1 && $query2)
	{
        try {
        $mail = new PHPMailer;
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                               
        $mail->Username = 'verifypdc.sudha@gmail.com';                 
        $mail->Password = 'bxetmxjgxsdfvgci';                        
        $mail->SMTPSecure = 'ssl';                            
        $mail->Port = 465;                                    
        $mail->ClearReplyTos();
        $mail->addReplyTo('hariket.sukeshkumar2020@gmail.com', 'Hariket Sukeshkumar Sheth');
        $mail->setFrom('verifypdc.sudha@gmail.com', 'VERIFY YOUR ACCOUNT');
        $mail->addAddress($email, $fname);     
        $mail->Subject = 'Verification Mail: Athena';
        $mail->isHTML(true);
        $mail->Body = '<div class=""><div class="aHl"></div><div id=":65" tabindex="-1"></div><div id=":6g" class="ii gt"><div id=":6h" class="a3s aiL msg4807680916234674071"><u></u> <div style="background-color:#ffffff"> <div style="background-color:#ffffff"> <div style="Margin:0px auto;max-width:600px"> <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%"> <tbody> <tr> <td style="direction:ltr;font-size:0px;padding:9px 0px 9px 0px;text-align:center;vertical-align:top"> <div class="m_4807680916234674071mj-column-per-50" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%"> <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%"> <tbody><tr> <td align="left" style="font-size:0px;padding:15px 15px 15px 15px;word-break:break-word"> <div style="font-family:Arial,sans-serif;font-size:11px;line-height:1.5;text-align:left;color:#000000"> <h2>For Verification</h2> </div> </td> </tr> <tr> <td align="left" style="font-size:0px;padding:15px 15px 15px 15px;word-break:break-word"> <div style="font-family:Arial,sans-serif;font-size:11px;line-height:1.5;text-align:left;color:#000000"> <p>Please click on the Verification Button given below to verify your identity and activate your account. Without verifying, we will not be able to give you the access.&nbsp;</p><p>&nbsp;</p><p><em>In case of any issues/ difficulties, please forward this mail to <a href="mailto:hariket.sukeshkumar2020@gmail.com" style="color:#0000ee" target="_blank">hariket.sukeshkumar2020@gmail.com</a>, we will rectify the issue and mail you back !</em></p> </div> </td> </tr> <tr> <td align="center" style="font-size:0px;padding:20px 20px 20px 21px;word-break:break-word"> <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;width:100%;line-height:100%"> <tbody><tr> <td align="center" bgcolor="#f5a82c" role="presentation" style="border:0px solid #000;border-radius:24px;background:#f5a82c" valign="middle"> <a href="https://athena-dbms.42web.io/account/email_verification.php?code='.$activationcode.'" style="display:inline-block;background:#f5a82c;color:#ffffff;font-family:Arial,sans-serif,Helvetica,Arial,sans-serif;font-size:15px;font-weight:normal;line-height:18.75px;Margin:0;text-decoration:none;text-transform:none;padding:9px 26px 9px 26px;border-radius:24px" target="_blank" > <strong>Verify Your Account</strong> </a> </td> </tr> </tbody></table> </td> </tr> </tbody></table> </div> <div class="m_4807680916234674071mj-column-per-50" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%"> <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%"> <tbody><tr> <td align="left" style="font-size:0px;padding:15px 15px 15px 15px;word-break:break-word"> <div style="font-family:Arial,sans-serif;font-size:11px;line-height:1.5;text-align:left;color:#000000"> <h2>Account Credentials</h2> </div> </td> </tr> <tr> <td align="left" style="font-size:0px;padding:15px 15px 15px 15px;word-break:break-word"> <div style="font-family:Arial,sans-serif;font-size:11px;line-height:1.5;text-align:left;color:#000000"> <p><em><strong>Username:&nbsp;&nbsp;</strong></em>'.$verify1.'</p><p><em><strong>Password:</strong></em> &nbsp;'.$password.'</p><p>&nbsp;</p><p>*But Before using these credentials, Please&nbsp;<strong><span style="color:#e03e2d">VERIFY YOUR ACCOUNT</span>&nbsp;</strong>by clicking the button above. <br><br><strong>If you had not requested for a verification mail, then we apologise for the same and request you to forward this mail to hariket.sukeshkumar2020@gmail.com so as to scan the user using your email address for verification or click the DELETE ACCOUNT button below.</strong></p> </div> <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;width:100%;line-height:100%"> <tbody><tr> <td align="center" bgcolor="#e85034" role="presentation" style="border:0px solid #000;border-radius:24px;background:#e85034" valign="middle"> <a href="https://athena-dbms.42web.io/account/delete_verification.php?code='.$activationcode.'" style="display:inline-block;background:#e85034;color:#ffffff;font-family:Arial,sans-serif,Helvetica,Arial,sans-serif;font-size:15px;font-weight:normal;line-height:18.75px;Margin:0;text-decoration:none;text-transform:none;padding:9px 26px 9px 26px;border-radius:24px" target="_blank" > <strong>Delete Account</strong> </a> </td> </tr> </tbody></table></td> </tr> <tr> <td align="right" style="font-size:0px;padding:20px 20px 20px 20px;word-break:break-word"> <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;width:auto;line-height:100%"> <tbody><tr> <td align="center" bgcolor="#5cb85c" role="presentation" style="border:0px solid #000;border-radius:0px;background:#5cb85c" valign="middle"> <a href="https://athena-dbms.42web.io" style="display:inline-block;background:#5cb85c;color:#ffffff;font-family:Arial,sans-serif,Helvetica,Arial,sans-serif;font-size:13px;font-weight:normal;line-height:100%;Margin:0;text-decoration:none;text-transform:none;padding:9px 26px 9px 26px;border-radius:0px" target="_blank"> <strong>Login to your Account</strong> </a> </td> </tr> </tbody></table> </td> </tr> </tbody></table> </div> </td> </tr> </tbody> </table><div class="yj6qo"></div><div class="adL"> </div></div><div class="adL"> </div></div><div class="adL"> </div></div><div class="adL"> </div></div></div><div id=":93" class="ii gt" style="display:none"><div id=":94" class="a3s aiL "></div></div><div class="hi"></div></div>';

        
            $mail->send();
            
            ?>
<script> 

 Swal.fire({
  title: 'Verification Mail Sent Successfully !!',
  text: "We have sent a verification mail on the entered mail <?php echo $email_c; ?>. Please make sure to check your Spam Folder as well.",
  footer: "In case the verification mail was not recieved, Please mail at hariket.sukeshkumar2020@gmail.com",
  icon: 'success',
  confirmButtonColor: '#5cb85c',
  confirmButtonText: 'Next'
}).then((result) => {
  if (result.isConfirmed) {
   
   Swal.fire({
    confirmButtonText: 'WELCOME TO Athena !!',
    confirmButtonColor: '#5cb85c',
   icon: 'success',
  title: 'INSTRUCTIONS',
  text: 'Greetings <?php echo $_POST['name1']; ?>, Once the verification is done, Please use the credentials sent in the mail to login.'
})
 
    .then((value) => {
     location.href='https://athena-dbms.42web.io/account/welcome/logout.php'
	 });
  }
})
                                
                               
                                </script>
     <?php
        } 
        catch(phpmailerException $e){
             echo "<script>
Swal.fire('Verification Mail was not Sent !!',
'Verification Mail was not sent because of wrong email address or Invalid Email address. Make sure the details entered by you are correct',
'error'

).then((value) => {
	 location.href='login.php'
	 });</script>";
            }
            
            catch (Exception $e) {
            echo "<script>
Swal.fire('Verification Mail was not Sent !!',
'Verification Mail was not sent because of wrong email address or Invalid Email address. Make sure the details entered by you are correct',
'error'

).then((value) => {
	 location.href='login.php'
	 });</script>";
        }
        
    }
            else
            
            {

            echo "<script>
Swal.fire('Sorry Internal Issue !!',
'We were not able to handle your request for account creation at this moment. Please try again after some time.<br><br><b>Sorry for the inconvinience</b>',
'info'

).then((value) => {
	 location.href='login.php'
	 });</script>";
            }
}
else{
    if($count>0){
$fetch_data = "SELECT * FROM users WHERE mailto = '$mailto'";
$run_query = mysqli_query($con, $fetch_data);
$fetch_info = mysqli_fetch_assoc($run_query);
if($fetch_info['status']==0){
echo "<script>
Swal.fire('Verification Pending !!',
'This user has already applied for Account Creation but not verified the account. Please complete verification. <br><br><b>In case, the mail was not sent or getting some error, contact us at hariket.sukeshkumar2020@gmail.com</b>',
'question'

).then((value) => {
	 location.href='login.php'
	 });</script>";
    }
else{
echo "<script>
Swal.fire('Account Exists !!',
'This user is already a member of Athena. Please login directly. <br><br><b>Duplicate/Multiple Accounts are not allowed</b>',
'warning'

).then((value) => {
	 location.href='login.php'
	 });</script>";
}



    }
  else if($count1>0){
        $fetch_data = "SELECT * FROM users WHERE phone = '$phone'";
$run_query = mysqli_query($con, $fetch_data);
$fetch_info = mysqli_fetch_assoc($run_query);
if($fetch_info['status']==0){
echo "<script>
Swal.fire('Verification Pending !!',
'This user has already applied for Account Creation but not verified the account. Please complete verification. <br><br><b>In case, the mail was not sent or getting some error, contact us at hariket.sukeshkumar2020@gmail.com</b>',
'question'

).then((value) => {
	 location.href='login.php'
	 });</script>";
    }
else{
echo "<script>
Swal.fire('Account Exists !!',
'This user is already a member of Athena. Please login directly. <br><br><b>Duplicate/Multiple Accounts are not allowed</b>',
'warning'

).then((value) => {
	 location.href='login.php'
	 });</script>";
}
    }
    else if($count1>0 && $count1>0 ){
$fetch_data = "SELECT * FROM users WHERE mailto = '$mailto'";
$run_query = mysqli_query($con, $fetch_data);
$fetch_info = mysqli_fetch_assoc($run_query);
if($fetch_info['status']==0){
echo "<script>
Swal.fire('Verification Pending !!',
'This user has already applied for Account Creation but not verified the account. Please complete verification. <br><br><b>In case, the mail was not sent or getting some error, contact us at hariket.sukeshkumar2020@gmail.com</b>',
'question'

).then((value) => {
	 location.href='login.php'
	 });</script>";
    }
else{
echo "<script>
Swal.fire('Account Exists !!',
'This user is already a member of Athena. Please login directly. <br><br><b>Duplicate/Multiple Accounts are not allowed</b>',
'warning'

).then((value) => {
	 location.href='login.php'
	 });</script>";
}
    }
    else{
        echo "<script>
Swal.fire('Strange. Error !!',
'We didn't get your data entered properly because of some issue (maybe Network error). <br><br><b>Please Sign Up Again. Incase, this issue was from our side - We are sorry for the inconvinience</b>',
'question'

).then((value) => {
	 location.href='login.php'
	 });</script>";
    }

}


       
}
}
}

else{
    echo "<script>
Swal.fire('Invalid Phone Number',
'The Phone number entered is not valid. We request you to please fill the SignUp Form with utmost care. <br><br><p style=\"text-align:left;\">As Instructed before, </p><br><b><ul style=\"text-align: left; font-size: 7px;\"><li>Please Fill Only 10 Digits of your Phone number.</li><li> Do not include any spaces, extra zeroes(0), country codes like (+91) or area codes like (022, 080, etc.)</li></ul></b>',
'warning'

).then((value) => {
	 location.href='login.php'
	 });</script>";
}
}
else{
    echo "<script>
Swal.fire('Invalid Email Address',
'The Email Address entered is not valid. We request you to please fill the SignUp Form with utmost care. <br><br><b>Giving Invalid Address would not only be a problem for us, but would be problem for you as well since we would send a VERIFICATION MAIL on the email address inputted.</b>',
'warning'

).then((value) => {
	 location.href='login.php'
	 });</script>";
}
}
else if(!isset($_POST['submit1'])){
echo "<script>
Swal.fire('Stop There !!',
'We sincerely request you not to access this page without proper submission of data. Unnecessarily accessing pages would lead to IP Address Ban. <br><br><b>Do not repeat !</b>',
'error'

).then((value) => {
	 location.href='login.php'
	 });</script>";
}

else{
    echo "<script>
Swal.fire('Strange. Error !!',
'We didn't get your data entered properly because of some issue (maybe Network error). <br><br><b>Please Sign Up Again. Incase, this issue was from our side - We are sorry for the inconvinience</b>',
'question'

).then((value) => {
	 location.href='login.php'
	 });</script>";
}
 ?>
 </body>
 </html>
 <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>