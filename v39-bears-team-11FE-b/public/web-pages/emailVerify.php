<?php session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if(!isset($_SESSION['registeredEmail']))
{echo "<p style='font-size:1.2rem; text-align:center;'>Please <a href='signup-login.php'>Log in. </a></p>";
return false; 
}

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/POP3.php';
?>



<!DOCTYPE html>
<html lang="en">
<head style="background-color: white;">
<title>Verify Email</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="'litetalk', 'chat', 'social media', 'friends', 'messaging'">

<link rel="stylesheet" type="text/css" href="../src/css/talker.css">
<link rel="stylesheet" type="text/css" media="(max-width:1280px)" href="../src/css/talker1280px.css">
<link rel="stylesheet" type="text/css" media="(max-width:1100px)" href="../src/css/talker1100px.css">
<link rel="stylesheet" type="text/css" media="(max-width:900px)" href="../src/css/talker900px.css">
<link rel="stylesheet" type="text/css" media="(max-width:699px)" href="../src/css/talker699px.css">
<link rel="stylesheet" type="text/css" media="(max-width:639px)" href="../src/css/talker639px.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon"/>
</head>

<body>
    
    <?php 
if (isset($_POST['send']))
{
$_SESSION['number'] = rand(100000, 999999);

$mail = new PHPMailer(TRUE);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.yahoo.com';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'boselamo@yahoo.com';             // SMTP username
    $mail->Password = '******************';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('boselamo@yahoo.com', 'Talker-support');          //This is the email your form sends From
    $mail->addAddress($_SESSION['registeredEmail']); // Add a recipient address
    //$mail->addAddress('contact@example.com');               // Name is optional
    $mail->addReplyTo('boselamo@yahoo.com');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Verify Email';
$mail->Body    = "<html>
<body>
<p style='font-family:Helvetica, sans-serif;'> Hi " .$_SESSION['fname']. ",<br></p>

<p style='font-family:Helvetica, sans-serif;'> <br>
Here is a one-time verification number. 
<br>Copy it and use it to verify your email address. <br></p>

<p style='font-family:Helvetica, sans-serif; font-size:1.5rem; font-weight:bold;'><br>" .$_SESSION['number']. "</p>

<p style='font-family:Helvetica, sans-serif;'> <br>
If you did not make this request, please ignore this email. <br>
Thanks.</p>

<br><br><br>
Best Regards,<br>
Talker-support.

</body>
</html>";

$mail -> send();
echo "<p style='text-align:center; color:purple;'> A number token has been sent to " .$_SESSION['registeredEmail']. ", enter it below.</p>";
}
catch   (Exception $e)
{
echo "<p style='text-align:center; font-size:1.5rem; color:purple;'>Unable to register new users due to network issues, please try again later. <br>Thank you.</p>"; 
}
}



if (isset ($_POST["enter"]))
{
$confirmation = $_POST['number'];


if ($confirmation == $_SESSION['number'])
{
include '../../env/server_registerAccount.php';
}
else
{
echo "<p class='design' style='font-size:1.05rem; text-align:center; color:purple;'>Number not correct</p>";
}
}
?>

<div class= "verification">
    
  <form action="emailVerify.php" method="post">
      
    <?php
    echo '<p style="text-align:center; font-size:1.05rem; word-wrap:break-word;">A number token will be sent to confirm your email, click "send".<br>
                                                             </p>';?>
<br>       
            <input type="submit" class="linking2" style= "width:5em; margin:0.2em auto 3em auto;" name="send" value="Send">
<br>
</form>
    
<h1> Verify email</h1>

<div class="large_container">
<div class="small_container"></div>

<form action='emailVerify.php' method='POST'>
<input class='itemB' type='number' id='token' name='number' placeholder='Your token'>
<input class='linking2' id='submit' type='submit' name='enter' value='Enter'>
</form>

</div>
</div>
  
</body>
</html>



