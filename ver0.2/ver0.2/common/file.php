<?php
function send_file($path, $type)
{
//	http_send_content_disposition($name, true);
	http_send_content_type($type);
//	http_throttle(0.1, 2048);
	http_send_file(PATH_TO_FILES . $path);
}
function get_uploaded_file($path, $type, $file)
{
	if ($file["type"] != $type)
		send_error_message(ERR_BAD_FILETYPE);
	if (!move_uploaded_file($file["tmp_name"], PATH_TO_FILES . $path))
	{
		error_log(__FILE__ . ':' .  __LINE__ . ':' . __FUNCTION__ . "(): move_uploaded_file() failed.");
		send_error_message(ERR_INTERNAL_SERVER_ERROR);
	}
}
?>
