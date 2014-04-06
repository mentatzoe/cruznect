<?php
function push_broadcast_notification()
{
	$uid = get_uid_by_cookie();
	if ($uid != 1)
		send_error_message(ERR_FORBIDDEN);

	$msgtext = $_REQUEST["text"];
	$msgbadge = (int) $_REQUEST["badge"];
	$msgexpiry = (int) $_REQUEST["expiry"];
	$msgid = generate_random_str();

	$mysqli = new_mysqli_connection();
	$stmt = $mysqli->prepare("INSERT INTO push_messages_ios (mid, timestamp, text, badge, expiry) VALUES (?, NOW(), ?, ?, ?)");
	$stmt->bind_param("ssii", $msgid, $msgtext, $msgbadge, $msgexpiry);
	if (!$stmt->execute())
		send_error_message(ERR_INTERNAL_SERVER_ERROR);
	$stmt->close();

	$stmt = $mysqli->prepare("SELECT token FROM push_users_ios");
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows() == 0)
		send_success_message(MSG_OK, "No message sent, because there is no user registered.");
	$stmt->bind_result($token);

	$push = new_apple_push();
	$push->connect();

	while ($stmt->fetch())
	{
		$message = new ApnsPHP_Message($token);
		$message->setCustomIdentifier($msgid);
		$message->setText($msgtext);
		$message->setBadge($msgbadge);
		$message->setSound();
		$message->setExpiry($msgexpiry);
		$push->add($message);
	}

	$stmt->close();
	$push->send();
	$push->disconnect();
	$aErrorQueue = $push->getErrors();
	if (!empty($aErrorQueue))
		send_error_message(ERR_INTERNAL_SERVER_ERROR);
	
	send_success_message(MSG_OK);
}
?>
