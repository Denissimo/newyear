<?
$proc->mod['index'] = 1;
$proc->fetch('typevents');
unset($proc->mod);

//ech($proc->tabdata['sys_content']); 
	
$i=0;
while($proc->tabdata['typevents'][$i]['id_tev']){
	
	//echo'<br />'.'=>'.$proc->tabdata['typevents'][$i]['typevent'].'=>'.$proc->tabdata['sys_content']['typevent']['content'].'=>';
	//if($proc->tabdata['typevents'][$i]['id_tev'] == $_SESSION['typevent']){
	if($proc->tabdata['typevents'][$i]['typevent']==$proc->tabdata['sys_content']['typevent']['content']){
		$selected = ' SELECTED';
		//echo '<br />BINGO!!!<br />';
	}
	$sel.=('<OPTION value='.$proc->tabdata['typevents'][$i]['id_tev'].$selected.'>'.$proc->tabdata['typevents'][$i]['typevent'].'</OPTION>');
	unset($selected);
	//echo $proc->tabdata['typevents'][$i]['id_tev'].'	'.$_SESSION['typevent'].'<br />';
	$i++;
}

//ech ($proc->tabdata['sys_content']);

for($i=0; $i<24;$i++){
	$timcont = explode(":", $proc->tabdata['sys_content']['timevent']['content']);
	$num_i = sprintf('%02u', $i);
	if($timcont[0]==$num_i){
		$selected = ' SELECTED';
	}
	//echo '<br />'.$timcont[0].'|'.$num_i;
	//echo '<br />OPTION value='.$num_i.'0000'.$selected.'|'.$num_i.':00'.'/OPTION';
	$tim.=('<OPTION value='.$num_i.'0000'.$selected.'>'.$num_i.':00'.'</OPTION>');
	unset($selected);
}

$proc->tabdata['sys_content']['typevent']['content'] = $sel;
$proc->tabdata['sys_content']['timevent']['content'] = $tim;


?>