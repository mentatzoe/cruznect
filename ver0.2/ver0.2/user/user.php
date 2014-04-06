<?php

	require_once "login.php";
	require_once "fetch_user.php";
	
	require_once "LClogin.php";
	require_once "register.php";

	function process_user_request()
	{
		switch ($_GET['action'])
		{
			case 'login':
				user_login();
				break;
				
			case 'fetch_user':
				fetch_user();
				break;
	
			case 'LClogin':
				user_LClogin();
				break;

			case 'register':
				user_register();
				break;
		
			default:
				send_error_message(ERR_BAD_REQUEST);
		}
	}
	
?>
