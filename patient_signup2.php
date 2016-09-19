
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Patient Register</title>    
        <link rel="stylesheet" href="css/style.css">    
  </head>

  <body>
  <?php require_once("header.php");?>

    <body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Register</h1>
			</div>

			<div class="login">
				<div class="control-group">
				<form name='register' action="Registered.php" method='post'>
				<input type="text" class="login-field" value="" placeholder="user ID" name="userID">
				<label class="login-field-icon fui-user" for="userID"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="First Name" name="firstname">
				<label class="login-field-icon fui-user" for="firstname"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="Last Name" name="lastname">
				<label class="login-field-icon fui-user" for="lastname"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="password" name="password">
				<label class="login-field-icon fui-lock" for="password"></label>
				</div>
				
				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="confirm password" name="passwordc">
				<label class="login-field-icon fui-lock" for="passwordc"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="Email ID" name="email">
				<label class="login-field-icon fui-user" for="email"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="Phone Number" name="phonenumber">
				<label class="login-field-icon fui-user" for="phonenumber"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="Address Line 1" name="addr1">
				<label class="login-field-icon fui-user" for="addr1"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="Address Line 2" name="addr2">
				<label class="login-field-icon fui-user" for="addr2"></label>
				</div>
				
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="Zipcode" name="zipcode">
				<label class="login-field-icon fui-user" for="zipcode"></label>
				</div>

				<input type='submit' value='Register' class='btn' />
				<a href="index.php" class="login-link" >Already registered? Click Here.</a>
				</form>
			</div>
		</div>
	</div>
</body>
    
    
    
    
    
  </body>
</html>
<?php require_once("footer.php");?>