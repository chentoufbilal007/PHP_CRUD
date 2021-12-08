<?php
require_once 'config.php';




if(isset($_POST['Sub'])){


    $usernam=$_POST['username'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $job=$_POST['job'];
try{
    if(!empty($usernam)||!empty($email)||!empty($city)||!empty($country)||!empty($job)){
        
        $q=" INSERT INTO `contacts`(`name`, `email`, `city`, `country`, `job`) VALUES
    ('$usernam','$email','$city','$country','$job')";

    $res=mysqli_query($conn,$q);
       
    if($res){header('location:Add.html');}}}
    catch(Exception $e){
   
          header('location:Add.html');
        
        
        }

  

}

   
      
     
   
    
        






?>



