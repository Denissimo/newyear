<?
	//ech($_SESSION);
	/*
	$lifshits['login'] = 'SH';
	$lifshits['pass'] = '3855359';
	$postdata = json_encode($lifshits);
	echo $postdata;
	$curlopt['URL'] = 'http://pso_test.2tbank.ru:2222/PSO.svc/json/PSOCabinAuth/';
	$curlopt[RETURNTRANSFER] = 1;
	$curlopt[POST] =  1;
	$curlopt[POSTFIELDS] =  $postdata;//"login=SH&pass=3855359";
	$curlopt[HTTPHEADER] = array(                                                                          
	'Content-Type: application/json', 
	'Host: pso_test.2tbank.ru', 
	'Content-Length: '.strlen($postdata));
	$curlopt[USERAGENT] = "Mozilla/5.0 (Windows NT 6.1 AppleWebKit/537.36 (KHTML, like Gecko Chrome/37.0.2062.103 Safari/537.36"; 
	$res = $form->curlopt($curlopt);
	$dec = json_decode($res);
	ech(json_decode($res));
	*/
	unset($lifshits);
	//echo $_SESSION['temp_id'];
	//$lifshits['temp_id'] = $dec->PSOCabinAuthResult->temp_id;
	$lifshits['temp_id'] = $_SESSION['temp_id'];
	$postdata = json_encode($lifshits);
	//echo $postdata;
	$curlopt['URL'] = 'http://pso_test.2tbank.ru:2222/PSO.svc/json/PSOCabinGetCardsList/';
	$curlopt[RETURNTRANSFER] = 1;
	$curlopt[POST] =  1;
	$curlopt[POSTFIELDS] =  $postdata;//"login=SH&pass=3855359";
	$curlopt[HTTPHEADER] = array(                                                                          
	'Content-Type: application/json', 
	'Host: pso_test.2tbank.ru', 
	'Content-Length: '.strlen($postdata));
	$curlopt[USERAGENT] = "Mozilla/5.0 (Windows NT 6.1 AppleWebKit/537.36 (KHTML, like Gecko Chrome/37.0.2062.103 Safari/537.36"; 
	$res = $form->curlopt($curlopt);
	//$dec = json_decode($res);
	//$pso = $dec->PSOCabinGetCardsListResult;
	//ech($dec->PSOCabinGetCardsListResult->Good_password );
	//ech(obj2arr($dec));
	
	unset($lifshits);
	$curlopt['URL'] = 'http://pso_test.2tbank.ru:2222/PSO.svc/json/PSOGetPlatfonAccountsInfo/';
	$curlopt[RETURNTRANSFER] = 1;
	$curlopt[POST] =  1;
	$curlopt[POSTFIELDS] =  $postdata;//"login=SH&pass=3855359";
	$curlopt[HTTPHEADER] = array(                                                                          
	'Content-Type: application/json', 
	'Host: pso_test.2tbank.ru', 
	'Content-Length: '.strlen($postdata));
	$curlopt[USERAGENT] = "Mozilla/5.0 (Windows NT 6.1 AppleWebKit/537.36 (KHTML, like Gecko Chrome/37.0.2062.103 Safari/537.36"; 
	$res = $form->curlopt($curlopt);
	$dec = json_decode($res);
	//ech(obj2arr($dec));
	ech($dec);
	
	$curlopt['URL'] = 'http://pso_test.2tbank.ru:2222/PSO.svc/json/PSOCabinGetCardsListResult/';
	$curlopt[RETURNTRANSFER] = 1;
	$curlopt[POST] =  1;
	$curlopt[POSTFIELDS] =  $postdata;//"login=SH&pass=3855359";
	$curlopt[HTTPHEADER] = array(                                                                          
	'Content-Type: application/json', 
	'Host: pso_test.2tbank.ru', 
	'Content-Length: '.strlen($postdata));
	$curlopt[USERAGENT] = "Mozilla/5.0 (Windows NT 6.1 AppleWebKit/537.36 (KHTML, like Gecko Chrome/37.0.2062.103 Safari/537.36"; 
	//echo $postdata;
	$res = $form->curlopt($curlopt);
	$dec = json_decode($res);
	//ech($dec);
	//ech(obj2arr($dec));
	
	unset($lifshits);
	$lifshits['temp_id'] = $_SESSION['temp_id'];
	$lifshits['acc_id'] = 12375;
	$lifshits['date_beg'] = "25.08.2014 00:00:00";
	$lifshits['date_end'] = "10.11.2014 00:00:00";
	$postdata = json_encode($lifshits);
	//echo $postdata;
	$curlopt['URL'] = 'http://pso_test.2tbank.ru:2222/PSO.svc/json/PSOCabinGetOpersPeriod2/';
	$curlopt[RETURNTRANSFER] = 1;
	$curlopt[POST] =  1;
	$curlopt[POSTFIELDS] =  $postdata;//"login=SH&pass=3855359";
	$curlopt[HTTPHEADER] = array(                                                                          
	'Content-Type: application/json', 
	'Host: pso_test.2tbank.ru', 
	'Content-Length: '.strlen($postdata));
	$curlopt[USERAGENT] = "Mozilla/5.0 (Windows NT 6.1 AppleWebKit/537.36 (KHTML, like Gecko Chrome/37.0.2062.103 Safari/537.36"; 
	$res3 = $form->curlopt($curlopt);
	//ech($res3);
	$dec3 = json_decode($res3);
	//ech($dec3);
	
	
	$xmlplat = '<Auth>
					<_channelId>5</_channelId>
					<_login>9261234215</_login>
					<_password>YVGM8D</_password>
				</Auth>';
				
	$arrplat = array(
		'_channelId'=>'5',
		'_login'=>'9261234215',
		'_password'=>'YVGM8D'
	);


?>