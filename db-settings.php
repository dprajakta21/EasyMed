<?php


 
    $db_host = "localhost"; //Host address
    $db_name = "easymed"; //Name of Database
    $db_user = "root"; //Name of database user
    $db_pass = ""; //Password for database user
    $db_table_prefix = ""; // if the table prefix exists use this variable as a global

    
      GLOBAL $errors;
      GLOBAL $successes;

  $errors = array();
  $successes = array();

  

  $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
  GLOBAL $mysqli;

  if(mysqli_connect_errno()) {
   
    echo "Connection Failed: " . mysqli_connect_errno();
    exit();
  } else { 
    //echo  "Connection Successful this connection is great";
  }
?>