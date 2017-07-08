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
	
	
	//$get_pan = $vtbi->GetPan($lan);
	//$lan['telebank'] = $get_pan;
	//$log_on = $vtbi->Logon($lan);
  
	//$lan['KeyId'] = $_SESSION['KeyId'];
	//ech($lan);
	//$accts = $vtbi->Accts($lan);
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
	
	//ech($acctsall);
//}
/*
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
?>

<div class="row">
<div class="col-md-6 col-md-offset-3 shad3">

<div class="row">
	<div class="col-md-12">
	<h4>Личный кабинет</h4>
		<ul class="nav nav-tabs">
		  <li role="presentation" class="active"><a data-toggle="tab" href="#acctsinfo">Информация</a></li>
		  <li role="presentation"><a data-toggle="tab" href="#acctsrekv">Реквизиты</a></li>
		  <li role="presentation"><a data-toggle="tab" href="#acctsoper">Операции</a></li>
		</ul>
		
		<div class="tab-content">
			<div id="acctsinfo" class="tab-pane fade in active">
				
				<table class="table">
				<?
				//echo $accth;
				//echo $acctb;
				echo $acctab;
;
				?>
				</table>
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