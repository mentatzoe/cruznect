<?php
	session_start();
	include "header.php";
	include "navbar.php";

	if($_COOKIE['email']){
		include "main_logged.php";
	} else {
		include "main.php";
	}
include "footer.php";
include "scripts.php";
?>