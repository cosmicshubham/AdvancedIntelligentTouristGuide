<?php

// header ("Location: userplantrip.php");
//include( "queryFunctions.php" );
include( "sessionRedirector.php" );
include( "userDashboardHeader.php" );
include( "foursquareHelper.php" );
$userid = $_SESSION[ "userid" ];

?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<?php echo "<h1>Welcome</h1>"?>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-left">
					<li class="active">
						<?php //echo "User Id ".$userid ?>
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3">
	<div class="card-header">
		<h4>India</h4>
		<div id="googleMap" class="text-center" style="width:100%;height:400px;"></div>
		<script>
            var map = new google.maps.Map( document.getElementById( "googleMap" ), mapProp );
            function myMap() 
            {
            var map = new google.maps.Map(document.getElementById('googleMap'), {
              zoom: 5,
              center: new google.maps.LatLng( 23.4920, 81.8639 ),
              mapTypeId: 'terrain'
            });

            var flightPlanCoordinates = [
              {lat: 28.7041, lng: 77.1025},
              {lat: 25.4358, lng: 81.8463},
              {lat: 18.5204, lng: 73.8567},
              {lat: 19.0760, lng: 72.8777},
              {lat: 32.7266, lng: 74.8570}
            ];
            var flightPath = new google.maps.Polyline({
              path: flightPlanCoordinates,
              geodesic: true,
              strokeColor: '#FF0000',
              strokeOpacity: 1.0,
              strokeWeight: 2
            });

            flightPath.setMap(map);
            JSON.stringify(flightPlanCoordinates);
            }
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxYuQle47vALGQKq5P_8fJYXHQmZEWSo4&callback=myMap"></script>
	</div>
</div>
<div class="content mt-3"> </div>
<?php

$resultFrom4s = getVenuesListUsingLatLng( $lat=28.7041, $long=77.1025, $radius=20000);
foreach ( $resultFrom4s as $i ) {
	//$resultFromPhotos = getPhotos($i['id']);
	//echo($resultFromPhotos);
    //$array=json_decode($_POST['jsondata']);
	echo( "
			<div class='col-xl-6'>
        		<div class='card'>
            		<div class='card-body'>
                <div class='stat-widget-one'>
                    <div>" );
	echo( "         <div class='stat-text '><h6><strong>" .$i[ 'name' ]. "<strong></h6></div><br>" );
	//echo( "         <div><img alt='image' src='" . getPhotoSingle( $i[ 'id' ] ) . "'/></div><br/>" );
	echo( "</div>
                    <div class='stat-content dib'>" );
	if ( isset( $i[ 'city' ] ) ) {
		echo( "         <div class='stat-text '><strong>Address : </strong></div>" );
		$add = $i[ "city" ].' '.$i['country'];
        //$addr=explode(" ",$add);
        //$address=implode(' ',array_slice($addr, 0)).', India';   
        //$add
	} else
		$add = "<br>";
    echo( "         <div class='stat-text'><mark>" . $add . "<mark></div>" );
    if ( isset( $i[ 'rating' ] ) ) {
		echo( "         <div class='stat-text '><strong>Ratings : </strong></div>" );
		$rate = $i[ 'rating' ];
	} else
		$rate = "<br>";

	
	echo( "         <div class='stat-text'><mark>" . $rate . "<mark></div>" );
	echo( "
                        
                    </div>
                </div>
            </div>
        </div>
    </div>" );





}

?>

<?php include( "userDashboardFooter.php" ); ?>
