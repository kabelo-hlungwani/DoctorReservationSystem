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
                            <li><a href="dlogin.php">Doctor Sign In</a></li>
                            <li ><a href="register.php">Patient Sign Up</a></li>
						              	<li ><a href="dreg.php">Doctor Sign Up</a></li>
						              	<li class="selected-item"><a href="recp.php">Adminstrator</a></li>
                            
                        </ul>

					</li>	
					
					
				</ul>
			</aside>
			<section id="content" class="column-right">
                		
	    <article>
			 
			
				<h3>Sign In</h3>
				<fieldset>

					<legend>Admin</legend>

          <script>

    
function validateForm() 
{
var uerror=document.getElementById("uerror");
var perror=document.getElementById("perror");


if(document.forms["form"]["Username"].value=="" && document.forms["form"]["Password"].value=="")
{

uerror.innerHTML="<span style='color:red;''>"+" username required *</span>"
perror.innerHTML="<span style='color:red;''>"+" password required *</span>"

return false;

}

}
</script>
					<form action="adminLog.php" name="form" onsubmit="return validateForm();" method="post">
                    
                    <p><label for="email">Email:</label>
                    <input name="Username" id="email" value="" type="email" /><span id="uerror"></span></p>
                    
                    <p><label for="name">Password:</label>
                    <input name="Password" id="pwd" value="" type="Password" /><span id="perror"></span></p>
                    

                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Login" type="submit" /></p>

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
