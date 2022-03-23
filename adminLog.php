<?php
 
if(isset($_POST['Username']) && isset($_POST['Password'])){
 //Assign
$Username=$_POST['Username'];
$Password=$_POST['Password'];
//check record
$connect=mysqli_connect("localhost","root","","doctor");

$query="select * from admin where Username='$Username'and Password='$Password'";

$result=mysqli_query($connect,$query) or die(mysqli_error($connect));


$row=mysqli_fetch_array($result);


if(strtolower($row['Username'])==strtolower($Username) && $row['Password']==$Password)
{
    echo'<script>alert("Login was successful")</script>'; 
    require 'Choose.php';

}else
{
 echo'<script>alert("Wrong username and password")</script>';    
 require 'recp.php'; 
}

}

?>

