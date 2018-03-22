<?php

$username = "aitgadmin";
$password = "aitgadmin";
$dbname = "aitgdb";
$dbhost = "localhost";
$connection = mysqli_connect( $dbhost, $username, $password, $dbname );

?>


<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Test Document</title>
</head>

<body>

	<?php

	$query = "SELECT * FROM users";
	$results = mysqli_query( $connection, $query );

	while ( $row = mysqli_fetch_row( $results ) ) {
		var_dump( $row );
		echo "<hr />";
	}

	?>

</body>

</html>

<?php

mysqli_close( $connection );

?>