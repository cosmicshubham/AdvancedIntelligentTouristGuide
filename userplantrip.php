<?php
include( "sessionRedirector.php" );
include( "queryFunctions.php" );
$userid = $_SESSION[ "userid" ];

if ( isset( $_POST[ "submit" ] ) ) {

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
				<form method="post" action="usertags.php">
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
						<input type="date" id="vat" class="form-control col-lg-12">
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
						<input type="date" id="vat" class="form-control col-lg-12">
						<br>
						<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info col-lg-2">Submit</button>
					</div>
				</form>
			</div>
		</div>
		<!-- .content -->
	</div>
	<?php include( "userDashboardFooter.php" ); ?>