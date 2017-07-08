<?
$proc->mod['index'] = 1;
$proc->fetch('sys_accrank');
//ech($proc->tabdata['sys_accrank']);
function rank_sel($sel){
	global $proc;
	
	$select = '<select name="acclabs"><option value=""></option>';
	for($i=0;$i<$proc->tab['sys_accrank']['qty'];$i++){
		if($proc->tabdata['sys_accrank'][$i]['acclabel']==$sel){
			$selected = 'selected="selected" ';
			//echo $proc->tabdata['sys_accrank'][$i]['acclabel'].'<br />';
		}else{
			$selected = '';
		}
		$select.='<option value="'.$proc->tabdata['sys_accrank'][$i]['acclabel'].'" '.$selected.'>'.$proc->tabdata['sys_accrank'][$i]['acclabel'].'</option>';
		
	}
	$select.='</select>';
	return $select;
}



$proc->mod['index'] = 1;
//$proc->mod['filter'] = 'login !=""';

$proc->request = 'SELECT c.row_id, c.login, c.pass, c.row_id AS user_id, a.acclabs, a.granted, a.acl_datetime
				FROM  sys_users c LEFT OUTER JOIN sys_acc_cli a ON a.id_acl = 
				(SELECT a1.id_acl FROM sys_acc_cli a1
				WHERE a1.user_id = c.row_id ORDER BY a1.acl_datetime DESC LIMIT 1)
				WHERE c.login !="" ORDER BY -c.row_id';
				

/*
$proc->request = 'SELECT c.row_id, c.login, c.pass, c.row_id AS user_id, a.acclabs, a.granted, a.acl_datetime
				FROM  sys_users c LEFT OUTER JOIN sys_acc_cli a ON a.id_acl = 
				(SELECT a1.id_acl FROM sys_acc_cli a1
				WHERE a1.login = c.login ORDER BY -a1.acl_datetime LIMIT 1)
				WHERE c.login !="" ORDER BY -c.row_id';
*/
//$proc->mod['join'] = 'typevents typevent id_tev';
//$proc->mod['order'] = "datetime DESC";
$proc->fetch('sys_users');
unset($proc->mod);

$tab='<table border="1" class="evetlist"><tr><td>Редактировать</td><td><b>ID</b></td><td><b>Login</b></td><td><b>Pass</b></td><td><b>Status</b></td><td><b>Date</b></td><td>Удал.</td></tr>';
unset($forms);
for($i=0; $i<$proc->tab['sys_users']['qty'];$i++){
	/*
	if($_SESSION['username']==$proc->tabdata['sys_users'][$i]['login']){
		$_SESSION['rank'] = $proc->tabdata['sys_users'][$i]['acclabs'];
		//echo $_SESSION['username'].'	'.$_SESSION['rank'].'<br />';
	}
	*/
	// name="editevent" 
	
	if($proc->tabdata['sys_users'][$i]['granted']>0){
		$nextform = '<form action="[{post}]" method="post" name="discard_user" class="nextform">'.$proc->tabdata['sys_users'][$i]['acclabs'].'
			<input name="login" type="hidden" value="'.$proc->tabdata['sys_users'][$i]['login'].'">
			<input name="user_id" type="hidden" value="'.$proc->tabdata['sys_users'][$i]['user_id'].'">
			<input name="acclabs" type="hidden" value="'.$proc->tabdata['sys_users'][$i]['acclabs'].'">
			<input name="granted" type="hidden" value="0">
			<input name="user_discard" type="image" src="/imag/i/cancel.png" style="width:16px; height:16px;"/>
			</form>';
	}else{
		//$nextform = $proc->tabdata['sys_users'][$i]['acclabs'];
		$nextform = '<form action="[{post}]" method="post" name="assign_user" class="nextform">
			<input name="login" type="hidden" value="'.$proc->tabdata['sys_users'][$i]['login'].'">
			<input name="user_id" type="hidden" value="'.$proc->tabdata['sys_users'][$i]['user_id'].'">
			'.rank_sel($proc->tabdata['sys_users'][$i]['acclabs']).'
			<input name="granted" type="hidden" value="1">
			<input name="user_assign" type="image" src="/imag/i/accept.png" style="width:16px; height:16px;"/>
			</form>';
	}
	
	$forms.=$formdel;
   
	$formedit = '<form action="[{admusedit}]" method="post"><input type="hidden" name="row_id" value="'.$proc->tabdata['sys_users'][$i]['row_id'].'"><input type="image" src="/i/ar_right.jpg" style="width:50px; height:16px;"></form>';
	$linkdel = '<a href="#" rel="admindel'.$proc->tabdata['sys_users'][$i]['row_id'].'" class="lightbut"><img src="/i/del.png"></a>';
	$formdel = '<div id="admindel'.$proc->tabdata['sys_users'][$i]['row_id'].'" class="lightbox" align="center"><div class="lightdiv">'.sure.'<form  action="[{post}]" method="post"><input type="hidden" name="act" value="del"><input type="hidden" name="row_id" value="'.$proc->tabdata['sys_users'][$i]['row_id'].'"><input type="image" name="user_delete" src="/i/del.png" style="width:16px; height:16px;"></form></div></div>';
	$tab.='<tr><td>'.$formedit.'</td><td>'.$proc->tabdata['sys_users'][$i]['row_id'].'</td><td>'.$proc->tabdata['sys_users'][$i]['login'].'</td><td>'.$proc->tabdata['sys_users'][$i]['pass'].'</td><td align="right">'.$nextform.'</td><td>'.$proc->tabdata['sys_users'][$i]['acl_datetime'].'</td><td>'.$linkdel.'</td></tr>';
	//<td>'.$proc->tabdata['sys_users'][$i]['granted'].'</td>
}

$tab.='</table>'.$forms;





?>