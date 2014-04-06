<?php
function get_feed_audio()
{
	// FIXME: check if feed id is valid
	send_file("/feed/audio/" . get_id() . ".mp3", "audio/mpeg");
}
?>
