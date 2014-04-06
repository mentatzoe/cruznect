<?php
function new_mysqli_connection()
{
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
	if ($mysqli->connect_errno)
	{
		error_log(__FILE__ . ':' .  __LINE__ . ':' . __FUNCTION__ . "(): could't connect to mysql server.");
		send_error_message(ERR_INTERNAL_SERVER_ERROR);
	}
	$mysqli->set_charset("utf8");
	return $mysqli;
}
?>
