
<?php

$connect=mysqli_connect("localhost","root","","doctor");

$id=$_GET['edt'];

$qry=mysqli_query($connect,"select * from uappointment where uAppoint_id='$id'");

$data=mysqli_fetch_array($qry);


if(isset($_POST['Update']))
{

    
    $Surname=$_POST['Surname'];
    $Name=$_POST['Name'];
    $idNumber=$_POST['idNumber'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $info=$_POST['info'];
    
   /**********code */
   $currDate=date('Y-m-d');
   $appo_date=$_POST['date'];
   $appo_time=$_POST['time'];         

/*****new code**** */
$connect=mysqli_connect("localhost","root","","doctor");

$query="select *from uappointment where date='$appo_date' and time='$appo_time'";
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

 }

else 
{
   /******end here */
  
$command=" UPDATE uappointment SET Surname='$Surname',Name='$Name',idNumber='$idNumber',date='$date',time='$time',info='$info' WHERE uAppoint_id='$id'";
$edit=mysqli_query($connect,$command);    

if($edit){
mysqli_close($connect);

echo '<script>alert("Information Updated.");window.location = "unregDb.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}
}
}


?>




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

                

              
                <form action="" method="post">

<p><label for="email">Surname:</label>
    <input name="Surname" id="Surname" value="<?php echo $data['Surname']?>" type="text" required/>  </p>

    <p><label for="email">Name:</label>
    <input name="Name" id="Name" value="<?php echo $data['Name']?>" type="text" required/>  </p>

    <p><label for="email">Id Number:</label>
    <input name="idNumber" id="idNumber" value="<?php echo $data['idNumber']?>" type="text" required />  </p>

    <p><label for="name">Date</label>
    <input name="date" id="date" value="<?php echo $data['date']?>" type="date"  required/>  </p>
   
    <p>
    <p><label for="name">Time :</label>
    <select name="time" id="time" required>
                    <option value="-Select-">-Select-</option>
                    <option value="08:00">08:00</option>
                    <option value="08:15">08:15</option>
                    <option value="08:30">08:30</option>
                    <option value="08:45">08:45</option>
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
  </select>
   </p>

    <p><label for="email">Additional info:</label>
    <input name="info" id="info" value="<?php echo $data['info']?>" type="text" required/>  </p>

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
