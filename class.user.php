<?php
  class loggedInUser {
	  public $Patient_ID = NULL;
	  public $Patient_Fname = NULL;
	  public $Patient_Lname = NULL;
	  public $Patient_Email_ID  = NULL;
      public $hash_pw = NULL;
      public $Patient_Phone = NULL;
	  public $Patient_Address_Line1 = NULL;
	  public $Patient_Address_Line2 = NULL;
	  public $Location_Zip_code = NULL;
	  

	  //Logout
	  public function userLogOut()
	  {
		  destroySession("ThisUser");
	  }
  }

?>