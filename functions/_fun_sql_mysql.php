<?
function sql_go(){
	//$my_host = "ddrozdetskiy.narvac.office";
	//$my_user = "root";
	//$my_password = "root";
	$my = mysql_connect(my_host, my_user, my_password);
	$myb=mysql_select_db(my_base, $my);
	return($my);
}

function sql_stop(){
	global $my;
	mysql_close($my); 
	return 0;
}

?>