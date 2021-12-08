<?php
require_once 'config.php';
session_start();

if(isset($_POST['submit'])){


    $email=$_POST['email'];
    $pass=$_POST['password'];
    

    $query="SELECT * FROM `log` WHERE  email='$email' and passwords='$pass' ";
    $row = mysqli_fetch_array(mysqli_query($conn,$query));

    $_SESSION['user']=$row['username'];


   //$result=mysqli_fetch_array($res);$result['email']==$email && $result['password']==$pass

if(mysqli_num_rows(mysqli_query($conn,$query))>0){
    
    $_SESSION['email']=$email;
header('location:http://localhost/cRUDo/crud_admin.php');
   ///echo "<script>alert('dfgsddsqfsdfqsdqsdsqsddqsq');</script>";
}else{ 

    echo "<script>alert('Oooops c wrong password try again');</script>";

}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="logiin.css">
</head>
<body>

    <div class="container">
    <form method="post" action="login.php" >
   <input type="email" placeholder="Enter email" name="email"   required><br><br>
   <input type="password" placeholder="Enter password" name="password" required><br><br><br>
   <input type="submit"  name="submit" value="Submit"  class="btn_submit"> <br><br><br><br>
   <a href="register.php"> <h2>click here to register</h2> </a>
    </form> 
</div>
</body>
</html>