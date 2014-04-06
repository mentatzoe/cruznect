<?php
function user_LClogin()
{
	$schoolid = $_REQUEST["schoolid"];
	$LCpasswd = $_REQUEST["LCpassword"];
	$name = $_REQUEST["name"]; // BE CAREFUL: no html escape
	$remember = $_REQUEST["rememberme"];
	if (!preg_match("/^[g]?\d{2}2\d{4}$|^[c]?\d{2}1\d{4}$/", $schoolid) || ($remember != "0" && $remember != "1"))
		send_error_message(ERR_BAD_REQUEST);
	
	$type = substr($schoolid, 2, 1) == "2" ? "gz" : "cz";
	if (!check_LCpassword($schoolid, $LCpasswd, $type))
		send_error_message(ERR_FORBIDDEN);
	
	$mysqli = new_mysqli_connection();
	$stmt = $mysqli->prepare("INSERT INTO users (schoolid, name, password) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE name = ?, password = ?");
	$stmt->bind_param("issss", $schoolid, $name, md5($LCpasswd), $name, md5($LCpasswd));
	if (!$stmt->execute())
		send_error_message(ERR_INTERNAL_SERVER_ERROR);
	$stmt->close();

	$stmt = $mysqli->prepare("SELECT uid FROM users WHERE schoolid = ?");
	$stmt->bind_param("i", $schoolid);
	$stmt->execute();
	$stmt->bind_result($uid);
	if (!$stmt->execute())
		send_error_message(ERR_INTERNAL_SERVER_ERROR);
	$stmt->fetch();
	$stmt->close();
	
	$sid = generate_random_str();
	if($_REQUEST['rememberme'] == 1)
	{
		$t1 = "1 year";
		$t2 = 365 * 24 * 3600;
	}
	else
	{
		$t1 = USER_LOGIN_EXP_SECONDS . " second";
		$t2 = USER_LOGIN_EXP_SECONDS;
	}
	$mysqli->query("INSERT INTO sessions (uid, sid, login, expire) VALUES (" . $uid . ", \"" . $sid . "\", NOW(), DATE_ADD(NOW(), INTERVAL " . $t1 . "))");
	setcookie("sid", $sid, time() + $t2);

	send_success_message(MSG_OK);
}
?>
