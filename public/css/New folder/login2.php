<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>login form</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
<?php
include('config2.php');

if(isset($_POST['submit']))
{
$name=mysqli_real_escape_string($link,$_POST['name']);
$mail=mysqli_real_escape_string($link,$_POST['mail']);
$password=mysqli_real_escape_string($link,$_POST['password']);

$query1=mysqli_query($link,"insert into user1 values('$name','$mail','$password')");
if($query1)
{
header("location:login2.php");
}
else
{ 
echo("Error description: " . mysqli_error($link));}
}
?>
<div class="loginpage">
    <div class="form">
            <h1>Login here</h1>

<form class="register-form" method="post" action="">
   
    <p>user name</p>
   <input type="text" name="name" placeholder="Enter username">
  <p>Email</p>
  <input type="text" name="mail" placeholder="Enter emial id">
  <p>Password</p>
  <input type="password" name="password" placeholder="Enter Password">
  <input type="submit" name="submit" value="Create">
    <a href="#">Log in</a></p>
 
</form>
</div>
</div>
<script src="js/jquery-1.11.1.min.js"></script>
<script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity:"toggle"},"slow");});

    
</script>
</body>
</html>