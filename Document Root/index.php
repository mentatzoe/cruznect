<?php
include 'functions.php';

if($_SESSION['email']){
	include 'logged.php';
} else {
	include 'unlogged.php';
}

?>
