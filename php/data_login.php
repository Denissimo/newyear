<?
if($_SESSION['logged'] and $proc->sys['config']['loginback']['val']==1){
	
	if($proc->sys['config']['loginbacklabel']['val']){
		//$addr = $proc->by_label($proc->sys['config']['loginbacklabel']['val']);
		//ech($proc->sys['config']['loginbacklabel']);
		$addr = $proc->chpu_par['address'][$proc->sys['config']['loginbacklabel']['val']];
	}else{
		//$addr = $proc->by_label($_SESSION['backlab']);
		$addr = $proc->chpu_par['address'][$_SESSION['backlab']];
		//echo "NO sys['config']['loginbacklabel']['val']<br />";
	}
	if(!$addr){
		$addr = '/';
	}
	unset($_SESSION['backlab']);
	header("Location: ".$addr);
	//echo 'addr: '.$addr;
}
if(!$_SESSION['logged']){
	$filter = 'loginbut';
	//$filter = 'loginouter';
}else{
	$filter = 'logoutbut';
}
/*
$proc->mod['filter'] = 'nam="'.$filter.'"';
$proc->mod['index'] = 1;
$proc->fetch('sys_forms');
ech($form->forms);
*/

//echo $_SESSION['sys_tmp']['message'];
echo $form->forms[$filter];//$proc->tabdata['sys_forms']['0']['forms'];
//echo '<br />';
//echo $form->forms['loginbut'];
//ech($proc->label);
echo '<br /><a href="[{reg}]">Регистрация</a>';
//ech($_SESSION);
//dropsess(droplist);

?>