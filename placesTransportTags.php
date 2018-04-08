<?php
//if ( !isset( $_GET[ "placeid" ] ) ){
//	header( "Location: adminindex.php" );
//}
if ( !isset( $_GET[ "placeid" ] ) ) {
	header( "Location: adminindex.php" );
}

$placeidCurrent = $_GET[ "placeid" ];

include( "queryFunctions.php" );

if ( isset( $_POST[ "btnRemovePlaces" ] ) ) {

		if ( removePlace( $placeidCurrent )) {
			header( "Location: adminindex.php?status=placesRemoved");
		} else {
			header( "Location: placesTransportTags.php?status=SomethingIsWrong&placeid=" . $placeidCurrent );
		}

}

if ( isset( $_POST[ "btnremoveTag" ] ) ) {

	if ( !checkPlaceTagExist( $placeidCurrent, $_POST[ "cbtags" ] ) ) {
		header( "Location: placesTransportTags.php?status=TagNotExist&placeid=" . $placeidCurrent );
	} else {
		if ( removeTagFromPlace( $placeidCurrent, $_POST[ "cbtags" ] ) ) {
			header( "Location: placesTransportTags.php?status=TagRemoved&placeid=" . $placeidCurrent );
		} else {
			header( "Location: placesTransportTags.php?status=SomethingIsWrong&placeid=" . $placeidCurrent );
		}
	}

}
if ( isset( $_POST[ "btnaddTag" ] ) ) {


	if ( checkPlaceTagExist( $placeidCurrent, $_POST[ "cbtags" ] ) ) {
		header( "Location: placesTransportTags.php?status=TagAlreadyExist&placeid=" . $placeidCurrent );
	} else {
		if ( addTagToPlace( $placeidCurrent, $_POST[ "cbtags" ], $_POST[ "cbweight" ] ) ) {
			header( "Location: placesTransportTags.php?status=TagAdded&placeid=" . $placeidCurrent );
		} else {
			header( "Location: placesTransportTags.php?status=SomethingIsWrong&placeid=" . $placeidCurrent );
		}
	}


}
if ( isset( $_POST[ "btnremoveTransport" ] ) ) {

	if ( !checkPlaceTransportExist( $placeidCurrent, $_POST[ "cbTransports" ] ) ) {
		header( "Location: placesTransportTags.php?status=TransportNotExist&placeid=" . $placeidCurrent );
	} else {
		if ( removeTransportFromPlace( $placeidCurrent, $_POST[ "cbTransports" ] ) ) {
			header( "Location: placesTransportTags.php?status=TransportRemoved&placeid=" . $placeidCurrent );
		} else {
			header( "Location: placesTransportTags.php?status=SomethingIsWrong&placeid=" . $placeidCurrent );
		}
	}


}
if ( isset( $_POST[ "btnaddTransport" ] ) ) {

	if ( checkPlaceTransportExist( $placeidCurrent, $_POST[ "cbTransports" ] ) ) {
		header( "Location: placesTransportTags.php?status=TransportAlreadyExist&placeid=" . $placeidCurrent );
	} else {

		if ( addTransportToPlace( $placeidCurrent, $_POST[ "cbTransports" ] ) ) {
			header( "Location: placesTransportTags.php?status=TransportAdded&placeid=" . $placeidCurrent );
		} else {
			header( "Location: placesTransportTags.php?status=SomethingIsWrong&placeid=" . $placeidCurrent );
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
			<div class="card-header"><strong>Remove Place</strong>
			</div>
			<div class="card-body card-block">

				<?php
				echo( "<form method='post' action='placesTransportTags.php?placeid=" . $placeidCurrent . "'>" );
				?>
				<div class="form-group">
					<label for="vat" class=" form-control-label">Remove this place</label>
					<br>
					<button id="payment-button" type="submit" name="btnRemovePlaces" class="btn btn-lg btn-info col-lg-2">Remove</button>

				</div>
				</form>
			</div>
			</form>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><strong>Update Places Tags</strong>
			</div>
			<div class="card-body card-block">

				<?php
				echo( "<form method='post' action='placesTransportTags.php?placeid=" . $placeidCurrent . "'>" );
				?>
				<div class="form-group">
					<label for="vat" class=" form-control-label">Add your Tags</label>
					<input type="text" id="vat" placeholder="Current Tags" name="tbtransport" class="form-control col-lg-12">
					<br>
					<select name="cbtags" id="activities" class="form-control">
						<?php
						global $connection;
						$query = "SELECT * FROM tags";
						$results = mysqli_query( $connection, $query );
						while ( $row = mysqli_fetch_assoc( $results ) ) {
							echo( "<option value = '" . $row[ "tagid" ] . "' >" . $row[ "tagname" ] . " </option>" );
						}
						?>
					</select>
					<label for="vat">Weight</label>
					<select name="cbweight" id="activities" class="form-control">
						<?php
						for ( $i = 1; $i <= 10; $i++ ) {
							echo( "<option value='" . $i . "'>" . $i . "</option>" );
						}
						?>
					</select>
					<br>
					<button id="payment-button" type="submit" name="btnaddTag" class="btn btn-lg btn-info col-lg-2">Add</button>
					<button id="payment-button" type="submit" name="btnremoveTag" class="btn btn-lg btn-info col-lg-2">Remove</button>


				</div>
				</form>
			</div>
		</div>

	</div>

	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><strong>Update Places' Transport</strong>
			</div>
			<div class="card-body card-block">
				<?php
				echo( "<form method='post' action='placesTransportTags.php?placeid=" . $placeidCurrent . "'>" );
				?>
				<div class="form-group">
					<label for="vat" class=" form-control-label">Current Transport</label>
					<input type="text" id="vat" placeholder="Current Transports" name="tbtransport" class="form-control col-lg-12">
					<br>
					<div class="row form-group">
						<div class="col-md-4">
							<label for="vat">Transportation Availability</label>
							<select name="cbTransports" id="activities" class="form-control">
								<?php
								global $connection;
								$query = "SELECT * FROM transports";
								$results = mysqli_query( $connection, $query );
								while ( $row = mysqli_fetch_assoc( $results ) ) {
									echo( "<option value = '" . $row[ "transportid" ] . "' >" . $row[ "transportname" ] . " </option>" );
								}
								?>
							</select>
						</div>
					</div>
					<button id="payment-button" type="submit" name="btnaddTransport" class="btn btn-lg btn-info col-lg-2">Add</button>
					<button id="payment-button" type="submit" name="btnremoveTransport" class="btn btn-lg btn-info col-lg-2">Remove</button>
				</div>
				</form>
			</div>
		</div>
	</div>

</div>

<!-- .content -->
<?php include( "adminDashboardFooter.php" ); ?>