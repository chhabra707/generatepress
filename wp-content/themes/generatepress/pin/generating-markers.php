<?php
/*
 * PHP script for generating labeled markers for Google Maps
 * https://salman-w.blogspot.com/2011/06/google-maps-markers-with-labels.html
 *
 * Creates a Google maps marker image with dynamic text; uses
 * an existing image as template, label text comes from querystring
 */

define("FONT_SIZE", 9);                             // font size in points
define("FONT_PATH", "../fonts/montserrat/Montserrat-Bold.ttf"); // path to the TrueType font file
define("FONT_COLOR", 0xff4ca665);                   // font color -- the four bytes from left to right represent:
                                                    // alpha -- 0x00 - 0x7F (solid through transparent)
                                                    // red   -- 0x00 - 0xFF
                                                    // green -- 0x00 - 0xFF
                                                    // blue  -- 0x00 - 0xFF
$type = $_GET["type"];
if($type == "sponsor"){
	$base_image = "marker-sponser.png";
}elseif($type == "artist"){
	$base_image = "marker-artist.png";
}else{
	$base_image = "marker.png";
}												
$text = $_GET["text"];
$gdimage = imagecreatefrompng($base_image);

// Create some colors
$white = imagecolorallocate($gdimage, 255, 255, 255);
$grey = imagecolorallocate($gdimage, 128, 128, 128);
$black = imagecolorallocate($gdimage, 0, 0, 0);

imagesavealpha($gdimage, true);
list($x0, $y0, , , $x1, $y1) = imagettfbbox(FONT_SIZE, 0, FONT_PATH, $text);
$imwide = imagesx($gdimage);
$imtall = imagesy($gdimage) - 14;                   // adjusted to exclude the "tail" of the marker
$bbwide = abs($x1 - $x0);
$bbtall = abs($y1 - $y0);
$tlx = ($imwide - $bbwide) >> 1;
$tly = ($imtall - $bbtall) >> 1;
imagettftext($gdimage, FONT_SIZE, 0, $tlx, $tly + $bbtall - $y0, $white, FONT_PATH, $text);
header("Content-Type: image/png");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 60 * 60 * 24 * 180) . " GMT");
imagepng($gdimage);
?>