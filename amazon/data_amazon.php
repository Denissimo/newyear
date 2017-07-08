+<?
//echo '++++++++';
require_once 'sdk.class.php';
//phpinfo();

//echo getenv('HOME');
//$ec2 = new AmazonEC2();
//$ec2->path_style = true;

//$datts = array(


$sdb = new AmazonSDB();

$domain = 'sdktestomni';
//$response = $sdb->create_domain($domain);
//$response = $sdb->list_domains($domain);

$response = $sdb->select("SELECT * FROM $domain");// WHERE ASDF='2'");
//$ress = $response->body->Item();
//$ress = $response->body->SelectResult->Item;


$ress = (array)$response->body->SelectResult;

//$ress = simplexml_import_dom($ress);

/*
$ress = get_object_vars($ress);
$ress = get_object_vars($ress['body']);
$ress = get_object_vars($ress['SelectResult']);
*/

//echo get_class($ress);


function obj2arr($obj){
	foreach($obj as $key => $value){
		if(is_object($obj[$key])){
			$obj[$key]=get_object_vars($obj[$key]);
			//$obj[$key]=simplexml_import_dom($obj[$key]);
			echo '<br /><font color="red">Objedct-> key: '.$key.'	obj: </font>'.is_object($value);
			//print_r($obj[$key]);
		}
		if(is_array($obj[$key])){
			$obj[$key] = obj2arr($obj[$key]);
			echo '<br /><font color="blue">Array-> key: '.$key.'	obj: </font>'.is_object($value);
		}
		//echo '<br />key: '.$key.'	value: '.$value.'	obj: '.is_object($value);
	}
	return $obj;
}


$res2 = obj2arr($ress['Item']);

echo '<br /><font color="#008000">'.$res2[0]['Attribute'][0]['Name'];

echo '<pre>';
//print_r($ress->body->SelectResult->Item[2]->Attribute[1]->Value[0]);
//print_r($ress['Item']);
print_r($res2);
echo '</pre></font>';
echo '+++';

//<a href="http://d1un85p0f2qstc.cloudfront.net/fundamentals_sdb/fundamentals_sdb-desktop.m4v">тыц</a>
?>
