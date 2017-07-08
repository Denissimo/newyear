<?

//echo '<br />+++++++++++++++<br />';
//echo chr(219);
$ar_test = array(
					0=>array('nomatter'=>'каждый', 'key'=>'red', 'field'=>'black', 'value'=>100),
					1=>array('nomatter'=>'охотник', 'key'=>'orange', 'field'=>'red', 'value'=>101),
					2=>array('nomatter'=>'желает', 'key'=>'yellow', 'field'=>'orange', 'value'=>102),
					3=>array('nomatter'=>'знать', 'key'=>'green', 'field'=>'yellow', 'value'=>103),
					4=>array('nomatter'=>'где', 'key'=>'blue', 'field'=>'yellow', 'value'=>104),
					5=>array('nomatter'=>'сидит', 'key'=>'indigo', 'field'=>'blue', 'value'=>105),
					6=>array('nomatter'=>'фазан', 'key'=>'violet', 'field'=>'green', 'value'=>106),
					7=>array('nomatter'=>'обама', 'key'=>'black', 'field'=>'', 'value'=>107)
				);
	
	$tree->par_field = 'field';
	$tree->par_key = 'key';
	$tree->par_row = 'nomatter';
	/*
	$tree->par_field = 'parent';
	$tree->par_key = 'label';
	*/
	//$arr_t = $tree->draw_root($ar_test);
	
	//$proc->fetch('sys_urls');
	//$arr_t = $tree->draw_root($proc->tabdata['sys_urls']);
	//ech($xml->br_arr);
	//ech($arr_t);
	//ech($tree->full_row);
	//ech($tree->datalevel);
	//ech($proc->chpu_tab);
	//$ress = $proc->load_parents($proc->chpu_tab, 'parent', 'label');
	//ech($proc->tree);
	//ech($ress);
	
	//ech($proc->tree);
	//ech($proc->chpu_tab);
	ech($proc->chpu_par);
	//ech($proc->chpu_addr);
	
	
	/*
	if($ress['test9']){
		echo '<br />asdf<br />';
	}
	*/
	
?>