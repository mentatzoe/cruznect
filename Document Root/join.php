<?
	include "functions.php";
	if ($_COOKIE['email']){
		$query = "SELECT id FROM users WHERE email='".$_COOKIE['email']."'";
		$result = Query($query);
		
		$row = mysqli_fetch_assoc($result);
		
		insert_user_project($row["id"], $_POST["project_id"]);
	}
	header("Location: index.php");
?>