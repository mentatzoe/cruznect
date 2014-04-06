<?php
	include 'functions.php';

	//recieve post variables
	$email = $_POST["email"];
	$password = md5($_POST["password"]);

	//check if it exists
	$query = sprintf("SELECT email, password FROM users WHERE email='$username'");
	$result = Query($query);


	if (!$result) {
	$_POST['error']='User does not exist';
    header('Location: index.php');
	}

	while ($row = mysqli_fetch_assoc($result)) {
		//Success of login in
    	if (strcmp($pass,$row['password'])==0)
    		login();

    	//Incorrect Password
    	else
    		incorrectPass();

	}


		function login(){
			session_start();
			$_SESSION['email']=$username;
			
			$status = 200;
			$json = array("username" = $username, "status-code" = $status);
			echo json_encode( $json );

			header( 'Location: index.php' ) ;
		}

		function incorrectPass(){
			$_POST['error']='Incorrect Email / Password';
			header('Location: index.php');

		}


?>