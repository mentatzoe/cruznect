<?
	include "functions.php";
	if ($_COOKIE['email']){
		$uid = get_user_id($_COOKIE['email']);
		insert_user_project($uid, $_POST["project_id"]);
	}
	header("Location: index.php");
?>