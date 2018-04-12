<?php
include_once( "queryFunctions.php" );

function getRecommendedPlaces($placeid1, $placeid2) {
	
	global $connection;
	$query = "SELECT * FROM places WHERE placeid = " . $placeid1;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	$lat1 = $row["lattitude"];
	$long1 = $row["longitude"];
	$query = "SELECT * FROM places WHERE placeid = " . $placeid2;
	$results = mysqli_query( $connection, $query );
	$row = mysqli_fetch_assoc( $results );
	$lat2 = $row["lattitude"];
	$long2 = $row["longitude"];
	
	$recommendedPlaces = getPlannedPlaces( $lat1, $long1, $lat2, $long2 );
	$placeNameArray = array();
	foreach($recommendedPlaces as $currentPlace) {
		array_push($placeNameArray, getPlaceNameFromLatLong($currentPlace[0], $currentPlace[1]));
	}
	return $placeNameArray;	
	
}

function getPlannedPlaces( $lat1, $long1, $lat2, $long2 ) {
	$places = getPlacesBetween( $lat1, $long1, $lat2, $long2 );
	$slope = calculateSlope( $lat1, $long1, $lat2, $long2 );

	if ( $slope >= 0 && $slope <= 1 ) {

		if ( $lat1 < $lat2 ) {
			usort( $places, function ( $a, $b ) {
				return $a[ 0 ] < $b[ 0 ];
			} );
		}
		else {
			usort( $places, function ( $a, $b ) {
				return $a[ 0 ] > $b[ 0 ];
			} );
		}
	} elseif ( $slope >= 1) {

		if ( $lat1 < $lat2 ) {
			usort( $places, function ( $a, $b ) {
				return $a[ 1 ] < $b[ 1 ];
			} );
		}
		else {
			usort( $places, function ( $a, $b ) {
				return $a[ 1 ] > $b[ 1 ];
			} );
		}
	} elseif ( $slope <= -1) {

		if ( $lat1 < $lat2 ) {
			usort( $places, function ( $a, $b ) {
				return $a[ 1 ] > $b[ 1 ];
			} );
		}
		else {
			usort( $places, function ( $a, $b ) {
				return $a[ 1 ] < $b[ 1 ];
			} );
		}
	} elseif ( $slope >= -1 && $slope <= 0) {

		if ( $lat1 < $lat2 ) {
			usort( $places, function ( $a, $b ) {
				return $a[ 0 ] < $b[ 0 ];
			} );
		}
		else {
			usort( $places, function ( $a, $b ) {
				return $a[ 0 ] > $b[ 0 ];
			} );
		}
	}
	return $places;

}


function getPlacesBetween( $lat1, $long1, $lat2, $long2 ) {

	$query = "SELECT * FROM places";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$temp = array();
	while ( $row = mysqli_fetch_assoc( $results ) ) {

		$currentLat = $row[ "lattitude" ];
		$currentLong = $row[ "longitude" ];
		array_push( $temp, array( $row[ "lattitude" ], $row[ "longitude" ] ) );
	}


	$arrayToReturn = array();
	$slope = calculateSlope( $lat1, $long1, $lat2, $long2 );


	foreach ( $temp as $current ) {
		$currentLat = $current[ 0 ];
		$currentLong = $current[ 1 ];
		if ( $slope >= 0 ) {
			if ( $lat1 < $lat2 ) {
				if ( $currentLat > $lat1 && $currentLat < $lat2 && $currentLong > $long1 && $currentLat < $long2 ) {
					array_push( $arrayToReturn, array( $currentLat, $currentLong ) );
				}
			} else {
				if ( $currentLat < $lat1 && $currentLat > $lat2 && $currentLong < $long1 && $currentLat > $long2 ) {
					array_push( $arrayToReturn, array( $currentLat, $currentLong ) );
				}
			}
		} elseif ( $slope <= 0 ) {
			if ( $lat1 < $lat2 ) {
				if ( $currentLat > $lat1 && $currentLat < $lat2 && $currentLong < $long1 && $currentLat > $long2 ) {
					array_push( $arrayToReturn, array( $currentLat, $currentLong ) );
				}
			} else {
				if ( $currentLat < $lat1 && $currentLat > $lat2 && $currentLong > $long1 && $currentLat < $long2 ) {
					array_push( $arrayToReturn, array( $currentLat, $currentLong ) );
				}
			}
		}


	}
	return $arrayToReturn;

}


function calculateSlope( $lat1, $long1, $lat2, $long2 ) {
	return ( $long2 - $long1 ) / ( $lat2 - $lat1 );
}


function toRad( $x ) {
	return $x * pi() / 180;
}

function calculateHaversineDistance( $lat1, $lon1, $lat2, $lon2 ) {

	$R = 6371; // km
	$dLat = $this->toRad( $lat2 - $lat1 );

	$dLon = $this->toRad( $lon2 - $lon1 );

	$lat1 = $this->toRad( $lat1 );

	$lat2 = $this->toRad( $lat2 );


	$a = sin( $dLat / 2 ) * sin( $dLat / 2 ) +
		sin( $dLon / 2 ) * sin( $dLon / 2 ) * cos( $lat1 ) * cos( $lat2 );

	$c = 2 * atan2( sqrt( $a ), sqrt( 1 - $a ) );

	return $R * $c;
}


function area( $x1, $y1, $x2, $y2,
	$x3, $y3 ) {
	return abs( ( x1 * ( y2 - y3 ) + x2 * ( y3 - y1 ) +
		x3 * ( y1 - y2 ) ) / 2.0 );
}

/* A function to check whether po$P(x, y) 
   lies inside the rectangle formed by A(x1, y1), 
   B(x2, y2), C(x3, y3) and D(x4, y4) */
function check( $x1, $y1, $x2, $y2, $x3,
	$y3, $x4, $y4, $x, $y ) {
	/* Calculate area of rectangle ABCD */
	$A = area( x1, y1, x2, y2, x3, y3 ) + area( x1, y1, x4, y4, x3, y3 );

	/* Calculate area of triangle PAB */
	$A1 = area( x, y, x1, y1, x2, y2 );

	/* Calculate area of triangle PBC */
	$A2 = area( x, y, x2, y2, x3, y3 );

	/* Calculate area of triangle PCD */
	$A3 = area( x, y, x3, y3, x4, y4 );

	/* Calculate area of triangle PAD */
	$A4 = area( x, y, x1, y1, x4, y4 );

	/* Check if sum of A1, A2, A3 and A4 
	   is same as A */
	return ( A == A1 + A2 + A3 + A4 );
}






?>