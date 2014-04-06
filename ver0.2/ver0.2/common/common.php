<?php

	require_once "configurations.php";
	/* define configurations */

	require_once "messages.php";
	/* process messages
	   function send_error_messge($info)
	*/

	require_once "file.php";
	/* process file downloading requests
	   function send_file($path, $type, $name)
	*/

	require_once "mysql.php";
	/* connect mysql server
	   function new_mysqli_connection()
	*/
	
	require_once "functions.php";
	/* useful functions
	   function get_id()
	*/

	require_once "push.php";
	/* include apns-php files */
	
	require_once "user.php";
	/* include user functions */
?>
