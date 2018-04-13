<?php
include_once( "sessionRedirector.php" );
include_once( "queryFunctions.php" );
include_once( "algorithm.php" );

$userid = $_SESSION[ "userid" ];

$names;
$latLong = array();

$query1 = "SELECT DISTINCT placeid FROM usertags, placestags WHERE usertags.tagid = placestags.tagid AND userid = " . $userid;
global $connection;
$results1 = mysqli_query( $connection, $query1 );
$rows = mysqli_fetch_all( $results1 );
$recommendedPlaces = array();
foreach($rows as $temp) {
  array_push($recommendedPlaces, $temp[0]);
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
//						echo var_dump($names[0]);
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
					<li class="active"></li>
				</ol>
			</div>
		</div>
	</div>
</div>


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
	foreach ( $recommendedPlaces as $place ) {
		global $connection;
		$query = "SELECT * FROM places WHERE placeid = " . $place;
		$results = mysqli_query( $connection, $query );
		
		while ( $row = mysqli_fetch_assoc( $results ) ) {
			?>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<strong>
					<?php echo $row["placename"]; ?>
				</strong>
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

<?php include( "userDashboardFooter.php" ); ?>