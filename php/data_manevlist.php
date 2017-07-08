<?

$proc->formname = $proc->url[2];
echo "Manevlist<br />";

include "menu_01.php";
//$mysql->load_field('events');
$form->data_check();



include 'parts/prt_manag_list.php';
echo $tab;
/*
echo '<pre>';
print_r($_POST);
print_r($proc->tabdata['sys_forms']);
echo '</pre>';
*/
?>