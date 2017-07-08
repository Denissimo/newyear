<?
header("Content-type: image/png");
$im = imagecreate(550, 310)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 160, 160, 160);
$text_color = imagecolorallocate($im, 20, 20, 120);
//$addr = $_SERVER['HTTP_REFERER'];
$addr='Test: ';//.$account.'+'.$post_id;
$ref = '1234567890';//$_SERVER['HTTP_REFERER'];
$addr = utf8_decode( $addr );
$addr = convert_cyr_string( $addr, 'i', 'w' );
imagestring($im, 10, 10, 7, $addr, $text_color);

imagettftext ($im, 20, 0, 10, 50, $text_color, "calibri.ttf", $addr);
//imagettftext ($im, 20, 0, 10, 100, $text_color, "CALIBRI.TTF", $ref);

imagepng($im);
imagedestroy($im);
?>