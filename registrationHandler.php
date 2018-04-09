<?php

include_once( "queryFunctions.php" );



if ( isset( $_POST[ "submit" ] ) ) {

	$loginUser = $_POST[ "formname" ];
	$loginPass1 = $_POST[ "formpassword" ];
	$loginPass2 = $_POST[ "formcnfpassword" ];



	if ( checkUserExist( $_POST[ "formname" ] ) ) {
		header( "Location: registration.php?status=UserNameAlreadyExist" );
	} else {
		$returnValue = addNewUser( $_POST[ "formname" ], $_POST[ "formpassword" ], $_POST[ "formcnfpassword" ], "standard" );
		//var_dump($returnValue);

		if ( $returnValue > 0 ) {
			session_start();
			$_SESSION[ "userid" ] = $returnValue;
			header( "Location: userindex.php" );
		} else {
			if ($returnValue == -1)
				header( "Location: registration.php?status=Input_Cannot_be_Blank" );
			elseif ($returnValue == -2)
				header( "Location: registration.php?status=Invalid_Email_Address" );
			elseif ($returnValue == -3)
				header( "Location: registration.php?status=Password_Mismatch" );
			else
				header( "Location: registration.php?status=WrongData" );
		}
	}


}



?>