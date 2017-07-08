<?
//echo '++';
	$temp_id['temp_id'] = $_SESSION['temp_id'];
	$temp_id['acc_id'] = $_POST['acc_id'];
	$temp_id['date_beg'] = $_POST['date_beg'];
	$temp_id['date_end'] = $_POST['date_end'];
	$dec = $form->pso($temp_id, 'PSOCabinGetOpersPeriod2');
	$res = $dec->PSOCabinGetOpersPeriod2Result->Statement_of_Account;
	if(count($res)>0){
		$accs = obj2arr($res);
		$opers= $cont->load_cont($accs, 'psooper');
	}
	//ech($dec->PSOCabinGetOpersPeriod2Result->Statement_of_Account);
	echo '<table border="1">';
	echo $opers;
	echo '</table>';
	//ech($accs);
?>