<?php
include( "sessionRedirector.php" );
include( "adminDashboardHeader.php" ); ?>

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

	<div class="col-xl-3 col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-one">
					<div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i>
					</div>
					<div class="stat-content dib">
						<div class="stat-text">Users</div>
						<div class="stat-digit">3</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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