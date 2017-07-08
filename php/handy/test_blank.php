<?
//echo 'Тут будет <b>КОНТЕНТ</b><br />';
//echo $proc->url_lvl.'<br />';
//ech($proc->sys['url']);

$list = array_flip($proc->sys['url']['list']);
$addr = $proc->tabdata['sys_urls'][0]['address'];
$del = -($proc->sys['url']['qty']-$list[$addr]-1);
$lista = $proc->sys['url']['list'];
echo $del.'<br />';
if($del==0){
	echo 'zero<br />';
	$stay = array();
}else{
	$stay = array_splice($lista, $del);
}
//$stay = array_splice($lista, $del);
echo 'lista';
ech($lista);
echo 'stay';
ech($stay);



?>