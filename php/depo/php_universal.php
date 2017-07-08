<?
//try{
	$oms=new OMSAdapter($_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/config.ini');
	$fimi=new FIMIAdapter($_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/config.ini');
	$vtbi=new VTBIAdapter($_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/config.ini');

	/*
	$lan['pin']='1111';
	$lan['login']='79057107350';
	$lan['telebank'] = $_SESSION["user_id"];
	*/
	
	$heads['PAN'] = $_SESSION['telebank'];
	$heads['PIN'] = $_SESSION['PIN'];
	$heads['KeyId'] = $_SESSION['KeyId'];
	
	$getinf['telebank'] = $_SESSION['telebank'];
	$getinf['InfoType'] = 'GetContractList';
    $getinf['Format'] = '1';
	$getinf['Ident'] = '293';
    $getinf['IdentType'] = '3';
	
	$getcon['InfoType'] = 'GetContractInfo';
	$getcon['Format'] = '1';
	$getcon['Ident'] = 'ТС2-005-00013';
	$getcon['IdentType'] = '0';
	
	
	

	//$accts = $vtbi->sendData('Accts', $heads);
	//$res = $vtbi->sendData('GetBackOfficeInfo', $heads, $getinf);
	//$res = $vtbi->sendData('GetBackOfficeInfo', $heads, $getcon);
	//$res = $vtbi->sendData('OperHist', $heads, $operhist);
	$res = $vtbi->sendData('Cards', $heads);
	//ech(htmlspecialchars($res));

	$lis[0] = $vtbi->getArray($res, 'Body CardsRp Response Accts Row');
	$lis[1] = $vtbi->getArray($res, 'Body CardsRp Response List Row');
	$lis[2] = $vtbi->getArray($res, 'Body CardsRp Response Messaging Row');
	//$lis = $vtbi->getArray($accts, 'Body AcctsRp Response List Row');
	//$lis = $vtbi->getArray($res, 'Body GetBackOfficeInfoRp Response');
	//$operhist['Acct'] = $lis1[0]['Account'];
	$operhist['PAN'] = $lis[0][0]['PAN'];
	$operhist['MBR'] = '0';
	$res = $vtbi->sendData('OperHist', $heads, $operhist);
	ech(htmlspecialchars($res));
	//ech($lis);
	$b64 = $lis[0]['Value'];
	$b64d = base64_decode($b64);

	//ech(htmlspecialchars($b64d));

?>

<div class="row">
<div class="col-md-6 col-md-offset-3 shad3">

<div class="row">
	<div class="col-md-12">
	<h4>Тестовый кабинет</h4>
	<?
	ech($lis);
	?>
  
	</div>
</div>


	
</div>
</div>