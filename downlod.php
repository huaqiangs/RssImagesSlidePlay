<?php
ob_start();
ob_end_flush();

set_time_limit(0); 

echo "BEGIN\r\n";

$contents = file_get_contents("photos_public.xml");

$pattern = "/(<media:content url=\")(.*?)(\")/";
preg_match_all($pattern, $contents, $matches, PREG_PATTERN_ORDER);

$i = 0;
foreach($matches[2] as $img)
{
	$file = explode("/", $img);
	$savefile = "images/b/". end($file);
	echo "Download ". $img ."\r\n";
	file_put_contents($savefile, file_get_contents($img));
	echo "Save file:". $savefile ."\r\n";
	echo "Downloaded ({$i}).\r\n";
}