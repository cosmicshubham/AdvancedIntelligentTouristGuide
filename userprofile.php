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
<div class="content mt-3">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><strong>User Preferences</strong>
			</div>
			<div class="card-body card-block">
				<div class="form-group">
					<label for="company" class=" form-control-label">Name</label>
					<input type="text" id="company" placeholder="Enter your name" class="form-control">
				</div>
				<div class="form-group">
					<label for="vat" class=" form-control-label">Location Preferences</label>
					<input type="text" id="vat" placeholder="Enter your city preference" class="form-control col-lg-12">
					<br>
					<input type="text" id="vat1" placeholder="Enter your city preference" class="form-control col-lg-12">
					<br>
					<input type="text" id="vat2" placeholder="Enter your city preference" class="form-control col-lg-12">
					<br>
					<div class="form-group">
						<label for="street" class=" form-control-label">Medical Condition</label>
						<input type="text" id="street" placeholder="Enter your medical condition" class="form-control">
					</div>
					<div class="form-group">
						<label for="city" class=" form-control-label">Your Current Location</label>
						<input type="textarea" row="5" col="50" id="city" placeholder="Your Current Location" class="form-control">
					</div>
					<button id="payment-button" type="submit" class="btn btn-lg btn-info col-lg-2"> <i class="fa fa-lg"></i>&nbsp; <span id="payment-button-amount">Update</span> <span id="payment-button-sending" style="display:none;">Sending…</span> </button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- .content --> 
</div>
<?php include( "userDashboardFooter.php" ); ?>