<?php
function modify_feed_image()
{
	// FIXME: check if feed id is valid
	$size = $_POST['type'];
	check_size_str($size);
	get_uploaded_file("/feed/image/" . get_id() . "_" . $size . ".png", "image/png", $_FILES['image']);
	
	send_success_message(MSG_OK);
}
?>
