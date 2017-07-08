<?
//unset($_SESSION['sys_tmp']['message']);
include "menu_01.php";
//$mysql->load_field('events');
//include '/parts/prt_typevents.php';

//$proc->formname = $proc->url[2];
//echo '<br />+++++++++++++++++'.$proc->formname.'<br />';
$form->data_check();
if($form->ok_form==TRUE){
	$pclass='normal';
}else{
	$pclass='alert';
}

//echo '<p class="'.$pclass.'">'.$form->message.'</p>';
//echo $proc->tabdata['sys_forms'][$proc->formname]['forms'];
echo '<br />++++<br />';


include 'parts/prt_manag_list.php';
echo $tab;


echo $_SESSION['sys_tmp']['message'];
//ech($_SESSION);
//dropsess(droplist);
?>