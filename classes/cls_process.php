<?
/*
Форматы автозамен
[>метка<] - замена контента
[<метка>] - замена  данных в форме
[{метка}] - замена  URL
[}метка{] - замена  ссылки
<[метка]> - подшаблон

*/
class process extends tree{
//class process{
    private $table, $arr, $i, $full_url, $despaced, $uri, $form_exceptsn, $form_max, $action;
	public static $probe;
	//public $not_logged;
	//private $request, $query, $number;
	public $db, $mysql, $sys, $fields, $tabdata, $request, $field, $keyfield, $tab, $non_unique, $req, $mod, $content, $url, $label, $url_label, $formname, $post, $message, $msg_separ, $ok_form, 
	$form, $form_exc, $form_maxle, $identif, $url_sample, $cur_label, $check_form, $form_filter, $array_data, $req_uri, $vall, $chpu_addr, $slash, $chpu, $url_query, $testmode, $debug, $config;
	
   
    public function __construct($mysql, $sqlite){
		$arg = func_get_args(); 
		//ech(array_keys($arg));
		//$this->testmode = 1;
		$this->mysql = $mysql;
		$this->sqlite = $sqlite;
		$ds = defsource;
		//echo $ds;
		$this->db = $this->$ds;
		//ech($this->$ds);
		//ech($this->mysql);
		
		//echo '<br />'.$_SERVER['REQUEST_URI'].'<br />';
	
		if($_SERVER["UNENCODED_URL"]){
			$this->req_uri = $_SERVER["UNENCODED_URL"];
		}else{
			$this->req_uri = $_SERVER['REQUEST_URI'];
		}
		
		$sys_folder = preg_replace('|/index\.php$|', '', $_SERVER['PHP_SELF']);
		$this->req_uri = preg_replace('|^'.$sys_folder.'|', '', $this->req_uri);

		$this->sys['url'] = $this->url_parse($this->req_uri);
		$this->sys['url']['uri'] = preg_replace('/\/$/', '', $this->sys['url']['path']);
		//ech($this->sys['url']);

		$this->chpu_load();
		$this->chpu_par = $this->load_parents($this->chpu_tab, 'parent', 'label');
		//ech($this->chpu_par);
		$this->mod['fields'] = 'numtype, category, val';
        $this->fetch('sys_cfg');
		$this->sys['config'] = $this->tabdata['sys_cfg'];
		$this->config = array_colum($this->sys['config'], 'val');
		if($this->sys['config']['matchcase']['val']==0){ 
		
			foreach($this->sys['url'] as $key => $value){
				//$this->vall = $value;
				if(!is_array($this->sys['url'][$key])){
					$this->sys['url'][$key] = mb_strtolower($this->sys['url'][$key]);
				}
			}
			/*
			foreach($this->sys['url']['list'] as $key => $value){
				//$this->vall = $value;
				$this->sys['url']['list'][$key] = mb_strtolower($this->sys['url']['list'][$key]);
			}
			*/
		}
		
		//$this->chpu_par = $this->load_parents('sys_urls', 'parent', 'label');		
		//ech($this->sys['url']['list']);
		$this->identif = $this->sys['url']['full'];
		$this->label = $this->url_identify($this->sys['url']['list']);
		/*
		echo 'label >>> '.$this->label;
		echo '<br />';
		echo 'url_label >>> '.$this->url_label;
		*/
		//ech($this->tabdata);
		$this->sys['label'] = $this->label;//echo $this->sys['label'];
		$this->mod['index']=1;
		$this->mod['limit']=1;
		$this->mod['filter']='address="'.$this->url_label.'"';
		//echo '<br />'.$this->mod['filter'];
		$this->fetch('sys_urls');
		$this->chpu = $this->tabdata["sys_urls"][0];
		//ech($this->chpu);
		
		$list = array_flip($this->sys['url']['list']);
		$addr = $this->chpu['address'];
		//echo 'list: '.$list[$addr];
		$del = -($this->sys['url']['qty']-$list[$addr]-1);
		$lista = $this->sys['url']['list'];
		if($del==0){
			//echo 'zero<br />';
			$stay = array();
		}else{
			$stay = array_splice($lista, $del);
		}
		$this->sys['url']['base'] = $lista;
		$this->sys['url']['baseqty'] = count($this->sys['url']['base']);
		$this->sys['url']['extra'] = $stay;
		$this->sys['url']['extraqty'] = count($this->sys['url']['extra']);
		
		
		
		if($this->chpu['slash']){
			$this->slash = '/';
		}else{
			$this->slash = '';
		}
		if($this->sys['url']['query']){
			$this->url_query = '?'.$this->sys['url']['query'];
			//echo $this->url_query.'<br />';
		}
		/*
		if($this->slash and  !$this->sys['url']['slash']){
			$redir = '/'.$this->make_url($this->sys['url']['full']).$this->slash.$this->url_query;
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $redir");
			//echo '0->/';
		}
		
		if(!$this->slash and  $this->sys['url']['slash']){
			//$redir = '/'.$this->make_url(substr($this->sys['url']['full'],0,-1));
			$redir = '/'.$this->make_url($this->sys['url']['full']).$this->url_query;
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $redir");
			//echo '/->0<br />'.$redir;
		}
		*/
		//echo $redir;
		/*
		echo $this->label;
		ech($this->tabdata["sys_urls"]);
		
		echo '<br />';
		echo $this->url_label;
		*/
		
		//$this->sys['label'] = $this->tabdata['sys_urls'][$this->identif]['label'];
		unset($this->mod);
		
		$this->iniset();
		//$this->defaults();
		//ech($this->tabdata['sys_urls'][$this->identif]['label']);
		//ech($this->tabdata["sys_urls"]);
		
    }
	
	
	public function url_parse($url){
		//echo '<br />proc->url_parse() $url: '.$url;
		$full_url = parse_url($url);
		//echo '<br />proc->url_parse(): '.$full_url['path'][strlen($full_url['path'])-1];
		//echo '<br />proc->url_parse(): '.$full_url['path'];
		if($full_url['path']=='/'){
			$urr['full'] = '/';
			$urr['list'][0] = '/';
			$urr['last'] = '/';
			//$urr['pattern'] = '${1}1,$1';
			$urr['qty']=1;
			$urr['path'] = '/';
			$urr['query'] = $full_url['query'];
			//echo '+++';
		}else{
			$urr['len']=strlen($full_url['path']);
			if(strpos($full_url['path'],"%20")){
				$despaced=str_replace("%20", "_", $full_url);
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $despaced");
			}
		
			$uri=explode("/", $full_url['path']) ;
			
			$i=1;
			$urr['full']=str_replace('_', ' ', urldecode($uri[1]));
			while ($uri[$i]){
				$urr['list'][$i-1]=str_replace('_', ' ', urldecode($uri[$i]));
				if($i>1){
					$urr['full'].=('/'.$urr['list'][$i-1]);
				}
			$i++;
			}
			$urr['last'] = $urr['list'][$i-2];
			$urr['qty']=$i-1;
			$urr['path'] = $full_url['path'];
			$urr['query'] = $full_url['query'];
			if($full_url['path'][$urr['len']-1]=='/'){//проверяем наличие слэша в конце
				$urr['slash']=TRUE;
			}else{
				$urr['slash']=FALSE;
			}
		}
		//$urr['full'].=('#'.$urr['query']);
		return $urr;
	}
	
	public $chpu_tab, $chpu_par;
	private function chpu_load(){
		$this->mod = array('index'=>1, 'fields'=>'address, parent, label, level, independ', 'order'=>'row_id');
		//$this->mod['fields'] = ''
		$this->fetch('sys_urls');
		//ech($this->tabdata['sys_urls']);
		$this->chpu_tab['list'] = $this->tabdata['sys_urls'];
		if(is_array($this->chpu_tab['list'])){
			foreach($this->chpu_tab['list'] as $key => $val){
				$this->chpu_tab['labs'][$this->chpu_tab['list'][$key]['label']] = $this->chpu_tab['list'][$key]['address'];
			}
		}
		unset($this->tabdata['sys_urls']);
		
		$this->db->keyfield['sys_urls'] = 'label';
		$this->mod['filter'] = 'independ IS NOT NULL and independ!=0';
		$this->mod['fields'] = 'label ,address, independ';
		$this->fetch('sys_urls');
		$this->chpu_tab['indep'] = $this->tabdata['sys_urls'];
		unset($this->db->keyfield['sys_urls']);
		unset($this->tabdata['sys_urls']);
		//ech($this->chpu_tab);
	}
	
	public $tt, $lp_test;
	public function load_parents(){
		
		$arglp = func_get_args();
		$this->par_field = $arglp[1];
		$this->par_key = $arglp[2];
		$res = $this->draw_root($arglp[0]);
		return $res;
	}
	
	public $url_input, $chop_pcs, $url_row, $url_full, $url_num, $flag_cut, $flag_chop, $prelab, $ext_tmp, $new_prelab, $url_uncut, $url_unchop, $extra_left, $prelab_lvl, $flag_urlev, $lab_final, $last_ext, $lab_indep, $last_ext_url, $lab_final_url, $new_prelab_url, $prelab_url, $par, $url_lvl, $cut_qty; 
	/*
	flag_urlev - значение level у найденного chpu
	extra_left - отрезанные
	url_uncut - неотрезанные
	url_unchop - неотрубленные
	url_row сохранённый состав url для ф-ции chop (чтобы не менялся от cut)
	*/
	
	public function url_identify(){
		//echo 'url_identify';
		$argui = func_get_args();
		unset($this->prelab);
		unset($this->new_prelab);
		unset($this->new_prelab_url);
		unset($this->url_input);
		unset($this->lab_final);
		unset($this->url_label);
		$this->url_input = $argui[0];
		$this->url_row = $argui[0];
		$this->url_full = $argui[0];  if($this->testmode or $_GET['testmode']){echo '<br />input: ';ech($this->url_input);}
		$this->url_uncut = count($this->url_input)-1; if($this->testmode or $_GET['testmode']){echo '<br /> uncut: '.$this->url_uncut;}
		$this->url_unchop = count($this->url_input)-1;
		$this->url_find($this->url_row);
		if($this->lab_final){ if($this->testmode or $_GET['testmode']){echo '<br /><font color="#00FF00"><b>url_identify() ->lab_final = '.$this->lab_final.'</b></font>';}
			$this->url_label = $this->lab_final_url;
			$this->url_level(); 
			unset($this->testmode);
			return $this->lab_final;
		}else{	if($this->testmode or $_GET['testmode']){echo '<br /><font color="#00FF00"><b>url_identify() NO lab_final</b></font>';}
			$this->url_label = $this->last_ext_url; 
			$this->url_level();
			unset($this->testmode);
			return $this->last_ext;
		}
	}
	
	public function url_level(){
		if($this->testmode or $_GET['testmode']){echo '<font color="#FF8800"><br />url_label: '.$this->url_label.'</font>';}
		$ur_expl = explode('/', $this->url_label); //на случай единого адреса, но со слешами
		$ur_qty = count($ur_expl);
		$num = array_search($ur_expl[0], $this->url_full);
		$this->url_lvl = $num + $ur_qty;
		if($this->testmode or $_GET['testmode']){echo '<font color="#008800"><br />url_lvl: '.$this->url_lvl.'</font>';}
		//$this->url_lvl
	}
	
	
	public function url_find(){
		$argfu = func_get_args();
		$this->url_input = $argfu[0];
		if($this->testmode or $_GET['testmode']){ech($this->url_input);}
		$impl_url = implode('/', $this->url_input);
		if($this->testmode or $_GET['testmode']){echo '<br /> impl: '.$impl_url;}
		if($impl_url=='/'){
			$impl_url = '';
		}
		$this->mod['filter']='address = "'.$impl_url.'"';
		//ech($this->mod['filter']);
		if($this->testmode or $_GET['testmode']){echo '<br />filter: '.$this->mod['filter'];}
		$this->mod['index']=1;
		$this->mod['limit']=1;
		$this->fetch('sys_urls');
		$this->chpu = $this->tabdata['sys_urls'][0];
		if($this->tab['sys_urls']['qty']==0){ if($this->testmode or $_GET['testmode']){echo '<br />Не найдено';}
			$this->cut_qty = 1;
			$this->url_cut();
		}else{	if($this->testmode or $_GET['testmode']){echo '<br /><font color="#008060">url_find(+) <b>Найдено</b> '.$impl_url.' >>> '.$this->prelab.' >>> '.$this->new_prelab.' $this->url_input: </font>';ech($this->url_input);ech($this->tabdata['sys_urls'][0]);}
			$this->cut_qty = count($this->url_input);
			$this->lab_indep = $this->chpu['independ'];
			//echo '++'.$this->lab_indep.'++';
			
			$this->new_prelab_url = $this->chpu['address'];
			$this->new_prelab = $this->chpu['label']; if($this->testmode or $_GET['testmode']){echo '<br /> <font color="#FF8000">>>'.$impl_url.' New_prelab: '.$this->new_prelab.' url_uncut: '.$this->url_uncut.', count(row):'.count($this->url_row).', extra_left: '.$this->extra_left.'</font>';}
			$this->par = $this->chpu_par['parent'][$this->new_prelab];//ech($this->chpu_par['parent']);
			//ech($this->tabdata['sys_urls'][0]);
			
			if($this->prelab or $this->par){ if($this->testmode or $_GET['testmode']){echo '<br /><font color="#0000FF">url_find() '.$impl_url.' Prelab: '.$this->prelab.' Parent: '.$this->chpu_par['parent'][$this->new_prelab].'</font>';}
			//echo '<br />uncut: '.$this->url_uncut;
			
				if($this->lab_indep){ if($this->testmode or $_GET['testmode']){echo ' <br /><font color="#FF0000">url_find() <b>INDEPENDENT</b>Old Prelab = '.$this->prelab.'; New Prelab = '.$this->new_prelab.'</b>, chop_pcs = '.$this->url_uncut.'</font>';}
					if(!$this->prelab){ //Проба_3 выдаёт 404
						$this->prelab = $this->new_prelab;
					}else{
						unset($this->new_prelab);
					}
					
					$this->chop_pcs = 1;
					$this->url_cut();
				}elseif($this->chpu_par['parent'][$this->new_prelab]==$this->prelab){ if($this->testmode or $_GET['testmode']){echo '<br /><font color="#0000A0"><b>Parent match! Old Prelab = '.$this->prelab.'; New Prelab = '.$this->new_prelab.'</b>, chop_pcs = '.$this->url_uncut.'</font>';}
					$this->ext();
					$this->chop_pcs = $this->url_uncut;
					$this->url_uncut = 1;
					$this->prelab = $this->new_prelab;
					$this->prelab_url = $this->new_prelab_url;
				}else{ if($this->testmode or $_GET['testmode']){echo $impl_url.' Parent MISmatch!<br />';}
					unset($this->new_prelab);
					$this->chop_pcs = 1;
					$this->url_cut();
				}
			}else{	if($this->testmode or $_GET['testmode']){echo '<br /><font color="#A00080">NO Prelab. NEW one = '.$this->new_prelab.'</font>';}
				$this->ext();
				$this->prelab = $this->new_prelab;
				$this->prelab_url = $this->new_prelab_url;
				$this->chop_pcs = $this->url_uncut;
			}
			if($this->extra_left>0){ if($this->testmode or $_GET['testmode']){echo '<br /> Есть куда рубить. extra_left: '.$this->extra_left.' url_unchop: '.$this->url_unchop;}
			//if($this->url_unchop>0){ echo '<br /> Есть куда рубить. extra_left: '.$this->extra_left.' url_unchop: '.$this->url_unchop;
				//$this->url_chop($this->url_uncut);
				$this->url_chop($this->url_uncut);
			}else{	//echo '<br />Некуда рубить ';
				if($this->new_prelab){ if($this->testmode or $_GET['testmode']){echo $impl_url.' + есть new_prelab: '.$this->new_prelab.' + prelab: '.$this->prelab;}
					//$this->lab_final = '';
					//$this->lab_final_url = '';
					//$this->url_cut();
					$this->lab_final = $this->new_prelab;
					$this->lab_final_url = $this->new_prelab_url;
					//return $this->lab_final;
				}else{ if($this->testmode or $_GET['testmode']){echo ' + нет new_prelab';}
					$this->lab_final = '';
					$this->lab_final_url = '';
					//return $this->lab_final;
				}
			}
		}
	}
	
	public function ext(){
		if($this->chpu['level']){ //echo '<br />EXT: prelab: '.$this->prelab.'	new_prelab: '.$this->new_prelab;
			$this->last_ext = $this->new_prelab;
			$this->last_ext_url = $this->new_prelab_url;
		}
	}
	
	public function url_cut(){
		//$arguc = func_get_args();
		$this->url_uncut = count($this->url_input)-$this->cut_qty;//1;
		//echo '<br />'.implode('/', $this->url_input).'; CUT; $this->url_uncut: '.$this->url_uncut;
		if($this->url_uncut>0){	//echo'; отрезано НЕ под корень.';
			//$this->ext_tmp = $this->url_input[$this->url_uncut];
			//echo ' cut '.$this->url_input[$this->url_uncut];
			unset($this->url_input[$this->url_uncut]);
			$this->extra_left++;
			//$this->url_uncut--;
			$this->url_find($this->url_input);
		}else{ //echo'<br />CUT; отрезано под корень.';
			if(!$this->flag_chop){ //echo' + НЕ рубили. Prelab: '.$this->prelab;
				$this->lab_final = '';
				$this->lab_final_url = '';
				//echo' $this->lab_final: '.$this->lab_final;
			}else{
				//echo ' + рубили. '.$this->prelab.'	unchop: '.$this->url_unchop;
				//$this->lab_final = '';
				//$this->lab_final_url = '';
				//echo'<br />CUT; отрезано под корень + рубили.';
				//$this->url_chop();
			}
		}
		
		$this->flag_cut = TRUE;
	}
	
	public function url_chop(){
		$arguh = func_get_args();
		$arnuh = func_num_args();
		if(!$arguh[0]){
			$arguh[0] = 1;
		}
		//set($arguh[0], 1);
		//echo '<br />CHOP<b> ('.$arguh[0].')	'.implode('/', $this->url_input).' >>>>>>> ';
		for($i=0; $i<$arguh[0]; $i++){
			//echo ' > '.$i.' '.$this->url_row[$i].' ';
			unset($this->url_row[$i]); //echo ' '.$i;
		}
		//echo '</b>';
		//unset($this->url_row[0]);
		unset($this->flag_cut);
		unset($this->extra_left);
		$this->url_row = array_values($this->url_row);
		$this->url_unchop = count($this->url_row);
		$this->url_input = $this->url_row;
		$this->url_uncut = count($this->url_input)-1;
		$this->flag_chop++;//ech($this->url_row);
		$this->url_find($this->url_row); 
	}


	public function iniset(){
	$this->fetch('sys_iniset');
		if(is_array($this->tabdata['sys_iniset'])){
			foreach($this->tabdata['sys_iniset'] as $key => $value){
				ini_set($this->tabdata['sys_iniset'][$key]['parameter'], $this->tabdata['sys_iniset'][$key]['value']);
				//echo $this->tabdata['sys_iniset'][$key]['parameter'].'	'.$this->tabdata['sys_iniset'][$key]['value'];
			}
		}
	}
	/*
	public function defaults(){
		$this->mod['index'] = 1;
		$this->fetch('sys_defaults');
		for($i=0; $i<$this->tab['sys_defaults']['qty']; $i++){
			//echo $this->tabdata['sys_defaults'][$i]['varname'].'<br />';
		}
	}
	*/
	
	//Удалить за ненадобностью (или переписать). UPD: нужна в data_post
	
	public function address(){
		$args = func_get_args();
		//echo '<br />url_sample:'.$url_sample;
		$full_url=parse_url($args[0]);
		if($full_url['path']=='/'){
			$furl["full"] = '/';
			$furl[1] = '/';
			$furl["qty"]=2;
			//echo '+++';
		}else{
			$furl["len"]=strlen($full_url['path']);
			if(strpos($full_url['path'],"%20")){
				$despaced=str_replace("%20", "_", $full_url);
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $despaced");
			}
		
			$uri=explode("/", $full_url['path']) ;
			
			$i=1;
			$furl["full"]=str_replace("_", " ", urldecode($uri[1]));
			while ($uri[$i]){
				$furl[$i]=str_replace("_", " ", urldecode($uri[$i]));
				if($i>1){
					$furl["full"].=('/'.$furl[$i]);
				}
			$i++;
			}
		
			$furl["qty"]=$i;
		}

		//$this->mod['index'] = 1;
		$this->mod['filter']='address = "'.$furl["full"].'"';
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		//если буду использовать эту функцию в основном классе после connect(), то НУЖНО ПОМЕНЯТЬ $this->identif
		$furl['identif'] = $furl["full"];
		//identif - уточнить функционал
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		//ech($this->mod);
		$this->fetch('sys_urls');
		//ech($this->tabdata['sys_urls']);
		//echo $this->sys['url']['full'].' OK >> '.$this->tab['sys_urls']['qty'];
		if($this->tab['sys_urls']['qty']==0){
			//$this->mod['index'] = 1;
			$this->mod['filter']='address = "'.$furl[1].'" AND level>1';
			$furl['identif'] = $furl[1];
			$this->fetch('sys_urls');
			//echo 'ELSE '.$this->tab['sys_urls']['qty'];
		}
		$furl['label'] = $this->tabdata["sys_urls"][$furl['identif']]["label"];
		unset($this->mod);
		if(!$args[1]){
			$this->cur_label = $furl['label'];
		}
		//ech($this->cur_label);
		return $furl;

				
	}
    
	

	  public $source, $amz, $branchlvl, $tablevel, $tabbranch, $tabstruct, $tabtest, $keymark;
	  private $br_arr, $parent_field, $parent_key, $fetch_begin, $fetch_end;
	  
	  public function fetch(){
		  $args = func_get_args();
		  $tabsep = strpos($args[0], separator1);
		  if($tabsep){
			  
			  $tabmas = explode(separator1, $args[0]);
			  $args[0] = $tabmas[1];
			  $this->db->db = $tabmas[0];
			  //ech($tabmas);
		  }
		  
		  $this->table=$args[0];
		  //echo '<br />++: '.$this->table;
		  if(!$this->request){

			  if(!$this->mod["fields"]){
				  $mod_f='*';
			  }else{
				  $mod_f = $this->mod["fields"];
			  }
			  			  
			  if(!$this->mod['join']){
				  $mod_0='';
			  }else{
				  $this->mod['join'] = explode(' ', $this->mod['join']);
				  $mod_0=' join '.$this->mod['join'][0].' ON '.$this->table.'.'.$this->mod['join'][1].' = '.$this->mod['join'][0].'.'.$this->mod['join'][2];
			  }
			  
		  
			  if(!$this->mod["filter"]){
				  $mod_1='';
			  }else{
				  $mod_1=" where ".$this->mod["filter"];
			  }
			  
			  if(!$this->mod["order"]){
				  $mod_2='';
			  }else{
				  $mod_2=" order by ".$this->mod["order"];
			  }
			  
			  if(!$this->mod["group"]){
				  $mod_3='';
			  }else{
				  $mod_3=" group by ".$this->mod["group"];
			  }
			  
			  if(!$this->mod["limit"]){
				  $mod_4='';
			  }else{
				  $mod_4=" limit ".$this->mod["limit"];
			  }
			  
			  
			  $req='select '.$mod_f.' from '.$this->table.$mod_0.$mod_1.$mod_2.$mod_3.$mod_4;
			  
			  //echo '<br />'.$req;
		  }else{
			  
			  $req = $this->request;
			  //echo '<br />request: '.$req;
			  //echo $req;
		  }

		  
		  if($this->source[$this->table]=='amazon'){
			  $this->amz = new AmSDB();
			  $this->amz->mod=$this->mod;
			  $result['data'] = $this->amz->go_req($req);
			  $this->tab[$this->table]['qty']=count($result['data']);
			  $this->tab[$this->table]['keyfield']=$this->amz->tab;
			  //echo '<pre>';
			  //echo $req;
			  //print_r($result);
			  //echo '</pre>';
			  //unset($this->source);
			  
		  }elseif($this->source[$this->table]=='sqlite'){
			  
		  }else{
			  //unset($this->mod);
			  //echo "<br />".$req;
			  
			  $quer=$this->db->query($req);
			  
			  unset($this->request);
			  
			  if($quer){
				  $num=$this->db->count_rows($quer);
				  //echo "<br />proc.NUM: ".$num;
			  }else{
				  $num=0;
			  }
			  
			  $this->tab[$this->table]["qty"]=$num;
			  //echo "<br />proc.TABLE: ".$this->table;
			  //echo "<br />proc.qty: ". $this->tab[$this->table]["qty"];
			  //echo '<br />randge: '.$this->mod['range'].'<br />';
			  // 
			  if($this->mod['range']){
				  
				  
				  //echo urldecode($this->by_label($this->label)).'<br />';
				  //echo urldecode($adr).'<br />';
				  $temp_rng = array(
				  'paginclass'=>'pagination pagination-sm',
				  'begin' => 0, 
				  'end' => 15,
				  'perpage'=>$this->tab[$this->table]["end"]-$this->tab[$this->table]["begin"],
				  'first' => 0,
				  'firstlabel' => '<<<',
				  'prevlabel' => '<',
				  'last' => $this->tab[$this->table]["qty"],
				  'lastlabel' => '>>>',
				  'nextlabel' => '>',
				  //'discurrent' => TRUE,
				  'step'=>1,
				  'order'=>'asc', //по возрастанию/убыванию
				  'prefix'=>'page_',
				  'buildlimit'=>0
				  );
				  $temp_rng['prefix'] = str_replace('_', ' ', $temp_rng['prefix']);
				  $pref_chk = preg_match('/^'.$temp_rng['prefix'].'/', $this->sys['url']['last']);
				  //echo $this->sys['url']['last'].'->pref_check: '.$pref_chk;
				  //ech($this->sys['url']);
				  //ech($this->label);
				  if($pref_chk){
					  $exp_path = explode('/', $this->sys['url']['uri']);
					  array_pop($exp_path);
					  $adr = implode('/', $exp_path);
					  //echo '++++++'.$adr;
					  unset($exp_path);
					  //ech($exp_path);
					  //ech($this->sys['url']['list'][$this->sys['url']['qty']-2]);
					  //$adr =  $this->make_url($this->sys['url']['list'][$this->sys['url']['qty']-2]);
				  }else{
					  $adr =  $this->sys['url']['uri'];
				  }
				  /*
				  if($this->sys['url']['qty']>1){
					$adr =  $this->make_url($this->sys['url']['list'][$this->sys['url']['qty']-1]);
				  }else{
					$adr =  $this->make_url($this->sys['url']['list'][0]);
				  }
				  */
				  
				  $temp_rng['address']=$adr;
				  //$this->mod['rng']['perpage'] = $this->mod['rng']['end'] - $this->mod['rng']['begin'];
				  //$this->mod['rng']['pages'] = ceil($this->mod['rng']['last']/$this->mod['rng']['perpage']);
				  if($this->mod['rng']){
					  if(is_array($temp_rng)){
						  foreach($temp_rng as $key=>$val){
							  if(!$this->mod['rng'][$key]){
								  $this->mod['rng'][$key] = $val;
							  }
						  }
					  }else{
						  die('Range parameters should be an array');
					  }
				  }else{
						  $this->mod['rng'] = $temp_rng;
				  }	
				  

				  unset($temp_rng);		
			  }
			  //echo '<br />'.$this->table.' num: '.$num;
					  if($num>0){
						  
						  if(!$this->db->keyfield[$args[0]] and !$this->mod['index']){ //echo '<br /><font color="#008800">'.$args[0].' <b>NO kf + No index</b></font>';
							  $this->db->load_key($args[0]);
							  $this->tab[$args[0]]['keyfield'] = $this->db->keyfield[$args[0]];
						  }
						  if(!$this->db->keyfield[$args[0]]){ //echo '<br />'.$num.' <font color="#0000FF">'.$args[0].' <b>NO kf</b></font>';
							  //echo 'proc->fetch?';
							  $this->db->load_field($args[0]);
							  if($this->db->primary[$args[0]]){ //echo ' + <font color="#FF0000">'.$args[0].' Primary <b>'.$this->db->primary[$args[0]].'</b></font>';
									$this->tab[$args[0]]['primary'] = $this->db->primary[$args[0]];
									$this->keymark = $this->db->primary[$args[0]];
							  }else{ //echo ' + <font color="#FF0000">'.$args[0].'<b>NO Primary</b></font>';
									$this->keymark = $this->db->fields[$args[0]]['list'][0][label_field];
							  }
						  }else{ //echo '<br />'.$num.' <font color="#0000FF">'.$args[0].' <b>kf</b> presents: '.$this->db->keyfield[$args[0]].'</font>';
								//echo $this->db->keyfield[$args[0]].' ';
								$this->keymark = $this->db->keyfield[$args[0]];
						  }
						  //echo '<br />table: '.$this->table.', keyfield: '.$this->db->keyfield[$this->table].', index: '.$this->mod['index'];
					  // RANGE - для загрузки части таблицы, например, 5:12
					  if($this->mod["range"]){
						 //echo $args[0];
						 //ech($this->tab[$args[0]]);
						 $go_go=explode(':', $this->mod["range"]);
						  $go_0=$go_go[0];
						  $tab_qty = $this->tab[$args[0]]['qty']-1;
						  if($go_go[1]>=$tab_qty){
							$go_1=$tab_qty;
							//echo  '+++++++++'.$go_0.'->'.$go_1.'->'.$tab_qty.'<br />';  
						  }else{
							$go_1=$go_go[1];
							//echo  '--------'.$go_0.'->'.$go_1.'->'.$tab_qty.'<br />';
						  }
						 //echo $this->mod["range"];
						 //ech($this->tab[$args[0]]);
						  
						  $this->mod['rng']['begin'] = 	$go_go[0];
						  $this->mod['rng']['end'] = 	$go_go[1];
						  $this->db->data_seek($quer, $go_0);
						  //$this->tabdata[$args[0]]['asdfg'] = $this->pagination();
						  $pagination = $this->pagination($this->mod['rng']);
						  //$this->tabdata['sys_content']['pagination']['content'] = $pagination['list'];
						  //$this->tabdata['pagination'] = $this->pagination();
						  //echo $pagin;
					  }elseif(is_array($this->mod['rng'])){
						  $go_0 = $this->mod['rng']['begin'];
						  $go_1 = $this->mod['rng']['end'];
						  //$pagin = $this->pagination();
					  }else{
						  $go_0=0;
						  $go_1=$num-1;
							
					  }
					  //echo $args[0].'	'.$num.'	'.$key.' go: '.$go_0.'=>'.$go_1.'<br />';
					  $this->db->fetch_begin = $go_0;
					  $this->db->fetch_end = $go_1;
					  $this->db->mod = $this->mod;
					  $this->db->keymark = $this->keymark;
					  /*
					  if($this->mod["index"]==""){
						  for ($i=$go_0; $i<=$go_1; $i++){
							  //$current=mysql_fetch_array($quer, MYSQL_ASSOC);	
							  $current=$this->db->fetch_row($quer);	
							  $curkey=$current[$this->keymark];
							  //echo 'Curkey: '.$curkey.' Keymark: '.$this->keymark.' KF:'.$this->db->keyfield[$this->table].'<br />';
							  $result[$curkey]=$current;
							  //$result[$this->db->keyfield[$this->table]]=$current;
							  //$result[$curkey]["num"]=$i;
							  $resu[$i]=$curkey;
						  }
					  }else{
						  for ($i=$go_0; $i<=$go_1; $i++){
							  //$result[$i]=mysql_fetch_array($quer, MYSQL_ASSOC);
							  $result[$i]=$this->db->fetch_row($quer);
							  //$result[$i]["num"]=$i;
							  $resu[$i]=$i;	
						  }
					  }
					  */
					  $result = $this->db->data_load($quer);
				  
				  } //NOT end_else $this->source=='amazon'
		  
		  // here was code ['parent']
		  
		  
		  //mysql_free_result($quer);
		  
		  
		  
		  }//end_else $this->source=='amazon'
		  
		  // here code ['parent'] removed
		  if($this->mod['parent']){
			  if(strpos($this->mod['parent'], '->')){
				$pars = explode('->', $this->mod['parent']);
				$this->parent_field = $pars[0];
				$this->parent_key = $pars[1];
			  }else{
				$this->parent_field = $this->mod['parent'];
				$this->parent_key = $this->keymark;  
			  }
			if(is_array($result['data'])){
				foreach($result['data'] as $key1=>$val1){
					if(!$result['data'][$key1][$this->parent_field]){
						$result['data'][$key1][$this->parent_field] = 0;
					}
					//echo '<br />key: '.$key1.' value: '.($result[$key1][$this->mod['parent']]);
					$this->br_arr[$this->table][$result['data'][$key1][$this->parent_field]][] = $val1;
					//$this->tablevel[$this->table][$key1] = $this->tablevel[$this->table][$result[$key1][$this->mod['parent']]]+1;
				}
			}
			
			$this->tabbranch[$this->table] = $this->branch($this->br_arr[$this->table]);
			//$this->tabtest[$args[0]] = $arr_res;
		  }
		  
		  
		  $this->tabdata[$this->table]=$result['data'];
		  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		  if(!$this->tab){
			  $this->tab[$this->table]["keyfield"]=$result['param'];
		  }		  
		  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		  /*
		  if($this->table=='sys_urls'){
			  $this->label=$this->tabdata["sys_urls"][$this->identif]["label"];
			  //$this->sys['label'] = $this->label;
		  }
		  */
  
		  $this->db->db = 0;
		  unset($this->mod);
		  return $this->tabdata[$this->table];
		  //unset($this->db->keyfield[$this->table]);
		  
		//!!!!!!!!!!!!!!!		
	  } //END of fetch();
	  	//!!!!!!!!!!!!!!!
		
		public function branch($brar){
			//$this->branchlvl++;
			$br_coun = count($brar[0]);
			$br_data = $brar[0];
			$br_full = $this->br_arr[$this->table];
			if(is_array($br_data)){
				foreach($br_data as $i=>$vali){
					$br_res[$br_data[$i][$this->parent_key]] = $br_data[$i][$this->parent_key];
					if($br_data[$i][$this->parent_field]){
						$this->tablevel[$this->table][$br_data[$i][$this->parent_key]] = $this->tablevel[$this->table][$br_data[$i][$this->parent_field]]+1;
					}else{
						$this->tablevel[$this->table][$br_data[$i][$this->parent_key]] = 0;
					}
					if($br_full[$br_res[$br_data[$i][$this->parent_key]]]){
							$br_next[0] = $br_full[$br_res[$br_data[$i][$this->parent_key]]];
							$br_res[$br_data[$i][$this->parent_key]] = $this->branch($br_next);
					}
				}
			}
			return $br_res;
		}
		
		
		public $paginator;
		public function pagination(){
			$args = func_get_args();
			$pagdata = $args[0];
			//ech($pagdata);
			if(!$pagdata['step']){
					$pagdata['step'] = 1;
			}
			if(!$pagdata['perpage']){
			  $pagdata['perpage'] = abs($this->mod['rng']['perpage'] = $pagdata['end'] - $pagdata['begin']+1);
			}
			if($pagdata['lastpage']<$pagdata['firstpage']){
				$pagdata['step'] = abs($pagdata['step'])*(-1);
			}
			
			$pagdata['sign'] = abs($pagdata['step'])/$pagdata['step'];
			$pagdata['firstpage'] = $this->mod['rng']['firstpage'] = floor($pagdata['first']/$pagdata['perpage'])+$pagdata['step'];
			$pagdata['lastpage'] = $this->mod['rng']['lastpage'] = ceil(($pagdata['last'])/$pagdata['perpage'])-1+$pagdata['step'];
			$pagdata['pages'] = $this->mod['rng']['pages'] = ceil($pagdata['last']/$pagdata['perpage'])-1+$pagdata['step'];
			$pagdata['curpage'] = $this->mod['rng']['curpage'] = floor($pagdata['begin']/$pagdata['perpage'])+$pagdata['step'];
			$pagdata['nextpage'] = $this->mod['rng']['nextpage'] = $pagdata['curpage'] >= ($pagdata['lastpage']*$pagdata['sign']) ? $pagdata['curpage'] : $pagdata['curpage']+$pagdata['step'];
			$pagdata['prevpage'] = $this->mod['rng']['prevpage'] = $pagdata['curpage'] <= ($pagdata['firstpage']*$pagdata['sign']) ? $pagdata['curpage'] : $pagdata['curpage']-$pagdata['step'];
			$pagdata['size'] =  $this->mod['rng']['size'] = (abs($pagdata['lastpage']-$pagdata['firstpage'])+1)/abs($pagdata['step']);
			$pagdata['leastpage'] = $this->mod['rng']['leastpage'] = $pagdata['firstpage']<$pagdata['lastpage'] ? $pagdata['firstpage'] : $pagdata['lastpage'];
			$active = array_fill($pagdata['leastpage'], $pagdata['size'], FALSE); 
			$active[$pagdata['curpage']] = TRUE;
			//ech($pagdata);
			//$distag[$this->mod['rng']['curpage']] = ' disabled';
			//ech($this->mod['rng']);
			$tagclass = ' class="'.$pagdata['tagclass'].'"';
			
			if($pagdata['paginclass']){
			$paginclass = ' class="'.$pagdata['paginclass'].'"';
			}else{
			$paginclass = '';
			}

			$cur_page = $this->make_url($pagdata['prefix']);
			//ech($cur_page);
			//echo '>>>>>>>>>>>>>>>>>>> '.$pagdata['curpage'];
			if($pagdata['firstlabel']){
				$paginator['list'][] = array('page_number' => $pagdata['firstpage'], 'url' => $pagdata['address'].'/'.$cur_page.$pagdata['firstpage'], 'label'=>$pagdata['firstlabel'], 'active'=>$active[$pagdata['firstpage']]);
			}
			if($pagdata['prevlabel']){
				$paginator['list'][] = array('page_number' => $pagdata['prevpage'], 'url' => $pagdata['address'].'/'.$cur_page.$pagdata['prevpage'], 'label'=>$pagdata['prevlabel'], 'active'=>$active[$pagdata['prevpage']]);
			}
			//ech($paginator);
			for($ipag=$pagdata['firstpage']; $ipag<=$pagdata['lastpage']; $ipag+=$pagdata['step']){
			  $cur_ipag = $ipag+$pagdata['step'];
			  $paginator['list'][] = array('page_number' => $ipag, 'url' => $pagdata['address'].'/'.$cur_page.$ipag, 'label'=>$ipag, 'active'=>$active[$ipag]);
			  $paginator['curpage'] = $pagdata['curpage'];

			}
			//get_class($this),"fill"
			if($pagdata['nextlabel']){
				$paginator['list'][] = array('page_number' => $pagdata['nextpage'], 'url' => $pagdata['address'].'/'.$cur_page.$pagdata['nextpage'], 'label'=>$pagdata['nextlabel'], 'active'=>$active[$pagdata['nextpage']]);
			}
			if($pagdata['lastlabel']){
				$paginator['list'][] = array('page_number' => $pagdata['lastpage'], 'url' => $pagdata['address'].'/'.$cur_page.$pagdata['lastpage'], 'label'=>$pagdata['lastlabel'], 'active'=>$active[$pagdata['lastpage']]);
			}

			$this->paginator = $paginator;
			  //$this->paginator[$this->table] = $paginator;
			return $paginator;
		//  !!!!!!!!!!!!!!!!
		}// END OF PAGINATION
	  //  !!!!!!!!!!!!!!!!
	  
	  

	  //public $page_prefix;
	  public function pageread(){ //args: 1) prefix ("page_"); 2) qty per page 3) Start from 1
		  $page = $this->sys['url']['last'];
		  //echo $page.'<br />+++ ';
		  $arg = func_get_args();
		  //ech($arg);

		  $page = str_replace($arg[0], '', $page); 
		  echo $page;
		  if((int)$page>0){
		  	$page1=($page-$arg[2])*$arg[1];
		  }else{
			 $page1=1; 
		  }
		  if($this->sys['url']['qty']==1){
			  $page1=0+$arg[2];
		  }
		  $page2 = $page1+$arg[1]-1;
		  $range1 = $page1.':'.$page2;
		  //$this->mod['range']=$range1;
		  //echo $range1;
		  return $range1;
	  }
	  
	  //фцнкция переделки массива
	  /*
	  public $arr_in, $arr_lab, $arr_out;
	  
	  public function rearray(){
		  foreach($this->arr_in as $key => $value){
			  $this->arr_out[$key]=$this->arr_in[$key][$this->arr_lab];
		  }
	  }
	  */
	  
	  public function ar2tab($arra){
	  	foreach($arra as $key1=>$val1){
			foreach($arra[$key1] as $key2=>$val2){
				$arra[$key1][$key2] = '<td>'.$val2.'</td>';
				//echo $key1.'	'.$key2.'	'.$val1.'<br />';
			}
			$arra[$key1] = implode('', $arra[$key1]);
			$arra[$key1] = '<tr>'.$arra[$key1].'</tr>';
		}
		$arra = implode('', $arra);
		$arra = '<table border="1">'.$arra.'</table>';
		return $arra;
	  }
	  
	  public function by_label($lab){
		  $this->mod['index'] = 1;
		  $this->mod['filter'] = 'label = "'.$lab.'"';
		  //echo $this->mod['filter'];
		  $this->fetch('sys_urls');
		  //$this->tabdata['sys_urls'][0]['url'] = $this->make_url($this->tabdata['sys_urls'][0]['address']);
		  $this->tabdata['sys_urls'][0]['url'] = $this->chpu_par['address'][$lab];
		  return $this->tabdata['sys_urls'][0];
	  }
	  
	  public function make_url($addr){
		  $url = urlencode(str_replace(" ", "_", $addr));
		  $url = str_replace("%2F", "/", $url);//.$this->slash;1
		  /*
		  if(substr($url, strlen($url)-1) == '/'){
			  $url = substr($url, 0, strlen($url)-1);
		  }
		  $url.=$this->slash;
		  */
		  return($url);
	  }

	  public function do_url($label){
		  $this->mod['index'] = 1;
		  $this->mod['limit'] = 1;
		  $this->mod['filter'] = 'label = "'.$label.'"';
		  //echo 'do_url';
		  $this->fetch('sys_urls');
		  unset($this->mod);
		  $url = make_url($this->tabdata['sys_urls'][0]['address']);
		  $url2="/".$url;
		  return($url2);
	  }
	  
	  private $expl, $expl_res;
	  public function poster04($matches){
			/*
			if($this->lab==1){
				//echo '	'.$matches[1].'	=>	'.$this->replace[$matches[1]].'<br />+<br />';
				echo '	'.$matches[1].'	=>	'.$this->chpu_par['address'][$matches[1]].'	=>	'.str_replace('%2F', '/', urlencode($this->chpu_par['address'][$matches[1]])).'<br />+<br />';
				
			}
			*/
		  $exp = explode('/',$matches[1]);
		  //ech($exp);
		  //$res[0] = '/';
		if($this->lab==1){
				  //ech($this->chpu_par);
		}
		
		//$address_array = array_merge(
		  foreach($exp as $key => $val){
			  if($this->lab==1){
				  //echo 'chpu_par: '.$this->chpu_par['address'][$val].' > ';
			  }
			  
			  if($this->chpu_tab['indep'][$val]){ //echo '<br />indep';
					$res[] = '/'.str_replace('%2F', '/', urlencode(str_replace(' ', '_', $this->chpu_tab['indep'][$val]['address'])));
			  }elseif($this->chpu_par['address'][$val]){
					$res[] = $this->chpu_par['address'][$val];
			  }else{
					$res[] = '/'.str_replace('%2F', '/', urlencode(str_replace(' ', '_', $val)));
			  }
			  /*
			  if($this->chpu_par['address'][$val]){
				  //ech($this->chpu_par['indep']);
				  if($this->chpu_tab['indep'][$val]){ //echo '<br />indep';
					 $res[] = '/'.str_replace('%2F', '/', urlencode(str_replace(' ', '_', $this->chpu_tab['indep'][$val]['address'])));
				  }else{
					 $res[] = $this->chpu_par['address'][$val];
					 //echo $this->chpu_par['address'][$val].'<br />';
					 //$res[] = '/'.urlencode(str_replace(' ', '_', $this->chpu_par['address'][$val]));
				  }
			  }else{
				  $res[] = '/'.str_replace('%2F', '/', urlencode(str_replace(' ', '_', $val)));
				  //echo $val.'<br />';
			  }
			  */
			  
			  if($this->lab==1){
				  echo 'key: '.$key.' val: '.$val.' +<br />';
			  }
		  }
		  if($this->lab==1){
			  //ech($res);
		  }
		  $ress = implode('', $res);
		  return $ress;
		  //return($url2);
		  
	  }
	  
	  public function fill_url($object01){
		  setlocale(LC_ALL, "ru_RU.UTF-8");
		  //$res01=preg_replace_callback("/\[\{([а-яА-Яa-zA-Z0-9_\-\s\/]+)\}\]/u", array(get_class($this),'poster04'), $object01);
  		  $res01=preg_replace_callback("/\[\{([а-яА-Яa-zA-Z0-9_\-\s\/]+)\}\]/u", array(get_class($this),'poster04'), $object01); //модификатор /u убивает картинку
		  //$res01=preg_replace_callback('/\[\{([\w_\-\s\/]+)\}\]/u', array(get_class($this),'poster04'), $object01);
		  return $res01;
		  //return $object01;
	  }

	  public function redirect(){
		  $args = func_get_args();
		  if($args[1]=='label'){
			$url = $this->do_url($args[0]);
		  }else{
			$url = $args[0];
		  }
		  if($url){
			  header('Location: '.$url);
		  }
	  }
	  
	  public function go_req(){
		  $numbers = func_get_args();
		  $n = func_num_args();
		  if($n>0){
			  $this->req=$numbers[0];
		  }else{
			  $this->req=$this->request;
			  unset($this->request);
		  }
		  //$quer=mysql_query($this->req, $this->db->link);
		  $quer=$this->db->query($this->req);
		  return $quer;			
	  }
	  
	  
	  public function go_test(){
		  if($this->mod["index"]==""){
			  //echo "123456789";
		  }else{
			  //echo print_r($this->mod);
		  }
		  
	  }
	  

	public $dataget, $safe_data, $safe_key, $safe_mas;

	public function security($input){
		//print_r($this->mod);
		//ech($input);
		if(is_array($input)){
			foreach($input as $key => $val){
				
				if(is_array($val)){
					$input[$key] = $this->security($val);
					
				}elseif(!$this->mod['keeptags'][$key] and !is_object($input[$key])){
					//echo '<br />deleted:'.
					$input[$key] = strip_tags($input[$key], $this->sys['config']['allowtags']['val']);
					//echo "\r\n key: ".$key.', value: '.$val;
				}
					
			}
		}else{
			if(!is_object($input)){
				$input = strip_tags($input, $this->sys['config']['allowtags']['val']);	
				//echo '<br />secur key: '.$this->safe_key.' data: '.$input;
			}
		}
		//ech($input);
		return $input;
	}

	public function normal_code($code){
		$code=str_replace("[","<",$code);
		$code=str_replace("]",">",$code);	
		return $code;
	}
	
	public function put_SDB($arr, $table){ //Заносит массив arr в Amazon SDB (в домен table)
		if(!$this->amz){
			$this->amz = new AmSDB();
		}
		
		$res = $this->amz->source->batch_put_attributes($table, $arr, true);
		return $res;
	}
	
	public function kill_SDB($table){ //Заносит массив arr в Amazon SDB (в домен table)
		if(!$this->amz){
			$this->amz = new AmSDB();
		}
		$res = $this->amz->erase($table);
		return $res;
	}
	
	public function del_SDB($table, $ind){ //Удаляет из Amazon SDB (домен table) по индексу ind
		if(!$this->amz){
			$this->amz = new AmSDB();
		}
		$res = $this->amz->delete($table, $ind);
		return $res;
	}
	
	public function put_row($row, $table){
	/*
		$this->db->load_field($table);
		$fieldlist = $this->db->fields[$table]['list'];
		$fields = array_colum($fieldlist, "field");
		$types = array_colum($fieldlist, "type");
		$type_comb =  array_combine($fields, $types);
	*/
		$separ = array('real'=>'', 'int'=>'', 'tinyint'=>'', 'mediumint'=>'', 'string'=>'"', 'text'=>'"', 'varchar'=>'"', 'blob'=>'"', 'date'=>'"', 'timestamp'=>'"');
		$empty = array('real'=>0, 'int'=>0, 'tinyint'=>0, 'mediumint'=>0, 'string'=>'', 'text'=>'' , 'varchar'=>'', 'blob'=>'', 'date'=>'', 'timestamp'=>'');
		//ech($this->field_types[$table]);
		//ech($row);
		if(is_array($row)){
			foreach($row as $key=>$val){
				if($this->field_types[$table][$key]){
					$sep =  $separ[$this->field_types[$table][$key]];
					//$field[] = $key;
					if(!$val){
						$val = $empty[$this->field_types[$table][$key]];
						//echo '<br />'.$key.' >> '.$val.' -> '.$this->field_types[$table][$key];
					}
					$value[] = $sep.$val.$sep;
					$update[] = $key.' = '.$sep.$val.$sep;
				}
			}
		}else{
			$error_flag = 'Ебать ты лох!';
		}
		//ech($update);

		//$fieldrow = implode(', ', $field);
		$valuerow = implode(', ', $value);
		$setrow = implode(', ', $update);
		
		//echo '<br />fieldrow: '.$fieldrow.'<br />valuerow: '.$valuerow.'<br />valuerow: '.$setrow.'<br />';
		
		if($this->mod['update'] ){
			$this->request='UPDATE '.$table.' SET '.$setrow.' WHERE '.$this->mod['update'].';';
			//ech(htmlspecialchars($this->request));
			$quer=$this->db->query($this->request);
			if($this->mod['updadd']){
				$rows = $this->db->affected_rows();
				//echo 'ROWs'.$rows;
				if($rows<1){
					$this->request='INSERT INTO '.$table.' ('.$this->fieldrow.') VALUES ('.$valuerow.');';
					$quer=$this->db->query($this->request);
				}
			}
		}else{
			$this->request='INSERT INTO '.$table.' ('.$this->fieldrow.') VALUES ('.$valuerow.');';
			$quer=$this->db->query($this->request);
			//echo '<br />'.$this->request;
		}
		//echo '<br />'.$this->request;
		
		unset($this->mod['update']);
		unset($this->mod['updadd']);
		unset($this->request);
		return($quer);
	}
	
	public function fields_row($mas, $table){
		if(is_array($mas)){
			foreach($mas as $key=>$val){
				if($this->field_types[$table][$key]){
					$field[] = $key;
				}else{
					$warning_flag[] = 'Нету поля '.$key.';';
				}
			}
		}else{
			$error_flag[] = 'Ебать ты лох!';
		}
		
		$fieldrow = implode(', ', $field);
		return $fieldrow;
	}
	
	public $field_types, $fieldrow, $separ;
	public function put_array($arr, $table){ //Заносит массив arr в БД (в таблицу table)
	//ech($arr);
	//echo $table;
	//echo 'source: '.$this->source[$this->table];
	
	$this->db->load_field($table);
	$fieldlist = $this->db->fields[$table]['list'];
	//ech($this->db->fields);
	$fields = array_colum($fieldlist, label_field);
	$types = array_colum($fieldlist, label_type);
	$this->field_types[$table] =  array_combine($fields, $types);
	//ech($this->field_types[$table]);
		
	switch($this->source[$table]){
		case 'amazon';
		$darr[$arr['itemName()']] = $arr;
		//ech($darr);
		$this->put_SDB($darr, $table);
		break;
		
		case '';
		if(is_array(current($arr))){
			//echo 'array';
			$this->fieldrow = $this->fields_row(current($arr), $table);
			foreach($arr as $key=>$val){
				$res[$key] = $this->put_row($val, $table);
			}
		}
		else{
			//echo 'NOT array';
			$this->fieldrow = $this->fields_row($arr, $table);
			$res[0] = $this->put_row($arr, $table);
		}
		return($res);

		break;
	}
	}
	
	public function del_array($arr, $table){ //Заносит (удаляет?) массив arr в БД (в таблицу table)
	//ech($arr);
	//echo '<br />*'.$this->source[$table].'*<br />';
		switch($this->source[$table]){
		case 'amazon':
		//echo 'amazon++<br />';
			/*
			foreach($arr as $key => $value){
				$this->del_SDB($table, $value);
			}
			*/
			$this->del_SDB($table, $arr['itemName()']);
		break;
		case '':
		//echo 'empty++<br />';
			$this->db->load_field($table);
			$i=0; $j=0;
			while($this->db->fields[$table]['list'][$i][label_field]){
				if($arr[$this->db->fields[$table]['list'][$i][label_field]]){
					if($j==0){
						$row1.= $this->db->fields[$table]['list'][$i][label_field].' = "'.$arr[$this->db->fields[$table]['list'][$i][label_field]].'"';
					}else{
						$row1.= ' and '.$this->db->fields[$table]['list'][$i][label_field].' = "'.$arr[$this->db->fields[$table]['list'][$i][label_field]].'"';
					}
					
					$j++;
				}
				$i++;
			}
			// АЛЯРМ!!! Если нет пост переменных, параметр WHERE будет пуст и удалится всё!
			//подумать как подстраховаться.
			$this->request='DELETE FROM '.$table.' WHERE '.$row1.';';
			$quer=$this->db->query($this->request);
			//echo '<br />'.$this->request.'<br />';
			unset($this->request);
		break;
		}
		return $quer;
	}
	
	public function go_query($query){ //выполняет запрос
		//$quer=mysql_query($query, $this->db->link);
		$quer=$this->db->query($query);
		return $quer;
	}
	
	public function struct(){
		$args = func_get_args();
		$tabname = $args[0];
		$struct = $args[1];
		$parse = preg_match_all("/(>|\|)([a-zA-Zа-яА-я0-9_\-]*)/", $struct, $par_res);
		
	}
	/*
	public function deeper(){ // рекурсивная функция для получения ссылки на элемент объекта или массива
		$args = func_get_args();
		if($args[1]){
		
		}
	}
	*/
	/*
	public function put_temp(){
		$argpt = func_get_args();
		$this->fetch($argpt[0]);
		$data = $this->tabdata[$argpt[0]];
		$this->mod['index']=1;
		$this->mod['limit']=1;
		if($argpt[2]){
			$this->mod['filter']='label="'.$argpt[1].'" and temptype="'.$argpt[2].'"';
		}else{
			$this->mod['filter']='label="'.$argpt[1].'"';
		}
		$this->fetch('sys_temps');
		$temp = $this->tabdata['sys_temps'][0]['temp'];
		unset($argpt);
		ech($temp);
	}
	
	public function repl_temp(){
		$argrt = func_get_args();
		if(is_array($argrt[1])){
			if(is_array(current($argrt[1]))){
				foreach($argrt[1] as $key=>$val){
					//$res[$key] = preg_match_all(
				}
			}
		}
		unset($argrt);
	}
	
*/


}

?>