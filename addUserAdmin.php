<?php
include( "queryFunctions.php" );
include( "sessionRedirector.php" );
if ( isset( $_POST[ "btnadd" ] ) ) {
	if ( checkUserExist( $_POST[ "tbusername" ] ) ) {
		header( "Location: addUserAdmin.php?status=UserNameAlreadyExist" );
	} else {
		$returnValue = addNewUser( $_POST[ "tbusername" ], $_POST[ "tbpassword1" ], $_POST[ "tbpassword2" ], $_POST[ "cbuser" ] );
		//var_dump($returnValue);

		if ( $returnValue > 0 ) {
			header( "Location: addUserAdmin.php?status=UserAddedSuccessfully" );
		} else {
			header( "Location: addUserAdmin.php?status=WrongData" );
		}
	}



}
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
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><strong>Add User</strong>
			</div>
			<div class="card-body card-block">
				<form method="post" action="addUserAdmin.php">
					<div class="form-group">
						<div class="row form-group">
							<div class="col-md-4">
								<label for="vat">User Type</label>
								<select name="cbuser" id="activities" class="form-control">
									<option value="admin">Admin</option>
									<option value="standard">Standard</option>
								</select>
							</div>
						</div>
						<label for="vat" class=" form-control-label">UserName</label>
						<input type="text" id="vat" placeholder="Enter username" name="tbusername" class="form-control col-lg-12">
						<br>
						<label for="vat" class=" form-control-label">Password</label>
						<input type="password" id="vat" placeholder="Enter password" name="tbpassword1" class="form-control col-lg-12">
						<br>
						<label for="vat" class=" form-control-label">Confirm Password</label>
						<input type="password" id="vat" placeholder="Enter password" name="tbpassword2" class="form-control col-lg-12">
						<br>

						<button id="payment-button" type="submit" name="btnadd" class="btn btn-lg btn-info col-lg-2">Add</button>
					</div>
				</form>
			</div>
		</div>
		<!-- .content -->
	</div>
</div>
<?php include( "adminDashboardFooter.php" ); ?>