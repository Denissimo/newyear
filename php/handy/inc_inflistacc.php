<?
	//ech($temps);
	
	$proc->mod['filter'] = 'label IN("b-bank__wrap", "b-bank-card", "b-bank")';
	//$proc->mod['index'] = 1;
	$proc->fetch('sys_temps');
	$temps = $proc->tabdata['sys_temps'];

	$temp_id['temp_id'] = $_SESSION['temp_id'];
	$dec = $form->pso($temp_id, 'PSOGetPlatfonAccountsInfo');
	$accs = $dec->PSOGetPlatfonAccountsInfoResult;

	$bank_wrap = '';
	$cardtypes = array(1=>'ae', 4=>'visa', 5=>'mc', 6=>'cm');
	
	//$proc->fetch('tt_curr');
	//$curr_codes = $proc->tabdata['tt_curr'];
	
	$curr_code[810] = '<i class="rubl">o</i>';
	$curr_code[978] = '&euro;';
	$curr_code[840] = '$';
	
	$proc->fetch('tt_acctypes');
	//ech($proc->tabdata['tt_acctypes']);
	foreach($accs as $key=>$val){
		
		//echo $key.'<br />';
		if(count($val->CardArray)>0){
			foreach($val->CardArray as $kkey=>$vval){
				$bcard['b-bank__card']=$vval->PAN;
				$bcard['card_type']='<i class="'.$cardtypes[$vval->PAN[0]].'"></i>';
				$b_card = $cont->load_cont($bcard, $temps['b-bank-card']['temp']);
				$bank_card.=$b_card;
			}
		}
		$bwrap['b-bank__small-number']=$val->account_number;
		$bwrap['b-bank__type_number']=$val->account_number;
		$number = $bwrap['b-bank__type_number'];
		$curr = substr($bwrap['b-bank__type_number'], 5, 3);
		//echo 'curr: '.$curr.'<br />';
		$bwrap['b-bank__acc-summ']=$val->SaldoA;
		$bdatasum[$curr]+= $bwrap['b-bank__acc-summ'];
		$bwrap['currency']= $curr_code[$curr];//'<i class="rubl">o</i>';
		$bwrap['b-bank__acc-summ_convert']='';
		$bwrap['b-bank__name'] = $proc->tabdata['tt_acctypes'][$number]['acc_nam'];
		if(!$bwrap['b-bank__name']){
			$bwrap['b-bank__name']='2Т Банк';
		}
		$bwrap['convert_currency']='';
		//$bwrap['b-bank__name']='2Т Банк';
		$bwrap['b-bank_card']=$bank_card;
		$bwrap['b-bank__type_role']= $proc->tabdata['tt_acctypes'][$number]['acc_role'];
		$bwrap['ID']=$val->ID;
		
		$bwrap['b-bank__type_role']='Роль';
		$b_bwrap = $cont->load_cont($bwrap, $temps['b-bank__wrap']['temp']);
		$bank_wrap .= $b_bwrap; 
	}

	foreach($bdatasum as $key=>$val){
		$bdata['b-bank__total'] .='<span class="label label-info">'.$val.'&nbsp;'.$curr_code[$key].'</span>&nbsp;';
	}
	
	$bdata['img_bank_logo'] = 'bank_logo.png';
	$bdata['b-bank__wrap'] = $bank_wrap;
	
	$inflistacc = $cont->load_cont($bdata, $temps['b-bank']['temp']);

?>