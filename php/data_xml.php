<?
//include '/classes/cls_xml.php';
//include 'data_test3.php';
//echo '<br />XML проба<br />';
//echo strpos($proc->tabdata['sys_urls']['test xml']['header'], chr(13));
//$hhead = $proc->tabdata['sys_urls']['test xml']['header'];
//$hhead = explode(chr(10), $hhead);
//ech($hhead);
$proc->fetch('zz_bukets');
//ech($proc->tabdata['zz_bukets']);
$xml0 = array2xml($proc->tabdata['zz_bukets']);


$xml = new xml();
$xml->arr = $proc->tabdata['zz_bukets'];

$xml->param = array(
	'version'=>'1.0', 
	'encoding'=>'utf-8',
	'root'=>'yml_catalog'
);
$res = $xml->build();

//echo $xml0;
echo $res;
//ech($xml);
//$obb = (object)$proc->tabdata['zz_bukets'];
//$obb->saveXML();
//ech($proc->tabdata['zz_bukets']);
//ech($obb);


?>