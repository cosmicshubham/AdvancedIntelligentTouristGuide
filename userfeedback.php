<?php
include( "sessionRedirector.php" );
include( "queryFunctions.php" );

$userid = $_SESSION[ "userid" ];

if ( isset( $_POST[ "btnadd" ] ) ) {
	if ( checkUserPlaceFeedbackExist( $userid, $_POST[ "cbplace" ] ) ) {
		header( "Location: userfeedback.php?status=feedbackAlreadyExist" );
	} else {
		if ( addUserPlaceFeedback( $userid, $_POST[ "cbplace" ], $_POST[ "cbrating" ], $_POST[ "formcomment" ] ) ) {
			header( "Location: userfeedback.php?status=feedbackAdded" );
		} else {
			header( "Location: userfeedback.php?status=somethingWentWrong" );
		}
	}
}

if ( isset( $_POST[ "btnupdate" ] ) ) {
	if ( !checkUserPlaceFeedbackExist( $userid, $_POST[ "cbplace" ] ) ) {
		header( "Location: userfeedback.php?status=feedbackDoesNotExist" );
	} else {
		if ( updateUserPlaceFeedback( $userid, $_POST[ "cbplace" ], $_POST[ "cbrating" ], $_POST[ "formcomment" ] ) ) {
			header( "Location: userfeedback.php?status=feedbackUpdated" );
		} else {
			header( "Location: userfeedback.php?status=somethingWentWrong" );
		}
	}
}

if ( isset( $_POST[ "btnremove" ] ) ) {
	if ( !checkUserPlaceFeedbackExist( $userid, $_POST[ "cbplace" ] ) ) {
		header( "Location: userfeedback.php?status=feedbackDoesNotExist" );
	} else {
		if ( removeUserPlaceFeedback( $userid, $_POST[ "cbplace" ] ) ) {
			header( "Location: userfeedback.php?status=feedbackRemoved" );
		} else {
			header( "Location: userfeedback.php?status=somethingWentWrong" );
		}
	}
}
include( "userDashboardHeader.php" );

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
			<div class="card-header"><strong>User Feedback</strong>
			</div>
			<div class="card-body card-block">
				<form method="post" action="userfeedback.php">
					<div class="form-group">
						<label for="vat" class=" form-control-label">Place Name</label>
						<br>
						<select name="cbplace" id="activities" class="form-control">
							<?php
							global $connection;
							$query = "SELECT * FROM places";
							$results = mysqli_query( $connection, $query );
							while ( $row = mysqli_fetch_assoc( $results ) ) {
								echo( "<option value = '" . $row[ "placeid" ] . "' >" . $row[ "placename" ] . " </option>" );
							}
							?>
						</select>
						<br>
						<div class="row form-group">
							<div class="col-md-3">
								<label for="vat">Place Ratings</label>
								<select name="cbrating" id="activities" class="form-control">
									<?php
									for ( $i = 1; $i <= 10; $i++ ) {
										echo( "<option value='" . $i . "'>" . $i . "</option>" );
									}
									?>
								</select>
							</div>
						</div>

						<label for="vat" class=" form-control-label">Any Comments</label>
						<input type="text" id="vat" placeholder="Enter your comments" name="formcomment" class="form-control col-lg-12">
						<br>
						<button id="payment-button" type="submit" name="btnadd" class="btn btn-lg btn-info col-lg-2">Add</button>
						<button id="payment-button" type="submit" name="btnupdate" class="btn btn-lg btn-info col-lg-2">Update</button>
						<button id="payment-button" type="submit" name="btnremove" class="btn btn-lg btn-info col-lg-2">Remove</button>
					</div>
				</form>
			</div>
		</div>
		<!-- .content -->
	</div>
</div>
<?php include( "userDashboardFooter.php" ); ?>