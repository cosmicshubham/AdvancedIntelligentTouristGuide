<?php

session_start();
if (!isset($_SESSION) || !isset($_SESSION["userid"])) {
	header ("Location: login.php?status=expire");
}


?>