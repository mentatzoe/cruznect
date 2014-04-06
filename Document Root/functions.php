<?php

function getSQL(){
	$DB_NAME = "hackathon";
	$DB_HOST = "localhost";
	$DB_USER = "root";
	$DB_PASS = "";
	
	return new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
}

function getPostList(){
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
		
}

?>