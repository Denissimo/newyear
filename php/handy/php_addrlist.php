<?
echo "<h4>Вспомогательная страница</h4> (просто ссылки на все разделы)";
$proc->mod['filter'] = 'row_id>111 and row_id<136';
$testpl = 'RFID: [>rfid<], Firstname:[>firstname<]<br>';
//$cont->test = 'addrlist';
$tmp = $cont->load_cont('sys_urls', 'adrtab');
echo '<table border="1">';
echo $tmp;
echo '</table>';
/*
$folder = 'Demo_%D0%92%D1%81%D0%B5_%D1%80%D0%B0%D0%B7%D0%B4%D0%B5%D0%BB%D1%8B';
$root = $proc->req_uri;
echo '$proc->req_uri: '.$proc->req_uri.'<br />';
$res = preg_replace('|^/'.$folder.'|', '', $root);
echo $res.'<br />';
echo $_SERVER['PHP_SELF'].'<br />';

$res = preg_replace('|/php_addrlist\.php$|', '', $_SERVER['PHP_SELF']);
echo $res.'<br />';
//php_addrlist.php
*/
?>