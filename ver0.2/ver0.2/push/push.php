<?php
require_once "register.php";
require_once "broadcast_notification.php";

function process_push_request()
{
	switch ($_GET['action'])
	{
		case "broadcast_notification":
			push_broadcast_notification();
			break;

		case "register":
			push_register();
			break;
		
		default:
			send_error_message(ERR_BAD_REQUEST);
	}
}
?>
