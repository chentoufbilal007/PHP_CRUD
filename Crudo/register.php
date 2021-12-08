<?php
require_once 'config.php';

if(isset($_POST['Sub_add'])){


    $usernam=trim($_POST['username']);
    $email=trim($_POST['email']);
    $pass=md5($_POST['pass']);
    $rpass=md5($_POST['rpass']);
    if($pass==$rpass&&strlen($pass)>8){ 
    $q=" INSERT INTO `log`( `username`,`email`, `passwords` ) VALUES ('$usernam',' $email','$pass')";
    $res=mysqli_query($conn,$q);
    if($res){ 

        echo '<script>alert("ADDED with success");</script>';
      

       }

}else
{echo '<script>alert("User has been exist try another one ");</script>';}




    
   


    

}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>registered page </title>
</head>
<body>
<div class="registered">

<form method="POST" action="register.php">
    
       <span><span>
<input type="text" placeholder="Enter username" name="username" required><br>
<input type="email" placeholder="Enter your email" name="email" required><br> 
<input type="password" placeholder="Enter your password" name="pass" required><br> 
<input type="password" placeholder="repeat your password" name="rpass" required><br>  

<button type="submit" name="Sub_add" class="btn_submit">Add</button> 

</form>	
<a href="login.php"> <h2>click here to login</h2> </a>
</div>

</div>
</body>
</html>