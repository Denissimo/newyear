<?
$proc->db->keyfield['sys_urls'] = 'label';
$proc->mod['filter'] = 'independ IS NOT NULL and independ!=0';
$proc->mod['fields'] = 'label ,address, independ';
//$proc->mod['index'] = 1;


$proc->fetch('sys_urls');
//ech($proc->sys['url']);
//ech($proc->tabdata['sys_urls']);
//ech($proc->tab['sys_urls']);

$datt = '"';
//$dat2 = escapeString($datt);
echo '<br />escape: '.$dat2.'<br />';
$sqlite->keymark = 'numtype';
$sqlite->load_field('sys_cfg');
$quer = $sqlite->query('select * from sys_cfg');
$sqlite->fetch_begin = 0;
$sqlite->fetch_end = 19;
$sqlite->table = 'sys_cfg';
$sqlite->load_key('sys_cfg');
$sq = $sqlite->data_load($quer);


$mysql->keymark = 'numtype';
$mysql->load_field('sys_cfg');
ech($mysql->fields);
$quer = $mysql->query('select * from sys_cfg');
$mysql->fetch_begin = 0;
$mysql->fetch_end = 19;
$mysql->table = 'sys_cfg';
$mysql->load_key('sys_cfg');
$my = $mysql->data_load($quer);



echo '<table border="1">';
echo '<tr><td>1';
ech($sqlite->keyfield);
echo '</td><td>2';
ech($mysql->keyfield);
echo '</td></tr>';

echo '<tr><td>3';
ech($sq);
echo '</td><td>4';
ech($my);
echo '</td></tr>';

echo '</table>';

/*

$sqlite->load_field('zz_domains');
$quer = $sqlite->query('select * from zz_domains');
//$kfrow = $sqlite->fetch_row($quer);
//ech($kfrow);
$sqlite->fetch_begin = 0;
$sqlite->fetch_end = 19;
$sqlite->table = 'zz_domains';
$sqlite->load_key();
echo 'Keyfield<br />';
ech($sqlite->keyfield);
$sqlite->keymark = 'domain';
//$sqlite->mod['index'] = 1;
$res = $sqlite->data_load($quer);
//ech($sqlite->fields);
ech($res);
*/
/*
$mysql->load_field('sys_urls');
ech($mysql->fields);
*/

/*
$my_q = $mysql->query('select * from sys_urls');
ech($my_q);
$sq_q = $sqlite->query('select * from sys_urls');
ech($sq_q);
*/
/*
$addr='http://dc-kardinal.livejournal.com/friends';
//$addr='http://users.livejournal.com/_katena_/friends';
$addr_par = parse_url($addr);
$addr_exp = explode('.', $addr_par['host']);
$path_exp = explode('/', $addr_par['path']);
if($addr_exp[0]=='users'){
	$username = $path_exp[1];
	$friends = $path_exp[2];
}else{
	$username = $addr_exp[0];
	$friends = $path_exp[1];
}
echo '<br />username: '.$username;
echo '<br />friends: '.$friends;

ech($addr_par);
ech($addr_exp);
ech($path_exp);
*/
/*
$addr2='http://users.livejournal.com/_katena_/friends';
$addr_par2 = parse_url($addr2);
$addr_exp2 = explode('.', $addr_par2['host']);
$path_exp2 = explode('/', $addr_par2['path']);
ech($addr_par2);
ech($addr_exp2);
ech($path_exp2);
*/
//ech ($_SESSION);

/*
$a2 = 'asdf';
$$a2 = 'qwerty';
echo '<pre>';
var_dump($a2);
var_dump($asdf);

echo '</pre>';

echo 'Проба 3';
//ech($proc->tabdata['sys_forms']);
echo $proc->tabdata['sys_forms']['test004_x']['forms'];
echo $proc->tabdata['sys_forms']['test005_x']['forms'];
*/
?>
<form>
<textarea name="pos" rows="5" cols="60"></textarea>
<input type="submit" value="OK" />
</form>