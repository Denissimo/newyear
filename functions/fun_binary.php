<? 
function binary($a){
	for($k=3; $k>=0; $k--){
		$code= floor($a/pow(2, $k));
		if($code>=1){
			$a-=pow(2, $k);
		}
		$res[$k]=$code;
	}
	return($res);
}

function cellrow($b){
	$res='';
	$num=count($b);
	for($i=0; $i<$num; $i++){
		if($b[$i]==0){
			$style="yell";
		}else{
			$style="whit";
		}
		//echo $style;
		$res.='<td class="'.$style.'">&nbsp;</td>';
		//echo $res;
		
	}	
	return $res;
}

?>