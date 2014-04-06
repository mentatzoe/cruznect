<?
$login = true;
	include "header.php";
	include "navbar.php";
if($login){
	include "main_logged.php";
} else {
	include "main.php";
}
include "footer.php";
include "scripts.php";
?>