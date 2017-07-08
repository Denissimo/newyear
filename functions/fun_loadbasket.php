<?
//формирует 1) таблицу содержимого корзины
function loadbasket(){

global $proc, $url_lev2;

$proc->mod["filter"]='iduser="'.$_COOKIE['iduser'].'" AND (approve=0 OR approve IS NULL)';

echo '<br />'.$proc->mod["filter"].'<br />';

$proc->mod["index"]=1;
$proc->mod["order"]='addate DESC';
$mysql->load_field("basket");
$proc->load_tab();
unset($proc->mod["filter"]);
unset($proc->mod["index"]);
unset($proc->mod["order"]);

$mysql->load_field("bukets");
$proc->load_tab();

$mysql->load_field("categ");
$proc->load_tab();

//echo '<br />num: '.$proc->tab['basket']['qty'];

$goods_table["table"]='<table class="loadbasket">';
$goods_table["admin"]='<table class="loadbasket">';
$td1='<td>';
$td2='</td>';
//	'.$td1.'№</td>
//	'.$td1.'User</td>
//	'.$td1.'IP</td>	
//'.$td1.'Подтв.</td>
$goods_table["table"].='
<tr>
	'.$td1.'<b>Букет</b></td>
	'.$td1.'<b>Кол-во</b></td>
	'.$td1.'<b>+/-</b></td>
	'.$td1.'<b>Цена</b></td>
	'.$td1.'<b>Сумма</b></td>
	'.$td1.'<b>Дата</b></td>
	'.$td1.'<b>Удалить</b></td>
</tr>
';



$goods_table["admin"].='
<tr>
	'.$td1.'<b>№</b></td>
	'.$td1.'<b>User</b></td>
	'.$td1.'<b>IP</b></td>	
	'.$td1.'<b>Букет</b></td>
	'.$td1.'<b>Кол-во</b>/td>
	'.$td1.'<b>+/-</b></td>
	'.$td1.'<b>Цена</td>
	'.$td1.'<b>Сумма</b></td>
	'.$td1.'<b>Подтв.</b></td>
	'.$td1.'<b>Дата</b></td>
	'.$td1.'<b>Удалить</b></td>
</tr>
';

$deliv_cost=delivery;

$goods_table["table"].='<tr>';
$goods_table["admin"].='<tr>';
for($i=0; $i<$proc->tab['basket']['qty']; $i++){
	
	//echo '<br />'.$i;
	
	$goods_table["table"].='<tr>';
	$goods_table["admin"].='<tr>';
	$goods_table["admin"].=$td1.$proc->tabdata['basket'][$i]["row_id"].$td2;
	$goods_table["admin"].=$td1.$proc->tabdata['basket'][$i]['iduser'].$td2;
	$goods_table["admin"].=$td1.$proc->tabdata['basket'][$i]["ip"].$td2;

	//cсоздаём ссылку ЧПУ 
	//$catrusfull=$bukets[$goods[$i]["bouquet"]]["catrus"];
	//$catrusfull=explode("|", $catrusfull);
	//$linkrus='/'.str_replace(" ", "_", $catrusfull[2]).'/'.str_replace(" ", "_", $bukets[$goods[$i]["bouquet"]]["namerus"]).'/';
	
	$subject=$proc->tabdata['basket'][$i]['subj'];
	if($subject[0].$subject[1]!='15'){
		$deliv_cost=0;
	}
	
	/*
	if($goods[$i]["bouquet"][0].$goods[$i]["bouquet"][1]!='15'){
	$deliv_cost=0;
	}
	*/
	if($url_lev2){
		$ur2=explode('-', $url_lev2);	
	}
	
	$numcat=$proc->tabdata['bukets'][$subject]['categ'];
	$url_full='/'.make_url($proc->tabdata['categ'][$numcat]['catrus'].'/'.$proc->tabdata['bukets'][$subject]['namerus']);
	
	$goods_table["table"].=$td1.'<a href="'.$url_full.'">'.$proc->tabdata['bukets'][$subject]['namerus'].'</a>'.$td2;
	$goods_table["admin"].=$td1.'<a href="'.$url_full.'">'.$proc->tabdata['bukets'][$subject]['namerus'].'</a>'.$td2;
	//$goods[$i]["qty"]=mysql_result($check_req, $i, "qty");
	//echo '<br />'.$ur2[0].'<br />';
	if($ur2[0]=='Изменить' and $i==$ur2[1]){
		$numf='<form action="/%D0%9A%D0%BE%D1%80%D0%B7%D0%B8%D0%BD%D0%B0/" method="post" class="setbask2">
	<input type="hidden" name="subj" value='.$subject.'>
	<input type="hidden" name="action" value="setbask">
	<input type="text" name="newqty" size="3" maxlength="3" value="'.$proc->tab['basket'][$i]['qty'].'">
	<input type="image" src="'.path_imag.'buttons/ok.png"  width="41" height="18" alt="OK">
	</form>';
	}else{
		//<input type="submit" value="OK" style="width: 30px; height: 20px;">
		$numf='<a href="/%D0%9A%D0%BE%D1%80%D0%B7%D0%B8%D0%BD%D0%B0/%D0%98%D0%B7%D0%BC%D0%B5%D0%BD%D0%B8%D1%82%D1%8C-'.$i.'">'.$proc->tab['basket'][$i]['qty'].'&nbsp;шт.</a>';
	}
	$goods_table["table"].=$td1.$numf.$td2;
	$goods_table["admin"].=$td1.$numf.$td2;
	$nextone=$td1.'<form action="/%D0%9A%D0%BE%D1%80%D0%B7%D0%B8%D0%BD%D0%B0/" method="post">
	<input type="hidden" name="subj" value='.$subject.'>
	<input type="hidden" name="action" value="plus">
	<input type="image" src="'.path_imag.'buttons/plus.png"  width="18" height="18" alt="Прибавить">
	</form>
	<form action="/%D0%9A%D0%BE%D1%80%D0%B7%D0%B8%D0%BD%D0%B0/" method="post">
	<input type="hidden" name="subj" value='.$subject.'>
	<input type="hidden" name="action" value="minus">
	<input type="image" src="'.path_imag.'buttons/minus.png"  width="18" height="18" alt="Убавить">
	</form>'.$td2;
	$goods_table["table"].=$nextone;
	$goods_table["admin"].=$nextone;
	
	//$goods[$i]["price"]=mysql_result($check_req, $i, "price");
	$goods_table["table"].=$td1.$proc->tabdata['basket'][$i]['price'].$td2;
	$goods_table["admin"].=$td1.$proc->tabdata['basket'][$i]['price'].$td2;
	//доп. ячейка - сумма v
	$summ=$proc->tab['basket'][$i]['qty']*$proc->tabdata['basket'][$i]['price'];
	$goods_table['table'].=$td1.$summ.$td2;
	$goods_table['admin'].=$td1.$summ.$td2;
	$goods_table['itogs']+=$summ;
	$goods_table['total']=$goods_table['itogs']+$deliv_cost;
	$goods_table['deliver']=$deliv_cost;
	$_SESSION['s_itogs']=$goods_table['itogs'];
	$_SESSION['s_total']=$goods_table['total'];
	$_SESSION['s_deliver']=$goods_table['deliver'];
	// сумма ^
	//$goods[$i]['approve']=mysql_result($check_req, $i, 'approve');
	$goods_table['admin'].=$td1.$proc->tabdata['basket'][$i]['approve'].$td2;
	//$goods[$i]['addate']=mysql_result($check_req, $i, 'addate');
	$goods_table['table'].=$td1.$proc->tabdata['basket'][$i]['addate'].$td2;
	$goods_table['admin'].=$td1.$proc->tabdata['basket'][$i]['addate'].$td2;
	//доп. ячейка - кнопки v
	$nextone=$td1.'<form action="/%D0%9A%D0%BE%D1%80%D0%B7%D0%B8%D0%BD%D0%B0/" method="post">
	<input type="hidden" name="row_id" value='.$proc->tabdata['basket'][$i]['row_id'].'>
	<input type="hidden" name="action" value="delbask">
	<input type="image" src="'.path_imag.'buttons/del.png"  width="18" height="18" alt="Удалить из заказа">
	</form>'.$td2;
	$goods_table['table'].=$nextone;
	$goods_table['admin'].=$nextone;
	// кнопки ^	
	$goods_table['table'].='</tr>';
	$goods_table['admin'].='</tr>';
	
	$goods_table['message'].=$i.' '.$proc->tabdata['bukets'][$subject]['namerus'].' '.$proc->tab['basket'][$i]['qty'].'шт. '.$proc->tabdata['basket'][$i]['price'].'р. ';
	
	
}
$goods_table['table'].='</table>';
$goods_table['admin'].='</table>';
$goods_table['message'].='Summ: '.$_SESSION['s_total'];

//echo $goods_table["table"];

return ($goods_table);

}
?>
