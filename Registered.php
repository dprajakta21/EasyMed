  <?php require_once("header.php");?>
<?php

require_once("config.php");


//Prevent the user visiting the logged in page if he/she is already logged in
//if(isUserLoggedIn()) { header("Location: myaccount.php"); die(); }

//print_r($_POST);

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$email = trim($_POST["email"]);
	$userID = trim($_POST["userID"]);
  	$firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
  	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);
	$phonenumber = trim($_POST["phonenumber"]);
	$addr1 = trim($_POST["addr1"]);
	$addr2 = trim($_POST["addr2"]);
	$zipcode = trim($_POST["zipcode"]);


	if($userID == "")
	{
		$errors[] = "enter valid username";
	}

	if($firstname == "")
	{
		$errors[] = "enter valid first name";
	}

  if($lastname == "")
  {
	$errors[] = "enter valid last name";
  }


	if($password =="" && $confirm_pass =="")
	{
		$errors[] = "enter password";
	}
	else if($password != $confirm_pass)
	{
		$errors[] = "password do not match";
	}
print_r(array_values($errors));
	//End data validation
	if(count($errors) == 0)
	{	

$check = CheckAvailibility($userID);
$row = mysqli_fetch_assoc($check);

$check1 = checkemail($email);
$row1 = mysqli_fetch_assoc($check1);

if 	($row1['cnt'] >= 1) {
	$errors[] = "error email id";
	echo  "<p align=center> <br> Email ID Already registered.</p>" ;
}
else{

if ($row['cnt'] == 1) {
	$errors[] = "error userid";
	echo  "<p align=center> <br> User ID Unavailable. Please try another one </p>" ;
} 
else 
{
	$user = createNewUser($userID, $firstname, $lastname, $email, $password, $phonenumber, $addr1, $addr2, $zipcode);
	  //print_r($user);

	  
	  if($user <> 1){
		$errors[] = "registration error";
	  }
	}
	}
	if(count($errors) == 0) {
		$successes[] = "registration successful";
		?>
			echo "<script type='text/javascript'>alert("Registration successful Please log in to access yor accont");
			location.href ="index.php";
			</script>";
			
			<?php
	}
	}
}
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<body>
<br><br><br>
<p align="center"> <a href="patient_signup2.php">Go back to sign up </a> <br>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</html>
<?php require_once("footer.php");?>