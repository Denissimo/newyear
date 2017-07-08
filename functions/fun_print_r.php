<?

function ech($dat){
	echo '<pre>';
	//var_dump($dat);
	print_r($dat);
	echo '</pre>';
	return 0;
}

	
function is_arg(){
	$arg = func_get_args();
	if($arg[0]){
		$res = $arg[0];
	}else{
		$res = $arg[1];
	}
	return $res;
}
	
function set($arg1, $arg2){
	if(!isset($arg1)){ 
		//echo '<br />+++++++++++++++++++++++++++++'.$arg2;
		$arg1 = $arg2;
	}
}

function if0(&$dat, $val){
	if($dat==0){
		$dat = $val;
		return TRUE;
	}else{
		return 0;
	}
}

function assign($arg1){
	return $arg1;
}

function del($arg1){
	unset($arg1);
	return 0;
}

function xml(){
	$arg = func_get_args();
	$xml = new SimpleXMLElement($arg[0]);
	return $xml;
}

function std(){
	$arg = func_get_args();
	$std = new stdClass;
	return $std;
}

function tab(){
	$argtb = func_get_args();
	
	$tabsep = strpos($argtb[0], separator1);
	if($tabsep){
		$tabmas = explode(separator1, $argtb[0]);
		$table = $tabmas[1];
	}else{
		$table = $argtb[0];
	}
	return $table;
}


function func(){
	$args = func_get_args();
	//ech($args);
	if($args[2]){
		$res = $args[2]->$args[0]($args[1]);
	}else{
		$res = $args[0]($args[1]);
	}
	return $res;
}

function options(){ //формирует теги options; первый аргумент - массив (индексы - value, значения - метки), второй аргумент - значение для selected
	$args = func_get_args();
	$sel[$args[1]] = ' selected="selected" ';
	if(is_array($args[0])){
		foreach($args[0] as $key=>$val){
			//echo $key.' >>> '.$val.' +++ '.$sel[$key].'<br />';
			$res.='<option value="'.$key.'"'.$sel[$key].'>'.$val.'</option>';
		}
	}
	return $res;
}

function date_trans(){ //преобразовывает дату из 31.12.2001 в 2001-12-31
	$args = func_get_args();
	if(!$args[2]){$args[2] = '-';}
	if(!$args[1]){$args[1] = '.';}
	$datearr = explode($args[1], $args[0]);
	$datearr = array_reverse($datearr);
	$newdate = implode($args[2], $datearr);
	return $newdate;
}

function parse_obj(){
	$args = func_get_args();
	$parsed_str = preg_match_all("/(>|@|\|)([a-zA-Zа-яА-я0-9_\-]*)/", $args[1], $match);
	//ech($match);
	if(isset($match[0][0])){
		$parsed_ob = go_deep($args[0], $match);
	}elseif(is_object($args[0])){
		$parsed_ob = $args[0]->$args[1];
	}else{
		$parsed_ob = $args[0][$args[1]];
	}
	//$aas = &$bbs;
	if($args[2]){
		return $parsed_ob;
	}else{
		return $parsed_ob;
	}
}

function unset_zero(){
	$args = func_get_args();
	$num = count($args)-1;
	//echo $num;
	if(is_array($args[0]) or is_object($args[0])){
		foreach($args[0] as $key=>$val){
			if(is_array($val) or is_object($val)){
				$args[0][$key] = unset_zero($val, $args[1]);
			}else{
				
				//for($
				if($args[0][$key]==$args[1]){
					//echo '<br />'.$key.'>>>'.$args[0][$key];
					unset($args[0][$key]);
					//echo '<br />'.$key.'>>>'.$args[0][$key];
				}
			}
		}
	}
	return $args[0];
}

function go_deep(){
	$args = func_get_args();
	//echo 'args[1][2][0]: '.$args[1][2][0].'<br />';
	//echo 'args[1][1][0]: '.$args[1][1][0].'<br />';
	//ech($args[1][2]);
	if($args[1][1][0]=='>'){
		$target = $args[0]->$args[1][2][0];
	}elseif($args[1][1][0]=='@'){
		$target = $args[0]->$args[1][2][0]();
	}else{
		//echo '<br />'.$args[1][2][0];
		$target = $args[0][$args[1][2][0]];
	}
	
	if(isset($args[1][2][0]) and isset($args[1][2][1])){	// and is_array($args[0][$args[1][2][0]])
		
		//echo gettype($args[1][2][0]).'<br />';
		//ech($args[1][2][0]);
		$arg1 = $target;
		//echo 'arg1: ';
		//ech($arg1);
		//ech($args[1]);
		array_shift($args[1][2]);
		array_shift($args[1][1]);
		//array_shift($args[1][0]);
		
		$arg2 = $args[1];
		//echo 'arg2: ';
		//ech($arg2[2]);
		$res = go_deep($arg1, $arg2);
	}else{
		//echo 'res';
		$res = $target;
		//ech($res);
		return $res;
	}
	return $res;
}

function mask(){
	$args = func_get_args();
	$obj01 = $args[0];
	$res01.=preg_replace_callback($this->pattern, array(get_class($this),"fillmask"), $this->str);
}
/*
function fill($matches){
	return $this->replace[$matches[1]];
}
*/
function obj2arr(){
	$args = func_get_args();
	$array=array();
	//if(is_object($args[0]) or is_array($args[0])){
		foreach($args[0] as $member=>$data){
			if(is_object($data) or is_array($data)){
				$array[$member]=obj2arr($data);
			}else{
				$array[$member]=$data;
			}
			//echo $member.'<br />';
		}
	//}
	return $array;
}

function var2arr(){
	$args = func_get_args();
	$res = (array)$args[0];
	return $res;
}

function to_arr(){
	$args = func_get_args();
	if(is_array($args[0])){
		$res = $args[0];
	}else{
		$res = array(0=>$args[0]);
	}
	return $res;
}

function array_comb(){
	$args = func_get_args();
	$res = $args[0];
	foreach($args[0] as $key=>$val){
		$res[$key]=$args[1][$val];
	}
	return $res;
}


function iif(){ //проверка условия в строковой переменной
	$args = func_get_args();
	$fullterm = 'if('.$args[0].'){$res=TRUE;}else{$res=FALSE;}';
	eval($fullterm);
	return $res;
}


function xml_to_array($XML)
{
	$XML = trim($XML);
	$returnVal = $XML;

	// Expand empty tags
	$emptyTag = '<(.*)/>';
	$fullTag = '<\\1></\\1>';
	$XML = preg_replace ("|$emptyTag|", $fullTag, $XML);

	$matches = array();
	if (preg_match_all('|<(.*)>(.*)</\\1>|Ums', trim($XML), $matches))
	{
		// Если есть элементы, тогда вернуть массив, иначе текст
		if (count($matches[1]) > 0) $returnVal = array();
		foreach ($matches[1] as $index => $outerXML)
		{
			$attribute = $outerXML;
			$value = xml_to_array($matches[2][$index]);
			if (! isset($returnVal[$attribute])) $returnVal[$attribute] = array();
				$returnVal[$attribute][] = $value;
		}
	}
	// Bring un-indexed singular arrays to a non-array value.
	if (is_array($returnVal)) foreach ($returnVal as $key => $value)
	{
		if (is_array($value) && count($value) == 1 && key($value) === 0)
		{
			$returnVal[$key] = $returnVal[$key][0];
		}
	}
	return $returnVal;
}

function getform(){ //создаёт форму из XML. Предназначена только для платфона.
	$args = func_get_args();
	//echo 'Title: '.$args[0]->title.'<br />';
	/*
	$input_temps = array(
		0=>'<br /><label>[>label<]</label>&nbsp;<input type="text" class="form-control" name="[>name<]" class="payinput" id="[>id<]"  placeholder="[>placeholder<]" value="">',
		1=>'<br /><label>[>label<]</label>&nbsp;<input type="text" class="form-control" name="[>name<]" class="payinput" id="[>id<]"  placeholder="[>placeholder<]" value="">',
		2=>'<br /><label>[>label<]</label>&nbsp;<input type="text" class="form-control" name="[>name<]" class="payinput" id="[>id<]"  placeholder="[>placeholder<]" value="">',
		3=>'<br /><label>[>label<]</label>&nbsp;<input type="text" class="form-control" name="[>name<]" class="payinput" id="[>id<]"  placeholder="[>placeholder<]" value="">',
		4=>'<br /><label>[>label<]</label>&nbsp;<input type="text" class="form-control" name="[>name<]" class="payinput" id="[>id<]"  placeholder="[>placeholder<]" value="">',
		5=>'<br /><label>[>label<]</label>&nbsp;<input type="text" class="form-control" name="[>name<]" class="payinput" id="[>id<]"  placeholder="[>placeholder<]" value="">'
	
	);
	*/
	$contm['label'] = $args[0]->title.' ('.$args[0]->id.') ';
	$contm['name'] = $args[0]->id;
	$contm['id'] = $args[0]->id;
	$contm['type'] = $args[0]->type;
	$input_value = '<label>[>label<]</label>&nbsp;<input type="text" class="form-control paysoap" name="[>namevalue<]" class="payinput" id="[>id<]"  placeholder="[>placeholder<]" value="">';
	$input_type = '<input type="hidden" name="[>nametype<]" class="payinput" id="[>id<]-type"  value="'.$contm['type'].'" />';
	$input_id = '<input type="hidden" name="[>nameid<]" class="payinput" id="[>id<]-field"  value="'.$contm['id'].'" />';
	$contm['field'] = $input_value.$input_type.$input_id;
	$ops = $args[0]->options;
	if($ops){
		$ops_type = gettype($ops);
		switch($ops_type){
			case 'object':
				$options = '<option value="'.$ops->value.'">'.$ops->title.'</option>';
			break;
			case 'array':
				foreach($ops as $gkey=>$gval){
					$opti = '<option value="'.$gval->value.'">'.$gval->title.'</option>';
					$options.=$opti;
				}
				
			break;
		}
		$contm['field'] = '<br /><label>[>label<]</label><select class="form-control" name="[>name<]" id="[>id<]">[>options<]</select>'; //size="8"
		$contm['options'] = $options;
		unset($options);
	}
	
	$contm['rules'] = $args[0]->rules;
	
	$contm['placeholder'] = $args[0]->example;
	return $contm;
	}
	
	


?>