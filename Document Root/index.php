<?php
	session_start();
	include "header.php";
	include "navbar.php";
	if($_SESSION['email']){
		include "main_logged.php";
		echo $_SESSION['email'];
	} else {
		include "main.php";
	}
include "footer.php";
include "scripts.php";
?>