<?
//echo '+++<br />';
$lab = $proc->label;
echo '<a href="[{cashier}]">Выдача меток</a><br />';

switch($proc->sys['url']['qty']){
case 1:
	echo '<script src="/js/go_bar.js"></script>';
	echo "<br>Кассир<br>";
	include 'parts/prt_cashier_list.php';
	
	echo $tab;
	echo '<br /><input name="bar" type="text" id="bar"/>';
break;
}
?>