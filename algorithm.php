<?php
include_once( "queryFunctions.php" );



function returnSuggestedArray( $lat1, $long1, $lat2, $long2 ) {

	$query = "SELECT * FROM places";
	global $connection;
	$results = mysqli_query( $connection, $query );
	$temp = array();
	while ( $row = mysqli_fetch_assoc( $results ) ) {

		$currentLat = $row[ "lattitude" ];
		$currentLong = $row[ "longitude" ];
		array_push( $temp, array( $row[ "lattitude" ], $row[ "longitude" ] ) );
	};



	$slope = calculateSlope( $lat1, $long1, $lat2, $long2 );
	
	
	if ( $slope >= -1 && $slope <= 1 ) {

		if ( $lat1 < $lat2 ) {
				foreach($temp as $current) {
					$currentLat = current[0];
					$currentLong = current[1];
					if ()
				}

		}



	}



	$arrayOfLatLong;




}

function insideSkewedRectangle ( $lat1, $long1, $lat2, $long2, $currentLat, $currentLong) {
	if ($currentLat > $lat1 && )
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