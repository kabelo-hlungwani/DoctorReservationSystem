<?php
    

    
    $conn = mysqli_connect("localhost","root","","doctor");
    
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      
            
            $name=mysqli_escape_string($conn,$_REQUEST['name']);
            $surname=mysqli_escape_string($conn,$_REQUEST['surname']);
            $cellno=mysqli_escape_string($conn,$_REQUEST['cellno']);
            $email=mysqli_escape_string($conn,$_REQUEST['email']);
            $doctor_type=mysqli_escape_string($conn,$_REQUEST['doctor_type']);
           // $password=mysqli_escape_string($conn,$_REQUEST['pwd']);
           $password=mysqli_escape_string($conn,password_hash($_REQUEST['pwd'],PASSWORD_DEFAULT));
    
        
            if (isset($_POST['send'])) {
    
    
            $query="select * from doctor where email='$email'";
    
            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
    
            $row=mysqli_fetch_array($result);
    
            if($row['email']==$email)
            {
              echo '<script type="text/javascript">alert("Email Account exist Please login"); window.location = "dlogin.php";</script>';
             
            }                                               
            else{   
            $sql="insert into doctor (name,surname,doctor_type,email,cellno,password)
                  values ('$name','$surname','$doctor_type','$email','$cellno','$password')";
    
                 if(mysqli_query($conn,$sql))
                 {
         
           echo '<script type="text/javascript">alert("You Succesfully Registered Please Login Your Account"); window.location = "dlogin.php";</script>';
              
                                                              
               }
               else{
                 
                die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn));
              
              }
            }
          }                                          
    
            ?>
    
    
    
    