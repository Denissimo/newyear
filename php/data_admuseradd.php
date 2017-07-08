<?
include "menu_02.php";

//include 'parts/prt_typevents.php';

$proc->mod['filter'] = 'nam="adduser"';
$proc->fetch('sys_forms');

/*
echo '<pre>';
//print_r($proc->tabdata['typevents']);
print_r($_SESSION);
//print_r($proc->tabdata['sys_content']);
//print_r($proc->tabdata['sys_forms']);
echo '</pre>';
*/

//echo $_SESSION['sys_tmp']['message'];
echo $proc->tabdata['sys_forms']['adduser']['forms'];
//dropsess(droplist);
//unset($_SESSION['sys_tmp']['message']);
?>