<?php


$conn = mysqli_connect("localhost","root","","doctor");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //session_start();
//echo password_hash("Kabelo@15",PASSWORD_DEFAULT)


$usename="admin@admin.com";
$password=MD5("Kabelo@15");


$query="insert into admin(Username,Password)
            Values('$usename','$password')";

            if(mysqli_query($conn,$query))
            {
                echo '<script type="text/javascript">alert("Account Authorized!!");</script>';
                

                
            }else{die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn)); }

?>