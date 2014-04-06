<?php
require_once "get_feed_info.php";
require_once "get_feed_image.php";
require_once "get_feed_audio.php";

require_once "modify_feed_info.php";
require_once "modify_feed_image.php";
require_once "modify_feed_audio.php";

require_once "create_feed.php";
require_once "delete_feed.php";

function process_feed_request()
{
	switch ($_GET['action'])
	{
		/* get */
		case "get_feed_info":
			get_feed_info();
			break;
		
		case "get_feed_image":
			get_feed_image();
			break;
		
		case "get_feed_audio":
			get_feed_audio();
			break;
		
		case "get_feed_video":
			send_error_message(ERR_NOT_IMPLEMENTED);
			break;
			
		case "get_feed_attachments":
			send_error_message(ERR_NOT_IMPLEMENTED);
			break;
		
		/* update */
		case "modify_feed_info":
			modify_feed_info();
			break;
		
		case "modify_feed_image":
			modify_feed_image();
			break;
		
		case "modify_feed_audio":
			modify_feed_audio();
			break;
		
		case "update_feed_video":
			send_error_message(ERR_NOT_IMPLEMENTED);
			break;
			
		case "update_feed_attachments":
			send_error_message(ERR_NOT_IMPLEMENTED);
			break;
		
		/* create */
		case "create_feed":
			create_feed();
			break;
		
		/* delete */
		case "delete_feed":
			delete_feed();
			break;
		
		default:
			send_error_message(ERR_BAD_REQUEST);
	}
}
?>
