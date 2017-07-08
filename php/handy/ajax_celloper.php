<?
$servplat = 'http://10.0.2.29:8080/axis2/services/banking?wsdl';
$options = array('trace' => true);
$client = new  SoapClient($servplat, $options);

$oper = $client->cellOperator(array('_phoneNumber'=>$_POST['phone']));
//$oper = $client->cellOperator(array('_phoneNumber'=>'9057107350'));
$joper = json_encode($oper);
print_r($joper);

?>