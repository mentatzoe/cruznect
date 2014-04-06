
<?php
//This file is called when a successful register happens
	include 'functions.php';



	//get post variables
	$name=$_POST["name"];
	$password=md5($_POST["password"]);
	$email=$_POST["email"];

	//Cehck if email aready 
	$query = sprintf("
		SELECT id 
		FROM users
		WHERE email='$email'
		");
	$result = Query($query);

	if ($result) {
    	$_POST['error']="Email already registered";
 		header('Location: index.php');
	}

	//insert user
	$query = sprintf("
		INSERT into users (email, password, name, active)
		VALUES ($email, $password, $name, 1)
		");

	Query($query);

	//get user ID
	$query = sprintf("
		SELECT id 
		FROM
		users
		WHERE 
		email='$email'
		");
	$result = Query($query);

	$row = mysqli_fetch_assoc($result);
	$id=$row["id"];

	//add talents
	foreach ($_POST['talents'] as  $value) {
		$query = sprintf("
		INSERT into user_talents
		VALUES ('$id', '$value')
		");
		Query($query);
	}



?>
