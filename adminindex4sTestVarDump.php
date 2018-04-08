<?php
include( "adminDashboardHeader.php" );
$client_key = "JPBEZAJ1STTXOB0BLE5FQTA0A421K2HMBA1IHKDLGPDPDHCM";
$client_secret = "OFLMCJQZYOZXMLDAAMD4K1SP20LH0D0H4DB3F4BU4I5YRDR1";
//$client_key = "JVAH23FK35WYAJQRX3QHKPH5PYKQGFAPFXPRJWTGDT0HWVBT";
//$client_secret = "I5KV04QHLSMJJUIZ0BKYOV4UZK3PVZ4BJFIGR2GGCU003WEQ";
function callGetApi( $url ) {
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	$output = curl_exec( $ch );
	curl_close( $ch );
	$output = json_decode( $output, true );
	// echo "dadada";
	return $output;
}

function getVenuesListUsingLatLng( $lat, $lng, $radius = 20000 ) {
	global $client_key, $client_secret;
	$url = "https://api.foursquare.com/v2/venues/explore?ll=" . $lat . "," . $lng . "&radius=" . $radius . "&limit=10&client_id=" . $client_key . "&client_secret=" . $client_secret . "&v=20180317";
	$output = callGetApi( $url );
	$venueList = array();
	//echo "<pre>";
	foreach ( $output[ 'response' ][ 'groups' ][ 0 ][ 'items' ] as $i ) {
		$venue = array();
		if ( isset( $i[ 'venue' ][ 'id' ] ) )
			$venue[ 'id' ] = $i[ 'venue' ][ 'id' ];
		if ( isset( $i[ 'venue' ][ 'name' ] ) )
			$venue[ 'name' ] = $i[ 'venue' ][ 'name' ];
		if ( isset( $i[ 'venue' ][ 'location' ][ 'address' ] ) )
			$venue[ 'address' ] = $i[ 'venue' ][ 'location' ][ 'address' ];
		if ( isset( $i[ 'venue' ][ 'location' ][ 'city' ] ) )
			$venue[ 'city' ] = $i[ 'venue' ][ 'location' ][ 'city' ];
		if ( isset( $i[ 'venue' ][ 'location' ][ 'state' ] ) )
			$venue[ 'state' ] = $i[ 'venue' ][ 'location' ][ 'state' ];
		if ( isset( $i[ 'venue' ][ 'location' ][ 'country' ] ) )
			$venue[ 'country' ] = $i[ 'venue' ][ 'location' ][ 'country' ];
		if ( isset( $i[ 'venue' ][ 'location' ][ 'lat' ] ) )
			$venue[ 'lat' ] = $i[ 'venue' ][ 'location' ][ 'lat' ];
		if ( isset( $i[ 'venue' ][ 'location' ][ 'lng' ] ) )
			$venue[ 'lng' ] = $i[ 'venue' ][ 'location' ][ 'lng' ];
		if ( isset( $i[ 'tips' ][ 0 ][ 'text' ] ) )
			$venue[ 'description' ] = $i[ 'tips' ][ 0 ][ 'text' ];
		if ( isset( $i[ 'venue' ][ 'rating' ] ) )
			$venue[ 'rating' ] = $i[ 'venue' ][ 'rating' ];
		if ( isset( $i[ 'venue' ][ 'hours' ][ 'status' ] ) )
			$venue[ 'status' ] = $i[ 'venue' ][ 'hours' ][ 'status' ];
		if ( isset( $i[ 'venue' ][ 'url' ] ) )
			$venue[ 'url' ] = $i[ 'venue' ][ 'url' ];
		$venue[ 'photo' ] = '';
		//print_r($venue);
		array_push( $venueList, $venue );
	}
	//getPhotos($venueList);
	return $venueList;
	//echo "</pre>";
}


?>

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Dashboard</h1>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3">
	<div class="col-sm-12">
		<div class="alert  alert-success alert-dismissible fade show" role="alert"> <span class="badge badge-pill badge-success">Hello</span> Welcome to the AITG Dashboard.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
		</div>
	</div>

	<!--/.col-->

	<div class="col-lg-3 col-md-6">
		<div class="social-box facebook"> <i class="fa fa-facebook"></i> </div>
	</div>
	<!--/.col-->

	<div class="col-lg-3 col-md-6">
		<div class="social-box twitter"> <i class="fa fa-twitter"></i> </div>
		<!--/social-box-->
	</div>
	<!--/.col-->

	<div class="col-lg-3 col-md-6">
		<div class="social-box linkedin"> <i class="fa fa-linkedin"></i> </div>
		<!--/social-box-->
	</div>
	<!--/.col-->

	<?php
	$resultFrom4s = getVenuesListUsingLatLng( 25.4358, 81.8463, 20000 );
	foreach ( $resultFrom4s as $i ) {
		echo( "			<div class='col-xl-6 col-lg-6'>
		<div class='card'>
			<div class='card-body'>
				<div class='stat-widget-one'>
					<div class='stat-icon dib'><i class='ti-user text-primary border-primary'></i>
					</div>
					<div class='stat-content dib'>" );

		echo( "			<div class='stat-text'>" . var_dump( $i ) . "</div>" );
		echo( "
						
					</div>
				</div>
			</div>
		</div>
	</div>" );





	}

	?>


	<div class="col-xl-3 col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">Places</div>
						<div class="stat-digit">5</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6">
		<div class="card">
			<div class="card-header">
				<h4>India</h4>
				<div id="googleMap" style="width:100%;height:400px;"></div>
				<script>
					function myMap() {
						var mapProp = {
							center: new google.maps.LatLng( 25.4920, 81.8639 ),
							zoom: 15,
						};
						var map = new google.maps.Map( document.getElementById( "googleMap" ), mapProp );
					}
				</script>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxYuQle47vALGQKq5P_8fJYXHQmZEWSo4&callback=myMap"></script>
			</div>
			<!--
                    <div class="Vector-map-js">
                        <div id="vmap" class="vmap" style="height: 265px;"></div>
                    </div>
-->
		</div>
		<!-- /# card -->
	</div>
</div>
<!-- .content --> 
</div>
<!-- /#right-panel --> 
<?php include( "adminDashboardFooter.php" ); ?>