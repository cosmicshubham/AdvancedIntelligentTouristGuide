<?php
include( "sessionRedirector.php" );
include( "userDashboardHeader.php" );
$userid = $_SESSION[ "userid" ];

 ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
                 <?php echo "<h1>Welcome Standard User Id ".$userid ."</h1>"?>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-left">
					<li class="active">
						<?php //echo "User Id ".$userid ?>
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