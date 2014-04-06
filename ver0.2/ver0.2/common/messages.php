<?php
define("ERR_BAD_REQUEST", "(400) Bad Request");
define("ERR_FORBIDDEN", "(403) Forbidden");
define("ERR_NOT_ACCEPTABLE", "(406) Not Acceptable");
define("ERR_INTERNAL_SERVER_ERROR", "(500) Internal Server Error");
define("ERR_NOT_IMPLEMENTED", "(501) Not Implemented");

define("ERR_NOT_ADMINISTRATOR", "(403) Forbidden [You aren't administrator. Go away!]");
define("ERR_BAD_FILETYPE", "(400) Bad filetype");

function send_response_with_data($msg, $data)
{
	echo json_encode(array("status-code"=>(int)substr($msg, 1, 3), "status"=>substr($msg, 6), "response"=>$data));
}

function send_error_message($msg, $detail = "unknown error")
{
	send_response_with_data($msg, array("error-detail"=>$detail));
	die();
}


define("MSG_OK", "(200) OK");
function send_success_message($msg, $response = "")
{
	send_response_with_data($msg, $response);
	exit(0);
}
?>
