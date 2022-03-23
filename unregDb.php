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

<style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
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
						<h4>Menu-Bar</h4>
                        <ul class="blocklist">
                          
                            <li><a href="logout.php">Log out</a></li>
                            
                        </ul>

					</li>	
					
					
				</ul>
      </aside>
      


    

</body>

			<section id="content" class="column-right">
      <h3>Manual Appointments(Phone call)</h3>
      <p style="color: white;"><a class="button button-reversed" href="uap.php" >Add New Appointment</a>
                                                
                                      
                   
                   </p>        		
	    <article>
				<?PHP
              
                

               

                  

                  $query="SELECT uappointment.uAppoint_id as app_id,uappointment.Surname as PSurname,uappointment.Name as PName,uappointment.idNumber as id_no,uappointment.date as date,uappointment.time as time,uappointment.info as info,concat('Ref2020',uappointment.uAppoint_id) as ref,doctor.name as Dname,doctor.surname as Dsurname,doctor.doctor_type FROM uappointment,doctor WHERE  uappointment.doctor_id=doctor.doctor_id";
                  $result=mysqli_query($conn,$query);
                  
                  $rows=mysqli_num_rows($result);
                  
                 
                  
                  if ($rows>0) {
                    
                    ?>

                     <!-- Trigger/Open The Modal -->
 

                                          
                                          <!-- The Modal -->
                                          <div id="myModal" class="modal">
                                          
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                              <span class="close">&times;</span>
                                              
                                              <fieldset>
                                                          <legend>Search by Id-Number</legend>
                                                          <form action="search.php" method="GET">
                                                           
                                                              <input name="filter"  value="" type="text"  required /></p>
                                                              <p><input name="search" style="" class="formbutton" value="Search" type="submit" /></p>
                                          
                                                          </form>
                                                        </fieldset>  
                                          
                                          </div>
                                          
                                          </div>

                     
                    
                   <th>
                   <p style="color: white;">
                                                <a class="button button-reversed" href="UnregDailyRep.php" >Daily-Report</a>   
                                                <a class="button button-reversed" href="unregweeklyRep.php" >Weekly-Report</a>
                                                <a class="button button-reversed" href="unregmonthlyRep.php" >Monthly-Report</a><p>
                                                <p style="color: white;" ><a id="myBtn"  class="button button-reversed">Search</a>
                                                
                   
                   
                   
                   </p></th>
                    
                
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
                    <td><?php echo $rows['date']." ".$rows['time'];?></td>
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
        

        <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>








