<?php

$username = "aitgadmin";
$password = "aitgadmin";
$dbname = "aitgdb";
$dbhost = "localhost";
$connection = mysqli_connect( $dbhost, $username, $password, $dbname );

if ( mysqli_connect_errno() ) {
	die( "Database connection failed: " . mysqli_connect_error() . mysqli_connect_errno() );
}

if ( !isset( $_POST[ "submit" ] ) ) {
	header( "Location: login.php" );
}
session_start();
$loginUser = $_POST[ "username" ];
$loginPass = $_POST[ "password" ];
$_SESSION[ "user" ] = $loginUser;

if ( $loginUser == "admin" && $loginPass == "admin" ) {
	header( "Location: adminindex.php" );
} else {
	$query = "SELECT * FROM users WHERE (username = '" . $loginUser . "' AND password = '" . $loginPass . "')";
	$results = mysqli_query( $connection, $query );

	if ( !mysqli_fetch_assoc( $results ) ) {
		header( "Location: login.php?status=wrong" );
	} else {
		header( "Location: userindex.php" );
	}

}



?>