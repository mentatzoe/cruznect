<?php
	session_start();
	include "header.php";
	include "navbar.php";
	if($_COOKIE['email']){
		include "project_id.php";
	} else {
		include "main.php";
	}
include "footer.php";
include "scripts.php";
?>