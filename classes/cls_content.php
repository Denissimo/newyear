<?
class mcontent{
	public $proc, $replace, $str, $pattern, $resrt, $lab, $income, $que, $str_temp, $flag_repl_tmp, $non_array, $marker, $debug;
	public $sub, $do_rpl, $subrepl, $def_pattern, $subtemp, $match, $data, $test; //match - метка того, что паттерн был найден
	public function __construct($proc){
		$this->proc = $proc;
		$this->def_pattern = '/\[>([a-zA-Z0-9_\-]*)<\]/'; //паттерн по умолчанию
		$this->subtemp = '/<\[([a-zA-Z0-9_\-]*)\]>/'; //паттерн подшаблона
		$this->data['SESSION'] = $_SESSION;
		$this->data['COOKIES'] = $_COOKIE;
		//$this->proc->fetch('sys_temps');
	}

	
	private function rep_call($matches, $replaces){
		return $replaces[$matches[1]];
	}
	
	public function res_subtemp(){
		$arg = func_get_args(); 
		//ech(htmlspecialchars($arg[2]));
		//ech(htmlspecialchars($arg[1]));
		//if(!$arg[0]){$arg[0] = $this->subtemp;}//шаблон
		//if(!$arg[1]){$arg[1] = $this->replace;} //Замена
		//if(!$arg[2]){$arg[2] = $this->str;}
		//if(!$arg[3]){$arg[3] = $this->restr($arg[1], $arg[2]);} //строка
		//$rest = $this->restr($arg[1], $arg[2]);//строка
		$rest = $arg[1];//строка
		//$repl = $this->do_subtemp($arg[0], $arg[1], $arg[3], $arg[2]);
		//$repl = $this->do_subtemp($arg[0], $arg[1], $arg[2]);
		//$repl = $this->do_subtemp($arg[0], $arg[2]);
		$repl = $this->do_subtemp($arg[0], $arg[1]);
		$rep_qty = count($repl); //ech($rep_qty);
		//ech($repl);
		//$this->replace = $repl;
		//ech($this->replace);
		//$this->pattern = $this->subtemp; //$this->proc->debug = 'content: 129';
		//$res = $this->do_content($this->pattern, $arg[1], $this->restr($this->replace, $this->str));
		$this->proc->debug = 'content: 39';
		$res = $this->do_content($arg[0], $repl, $rest);
		if($rep_qty){
			$this->proc->debug = 'content: 38 '; //echo $this->proc->debug;
			//$res = $this->res_subtemp($this->subtemp, $this->replace, $res);
			$res = $this->res_subtemp($this->subtemp, $res);
		}
		//ech(htmlspecialchars($res));
		return $res;
	}
	
	public function do_subtemp(){ //подшаблоны
		//echo 'SUB';
		$arg = func_get_args();
		//if(!$arg[0]){$arg[0] = $this->subtemp;}//шаблон
		//if(!$arg[1]){$arg[1] = $this->replace;} //Замена
		//if(!$arg[3]){$arg[3] = $this->str;}
		//if(!$arg[2]){$arg[2] = $this->restr($arg[1], $arg[3]);} //строка

		$mat = $this->matches($arg[0], $arg[1]); //preg_match_all - поиск совпадений $arg[0] в строке $arg[2]

		$in = '("'.implode('", "', $mat).'")';
		$sys_tempf = $this->proc->db->load_field('sys_temps');
		$primkey = $sys_tempf['sys_temps']['primary_key'];
		$query = 'SELECT * FROM sys_temps WHERE label IN '.$in.' ORDER BY '.$primkey.' ASC'; //ищем есть ли в таблице sys_temps макеты с найденными названиями
		//ech($query);
		$this->proc->request = $query;
		$this->proc->mod['index']=1;
		$subtemps = $this->proc->fetch('sys_temps');
		if(is_array($subtemps)){
			//echo(count($subtemps));
			foreach($subtemps as $key => $val){
				$marker = $val['marker'];
				$marktype = $val['marktype'];
				$markindex = $val['markindex'];
				$markterm = $val['markterm'];
				$label = $val['label'];
				//$row_id = $val['row_id'];
				$argum = $this->data[$marktype][$markindex];
				if(!$argum){$argum="''";}
				if($argum and $markterm and isset($marker)){
					$term = $argum.$markterm.$marker;
					//ech($term);
					$resterm = iif($term);
					if($resterm){
						$ressub[$label]['true'] = $key;
					}else{
						$ressub[$label]['false'] = $key;
					}
				}else{
					$ressub[$label]['noterm'] = $key;
				}
			}
			//ech($ressub);
			foreach($ressub as $key => $val){
				if(isset($val['noterm'])){
					if(isset($val['true'])){
						unset($subtemps[$val['noterm']]);
					}elseif(isset($val['false'])){
						unset($subtemps[$val['false']]);
					}
				}elseif(isset($val['true'])){
					if(isset($val['false'])){
						unset($subtemps[$val['false']]);
					}
				}
			}
			$labels = array_colum($subtemps, 'label');
			$temps = array_colum($subtemps, 'temp');
			//ech($subtemps);
			$restemps = array_combine($labels,$temps);
			//$restemps = array_colum($subtemps, 'temp');
		}
		//ech($restemps);
		//ech(count($restemps));

        if(count($restemps)>0) {
            $this->str_temp = $this->str;
        }
		
		//ech($restemps);
		return $restemps;
	}
	
	public function matches(){
		$arg = func_get_args();
		$res = preg_match_all($arg[0], $arg[1], $match);
		//ech($match[1]);
		return $match[1];
	}

	public function do_content(){
			
			setlocale(LC_ALL, 'ru_RU.UTF-8');

			$args = func_get_args(); //echo '<br />'.$this->proc->debug.'->'.$args[0];
			if(!$args[0]){ //echo '<br />'.$this->proc->debug;
				$args[0] = '/\[>([a-zA-Z0-9_\-]*)<\]/';
			}
			
			if(!$args[1]){//echo '<br />'.$this->proc->debug;
				//$args[1] = $this->replace; //Замена
			}else{
				$this->replace = $args[1]; //если убрать грохается замена активного элемента по шаблону [#pattern#]
			}

			
			if($this->debug){
				ech($this->replace[0]['code']);
			}
			
			if($this->sub){
				//$this->subrepl = $this->do_subtemp();
			}
			//$restr = $this->restr($args[1], $args[3]);
			if(is_array($this->replace) and !$this->non_array){
				if(is_array(current($this->replace))){ // шаблонизация контента (замена содержит массив)
					$this->flag_repl_tmp = $this->replace;
					unset($this->replace);
					if($this->debug){ech($this->flag_repl_tmp);}
					foreach($this->flag_repl_tmp as $key=>$val){
						if($this->debug){
							ech($key);
						}
						$val[''] = $key;
						$this->replace = $val; //echo '<br />if '.$this->proc->debug; ech($args[2]);
						$res01.=preg_replace_callback($args[0], array(get_class($this),"fill"), $this->restr($args[1], $args[2]));
					}
				}else{//echo '<br />else1 '.$this->proc->debug;
					$res01=preg_replace_callback($args[0], array(get_class($this),"fill"), $args[2]);
				}
			}else{//echo '<br />else2 '.$this->proc->debug;
				$res01=preg_replace_callback($args[0], array(get_class($this),"fill"), $this->restr($args[1], $args[2]));
			}
			
			unset($this->proc->debug);
			unset($this->flag_repl_tmp);
			unset($this->non_array);
			unset($this->debug);
	
		return $res01;
	}
	
	public function fill($matches){
		if($this->lab==1){
			echo 'str: '.', matches: '.$matches[1].'	=>	'.$this->replace[$matches[1]].'<br />+<br />';
		}
		return $this->replace[$matches[1]];
	}
	
	
	public function do_repl($enter){
		if(is_array($enter)){
			foreach($enter as $key => $val){
				$this->replace[$key] = $val;
			}
		}
	}
	public function make_content(){
		$args = func_get_args();
		
		//echo '<br /><b>make_content</b><br />';
		// замена меток на GET
		$make_pattern = '/\[G<([a-zA-Z0-9_\-]+)>\]/';
		$this->str = $args[0];
		//$make_replace = (array)$_GET;
		$make_replace = (array)$_SESSION['sys_tmp']['GET'];
		//$this->lab = 1;
		$this->non_array = TRUE;
		$this->proc->debug = 'content: 214';
		$res = $this->do_content($make_pattern, $make_replace, $this->str);
		
		
		// замена меток на POST
		$make_pattern = '/\[P<([a-zA-Z0-9_\-]+)>\]/';
		$this->str = $res;
		$make_replace = (array)$_SESSION['sys_tmp']['POST'];
		$this->proc->debug = 'content: 221';
		$res= $this->do_content($make_pattern, $make_replace, $this->str);
		
		// замена меток на SESSION ТУТ БЫВАЮТ БАГИ
		/*
		$this->pattern = '/\[S<([a-zA-Z0-9_\-]+)>\]/';
		$this->str = $res;
		$this->replace = (array)$_SESSION;
		$res = $this->do_content($this->pattern, $this->replace, $this->str);		
		*/
		//ech($_SESSION['POST']);
		// замена меток на all (GET + POST + SESSION)
		$make_pattern = '/\[<([a-zA-Z0-9_\-]+)>\]/';
		$this->str = $res;
		$make_replace = array_merge((array)$_SESSION['sys_tmp']['POST'], (array)$_SESSION['sys_tmp']['GET'], (array)$_POST, (array)$_GET);
		//$this->lab = 1;
		//ech($this->replace);
		$this->proc->debug = 'content: 237';
		$res = $this->do_content($make_pattern, $make_replace, $this->str);
		return $res;
	}
	
	public function restr(){
		//echo '<br />test: '.$this->test;
		$arg = func_get_args();
		if(!$args[0]){
			$args[0] = $this->replace; //Замена
		}
		
		if(!$args[1]){ //echo '<br />'.$this->proc->debug; ech($arg);
			$args[1] = $this->str; //шаблон
		}
		
		$separs = array('integer'=>'', 'string'=>'"');
		//$this->data['current'] = $this->data[''] = $this->replace;
		$this->data['current'] = $this->data[''] = $args[0]; //замены + сессии и куки; переназначаются элементы ['current'] и [''], а сессии и куки - в начале
		//ech($arg[0]);
		//ech(array_keys($this->data));
		//ech($this->data);
		if(is_array($args[1])){ //если МАКЕТОВ (str) с данной меткой несколько - используем тот, где параметр marker соответствует по условию.

			unset($markres);
			unset($restr);

			foreach($args[1] as $key=>$val){
				$marker = $val['marker'];
				$marktype = $val['marktype'];
				$markindex = $val['markindex'];
				$markterm = $val['markterm'];
				$argum = $this->data[$marktype][$markindex];
				$argtype = gettype($argum);
				$sep = $separs[$argtype];
				$argum = $sep.$argum.$sep;
				//echo $marker.'<br />=> type:'.$marktype.' => '.$markterm.' => '.$markindex.' argum:'.$argum;
				//echo '<br />';
				if(!$markterm){
					$altertemp = $val['temp'];
				}
				if($argum and $markterm and $marker){
					//ech($this->replace); //первый вывод - массива целиком
					//echo $this->test;
					$term = $argum.$markterm.$marker;
					//echo '<br />took: '.$term;
					$resterm = iif($term);
					if($resterm){
						$restr = $val['temp'];
						//echo '<br />BINGO: '.$val['row_id'].'<br /><br />';// выводится 1 раз
					}else{
						//echo '---<br />'; //не выводится
					}
				}else{
					//$altertemp = $val['temp'];
					//$alter_id =  $val['row_id'];
					//echo '<br />alter: '.$alter_id;
				}
				//echo '<br />'.$val['row_id'];
				//$lastemp = $val['temp'];
			}
			
			if(!$restr){
				//echo '<br />'; 
				$restr = $altertemp;
			}
			
		}else{ //шаблон с данной меткой один
			//$this->test = 'str';
			$restr = $args[1];
			//ech(htmlspecialchars($restr));
		}
		return $restr;
	}
	
	public function load_templ(){
		$argpt = func_get_args();
		$this->proc->mod['index']=1;
		//$this->proc->mod['limit']=1;
		if($argpt[2]){
			$this->proc->mod['filter']='label="'.$argpt[0].'" and temptype="'.$argpt[1].'"';
		}else{
			$this->proc->mod['filter']='label="'.$argpt[0].'"';
		}
		$proc->db->keyfield['sys_temps'] = 'marker';
		$sys_temps = $this->proc->fetch('sys_temps');
		//ech($temps);
		if($this->proc->tab['sys_temps']['qty']>1){ //если есть несеолько одноимённых шаблонов, то комбинируем

			//$mark = array_colum($sys_temps, 'marker'); //ech($mark);
			//$tpls = array_colum($sys_temps, 'temp'); //ech($tpls);
			//$temp = array_combine($mark, $tpls);
			$temp = $sys_temps;
		}else{
			$temp = $this->proc->tabdata['sys_temps'][0]['temp'];
			//$temp = $this->proc->tabdata['sys_temps'][0]; //тут грохается загрузка одиночных шаблонов в load_cont()
		}
		/*
		if($argpt[0]=='nygalunit'){
			echo htmlspecialchars($temp['temp']);
			ech(array_keys($temp));
		}
		*/
		//ech($temp);
		//ech($this->proc->tabdata['sys_temps']);
		unset($argpt);
		return $temp;
	}
	
	public function load_repl(){
		$arg = func_get_args();
		$this->proc->fetch($arg[0]);
		$repl = $this->proc->tabdata[$arg[0]];
		//ech($repl);
		//ech($this->proc->tab[$arg[0]]);
		//ech($this->proc->tabdata['sys_temps']);
		unset($arg);
		return $repl;
	}
	
	public function load_cont(){
		$arg = func_get_args();
		if(is_array($arg[0])){
			//echo 'Массив: '; ech($arg[0]);
			$lc_replace = $arg[0];
		}else{
			//echo 'Не массив: '; ech($arg[0]);
			$lc_replace = $this->load_repl($arg[0]);
		}
		$just_label = preg_match('/[a-zA-ZА-Яа-яЁё0-9_\-\s]+$/', $arg[1]); // $arg[1] - метка шаблона в БД (а не содержит непосредственно шаблон) 
		if($just_label){
			//echo 'просто метка';
			if($arg[2]){
				$this->str = $this->load_templ($arg[1], $arg[2]);
			}else{
				$this->str = $this->load_templ($arg[1]);
			}
			//ech(array_keys($this->str));
		}else{
			//echo 'НЕ просто метка';
			$this->str =  $arg[1];
		}
		$this->proc->debug = 'content: 376';
		$conts = $this->do_content($this->pattern, $lc_replace, $this->str);
		unset($arg);
		unset($this->test);
		//echo 'lc END';
		return $conts;
	}
	
	

	
	
}

?>