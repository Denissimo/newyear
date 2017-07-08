<? 
if(!$_COOKIE['iduser']){
	
	$proc->fetch("sys_cfg");
	
	$coun=$proc->tabdata["sys_cfg"]["counter"]["val"];
	$coun++;
	//print_r($proc->tabdata["counters"]["counter"]["num"]);
	$_COOKIE['iduser']=$coun;
	setcookie("iduser",  $_COOKIE['iduser'],  time() + 31536000, "/");
	
	$reqnewcoun='UPDATE `sys_cfg` SET val='.$coun.' WHERE numtype="counter"';
	$proc->go_req($reqnewcoun);

}


?>