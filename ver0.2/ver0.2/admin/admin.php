<?php
function check_administrator()
{
	// FIXME
	return;
	send_error_message(ERR_NOT_ADMINISTRATOR);
}
function process_admin_request()
{
	check_administrator();
	
	switch ($_GET['action'])
	{
		case "get_php_info":
			phpinfo();
			break;
	
		default:
			send_error_message(ERR_BAD_REQUEST);
	}
}
?>
