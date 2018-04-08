<?php

include( "queryFunctions.php" );

session_start();
if ( isset( $_SESSION[ "userid" ] ) ) {
	$type = redirect( getUserType( $_SESSION[ "userid" ] ) );
	redirect( $type );
}


if ( isset( $_POST[ "submit" ] ) ) {

	$loginUser = $_POST[ "username" ];
	$loginPass = $_POST[ "password" ];


	$query = "SELECT * FROM users WHERE (username = '" . $loginUser . "' AND password = '" . $loginPass . "')";
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );

	if ( !$row ) {
		header( "Location: login.php?status=wrong" );
	} else {
		session_start();
		$_SESSION[ "userid" ] = $row[ "userid" ];
		$type = $row[ "type" ];
		redirect( $type );

	}


}




function redirect( $type ) {
	if ( $type == "admin" ) {
		header( "Location: adminindex.php" );
	} else {
		header( "Location: userindex.php" );
	}
}


?>