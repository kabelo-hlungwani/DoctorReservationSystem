<?php
session_start();
 /***************************** */

 /***************************** */
 
if(isset($_POST['email']) && isset($_POST['pwd'])){
 //Assign
$email=$_POST['email'];
$password=$_POST['pwd'];
//check record
$connect=mysqli_connect("localhost","root","","doctor");

$query="select * from doctor where email='$email' and password='$password'";
$result=mysqli_query($connect,$query) or die(mysqli_error($connect));


$row=mysqli_fetch_array($result);

if($row['email']==$email && $row['password']==$password)
{

  $_SESSION['email']=$row['email'];
  $email=$_SESSION['email'];

    echo'<script>alert("Login was successful")</script>'; 
  
    echo '<script> window.location = "dr.php";</script>';

}else
{
 echo'<script>alert("email and password does not exist")</script>';    
 require 'dlogin.php'; 
}
}
?>