<?php

include( "queryFunctions.php" );
include( "sessionRedirector.php" );
$userid = $_SESSION[ "userid" ];
$type = getUserType( $userid );
include( "foursquareHelper.php" );

if ( !isset( $_POST[ "btnSearch" ] ) ) {
	header( "Location: adminindex.php" );
}
if ( $type == "admin" ) {
	include( "adminDashboardHeader.php" );
} else {
	include( "userDashboardHeader.php" );
}
global $connection;
$query = "SELECT * FROM places WHERE placeid = " . $_POST["cbplaces"];
$results = mysqli_query( $connection, $query );
$row = mysqli_fetch_assoc( $results );

$lat = $row["lattitude"];
$long = $row[ "longitude" ];
$name = $row[ "placename" ];
$radius = 20000;


?>

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
						
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3"> </div>
<?php

$resultFrom4s = getVenuesListUsingLatLng( $lat, $long, $radius );
foreach ( $resultFrom4s as $i ) {
	//$resultFromPhotos = getPhotos($i['id']);
	//echo($resultFromPhotos);
	echo( "
			<div class='col-xl-4 col-lg-3'>
        		<div class='card'>
            		<div class='card-body'>
                <div class='stat-widget-one'>
                    <div>" );
	echo( "         <div class='stat-text '><h6><strong>" . $i[ 'name' ] . "<strong></h6></div><br>" );
	echo( "         <div><img alt='image' src='" . getPhotoSingle( $i[ 'id' ] ) . "'/></div><br/>" );
	echo( "</div>
                    <div class='stat-content dib'>" );
	if ( isset( $i[ 'city' ] ) ) {
		echo( "         <div class='stat-text '><strong>Address : </strong></div>" );
		$add = $i[ "city" ].' '.$i['country'];
        //$addr=explode(" ",$add);
        //$address=implode(' ',array_slice($addr, 0)).', India';   
        //$add
	} else
		$add = "<br>";



	echo( "         <div class='stat-text'><mark>" . $add . "<mark></div>" );
	echo( "         <div class='stat-text '><strong> Ratings : </strong></div>" );
	echo( "         <div class='stat-text'><mark>" . $i[ 'rating' ] . "<mark></div>" );
	echo( "
                        
                    </div>
                </div>
            </div>
        </div>
    </div>" );





}

?>
</div>
<?php
if ( $type == "admin" ) {
	include( "adminDashboardFooter.php" );
} else {
	include( "userDashboardFooter.php" );
}
