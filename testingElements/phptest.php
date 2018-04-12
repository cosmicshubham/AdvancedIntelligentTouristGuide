<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		$date1=date_create("2013-03-15");
$date2=date_create("2015-12-12");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");
		
	?>
</body>
</html>