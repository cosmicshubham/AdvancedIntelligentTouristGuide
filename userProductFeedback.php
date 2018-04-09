<?php
include( "sessionRedirector.php" );
include( "queryFunctions.php" );

$userid = $_SESSION[ "userid" ];


if ( isset( $_POST[ "btnupdate" ] ) ) {

	if ( updateUserProductRating( $userid, $_POST[ "cbrating" ], $_POST[ "formcomment" ] ) ) {
		header( "Location: userProductFeedback.php?status=feedbackUpdated" );
	} else {
		header( "Location: userProductFeedback.php?status=somethingWentWrong" );
	}

}

include( "userDashboardHeader.php" );

?>

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<?php 
					if (isset($_GET["status"])) {
						//var_dump($_GET);
						echo $_GET["status"];
					}
					?>
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
				<form method="post" action="userProductFeedback.php">
					<div class="form-group">

						<div class="row form-group">
							<div class="col-md-3">
								<label for="vat">Product Ratings</label>
								<select name="cbrating" id="activities" class="form-control">
									<?php
									for ( $i = 1; $i <= 10; $i++ ) {
										echo( "<option value='" . $i . "'>" . $i . "</option>" );
									}
									?>
								</select>
							</div>
						</div>

						<label for="vat" class=" form-control-label">Any Reviews</label>
						<input type="text" id="vat" placeholder="Enter your comments" name="formcomment" class="form-control col-lg-12">
						<br>
						<button id="payment-button" type="submit" name="btnupdate" class="btn btn-lg btn-info col-lg-2">Add/Update</button>
					</div>
				</form>
			</div>
		</div>
		<!-- .content -->
	</div>
</div>
<?php include( "userDashboardFooter.php" ); ?>