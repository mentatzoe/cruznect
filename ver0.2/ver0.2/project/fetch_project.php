<?php 

	function fetch_all() {
	
		// $cnt = (int) $_REQUEST["count"];
// 		if ($cnt <= 0 || $cnt > 200)
// 			send_error_message(ERR_BAD_REQUEST);

		$mysqli = new_mysqli_connection();
		$stmt = $mysqli->prepare("SELECT * FROM projects WHERE active = 1");
// 		$stmt->bind_param("i", $cnt);
		$stmt->execute();
		$stmt->bind_result($id, $name, $description, $imageURL, $owner, $active, $created);
	
		$response = array();

		while ($stmt->fetch())
			$response[] = array("id"=>$id, "name"=>$name, "description"=>$description, "imageURL"=>$imageURL, "owner"=>$owner, "active"=>$active, "created"=>$created);
	
		$stmt->close();
	
		send_success_message(MSG_OK, $response);
	
	}
	
	function fetch_user_project() {
		if (isset($_REQUEST['user_id'])) {
			$user_id = $_REQUEST['user_id'];
			$mysqli = new_mysqli_connection();
			$stmt = $mysqli->prepare("SELECT * FROM projects WHERE owner = '$user_id' AND active = 1");
			$stmt->execute();
			$stmt->bind_result($id, $name, $description, $imageURL, $owner, $active, $created);
	
			$response = array();

			while ($stmt->fetch())
				$response[] = array("id"=>$id, "name"=>$name, "description"=>$description, "imageURL"=>$imageURL, "owner"=>$owner, "active"=>$active, "created"=>$created);
	
			$stmt->close();
	
			send_success_message(MSG_OK, $response);
		} else {
			send_error_message(ERR_NOT_ACCEPTABLE); // no such user
		}
	}
	
?>