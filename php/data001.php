<?
if($_GET['Card']){
	$poeration='card_register';
}

$json=json_encode($_GET);

echo $json;
if($messag){
$headers = "Content-type: text/html; charset=utf-8\n".
	"From: den@rosvet.ru\n". 
	"X-Mailer: PHP/".phpversion()."\n". 
	"Date: ".date("r")."\n". 
	"Reply-To: den@rosvet.ru\n\n"; 
	
	
mail("den@rosvet.ru", "GET проба ".date("H:i:s"), $json, $headers);
}
?>

