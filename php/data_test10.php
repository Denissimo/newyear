<?
class tst{
	private $par2;
    public function pregtest(){
		$arg = func_get_args();
		$param2 = $arg[1];
		$this->par2 = $arg[2];
		$res = preg_replace_callback($arg[0], array($this, 'pregs'), $arg[1]);
		//$res = preg_replace_callback($arg[0], array($this, 'pregs($1, $param2)'), $arg[1]);
		unset($this->par2);
		return $res;
	}
	
	private function pregs($matches){
		return $this->par2[$matches[1]];
	}

}

$tst = new tst();

$str = '[G<testget>]++Ценовые пропорции, конечно, срастаются не везде.
«Пятачок на метро» в Москве [>dick<] превращается в 20–50 деноминированных копеек — в зависимости [>cunt<]от количества поездок, оплаченных оптом. Да и кружку кваса из бочки за 3 копейки теперь не получишь. О том, что квас по цене сравнялся с пивом, народ стал удивляться ещё в 90х.
Билет в кино (у нас, в провинции) на детские сеансы стоил 10–20 копеек, на взрослые 50, иногда – рубль. [>Jigurda<]Сейчас в кино за стольник (у нас, в Москве) можно попасть только на утренние сеансы. Дневные стоят рублей 400 (VIP залы не учитываем). Это немыслимые для СССР 4 рубля. Даже в кооперативных видеозалах цена была рубль. Кто натыкался на цену выше рубля? Коренные, вопрос к вам. Я–то понаехал уже при Ельцине.
';

$repl = array(
    'dick'=>'!!хуй!!',
    'cunt'=>'??пизда??',
    'Jigurda'=>'Джигурда'
);

$pat = '/\[>([a-zA-Z0-9_\-]*)<\]/';

$ress = $tst-> pregtest($pat, $str, $repl);
ech($ress);


//echo '+++';
ech($_GET);
ech($_COOKIE);

//setcookie('testcook', '12345');
/*
$ur_test[] = 'Проба';
$ur_test[] = '11';
*/
$ur_test[] = 'Проба 8';
$ur_test[] = 'Проба 9';
$ur_test[] = 'Проба 3';

/*
$ur_test[] = 'ljhfofgv';$ur_test[] = 'ljhfofgv';
*/
//$ur_test = array(0 => 'вики');
//$ur_test = array(0 => 'url_01', 1 => 'url_02', 2 => 'url_03', 3 => 'url_04');
//unset ($ur_test[0]);
//ech(array_values($ur_test));
/*
$proc->url_input = $ur_test;
$proc->url_row =  $ur_test;
$proc->url_cut();
$proc->ech();
$proc->url_chop();
$proc->ech();
$proc->url_cut();
$proc->ech();
*/
//$proc->url_row = $ur_test;
$ur = $proc->url_identify($ur_test);
//$ur = $proc->url_identify($proc->sys['url']['list']);

echo '<br /><b>Label: <font color="#0000FF">'.$ur.'</font></b>';
echo '<b>,&nbsp;URL: <font color="#880000">'.$proc->url_label.'</font></b>';
?>