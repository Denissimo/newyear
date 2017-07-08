<?
//try{
	$oms=new OMSAdapter($_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/config.ini');
	$fimi=new FIMIAdapter($_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/config.ini');
	$vtbi=new VTBIAdapter($_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/config.ini');
	include 'inc_cards.php';
	/*
	$lan['pin']='1111';
	$lan['login']='79057107350';
	$lan['telebank'] = $_SESSION["user_id"];
	*/
	
	$statuses = array(
		0	=>"Inactive account",
		1	=>"Open",
		2	=>"Deposit only",
		3	=>"Open prmary account",
		5	=>"Information only",
		4	=>"Deposit only primary account", 
		9	=>"Closed");

	//ech($_SESSION);
	
	$heads['PAN'] = $_SESSION['telebank'];
	$heads['PIN'] = $_SESSION['PIN'];
	$heads['KeyId'] = $_SESSION['KeyId'];
	//$heads['telebank'] = $_SESSION['telebank'];
	
	//$getinf['telebank'] = $_SESSION['telebank'];
	//$getinf['InfoType'] = 'GetContractList';
	$getinf['InfoType'] = 'GetContractDetailedList';
    $getinf['Format'] = '1';
	$getinf['Ident'] = $_SESSION['userdata']['PersonId'];
    $getinf['IdentType'] = '3';
	

	$getcon['InfoType'] = 'GetContractInfo';
	$getcon['Format'] = '1';
	//$getcon['Ident'] = 'ТС2-005-00013';
	$getcon['IdentType'] = '0';
	
	$contract_type = array('ВН'=>'Депозит', 'ТС'=>'Текущий счёт');
	
	$acchead = $heads;
	$acchead['telebank'] = $_SESSION['telebank'];
	$accts = $vtbi->Accts($acchead);
	$proc->fetch('dat_currcodes');
	$currcodes = $proc->tabdata['dat_currcodes'];
	$lis = $vtbi->getArray($accts, 'Body AcctsRp Response List Row');
	//ech($lis);
	if(is_array($lis)){
		foreach($lis as $key=>$val){
			$number = $lis[$key]['Currency'];
			$status = $lis[$key]['Status'];
			$lis[$key]['Currency'] = $currcodes[$number]['code'];
			$lis[$key]['Status'] = $statuses[$status];
			$lis[$key]['Blocked'] = $lis[$key]['Leger'] - $lis[$key]['Available'];
		}
	}
	//ech($cardall);
	if(is_array($cardall)){
		foreach($cardall as $key=>$val){
			$number = $val['LimCurrency'];
			//echo $number;
			$status = $val['Status'];
			if($currcodes[$number]['code']){
				$cardall[$key]['LimCurrency'] = $currcodes[$number]['code'];
			}
			if($statuses[$status]){
				$cardall[$key]['Status'] = $statuses[$status];
			}
			
		}
	}
	
	$acchead = array(0=>array("Acct" =>"<b>Номер счёта</b>", "Type" =>"<b>Тип</b>", "Currency" =>"<b>Валюта</b>", "Leger" =>"<b>Сумма</b>", "Blocked" =>"<b>Заблокировано</b>","Available" =>"<b>Доступно</b>", "Status" =>"<b>Статус</b>", "CustomerName"=>"<b>Имя</b>"));
	$acctsall = array_merge($acchead, $lis);
	$acctab = $cont->load_cont($acctsall, 'acctsrow');
	$acctabl = '<table class="table">'.$acctab.'</table>';
	

	//ech(htmlspecialchars($accts));
	//ech($acclis);
	
	$prod = $vtbi->sendData('GetBackOfficeInfo', $heads, $getinf);
	//ech(htmlspecialchars($prod));
	$getbacklis = $vtbi->getArray($prod, 'Body GetBackOfficeInfoRp Response');
	$b64 = $getbacklis[0]['Value'];
	$b64d = base64_decode($b64);
	$b64d = xml_to_array($b64d);
	//ech($b64d);
	if(isset($b64d['GetContractDetailedList']['Row'])){
		$b64data = $b64d['GetContractDetailedList']['Row'];
	}else{
		$b64data = array();
	}
	//ech($b64data);
	//ech(htmlspecialchars($b64d));
	
	$conthead[0]['ContrType'] = '<b>Продукт</b>';
	$conthead[0]['ContractNo'] = '<b>Договор</b>';
	$conthead[0]['ContractType'] = '<b>Тип договора</b>';
	$conthead[0]['ContractStatus'] = '<b>Статус</b>';
	$conthead[0]['OpenDate'] = '<b>Дата открытия</b>';
	$conthead[0]['CloseDate'] = '<b>Дата окончания</b>';
	$conthead[0]['Rate'] = '<b>Ставка %</b>';
	$conthead[0]['AccountNo'] = '<b>Счёт/Карта </b>';
	$conthead[0]['Amount'] = '<b>Остаток</b>';
	$conthead[0]['PayAmount'] = '<b>Мой доход</b>';
	$conthead[0]['Prolongate'] = '<b>Пролонгация</b>';
	$conthead[0]['ProlongateCount'] = '<b>Пролонгировано</b>';
	
	$contract_type = array('ВН'=>'Депозит', 'ТС'=>'Текущий счёт');
	$contract_status = array(' '=>'Открыт.', ''=>'Открыт', '1'=>'Закрыт');
	//echo $contract_status[' '];
	foreach($b64data as $key=>$val){
		$contype = mb_substr($val['ContractNo'], 0, 2);
		$b64data[$key]['ContrType'] = $contract_type[$contype];
		$b64data[$key]['ContractStatus'] = $contract_status[$b64data[$key]['ContractStatus']];
		$b64data[$key]['refill'] = '<a href="[{recharge}]/'.$val['AccountNo'].'"><button class="btn btn-sm btn-info">Пополнить</button></a>';
		//ech($arr);
	}
	//ech($b64data);
	$contracts = array_merge($conthead, $b64data);
	$ctab = $cont->load_cont($contracts, 'contractsrow');
	$ctabl = '<table class="table">'.$ctab.'</table>';
	
	$cardtab = $cont->load_cont($cardall, 'cardsrow');
	$cardtabl = '<table class="table">'.$cardtab.'</table>';
	//$ctab = implode('</td></tr><tr><td>', $b64list);
	//$ctabl = '<table class="table"><tr><td>'.$ctab.'</td></tr></table>';	

?>

<div class="row">
<div class="col-md-8 col-md-offset-2">

<div class="row">
	<div class="col-md-12" align="center">
		<h3>Мои Продукты</h3>

				<?
				echo $ctabl.'<br /><br /><br />'.$acctabl.'<br /><br /><br />'.$cardtabl;
				?>


  
	</div>
</div>


	
</div>
</div>