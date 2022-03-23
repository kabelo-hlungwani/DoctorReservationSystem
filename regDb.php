<?php
$conn = mysqli_connect("localhost","root","","doctor");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();
?>
<!doctype html>
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
        					<li><a href="Choose.php">Return</a></li>
        	    				
         	   				
          	  				
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
						<h4>Menu</h4>
                        <ul class="blocklist">
                          
                            <li><a href="logout.php">Log out</a></li>
                            
                        </ul>

					</li>	
					
					
				</ul>
			</aside>
			<section id="content" class="column-right">
                		
	    <article>
				<?PHP
              
                

               

                  

                  $query="SELECT patient.name as Name,patient.surname as Surname,patient.cellno as cellno, appointment.appoint_id as app_id,appointment.date as date,appointment.time as time,appointment.info as info,appointment.payment as payment,doctor.name as name,doctor.surname as surname,doctor.doctor_type 
                  FROM patient,appointment,doctor 
                  WHERE  appointment.doctor_id=doctor.doctor_id 
                  and appointment.patient_id=patient.patient_id";
                  $result=mysqli_query($conn,$query);
                  
                  $rows=mysqli_num_rows($result);
                  
                 
                  
                  if ($rows>0) {
                    
                    ?>
                    <h3>Appointments Done Online</h3>
                    <th><p style="color: white;"><a class="button button-reversed" href="dailyRep.php" >Daily-Report</a>   
                                                 <a class="button button-reversed" href="weeklyRep.php" >Weekly-Report</a>
                                                 <a class="button button-reversed" href="monthlyRep.php" >Monthly-Report</a></p>

                    </th>                   

                
                    <table cellspacing="0">
                    <tr>
                    <th>Appointment Id</th>
                    <th>Patient Name</th>
                    <th>Patient Surame</th>
                    <th>Patient Phone Number</th>
                        <th>Date and Time</th>
                        <th>Additional info</th>
                        <th>Payment Type</th>
                        <th>Dr Name</th>
                        <th>Dr Specialisation</th>
                        <th>Cancel Appointment</th>
                        <th>Schedule Appointment</th>
                        <th></th>
                    </tr>
                    <?php
                    while ($rows=mysqli_fetch_array($result)) {
                  ?>
                    
                   
                    <tr>
                    <td><?php echo $rows['app_id'];?></td>
                    <td><?php echo $rows['Name'];?></td>
                    <td><?php echo $rows['Surname'];?></td>
                    <td><?php echo $rows['cellno'];?></td>
                    <td><?php echo $rows['date']." ".$rows['time'];?></td>
                    <td><?php echo $rows['info'];?></td>
                    <td><?php echo $rows['payment'];?></td>
                    <td><?php echo $rows['name']." ".$rows['surname'];?></td>
                    <td><?php echo $rows['doctor_type'];?></td>

                
                    <th><p style="color: white;"><a class="button button-reversed" href="admincancel.php?edt=<?php echo $rows['app_id'];?>" >Cancel</a></p></th>
                    <br>
                    <th><p style="color: white;"><a class="button button-reversed" href="adminUpdate.php?edt=<?php echo $rows['app_id'];?>" >schedule</a></p></th>
                  
                   </tr>
                     <?php
                  
                    }
                    ?>
                    </table>
                    <?php
                  }else{
                    ?>
                    <h3>You don't have any Appointment(s)</h3>
                    <?php
                  }
                  
                
                  ?>
  
				
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
