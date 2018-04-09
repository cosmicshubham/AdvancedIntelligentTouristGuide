<?php
include_once( "loginHandler.php" );

session_start();
if ( isset( $_SESSION[ "userid" ] ) ) {
	$type = redirect( getUserType( $_SESSION[ "userid" ] ) );
	redirect( $type );
}
session_destroy();
?>


<?php include_once( "mainHeader.php" ); ?>
<div class="tab-content">
	<div class="tab-content-inner active" data-content="signup">
		<h3>Login</h3>
		<form method="post" action="loginHandler.php">


			<div class="row form-group">

				<div class="col-md-12">
					<?php 
					if (isset($_GET["status"])) {
						$status = $_GET["status"];
						if ($status == "wrong") {
							echo "Invalid User! Try Again";
						}
						else if ($status == "logout") {
							echo "Logout successful";
						}
						else if ($status == "expire") {
							echo "Session Expired";
						}
						
					}
					?>
				</div>


				<div class="col-md-12">
					<label>E-Mail</label><input type="text" name="username" id="e-mail" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<label>Password</label><input type="password" name="password" id="pass" class="form-control">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-12">
					<input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<a href="registration.php" ><input type="button" class="btn btn-primary btn-block" value="Register"></a>
				</div>
			</div>
			
		</form>
	</div>
</div>
<?php include_once( "mainFooter.php" ); ?>