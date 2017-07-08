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
	
	$getinf['telebank'] = $_SESSION['telebank'];
	$getinf['InfoType'] = 'GetContractList';
    $getinf['Format'] = '1';
	$getinf['Ident'] = '293';
    $getinf['IdentType'] = '3';
	
	$getcon['InfoType'] = 'GetContractInfo';
	$getcon['Format'] = '1';
	//$getcon['Ident'] = 'ТС2-005-00013';
	$getcon['IdentType'] = '0';
	
	$contract_type = array('ВН'=>'Депозит', 'ТС'=>'Текущий счёт');
	
	
	$accts = $vtbi->Accts($_SESSION);
	$proc->fetch('dat_currcodes');
	$currcodes = $proc->tabdata['dat_currcodes'];
	//ech($proc->tabdata['dat_currcodes'])
	$lis = $vtbi->getArray($accts, 'Body AcctsRp Response List Row');
	foreach($lis as $key=>$val){
		$number = $lis[$key]['Currency'];
		$status = $lis[$key]['Status'];
		$lis[$key]['Currency'] = $currcodes[$number]['code'];
		$lis[$key]['Status'] = $statuses[$status];
		$lis[$key]['Blocked'] = $lis[$key]['Leger'] - $lis[$key]['Available'];
		
	}
	$acchead = array(0=>array("Acct" =>"Номер счёта", "Type" =>"Тип", "Currency" =>"Валюта", "Leger" =>"Сумма", "Blocked" =>"Заблокировано","Available" =>" Доступно", "Status" =>"Статус", "CustomerName"=>"Имя"));
	$acctsall = array_merge($acchead, $lis);

	//$accth = $cont->load_cont($acchead, 'acctsrow');
	//$acctb = $cont->load_cont($lis, 'acctsrow');
	$acctab = $cont->load_cont($acctsall, 'acctsrow');

	$prod = $vtbi->sendData('GetBackOfficeInfo', $heads, $getinf);
	//ech(htmlspecialchars($prod));
	$lis = $vtbi->getArray($prod, 'Body GetBackOfficeInfoRp Response');
	$b64 = $lis[0]['Value'];
	$b64d = base64_decode($b64);
	//ech(htmlspecialchars($b64d));
	preg_match_all('/<ContractNo>(.*)<\/ContractNo>/', $b64d, $match);
	$b64list = $match[0];
	foreach($b64list as $key=>$val){
		$getcon['Ident'] = $val;
		//ech($getcon);
		$detail = $vtbi->sendData('GetBackOfficeInfo', $heads, $getcon);
		$lis = $vtbi->getArray($detail, 'Body GetBackOfficeInfoRp Response');
		$b64 = $lis[0]['Value'];
		$b64d = base64_decode($b64);
		//ech(htmlspecialchars($b64d));
		$b64d  = xml_to_array($b64d);
		$contype = mb_substr($b64d['GetContractInfo']['ContractNo'], 0, 2);
		$b64d['GetContractInfo']['ContrType'] = $contract_type[$contype];
		//echo '<br />'.$contype;
		$b64d['GetContractInfo']['refill'] = '<a href="[{recharge}]/'.$b64d['GetContractInfo']['AccountNo'].'"><button class="btn btn-mini btn-primary">Пополнить</button></a>';
		$b64data[] = $b64d['GetContractInfo'];
		
	}
	$conthead[0]['ContrType'] = 'Тип счёта';
	$conthead[0]['ContractNo'] = 'Номер договора';
	$conthead[0]['ContractType'] = 'Тип договора';
	$conthead[0]['ContractStatus'] = 'Статус договора';
	$conthead[0]['OpenDate'] = 'Дата открытия';
	$conthead[0]['CloseDate'] = 'Дата закрытия';
	$conthead[0]['Rate'] = 'Ставка %';
	$conthead[0]['AccountNo'] = 'Депозитный счёт ';
	$conthead[0]['Amount'] = 'Сумма';
	$conthead[0]['PayAmount'] = 'Рассчитанные проценты';
	$conthead[0]['Prolongate'] = 'Пролонгация';
	$conthead[0]['ProlongateCount'] = 'Пролонгировано';
	
	$contracts = array_merge($conthead, $b64data);
	$ctab = $cont->load_cont($contracts, 'contractsrow');
	$ctabl = '<table class="table">'.$ctab.'</table>';
	//ech($b64data);
	//$ctab = implode('</td></tr><tr><td>', $b64list);
	//$ctabl = '<table class="table"><tr><td>'.$ctab.'</td></tr></table>';	

?>

<div class="row">
<div class="col-md-8 col-md-offset-2 shad3">

<div class="row">
	<div class="col-md-12">
	<h4>Личный кабинет</h4>
		<ul class="nav nav-tabs">
		  <li role="presentation" class="active"><a data-toggle="tab" href="#acctsinfo">Продукты</a></li>
		  <!--<li role="presentation"><a data-toggle="tab" href="#acctsrekv">Реквизиты</a></li>
		  <li role="presentation"><a data-toggle="tab" href="#acctsoper">Операции</a></li>-->
		</ul>
		
		<div class="tab-content">
			<div id="acctsinfo" class="tab-pane fade in active">
				

				<?
				echo $ctabl;
				?>
				<br /><br />
				<!--<table class="table">
				<?
				//echo $accth;
				//echo $acctb;
								
				
				
				
				//echo $acctab;
				?>
				</table>-->
				
			</div>
			<div id="acctsrekv" class="tab-pane fade">
				Реквизиты
			</div>
			<div id="acctsoper" class="tab-pane fade">
				Операции
			</div>
		</div>
  
	</div>
</div>


	
</div>
</div>