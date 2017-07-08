<?
if($proc->sys['url']['qty']>1){
	$prg = preg_match('/^[0-9]{2}\.[0-9]{2}\.[0-9]{4}$/', $proc->sys['url']['list'][1], $matches);
	if($prg){
		$_POST['orderdate'] = $proc->sys['url']['list'][1];
	}
	//ech($prg);
}
//ech($proc->sys['url']['list'][1]);
//$_POST['orderdate'] = '01.10.2014';
echo $form->forms['nyorder'];

?>