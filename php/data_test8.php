<?
/*
echo md5('123110');
echo '<br />';
echo md5(123110);
echo '<br />';
echo md5(123111);
echo '<br />';
echo md5(123112);
*/

$proc->mod['limit'] = 1;
$proc->fetch('sys_users');
ech($proc->tabdata['sys_users']);

$proc->mod['limit'] = 1;
$proc->fetch('1:users');
ech($proc->tabdata['users']);

echo $q;
$atest = 'asdf';
$btest = explode(' ', $atest);
ech($btest);

ech($_SESSION);
$proc->fetch('sys_users');
ech($proc->tab['sys_users']);
//$proc->db->db = 1;
//$proc->fetch('users');
//$tess = $proc->db->is_table('sys_users');
//$tess = $proc->db->is_table('sys_users');
//ech($tess);

$proc->db->db = 0;
$proc->fetch('1:users');
ech($proc->tabdata['users']);

$urmas = $proc->sys['url']['list'];
//ech($urmas);
//$urr = implode('/', $urmas);
//echo 'ss '.$urr;
$res = $proc->url_identify($urmas);

//ech($proc->chpu_tab);

ech($res);


?>