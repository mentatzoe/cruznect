<?php
require_once "get_recent.php";
function process_message_request()
{
	switch ($_GET['action'])
	{
		case 'get_recent':
			message_get_recent();
			break;
		
		default:
			send_error_message(ERR_BAD_REQUEST);
	}
}
?>

