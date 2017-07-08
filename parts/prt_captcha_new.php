<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Color scanning</title>
<link rel="stylesheet" href="/styles/additional.css" type="text/css">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
<?
session_start();



$proc->fetch("captcha");


echo '<table border="1">';
for($i=0; $i<100; $i++){
	echo '<tr>';
	for($j=0; $j<16; $j++){
		$n=$i*16+$j;
		$temp=ord($proc->tabdata["captcha"][9]["massive"][$n])-65;
		$bin=binary($temp);	
		$row=cellrow($bin);
		echo $row;
	}
	echo '</tr>';
}
echo '</table>';

/*

$_SESSION["cap"]=rand (10000, 99999);
header("Content-type: image/png");
$im = @imagecreate(88, 31)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 160, 160, 160);
$text_color = imagecolorallocate($im, 20, 20, 120);
imagestring($im, 10, 20, 7,  $_SESSION["cap"], $text_color);
imagepng($im);
imagedestroy($im);
*/
//$proc->close();
?>


</body>
</html>
