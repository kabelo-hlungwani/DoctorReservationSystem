
<?php

$connect=mysqli_connect("localhost","root","","doctor");

$id=$_GET['edt'];


$qry=mysqli_query($connect,"select patient.surname as psur,patient.name as pnam,patient.cellno as pcell,appointment.info as ainf,appointment.date as adat,appointment.payment as payt from patient,appointment where appointment.patient_id=patient.patient_id and appoint_id='$id'");

$data=mysqli_fetch_array($qry);

if(isset($_POST['Update']))
{

    
    $date=$_POST['adate'];
    $info=$_POST['info'];
    $time=$_POST['time'];
    $payment=$_POST['payment'];

    $name=$_POST['Name'];
    $surname=$_POST['Surname'];
    $cellno=$_POST['cellno'];
   
  
$command="UPDATE  patient,appointment
 SET 
 patient.surname='$surname',patient.name='$name',patient.cellno='$cellno',appointment.date='$date',appointment.time='$time',appointment.info='$info',appointment.payment='$payment' 
 WHERE appointment.patient_id=patient.patient_id 
 and 
 appoint_id='$id'";


$edit=mysqli_query($connect,$command);    

if($edit){
mysqli_close($connect);

echo '<script>alert("Information Updated.");window.location = "regDb.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}
}


?>







<script>

function validateForm() 
{


//Surname
var sname=document.forms["Form"]["Surname"].value;
if(!sname.match(/^[a-zA-Z]*$/))
{
alert("Your surname must contain letters of alphabets only.");

return false;
}
  //names
  var Lname=document.forms["Form"]["Name"].value;
if(!Lname.match(/^[a-zA-Z ]*$/))
{
alert("Your name must contain letters of alphabets only.");

return false;
}
//phone numbers
var num=document.forms["Form"]["cellno"].value;
 if(num.substring(0,1)!="0")
    {
 
 alert("Phone number should start with 0");
 return false;
 }
 if(!num.match(/^[0-9]+$/))
 {
 alert("Phone number field should be filled with number only");
 return false;   
 }
 if(!num.match(/^[0-9]+$/))
 {
 alert("Phone number field should be filled with number only");
 return false;   
 }  
 if(num.toString().length!=10)
 {
     
 alert("Phone number should be 10!");
 return false;   
 }
//description
var x=document.forms["Form"]["info"].value;
if(!x.match(/^[a-zA-Z ]*$/))
{
alert("Your Additional information must contain letters of alphabets only.");

return false;
}






}
</script>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Doctor</title>

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<style type="text/css">
 .error {color: #FF0000;}
 </style>

</head>

<body>

		<div id="sitename">
			<div class="width">
			</div>
		</div>
		<header>
			<div class="width">
        

				<h2 style="text-align:center"> Re-Schedule</h2>		
			</div>
		</header>
		<section id="body" class="width clear">
			
			<section id="content" class="column-right">
                		
	    <article>
			
            <fieldset>
                <legend>Update the Appointment</legend>

                <form name="Form" action="" method="post" onsubmit="return validateForm();">
                  
                <p><label for="email">Surname:</label>

                <input name="Surname" id="Surname" value="<?php echo $data['psur']?>" type="text"  required/> </p>

                <p><label for="email">Name:</label>

                <input name="Name" id="Name" value="<?php echo $data['pnam']?>" type="text"  required/> </p>

              
                <p><label for="email">Phone No:</label>

                  <input name="cellno" id="cellno" value="<?php echo $data['pcell']?>" type="text"  required/> </p>
                  
                    <p><label for="name">Date :</label>

                    <input name="adate" id="date" value="<?php echo $data['adat']?>" type="date" required /> </p>

                    <p><label for="name">Time :</label>
                    <select name="time" id="time" required>
                    <option>Time</option>
                    <option value="8:00">8:00</option>
                    <option value="8:15">8:15</option>
                    <option value="8:30">8:30</option>
                    <option value="8:45">8:45</option>
                    <option value="9:00">9:00</option>
                    <option value="9:15">9:15</option>
                    <option value="9:30">9:30</option>
                    <option value="9:45">9:45</option>
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
  </select>
   </p>
                   
                    

                    <p><label for="email">Additional info:</label>

                    <input name="info" id="info" value="<?php echo $data['ainf']?>" type="text"  required/> </p>

                   
                  

                    <p><label for="">Payment Type:</label>
                    
                    <select  name="payment" value="<?php echo $data['payt']?>" required>

                      <option   >Medical Aid</option>
                      <option   >Cash</option>
                      <option   >Card</option>
                    </select>
                  </p>

                    

                    <p><input name="Update" style="margin-left: 150px;" class="formbutton" value="Update" type="submit" /></p>

                    
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
