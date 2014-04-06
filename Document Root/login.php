<?php
	include 'functions.php';

	//recieve post variables
	$email = $_POST["email"];
	$password = md5($_POST["password"]);

	//check if it exists
	$query = sprintf("SELECT email, password FROM users WHERE email='$email'");
	$result = Query($query);


	if (!$result) {
	$_SESSION['error']='nouser';
    header('Location: error.php');
	}

	$row = mysqli_fetch_assoc($result);
		//Success of login in
    	if (strcmp($password,$row['password'])==0){

    		setcookie('email', $email);
			$status = 200;
			$json = array("email" => $email, "status-code" => $status);

			header("Location: index.php");
		}
    	else{
    		$_SESSION['error']='Incorrect Email / Password';
			header("Location: error.php");
    	}




?>