<?php
require_once 'config.php';



    $id=$_GET['id'];
    echo $_GET['id'];
    $qdelete="DELETE FROM `contacts` WHERE `id`='$id'";
    $res=mysqli_query($conn,$qdelete);

    if($res){
        header('location:http://localhost/cRUDo/crud_admin.php');
         }
         else{
             echo "<script>alert('ooooops  somthing went wrong')</script>";
         }



?>