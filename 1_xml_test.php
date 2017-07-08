<?

header("Content-Type: text/xml");
header("Expires: Thu, 19 Feb 2014 13:24:18 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0,pre-check=0");
header("Cache-Control: max-age=0");
header("Pragma: no-cache");

$xml=new DomDocument('1.0','utf-8');
$sorts = $xml->appendChild($xml->createElement('sorts'));
$sort = $sorts->appendChild($xml->createElement('sort'));
$name = $sort->appendChild($xml->createElement('name'));
$name->appendChild($xml->createTextNode('Яблоко'));
$xml->formatOutput = true;
echo $xml->saveXML();
//$xml->save('goods.xml');


//print_r($xml);



//$rss =  simplexml_load_file('http://partner.market.yandex.ru/pages/help/YML.xml');
//$rss = get_object_vars($rss);

//include "functions/fun_array2xml.php";
/*
echo '<pre>';
print_r($rss);
echo '</pre>';
*/

//phpinfo();
?>