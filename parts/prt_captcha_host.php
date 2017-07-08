<?
session_start();
if(!$_SESSION["cap"]){
	$_SESSION["cap"]=$_SERVER['HTTP_HOST'];
}
header("Content-type: image/png");
$im = @imagecreate(250, 31)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 160, 160, 160);
$text_color = imagecolorallocate($im, 20, 20, 120);
imagestring($im, 10, 10, 7,  $_SERVER['HTTP_HOST'], $text_color);
imagepng($im);
imagedestroy($im);
?>