<?
session_start();
header("Content-type: image/png");
header("Cache-Control: no-store"); 
header("Expires: ".date("r"));

if(!$_SESSION["cap"]){
	$_SESSION["cap"]=rand (10000, 99999);
}

$rand_num=rand (10000, 99999);
$im = @imagecreate(88, 31)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 160, 160, 160);
$text_color = imagecolorallocate($im, 20, 20, 120);
imagestring($im, 10, 20, 7,  $_SESSION["cap"], $text_color);
//imagestring($im, 10, 20, 7,  $rand_num, $text_color);
$rnd_dig=$_SESSION["cap"];
imagepng($im);
imagedestroy($im);
?>