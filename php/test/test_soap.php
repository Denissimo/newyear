<?
	//ech($_SESSION);
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
	//$servplat = 'http://10.0.2.29:8080/axis2/services/banking?wsdl';
	$servplat = 'http://10.0.31.111:8080/axis2/services/banking?wsdl';
	$sxmlplat = new SimpleXMLElement($xmlplat);
	//ech($sxmlplat);
	
	$options = array('trace' => true);
	$client = new  SoapClient($servplat, $options);
	$func = 'authClient';
	$funech = 'ech';
	$cli = $client;
	
	
	$testres = $funech(11);
	
	$div = '<a href="/"><div class="merchcat" style="background:#FFFFFF url(/img/logotype-merchant/mobile_phone.gif) 10% 50% no-repeat;"><div class="merchname">[>name<]</div></div></a>';
	//echo '<script language="javascript">alert("message");</script>';
	//ech($proc->tabdata['sys_temps']);
	echo $div.$div.$div.$div.$div.$div.$div.$div;

	
	//$result = $client->authClient($arrplat);
	$result = $cli->$func($arrplat);
	ech($result);
	$oper = $client->cellOperator(array('_phoneNumber'=>'9261234215'));
	//ech($oper);
	$paytools = $client->payTools(array('_sessionId'=>$result->return->sessionId));
	$catlist = $client->getCategoryList();
	$opsos = parse_obj($catlist, '>return>categories|0>merchants|2');
	$merchlist = $client->getMerchantList();
	$merch = $client->getMerchant(array('_id'=>$opsos->id));
	//$merchlist = $client->getMerchantList();
	//$merchresp = $client->getMerchantResponse();
	//$gibdd = $client->gibddBills();
	//ech($gibdd);
	
	$ops = parse_obj($merch, '>return>categories|0>merchants|2');
	//ech($opsos->id);
	//ech($merch);
	//ech($merchresp);
	//ech(array_colum(obj2arr($catlist->return->categories), 'name'));
	ech($catlist);
	//ech($catlist->return->categories[1]->merchants[0]);
	//ech($merchlist->return->merchants);
	//ech($paytools);
	//ech($result->return->sessionId);
	
	//ech($catlist->return->categories[0]->merchants[1]);
	//ech($bee);
	
	echo'<pre>SOAP:<br />';
	var_dump($client->__getFunctions());
	var_dump($client->__getTypes());
	
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

	$xess = go_deep($sxml, $match);
	$at = 'attributes';
	$da = 'Date';
	$zero = 0;
	//echo($sxml->kuku->Itinerary->OriginDestination->$at()->$da);
	//echo 'test::<br />';
	
	foreach($xess as $key=>$val){
		//echo $key.'=>'.$val.' ('.gettype($val).').<br />';
		//ech($val);
	}
	
	$azx['qwe']['asd']['zxc'] = 42;
	$bzx = parse_obj($azx, 'qwe');
	//ech($bzx);

?>