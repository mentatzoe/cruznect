<?php
	function user_login()
	{
		if (isset($_REQUEST["email"]))
			$email = $_REQUEST["email"];
		
		if (isset($_REQUEST["password"]))
			$password = md5($_REQUEST["password"]);
	
		if (isset($email) && isset($password)) {	
			$mysqli = new_mysqli_connection();
			$query = sprintf("SELECT email, password, id FROM users WHERE email='$email' AND password='$password'");
			$result = $mysqli->query($query);
			$row = mysqli_fetch_assoc($result);
			if (strcmp($password, $row['password']) == 0){
				send_success_message(MSG_OK, array("id"=>$row['id']));
			} else {
				send_error_message(ERR_NOT_ACCEPTABLE); // no such user
			}
		} else {	
			send_error_message(ERR_NOT_ACCEPTABLE); // no such user
		}
	}
?>
