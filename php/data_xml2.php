<?
header('Content-type: text/html; charset=utf-8');
/*
header('Content-Type: text/xml');
header('Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Cache-Control: post-check=0,pre-check=0');
header('Cache-Control: max-age=0');
header('Pragma: no-cache');
*/
$xmlstr = '<SIG_AirShop>
<SIG_AirShopRQ CustomerID="talarii">
    <Itinerary>
        <OriginDestination ODRef="1" To="mow" From="par" Date="2013-03-10"/>
        </Itinerary>
    <PaxTypes>
        <PaxType Count="1" AgeCat="ADT" PTRef="adt0"/>
    </PaxTypes>
</SIG_AirShopRQ>
</SIG_AirShop>
';





$xml = new DOMDocument('1.0', 'utf-8');
$sxml = new SimpleXMLElement($xmlstr);

$root = $xml->loadXML($xmlstr);
//$sxml = simplexml_load_string($xmlstr);

$rres = $xml->saveXML();


$options = array('trace' => true,
				'login'=>'talarii', 
				'password'=>'iU/Jvxteld'); 

$client = new  SoapClient('https://sigag.tais.ru/SIG?WSDL', $options); 				
var_dump($client->__getFunctions());
var_dump($client->__getTypes());
try {
	$result = $client->SIG_Request($sxml);
} catch (Exception $e) {
    echo 'Выброшено исключение: '.$e->getMessage()."<br /> Response:".$client->__getLastResponse()."<br />";
}
print_r($xml);
echo '<br />';
print_r($sxml);
print_r($rres);
?>