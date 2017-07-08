<?
header("Content-Type: text/html; charset=utf-8"); 

if(!$_SESSION["logged"]){
	$_SESSION["logged"]=FALSE;
}

$ref=getenv("HTTP_REFERER");
$part_ref=parse_url($ref);
?>