<?php
include( "queryFunctions.php" );
if ( isset( $_POST[ "btnadd" ] ) ) {
	if ( addPlace( $_POST[ "tbplace" ], $_POST[ "tblatitudes" ], $_POST[ "tblongitudes" ] ) ) {
		header( "Location: adminAddPlaces.php?status=PlaceAdded" );
	} else {
		header( "Location: adminAddPlaces.php?status=SomethingWentWrong" );
	}

}
include( "adminDashboardHeader.php" );
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><?php 
					if (isset($_GET["status"])) {
						//var_dump($_GET);
						echo $_GET["status"];
					}
					?></h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Add Places</strong>
            </div>
            <div class="card-body card-block">
				<form method="post" action="adminAddPlaces.php">
                <div class="form-group">
                    <label for="vat" class=" form-control-label">Place Name</label>
                    <input type="text" id="vat" placeholder="Enter place name" name="tbplace" class="form-control col-lg-12">
                    <br>
                    <label for="vat" class=" form-control-label">Latitudes</label>
                    <input type="text" id="vat" placeholder="Enter latitudes" name="tblatitudes" class="form-control col-lg-12">
                    <br>
                    <label for="vat" class=" form-control-label">Longitudes</label>
                    <input type="text" id="vat" placeholder="Enter longitudes" name="tblongitudes" class="form-control col-lg-12">
                    <br>
                    <button id="payment-button" type="submit" name="btnadd" class="btn btn-lg btn-info col-lg-2">Add</button>
                </div>
				</form>
            </div>
        </div>
        <!-- .content -->
    </div>
</div>
<?php include( "adminDashboardFooter.php" ); ?>