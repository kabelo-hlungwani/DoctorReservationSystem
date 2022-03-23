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
			


    

</body>

			<section id="content" class="column-right">
      
      <p style="color: white;"><a class="button button-reversed" href="unregDb.php" >Close</a>
                                             
                                            
                   </p>        		
	    <article>
				<?PHP
              
                
              $filter=$_GET['filter'];
               
      
                  $query="SELECT uappointment.uAppoint_id as app_id,uappointment.Surname as PSurname,uappointment.Name as PName,uappointment.idNumber as id_no,uappointment.date as date,uappointment.info as info,concat('Ref2020',uappointment.uAppoint_id) as ref,doctor.name as Dname,doctor.surname as Dsurname,doctor.doctor_type 
                  FROM uappointment,doctor 
                  WHERE  uappointment.doctor_id=doctor.doctor_id
                  AND   (uappointment.idNumber = $filter)";
                  


                  $result=mysqli_query($conn,$query);
                  
                  $rows=mysqli_num_rows($result);
                  
                 
                  
                  if ($rows>0) {
                    
                    ?>

                    
                    
            
                
                    <table cellspacing="0">
                    <tr>
                    <th>Appointment Id</th>
                    <th>Patient Surname</th>
                    <th>Patient Name</th>
                    <th>Id Number</th>
                    <th>Date and Time</th>
                    <th>Additional info</th>
                    <th>Reference No.</th>
                    
                    <th>Dr Name</th>
                    <th>Dr Specialisation</th>
                        
                        <th>Schedule Appointment</th>
                        <th>Cancel Appointment</th>
                        <th></th>
                    </tr>
                    <?php
                    while ($rows=mysqli_fetch_array($result)) {
                  ?>
                    
                   
                    <tr>
                    <td><?php echo $rows['app_id'];?></td>
                    <td><?php echo $rows['PSurname'];?></td>
                    <td><?php echo $rows['PName'];?></td>
                    <td><?php echo $rows['id_no'];?></td>
                    <td><?php echo $rows['date'];?></td>
                    <td><?php echo $rows['info'];?></td>
                    <td><?php echo $rows['ref'];?></td>
                    
                    
                    <td><?php echo $rows['Dname']." ".$rows['Dsurname'];?></td>
                    <td><?php echo $rows['doctor_type'];?></td>

                   
                    <th><p style="color: white;"><a class="button button-reversed" href="unreUpdate.php?edt=<?php echo $rows['app_id'];?>" >schedule</a></p></th>
                    <th><p style="color: white;"><a class="button button-reversed" href="deleteUnreg.php?edt=<?php echo $rows['app_id'];?>" >Cancel</a></p></th>
                
                    
                  
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








