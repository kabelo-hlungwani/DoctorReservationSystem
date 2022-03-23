
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
        					<li><a href="index.php">Home</a></li>
        	    				
          	  				
        				</ul>
				</nav>
	
				<div class="clear"></div>
			</div>
		</div>
		<header>
			<div class="width">
				<h2>Welcome to my Doctor Appointment Booking System!</h2>		
			</div>
		</header>
		<section id="body" class="width clear">
			<aside id="sidebar" class="column-left">
				<ul>
                	<li>
						<h4>Navigate</h4>
                        <ul class="blocklist">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">Patient Sign In</a></li>
                             <li><a href="dlogin.php">Doctor  Sign In</a></li>
                             <li class="selected-item"><a href="dreg.php">Doctor Sign Up</a></li>
                            <li ><a href="register.php">Patient Sign Up</a></li>
                        
                            <li ><a href="recp.php">Adminstrator</a></li>
                        </ul>

					</li>	
					
					
				</ul>
			</aside>
			<section id="content" class="column-right">
                		
	    <article>
				    
     
				<h3>Registration Form</h3>
				<fieldset>

					<legend>Doctor</legend>
          <script>

    
function validateForm() 
{
var nerror=document.getElementById("nerror");
var serror=document.getElementById("serror");
var cerror=document.getElementById("cerror");
var error=document.getElementById("error");
var terror=document.getElementById("terror");
var errormessage=document.getElementById("errorpass");

if(document.forms["form"]["name"].value==""&&document.forms["form"]["surname"].value==""&&document.forms["form"]["cellno"].value==""&&
   document.forms["form"]["email"].value==""&&document.forms["form"]["pwd"].value==""&&document.forms["form"]["doctor_type"].value=="")
{

nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
cerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
terror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"

return false;


}else
{
//name 
var name=document.forms["form"]["name"].value;


if(name=="")
{

   nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}else if(!name.match(/[a-zA-Z][a-zA-Z ]/))
{
nerror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

nerror.innerHTML=""; 
}
//surname

var surname=document.forms["form"]["surname"].value;


if(surname=="")
{

   serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!surname.match(/[a-zA-Z][a-zA-Z ]/))
{
serror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

serror.innerHTML="";  
}
//docType

var doctor_type=document.forms["form"]["surname"].value;


if(doctor_type=="")
{

   terror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!doctor_type.match(/^[a-zA-Z ]*$/))
{
terror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

terror.innerHTML="";  
}


//cellno
var cellno=document.forms["form"]["cellno"].value;

if(cellno=="")
{

   cerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(cellno.substring(0,1)!="0")
{


cerror.innerHTML="<span style='color:red;''>"+" Cell number must start with 0.*</span>";
return false;
}
else
if(!cellno.match(/^[0-9]+$/))
{

cerror.innerHTML="<span style='color:red;''>"+"field should be filled with number only.*</span>";
return false;   
}
else
if(cellno.toString().length!=10)
{
cerror.innerHTML="<span style='color:red;''>"+"field should be 10 characters.*</span>";    

return false;   
}
else
{
cerror.innerHTML="";

}
//email

var email=document.forms["form"]["email"].value;

if(email=="")
{

   error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else
if(!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) ||/[^a-zA-Z0-9.@_-]/.test(email))
{
error.innerHTML="<span style='color:red;''>"+" Invalid email.*</span>";

return false;
}
else
{
error.innerHTML="";
}

//
var passd=document.forms["form"]["pwd"].value;
var cpassd=document.forms["form"]["cpassword"].value;




var cerrormessage=document.getElementById("cerrorpass");
var pass=document.getElementById("pwd").value;

if(pass=="")
{

   errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}else
{
errormessage.innerHTML="";
}
//contain atleast 1 lowercase

if(!pass.match(/^(?=.*[a-z])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 lowercase alphabetical character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain atleast 1 uppercase
if(!pass.match(/^(?=.*[A-Z])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 uppercase alphabetical character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain atleast 1 numeric
if(!pass.match(/^(?=.*[0-9])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 numeric character.*</span>"
return false;
}
else
{
errormessage.innerHTML="";
}
//contain special character
if(!pass.match(/^(?=.*[!@#\$%\^&\*])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain special character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain 8 or more characters
if(!pass.match(/^(?=.{8,})/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password shouldcontain 8 or more characters.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//confirm password
//step 1
if(cpassd==""){

cerrormessage.innerHTML="<span style='color:red;''>"+" confirm Password.*</span>";
return false;   
}else
{

cerrormessage.innerHTML="";
}




if(cpassd!=passd){

errormessage.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
cerrormessage.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
return false;   
}else
{
errormessage.innerHTML=""
cerrormessage.innerHTML=""
}




}


}
</script>

					<form action="docreg.php" name="form" onsubmit="return validateForm();" method="post">
                    <p><label for="name">Name:</label>
                    <input name="name" id="name" value="" type="text" /> <span id="nerror"></span> </p>
                   
                    <p><label for="email">Surname:</label>
                    <input name="surname" id="surname" value="" type="text" /> <span id="serror"></span></p>

                    <p><label for="email">Doctor Type:</label>
                    <input name="doctor_type" id="doctor_type" value="" type="text" /><span id="terror"></span> </p>
            
                    <p><label for="name">Cell phone:</label>
                    <input name="cellno" id="cellno" value="" type="text" /><span id="cerror"></span> </p>

                    <p><label for="email">Email:</label>
                    <input name="email" id="email" value="" type="email" /><span id="error"></span> </p>

                    <p><label for="name">Password:</label>
                    <input name="pwd" id="pwd" value="" type="password" /><span id="errorpass"></span> </p>

                    <p><label for="email">Confirm Password:</label>
                    <input name="cpassword" id="cpwd" value="" type="password" /><span id="cerrorpass"></span> </p>

                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Send" type="submit" /></p>

                    
                </form>				</fieldset>
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
