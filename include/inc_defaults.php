<?
function getindex($index, $value){
	//$res[$index] = $value;
	if(!is_array($res)){
		$res = array();
	}
	array_push($res, $value);
	return $res;
}

function mas_branch($arr_index, $val){
	//ech($arr_index);
	if($arr_index[1]){
		//echo '1 >> '.$arr_index[0].'<br />';
		$cur_ind = $arr_index[0];
		array_shift($arr_index);
		$res[$cur_ind]= mas_branch($arr_index, $val);
	}else{
		//echo '0 >> '.$arr_index[0].'<br />';
		$res[$arr_index[0]]= $val;
		//ech($res);
	}
	return $res;
}

$proc->mod['filter'] = 'label = "'.$proc->label.'" or label IS NULL or label = ""';
$proc->mod['order'] = 'row_id';
$proc->mod['index'] = 1;
$proc->fetch('sys_defaults');

$classes = get_declared_classes();
//$num = count($classes);
//$classes = array_flip($classes);
//$classes['stdClass'] = $num;

$defs = $proc->tabdata['sys_defaults'];

for($i=0; $i<$proc->tab['sys_defaults']['qty']; $i++){
	$cls = $defs[$i]['varclass'];
	$var = $defs[$i]['varname'];
	if($defs[$i]['varclass'] and in_array($defs[$i]['varclass'], $classes)){//$classes[$defs[$i]['varclass']]){
		if($defs[$i]['varindex']){
			if($defs[$i]['separator']){
				$ind = explode($defs[$i]['separator'], $defs[$i]['varindex']);
				$$cls->$var = mas_branch($ind, $defs[$i]['value']);
				unset($ind);
			}else{
				$ind[0] = $defs[$i]['varindex'];
				$$cls->$var = mas_branch($ind, $defs[$i]['value']);
				unset($ind);
			}
		}else{
			$$cls->$var = $defs[$i]['value'];
		}
	}else{
		if($defs[$i]['varindex']){
			if($defs[$i]['separator']){
				$ind = explode($defs[$i]['separator'], $defs[$i]['varindex']);
				$$var = (array)$$var+(array)mas_branch($ind, $defs[$i]['value']);
				unset($ind);
			}else{
				//echo '<br />++ '.$var.'	'.$defs[$i]['varindex'];
				$ind[0] = $defs[$i]['varindex'];
				$$var = (array)$$var + (array)mas_branch($ind, $defs[$i]['value']);
				unset($ind);
			}
		}else{
			
			$$var = $defs[$i]['value'];
		}
		
	}
	//echo $i.'	';
}



?>