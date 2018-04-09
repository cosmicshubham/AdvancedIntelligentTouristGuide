<?php
include( "sessionRedirector.php" );
include( "queryFunctions.php" );
include( "adminDashboardHeader.php" );
?>

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
</div>
<div class="content mt-3">
	<div class="col-sm-12">
		<div class="alert  alert-success alert-dismissible fade show" role="alert"> <span class="badge badge-pill badge-success">Hello</span> Welcome to the AITG Dashboard.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
		</div>
	</div>

	<!--/.col-->

	<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">No. of Users</div>
						<div class="stat-digit">
							<?php echo countUsers(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-layout-grid2 text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">No. of Places</div>
						<div class="stat-digit">
							<?php echo countPlaces(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-text text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">No. of Tagged Places</div>
						<div class="stat-digit">
							<?php echo countTaggedPlaces(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-car text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">No. of Transports</div>
						<div class="stat-digit">
							<?php echo countTransport(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-tag text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">No. of Tags</div>
						<div class="stat-digit">
							<?php echo countTags(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-location-arrow text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">No. of Place Feedbacks</div>
						<div class="stat-digit">
							<?php echo countPlacesFeedback(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-plus text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">Positive Place Feedbacks</div>
						<div class="stat-digit">
							<?php echo countPositivePlaceFeedback(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-minus text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">Negative Place Feedbacks</div>
						<div class="stat-digit">
							<?php echo countNegativePlaceFeedback(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-settings text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">App Feedbacks</div>
						<div class="stat-digit">
							<?php echo countAppFeedback(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-plus text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">Positive App Feedbacks</div>
						<div class="stat-digit">
							<?php echo countPositiveAppFeedback(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="col-xl-4 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-minus text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">Negative App Feedbacks</div>
						<div class="stat-digit">
							<?php echo countNegativeAppFeedback(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--
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
		</div>
	</div>
-->
</div>
<!-- .content --> 
</div>
<!-- /#right-panel --> 
<?php include( "adminDashboardFooter.php" ); ?>