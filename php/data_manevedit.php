<?
include "menu_01.php";
//ech($_POST);
if($_POST['row_id']){
	/*
	$proc->mod['filter'] = 'row_id="'.$_POST['row_id'].'"';
	$proc->fetch('events');
	ech($proc->tabdata['events'][$proc->tab['events']['keyfield'][0]]);
	//ech($proc->tab['sys_users']);
	foreach($proc->tabdata['events'][$proc->tab['events']['keyfield'][0]] as $key => $val){
		//$proc->tabdata['sys_content'][$key]['content'] = $val;
		$_SESSION['POST'][$key] = $val;
		echo 'key: '.$key.' val: '.$val.'<br />';
	}
	*/
	$_SESSION['sys_tmp']['POST'] = $_POST;
}
//ech($_SESSION['POST']);
//ech($proc->tabdata['sys_content']);

include 'parts/prt_typevents.php';

echo '<script src="/js/go_form_timefin.js"></script>';
if(!$proc->tabdata['sys_content']['duration']['content']){
	$proc->tabdata['sys_content']['duration']['content'] = 12;
}

$proc->mod['filter'] = 'nam="edit_event_but_x"';
$proc->fetch('sys_forms');

//ech($_SESSION);
//ech($_POST);
//ech($proc->tabdata['sys_content']); 
//ech($proc->tabdata['events']); 

//echo $_SESSION['sys_tmp']['message'];
echo $proc->tabdata['sys_forms']['edit_event_but_x']['forms'];


//dropsess(droplist);
//ech($_POST);

//echo '[>namevent<]+++++++++++++++++';

?>