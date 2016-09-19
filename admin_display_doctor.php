
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>
    Display Doctors
  </title>
  <!-- Style -- Can also be included as a file usually style.css -->
  <style type="text/css">
	table.table-style-three {
      font-family: verdana, arial, sans-serif;
      font-size: 11px;
      color: #333333;
      border-width: 1px;
      border-color: #3A3A3A;
      border-collapse: collapse;
    }
    table.table-style-three th {
      border-width: 1px;
      padding: 8px;
      border-style: solid;
      border-color: #FFA6A6;
      background-color: #000000;
      color: #ffffff;
    }
    table.table-style-three a {
      color: blue;
      text-decoration: none;
    }

    table.table-style-three tr:hover td {
      cursor: pointer;
    }
    table.table-style-three tr:nth-child(even) td{
      background-color: #ffe63b;
    }
    table.table-style-three td {
      border-width: 1px;
      padding: 8px;
      border-style: solid;
      border-color: #FFA6A6;
      background-color: #ffffff;
    }
</style>

</head>
<body>
<?php require_once("header2.php");?>

  <?php require_once("config.php");
if(isset($_POST['submit1'])) 
	{ 
  $allrecords = fetchAllDoctors();
	}
  ?>

    
  <!-- Table goes in the document BODY -->
  <table class="table-style-three" align = "center">
      <thead>
        <!-- display user details header  -->
        <th>Doctor License No</th>
        <th>Doctor's First Name</th>
        <th>Doctor's Last Name</th>
        <th>Doctor's Email ID</th>
        <th>Doctor's Phone</th>
        <th>Doctor's Speciality</th>
        <th>Doctor's Education</th>
        <th>Supported Insurance</th>
        <th>Language Spoken</th>
		<th>Professional MembershipID</th>
		<th>Professional Membership</th>
      </thead>
      <tbody>
      <?php
      foreach($allrecords as $displayRecords) { ?>
      <tr>
        <td><<?php print $displayRecords['DOCTOR_LICENSE_NO']; ?>"><?php print $displayRecords['DOCTOR_LICENSE_NO']; ?></a></td>
        <td><?php print $displayRecords['DOCTOR_FNAME']; ?></td>
        <td><?php print $displayRecords['DOCTOR_LNAME']; ?></td>
        <td><?php print $displayRecords['DOCTOR_EMAIL_ID']; ?></td>
        <td><?php print $displayRecords['DOCTOR_PHONE']; ?></td>
        <td><?php print $displayRecords['DOCTOR_SPECIALITY']; ?></td>
        <td><?php print $displayRecords['DOCTOR_EDUCATION']; ?></td>
        <td><?php print $displayRecords['SUPPORTED_INSURANCE']; ?></td>
        <td><?php print $displayRecords['Doctor_Language_Spoken']; ?></td>
		<td><?php print $displayRecords['Doctor_Prof_Membership_ID']; ?></td>
		<td><?php print $displayRecords['Doctor_Prof_Membership']; ?></td>
		
      </tr>
      <?php } ?>
      </tbody>
  </table>

</body>
</html>
<?php require_once("footer.php");?>