<?
//index->prt_goods=>mod_actons->basket->fun_paymenu=>regdata=>mod_actsend
function paymenu($lang){
global $paystatus, $path_imag;
if($lang!="eng"){
	$lang!="rus";
}
$paymenu=array( 0=>array('paym'=>'nal', 'sign'=>'Нал.', 'rus'=>'Заказать с оплатой наличными', 'eng'=>'Order with the payment by the cash', 'url'=>'/%D0%9D%D0%B0%D0%BB%D0%B8%D1%87%D0%BD%D1%8B%D0%B9_%D1%80%D0%B0%D1%81%D1%87%D1%91%D1%82/', 'button'=>'500-2.jpg'),
				1=>array('paym'=>'sber', 'sign'=>'Сбербанк', 'rus'=>'Заказать с оплатой в Сбербанке', 'eng'=>'Order with the payment by the SberBank', 'url'=>'/%D0%9E%D0%BF%D0%BB%D0%B0%D1%82%D0%B0_%D0%B2_%D0%A1%D0%B1%D0%B5%D1%80%D0%B1%D0%B0%D0%BD%D0%BA%D0%B5/', 'button'=>'sb.jpg'),
				2=>array('paym'=>'beznal', 'sign'=>'Безнал', 'rus'=>'Заказать с б/н оплатой (юр. лицам)', 'eng'=>'Order with the non-cash paym. (organisations)', 'url'=>'/%D0%91%D0%B5%D0%B7%D0%BD%D0%B0%D0%BB%D0%B8%D1%87%D0%BD%D1%8B%D0%B9%20%D1%80%D0%B0%D1%81%D1%87%D1%91%D1%82/', 'button'=>'bn.gif'),
				3=>array('paym'=>'WU', 'sign'=>'WU', 'rus'=>'Заказать с оплатой Western Union', 'eng'=>'Order with the payment by Western Union', 'url'=>'/%D0%9E%D0%BF%D0%BB%D0%B0%D1%82%D0%B0_Western_Union/', 'button'=>'wu.png'),
				4=>array('paym'=>'WM', 'sign'=>'WebMoney', 'rus'=>'Заказать с оплатой WebMoney', 'eng'=>'Order with the payment by WebMoney', 'url'=>'/%D0%9E%D0%BF%D0%BB%D0%B0%D1%82%D0%B0_Webmoney/', 'button'=>'wm.gif'),
				);
$i=0;
//echo $paymenu[0]["rus"]."<br>";
echo '<table>';
while ($paymenu[$i]["rus"]){
	$linkrow='<a href="'.$paymenu[$i]["url"].'"><img src="'.$path_imag.'buttons/'.$paymenu[$i]["button"].'" alt="'.$paymenu[$i]["sign"].'" border="0" align="middle">'.$paymenu[$i][$lang].'</a>';
	echo '<tr><td>'.$linkrow.'</td></tr>';
	$i++;
}
echo '</table>';
return 0;
}
?>