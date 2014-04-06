<?php 
	include 'functions.php';

	$id= $_POST['id'];

	$query=sprintf("
		UPDATE projects
		SET active=0 
		WHERE id='$id'
		");

	Query($query);

	header('Location: index.php');

?>