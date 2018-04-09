<?php
include( "sessionRedirector.php" );
include( "queryFunctions.php" );
$userid = $_SESSION[ "userid" ];

if ( isset( $_POST[ "add" ] ) ) {
	if ( checkUserTagExist( $userid, $_POST[ "formtags" ] ) ) {
		header( "Location: usertags.php?status=TagsAlreadyExist" );
	} else {
		if ( addTagToUser( $userid, $_POST[ "formtags" ] ) ) {
			header( "Location: usertags.php?status=TagUpdated" );
		} else {
			header( "Location: usertags.php?status=somethingWentWrong" );
		}
	}
}

if ( isset( $_POST[ "remove" ] ) ) {

	if ( !checkUserTagExist( $userid, $_POST[ "formtags" ] ) ) {
		header( "Location: usertags.php?status=TagsDoesNotExist" );
	} else {
		if ( removeTagFromUser( $userid, $_POST[ "formtags" ] ) ) {
			header( "Location: usertags.php?status=TagRemoved" );
		} else {
			header( "Location: usertags.php?status=somethingWentWrong" );
		}
	}
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
			<div class="card-header"><strong>User Tags</strong>
			</div>
			<div class="card-body card-block">
				<form method="post" action="usertags.php">
					<div class="form-group">
						
						
						<label for="vat" class=" form-control-label">Current Tags</label>
						<input type="text" id="vat" value='<?php echo implode(", ", getCurrentUserTags($userid)); ?>' class="form-control col-lg-12" readonly>
						<br>
						
						<label for="vat" class=" form-control-label">Add User Interest Tags</label>
						<select name="formtags" id="activities" class="form-control">

							<?php
							global $connection;
							$query = "SELECT * FROM tags";
							$results = mysqli_query( $connection, $query );
							while ( $row = mysqli_fetch_assoc( $results ) ) {
								echo( "<option value = '" . $row[ "tagid" ] . "' >" . $row[ "tagname" ] . "</option>" );
							}
							?>
						</select> <br>
						<button id="payment-button" type="submit" name="add" class="btn btn-lg btn-info col-lg-2"> Add</button>
						<button id="payment-button" type="submit" name="remove" class="btn btn-lg btn-info col-lg-2">Remove</button>
					</div>
				</form>
			</div>
		</div>
		<!-- .content -->
	</div>
	<?php include( "userDashboardFooter.php" ); ?>