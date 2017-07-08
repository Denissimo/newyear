<?
include "functions/fun_struc644.php";

unset($messag);
foreach($_GET as $key => $val){
	$messag.=('[ '.$key.' ] => '.$val.'<br />');
	//echo '[ '.$key.' ] => '.$val.'<br />';
}

//echo '<br />rfid="'.$_GET['Card'].'"<br />';

if($_GET['Card']){
	$proc->mod['filter']='rfid="'.$_GET['Card'].'"';
	$proc->fetch('sys_users');
	unset($proc->mod['filter']);
	/*
	echo '+++<pre>';
	print_r($proc->tabdata['sys_users']);
	echo '</pre>';
	*/
}
//$mess=json_encode($proc->tabdata['sys_users']);
//echo "<br />Данные GET:<br />";
//echo $messag;

switch($_GET['mode']){
	
	case'GetCardInfoL':
	$x = struc644($proc->tabdata['sys_users']);
	//echo '>>'.$x.'<<<br />';
	echo json_encode($x);
	
	if($messag){
		$headers = "Content-type: text/html; charset=utf-8\n".
		"From: den@rosvet.ru\n".
		"X-Mailer: PHP/".phpversion()."\n". 
		"Date: ".date("r")."\n". 
		"Reply-To: den@rosvet.ru\n\n"; 
		mail("den@rosvet.ru", "GET проба ".date("H:i:s"), $messag, $headers);
	}
	break;
	
	case'TransactionL':
	$acc = $_GET['Account'];
	$jstruc = base64_decode($_GET['Info']);
	$jstruc = json_decode($jstruc);
	break;
	
}
//echo "++++++++++++++++++++\n--------------------";
?>