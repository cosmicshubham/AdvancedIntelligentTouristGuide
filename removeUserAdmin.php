<?php
include( "queryFunctions.php" );
include( "sessionRedirector.php" );
if ( isset( $_POST[ "btnremove" ] ) ) {
	if ( removeUser( $_POST[ "cbuser" ] ) ) {
		header( "Location: removeUserAdmin.php?status=UserRemoved" );
	} else {
		header( "Location: removeUserAdmin.php?status=SomethingWentWrong" );
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
			<div class="card-header"><strong>Remove User</strong>
			</div>
			<div class="card-body card-block">
				<form method="post" action="removeUserAdmin.php">
					<div class="form-group">
						<div class="row form-group">
							<div class="col-md-4">
								<label for="vat">Username</label>
								<select name="cbuser" id="activities" class="form-control">
									<?php
									global $connection;
									$query = "SELECT * FROM users";
									$results = mysqli_query( $connection, $query );
									while ( $row = mysqli_fetch_assoc( $results ) ) {
										echo( "<option value = '" . $row[ "userid" ] . "' >" . $row[ "username" ] . " (" . $row[ type ] . ") </option>" );
									}
									?>
								</select>
							</div>
						</div>
<!--						<label for="vat" class=" form-control-label">Faltu INfo</label><br>-->
						<button id="payment-button" type="submit" name="btnremove" class="btn btn-lg btn-info col-lg-2">Remove</button>
					</div>
				</form>
			</div>
		</div>
		<!-- .content -->
	</div>
</div>
<?php include( "adminDashboardFooter.php" ); ?>