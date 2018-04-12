<?php
include_once( "sessionRedirector.php" );
include_once( "queryFunctions.php" );
include_once( "algorithm.php" );

$userid = $_SESSION[ "userid" ];

$names;
$latLong = array();
if ( isset( $_POST[ "submit" ] ) ) {
	$days = date_diff( date_create( $_POST[ "datestart" ] ), date_create( $_POST[ "dateend" ] ) );
	$names = getPlacesMain( $_POST[ "formplacesource" ], $_POST[ "formplacedestination" ], $days->format( "%a" ) );
}

?>


<?php include( "userDashboardHeader.php" ); ?>

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>
					<?php 
					if (isset($_GET["status"])) {
						//var_dump($_GET);
						echo $_GET["status"];
					}
//
//					if (isset($_POST[ "submit" ])) {
//						echo var_dump($names);
//					}
					?>
				</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><strong>Plan Your Trip</strong>
			</div>
			<div class="card-body card-block">
				<form method="post" action="userplantrip.php">
					<div class="form-group">


						<label for="vat" class=" form-control-label">Source</label>
						<select name="formplacesource" id="activities" class="form-control">

							<?php
							global $connection;
							$query = "SELECT * FROM places ORDER BY placename";
							$results = mysqli_query( $connection, $query );
							while ( $row = mysqli_fetch_assoc( $results ) ) {
								echo( "<option value = '" . $row[ "placeid" ] . "' >" . $row[ "placename" ] . "</option>" );
							}
							?>
						</select> <br>
						<label for="vat" class=" form-control-label">Start Date</label>
						<input type="date" id="vat" name="datestart" class="form-control col-lg-12">
						<br>
						<label for="vat" class=" form-control-label">Destination</label>
						<select name="formplacedestination" id="activities" class="form-control">

							<?php
							global $connection;
							$query = "SELECT * FROM places ORDER BY placename";
							$results = mysqli_query( $connection, $query );
							while ( $row = mysqli_fetch_assoc( $results ) ) {
								echo( "<option value = '" . $row[ "placeid" ] . "' >" . $row[ "placename" ] . "</option>" );
							}
							?>
						</select> <br>
						<label for="vat" class=" form-control-label">Start Date</label>
						<input type="date" id="vat" name="dateend" class="form-control col-lg-12">
						<br>
						<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info col-lg-2">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

	<?php if  (isset( $_POST[ "submit" ] )) { ?>



	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>
					Journey Plan
				</h1>
				

				</div>
			</div>
		</div>
	</div>
<div class="content mt-3">
	<?php
	foreach ( $names as $place ) {
		global $connection;
		$query = "SELECT * FROM places WHERE placeid = " . $place;
		$results = mysqli_query( $connection, $query );
		while ( $row = mysqli_fetch_assoc( $results ) ) {
			array_push($latLong, array($row["lattitude"], $row["longitude"]));
			?>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header"><strong><?php echo $row["placename"]; ?></strong>
			</div>
			<div class="card-body card-block">

				<div class="form-group">
					<label for='street' class=' form-control-label'>Coordinates</label>
					<input type="text" id="vat" value='<?php echo $row["lattitude"] . "N, " . $row ["longitude"] . "E"; ?>' class="form-control col-lg-12" readonly>
					</br>
					<label for="vat" class=" form-control-label">Tags</label>
					<input type="text" id="vat" placeholder="NA" value='<?php echo implode(", ", getCurrentPlaceTags($place)); ?>' class="form-control col-lg-12" readonly>
					<br>
					<label for="vat" class=" form-control-label">Modes of Transport</label>
					<input type="text" id="vat" placeholder="NA" value='<?php echo implode(", ", getCurrentPlaceTransport($place)); ?>' class="form-control col-lg-12" readonly>
					<br>
					
				</div>
			</div>
		</div>

	</div>




	<?php
	}
	}


	?>
</div>
<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>
					Map
				</h1>
				

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
			  <?php
				$j;
				for($j = 0; $j < count($latLong) - 1; $j ++) {
					echo ("{lat: " . $latLong[$j][0] . ", lng: " . $latLong[$j][1] . "}, ");
				}
				echo ("{lat: " . $latLong[$j][0] . ", lng: " . $latLong[$j][1] . "}");
				
			  /*
			  {lat: 28.7041, lng: 77.1025},
              {lat: 25.4358, lng: 81.8463},
              {lat: 18.5204, lng: 73.8567},
              {lat: 19.0760, lng: 72.8777},
              {lat: 32.7266, lng: 74.8570}
			  */
				
				
			  ?>
				

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
<?php } ?>
<?php include( "userDashboardFooter.php" ); ?>