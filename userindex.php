<?php

header ("Location: userplantrip.php");

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
</div>
<?php include( "userDashboardFooter.php" ); ?>