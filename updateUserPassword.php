<?php
include( "queryFunctions.php" );
include( "sessionRedirector.php" );
$userid = $_SESSION[ "userid" ];
$type = getUserType( $userid );

if ( isset( $_POST[ "btnupdate" ] ) ) {
	if ( checkUserExist( $_POST[ "tbusername" ] ) ) {
		header ( "Location: updateUserPassword.php?status=UserNameAlreadyExist" );
	} else {
		if ( updateUserEmailPassword( $userid, $_POST[ "tbusername" ], $_POST[ "tbpassword1" ], $_POST[ "tbpassword2" ] ) ) {
			header( "Location: updateUserPassword.php?status=PasswordUpdated" );
		} else {
			header( "Location: updateUserPassword.php?status=somethingWentWrong" );
		}
	}
}
if ( $type == "admin" ) {
	include( "adminDashboardHeader.php" );
} else {
	include( "userDashboardHeader.php" );
}

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
			<div class="card-header"><strong>Update Password</strong>
			</div>
			<div class="card-body card-block">
				<form method="post" action="updateUserPassword.php">
					<div class="form-group">
						<label for="vat" class=" form-control-label">Username</label>
						<input type="text" id="vat" placeholder="Enter user name" name="tbusername" class="form-control col-lg-12">
						<br>
						<label for="vat" class=" form-control-label">New Password</label>
						<input type="password" id="vat" placeholder="Enter password" name="tbpassword1" class="form-control col-lg-12">
						<br>
						<label for="vat" class=" form-control-label">Confirm Password</label>
						<input type="password" id="vat" placeholder="Enter password" name="tbpassword2" class="form-control col-lg-12">
						<br>
						<button id="payment-button" type="submit" name="btnupdate" class="btn btn-lg btn-info col-lg-3">Update Password</button>
					</div>
				</form>
			</div>
		</div>
		<!-- .content -->
	</div>
</div>
<?php
if ( $type == "admin" ) {
	include( "adminDashboardFooter.php" );
} else {
	include( "userDashboardFooter.php" );
}




?>