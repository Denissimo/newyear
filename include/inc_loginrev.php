<?
/*
ech ($_SESSION['logged']);
ech ($proc->sys['config']['loginoblig']['val']);
ech ($proc->tabdata["sys_urls"][$url_label]["label"]);
*/
//ech($proc->sys);

//вместо $proc->sys['config']['loginurl']['val'] нужно определять метку по url

if(!$_SESSION['logged'] and $proc->tabdata["sys_urls"][0]["label"]!= $proc->sys['config']['loginurl']['val'] and $proc->sys['config']['loginoblig']['val']!=0){
	if($proc->label and $proc->label!='post' and  $proc->label!='templejs' and $proc->label!='forumpost'){
		$_SESSION['backlab'] = $proc->label;
	}
	//echo 'mod_loginrev IF '.$proc->label.'<br />';
	header('Location: /'.$proc->sys['config']['loginurl']['val']);
}elseif($_SESSION['logged'] and $proc->tabdata["sys_urls"][0]["label"]!=$proc->sys['config']['loginurl']['val']){
	//echo 'mod_loginrev ELSE '.$proc->label.'<br />';
	//echo 'identif '.$proc->identif.'<br />';
	if($proc->label and $proc->label!='post' and  $proc->label!='templejs' and $proc->label!='forumpost'){
		$_SESSION['backlab'] = $proc->label;
	}
}
?>