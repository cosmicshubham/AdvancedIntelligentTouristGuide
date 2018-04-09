<?php
include( "registrationHandler.php" );
session_start();
if ( isset( $_SESSION[ "userid" ] ) ) {
	$type = redirect( getUserType( $_SESSION[ "userid" ] ) );
	redirect( $type );
}
session_destroy();

?>
<?php include( "mainHeader.php" ); ?>

<div class="tab-content">
	<div class="tab-content-inner active" data-content="signup">
		<h3>Register</h3>
		<form action="registrationHandler.php"  method="post">
			<div class="row form-group">
				<div class="col-md-12">
					<?php 
					if (isset($_GET["status"])) {
							echo $_GET["status"];
					}
					?>
				</div>
                <div class="col-md-12">
					<label id="out"></label>
				</div>
				<div class="col-md-12">
					<label>E-Mail</label><input type="text" id="e-mail" name="formname" class="form-control">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-12">
					<label>Password</label><input type="password" id="pass" name="formpassword" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<label>Confirm Password</label><input type="password" id="pass" name="formcnfpassword" class="form-control">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-12">
					<input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-12">
					<a href="login.php" ><input type="button" class="btn btn-primary btn-block" value="Login"></a>
				</div>
			</div>
		</form>
	</div>



</div>
<?php include( "mainFooter.php" ); ?>