<?php

session_start();
if (isset($_SESSION["userid"])) {
	unset($_SESSION);
}
session_destroy();
header("Location: login.php?status=logout")

?>