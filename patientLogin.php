<?php
 
if(isset($_POST['email']) && isset($_POST['pwd'])){
 //Assign
$email=$_POST['email'];
$password=$_POST['pwd'];
//check record
$connect=mysqli_connect("localhost","root","","doctor");

$query="select * from patient where email='$email' and password='$password'";
$result=mysqli_query($connect,$query) or die(mysqli_error($connect));


$row=mysqli_fetch_array($result);

if($row['email']==$email && $row['password']==$password)
{
    echo'<script>alert("Login was successful")</script>'; 
  
    echo '<script> window.location = "pat.php";</script>';

}else
{
 echo'<script>alert("email and password does not exist")</script>'; 

 require 'login.php'; 
}
}
?>

