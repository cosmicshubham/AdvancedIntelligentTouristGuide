<?php




$username = "aitgadmin";
$password = "aitgadmin";
$dbname = "aitgdb";
$dbhost = "localhost";
$connection = mysqli_connect( $dbhost, $username, $password, $dbname );

if (mysqli_connect_errno()) {
	die("Database connection failed: " . mysqli_connect_error() . mysqli_connect_errno());
}

if (! isset($_POST["submit"]))  {
	header("Location: adminindex.php");
}
session_start();
$loginUser =  $_POST["username"];
$loginPass = $_POST["password"];
$_SESSION["user"] = $loginUser;

$query = "SELECT * FROM users WHERE (username = '" . $loginUser . "' AND password = '" . $loginPass . "')";
$results = mysqli_query( $connection, $query );

if (! mysqli_fetch_assoc($results)) {
	header("Location: login.php?status=wrong");
}

?>



<?php include( "userDashboardHeader.php" ); ?>

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Dashboard</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3"> </div>
<!-- .content --> 
</div>
<?php include( "userDashboardFooter.php" ); ?>