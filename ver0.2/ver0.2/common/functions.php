<?php
function get_id()
{
	$x = $_REQUEST['id'];
	if (!preg_match("/^\d{1,8}$/", $x) || $x > 16777215)
		send_error_message(ERR_BAD_REQUEST);
	return $x;
}
function check_size_str($str)
{
	if ($str != "large" && $str != "medium" && $str != "small" && $str != "tiny")
		send_error_message(ERR_BAD_REQUEST);
}
function generate_random_str()
{
	$str = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
	$n = 32;
	$len = strlen($str) - 1;
	$ret = "";
	for($i = 1; $i <= $n; $i++)
		$ret .= $str[rand(0, $len)];
	return $ret;
}
?>
