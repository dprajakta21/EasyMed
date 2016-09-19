<?php 
require_once("header2.php");
require_once("config.php");
require_once("class.user.php");
if(isset($_POST['submit'])) { 
  //Forms posted
$errors = array();

$DOCTOR_LICENSE_NO = $_POST['DOCTOR_LICENSE_NO'];
$APPOINTMENT_DATE = $_POST['APPOINTMENT_DATE']; 
$APPOINTMENT_TIME = $_POST['APPOINTMENT_TIME']; 
$PATIENT_ID = $_SESSION['ThisUser']->Patient_ID;
$PATIENT_FNAME = $_SESSION['ThisUser']->Patient_Fname;
$PATIENT_LNAME = $_SESSION['ThisUser']->Patient_Lname;
	
}

  //echo $DOCTOR_LICENSE_NO;
  

$updatedAppointment = updateThisAppointment($PATIENT_ID, $DOCTOR_LICENSE_NO,$APPOINTMENT_DATE,$APPOINTMENT_TIME);
if ($updatedAppointment){
	Echo "<html>
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br>
	<table align='center' border= '8'><tr>
	<tr><td bgcolor='#ffe63b'><FONT COLOR=Black SIZE=7>Appointment scheduled by $PATIENT_FNAME $PATIENT_LNAME</td></tr><br><br>
	<td><FONT COLOR=Black SIZE=4>Appointment Date:  $APPOINTMENT_DATE </td></tr>
	<tr><td><FONT COLOR=Black SIZE=4>Appointment Time: $APPOINTMENT_TIME</td></tr>
	<tr><td bgcolor='#ffe63b' ><FONT COLOR=Black SIZE=5>Thank you for using EasyMed!</td></tr></table>
	
		
	
	
	</html>";
}
	else{
		echo "Something went wrong";
	}
require_once("header2.php");
?>