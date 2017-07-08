<?php
session_start();
include('config.php');


//echo'+++++';
$lan['pin']='1111';
$lan['login']='79057107350';

//$lan['login']='79261234215';
//try{
  $oms=new OMSAdapter('config.ini');
  $fimi=new FIMIAdapter('config.ini');
  $vtbi=new VTBIAdapter('config.ini');
  
  
  $get_pan = $vtbi->GetPan($lan);
  
  if($get_pan){
	  $_SESSION['telebank'] = $get_pan;
  }
  
  $lan['telebank'] = $_SESSION['telebank'];
  $log_on = $vtbi->Logon($lan);
  if($log_on['KeyId']){
	  $_SESSION['KeyId'] = $log_on['KeyId'];
  }
  //print_r($lan);
  /*
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
  */
  //$lan['KeyId'] = $_SESSION['KeyId'];
  
  echo '<pre>';
  print_r($lan);
  echo '</pre>';
  
  $accts = $vtbi->Accts($lan);
  $lis = $vtbi->getArray($accts);
  //$act_txt = htmlspecialchars($accts);
  
  //$act_xml = simplexml_load_string($accts);
  //$act_xml = new SimpleXMLElement($act_txt);
  echo '<pre>';
  //print_r($log_on['response']);
  //print_r($act_xml->Body->AcctsRp->Response->List);
  //print_r($act_xml->Body);
  print_r($lis);
  //var_dump($act_xml);
  //echo $act_txt;
  //print_r(htmlspecialchars($log_on['response']));
  //echo htmlspecialchars($act_txt);
  //var_dump($log_on);
  //var_dump($get_pan);
  echo '</pre>';
  //header("Content-type: text/xml; charset=utf-8");
  //print_r($log_on['response']);
  //$act_arr = (array)$accts;
  //$act_nam=$accts->getNamespaces(FALSE);
  //print_r($act_txt);
/*
  }
catch(TymException $e){
  $logger->error($e->getMessage());
  print_r($e->getMessage());
}
catch(Exception $e){
  $logger->error($e->getMessage());
  print_r('Excep');
  print_r($e->getMessage());
}
*/
//$vtbi->pinBlock('7159CBFF8D1C398A79B7D0542F046A73',$PAN,'1234');
//$vtbi->GetKey();
//$vtbi->PINChange('0000001125795409','1234');
//$vtbi->ChangePassword('1234');
//$vtbi->ChangeTextLogin('79265766710');
?>
