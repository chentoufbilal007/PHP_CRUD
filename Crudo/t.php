<?php

require 'config.php';
echo "look1";
$show=mysqli_query($conn,"SELECT `id`, `username`, `email`, `passwords` FROM `log`  ")  ;

 echo "look2";

  while($row=mysqli_fetch_array($show)){
 
  $idx=$row['id'];
  echo "look3".$idx;
  $qdelete="DELETE FROM `log` WHERE `id`=$idx";
  $res=mysqli_query($conn,$qdelete);
 
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>