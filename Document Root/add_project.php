<?
	include "functions.php";
	if ($_COOKIE['email']){
		insert_project($_POST["name"],$_POST["description"]);
		
		$project_id = get_project_id($_POST["name"]);
		
		foreach ($_POST['talents'] as  $value) {
			$_POST["people"] = 1;
			$query = sprintf("
			INSERT into project_required(project_id, talent_id, number_of_people)
			VALUES ($project_id, $value, ".$_POST['people'].")
			");
			Query($query);
		}
	}
	header("Location: index.php");
?>