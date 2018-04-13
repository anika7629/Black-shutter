<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>login form</title>

  
  <style type="text/css">
body{
  margin: 0;
  padding: 0;
  height: 100vh;
  background-image:url(cd.jpg);
  background-size: cover;
  background-position: center;
  font-family: sans-serif;
}
.loginpage{
  width: 360px;
  background: #000;
  color: #fff;
  top: 50%;
  left:50%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  padding: 70px 30px;
  background: rgba(0,0,0,.5);
}
.form input{
  font-family: "Roboto", sans-serif;
  outline: 1;
  background: #f2f2f2;
  width: 100%;
  border:0;
  margin: 0 0 15px;
  box-sizing: border-box;
  font-size: 14px;


}
.form input [type="text"],input[type="text"]
{
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  color: #fff;
  font-size: 16px;
}

.form input [type="text"],input[type="password"]
{
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  color: #fff;
  font-size: 16px;
}
.form input[type="submit"]
{
  border: none;
  outline: none;
  height: 40px;
  background: #fb2525;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
} 
.form input[type="submit"]:hover
{
 cursor: pointer;
 background: #ffc107;
 color: #000;
}
.form a:hover{
  color: #ffc107;
}

  </style>
</head>

<body >
<?php
include('config.php');

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
<div  class="loginpage">
    <div   class="form">
            <h1>Register here</h1>

<form method="post" action="">
   
    <p >user name</p>
   <input type="text" name="name" placeholder="Enter username">
  <p>Email</p>
  <input type="text" name="mail" placeholder="Enter emial id">
  <p>Password</p>
  <input type="password" name="password" placeholder="Enter Password">
  <input type="submit" name="submit" value="Create">
 
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