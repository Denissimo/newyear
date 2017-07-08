<?
session_start();
unset($_SESSION['POST']);
//unset($_SESSION['GET']);
echo '+++++++';
echo'<pre>';
print_r($_SESSION);
echo'</pre>';


?>