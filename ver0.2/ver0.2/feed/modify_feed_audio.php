<?php
function modify_feed_audio()
{
	// FIXME: check if feed id is valid
	get_uploaded_file("/feed/audio/" . get_id() . ".mp3", "audio/mpeg", $_FILES["audio"]);
	send_success_message(MSG_OK);
}
?>
