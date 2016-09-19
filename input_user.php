<?php

require_once("config.php");

//$thisUserID = $_GET['DOCTOR_LICENSE_NO'];
//echo $thisUserID;

//$foundUser = fetchThisUser($thisUserID);
//echo "<pre>";
 // print_r($foundUser);
//echo "</pre>";
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>
    BookAppointment
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
 <style>
 
 .button { position: absolute;
    top: 20%; left: 40%;
  border: 2px solid transparent;
  background: #ffe63b;
  color: #black;
  font-size: 16px;
  line-height: 25px;
  padding: 10px 0;
  text-decoration: none;
  text-shadow: none;
  border-radius: 3px;
  box-shadow: none;
  transition: 0.25s;
  display: block;
  width: 250px;
  margin: 0 auto;
}
</style> 
</head>

<body>

<?php require_once("header2.php");?>
<form name="access_form" method="post" action="access_form.php">
<div class="profile-header-panel sg-white-bg js-header-panel">
	  <div class="profile-header-row sg-row sg-white-bg">
      <div class="sg-columns sg-small-6 sg-small-offset-1">
			<div class="photos">	
				<div class="profile-photo-frame show-circle-photo">	
					<img class="profile-photo" src="7.jpg" width="140" style="max-height: 300px">
				</div>		
			</div>            
			</div>      
			<div class="sg-row">
				<div class="sg-columns sg-small-6 sg-small-offset-1">
					<p class="sg-title sg-cool-grey">License No</p>
				</div>
				<div class="sg-columns sg-small-8 sg-end">
					<div class="js-link-column sg-side-short-list " data-test="">
						<ul class="section-set">                            
                            <li class="sg-para3 sg-navy "> 
								 <input type="text" name="DOCTOR_LICENSE_NO" > 
							</li>							
						</ul>
					</div>
				</div><br>
   <div class="sg-columns sg-small-6 sg-small-offset-1"><br>
					<p class="sg-title sg-cool-grey">Appointment Date</p>
				</div><br>
				<div class="sg-columns sg-small-8 sg-end">
					<div class="js-link-column sg-side-short-list " data-test="">
						<ul class="section-set">                            
                            <li class="sg-para3 sg-navy ">   
								 <input type="text" name="APPOINTMENT_DATE">		
                            </li>
						</ul>
					</div>
				</div>
	
	
	<button class="button" href="access_form.php" type="submit" name="BookAppointment" action="access_form.php" style="display: block; margin: 0 auto;"> Book Appointment </button>
     <?php
	 //$DOCTOR_LICENSE_NO = $_POST['DOCTOR_LICENSE_NO']; 
     //$APPOINTMENT_DATE = $_POST['APPOINTMENT_DATE'];
	 //echo $DOCTOR_LICENSE_NO;
	 //echo $APPOINTMENT_DATE;
	 ?>
</table>

  
</form>


</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</html>

<?php require_once("footer.php");?>