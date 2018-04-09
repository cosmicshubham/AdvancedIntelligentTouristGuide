<?php

$username = "aitgadmin";
$password = "aitgadmin";
$dbname = "aitgdb";
$dbhost = "localhost";
$connection = mysqli_connect( $dbhost, $username, $password, $dbname );

if ( mysqli_connect_errno() ) {
	die( "Database connection failed: " . mysqli_connect_error() . mysqli_connect_errno() );
}



?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AITG</title>
	<meta name="description" content="Sufee Admin - HTML5 Admin Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-icon.png">
	<link rel="icon" href="images/logo.png" type="image/x-icon"/>
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/flag-icon.min.css">
	<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
	<!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
	<link rel="stylesheet" href="assets/scss/style.css">
	<link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>

	<!-- Left Panel -->

	<aside id="left-panel" class="left-panel">
		<nav class="navbar navbar-expand-sm navbar-default">
			<div class="navbar-header">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa fa-bars"></i> </button>
				<a class="navbar-brand" href="adminindex.php">AITG Admin</a> <a class="navbar-brand hidden" href="adminindex.php"><img src="images/logo2.png" alt="Logo"></a> </div>
			<div id="main-menu" class="main-menu collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"> <a href="adminindex.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a> </li>
					<h3 class="menu-title">Manage</h3>
					<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-align-justify"></i>Preferences</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-vcard"></i><a href="userprofile.php">Basic Profile</a>
							</li>
							<li><i class="fa fa-vcard"></i><a href="updateUserPassword.php">Update User Password</a>
							</li>
						</ul>
					</li>
					<!-- /.menu-title -->
					<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-location-arrow"></i>Place Transport and Tags</a>
						<ul class="sub-menu children dropdown-menu">

							<?php

							global $connection;
							$query = "SELECT * FROM places";
							$results = mysqli_query( $connection, $query );
							while ( $row = mysqli_fetch_assoc( $results ) ) {
								$listelement =  "<li><i class='fa fa-location-arrow'></i><a href='placesTransportTags.php?placeid=" . $row[ "placeid" ] . "'>" . $row[ "placename" ] . " </a></li>";
								echo($listelement);
							}




							?>

						</ul>
					</li>

					<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Users</a>
						<ul class="sub-menu children dropdown-menu">
							<?php

							global $connection;
							$query = "SELECT * FROM users WHERE type = 'standard' ORDER BY username";
							$results = mysqli_query( $connection, $query );
							while ( $row = mysqli_fetch_assoc( $results ) ) {
								$listelement =  "<li><i class='fa fa-location-arrow'></i><a href='userinfo.php?targetuserid=" . $row[ "userid" ] . "'>" . $row[ "username" ] . " </a></li>";
								echo($listelement);
							}




							?>
						</ul>
					</li>

					<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Operations</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-user-plus"></i><a href="addUserAdmin.php">Add User</a>
							</li>
							<li><i class="fa fa-user-times"></i><a href="removeUserAdmin.php">Remove User</a>
							</li>


							<li><i class="fa fa-tags"></i><a href="tags.php">Add Tags</a>
							</li>
							<li><i class="fa fa-location-arrow"></i><a href="adminAddPlaces.php">Add Places</a>
							</li>
						
						</ul>
					</li>
					<!--<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Feedbacks</a>
						<ul class="sub-menu children dropdown-menu">
							<li><i class="menu-icon fa fa-th"></i><a href="adminindex.php">Product</a>
							</li>
							<li><i class="menu-icon fa fa-th"></i><a href="adminindex.php">Places</a>
							</li>
						</ul>
					</li>-->
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
	</aside>
	<!-- /#left-panel -->

	<!-- Left Panel -->

	<!-- Right Panel -->

	 <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-10"> <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <form action="page4square.php" method="post">
						<div class="col-sm-6">
							<select name="cbplaces" id="activities" class="form-control">
							<?php
							$temp = isset($placeidheader) ? $placeidheader : "";

							global $connection;
							$query = "SELECT * FROM places";
							$results = mysqli_query( $connection, $query );
							while ( $row = mysqli_fetch_assoc( $results ) ) {
								$selectedText = ($row[ "placeid" ] == $temp) ? "selected" : "";
								echo( "<option value = '" . $row[ "placeid" ] . "' " . $selectedText . " >" . $row[ "placename" ] . " </option>" );
							}
							?>
							</select>
						</div>
						<div class="col-sm-4">
							<button id="payment-button" type="submit" name="btnSearch" class="btn btn-md btn-info">Search</button>
						</div>
					</form>
                </div>
                
                <div class="col-sm-2">
                    <div class="user-area dropdown float-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar"> </a>
                        <div class="user-menu dropdown-menu"> 
							<a class="nav-link" href="userprofile.php"><i class="fa fa- user"></i>My Profile</a> 
<!--
							<a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a> 
							<a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>
-->
							<a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a> </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /header -->
        <!-- Header-->
        
        
        