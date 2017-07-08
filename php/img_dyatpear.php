<?

header('Content-Type: image/png');
$code = '
$im = imagecreatetruecolor(500, 300);
$red = imagecolorallocate($im, 255, 0, 0);
//$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);
$green = imagecolorallocate($im, 0, 128, 0);

// Make the background transparent
//imagecolortransparent($im, $black);

// Draw a red rectangle
imagefilledrectangle($im, 0, 0, 500, 300, $green);
imagefilledrectangle($im, 20, 20, 480, 280, $white);
$addr = "Пробная надпись";
//$addr = convert_cyr_string( $addr, "w", "i" );

imagettftext ($im, 40, 0, 50, 100, $red, "calibrib.ttf", $addr);

imagepng($im);
imagedestroy($im);
';
ob_start();
eval($code);
$cont1 = ob_get_clean();
echo $cont1;
?>