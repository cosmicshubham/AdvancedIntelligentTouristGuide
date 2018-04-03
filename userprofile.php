<?php
session_start();
$loginUser = $_SESSION[ "user" ];
if ( isset( $_GET[ "status" ] ) ) {
	$status = $_GET[ "status" ];
} else {
	$status = "";
}
?>

<?php
$username = "aitgadmin";
$password = "aitgadmin";
$dbname = "aitgdb";
$dbhost = "localhost";
$connection = mysqli_connect( $dbhost, $username, $password, $dbname );



if ( mysqli_connect_errno() ) {
	die( "Database connection failed: " . mysqli_connect_error() . mysqli_connect_errno() );
}

if ( isset( $_POST[ "submit" ] ) ) {


	$uname = $_POST[ "formname" ];
	$gender = $_POST[ "formgender" ];
	$aadharid = $_POST[ "formaadhar" ];
	$dob = $_POST[ "formdob" ];
	$phone = $_POST[ "formphone" ];
	$address = $_POST[ "formaddress" ];


	$query = "UPDATE users SET uname = '" . $uname . "', gender = '" . $gender . "', aadharid = '" . $aadharid . "', dob = '" . $dob . "', phone = '" . $phone . "', address = '" . $address . "' WHERE username = '" . $loginUser . "'";
	$results = mysqli_query( $connection, $query );

	if ( !$results || mysqli_affected_rows( $connection ) != 1 ) {
		$status = "error!";
	} else {
		$status = "updated!";
	}
} else {
	$query = "SELECT uname, gender, aadharid, dob, phone, address FROM users WHERE username = '" . $loginUser . "'";
	$results = mysqli_query( $connection, $query );
	;
	if ( $row = mysqli_fetch_assoc( $results )) {
		$uname = $row['uname'];
		$gender = $row[ "gender" ];
		$aadharid = $row[ "aadharid" ];
		$dob = $row[ "dob" ];
		$phone = $row[ "phone" ];
		$address = $row[ "address" ];
		
	} else {
		header( "Location: login.php?status=wrong" );
	}

}



?>





<?php


include( "userDashboardHeader.php" );
?>

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
					<li class="active"><?php echo $loginUser; ?></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header"><strong>User Preferences</strong>
			</div>
			<div class="card-body card-block">
				<form method="post" action="userprofile.php">
					<div class='form-group'>
						<label for='company' class=' form-control-label'>Name</label>
						<?php echo ("<input type='text' id='company' value= '". $uname . "' name='formname' class='form-control'>"); ?>
					</div>
					<div class='form-group'>
						<label for='vat' class=' form-control-label'>Gender</label>
						<?php echo ("<input type='text' id='vat' value= '". $gender . "' placeholder='Enter your gender' name='formgender' class='form-control col-lg-12'>"); ?>
						<br>
						<label for='vat' class=' form-control-label'>Aadhar Id</label>
						<?php echo ("<input type='text'id='vat1' value= '". $aadharid . "' placeholder='Enter your Aadhar id' name='formaadhar' class='form-control col-lg-12'>"); ?>
						<br>
						<label for='vat' class=' form-control-label'>Date of Birth</label>
						<?php echo ("<input type='date' id='vat2' value= '". $dob . "' placeholder='Enter your Date of Birth' name='formdob' class='form-control col-lg-12'>"); ?>
						<br>
						<div class='form-group'>
							<label for='street' class=' form-control-label'>Phone number</label>
							<?php echo ("<input type='text' id='street' value= '". $phone . "' placeholder='Enter your phone number' name='formphone' class='form-control'>"); ?>
						</div>
						<div class='form-group'>
							<label for='city' class=' form-control-label'>Address</label>
							<?php echo ("<input type='textarea' row='5' col='50' id='city' value= '". $address . "' placeholder='Your Address' name='formaddress' class='form-control'>"); ?>
						</div>
						<button id='payment-button' name='submit' type='submit' class='btn btn-lg btn-info col-lg-2'> <i class='fa fa-lg'></i>&nbsp; <span id='payment-button-amount'>Update</span> <span id='payment-button-sending' style='display:none;'>Sending…</span> </button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<!-- .content --> 
</div>
<?php include( "userDashboardFooter.php" ); ?>