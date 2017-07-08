<?
if($_SESSION['logged']){
	header("Location: /");
}
$proc->mod['filter'] = 'nam="regnewuser"';
$proc->fetch('sys_forms');


echo $_SESSION['sys_tmp']['message'];
echo $proc->tabdata['sys_forms']['regnewuser']['forms'];
//ech($_SESSION);

//dropsess(droplist);

?>