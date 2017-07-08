<?
//try{
	$oms=new OMSAdapter($_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/config.ini');
	$fimi=new FIMIAdapter($_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/config.ini');
	$vtbi=new VTBIAdapter($_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/config.ini');

	$data['telebank'] = $_SESSION['telebank'];
	$data['InfoType'] = 'GetContractList';
    $data['Format'] = '1';
    //$data['Ident'] = '14624478';
	$data['Ident'] = '293';
    $data['IdentType'] = '3';
	//ech($_SESSION);
	
	$getinf = $vtbi->GetBackOfficeInfo($data);
	$lis = $vtbi->getArray($getinf, 'Body GetBackOfficeInfoRp Response');
	//var_dump($getinf);
	$b64 = $lis[0]['Value'];
	$b64d = base64_decode($b64);
	preg_match_all('/<ContractNo>(.*)<\/ContractNo>/', $b64d, $match);
	$b64list = $match[0];
	//$ctab = $cont->load_cont($b64list, 'cell');
	$ctab = implode('</td></tr><tr><td>', $b64list);
	$ctabl = '<table class="table"><tr><td>'.$ctab.'</td></tr></table>';
	//ech($b64list);
	//ech(base64_decode('PENvbnRyYWN0Tm8+0JLQndChLTAwMDQvNjwvQ29udHJhY3RObz4NCjxDb250cmFjdE5vPtCS0J3QoS0wMDE4LzLQkdCaPC9Db250cmFjdE5vPg0KPENvbnRyYWN0Tm8+0KLQoTItMDA1LTAwMDEzPC9Db250cmFjdE5vPg0KPENvbnRyYWN0Tm8+0KLQoTItMDA1LTAwMDE0PC9Db250cmFjdE5vPg0K'));
	//$contracts = $vtbi->getArray(base64_decode($b64));
	//ech($contracts);
	//ech(htmlspecialchars(base64_decode($b64)));
	//ech((array)(base64_decode($b64)));
	
	//$acctab = $cont->load_cont($acctsall, 'acctsrow');
	

?>

<div class="row">
<div class="col-md-6 col-md-offset-3 shad3">

<div class="row">
	<div class="col-md-12">
	<h4>Договоры</h4>
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
				echo $ctabl;

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