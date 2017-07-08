<?php
/*require_once "PHPTelnet.php";

$telnet = new PHPTelnet();

// if the first argument to Connect is blank,
// PHPTelnet will connect to the local host via 127.0.0.1
$result = $telnet->Connect('91.227.244.215:4206',null,null);
echo $result;*/
?>
<?php
$options = array( 
    'location'=>'http://91.227.244.215:4206'
	,'uri'=>'http://localhost:8080/mobi/wsdl/fimi.wsdl'
	,'soap_version'=>SOAP_1_2
    ,'exceptions'=>true
	,'trace'=>1
	,'stream_context' => stream_context_create(array('http' => array('protocol_version' => 1.0)))
	,'proxy_host'=>'10.0.1.46'
	,'proxy_port'=>'8080'
);
try { 
    $fimi = new SoapClient("wsdl/fimi.wsdl",$options);
	$fimiMethods=$fimi->__getFunctions();
	$fimiTypes=$fimi->__getTypes();
	$request=array(
		"_"=>""	
		,"Ver"=>"1.2"	
		,"Clerk"=>"OPERATOR"
		,"Password"=>"FIMI"
		,"Product"=>"FIMI"
	);
	$logonRequest=new SoapVar($request,SOAP_ENC_OBJECT,"LogonRq","http://schemas.compassplus.com/two/1.0/fimi_types.xsd");
	$wrapper["Request"]=$logonRequest;
	//$logonResponse=$fimi->LogonRq($logonRequest);
	$logonResponse=$fimi->LogonRq(array("Request"=>$logonRequest));
	//$logonResponse=$fimi->LogonRq(soapify(array("Request"=>array("Ver"=>"1.2","Clerk"=>"OPERATOR","Password"=>"FIMI"))));
	//$logonResponse=$fimi->LogonRq(new SoapVar('<ns1:LogonRq><ns1:Request Ver="1.2" Product="FIMI" Clerk="OPERATOR" Password="FIMI"></ns1:Request></ns1:LogonRq>',XSD_ANYXML));
	//$logonResponse=$fimi->__soapCall("LogonRq",array(new SoapVar('<ns1:LogonRq><ns1:Request Ver="1.2" Product="FIMI" Clerk="OPERATOR" Password="FIMI"></ns1:Request></ns1:LogonRq>',XSD_ANYXML)));
	//echo "<pre>";var_dump($logonResponse);echo "</pre>";
	var_dump($logonResponse);
	
	
} catch (Exception $e) {  
    echo $e->getMessage(); 
}
echo "<h2>Request</h2><pre>".htmlspecialchars($fimi->__getLastRequest())."</pre><h2>Response</h2><pre>".htmlspecialchars($fimi->__getLastResponse())."</pre>";
?>