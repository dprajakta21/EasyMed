<?php

require_once("config.php");

//Prevent the user visiting the logged in page if he/she is already logged in
	//if(isUserLoggedIn()) { header("Location: myaccount.php"); die(); }

//Forms posted
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Patient Login</title>    
    
    
        <link rel="stylesheet" href="css/style.css">
    
    </head>

  <body>
  <?php require_once("header.php");?>

    <body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>

			<div class="login">
				<div class="control-group">
				<form name='login' action="select_doctor.php" method='post'>
				<input type="text" class="login-field" value="" placeholder="user ID" name="userID">
				<label class="login-field-icon fui-user" for="userID"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="password" name="password">
				<label class="login-field-icon fui-lock" for="password"></label>
				</div>

				<input type='submit' value='Login' class='btn' />
				<b><a href="patient_signup2.php" class="login-link" value="New patients join Now!!">New patients join Now!!</a>
				
				</form>
			</div>
		</div>
	</div>
</body>
    
    <br><br><br><br><br>
    <hr>
    
    
  </body>
</html>
<?php require_once("footer.php");?>