<?php
include( "sessionRedirector.php" );
include("queryFunctions.php");

if (!isset( $_GET[ "targetuserid" ] ) ) {
	header ("Location: adminindex.php?status=SomethingWentWrong");
}

$query = "SELECT uname, gender, aadharid, dob, phone, address FROM users WHERE userid = '" . $_GET[ "targetuserid" ] . "'";
$results = mysqli_query( $connection, $query );
//	$uname = $row[ 'uname' ];
//	$gender = $row[ "gender" ];
//	$aadharid = $row[ "aadharid" ];
//	$dob = $row[ "dob" ];
//	$phone = $row[ "phone" ];
//	$address = $row[ "address" ];




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
				<?php $row = mysqli_fetch_assoc( $results ); ?>
                <label for="vat" class=" form-control-label">User Id</label>
						<input type="text" id="vat" name="tbuserid" value='<?php $row[ "username"' ]; ?>' class="form-control col-lg-12" readonly>
						
                    <label for="vat" class=" form-control-label">Username</label>
						<input type="text" id="vat"  name="tbusername" class="form-control col-lg-12" readonly>
						
                    <label for="vat" class=" form-control-label">Name</label>
						<input type="text" id="vat"  name="tbname" class="form-control col-lg-12" readonly>
						
                    <label for="vat" class=" form-control-label">Gender</label>
						<input type="text" id="vat" name="tbgender" class="form-control col-lg-12" readonly>
						
                    <label for="vat" class=" form-control-label">Aadhar No.</label>
						<input type="text" id="vat"  name="tbaadhar" class="form-control col-lg-12" readonly>
						 
                    <label for="vat" class=" form-control-label">Date Of Birth</label>
						<input type="text" id="vat" name="tbdob" class="form-control col-lg-12" readonly>
					
                    <label for="vat" class=" form-control-label">Phone No.</label>
						<input type="text" id="vat" name="tbphone" class="form-control col-lg-12" readonly>
						
                    <label for="vat" class=" form-control-label">Address</label>
						<input type="text" id="vat" name="tbaddress" class="form-control col-lg-12" readonly>
						<br> 

				</div>
			</div>
			</form>
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
					<input type="text" id="vat" name="tbapprating" class="form-control col-lg-12" readonly>
					
                    <label for="vat" class=" form-control-label">Comment</label>
					<input type="text" id="vat" name="tbappcomment" class="form-control col-lg-12" readonly>
					
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
				//echo( "<form method='post' action='placesTransportTags.php?placeid=" . $placeidCurrent . "'>" );
				?>
				<div class="form-group">
					<label for="vat" class=" form-control-label">Place Name</label>
					<input type="text" id="vat" name="tbplacename" class="form-control col-lg-12" readonly>
					<br>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- .content -->
<?php include( "adminDashboardFooter.php" ); ?>