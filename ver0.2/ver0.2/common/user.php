<?php
function get_uid_by_cookie()
{
	$sid = $_COOKIE["sid"];

	if (!preg_match("/^[0-9a-zA-Z]{32}$/", $sid))
		send_error_message(ERR_BAD_REQUEST, "Invalid cookie: sid");
	
	$mysqli = new_mysqli_connection();
	$stmt = $mysqli->prepare("SELECT uid FROM sessions WHERE sid = ?");
	$stmt->bind_param("s", $sid);
	if (!$stmt->execute())
		send_error_message(ERR_INTERNAL_SERVER_ERROR);
	$stmt->store_result();
	if ($stmt->num_rows == 0)
		return 0;
	$stmt->bind_result($uid);
	$stmt->fetch();

	return (int) $uid;
}
?>
