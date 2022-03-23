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
     

				<nav>
					<ul>
        					<li><a href="pat.php">Home</a></li>
        	    				
         	   				
          	  				
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
                            <li  class="selected-item"><a href="unregDb.php">Return</a></li>
                          
                            
                        </ul>

					</li>	
					
					
				</ul>
			</aside>
			<section id="content" class="column-right">
                		
	    <article>
				<?php
                              $doc_id=$_GET['edt'];
                              $idNumber=$Name=$name=$time=$Surname=$surname=$dob=$email=$cellno=$pwd=$cpwd=$hashp="";
                         
                              $ername=$ersurname=$erdob=$eremail=$ercellno=$erpwd=$ercpwd="";
                              $TName= $Tname=$Ttime=$TSurname=$Tsurname=$Tdob=$Temail=$Tcellno=$Tpwd=$Tcpwd=false;


                              if (isset($_POST['send'])) {
                                 
                              if (empty($_POST["name"])) {
                                $ername = "Date and Time is required";
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
                               
                              } else {
                                $surname = test_input($_POST["surname"]);
                                $Tsurname=true;
                                // check if name only contains letters and whitespace
                                
                              }


                              if (empty($_POST["time"])) {
                                //$ersurname = "surname is required";
                                $Ttime=false;
                              
                              } else {
                                $time = test_input($_POST["time"]);
                                $Ttime=true;
                                // check if name only contains letters and whitespace
                                
                              }
/*************************************************************************************************************************************** */

                              //Surname
                              if (empty($_POST["Surname"])) {
                                //$ersurname = "surname is required";
                                $TSurname=false;
                               
                              } else {
                                $Surname = test_input($_POST["Surname"]);
                                $TSurname=true;
                                // check if name only contains letters and whitespace
                                
                              }

                              //name
                                
                                if (empty($_POST["Name"])) {
                                    //$ersurname = "surname is required";
                                    $TName=false;
                                  
                                  } else {
                                    $Name = test_input($_POST["Name"]);
                                    $TName=true;
                                    // check if name only contains letters and whitespace
                                    
                                  }
                                  //id number
                                  if (empty($_POST["idNumber"])) {
                                    //$ersurname = "surname is required";
                                    $TidNumber=false;
                                  
                                  } else {
                                    $idNumber = test_input($_POST["idNumber"]);
                                    $TidNumber=true;
                                    // check if name only contains letters and whitespace
                                    
                                  }
                               
/**************************************************************************************************************************************** */





                              //
                              
                                   //cellno
                              if (empty($_POST["cellno"])) {
                                $ercellno = "Type of Doctor is required";
                                $Tcellno=false;
                              } else {
                                $cellno = test_input($_POST["cellno"]);
                                $Tcellno=true;

                                
                              }

                              

                             if (empty($_POST["email"])) {
                                $eremail= "Payment Type is required";
                                $Temail=false;
                              } else {
                                $email = test_input($_POST["email"]);
                                $Temail=true;
                                // check if e-mail address is well-formed
                                
                              
                               }
                               

                                
                               if ($TSurname&&$TName&&$TidNumber&&$Tname&&$Tsurname) {
                                          
                                                    //echo $staffno." ".;

                                                    $currDate=date('Y-m-d');
                                                    $appo_date=$_POST['name'];
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
                                                   require 'Ubook.php';  
                                                  }
                                                 /*******ending */
                                                 else 
                                                 {
                                                  $sql="insert into uappointment (Surname,Name,idNumber,date,time,info,doctor_id)
                                                                          values ('$Surname','$Name','$idNumber','$name','$time','$surname','$doc_id')";
                                                  // values ('$name','$surname','$doc_id')";
                                                  if(mysqli_query($conn,$sql))
                                                      {
                                                          echo '<script type="text/javascript">alert("You Succesfully Booked an Appointment"); window.location = "unregDb.php";</script>';
                                                          

                                                          
                                                      }else{die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn)); }
                                                    }
                                                    
                                      }
                            }
                            
                          



                            function test_input($data) {
                              $data = trim($data);
                              $data = stripslashes($data);
                              $data = htmlspecialchars($data);
                              return $data;
                            }
                           


        ?>
       <script>

function validateForm() 
{

  var nerror=document.getElementById("nerror");
    var serror=document.getElementById("serror");
    var derror=document.getElementById("derror");
    var ierror=document.getElementById("ierror");
    var terror=document.getElementById("terror");
    var daterror=document.getElementById("daterror");

if(document.forms["Form"]["Surname"].value==""&&document.forms["Form"]["Name"].value==""&&document.forms["Form"]["idNumber"].value==""&&document.forms["Form"]["surname"].value=="")
{

      nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
      serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
      derror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
      ierror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"

     
    
      return false;


}
else
{
//Surname
var sname=document.forms["Form"]["Surname"].value;

if(sname=="")
{
  serror.innerHTML="<span style='color:red;''>"+" field should not be empty. *</span>"
return false;

}
else
if(!sname.match(/^[a-zA-Z]*$/))
{

serror.innerHTML="<span style='color:red;''>"+" Your surname must contain letters of alphabets only. *</span>"
return false;
}
else
{

  serror.innerHTML="";

}
  //names
  var Lname=document.forms["Form"]["Name"].value;
if(Lname=="")
{
  nerror.innerHTML="<span style='color:red;''>"+" field should not be empty. *</span>"
return false;

}
else
  if(!Lname.match(/^[a-zA-Z ]*$/))
{

nerror.innerHTML="<span style='color:red;''>"+" Your name must contain letters of alphabets only. *</span>"
return false;

}else
{

  nerror.innerHTML="";

}
//idnumber
var Idno=document.forms["Form"]["idNumber"].value;
if(Idno=="")
{

  ierror.innerHTML="<span style='color:red;''>"+" field should not be empty. *</span>"
return false;

}else
if(Idno.toString().length!=13)
{

ierror.innerHTML="<span style='color:red;''>"+" Please check your Id number length,it should be 13. *</span>"
return false;

}
else 
if(!Idno.match(/^[0-9]+$/))
{

ierror.innerHTML="<span style='color:red;''>"+" Id number field should be filled with number only. *</span>"
return false;  
}
//addtional
var cit=Idno.slice(10,11);
   if(cit!="0")
   {
 
   ierror.innerHTML="<span style='color:red;''>"+" Invalid Id Number. *</span>"
return false;    
   }

var cite=Idno.slice(11,12);
   if(cite!="8")
   {
    ierror.innerHTML="<span style='color:red;''>"+" Invalid Id Number. *</span>"
return false;    
   }  
  else
{
  ierror.innerHTML="";

}

//date

//description
var x=document.forms["Form"]["surname"].value;

if(x=="")
{
 
  derror.innerHTML="<span style='color:red;''>"+" field should not be empty. *</span>"
return false;

}else
if(!x.match(/^[a-zA-Z ]*$/))
{
derror.innerHTML="<span style='color:red;''>"+"Your Additional information must contain letters of alphabets only. *</span>"
return false;


}
else
{
  derror.innerHTML="";


}

}

}
</script>

            <fieldset>
                <legend>Book Appointment</legend>
                <form action="Ubook.php?edt=<?php echo $doc_id;?>" name="Form" onsubmit="return validateForm();" method="post">

                <p><label for="email">Surname:</label>
                    <input name="Surname" id="Surname" value="<?php echo $Surname;?>" type="text" /> <span id="serror"><?php echo $ersurname;?></span> </p>

                    <p><label for="email">Name:</label>
                    <input name="Name" id="Name" value="<?php echo $Name;?>" type="text" /> <span id="nerror"><?php echo $ersurname;?></span> </p>

                    <p><label for="email">Id Number:</label>
                    <input name="idNumber" id="idNumber" value="<?php echo $idNumber;?>" type="text" /> <span id="ierror"><?php echo $ersurname;?></span> </p>

                    <p><label for="name">Date :</label>
                    <input name="name" id="name" value="<?php echo $name;?>" type="date" /> <span class="error"><?php echo $ername;?></span> </p>
                   
                    <p>
                    <label for="name">Time:</label>
                    <select name="time" id="time" >
                    <option value="-Select-">-Select-</option>
                    <option value="08:00">8:00</option>
                    <option value="9:15">8:15</option>
                    <option value="9:30">8:30</option>
                    <option value="9:45">8:45</option>
                    <option value="09:00">9:00</option>
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
  </select></p>
                   
                
                    <p><label for="email">Additional info:</label>
                    <input name="surname" id="surname" value="<?php echo $surname;?>" type="text" /> <span id="derror"><?php echo $ersurname;?></span> </p>

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
