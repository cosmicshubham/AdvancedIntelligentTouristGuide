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
					<input type="submit" name="submit" onClick="return validateForm()" class="btn btn-primary btn-block" value="Submit">
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-12">
					<a href="login.php" ><input type="button" class="btn btn-primary btn-block" value="Login"></a>
				</div>
			</div>
		</form>
	</div>
	<script>
		function validateForm() 
        {
            var name = document.getElementByName("formname").value;
            var pass = document.getElementsByName("formpassword").value;
            var cnfpass = document.getElementsByName("formcnfpassword").value;
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if ( name == null || name==="",pass == null || pass==="",cnfpass== null || cnfpass==="" ) {
				alert( "Please Fill All Required Field" );
                //document.getElementById("out").innerHTML="Please Fill All Required Field"   ;
				return false;
			} 
            else {
				if ( reg.test( name ) == false && reg ) {
					alert( "Invalid email" );
                   //document.getElementById("out").innerHTML="Invalid email";
					return false;
				}
				if ( pass != cnfpass ){
					alert( "Password and Confirm Password Different" );
                    //document.getElementById("out").innerHTML="Passwords are Different";
                    return false;
			 }
            }
			return true;
		}
} 
	</script>


</div>
<?php include( "mainFooter.php" ); ?>