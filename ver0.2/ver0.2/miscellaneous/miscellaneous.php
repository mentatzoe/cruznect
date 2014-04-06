<?php
function show_usage()
{
	send_file("/miscellaneous/usage.txt", "text/plain", "usage.txt");
}
function show_moo()
{
	send_file("/miscellaneous/moo.txt", "text/plain", "moo.txt");
}
?>
