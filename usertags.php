<?php
session_start();
$loginUser = $_SESSION[ "user" ];
if ( isset( $_GET[ "status" ] ) ) {
	$status = $_GET[ "status" ];
} else {
	$status = "";
}

$username = "aitgadmin";
$password = "aitgadmin";
$dbname = "aitgdb";
$dbhost = "localhost";
$connection = mysqli_connect( $dbhost, $username, $password, $dbname );



if ( mysqli_connect_errno() ) {
	die( "Database connection failed: " . mysqli_connect_error() . mysqli_connect_errno() );
}

$query = "SELECT * FROM tags";
$results = mysqli_query( $connection, $query );

if ( isset( $_POST[ "add" ] ) ) {


	$tagid = $_POST[ "formtags" ];
	$useridquery = "SELECT * FROM users WHERE username = '" . $loginUser . "'";
	$resultid = mysqli_query( $connection, $useridquery );
	$rowuserid = mysqli_fetch_assoc( $resultid );
	$userid = $rowuserid[ "userid" ];

	$queryInsert = "INSERT INTO usertags (userid, tagid ) VALUES (" . $userid . ", " . $tagid . " )";
	if ( mysqli_query( $connection, $queryInsert ) ) {
		$status = "tag updated";
	} else {
		echo "error";
	}

	if ( !mysqli_query( $connection, "SELECT * FROM usertags WHERE userid = " . $userid . " AND tagid = " . $tagid ) ) {

	}


}

?>


<?php include( "userDashboardHeader.php" ); ?>

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>
					<?php echo $status ?>
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
			<div class="card-header"><strong>User Tags</strong>
			</div>
			<div class="card-body card-block">
				<form method="post" action="usertags.php">
					<div class="form-group">
						<label for="vat" class=" form-control-label">Add User Interest Tags</label>
						<select name="formtags" id="activities" class="form-control">

							<?php

							while ( $row = mysqli_fetch_assoc( $results ) ) {
								echo( "<option value = '" . $row[ "tagid" ] . "' >" . $row[ "tagname" ] . "</option>" );
							}
							?>
						</select> <br>
						<button id="payment-button" type="submit" name="add" class="btn btn-lg btn-info col-lg-2"> <i class="fa fa-lg">Add</button>
						<button id="payment-button" type="submit" name="remove" class="btn btn-lg btn-info col-lg-2">Remove</button>
					</div>
				</form>
			</div>
		</div>
		<!-- .content -->
	</div>
	<?php include( "userDashboardFooter.php" ); ?>