<?
function if_id_user(){
	
	if($_COOKIE['iduser']>0){
		$res["OK"]=TRUE;
		$res["ID"]=$_COOKIE['iduser'];
		$res["Type"]='user_id';
		}else{
		$res["OK"]=FALSE;
		$res["ID"]=$_SERVER['REMOTE_ADDR'];
		$res["Type"]='ip';
	}
	return $res;
}
?>