<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head style="background-color: white;">
<title>Talker</title>

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


<body class="secondpage">
<?php if (isset ($_POST["register"]))                   //proceed with next steps once the register button is clicked
{
 //create a function to sanitise the data input from the client-side
 function check_input($data)
 {
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data;
 }
 
 
// sanitise input from client side once submitted
$_SESSION['fname'] = check_input($_POST["fname"]);
$_SESSION['sname'] = check_input($_POST["sname"]);
$_SESSION['registeredEmail'] = check_input($_POST["registeredEmail"]);
$_SESSION['password_1'] = $_POST["password_1"];
$_SESSION['password_2'] = $_POST['password_2'];

echo "<meta http-equiv='refresh'  content='0;url=emailVerify.php'>";
exit();
    
}
?>



<?php 
if (isset ($_POST["login"]))           //begin the log in process once the login button is clicked
{
$email=$password="";                    //define variables and initialise to empty

$email=($_POST['email']);
$password=md5($_POST['password']);

include '../../env/server_talkerLogin.php';
}
?>

    
<div class="logo">
<div class="container">
<img class="resize" src="../src/images/logo.jpg" alt="Talker" title="Talker logo">
</div>
</div>

<div class= "break"> </div>

<div class= "empty"> </div>

<div class= "compartment">

<nav>
<a class="link" href="#login"> Login</a>
<a class="link" href="#register"> Register</a>
</nav>



<div class="register" id="register">
<p class="createaccount"> Create Account </p>

<form action="signup-login.php" method="POST">
<!-- use php empty() funtion to ensure that mandatory fields are not blank.--> 

<span class="register1">
<img src="../src/images/person24dp.jpg" alt="User name">
</span>
<input class="itemA" id="firstname" name="fname" type="text" placeholder="First name">
       <span class="error"> <?php if ((isset ($_POST["register"])) && (empty ($_POST["fname"])))
                             {
                                 echo("*First name required");
                                 return false;
                                 exit();
                             } 
                             ?> 
                             </span>

<span class="register1">
<img src="../src/images/person24dp.jpg" alt="User name">
</span>
<input class="itemA" id="lastname" name="sname" type="text" placeholder="Last name">
              <span class="error"> <?php if ((isset ($_POST["register"])) && (empty ($_POST["sname"]))) 
                             {
                             echo("*Last name required");
                             return false;
                                exit();
                             } ?> 
                             </span>

<span class="register2"> 
<img src="../src/images/email24dp.png" alt="User email">
</span>
<input class="itemA" id="email" type="email" name="registeredEmail" placeholder="Email">
             <span class="error"> <?php if ((isset ($_POST["register"])) && (empty ($_POST["registeredEmail"])))
                                     {
                                      echo("*Email required");
                                      return false;
                                        exit();
                                    } ?> 
                                    </span>

<span class="register3"> 
<img src="../src/images/lock24px.jpg" alt="Password">
</span>
<input class="itemA" id="password" type="password" name="password_1" placeholder="Password">
             <span class="error"> 
           <?php
           if ((isset ($_POST["register"])) && (empty ($_POST["password_1"]))) 
           {
               echo("*Password required");
               return false;
                exit();
           } 
           ?> 
       </span>
       
<span class="register3"> 
<img src="../src/images/lock24px.jpg" alt="Password">
</span>
<input class="itemA" id="password" type="password" name="password_2" placeholder="Same password">
              <span class="error"> 
            <?php 
               if ((isset ($_POST["register"])) && (empty ($_POST["password_2"])))  
               {
                echo("*Password required");
                return false;
                exit();
               }  
               elseif((isset ($_POST["register"])) && (($_POST["password_1"]) !== ($_POST["password_2"])))
                               {
                               echo ("*Password not matching");
                               return false;
                               exit();           //execute elseif statement if password doesn't match
                               }?>     
                               </span>


<input class="submit" id="submit" type="submit" name="register" value="Signup">

</form>
</div>




<!--Below is the code for login page-->

<div class="login" id="login">
<p class="createaccount"> Login </p>
<form action="signup-login.php" method="POST">

<span class="login1">
<img src="../src/images/email24dp.png" alt="User email">
</span>
<input class="itemA" id="email" type="email" name="email" placeholder="Email">
         <span class="error"> <?php if ((isset ($_POST["login"])) && (empty ($_POST["email"])))
                                     {echo("*Email required");
                                     return false;
                                     exit();}  ?> </span>


<span class="login2"> 
<img src="../src/images/lock24px.jpg" alt="Password">
</span>
<input class="itemA" id="password" type="password" name="password" placeholder="Password">
         <span class="error"> <?php if((isset ($_POST["login"])) && (empty ($_POST["password"])))
                                     {echo("*Password required");
                                     return false;
                                     exit();}  ?> </span>


<input class="submit" id="submit" type="submit" name="login" value="Signin">
</form>
</div>

</div>



</div>

</body>
</html>



