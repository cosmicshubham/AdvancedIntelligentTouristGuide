<?php include( "mainHeader.php" ); ?>

<div class="tab-content">
	<div class="tab-content-inner active" data-content="signup">
		<h3>Register</h3>
		<form action="#">
			<div class="row form-group">
				<div class="col-md-12">
					<label for="fullname">Your Name</label>
					<input type="text" id="fullname" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<label for="activities">Activities</label>
					<select name="#" id="activities" class="form-control">
						<option value="">Activities</option>
						<option value="">Hiking</option>
						<option value="">Caving</option>
						<option value="">Swimming</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<label for="destination">Destination</label>
					<select name="#" id="destination" class="form-control">
						<option value="">Himachal</option>
						<option value="">Leh Ladakh</option>
						<option value="">Goa</option>
						<option value="">Kerela</option>
					</select>
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-12">
					<label>E-Mail</label><input type="text" id="e-mail" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<label>Password</label><input type="password" id="pass" class="form-control">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-12">
					<input type="submit" class="btn btn-primary btn-block" value="Submit">
				</div>
			</div>
		</form>
	</div>


</div>
<?php include( "mainFooter.php" ); ?>