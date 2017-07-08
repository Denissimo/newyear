<?
//ech($_POST);


//ech($proc->tabdata['lodges']);
//ech($mas);
$is_err = FALSE;
$err_mess = '';
$err_id = '';


foreach($_POST as $key => $val){
	if($val){
		$_SESSION[$key] = $val;
		if(!$check[$val]){
			$check[$val] = $key;
		}else{
			$is_err = TRUE;
			$_SESSION['sys_tmp']['message'] = 'Повтор ID';
			$_SESSION['err_ids'][$check[$val]] = 'ERR';
			$_SESSION['err_ids'][$key] = 'ERR';
		}
	}
}

if(!$is_err){
	$i=0;
	$ind='tex_'.$i;
	while($_POST['tex_'.$i]){
		$arr['rfid'] = $_POST['tex_'.$i];
		$arr['account'] = $_POST['tex_'.$i];
		$arr['typeuser'] = 2;
		$arr['color'] = 1;
		$proc->put_array($arr, 'sys_users');
		$new_id = mysql_insert_id();
		$arr2['order_id'] = $_POST['order_id'];
		$arr2['user_id'] = $new_id;
		$proc->put_array($arr2, 'link_user_ord');
		$i++;
	}
	
}

header("Location: ".$_SERVER['HTTP_REFERER']);
//echo $new_id;
//ech($_SESSION);
?>