<?

function foo(&$var)
{
    $var++;
}
$a=5;
foo($a);
echo $a;
echo '<br>';


$d=1;
$c = &$d;
$b = &$c;
$a = &$b;

$d=2;
echo 'a='.$a.', b='.$b.', c='.$c.', d='.$d;

//$proc->mod['parent'] ='par';
//$proc->mod['parent'] ='par->domain';
//$proc->fetch('zz_domains');

$proc->mod['parent'] ='parent->id';
$proc->fetch('test_tbl');

//ech($proc->tabdata['zz_domains']);
//ech($proc->tabbranch);
//ech($proc->tablevel);
//ech($_SESSION);


?>