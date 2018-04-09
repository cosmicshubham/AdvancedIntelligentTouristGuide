<?php
include( "sessionRedirector.php" );
include( "queryFunctions.php" );

if ( !isset( $_GET[ "targetuserid" ] ) ) {
	header( "Location: adminindex.php?status=SomethingWentWrong" );
}


//	$uname = $row[ 'uname' ];
//	$gender = $row[ "gender" ];
//	$aadharid = $row[ "aadharid" ];
//	$dob = $row[ "dob" ];
//	$phone = $row[ "phone" ];
//	$address = $row[ "address" ];


$queryInfo = "SELECT * FROM users WHERE userid = " . $_GET[ "targetuserid" ];
$resultsInfo = mysqli_query( $connection, $queryInfo );

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
			<div class="card-header"><strong>User Basic Info</strong>
			</div>
			<div class="card-body card-block">

				<?php
				//echo( "<form method='post' action='placesTransportTags.php?placeid=" . $placeidCurrent . "'>" );
				?>
				<div class="form-group">
					<?php


					$row = mysqli_fetch_assoc( $resultsInfo );



					?>
					<label for="vat" class=" form-control-label">User Id</label>
					<input type="text" id="vat" name="tbuserid" value='<?php echo $row[ "userid" ]; ?>' class="form-control col-lg-12" readonly>

					<label for="vat" class=" form-control-label">Username</label>
					<input type="text" id="vat" name="tbusername" value='<?php echo $row[ "username" ]; ?>' class="form-control col-lg-12" readonly>

					<label for="vat" class=" form-control-label">Name</label>
					<input type="text" id="vat" name="tbname" value='<?php echo $row[ "uname" ]; ?>' class="form-control col-lg-12" readonly>

					<label for="vat" class=" form-control-label">Gender</label>
					<input type="text" id="vat" name="tbgender" value='<?php echo $row[ "gender" ]; ?>' class="form-control col-lg-12" readonly>

					<label for="vat" class=" form-control-label">Aadhar No.</label>
					<input type="text" id="vat" name="tbaadhar" value='<?php echo $row[ "aadharid" ]; ?>' class="form-control col-lg-12" readonly>

					<label for="vat" class=" form-control-label">Date Of Birth</label>
					<input type="date" id="vat" name="tbdob" value='<?php echo $row[ "dob" ]; ?>' class="form-control col-lg-12" readonly>

					<label for="vat" class=" form-control-label">Phone No.</label>
					<input type="text" id="vat" name="tbphone" value='<?php echo $row[ "phone" ]; ?>' class="form-control col-lg-12" readonly>

					<label for="vat" class=" form-control-label">Address</label>
					<input type="text" id="vat" name="tbaddress" value='<?php echo $row[ "address" ]; ?>' class="form-control col-lg-12" readonly>
					<br>

				</div>
			</div>
			</form>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><strong>User Tags</strong>
			</div>
			<div class="card-body card-block">

				<?php
				//echo( "<form method='post' action='placesTransportTags.php?placeid=" . $placeidCurrent . "'>" );
				?>
				<div class="form-group">
					<input type="text" id="vat" value='<?php echo implode(", ", getCurrentUserTags($_GET[ "targetuserid" ])); ?>' class="form-control col-lg-12" readonly>


				</div>
			</div>
		</div>

	</div>

	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><strong>User App Rating</strong>
			</div>
			<div class="card-body card-block">

				<?php
				//echo( "<form method='post' action='placesTransportTags.php?placeid=" . $placeidCurrent . "'>" );
				?>
				<div class="form-group">
					<label for="vat" class=" form-control-label">Application Rating</label>
					<input type="text" id="vat" name="tbapprating" value='<?php echo $row[ "apprating" ]; ?>' class="form-control col-lg-12" readonly>

					<label for="vat" class=" form-control-label">Comment</label>
					<input type="text" id="vat" name="tbappcomment" value='<?php echo $row[ "comment" ]; ?>' class="form-control col-lg-12" readonly>

					<br>


				</div>
			</div>
		</div>

	</div>

	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><strong>User Place Rating</strong>
			</div>
			<div class="card-body card-block">
				<?php
				$queryPlaceRating = "SELECT placename, placerating, comment FROM userplacerating, places WHERE userplacerating.placeid = places.placeid AND userid = " . $_GET[ "targetuserid" ];
				$resultsPlaceRating = mysqli_query( $connection, $queryPlaceRating );
				while ( $rowPlaceRating = mysqli_fetch_assoc( $resultsPlaceRating ) ) {
					echo( "<div class='form-group'>" );
					echo( "<label for='vat' class=' form-control-label'> " . $rowPlaceRating[ "placename" ] . "</label>" );
					echo( "<input type='text' id='vat' value='" . $rowPlaceRating[ "placerating" ] . "   |   " . $rowPlaceRating[ "comment" ] . "'class='form-control col-lg-12' readonly>" );
					echo( "<br>" );

				}
				?>
				<!--
				<div class='form-group'>
					<label for='vat' class=' form-control-label'>Place Name</label>
					<input type='text' id='vat' name='tbplacename' class='form-control col-lg-12' readonly>
					<br>
				</div>
-->
			</div>
		</div>
	</div>

</div>

<!-- .content -->
<?php include( "adminDashboardFooter.php" ); ?>