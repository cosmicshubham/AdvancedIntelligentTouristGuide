<?php

// header ("Location: userplantrip.php");

include( "sessionRedirector.php" );
include( "userDashboardHeader.php" );
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
                function myMap() {
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
      }
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxYuQle47vALGQKq5P_8fJYXHQmZEWSo4&callback=myMap"></script>
	</div>
</div>
<?php include( "userDashboardFooter.php" ); ?>
