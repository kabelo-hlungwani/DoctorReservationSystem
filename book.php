<?php
$conn = mysqli_connect("localhost","root","","doctor");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Doctor</title>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--
afflatus, a free CSS web template by ZyPOP (zypopwebtemplates.com/)

Download: http://zypopwebtemplates.com/

License: Creative Commons Attribution
//-->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<style type="text/css">
 .error {color: #FF0000;}
 </style>
</head>

<body>

		<div id="sitename">
			<div class="width">
				<h1><a href="#">Doctor Reservation System</a></h1>
        <?PHP
              
                $name=$surname=$cellno=$staffno="";

               if(isset($_SESSION['email']))
                {


                  $email=$_SESSION['email'];

                  $query="select * FROM patient WHERE email='$email'";
                  $result=mysqli_query($conn,$query);
                  $rows=mysqli_num_rows($result);
                  while ($rows=mysqli_fetch_array($result)) {
                  
                    
                     $staffno = $_SESSION['patient_id']= $rows['patient_id']; 
                     $name = $_SESSION['name']= $rows['name'];  
                     $surname = $_SESSION['surname']= $rows['surname'];
                     //$dob = $_SESSION['dob']= $rows['dob']; 
                     $cellno = $_SESSION['cellno']=$rows['cellno'];
                     
                  
                  }
                }
                  ?>


				<nav>
					<ul>
        					<li><a href="pat.php">Home</a></li>
        	    				
         	   				<li class="start selected end"><a href="#"><?php echo $name." ".$surname;?></a></li>
          	  				
        				</ul>
				</nav>
	
				<div class="clear"></div>
			</div>
		</div>
		<header>
			<div class="width">
        

				<h2> Welcome to my Doctor Appointment Booking System!</h2>		
			</div>
		</header>
		<section id="body" class="width clear">
			<aside id="sidebar" class="column-left">
				<ul>
                	<li>
						<h4>Navigate</h4>
                        <ul class="blocklist">
                            <li  class="selected-item"><a href="pat.php">Home</a></li>
                            <li ><a href="ap.php">Book Appointment</a></li>
                            <li><a href="logout.php">Log out</a></li>
                            
                        </ul>

					</li>	
					
					
				</ul>
			</aside>
			<section id="content" class="column-right">
                		
	    <article>
				<?php
                              $doc_id=$_GET['edt'];
                              $name=$time=$surname=$dob=$email=$cellno=$pwd=$cpwd=$hashp="";
                         
                              $ername=$ersurname=$erdob=$eremail=$ercellno=$erpwd=$ercpwd="";
                              $Tname=$Ttime=$Tsurname=$Tdob=$Temail=$Tcellno=$Tpwd=$Tcpwd=false;
                              


                              
                              if (empty($_POST["name"])) {
                               // $ername = "Date and Time is required";
                                $Tname=false;
                              } else {
                                $name = test_input($_POST["name"]);
                                $Tname=true;
                                $s=date_create($name);
                                $d=date_format($s,"Y-m-d");
                                $sytdate=date("Y-m-d");
                                if ($d<$sytdate) {
                                  $ername = "Date and Time is invalid";
                                $Tname=false;
                                }
                                
                                
                              }

                            

                          
                               if (empty($_POST["surname"])) {
                                //$ersurname = "surname is required";
                                $Tsurname=false;
                               // $surname="N/A";
                              } else {
                                $surname = test_input($_POST["surname"]);
                                $Tsurname=true;
                                // check if name only contains letters and whitespace
                                
                              }
                              
                              if (empty($_POST["time"])) {
                                //$ersurname = "surname is required";
                                $Ttime=false;
                                //$surname="N/A";
                              } else {
                                $time = test_input($_POST["time"]);
                                $Ttime=true;
                                // check if name only contains letters and whitespace
                                
                              }

                                   //cellno
                              if (empty($_POST["cellno"])) {
                                $ercellno = "Type of Doctor is required";
                                $Tcellno=false;
                              } else {
                                $cellno = test_input($_POST["cellno"]);
                                $Tcellno=true;

                                
                              }

                              

                             if (empty($_POST["email"])) {
                                //$eremail= "Payment Type is required";
                                $Temail=false;
                              } else {
                                $email = test_input($_POST["email"]);
                                $Temail=true;
                                // check if e-mail address is well-formed
                                
                              
                               }
                              

                                
                               if ($Tname&&$Ttime&&$Tsurname&&$Temail) {
                                          
                                                    //echo $staffno." ".;
                                                    $currDate=date('Y-m-d');
                                                    $appo_date=$_POST['name'];
                                                    $appo_time=$_POST['time'];         

                                                 /*****new code**** */
                                                 $connect=mysqli_connect("localhost","root","","doctor");
  
                                                 $query="select *from appointment where date='$appo_date' and time='$appo_time'";
                                                 $result=mysqli_query($connect,$query) or die(mysqli_error($connect));
                                                 
                                                 
                                                 $row=mysqli_fetch_array($result);
                                                 if($appo_time=="-Select-")
                                                 {
                                                  echo'<script>alert("Select time")</script>';

                                                 }
                                                 else
                                                 if($row['date']==$appo_date && $row['time']==$appo_time)
                                                 {
                                                 
                                                      echo'<script>alert("Selected time is already Booked.")</script>';    
                                                     
                                                 
                                                 }else
                                                 if($appo_date < $currDate)
                                                  {
                                                 
                                                   echo "<script>alert('Date should be Current date or on coming date.please select the date again.')</script>";
                                                   require 'Ubook.php';  
                                                  }
                                                 /*******ending */
                                                 else 
                                                 {
                                         
                                                  $sql="insert into appointment (date,time,info,payment,patient_id,doctor_id)
                                                   values ('$name','$time','$surname','$email','$staffno','$doc_id')";
                                                  if(mysqli_query($conn,$sql))
                                                      {
                                                          echo '<script type="text/javascript">alert("You Succesfully Booked an Appointment"); window.location = "pat.php";</script>';
                                                          

                                                          
                                                      }else{die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn)); }
                                                    
                                      }
                                    }
                            
                          



                            function test_input($data) {
                              $data = trim($data);
                              $data = stripslashes($data);
                              $data = htmlspecialchars($data);
                              return $data;
                            }
                           
                        

        ?>

            <fieldset>
                <legend>Book Appointment</legend>
                <form action="book.php?edt=<?php echo $doc_id;?>" method="post">
                    <p><label for="name">Date:</label>
                    <input name="name" id="name" value="<?php echo $name;?>" type="date" /> <span class="error"><?php echo $ername;?></span></p>
                   <p>
                    <label for="name">Time:</label>
                    <select name="time" id="time" required>
                    <option value="-Select-">-Select-</option>
                    <option value="08:00">08:00</option>
                    <option value="09:15">08:15</option>
                    <option value="09:30">08:30</option>
                    <option value="09:45">08:45</option>
                    <option value="09:00">09:00</option>
                    <option value="09:15">09:15</option>
                    <option value="09:30">09:30</option>
                    <option value="09:45">09:45</option>
                    <option value="10:00">10:00</option>
                    <option value="10:15">10:15</option>
                    <option value="10:30">10:30</option>
                    <option value="10:45">10:45</option>
                    <option value="11:00">11:00</option>
                    <option value="11:15">11:15</option>
                    <option value="11:30">11:30</option>
                    <option value="11:45">11:45</option>
                    <option value="12:00">12:00</option>
                    <option value="12:15">12:15</option>
                    <option value="12:30">12:30</option>
                    <option value="12:45">12:45</option>
                    <option value="13:00">13:00</option>
                    <option value="13:15">13:15</option>
                    <option value="13:30">13:30</option>
                    <option value="13:45">13:45</option>
                    <option value="14:00">14:00</option>
                    <option value="14:15">14:15</option>
                    <option value="14:30">14:30</option>
                    <option value="14:45">14:45</option>
                    <option value="15:00">15:00</option>
                    <option value="15:15">15:15</option>
                    <option value="15:30">15:30</option>
                    <option value="15:45">15:45</option>
                    <option value="16:00">16:00</option>
  </select></p>
                    

                    <p><label for="email">Additional info:</label>
                    <input name="surname" id="surname" value="<?php echo $surname;?>" type="text" /> <span class="error"><?php echo $ersurname;?></span> </p>

                   
                  

                    <p><label for="email">Payment Type:</label>
                    
                    <select name="email">
                      <option>Medical Aid</option>
                      <option>Cash</option>
                      <option>Card</option>
                    </select>
                    <span class="error"><?php echo $eremail;?></span>
                  </p>

                    

                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Send" type="submit" /></p>

                    
                </form>
              </fieldset>
				
			</article>
		</section>

	</section>
	
		<footer class="clear">
			<div  class="width">
				<p class="left">&copy; 2020 sitename.</p>
				
			</div>
		</footer>
</body>
</html>
