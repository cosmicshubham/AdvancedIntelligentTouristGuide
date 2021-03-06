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

function addTagToPlace( $placeid, $tagid, $weight ) {

	$query = "INSERT INTO placestags ( placeid, tagid, weight ) VALUES (" . $placeid . ", " . $tagid . ", " . $weight . ")";
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

function addTagToUser( $userid, $tagid ) {

	$query = "INSERT INTO usertags ( userid, tagid) VALUES (" . $userid . ", " . $tagid . ")";
	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function removeTagFromUser( $userid, $tagid ) {

	$query = "DELETE FROM usertags WHERE userid = " . $userid . " AND tagid = " . $tagid;

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

		
	if ($username == '' || $password1 == '' || $password2 == '') {
		return -1;
	}
	
	if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
		return -2;
	}
	
	if ( $password1 != $password2 ) {
		return -3;
	}

	$query = "UPDATE users SET username = '" . $username . "', password = '" . $password1 . "' WHERE userid = " . $userid;
	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return 0;
	} else {
		return -1;
	}

}

function addNewUser( $username, $password1, $password2, $type ) {
	
	if ($username == '' || $password1 == '' || $password2 == '') {
		return -1;
	}
	
	if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
		return -2;
	}
	
	if ( $password1 != $password2 ) {
		return -3;
	}
	

	$query = "INSERT INTO users ( username, password, type ) VALUES ('" . $username . "', '" . $password1 . "', '" . $type . "')";

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return mysqli_insert_id( $connection );
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

	$query = "UPDATE userplaceratings SET placerating = " . $placerating . ", comment = '" . $comment . "' WHERE userid = " . $userid . " AND placeid = " . $placeid;
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
	if ( $row ) {
		return true;
	} else {
		return false;
	}
}

function checkPlaceTagExist( $placeid, $tagid ) {
	$query = "SELECT * FROM placestags WHERE placeid = " . $placeid . " AND tagid = " . $tagid;
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( $row ) {
		return true;
	} else {
		return false;
	}
}

function checkUserTagExist( $userid, $tagid ) {
	$query = "SELECT * FROM usertags WHERE userid = " . $userid . " AND tagid = " . $tagid;
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( $row && $results ) {
		return true;
	} else {
		return false;
	}
}



function checkPlaceTransportExist( $placeid, $transportid ) {
	$query = "SELECT * FROM modeoftransport WHERE placeid = " . $placeid . " AND transportid = " . $transportid;
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( $row ) {
		return true;
	} else {
		return false;
	}
}




function addUserPlaceFeedback( $userid, $placeid, $rating, $comment ) {

	$query = "INSERT INTO userplacerating ( userid, placeid, placerating, comment) VALUES (" . $userid . ", " . $placeid . ", " . $rating . ", '" . $comment . "')";
	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function updateUserPlaceFeedback( $userid, $placeid, $rating, $comment ) {

	$query = "UPDATE userplacerating SET placerating = " . $rating . ", comment = '" . $comment . "' WHERE userid = " . $userid . " AND placeid = " . $placeid;

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function removeUserPlaceFeedback( $userid, $placeid ) {

	$query = "DELETE FROM userplacerating WHERE userid = " . $userid . " AND placeid = " . $placeid;

	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function checkUserPlaceFeedbackExist( $userid, $placeid ) {
	$query = "SELECT * FROM userplacerating WHERE userid = " . $userid . " AND placeid = " . $placeid;
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( $row && $results ) {
		return true;
	} else {
		return false;
	}
}

function updateUserProductRating( $userid, $apprating, $comment ) {

	$query = "UPDATE users SET apprating = " . $apprating . ", comment = '" . $comment . "' WHERE userid = " . $userid;
	global $connection;
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) > 0 ) {
		return true;
	} else {
		return false;
	}

}

function countUsers() {
	$query = "SELECT count(userid) as c FROM users";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function countPlaces() {
	$query = "SELECT count(placeid) as c FROM places";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}


function countPlacesFeedback() {
	$query = "SELECT count(id) as c FROM userplacerating";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function countTransport() {
	$query = "SELECT count(transportid) as c FROM transports";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}


function countTags() {
	$query = "SELECT count(tagid) as c FROM tags";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function countPositivePlaceFeedback() {
	$query = "SELECT count(id) as c FROM userplacerating WHERE placerating > 5";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function countNegativePlaceFeedback() {
	$query = "SELECT count(id) as c FROM userplacerating WHERE placerating <= 5 AND placerating > 0";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function countAppFeedback() {
	$query = "SELECT count(userid) as c FROM users WHERE apprating > 0";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function countPositiveAppFeedback() {
	$query = "SELECT count(userid) as c FROM users WHERE apprating > 5";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function countNegativeAppFeedback() {
	$query = "SELECT count(userid) as c FROM users WHERE apprating <= 5 AND apprating > 0";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function countTaggedPlaces() {
	$query = "SELECT count(placeid) as c FROM placestags GROUP BY placeid";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function redirect( $type ) {
	if ( $type == "admin" ) {
		header( "Location: adminindex.php" );
	} else {
		header( "Location: userindex.php" );
	}
}

function getCurrentUserTags( $userid ) {
	$query = "SELECT tagname FROM usertags, tags WHERE usertags.tagid = tags.tagid AND userid = " . $userid . " ORDER BY tagname";
	global $connection;
	$results = mysqli_query( $connection, $query );

	$temp = array();

	while ( $row = mysqli_fetch_assoc( $results ) ) {

		array_push( $temp, $row[ "tagname" ] );
	}
	return $temp;

}

function getCurrentPlaceTransport( $placeid ) {
	$query = "SELECT transportname FROM modeoftransport, transports WHERE modeoftransport.transportid = transports.transportid AND placeid = " . $placeid . " ORDER BY transportname";
	global $connection;
	$results = mysqli_query( $connection, $query );

	$temp = array();

	while ( $row = mysqli_fetch_assoc( $results ) ) {

		array_push( $temp, $row[ "transportname" ] );
	}
	return $temp;

}

function getCurrentPlaceTags( $placeid ) {
	$query = "SELECT tagname FROM placestags, tags WHERE placestags.tagid = tags.tagid AND placeid = " . $placeid . " ORDER BY tagname";
	global $connection;
	$results = mysqli_query( $connection, $query );

	$temp = array();

	while ( $row = mysqli_fetch_assoc( $results ) ) {

		array_push( $temp, $row[ "tagname" ] );
	}
	return $temp;

}

function getPlaceNameFromLatLong($lat, $long) {
	$query = "SELECT * FROM places WHERE lattitude = " . $lat . " AND longitude = " . $long;
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "placename" ];
	} else {
		return 0;
	}
}
function getPlaceIDFromLatLong($lat, $long) {
	$query = "SELECT * FROM places WHERE lattitude = " . $lat . " AND longitude = " . $long;
	global $connection;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "placeid" ];
	} else {
		return 0;
	}
}


?>