<?php

	function fetch_user()
	{
		if (isset($_REQUEST["user_id"]))
			$id = $_REQUEST["user_id"];
	
		if (isset($id)) {	

			$mysqli = new_mysqli_connection();
			$stmt = $mysqli->prepare("SELECT * FROM users WHERE id='$id'");
	// 		$stmt->bind_param("i", $cnt);
			$stmt->execute();
			$stmt->bind_result($id, $email, $password, $name, $active, $profilepic);
	
			$response = array();

			while ($stmt->fetch())
				$response[] = array("id"=>$id, "email"=>$email, "password"=>$password, "name"=>$name, "active"=>$active, "profilepic"=>$profilepic);
	
			$stmt->close();
	
			send_success_message(MSG_OK, $response);
			
			
		} else {	
			send_error_message(ERR_NOT_ACCEPTABLE); // no such user
		}
	}

?>