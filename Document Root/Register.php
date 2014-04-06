
<?php
//This file is called when a successful register happens
	include 'functions.php';


	//get post variables
	$name=$_POST["name"];
	$password=md5($_POST["password"]);
	$email=$_POST["email"];


	$query = sprintf("
		SELECT id 
		FROM users
		WHERE email='$email'
		");
	$result = Query($query);

	if ($result) {
    	$_POST['error']="Email already registered";
 
	}

	//insert
	$query = sprintf("
		INSERT into users (email, password, name, active)
		VALUES ($email, $password, $name, 1)
		");

	$result = Query($query);


?>
