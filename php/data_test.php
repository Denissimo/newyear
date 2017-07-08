<?
//$abc=0;
/*
$up = $proc->go_req('SELECT * FROM sys_cfg WHERE category = "basic"');
ech($proc->db->affected_rows());
*/
/*
$testdata = array('test1'=>'aaa', 'test2'=>'bbb', 'testint'=>rand(127, 0));
*/
$testdata = array(
	0=>array('test1'=>'qwe0', 'test2'=>'qwe1', 'testint'=>rand(127, 0)),
	1=>array('test1'=>'qwe2', 'test2'=>'qwe1', 'testint'=>rand(127, 0)),
	2=>array('test1'=>'qwe4', 'test2'=>'qwe1', 'testint'=>rand(127, 0))
);

//$up = $proc->put_row($testdata, 'zztest');
$proc->mod['update'] = 'test2="qwe1"';
//$proc->mod['updadd'] = 1;
$up = $proc->put_array($testdata, 'zztest');

echo 'TImer: '.$_SESSION['timer'].'<br />';

$u1 = '12as';
$root['>qwe>asd>zxc'] = 123;
$root['>qwe>asd>rty'] = 456;
$root['>qwe>zxc|0'] = 4;
$root['>qwe>zxc|1'] = 5;
$root['>qwe>zxc|2'] = 6;
$root['qwezxc2'] = 77;

$res = $form->formxml($root);

ech($res);
function &testlink(&$a){
	return $a;
}

$u2 = &testlink($u1);
echo '<br />u1: '.$u1.'<br />u2: '.$u2;
$u2 = '+++';
echo '<br />u1: '.$u1.'<br />u2: '.$u2;

if(isset($abc)){
	echo '++<br />';
}
//$proc->mod['index'] = 1;
//$proc->fetch('zz_bukets');
/*
$proc->source['sdktestomni']='amazon';
//$proc->mod['index']=1;
//$proc->mod['filter']='itemName()="17"';
//$proc->mod['filter']='itemName()="19"';
//$proc->req = 'DELETE FROM sdktestomni';
//$proc->mod['limit']=1;
//$proc->mod['filter']=1;
$proc->fetch('sdktestomni');
$a1 = $proc->tabdata['sdktestomni'];
$a2 = $proc->tab['sdktestomni'];
//$a2 = array_flip($a1);
$b1=serialize($a1);
ech($a1);
//ech($a2['keyfield']);
echo '<br />Метка: '.$proc->tab['sdktestomni']['keyfield'][1];
//ech($proc->tabdata['zz_bukets']);
//ech($proc->tab['zz_bukets']);
//echo rand(1,500);
*/
?>

<form  action="/post" method="post">
<input type="hidden" name="itemName()" value="<? echo $proc->tab['sdktestomni']['keyfield'][1]; ?>">
<input type="image" name="test01" src="/i/del.png" style="width:16px; height:16px;">
</form>

<form  action="/post" method="post">
<input type="hidden" name="itemName()" value="<? echo rand(1,500); ?>">
<input type="hidden" name="bouquet" value="1234">
<input type="hidden" name="row_id" value="34">
<input type="image" name="test02" src="/i/add.png" style="width:16px; height:16px;">
</form>

<form  action="/%D0%A2%D0%B5%D1%81%D1%82/?buket=Rose_flowers&row_id=14" method="post">
<input type="hidden" name="itemName()" value="<? echo rand(1,500); ?>">
<input type="hidden" name="row_id" value="<? echo rand(1,500); ?>">
<input type="hidden" name="buket" value="Кардинал">
<input type="image" name="test03" src="/i/star.png" style="width:16px; height:16px;">
</form>
<?
$mass['get'] = $_GET;
$mass['post'] = $_POST;
//ech($_GET);
//ech($_POST);
//ech($_SESSION);
foreach($mass as $key => $value){
	foreach($value as $dkey => $dvalue){
		echo '<br />'.$dkey.' => '.$dvalue;
	}
}
?>