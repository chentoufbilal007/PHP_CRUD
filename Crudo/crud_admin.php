<?php

require 'config.php';

session_start();
if($_SESSION['email']===null){
  header('Location:login.php');
}
// modifiyn user

if(isset($_POST['btn_modfiyng'])){
    $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$username=$_POST['username'];
$email=$_POST['email'];
$city=$_POST['city'];
$country=$_POST['country'];
$job=$_POST['job'];
$qm="UPDATE `contacts` SET `name`='$username',`email`='$email',`city`='$city',
`country`='$country',`job`='$job' WHERE `id`=$id";
$res=mysqli_query($conn,$qm);
if($res){

    
     }
 
     else{

       //  echo "<script>alert('ooooops  somthing went wrong')</script>";
 
     }


}

//delete user
if(isset($_POST['try'])){
 try{ del();}catch(exception $e){echo "<script>alert('ooooops not work')</script>";}

}
if(isset($_POST['btn_delete'])){ 

header('location:http://localhost/cRUDo/test.html');
   /* $idDelete=$_POST['id_Delete'];
    $qdelete="DELETE FROM `contacts` WHERE `id`=$idDelete";
    $res=mysqli_query($conn,$qdelete);

    if($res){
        echo "<script>alert('the user was deleted with success');</script>";
         }

         else{
             echo "<script>alert('ooooops  somthing went wrong')</script>";
         }*/


}

//show all users 
$show=mysqli_query($conn,"SELECT * FROM contacts ")  ;
function del(){
  require 'config.php';
  $show=mysqli_query($conn,"SELECT * FROM contacts ")  ;
  
while($row=mysqli_fetch_array($show)){
$idx=$row['id'];
$qdelete="DELETE FROM `contacts` WHERE `id`=$idx";
mysqli_query($conn,$qdelete);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ca.css">
    <link rel="stylesheet" href="btn delet style.css">
    <link rel="stylesheet" href="cs.css">
    <title>Crud Page</title>
</head>
<body>
    
	<h1>welcome  <?php  
  
  echo $_SESSION['user']." : ".$_SESSION['email'];
  
  ?>    Back Page</h1>
<div class="pack"></div>
<div class="containr">
    
    <form method="POST" action="" class="form_updte"> 
        <table >
          <tr>
          <td><input type="text" placeholder="Enter User id " name="id" class="tus" id="id" required  ></td>
          <td><input type="text" placeholder="Enter Username" name="username" class="tus" id="username" required></td>
          <td><input type="email" placeholder="Enter your email" name="email" id="email" required></td>
        </tr>
        
          <tr>
          <td><input type="text" placeholder="Enter your city" name="city" id="city" required></td>
          <td> <input type="text" placeholder="Enter country" name="country" id="country" required></td>
          <td><input  type="text" placeholder="Enter job" name="job" id="job" required></td>
        </tr>
          
            <td></td><td><button type="submit" name="btn_modfiyng" class="btn_Modefier">Update</button> </td>
            <td><a href="Add.html"><h2>Add new User</h2></a></td><td><a href="logout.php">Logout Here</a></td>
          </tr>
        </table>
        </form>	
     
    </div>


    <div class="sda">
        <form method="post" action="crud_admin.php">
            <table >
                <tr>
                    <td><input type="number" placeholder="Enter ID user to delete" id="x" name="id_Delete" class="inputSsupp" onkeyup="myFunction1()" > </td>
                    <td></td><td><button onclick="m1()" class="btn_Delete">delete</button></td>
                   </tr>
                    <tr>
                 <td ><input type="text" placeholder="Enter user id to search" name="search_name"  onkeyup="myFunction()" id="input_search" ></td><td></td>
                 <td></td>
       
       
                </tr>
   
           </table>

        </form>

    </div>


    <div class="div_display">
    <form method="post" action="crud_admin.php">
    <table class="styled-table" id="table">
      
      
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>City</th>
              <th>Country</th>
              <th>JobTilte</th>
          </tr>
  
      </thead>
      <?php    while($index=mysqli_fetch_array($show)) {
  
  echo "<tr>";
  
  echo "<td>".$index['id']."</td>";
  echo "<td>".$index['name']."</td>";
  echo "<td>".$index['email']."</td>";
  echo "<td>".$index['city']."</td>";
  echo "<td>".$index['country']."</td>";
  echo "<td>".$index['job']."</td>";
  
  echo "</tr>";
    // code...
  }  ?>
    
  </table></form>

</body>
<script>

function m1(){


    
    var txt;
    var x=document.getElementById('x').value;
var r = confirm("Press a button to confirm your delet!");
if (r == true) {
  txt = "do want to delet this user press OK!";
  window.location.href = "delet.php?id="+x;
} else {
  txt = "You  Cancel!";
}}




function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("input_search");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}




function myFunction1() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("x");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}




var tab=document.getElementById('table');
for (var i=0; i<tab.rows.length; i++){

    tab.rows[i].onclick=function(){
document.getElementById('id').value=this.cells[0].innerHTML;
document.getElementById('username').value=this.cells[1].innerHTML;
document.getElementById('email').value=this.cells[2].innerHTML;
document.getElementById('city').value=this.cells[3].innerHTML;
document.getElementById('country').value=this.cells[4].innerHTML;
document.getElementById('job').value=this.cells[5].innerHTML;

    }
}

</script>

</html>