<?	
	//ech($proc->sys['url']['qty']);
	
	$temp_id['temp_id'] = $_SESSION['temp_id'];
	$dec = $form->pso($temp_id, 'PSOGetPlatfonAccountsInfo');
	//$accs = array_colum(obj2arr($dec->PSOGetPlatfonAccountsInfoResult), 'ID');
	$accs = obj2arr($dec->PSOGetPlatfonAccountsInfoResult);
	$accs_row = $cont->load_cont($accs, 'accstab');
	$accs_tab = '<table border="1"><tr>'.$accs_row.'</tr></table>';
	echo $accs_tab;

	echo'<br/><input type="text" id="date_beg" value="01.08.2014"><input type="text" id="date_end" value="25.08.2014">';//<button class="btn letsplay">OK</button>';
	echo '<header class="operations-header">
										<h2 class="operations-title">Последние операции</h2><a href="#" class="operations-more">По всем счетам</a>
									</header>';
	echo '<div class="payhistory">';
	echo '</div>';
	
	//echo '<div class="payhistory" style="width:100%; background:#CCFFCC;">';
	//include 'ajax_infhistory.php';
	//echo '</div>';



?>