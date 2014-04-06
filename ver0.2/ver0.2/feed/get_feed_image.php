<?php
function get_feed_image()
{
	// FIXME: check if feed id is valid
	$size = $_GET['type'];
	check_size_str($size);
	send_file("/feed/image/" . get_id() . "_" . $size . ".png", "image/png");
}
?>
