<?
if(!$_COOKIE['order_num']){
	
	$proc->fetch("counters");
	
	$ord_coun=$proc->tabdata["counters"]["order_num"]["num"];
	$ord_coun++;
	//print_r($proc->tabdata["counters"]["counter"]["num"]);
	$_COOKIE['order_num']=$ord_coun;
	setcookie("order_num",  $_COOKIE['order_num'],  time() + 31536000, "/");
	//setcookie("order_num",  $_COOKIE['order_num']);
	
	$reqnewordcoun='UPDATE `counters` SET num='.$ord_coun.' WHERE numtype="order_num"';
	$proc->go_req($reqnewordcoun);

}


?>