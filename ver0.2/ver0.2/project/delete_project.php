<?php

	function delete_project()
	{
		if (isset($_REQUEST["project_id"])) {
			$project_id = $_REQUEST["project_id"];
		}
		
		if (isset($_REQUEST["project_id"])) {
			$mysqli = new_mysqli_connection();
			$stmt = $mysqli->prepare("UPDATE projects SET active = 0 WHERE id = $project_id");
			$stmt->execute();
			$stmt->close();
			send_success_message(MSG_OK);
		}
	}

?>