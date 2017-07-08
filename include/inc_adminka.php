<?
$admin_button['edit']='<form action="'.$_SERVER['REQUEST_URI'].'" method="post" class="admin_button">
<input type="hidden" name="act" value="edit">
<input type="image" src="/i/edit.png" alt="изменить" title="изменить">
</form>';
$admin_button['cancel']='<form action="'.$_SERVER['REQUEST_URI'].'" method="post" class="admin_button">
<input type="hidden" name="act" value="cancel">
<input type="image" src="/i/cross.png" alt="отмена" title="отмена">
</form>';
if($_POST['act']=='edit'){
	$_SESSION['edit_mode']='edit';
}
if($_POST['act']=='save'){
	//Secho "<br />".$proc->tabdata["sys_urls"][$urr['full']]['url'];
	$urr=get_url();
	if($urr['full']==''){
		$urr['full']='/';
	}
	$fil=fopen($proc->tabdata["sys_urls"][$urr['full']]['url'],'w');
	fwrite($fil, stripslashes($_POST['content']));
	fclose($fil);
	/*
	echo '<pre>';
	//print_r($urr);
	print_r($proc->tabdata["sys_urls"][$urr['full']]['url']);
	echo '</pre>';
	*/
	
	unset($_SESSION['edit_mode']);
}
if($_POST['act']=='cancel'){
	unset($_SESSION['edit_mode']);
}
//$admin_button['edit']='&nbsp;<a href="'.$_SERVER['REQUEST_URI'].'"><img src="/i/edit.png" width="18" height="18" alt="login" /></a>';
//$admin_button['save']='&nbsp;<a href="'.$_SERVER['REQUEST_URI'].'"><img src="/i/save.png" width="18" height="18" alt="login" /></a>';


if($_SESSION['logged']==TRUE){
	$proc->mod["filter"]='login="'.$_SESSION['login'].'"';
	$proc->fetch("users");

	unset($proc->mod["filter"]);
	
	$user_id=$proc->tabdata['users'][$_SESSION['login']]['row_id'];
	
	$proc->mod["filter"]='user_id="'.$user_id.'"';
	$proc->fetch("link_user_acc");

	unset($proc->mod["filter"]);
	
	$proc->mod["filter"]='row_id="'.$proc->tabdata['link_user_acc'][$user_id]['access_id'].'"';
	$proc->mod["index"]=1;
	$proc->fetch("access");
	unset($proc->mod["filter"]);
	unset($proc->mod["index"]);
	
	$adm=explode(' ', $proc->tabdata['access'][0]['param']);
	
	$i=0;
	unset ($access);
	while($adm[$i]){
		$access[$adm[$i]]='GRANTED';
		$adminka.=$admin_button[$adm[$i]];
		$i++;
	}
	
}else{
	$adminka='';
}

if($access['edit']=='GRANTED' and $_SESSION['edit_mode']=='edit'){
	$red_start='<form action="'.$_SERVER['REQUEST_URI'].'" method="post" class="admin_button">
<input type="hidden" name="act" value="save">
<textarea cols="85" rows="40" name="content">';
	$red_stop='</textarea>
<input name="sub" type="submit" value="Сохранить" />
</form>';
}else{
	$red_start='';
	$red_stop='';
}

?>