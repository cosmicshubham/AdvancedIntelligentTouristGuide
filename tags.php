<?php
include( "sessionRedirector.php" );
include( "queryFunctions.php" );
if ( isset( $_POST[ "btnremove" ] ) ) {
	if ( removeTag( $_POST[ "cbtags" ] ) ) {
		header( "Location: tags.php?status=TagRemoved" );
	} else {
		header( "Location: tags.php?status=SomethingWentWrong" );
	}

}
if ( isset( $_POST[ "btnadd" ] ) ) {
	if ( addTag( $_POST[ "tbtag" ] ) ) {
		header( "Location: tags.php?status=TagAdded" );
	} else {
		header( "Location: tags.php?status=SomethingWentWrong" );
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
			<div class="card-header"><strong>Add or Remove Tag</strong>
			</div>
			<div class="card-body card-block">
				<form method="post" action="tags.php">
					<div class="form-group">
						<label for="vat" class=" form-control-label">Add Tags</label>
						<input type="text" id="vat" placeholder="Enter tag" name="tbtag" class="form-control col-lg-12">
						<br>
						<button id="payment-button" type="submit" name="btnadd" class="btn btn-lg btn-info col-lg-2">Add</button>

						<br/>
						<br/>
						<div class="row form-group">
							<div class="col-md-4">
								<label for="vat">Remove Tag</label>
								<select name="cbtags" id="activities" class="form-control">
									<?php
									global $connection;
									$query = "SELECT * FROM tags ORDER BY tagname";
									$results = mysqli_query( $connection, $query );
									while ( $row = mysqli_fetch_assoc( $results ) ) {
										echo( "<option value = '" . $row[ "tagid" ] . "' >" . $row[ "tagname" ] . " </option>" );
									}
									?>
								</select>
							</div>
						</div>
						<button id="payment-button" type="submit" name="btnremove" class="btn btn-lg btn-info col-lg-2">Remove</button>
					</div>
				</form>
			</div>
		</div>
		<!-- .content -->
	</div>
</div>
<?php include( "adminDashboardFooter.php" ); ?>