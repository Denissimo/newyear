<?

	
	$cardheads['PAN'] = $_SESSION['telebank'];
	$cardheads['PIN'] = $_SESSION['PIN'];
	$cardheads['KeyId'] = $_SESSION['KeyId'];
	
	$res = $vtbi->sendData('Cards', $cardheads);
	//ech(htmlspecialchars($res));

	$lis[0] = $vtbi->getArray($res, 'Body CardsRp Response Accts Row');
	$lis[1] = $vtbi->getArray($res, 'Body CardsRp Response List Row');
	$lis[2] = $vtbi->getArray($res, 'Body CardsRp Response Messaging Row');

	
	$cardlist[0]['Account'] = '<b>Счёт</b>';
	$cardlist[0]['PAN'] = '<b>Номер карты</b>';
    $cardlist[0]['MBR'] = '<b>МБР</b>';
    $cardlist[0]['Status'] = '<b>Статус</b>';
    $cardlist[0]['ExpDate'] = '<b>Срок действия</b>';
    $cardlist[0]['FIO'] = '<b>ФИО</b>';
    $cardlist[0]['LastUsed'] = '<b>Использовано</b>';
    $cardlist[0]['Type'] = '<b>Тип</b>';
    $cardlist[0]['LimCurrency'] = '<b>Валюта</b>';
    $cardlist[0]['CanChangeTitle'] = '<b>Изм. заголовок</b>';
    $cardlist[0]['CanChangeStatus'] = '<b>Изм. статус</b>';
    $cardlist[0]['PasswordExists'] = '<b>Существует пароль</b>';
    $cardlist[0]['NameOnCard'] = '<b>Название</b>';
    $cardlist[0]['Enrolled'] = '<b>Entrolled</b>';
    $cardlist[0]['PrefixId'] = '<b>Префикс</b>';
    $cardlist[0]['ECUseCardSettings'] = 0;
    $cardlist[0]['ECNeedStaticAuth'] = 0;
    $cardlist[0]['ECNeedDynPwdAuth'] = 0;
    $cardlist[0]['ECNeedCAPAuth'] = 0;
    $cardlist[0]['ECNeedTokenAuth'] = 0;
	//ech($lis);
	if(is_array($lis[0])){
		foreach($lis[0] as $key=>$val){
			$cardacc[$val['PAN']][] = $val['Account'];
		}
	}
	
	if(is_array($cardacc)){
		foreach($cardacc as $key=>$val){
			$cardaccount[$key] = implode('<br />', $val);
		}
	}
	
	if(is_array($lis[1])){
		foreach($lis[1] as $key=>$val){
			$lis[1][$key]['Account'] = $cardaccount[$lis[1][$key]['PAN']];
		}
	}
	$cardall = array_merge($cardlist, $lis[1]); 
	//ech($cardaccount);
	//ech($cardall);

	//ech(htmlspecialchars($b64d));

?>