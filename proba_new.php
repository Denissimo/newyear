<?
session_start();
include "include/inc_includes.php";

global $my, $mysql, $proc;
//$my = new connect();
$mysql = new mysql();
$proc = new process($mysql);
echo '<br>+++++++<br>';
$proc->fetch('zz_bukets');
ech($proc->tabdata['zz_bukets']);
ech($proc);

?>