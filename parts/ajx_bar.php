<?
//header("Location: /");
//echo $proc->sys['url']['list'][1];
$proc->mod['filter'] = 'barcode = "'.$proc->sys['url']['list'][1].'"';
$proc->mod['index'] = 1;
$proc->mod['limit'] = 1;
$proc->fetch('orders');
//ech($proc->tabdata['orders']);
$proc->mod['filter'] = 'row_id = "'.$proc->tabdata['orders'][0]['event'].'"';
$proc->mod['index'] = 1;
$proc->mod['limit'] = 1;
$proc->fetch('events');
//ech($proc->tabdata['events']);
$chp = $proc->by_label('cashier');
//ech($chp);
if($proc->tab['orders']["qty"]>0){
	$addr = '/'.$chp['url'].'/'.$proc->make_url($proc->tabdata['events'][0]['namevent']).'/'.$proc->make_url(zakaz.'_'.$proc->tabdata['orders'][0]['row_id']);
}else{
	$addr = '/'.$chp['url'].'/';
	$_SESSION['sys_tmp']['message'] = 'Штрихкод в базе отсутствует';
}
//echo $addr;
header("Location: ".$addr);


?>