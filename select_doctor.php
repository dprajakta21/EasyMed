<?php require_once("header2.php");?>

<?php require_once("config.php");
if(!empty($_POST))
	{
		$errors = array();
		$userID = trim($_POST["userID"]);
		$password = trim($_POST["password"]);
 
		//Perform some validation

		if($userID == "")
		{
			$errors[] = "enter username";
			?>
			echo "<script type='text/javascript'>alert("enter username");
			location.href ="index.php";
			</script>";
			
			<?php
		}
		if($password == "")
		{
			$errors[] = "enter password";
			?>
			echo "<script type='text/javascript'>alert("enter pasword");
			location.href ="index.php";
			</script>";
			<?php
			//echo $errors;
		}
//print_r(array_values($errors));

?>

<?php
		if(count($errors) == 0)
		{
			//retrieve the records of the user who is trying to login
			$userexist = CheckAvailibility($userID);
			$row = mysqli_fetch_assoc($userexist);

			//See if the user exists
			if($row['cnt'] == 0)
			{
				?>
			echo "<script type='text/javascript'>alert("Invalid User ID");
			location.href ="index.php";
			</script>";
			<?php
			}
			else
			{
				$userdetails = fetchUserDetails($userID);
				//Hash the password and use the salt from the database to compare the password.
				$entered_pass = generateHash($password,$userdetails["Password"]);
				//echo $entered_pass, "<br>";
				//echo $userdetails["Password"]; 

				if($entered_pass != $userdetails["Password"])
				{

						?>
			echo "<script type='text/javascript'>alert("Invalid Password");
			location.href ="index.php";
			</script>";
			<?php
				}
				else
				{
					//Passwords match! we're good to go'
					//Transfer some db data to the session object
					$loggedInUser->Patient_Email_ID = $userdetails["Patient_Email_ID"];
					$loggedInUser->Patient_ID = $userdetails["Patient_ID"];
					$loggedInUser->hash_pw = $userdetails["Password"];
					$loggedInUser->Patient_Fname = $userdetails["Patient_Fname"];
					$loggedInUser->Patient_Lname = $userdetails["Patient_Lname"];
					$loggedInUser->Patient_Phone = $userdetails["Patient_Phone"];
					$loggedInUser->Patient_Address_Line1 = $userdetails["Patient_Address_Line1"];
					$loggedInUser->Patient_Address_Line2 = $userdetails["Patient_Address_Line2"];
					$loggedInUser->Location_Zip_code = $userdetails["Location_Zip_code"];

					//pass the values of $loggedInUser into the session -
					// you can directly pass the values into the array as well.

					$_SESSION["ThisUser"] = $loggedInUser;

					//now that a session for this user is created
					//Redirect to this users account page
					//header("Location: myaccount.php");
					//die(); 
					//header("Location: processUpdateAppointment.php");
					//die();
					
					echo  "<p align=center> <br> You have Logged in succesfully</p>" ;					
					echo "<br>";
					echo "<p align=center> Welcome  ". $userdetails["Patient_Fname"]." ".$userdetails["Patient_Lname"]."</p>";
					
		
				}
			} 

		}
	}
?>
<!DOCTYPE html>
		<html lang="en">
		<head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <title>EasyMed</title>
		<!--
		Holiday Template
		http://www.templatemo.com/tm-475-holiday
		-->
		  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
		  <link href="css/font-awesome.min.css" rel="stylesheet">
		  <link href="css/bootstrap.min.css" rel="stylesheet">
		  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
		  <link href="css/flexslider.css" rel="stylesheet">
		  <link href="css/templatemo-style.css" rel="stylesheet">

		  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->

		  </head>
		  <body class="tm-gray-bg">
			
			
			<!-- Banner -->
			<section class="tm-banner">
				<!-- Flexslider -->
				<div class="flexslider flexslider-banner">
				  <ul class="slides">
					<li>
						<div class="tm-banner-inner">
							<h1 class="tm-banner-title">Find <span class="tm-yellow-text">The Best</span> Doctor</h1>
							<p class="tm-banner-subtitle">In your Locality</p>
							
						</div>
						<img src="img/banner-1.jpg" alt="Image" />	
					</li>
					<li>
						<div class="tm-banner-inner">
							<h1 class="tm-banner-title">Full-featured and<span class="tm-yellow-text">Flexible</span>Appointment Booking</h1>
							
							
						</div>
					  <img src="img/banner-2.jpg" alt="Image" />
					</li>
					<li>
						<div class="tm-banner-inner">
							<h1 class="tm-banner-title">Manage<span class="tm-yellow-text">Appointments</span>Online</h1>
							<p class="tm-banner-subtitle">As per your convenience</p>
								
						</div>
					  <img src="img/banner-3.jpg" alt="Image" />
					</li>
				  </ul>
				</div>	
			</section>

			<!-- gray bg -->	
			<section class="container tm-home-section-1" id="more">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6">
						<!-- Nav tabs -->
						<div class="tm-home-box-1">
							<ul class="nav nav-tabs tm-white-bg" role="tablist" id="hotelCarTabs">
								<li role="presentation" class="active">
									<a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">Find Doctor</a>
								</li>
								
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active tm-white-bg" id="hotel">
									<div class="tm-search-box effect2">
										<form name="find_doctor" action="find_doctor.php" method="POST">
											<div class="tm-form-inner">
												<div class="form-group">
													 <select name = selected_speciality type='text' class="form-control">
														<option value="">-- Select Doctor Speciality -- </option>
														<option value="Primary Physician">Primary Care</option>
														<option value="Pediatrician">Pediatrician</option>
														<option value="Dentist">Dentist</option>
														<option value="Dermatologist">Dermatologist</option>
													</select> 
												</div>
												
												<div class="form-group margin-bottom-0">
													<select name = selected_borough type='text' class="form-control">
														<option value="">-- Select Borough -- </option>
														<option value="Bronx">Bronx</option>
														<option value="Brooklyn">Brooklyn</option>
														<option value="Manhattan">Manhattan</option>
														<option value="Queens">Queens</option>
														<option value="Staten island">Staten Island</option>
													</select> 
												</div>
												<div class="form-group margin-bottom-0">
													<select name = selected_insurance  type='text' class="form-control">
														<option value="">-- Select Insurance -- </option>
														<option value="UHC">UHC</option>
														<option value="WellPoint">Wellpoint</option>
														<option value="GHI">GHI</option>		
													</select> 
												</div>				
											<div class="form-group tm-yellow-gradient-bg text-center">
												<button href="find_doctor.php" type="submit" name="submit" class="tm-yellow-btn">Find Doctor </button>
											</div> 
											
										</div>	
										</form>
										<form name="admin_display_doctor" action="admin_display_doctor.php" method="POST">
										<div class="form-group tm-yellow-gradient-bg text-center">
												<button href="admin_display_doctor.php" type="submit" name="submit1" class="tm-yellow-btn">Display All Doctors </button>
											</div> 
									</div>
								</div>
								
						</div>	
</div>		
</div>						

</div>						
</section>	

</body>
</html>
<?php require_once("footer.php");?>