<?php

$username = "aitgadmin";
$password = "aitgadmin";
$dbname = "aitgdb";
$dbhost = "localhost";
$connection = mysqli_connect( $dbhost, $username, $password, $dbname );

if ( mysqli_connect_errno() ) {
	die( "Database connection failed: " . mysqli_connect_error() . mysqli_connect_errno() );
}

function addPlace( $placeName, $pLatitude, $pLongitude ) {

	$query = "INSERT INTO places (placename, lattitude, longitude) VALUES ('" . $placeName . "', " . $pLatitude . ", " . $pLongitude . ")";
	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function updatePlace( $placeid, $placeName, $pLatitude, $pLongitude ) {

	$query = "UPDATE places SET placename = '" . $placeName . "', lattitude = " . $pLatitude . ", longitude = " . $pLongitude . " WHERE placeid = " . $placeid;

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function removePlace( $placeid ) {

	$query = "DELETE FROM places WHERE placeid = " . $placeid;
	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}


function addTransportToPlace( $placceid, $transportid ) {

	$query = "INSERT INTO modeoftransport ( placeid, transportid ) VALUES (" . $placceid . ", " . $transportid . ")";

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function removeTransportFromPlace( $placceid, $transportid ) {

	$query = "DELETE FROM modeoftransport WHERE placeid = " . $placceid . " AND transportid = " . $transportid;

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function addTagToPlace( $placceid, $tagid, $weight ) {

	$query = "INSERT INTO placestags ( placeid, tagid, weight ) VALUES (" . $placceid . ", " . $tagid . ", " . $weight . ")";

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function removeTagFromPlace( $placceid, $tagid ) {

	$query = "DELETE FROM placestags WHERE placeid = " . $placceid . " AND tagid = " . $tagid;

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function addTransport( $transportName ) {

	$query = "INSERT INTO transport ( transportname ) VALUES ('" . $transportName . "')";

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function removeTransport( $transportid ) {

	$query = "DELETE FROM transport WHERE transportid = " . $transportid;

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function addTag( $tagname ) {

	$query = "INSERT INTO tags ( tagname ) VALUES ('" . $tagname . "')";

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function removeTag( $tagid ) {

	$query = "DELETE FROM tags WHERE tagid = " . $tagid;

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function updateUserDetails( $userid, $uname, $gender, $aadharid, $dob, $phone, $address ) {

	$query = "UPDATE users SET uname = '" . $uname . "', gender = '" . $gender . "', aadharid = '" . $aadharid . "', dob = '" . $dob . "', phone = '" . $phone . "', address = '" . $address . "' WHERE userid = " . $userid;
	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}


function updateUserEmailPassword( $userid, $username, $password1, $password2 ) {
	if ( $password1 != $password2 ) {
		return false;
	}

	$query = "UPDATE users SET username = '" . $username . "', password = '" . $password1 . "' WHERE userid = " . $userid;
	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function addNewUser( $username, $password1, $password2, $type ) {
	if ( $password1 != $password2 ) {
		return -1;
	}

	$query = "INSERT INTO users ( username, password, type ) VALUES ('" . $username . "', '" . $password1 . "', '" . $type . "')";

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return mysqli_insert_id($connection);
	} else {
		return -1;
	}

}


function removeUser( $userid ) {

	$query = "DELETE FROM users WHERE userid = " . $userid;

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}



function addUserPlaceRating( $userid, $placeid, $placerating, $comment ) {

	$query = "INSERT INTO userplaceratings ( userid, placeid, placerating, comment ) VALUES (" . $userid . ", " . $placeid . ", " . $placerating . ", '" . $comment . "')";

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}



function updateUserPlaceRating( $userid, $placeid, $placerating, $comment ) {
	if ( $password1 != $password2 ) {
		return false;
	}

	$query = "UPDATE userplaceratings SET comment = " . $placerating . ", comment = '" . $comment . "' WHERE userid = " . $userid . " AND placeid = " . $placeid;
	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function getUserType( $userid ) {
	$query = "SELECT * FROM users WHERE (userid = " . $userid . ")";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );

	if ( !$row ) {
		header( "Location: login.php?status=wrong" );
	} else {
		return $row[ "type" ];
	}
}

function checkUserExist( $username ) {
	$query = "SELECT * FROM users WHERE username = '" . $username . "'";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( $row  ) {
		return true;
	} else {
		return false;
	}
}







?>