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
			<div class="card-header"><strong>User Feedback</strong>
			</div>
			<div class="card-body card-block">
				<div class="form-group"><label for="company" class=" form-control-label">Name</label><input type="text" id="company" placeholder="Enter your name" class="form-control">
				</div>
				<div class="form-group"><label for="vat" class=" form-control-label">Location Visited</label><input type="text" id="vat" placeholder="Enter the cities visited" class="form-control">
				</div>
				<div class="form-group"><label for="street" class=" form-control-label">Best Attractions</label><input type="text" id="street" placeholder="Enter the restaurants or monuments visited" class="form-control">
				</div>
				<div class="form-group"><label for="city" class=" form-control-label">Help us to improve</label><input type="textarea" row="5" col="50" id="city" placeholder="Provide your valuable feedback" class="form-control">
				</div>
				<button id="payment-button" type="submit" class="btn btn-lg btn-info col-lg-2">
                                              <i class="fa fa-lg"></i>&nbsp;
                                              <span id="payment-button-amount">Submit</span>
                                              <span id="payment-button-sending" style="display:none;">Sending…</span>
                                          </button>
			
			</div>
		</div>


	</div>
	<!-- .content -->
</div> <!-- /#right-panel -->
<?php include( "userDashboardFooter.php" ); ?>