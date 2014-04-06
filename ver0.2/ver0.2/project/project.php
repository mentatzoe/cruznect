<?php

	require_once "fetch_project.php";
	require_once "fetch_project_requirements.php";
	require_once "delete_project.php";
	
	function process_project_request()
	{
		switch ($_GET['action'])
		{
			case 'fetch_all':
				fetch_all();
				break;
			case 'fetch_user_project':
				fetch_user_project();
				break;
			case 'fetch_project_requirements':
				fetch_project_requirements();
				break;
			case 'delete_project':
				delete_project();
				break;
			
			default:
				send_error_message(ERR_BAD_REQUEST);
		}
	}
	
?>