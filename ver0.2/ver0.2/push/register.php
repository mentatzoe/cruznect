<?php
function push_register_ios()
{
	$token = $_REQUEST["token"];
	$did = $_REQUEST["deviceid"];
	$uid = 0;
//	$uid = get_uid_by_cookie();
	
//	if ($uid == 0)
//		send_error_message(ERR_FORBIDDEN, "Not logged in.");

	if (!preg_match("/^[0-9a-f]{64}$/", $token))
		send_error_message(ERR_BAD_REQUEST);
		
	$mysqli = new_mysqli_connection();
	$stmt = $mysqli->prepare("REPLACE INTO push_users_ios (uid, did, token) VALUES (?, ?, ?)");
	$stmt->bind_param("iss", $uid, $did, $token);
	if (!$stmt->execute())
		send_error_message(ERR_INTERNAL_SERVER_ERROR);
	send_success_message(MSG_OK);
}
function push_register()
{
	$type = $_REQUEST["type"];
	switch ($type)
	{
		case "ios":
			push_register_ios();
			break;

		default:
			send_error_message(ERR_BAD_REQUEST);
	}
}
?>

