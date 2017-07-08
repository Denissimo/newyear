<?
include "menu_01.php";

include 'parts/prt_typevents.php';

echo '<script src="/js/go_form_timefin.js"></script>';
if(!$proc->tabdata['sys_content']['duration']['content']){
	$proc->tabdata['sys_content']['duration']['content'] = 12;
}

$proc->mod['filter'] = 'nam="addevent"';
$proc->fetch('sys_forms');

//ech($_SESSION);
//ech($proc->tabdata['sys_content']);
//ech($proc->sys);
//echo $_SESSION['sys_tmp']['message'];
echo $proc->tabdata['sys_forms']['addevent']['forms'];
//dropsess(droplist);
//unset($_SESSION['sys_tmp']['message']);
?>