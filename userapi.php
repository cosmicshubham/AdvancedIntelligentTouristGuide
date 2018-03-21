<?php include( "userDashboardHeader.php" ); ?>

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Dashboard</h1>
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
<!-- .content -->
</div>
<?php include( "userDashboardFooter.php" ); ?>