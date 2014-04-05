<?php

	$username = $_POST["username"];
	$password = $_POST["password"];


	$DB_NAME = "";
	$DB_HOST = "localhost";
	$DB_USER = "root";
	$DB_PASS = "root";
	
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$mysqli->set_charset("utf8");

	$query = sprintf("SELECT username, password FROM users WHERE username='$username'");
	$result = mysql_query($query);

	if (!$result) {
    	missingUser();
	}

	while ($row = mysql_fetch_assoc($result)) {
		//Success of login in
    	if ($pass == $row['password'])
    		login();

    	//Incorrect Password
    	else
    		incorrectPass();

	}


		function login(){
			session_start();
			$_SESSION['username']=$username;
			
			$status = 200;
			$json = array("$username", "$status");
			json_encode( $json );

			header( 'Location: index.php' ) ;
		}

		function inCorrectPass(){
			$status = 0;
			$json = array("$username", "$status");
			json_encode( $json );

		}

		function inCorrectPass(){
			$status = 0;
			$json = array("$username", "$status");
			json_encode( $json );

		}
?>