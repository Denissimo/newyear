<?
header("Content-Type: text/html; charset=utf-8");
echo 'test ы<br />265<br />';

//$a = 'asdfфываzxcv';

/*
$a = 'ыварывары
azsdrfhasdffdhsdfh

w45y qq 


фыывваа'.chr(219).'dfhedth
se  g54 gyw ывмп цип ц';
*/
//$a = iconv('CP1251', 'UTF-8', $a);

//$cod = mb_detect_encoding($a, array('UTF-8', 'CP1251'));
print_r(mb_detect_order());
//$cod = mb_detect_encoding($a, mb_detect_order());
$cod = mb_detect_encoding($a, 'UTF-8', TRUE);

echo '<br />'.$cod.'<br />';
//$a = preg_replace('/[а-яА-Я_\-\s\/]+/u', '+', $a);
//$a = iconv('UTF-8', 'CP1251', $a);
//echo $a;

?>