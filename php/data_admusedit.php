<?


if($_SESSION['row_id']){
	$_POST['row_id'] = $_SESSION['row_id'];
}
//$_SESSION['POST'] = $_POST;
//ech($_POST);
if($_POST['row_id']){

	$proc->mod['filter'] = 'row_id="'.$_POST['row_id'].'"';
	$proc->mod['index'] = 1;
	$proc->mod['limit'] = 1;
	$proc->fetch('sys_users');
	//ech($proc->tabdata['sys_users']);
	//ech($proc->tab['sys_users']);
	foreach((array)$proc->tabdata['sys_users'][0] as $key => $val){
		//$proc->tabdata['sys_content'][$key]['content'] = $val;
		$_SESSION['sys_tmp']['POST'][$key] = $val;
	}
	
}else{
	//header
}

include "menu_02.php";
//ech($_POST);
//ech($_SESSION);
//ech($proc->tabdata['sys_content']);

$proc->mod['filter'] = 'nam="edituser"';
$proc->fetch('sys_forms');

echo $_SESSION['sys_tmp']['message'];
echo $proc->tabdata['sys_forms']['edituser']['forms'];
//dropsess(droplist);

//$_SESSION['row_id'] = $_POST['row_id'];
?>