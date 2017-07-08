<?
ech('&#128095;');

//$proc->mod['index'] = 1;
$proc->db->keyfield['sys_redirect'] = 'location';
$red = $proc->fetch('sys_redirect');
//ech($red);

$range = $proc->pageread('page ', 5, 1);
ech($range);
$mysql->load_key('sys_cfg');
//ech($mysql->keyfield);
//$result = $mysqli->query('SELECT * FROM sys_urls');
//ech($result);
//$data = $result->fetch_assoc();



$term = '$a>5';
$a = 3;
$fullterm = 'if('.$term.'){$res=1;}else{$res=0;}';
eval($fullterm);
//ech($res);
$proc->db->keyfield['sys_users']='row_id';
$proc->mod['range'] = $range;//'0:8';
//ech($proc->mod);
$proc->fetch('sys_users');
echo '[>pagination<]';

unset($cont->debug);
//echo '<ul class="pagination pagination-sm">'.$pag.'</ul>';
//ech($proc->paginator);
//ech($proc->tabdata['sys_users']);


//ech($_SESSION);
//ech($form->formdata['SESSION']);
echo "<br />Проба load_cont()<br />";
$arr = array(
	0=> array('address'=>'qwe', 'label'=>'123'),
	1=> array('address'=>'asd', 'label'=>'456'),
	2=> array('address'=>'zxc', 'label'=>'789')
);
//$tmp = $cont->load_cont($arr, 'testtemp3');
$tmp = $cont->load_cont('sys_urls', 'testtemp4');
ech($_SESSION);
echo '<table border="1">'.$tmp.'</table>';


?>