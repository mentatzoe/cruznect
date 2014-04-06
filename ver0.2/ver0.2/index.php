<?php
	require_once "common/common.php";
	require_once "admin/admin.php";
	require_once "feed/feed.php";
	require_once "push/push.php";
	require_once "message/message.php";
	require_once "user/user.php";
	require_once "miscellaneous/miscellaneous.php";
	require_once "project/project.php";
	
	if (isset($_GET['action']))
	{
		if ($_GET['action'] == 'moo')
		{
			show_moo();
			exit(0);
		}
	}
	
	if (isset($_GET['action_type']))
	{
		switch($_GET['action_type'])
		{
			case "admin":
				process_admin_request();
				break;
		
			case "feed":
				process_feed_request();
				break;
		
			case "push":
				process_push_request();
				break;

			case "message":
				process_message_request();
				break;

			case "user":
				process_user_request();
				break;
				
			case "project":
				process_project_request();
				break;
			
			default:
				show_usage();
		}
	}
	
?>
