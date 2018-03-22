<?php include( "mainHeader.php" ); ?>
<div class="tab-content">
	<div class="tab-content-inner active" data-content="signup">
		<h3>Login</h3>
		<form method="post" action="userindexTest.php">


			<div class="row form-group">
				
				<div class="col-md-12">
					<?php 
					if (isset($_GET["status"])) {
						echo "Invalid User! Try Again";
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
					<a href="adminindex.php"><input type="button" class="btn btn-primary btn-block" value="Admin User Temp"></a>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<a href="userindex.php"><input type="button" class="btn btn-primary btn-block" value="User Admin Temp"></a>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include( "mainFooter.php" ); ?>