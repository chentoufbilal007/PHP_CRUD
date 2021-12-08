<?php
$host="localhost";
$username="root";
$password="";
$db="dar";


$conn=mysqli_connect($host,$username,$password,$db);

if($conn){

//echo "Connection established";
}else{
    
die("Could not connect to");
}






?>