<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>
    Book Appointment
  </title>
  <!-- Style -- Can also be included as a file usually style.css -->
  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <style type="text/css">.gm-style .gm-style-cc span,.gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}</style>
  <style type="text/css">@media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}@media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}</style>
  <style type="text/css">.gm-style{font-family:Roboto,Arial,sans-serif;font-size:11px;font-weight:400;text-decoration:none}.gm-style img{max-width:none}</style>
  <link rel="shortcut icon" type="image/x-icon" href="/images/rebrand/favicon/favicon.ico" sizes="32x32">
 
    
  <link rel="stylesheet" type="text/css" href="//d38exzoq67xwtx.cloudfront.net/App_Combined/sg.patient-beta.framework__9bc8a7ab3bd39db6416a73146bffadb7__.min.css"> 
  <link rel="stylesheet" type="text/css" href="//d2ruyntinfnv6.cloudfront.net/App_Combined/sg.patient-beta__0bc99ca3790721397a4f82ab238e2a9a__.min.css">
  <link rel="stylesheet" type="text/css" href="//d3i9xyw4tddw77.cloudfront.net/App_Combined/rb.shared.desktop__dbe3d914858486795b1470047a3e7588__.min.css">
  <link rel="stylesheet" type="text/css" href="//d38exzoq67xwtx.cloudfront.net/App_Combined/rb.profile.desktop__3faee2539b0c7090e4d4dc76cb178cca__.min.css">  
  
</head>

<body>

<?php require_once("header2.php");
require_once("config.php"); 
  
  if(isset($_POST['BookAppointment'])) 
	{ 
    $errors = array();
	 $DOCTOR_LICENSE_NO = $_POST['DOCTOR_LICENSE_NO']; 
    $APPOINTMENT_DATE = $_POST['APPOINTMENT_DATE'];
  
  if($DOCTOR_LICENSE_NO == "") 
  {		$errors[] = "Please enter the finalised doctor"; }

  if($APPOINTMENT_DATE == "") 
  {		$errors[] = "Please select the appointment date"; }
	}
	
	while (list($key, $value) = each($errors)) {
    echo "  Error number: $Count1<br />\n   Error details: $value<br />\n\n";
	$Count1++;
	echo "<br />\n ";
  }
  
   	if(count($errors) == 0) {
 	$appointmentdetails = fetchAppointments($DOCTOR_LICENSE_NO,$APPOINTMENT_DATE);		
	}	
 ?>
				
<?php
if(is_array($appointmentdetails) || isset($displayAppointment)){ 
	 foreach($appointmentdetails as $displayAppointment) {?>	
	<form name="processUpdateAppointment" action="processUpdateAppointment.php" method="POST" >
			<div class="profile-header-panel sg-white-bg js-header-panel">
			<div class="profile-header-row sg-row sg-white-bg">			
			<div class="sg-columns sg-small-6 sg-small-offset-1">			
				<div class="photos">	
				<div class="profile-photo-frame show-circle-photo">	
					<img class="profile-photo" src="7.jpg" width="140" style="max-height: 500px">
				</div>		
			</div>            
			</div>      
			<div class="sg-row">				
				<div class="sg-columns sg-small-6 sg-small-offset-1">
					<p class="sg-title sg-cool-grey">DOCTOR_LICENSE_NO</p>
				</div>
				<div class="sg-columns sg-small-8 sg-end">
					<div class="js-link-column sg-side-short-list " data-test="">
						<ul class="section-set">
                            <li class="sg-para3 sg-navy ">
                                <input type="text" name="DOCTOR_LICENSE_NO"  value= "<?php print $displayAppointment['DOCTOR_LICENSE_NO']; ?>">
                            </li>                           
						</ul>
					</div>
				</div>
				
				
        		<div class="sg-columns sg-small-6 sg-small-offset-1">
					<p class="sg-title sg-cool-grey">DOCTOR_NAME</p>
				</div>
				<div class="sg-columns sg-small-8 sg-end">
					<div class="js-link-column sg-side-short-list " data-test="">
						<ul class="section-set">                            
                            <li class="sg-para3 sg-navy ">   
								<?php print $displayAppointment['DOCTOR_FNAME']; ?>
								<?php print $displayAppointment['DOCTOR_LNAME']; ?>					
                            </li>
						</ul>
					</div>
				</div>
				
				<div class="sg-columns sg-small-6 sg-small-offset-1">
					<p class="sg-title sg-cool-grey">EMAIL ID</p>
				</div>
				<div class="sg-columns sg-small-8 sg-end">
					<div class="js-link-column sg-side-short-list " data-test="">
						<ul class="section-set">
                            <li class="sg-para3 sg-navy ">
                                <?php print $displayAppointment['DOCTOR_EMAIL_ID']; ?>
                            </li>                           
						</ul>
					</div>
				</div>
								
				<div class="sg-columns sg-small-6 sg-small-offset-1">
					<p class="sg-title sg-cool-grey">APPOINTMENT_DATE</p>
				</div>
				<div class="sg-columns sg-small-8 sg-end">
					<div class="js-link-column sg-side-short-list " data-test="">
						<ul class="section-set">                            
                            <li class="sg-para3 sg-navy ">   
								<input type="text" name="APPOINTMENT_DATE"  value= "<?php print $displayAppointment['APPOINTMENT_DATE']; ?>">
                           	</li>
						</ul>
					</div>
				</div>
				
				<div class="sg-columns sg-small-6 sg-small-offset-1">
					<p class="sg-title sg-cool-grey">APPOINTMENT_TIME</p>
				</div>
				<div class="sg-columns sg-small-8 sg-end">
					<div class="js-link-column sg-side-short-list " data-test="">
						<ul class="section-set">                            
                            <li class="sg-para3 sg-navy ">  
								<input type="text" name="APPOINTMENT_TIME"  value= "<?php print $displayAppointment['APPOINTMENT_TIME']; ?>">
                            </li>
						</ul>
					</div>
				</div>
				
				<div class="sg-columns sg-small-6 sg-small-offset-1">
					<p class="sg-title sg-cool-grey">APPOINTMENT_STATUS</p>
				</div>
				<div class="sg-columns sg-small-8 sg-end">
					<div class="js-link-column sg-side-short-list " data-test="">
						<ul class="section-set">                            
                            <li class="sg-para3 sg-navy ">  
								<?php print $displayAppointment['APPOINTMENT_STATUS']; ?>
                            </li>
						</ul>
					</div>
				</div>	
				
		</div>
			
		<?php   if ($displayAppointment['APPOINTMENT_STATUS'] == "Available") { ?> 
				<div align="right" width="50">
					<button href="processUpdateAppointment.php"  class="button" type="submit" name="submit">Book Appointment </button>
				</div> <?php } 
				else 
				{ } ?>		
	  		
		</div>
	</div>  
	</form>

	<?php } } ?> 
</body>
</html>
<?php require_once("footer.php");?>

