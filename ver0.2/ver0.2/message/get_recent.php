<?php
function message_get_recent()
{
	$cnt = (int) $_REQUEST["count"];
	if ($cnt <= 0 || $cnt > 200)
		send_error_message(ERR_BAD_REQUEST);

	$mysqli = new_mysqli_connection();
	$stmt = $mysqli->prepare("SELECT mid, text, timestamp FROM push_messages_ios ORDER BY timestamp DESC LIMIT ?");
	$stmt->bind_param("i", $cnt);
	$stmt->execute();
	$stmt->bind_result($mid, $text, $timestamp);
	
	$response = array();

	while ($stmt->fetch())
		$response[] = array("mid"=>$mid, "text"=>$text, "timestamp"=>$timestamp);
	
	$stmt->close();
	
	send_success_message(MSG_OK, $response);
}
?>
