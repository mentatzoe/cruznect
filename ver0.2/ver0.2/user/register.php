<?php
require_once "LCpassword.php";

function user_register()
{
	$schoolid = $_REQUEST["schoolid"];
	$passwd = md5($_REQUEST["password"]);
	$lcpasswd = $_REQUEST["LCpassword"];
	$name = $_REQUEST["name"]; // BE CAREFUL: no html escape

	if (!preg_match("/^[g]?\d{2}2\d{4}$|^[c]?\d{2}1\d{4}$/", $schoolid))
		send_error_message(ERR_BAD_REQUEST);
	
	$type = substr($schoolid, 2, 1) == "2" ? "gz" : "cz";
	if (!check_LCpassword($schoolid, $lcpasswd, $type))
		send_error_message(ERR_FORBIDDEN);
	
	$mysqli = new_mysqli_connection();
	$stmt = $mysqli->prepare("SELECT schoolid FROM users WHERE schoolid = ?");
	$stmt->bind_param("i", $schoolid);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0)
		send_error_message(ERR_NOT_ACCEPTABLE);
	$stmt->close();

	$stmt = $mysqli->prepare("INSERT INTO users (schoolid, name, password) VALUES (?, ?, ?)");
	$stmt->bind_param("iss", $schoolid, $name, $passwd);
	if (!$stmt->execute())
		send_error_message(ERR_INTERNAL_SERVER_ERROR);

	send_success_message(MSG_OK);
}
?>
