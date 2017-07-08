<?
function dropsess($except){
	/*
	$except = explode(' ', $except);
	//print_r($except);
	$i=0;
	while($except[$i]){
		$temp[$i] = $_SESSION[$except[$i]];
		//echo 'except: '.$except[$i].' => '.$temp[$i]."<br />";
		$i++;
	}
	
	foreach($_SESSION as $key => $val){
		unset($_SESSION[$key]);
		//echo 'deleted: '.$key."<br />";
	}
	for($j=0; $j<$i; $j++){
		$_SESSION[$except[$j]] = $temp[$j];
		//echo 'saved: '.$except[$j]."<br />";
	}
	*/
	unset($_SESSION['sys_tmp']);
}
?>