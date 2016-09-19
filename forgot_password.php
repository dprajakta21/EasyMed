<?php

require_once("config.php");

//Prevent the user visiting the logged in page if he/she is already logged in
	//if(isUserLoggedIn()) { header("Location: myaccount.php"); die(); }

//Forms posted
 /*$to = divya15sasi@gmail.com;

        //echo "your email is ::".$email;

        //Details for sending E-mail

        $from = "Coding Cyber";

        $url = "http://www.codingcyber.com/";

        $body  =  "Coding Cyber password recovery Script

        -----------------------------------------------

        Url : $url;

        email Details is : $to;

        Here is your password  : $pass;

        Sincerely,

        Coding Cyber";

        $from = "divya15sasi@gmail.com";

        $subject = "CodingCyber Password recovered";

        $headers1 = "From: $from\n";

        $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";

        $headers1 .= "X-Priority: 1\r\n";

        $headers1 .= "X-MSMail-Priority: High\r\n";

        $headers1 .= "X-Mailer: Just My Server\r\n";

        $sentmail = mail ( $to, $subject, $body, $headers1 );*/
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Password Recovery</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>
  <?php require_once("header.php");?>

    <body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Recover Password</h1>
			</div>

			<div class="login">
				<div class="control-group">
				<form name='login' action="recoverymail.php" method='post'>
				<input type="text" class="login-field" value="" placeholder="Enter Email ID" name="email">
				<label class="login-field-icon fui-user" for="email"></label>
				</div>
				
				<input type='submit' value='Submit' class='btn' />
				</form>
			</div>
		</div>
	</div>
</body>
    
    
    
    
    
  </body>
</html>
<?php require_once("footer.php");?>