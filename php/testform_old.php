<!--
<div class="row">
  <div class="col-md-1 red">.1</div>
  <div class="col-md-1 blue">.1</div>
  <div class="col-md-1 red">.1</div>
  <div class="col-md-1 blue">.1</div>
  <div class="col-md-1 red">.1</div>
  <div class="col-md-1 blue">.1</div>
  <div class="col-md-1 red">.1</div>
  <div class="col-md-1 blue">.1</div>
  <div class="col-md-1 red">.1</div>
  <div class="col-md-1 blue">.1</div>
  <div class="col-md-1 red">.1</div>
  <div class="col-md-1 blue">.1</div>
</div>
<div class="row-fluid">
  <div class="col-md-8">.col-md-8</div>
  <div class="col-md-4">.col-md-4</div>
</div>
<div class="row-fluid">
  <div class="col-md-4">.col-md-4</div>
  <div class="col-md-4">.col-md-4</div>
  <div class="col-md-4">.col-md-4</div>
</div>
<div class="row-fluid">
  <div class="col-md-6 red">.col-md-6</div>
  <div class="col-md-6 blue">.col-md-7</div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8 blue">.col-xs-12 .col-sm-6 .col-md-8</div>
  <div class="col-xs-6 col-md-4 red">.col-xs-6 .col-md-4</div>
</div>
<div class="row">
  <div class="col-xs-6 col-sm-4 blue">.col-xs-6 .col-sm-4</div>
  <div class="col-xs-6 col-sm-4 red">.col-xs-6 .col-sm-4</div>

  <div class="clearfix visible-xs-block red"></div>
  <div class="col-xs-6 col-sm-4 blue">.col-xs-6 .col-sm-4</div>
</div>

-->

<div class="row">
	<div class="col-md-12 green">
	<form action= "[{post}]" method="POST">
	<input type="hidden" name="login" value="SH">
	<input type="hidden" name="pass" value="3855359">
	<input type="submit" name="testpsologin" value = "Адеваж">
	</form>
	</div>
</div>	


<div class="row">
	<div class="col-md-12 red">
	<form action= "http://pso_test.2tbank.ru:2222/PSO.svc/json/PSOCabinAuth/" method="POST">
	<input type="hidden" name="login" value="SH">
	<input type="hidden" name="pass" value="3855359">
	<input type="submit" name="tespsologin" value = "Адеваж">
	</form>
	
	</div>
</div>
<div class="row">
	<div class="col-md-12 blue">
<p id="p1">
	<?
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
		
		unset($lifshits);
		$lifshits['temp_id'] = $dec->PSOCabinAuthResult->temp_id;
		$postdata = json_encode($lifshits);
		echo $postdata;
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
		$dec = json_decode($res);
		$pso = $dec->PSOCabinGetCardsListResult;
		ech($dec->PSOCabinGetCardsListResult->Good_password );
		/*
		foreach($pso as $key=>$val){
			echo $key.'<br />';
		}
		*/

		
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
					


		//$xmlplat = '<a></a>';
		
		$servplat = 'http://10.0.2.29:8080/axis2/services/banking?wsdl';
		$sxmlplat = new SimpleXMLElement($xmlplat);
		ech($sxmlplat);
		
		$options = array('trace' => true);
		$client = new  SoapClient($servplat, $options);
		$result = $client->authClient($arrplat);
		$oper = $client->cellOperator(array('_phoneNumber'=>'9261234215'));
		$paytools = $client->payTools(array('_sessionId'=>$result->return->sessionId));
		ech($paytools);
		ech($result->return->sessionId);
		
		echo'<pre>SOAP:<br />';
		var_dump($client->__getTypes());
		var_dump($client->__getFunctions());
		echo'</pre>';
		/**/

		$xmlstr = '<SIG_AirShopRQ CustomerID="talarii">
			<kuku>
				<Itinerary>
				<OriginDestination ODRef="1" To="mow" From="par" Date="2013-03-10"/>
				</Itinerary>
			</kuku>
			<PaxTypes>
				<PaxType Count="1" AgeCat="ADT" PTRef="adt0"/>
			</PaxTypes>
		</SIG_AirShopRQ>';
		$sxml = new SimpleXMLElement($xmlstr);
		$sxml_branch = '>kuku>Itinerary>OriginDestination@attributes>Date';
		$qwe = preg_match_all("/(>|@|\|)([a-zA-Zа-яА-я0-9_\-]*)/", $sxml_branch, $match);
		//ech($match);
		$xess = go_deep($sxml, $match);
		$at = 'attributes';
		$da = 'Date';
		//$attr = $xess->attributes();
		//ech($attr->Date);
		//ech(count((array)$xess));
		//ech($xess);
		$zero = 0;
		echo($sxml->kuku->Itinerary->OriginDestination->$at()->$da);
		//echo 'test::<br />';
		
		foreach($xess as $key=>$val){
			echo $key.'=>'.$val.' ('.gettype($val).').<br />';
			//ech($val);
		}
		
		
		
		//ech($sxml->kuku->$dd);
		$test['qwerty']['asdf']['zxcvbn']['123456']['0987']['zxcdsa'] = 122;
			
		//$asd = '|qwerty>asdf|zxcvbn>123456>0987|zxcdsa';
		$asd = '|qwerty|asdf|zxcvbn|123456|0987|zxcdsa';
		//$asd = 'qwertyasdfzxcvbn1234560987zxcdsa';
		//$asd = '->qwerty[asdf]->zxcvbn->[123456][0987]->zxcdsa';
		//ech($asd);
		//$qwe = preg_match_all("/->([a-zA-Zа-яА-я0-9_\-]*)(->|\{)|\[([a-zA-Zа-яА-я0-9_\-]*)\]/", $asd, $mat1);
		//$qwe = preg_match_all("/(>|\|)([a-zA-Zа-яА-я0-9_\-]*)/", $asd, $mat1);
		
		//$qwe = preg_match_all("/>([a-zA-Zа-яА-я0-9_\-]*)/", $asd, $mat1);
		//$zxc = preg_match_all("/\|([a-zA-Zа-яА-я0-9_\-]*)/", $asd, $mat2);
		//ech($qwe);
		//ech($mat1);
		//$res00 = substr($mat1[0][0],1);
		//ech($res00);
		$tess = parse_obj($test, $asd);
		ech($tess);

		

	?>
	</p>
	</div>
</div>

<div id="div1" style="width:300px; height:50px; background:#CCFFFF;float:left;display:inline;">
<form action= "http://88.198.1.66:5555/api/auth/" method="POST">
<input type="text" name="username" value="LOGIN">
<input type="text" name="pswd" value="PASSWORD">
<input type="submit" name="sub" value="Авторизация">
</form>
</div>

<div id="div2" style="width:180px; height:50px; background:#FFCCFF;float:left;display:inline;">
<form action= "http://88.198.1.66:5555/api/auth/info/" method="POST">
<input type="submit" name="sub" value="Инфо по авторизации">
</form>
</div>

<div id="div3" style="width:150px; height:50px; background:#FFCCCC;float:left;display:inline;">
<form action= "http://88.198.1.66:5555/api/transactions/accounts/" method="POST">
<input type="submit" name="sub" value="Список счетов">
</form>
</div>

<div id="div4" style="width:150px; height:50px; background:#FFFFCC;float:left;display:inline;">
<form action= "[{testgetpost}]" method="POST">
<input type="submit" name="sub" value="Проба GET/POST">
</form>
</div>

<div id="div5" style="width:120px; height:50px; background:#CCFFCC;float:left;display:inline;">
<form action= "[{testgetpost}]" method="POST">
<input type="submit" id="tes01" name="sub" value="AJAX (прямой)">
</form>
</div>
<div id="div6" style="width:120px; height:50px; background:#CCCCFF;float:left;display:inline;">
<form action= "[{testajpost}]" method="POST">
<input type="submit" id="tes02" name="testpsologin" value="AJAX &#8375;" style="font-family: Arial Rubl Sign;">
</form>
</div>



<!--
<div id="d1" style="width:100px;height:100px;background:red;">1</div>
<div id="d2" style="width:100px;height:100px;background:green;">2</div>
-->

<!--
<form action= "http://88.198.1.66:5555/api/transactions/" method="POST">
<input type="text" name="account_id" value="909">
<input type="text" name="date_from" value="01.01.2000">
<input type="text" name="date_to" value="01.09.2014">
<input type="submit" name="sub" value="Список операций">
</form>


<form action= "http://88.198.1.66:5555/api/auth/logout/" method="POST">
<input type="submit" name="sub" value="Logout">
</form>

<form action= "http://88.198.1.66:5555/api/auth/" method="POST">
<input type="text" name="username" value="LOGIN">
<input type="text" name="pswd" value="PASSWORD">
<input type="submit" name="sub" value="123">
</form>
-->