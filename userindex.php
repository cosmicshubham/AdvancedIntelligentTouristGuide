<?php
session_start();

if ( isset( $_SESSION[ "userid" ] ) ) {
	$userid = $_SESSION[ "userid" ];
} else {
	header( "Location: login.php?status=expire" );
}


?>
<?php include( "userDashboardHeader.php" ); ?>

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Welcome</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">
						<?php echo $userid ?>
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3"> </div>
<!-- .content --> 
</div>
<?php include( "userDashboardFooter.php" ); ?>