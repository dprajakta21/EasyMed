<?php

//----------------------------------------------------------Divya----------------------------------------------------

// function 1
function generateHash($plainText, $salt = NULL) {
  if ($salt === NULL) {
    $salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
  }
  else {
    $salt = substr($salt, 0, 25);
  }
  return $salt . sha1($salt . $plainText);
}

// function 2
function CheckAvailibility($userID)
 {
	 $con=mysqli_connect("localhost","root","","easymed");
	 $check = mysqli_query($con,"SELECT count(Patient_ID) cnt from patient WHERE Patient_ID = '$userID'");
	 return $check;
	 
 }

// function 3 
 function checkemail($email)
 {
	 $con=mysqli_connect("localhost","root","","easymed");
	 $check1 = mysqli_query($con,"SELECT count(Patient_Email_ID) cnt from patient WHERE Patient_Email_ID = '$email' limit 1");
	 return $check1;
	 
 }

// function 4
function createNewUser($userID, $firstname, $lastname, $email, $password, $phonenumber, $addr1, $addr2, $zipcode)
{
  global $mysqli, $db_table_prefix;
  

  $newpassword = generateHash($password);
  //$locationID = generateLocationID($zipcode);

  echo $newpassword;


  $stmt = $mysqli->prepare(
      "INSERT INTO " . $db_table_prefix . "patient (
		Patient_ID,
		Patient_Fname,
		Patient_Lname,
		Patient_Email_ID,
		Password,
		Patient_Phone,
		Patient_Address_Line1,
		Patient_Address_Line2,
		Location_Zip_code
		)
		VALUES (
		?,
		?,
		?,
		?,
		?,
		?,
        ?,
        ?,
		?
		)"
  );
  $stmt->bind_param("sssssssss", $userID, $firstname, $lastname, $email, $newpassword, $phonenumber, $addr1, $addr2, $zipcode);
  //print_r($stmt);
  $result = $stmt->execute();
  //print_r($result);
  $stmt->close();
  return $result; 

}

// function 5
//Retrieve complete user information by username
function fetchUserDetails($userID)
{

  global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		Patient_ID,
		Patient_Fname,
		Patient_Lname,
		Patient_Email_ID,
		Password,
		Patient_Phone,
		Patient_Address_Line1,
		Patient_Address_Line2,
		Location_Zip_code
		FROM ".$db_table_prefix."patient
		WHERE
		Patient_ID = ?
		LIMIT 1");
  $stmt->bind_param("s", $userID);

  $stmt->execute();
  $stmt->bind_result($UserID, $Firstname, $Lastname, $Email, $Password, $Phonenumber, $Addr1, $Addr2, $Zipcode);
  while ($stmt->fetch()){
    $row = array('Patient_ID' => $UserID,
        'Patient_Fname' => $Firstname,
        'Patient_Lname' => $Lastname,
        'Patient_Email_ID' => $Email,
        'Password' => $Password,
        'Patient_Phone' => $Phonenumber,
        'Patient_Address_Line1' => $Addr1,
		'Patient_Address_Line2' => $Addr2,
		'Location_Zip_code' => $Zipcode);
  }
  $stmt->close();
  return ($row);
}
//------------------------------------------------------Sushma & Shweta------------------------------------------

// function 1
function fetchQualifiedDoctors($selected_speciality, $selected_borough, $selected_insurance) {
  global $mysqli,$row;
  $args = array($selected_speciality, $selected_borough, $selected_insurance);
  //echo $selected_speciality;
  //echo $args[0];
  //echo $args[1];
  //echo $args[2];
  $stmt = $mysqli->prepare(
    "SELECT doctor.DOCTOR_LICENSE_NO, 
		doctor.DOCTOR_FNAME, 
		doctor.DOCTOR_LNAME, 
		doctor_EMAIL_ID, 
		doctor.DOCTOR_PHONE, 
		doctor.DOCTOR_EDUCATION, 
		location_mapping.LOCATION_ZIP_CODE, 
		location_mapping.CLINIC_ADDRESS_LINE1,
		location_mapping.CLINIC_ADDRESS_LINE2, 
		doctor.DOCTOR_SPECIALITY, 
		doctor.SUPPORTED_INSURANCE

	FROM location INNER JOIN (doctor INNER JOIN location_mapping ON doctor.DOCTOR_LICENSE_NO = location_mapping.DOCTOR_LICENSE_NO) 
		ON (location.LOCATION_ZIP_CODE = location_mapping.LOCATION_ZIP_CODE) AND (location.LOCATION_ID = location_mapping.LOCATION_ID)
    
	WHERE doctor.DOCTOR_SPECIALITY= ? 
	      AND location.LOCATION_BOROUGH= ? 
	      AND doctor.SUPPORTED_INSURANCE = ?");				
  $stmt->bind_param("sss",$args[0],$args[1],$args[2] );
  $stmt->execute();  
  $stmt->bind_result($DOCTOR_LICENSE_NO, $DOCTOR_FNAME, $DOCTOR_LNAME, $DOCTOR_EMAIL_ID, $DOCTOR_PHONE, $DOCTOR_EDUCATION, $LOCATION_ZIP_CODE, $CLINIC_ADDRESS_LINE1, $CLINIC_ADDRESS_LINE2, $DOCTOR_SPECIALITY, $SUPPORTED_INSURANCE);
  while ($stmt->fetch()){ 
    $row[] = array(
	  'DOCTOR_LICENSE_NO'    => $DOCTOR_LICENSE_NO,
      'DOCTOR_FNAME'         => $DOCTOR_FNAME,
      'DOCTOR_LNAME'         => $DOCTOR_LNAME,
      'DOCTOR_EMAIL_ID'      => $DOCTOR_EMAIL_ID,
      'DOCTOR_PHONE'         => $DOCTOR_PHONE,
      'DOCTOR_EDUCATION'     => $DOCTOR_EDUCATION,
	  'LOCATION_ZIP_CODE'    => $LOCATION_ZIP_CODE,
	  'CLINIC_ADDRESS_LINE1' => $CLINIC_ADDRESS_LINE1,
	  'CLINIC_ADDRESS_LINE2' => $CLINIC_ADDRESS_LINE2,
	  'DOCTOR_SPECIALITY'    => $DOCTOR_SPECIALITY,
      'SUPPORTED_INSURANCE'  => $SUPPORTED_INSURANCE 
	  );
   }
  $stmt->close();
  return ($row);
 }
 
// function 2 
 function fetchAppointments($DOCTOR_LICENSE_NO,$APPOINTMENT_DATE) {
  global $mysqli, $row;  
 
  //echo $DOCTOR_LICENSE_NO;
  //echo $APPOINTMENT_DATE;
    
  $stmt = $mysqli->prepare(
  "SELECT doctor.DOCTOR_LICENSE_NO, 
  doctor.DOCTOR_FNAME, 
  doctor.DOCTOR_LNAME, 
  doctor.DOCTOR_EMAIL_ID, 
  doctor.DOCTOR_PHONE, 
  appointment.APPOINTMENT_DATE, 
  appointment.APPOINTMENT_TIME, 
  appointment.APPOINTMENT_STATUS 
  
  FROM doctor INNER JOIN appointment ON doctor.DOCTOR_LICENSE_NO = appointment.DOCTOR_LICENSE_NO
		
  WHERE doctor.DOCTOR_LICENSE_NO = ? 
      AND appointment.APPOINTMENT_DATE = ?");
  $stmt->bind_param("ss",$DOCTOR_LICENSE_NO, $APPOINTMENT_DATE);
  $stmt->execute();  
  $stmt->bind_result($DOCTOR_LICENSE_NO,$DOCTOR_FNAME, $DOCTOR_LNAME, $DOCTOR_EMAIL_ID, $DOCTOR_PHONE, $APPOINTMENT_DATE , $APPOINTMENT_TIME, $APPOINTMENT_STATUS);
  while ($stmt->fetch()){ 
    $row[] = array(
	  'DOCTOR_LICENSE_NO'    => $DOCTOR_LICENSE_NO,
      'DOCTOR_FNAME'         => $DOCTOR_FNAME,
      'DOCTOR_LNAME'         => $DOCTOR_LNAME,
      'DOCTOR_EMAIL_ID'      => $DOCTOR_EMAIL_ID,
      'DOCTOR_PHONE'         => $DOCTOR_PHONE,
	  'APPOINTMENT_DATE'     => $APPOINTMENT_DATE , 
	  'APPOINTMENT_TIME' 	 =>	$APPOINTMENT_TIME, 
	  'APPOINTMENT_STATUS'	=>	$APPOINTMENT_STATUS
      
	  );
   }
  $stmt->close();
  return ($row);
  
 }
 
//--------------------------------------------------Prajakta------------------------------------------------

//function 1
 function updateThisAppointment($PATIENT_ID, $DOCTOR_LICENSE_NO,$APPOINTMENT_DATE,$APPOINTMENT_TIME)
{
    global $mysqli, $row;
    $stmt = $mysqli->prepare(
      "UPDATE appointment
		SET APPOINTMENT_STATUS = 'Unavailable' , PATIENT_ID= ?
		WHERE DOCTOR_LICENSE_NO =? 
		AND APPOINTMENT_DATE = ?
		AND APPOINTMENT_TIME = ?"
    );
    $stmt->bind_param("ssss",$PATIENT_ID, $DOCTOR_LICENSE_NO, $APPOINTMENT_DATE, $APPOINTMENT_TIME);
    $result = $stmt->execute();
    $stmt->close();
	return ($result);
}
//fuction for show history

 // function 3
 function fetchThisAppointmnent($APPOINTMENT_STATUS)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
      "
    SELECT
    DOCTOR_FNAME,
    DOCTOR_LNAME,
    DOCTOR_EMAIL_ID,
    APPOINTMENT_DATE,
    APPOINTMENT_TIME,
    CLINIC_ADDRESS_LINE1,
    CLINIC_ADDRESS_LINE2,
    LOCATION_ZIP_CODE
   

   FROM doctor
   INNER JOIN appointment on doctor.DOCTOR_LICENSE_NO = appointment.DOCTOR_LICENSE_NO
   INNER JOIN location_mapping on doctor.DOCTOR_LICENSE_NO = location_mapping.DOCTOR_LICENSE_NO
    
	WHERE doctor.DOCTOR_LICENSE_NO= ? 
	      AND doctor.DOCTOR_FNAME= ? 
	      AND doctor.DOCTOR_LNAME = ?
		  AND doctor.DOCTOR_EMAIL_ID= ?
		  AND doctor.DOCTOR_PHONE= ?
		  AND appointment.APPOINTMENT_DATE= ?
		  AND appointment.APPOINTMENT_TIME= ?
		  AND appointment.APPOINTMENT_STATUS= ?"	
    );
    $stmt->bind_param("s",$APPOINTMENT_STATUS);
    $stmt->execute();
    $stmt->bind_result($DOCTOR_FNAME, $DOCTOR_LNAME, $DOCTOR_EMAIL_ID, $DOCTOR_PHONE,$APPOINTMENT_DATE, $APPOINTMENT_TIME, $CLINIC_ADDRESS_LINE1, $CLINIC_ADDRESS_LINE2, $LOCATION_ZIP_CODE);
    $stmt->execute();
  while ($stmt->fetch()) {
    $row[] = array(
      'DOCTOR_LICENSE_NO'   => $DOCTOR_LICENSE_NO,
      'DOCTOR_FNAME'        => $DOCTOR_FNAME,
      'DOCTOR_LNAME'        => $DOCTOR_LNAME,
      'DOCTOR_EMAIL_ID'     => $DOCTOR_EMAIL_ID,
      'DOCTOR_PHONE'        => $DOCTOR_PHONE,
      'APPOINTMENT_DATE'    => $APPOINTMENT_DATE,
      'APPOINTMENT_TIME'    => $APPOINTMENT_TIME,
      'CLINIC_ADDRESS_LINE1'=> $CLINIC_ADDRESS_LINE1,
      'CLINIC_ADDRESS_LINE2'=> $CLINIC_ADDRESS_LINE2,
      'LOCATION_ZIP_CODE'  => $LOCATION_ZIP_CODE

    );
  }
  $stmt->close();
  return ($row);
}



function fetchThisUser($DOCTOR_LICENSE_NO)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
      "
    SELECT
    
    DOCTOR_LICENSE_NO
    

    FROM doctor
    WHERE
    DOCTOR_LICENSE_NO = ?
    LIMIT 1"
    );
    $stmt->bind_param("s", $DOCTOR_LICENSE_NO);
    $stmt->execute();
    $stmt->bind_result($DOCTOR_LICENSE_NO);
    $stmt->execute();
  while ($stmt->fetch()) {
    $row[] = array(
      
      'DOCTOR_LICENSE_NO'  => $DOCTOR_LICENSE_NO
      
    );
  }
  $stmt->close();
  return ($row);
}
//function 6
function destroySession($name) {
 if(isset($_SESSION[$name]))
 {
   $_SESSION[$name] = NULL;
   unset($_SESSION[$name]);
 }
}
 
 // function 2 
 function showhistory($PATIENT_ID)
 {
global $mysqli, $db_table_prefix, $row;
$stmt = $mysqli->prepare(
  "SELECT 
  doctor.DOCTOR_FNAME,
  doctor.DOCTOR_LNAME,
  doctor.DOCTOR_SPECIALITY,
  appointment.APPOINTMENT_DATE, 
  appointment.APPOINTMENT_TIME

  
  FROM doctor INNER JOIN appointment ON doctor.DOCTOR_LICENSE_NO= appointment.DOCTOR_LICENSE_NO
		     
  WHERE PATIENT_ID = ?"
     );
	 
  $stmt->bind_param("s", $PATIENT_ID);
  $stmt->execute();  
  $stmt->bind_result($DOCTOR_FNAME,$DOCTOR_LNAME, $DOCTOR_SPECIALITY, $APPOINTMENT_DATE, $APPOINTMENT_TIME);
  while ($stmt->fetch()){ 
    $row[] = array(
	  'DOCTOR_FNAME'    => $DOCTOR_FNAME,
      'DOCTOR_LNAME'         => $DOCTOR_LNAME,
      'DOCTOR_SPECIALITY'         => $DOCTOR_SPECIALITY,
	  'APPOINTMENT_DATE'         => $APPOINTMENT_DATE,
	  'APPOINTMENT_TIME'         => $APPOINTMENT_TIME  

	  );
   }
  $stmt->close();
  return ($row);
 }
 
//function 3
  function fetchAllDoctors() {
  global $mysqli, $db_table_prefix;
  $stmt = $mysqli->prepare(
    "SELECT
	doctor.DOCTOR_LICENSE_NO,
	doctor.DOCTOR_FNAME,
	doctor.DOCTOR_LNAME,
	doctor.DOCTOR_EMAIL_ID,
	doctor.DOCTOR_PHONE,
	doctor.DOCTOR_SPECIALITY,
	doctor.DOCTOR_EDUCATION,
	doctor.SUPPORTED_INSURANCE,
	doctor_profile.Doctor_Language_Spoken,
	doctor_profile.Doctor_Prof_Membership_ID,
	doctor_profile.Doctor_Prof_Membership

		FROM doctor INNER JOIN doctor_profile ON doctor.DOCTOR_LICENSE_NO = doctor_profile.Doctor_Licence_No");
   $stmt->execute();
  $stmt->bind_result(
    $DOCTOR_LICENSE_NO,
    $DOCTOR_FNAME,
    $DOCTOR_LNAME,
    $DOCTOR_EMAIL_ID,
    $DOCTOR_PHONE,
    $DOCTOR_SPECIALITY,
    $DOCTOR_EDUCATION,
    $SUPPORTED_INSURANCE,
    $Doctor_Language_Spoken,
    $Doctor_Prof_Membership_ID,
	$Doctor_Prof_Membership
  );

  while ($stmt->fetch()) {
    $row [] = array(
      'DOCTOR_LICENSE_NO'                      => $DOCTOR_LICENSE_NO,
      'DOCTOR_FNAME'                  => $DOCTOR_FNAME,
      'DOCTOR_LNAME'               => $DOCTOR_LNAME,
      'DOCTOR_EMAIL_ID'                => $DOCTOR_EMAIL_ID,
      'DOCTOR_PHONE'                    => $DOCTOR_PHONE,
      'DOCTOR_SPECIALITY'                     => $DOCTOR_SPECIALITY,
      'DOCTOR_EDUCATION'             => $DOCTOR_EDUCATION,
      'SUPPORTED_INSURANCE'                   => $SUPPORTED_INSURANCE,
      'Doctor_Language_Spoken'             => $Doctor_Language_Spoken,
      'Doctor_Prof_Membership_ID'                  => $Doctor_Prof_Membership_ID,
	  'Doctor_Prof_Membership' => $Doctor_Prof_Membership
    );
  }
  $stmt->close();
  return ($row);
}




?>
  
  
  
  