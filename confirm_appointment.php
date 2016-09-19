<?php require_once("header2.php");
 require_once("config.php"); ?>
 
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>
  View Appointment
  </title>
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
   <style type="text/css">
   
   table
   { border:1px solid #5c743d;
       width: 400px;
       margin:auto;
       border-collapse: collapse
	   font-family: Arial, sans-serif;font-size: 25px;}
	   
	   tbody td{padding: 15px;} 
	   
 

tbody td{padding:30px;font-family: Arial sans-serif;text-align: left;font-size: 16px;}

.altrow { background-color:#C0C0C0;
}
   
   .caption{font-size: 25px;padding:5px;
           font-family: Arial, sans-serif;
		   font-weight: bold;
		   color: #000000;text-align: center;  }
   
   .wrapper {
    text-align: center;font-family: Arial, sans-serif;
}

.button {
    position: absolute;
    top: 75%; left: 43%;
	background-color: #000000	; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
   
</style>
   

</head>
   
<body class="tm-gray-bg">
			 
<?php 
	if(isset($_POST['submit'])) { 
  //Forms posted
  $errors = array();
  $DOCTOR_LICENSE_NO = $_POST['DOCTOR_LICENSE_NO']; 
  $DOCTOR_FNAME = $_POST['DOCTOR_FNAME'];
  $DOCTOR_LNAME = $_POST['DOCTOR_LNAME']; 
  $DOCTOR_EMAIL_ID = $_POST['DOCTOR_EMAIL_ID'];
  $DOCTOR_PHONE = $_POST['DOCTOR_PHONE'];
  $APPOINTMENT_DATE = $_POST['APPOINTMENT_DATE']; 
  $APPOINTMENT_TIME = $_POST['APPOINTMENT_TIME'];   
}

  echo $DOCTOR_LNAME;
  echo $DOCTOR_LICENSE_NO;
   
  //print_r($errors);
  
  if(count($errors) == 0) 
  { $doctordetails = fetchQualifiedDoctors($selected_speciality, $selected_borough, $selected_insurance);   }

?>
	
<form name="processUpdateAppointment" method="POST" action="processUpdateAppointment.php"> 
   <table>
   
   <br>
   
   <div class="caption">Appointment Details</div>
   <tbody>
	<tr class="altrow">   
		<td> <strong>Doctor Name: </strong></td>
		<td><?php echo "$DOCTOR_FNAME"; ?> <?php echo "$DOCTOR_LNAME"; ?> </td>
	</tr>
    <tr>
	   <td><strong>Email: </strong></td>
	   <td><?php echo "$DOCTOR_EMAIL_ID"; ?></td>
    </tr>
    <tr class="altrow">
	   <td><strong>Phone:</strong> </td>
	   <td><?php echo "$DOCTOR_PHONE"; ?></td>
    </tr>
    <tr>
	   <td><strong>Appointment Date:</strong> </td>
	   <td><?php echo "$APPOINTMENT_DATE"; ?></td>
    </tr>
    <tr class= "altrow">
	   <td><strong>Appointment Time:</strong> </td>
	   <td><?php echo "$APPOINTMENT_TIME"; ?></td>
    </tr>
   </tbody>
   </table>
   
   
   <div class="wrapper">
    <button class="button" type="submit" name="Book Appointment"> Book Appointment </button>
	</div>
	</form>
	</body>
	
	</html>
	<br><br><br><br><br><br>

<?php require_once("footer.php");?>