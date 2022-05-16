<?php session_start();
if(!isset($_SESSION['email']))
{echo "<p style ='font-size:1.5rem; text-align:center; margin-top:20%;'>Please <a href='signup-login.php'>log in </a> </p>";
return false; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head style="background-color: white;">
<title>Dashboard</title>

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
<body class="dashboard">
    

<div class="dashboard_items">

<picture style="max-width:100%; height:auto;">
<source srcset="../src/images/logo2-300px.png"  media="(max-width:300px)">
<source srcset="../src/images/logo2-639px.png"  media="(max-width:639px)">
<source srcset="../src/images/logo2-900px.png"  media="(max-width:900px)">
<source srcset="../src/images/logo2-1100px.png"  media="(max-width:1100px)">
<source srcset="../src/images/logo2.png"  media="(min-width:1280px)">
<img src=" ../src/images/logo2.png" alt="Talker" title="Talker logo">
</picture>

<h2 style="margin:-3em auto 1em auto;"> Dashboard</h2>

<small class="show_email"> 
<?php echo $_SESSION["email"]; ?>
</small>
<small class="time"> 
<?php 
echo date("D, M j Y."); ?> 
</small>
</div>
</div>


<div class="sidebar" >
<a class= "dashboard_links" href= "#iframeOne">  Account </a>
<a class= "dashboard_links" href= "#iframeTwo">     Contacts </a>
<a class= "dashboard_links" href= "#iframeThree">     Messages </a>
<a class= "dashboard_links" href= "homepage.php"> Logout </a>
<a class="smallscreen" href="#menulist"><i class="material-icons">menu</i></a>
</div>


<div class="smallscreen" id="menulist">
<a style="color:white; margin-bottom: 1em;" href="#" target="_self"> <i class="material-icons">cancel_presentation</i></a>
<a class= "ghost_links" href= "#iframeOne">  Account </a>
<a class= "ghost_links" href= "#iframeTwo">     Contacts </a>
<a class= "ghost_links" href= "#iframeThree">     Messages </a>
<a class= "ghost_links" href= "homepage.php"> Logout </a>
</div>

<div class="content">

<div id="iframeOne"> 
<div class="MyAccount" id="MyAccount">
<a class= "profileLink" href="inputprofile.php"> Edit</a><br>

<div id="outputprofile"> 
<output class= "profile"> <?php echo $_SESSION["fname"]; ?>
</output>
<output class= "profile"> <?php echo $_SESSION["sname"]; ?>
</output>
<output class= "profile"> <?php echo $_SESSION["email"]; ?>
</output>
<output class= "profile">
Password:******* 
</output>
</div>

</div>
</div>

<div id="iframeTwo"> 
<h1 style="margin-top:15%;"> This page is under construction...</h1>
</div>

<div id="iframeThree"> 
<h1 style="margin-top:15%;"> This page is under construction...</h1>
</div>

<div id="imgSizing">
<picture style="max-width:100%; height:auto;">
<source srcset="../src/images/greetings300px.png" media="(max-width:300px)">
<source srcset="../src/images/greetings639px.png" media="(max-width:639px)">
<source srcset="../src/images/greetings900px.png" media="(max-width:900px)">
<source srcset="../src/images/greetings1100px.png" media="(max-width:1100px)">
<source srcset="../src/images/greetings.png" media="(min-width:1280px)">
<img src="../src/images/greetings300px.png" id="greetings" alt="Greetings" title="Greetings">
</picture>
</div>

</div>

<footer class="footing">
<p style="text-align:center; margin-top:2em; line-height:1.5;">
 Talker - A project on <a href="https://www.chingu.io/">Chingu </a> 
<br> Created by Dayo Abdul 
<br> &#169; 2022
</p>
</footer>

</body>
</html>



