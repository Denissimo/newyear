<?
function getmicrotime() 
{ 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 

$timestart = getmicrotime();

echo $_GET['index'].'<br />';
require_once 'sdk.class.php';
//phpinfo();


//$datts = array(

$sdb = new AmazonSDB();

//$res = $sdb->select('SELECT * FROM sdktestomni WHERE row_id="108"'); //
//$domain = 'sdktestomni';
//$response = $sdb->create_domain($domain);
//$res = $sdb->list_domains($domain);
$res = $sdb->delete_attributes('sdktestomni', $_GET['index']);
/*
$item1 = array("Name" => "Jeff", "Sex" => "M", "Age" => 49);
$item2 = array("Name" => "Carmen", "Sex" => "F");
$items = array("Jeff" => $item1, "Carmen" => $item2);

$res = $sdb->batch_put_attributes("sdktestomni", $items, true);

$res = $sdb->delete_domain("sdktestomni");
$res = $sdb->create_domain("sdktestomni");

*/
echo '<pre>';
//print_r($res);
echo '</pre>';
echo '<br />+++';

$timefin = getmicrotime();

echo '<br />timer: '.($timefin-$timestart);

?>