<?php session_start();
if(!isset($_SESSION['email']))
{echo "<p style ='font-size:1.5rem; text-align:center; margin-top:20%;'>Please <a href='signup-login.php'>log in </a> </p>";
return false; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head style="background-color: white;">
<title>Edit Profile</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="'Talker', 'chat', 'social media', 'friends', 'messaging'">

<link rel="stylesheet" type="text/css" href="../src/css/talker.css">
<link rel="stylesheet" type="text/css" media="(max-width:1280px)" href="../src/css/talker1280px.css">
<link rel="stylesheet" type="text/css" media="(max-width:1100px)" href="../src/css/talker1100px.css">
<link rel="stylesheet" type="text/css" media="(max-width:900px)" href="../src/css/talker900px.css">
<link rel="stylesheet" type="text/css" media="(max-width:699px)" href="../src/css/talker699px.css">
<link rel="stylesheet" type="text/css" media="(max-width:639px)" href="../src/css/talker639px.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon"/>
</head>
<body style="font-family: verdana, sans-serif;">

<?php

 if(isset ($_POST["submit"]))
{
if((md5($_POST['oldpassword'])) !== ($_SESSION['password']))        //this ensures that the old password presented by user is correct
    {       
echo "<p class='d' style='text-align:center; color:green;'> Old password not correct, please use the correct one</p>";       
return false;         
}         
elseif(($_POST['newpassword_1']) !== ($_POST['newpassword_2']))     //this ensures that newpassword_1=newpassword_2  
 {     
echo "<p class='d' style='text-align:center; color:green;'> Password does not match</p>";     
exit();   
 }

else
{
$oldpassword= $newpassword_1= $new_fname= $new_sname= $new_email="";          //initialise variables and set to empty
$oldpassword=    ($_POST['oldpassword']);
$newpassword_1=  ($_POST['newpassword_1']);
$newpassword =   md5($newpassword_1);
$new_fname=       ($_POST['fname']);
$new_sname=       ($_POST['sname']);
$new_email=       ($_POST['email']);
include "../../env/server_changeprofile.php"; 
}
}
?>



<div class="MyAccount2">
<h2 style="margin-bottom:1em;"> Edit Profile</h2>

<div id="inputprofile"> 
<form action="inputprofile.php" method="POST">

<input class= "profile" type="text" name="fname"  placeholder="First name">
<input class= "profile" type="text" name="sname"  placeholder="Last name">
<input class= "profile" type="text" name="email"  placeholder="Email">
<input class= "profile" type="password" name="oldpassword" placeholder="Old password">
<input class= "profile" type="password" name="newpassword_1" placeholder="New password">
<input class= "profile" type="password" name="newpassword_2" placeholder="Confirm password">
<input class= "profileLink2" type="submit" name="submit" Value="Save">
</form>
</div>

</div>


</body>
</html>



