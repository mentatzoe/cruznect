<?php
require_once 'ApnsPHP/Autoload.php';
class push_logger implements ApnsPHP_Log_Interface
{
	public function log($sMessage)
	{
		// do nothing
	}
}
function new_apple_push()
{
	$push = new ApnsPHP_Push(ApnsPHP_Abstract::ENVIRONMENT_SANDBOX, PUSH_IOS_CERTIFICATE);
	$push->setRootCertificationAuthority(PUSH_IOS_ROOT_CERTIFICATE);
	$push->setLogger(new push_logger);
	return $push;
}
?>
