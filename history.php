<?php

require_once("config.php");

$history = $_SESSION['ThisUser']->Patient_ID;
//echo $history;

$foundHistory = showhistory($history);
//echo "<pre>";
 // print_r($foundUser);
//echo "</pre>";
?>

<?php //session_start();?>


   <style type="text/css">
  
 table
   { border:1px solid #5c743d;
       width: 1200px;
       margin:auto;
       border-collapse: collapse
	   font-family: Arial, sans-serif;font-size: 20px; background-color: White}
	
	thead th{padding: 10px;font-family: Arial, sans-serif;border:1px solid #000000; text-align:center; background-color:#000000;
      color: White;}
	 .caption{font-size: 25px;padding:15px; 
           font-family: Arial, sans-serif;
		   font-weight: bold;
		   color: #000000;text-align: center; padding-left: 25px;  }
   </style>
   

  
  <body> 
 
 <?php require_once("header2.php");?>
  <table>
   
    <div class="caption">Appointment History</div>
   <thead>
        <!-- display Appointment history details header  -->
        <th><strong>Doctor First Name</strong></th>
        <th><strong>Doctor Last Name</strong></th>
        <th><strong>Doctor Speciality </strong></th>
        <th><strong>Appointment Date</strong></th>
		<th><strong>Appointment Time</strong></th>
      
        
      </thead>
   
   <br>
   
   
 <br>
 
<?php
	  if(is_array($foundHistory) || isset($displayHistory)){
      foreach($foundHistory as $displayHistory) { ?>
	 <tr> 

   <td><?php print $displayHistory['DOCTOR_FNAME']; ?></td>
   
   <td><?php print $displayHistory['DOCTOR_LNAME']; ?></td>
   <td><?php print $displayHistory['DOCTOR_SPECIALITY']; ?></td>
   
   
  
   <td><?php print $displayHistory['APPOINTMENT_DATE']; ?></td>
   
   <td><?php print $displayHistory['APPOINTMENT_TIME']; ?></td>
   </tr>
   <?php } } ?>
   
   </table>
   
   
	</form>
	</body>
	
	</html>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	

<?php require_once("footer.php");?>