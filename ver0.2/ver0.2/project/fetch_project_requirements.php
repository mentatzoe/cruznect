<?php

	function fetch_project_requirements()
	{
		if (isset($_REQUEST['project_id'])) {
			$project_id = $_REQUEST['project_id'];
		}
		
		if (isset($project_id)) {	

			$mysqli = new_mysqli_connection();
			$stmt = $mysqli->prepare("
				SELECT project_required.number_of_people, talents.name 
				FROM project_required, talents, projects
				WHERE project_required.talent_id = talents.id
				AND project_required.project_id = projects.id
				AND projects.id = '$project_id'");
	// 		$stmt->bind_param("i", $cnt);
			$stmt->execute();
			$stmt->bind_result($number_of_people, $name);
	
			$response = array();

			while ($stmt->fetch())
				$response[] = array("number_of_people"=>$number_of_people, "name"=>$name);
	
			$stmt->close();
	
			send_success_message(MSG_OK, $response);
			
			
		} else {	
			send_error_message(ERR_NOT_ACCEPTABLE); // no such user
		}

		
	}

?>