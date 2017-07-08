<?
class form extends curl{
    private $action, $tab_check, $tab_key, $stage;
	public $proc, $num, $quer, $mod, $formname, $post, $message, $msg_tpl, $msg_separ, $ok_form, $forms, $form_exc, $form_maxle,
	$url_sample, $cur_label, $check_form, $form_filter, $array_data, $req_uri, $vall, $test, $formvars, $keeptagsfield;
    public function __construct($proc){
			$this->proc = $proc;
			$this->proc->mod['filter'] = 'val = "'.$this->proc->label.'" or val = "" or val IS NULL';
			$this->proc->fetch('sys_forms');
			/*
			$this->proc->arr_in = $this->proc->tabdata['sys_forms'];
			$this->proc->arr_lab = 'forms';
			$this->proc->rearray();
			*/
			$arr_col = array_colum($this->proc->tabdata['sys_forms'], 'forms');
			$this->forms = $arr_col;
			//перенесено из index.php
			$this->formdata['FILES'] = $_FILES;
			$this->formdata['FILE'] = current($_FILES);
			$this->formdata['POST'] = $this->proc->db->escape_string($_POST); //ech($this->formdata);
			//$this->formdata['POST'] = $_POST;
			$this->formdata['GET'] = $this->proc->db->escape_string($_GET);
			//$this->formdata['GET'] = $_GET;
			//$this->formdata['SESSION'] = $_SESSION['formdata'];
			$this->formdata['SESSION'] = $_SESSION;

			if(gettype($this->formdata['FILE']['size'])=='integer' and $this->formdata['FILE']['size']>0){
				$size = getimagesize($this->formdata['FILE']['tmp_name']);
				$this->formdata['FILE']['width'] = $size[0];
				$this->formdata['FILE']['height'] = $size[1];
				$this->formdata['FILE']['type'] = $size[2];
				$this->formdata['FILE']['bits'] = $size['bits'];
				$this->formdata['FILE']['channels'] = $size['channels'];
				$this->formdata['FILE']['mime'] = $size['mime'];
			}
		}
	public function login(){
		if(!$_SESSION["logged"]){
			$_SESSION["logged"]=FALSE;
		}
		$this->req["login"]='select login, password from users where login="'.$_SESSION["login"].'" AND password= "'.$_SESSION["password"].'";';
		$this->quer["login"]=$this->proc->db->query($this->req["login"]);
		$this->num["login"]=$this->proc->db->count_rows($this->quer["login"]);
		if($this->num["login"]>0){
			$_SESSION["logged"]=TRUE;
			/*
			*/
		}else{
			$_SESSION["logged"]=FALSE;
		}
	}
	private $param001;
	public $formdata, $curlj;
	public function data_check(){ 
	//echo '<br />BEGIN of data_check $ci: '.$ci;
		if($this->stage){
			$extra_filter = ' AND stage = "'.$this->stage.'"';
		}else{
			$extra_filter = ' AND (stage = "" OR stage = 0 OR stage IS NULL)';
		}
		$this->ok_form = TRUE;
		$this->msg_separ = '<br />';
		unset($this->message);
		$this->proc->mod['filter'] = '(label = "'.$this->proc->cur_label.'" OR label = "" OR label IS NULL) AND formname="'.$this->check_form['nam'].'"'.$extra_filter;
		$this->proc->mod['index'] = 1;
		$this->proc->fetch('sys_datacheck');
		unset($this->proc->mod);
		if($this->check_form){ 
			for($ci=0; $ci<$this->proc->tab['sys_datacheck']['qty']; $ci++){
				$ch_row_id = $this->proc->tabdata['sys_datacheck'][$ci]['row_id'];
				$ch_formname = $this->proc->tabdata['sys_datacheck'][$ci]['formname'];
				$ch_stage = $this->proc->tabdata['sys_datacheck'][$ci]['stage'];
				$ch_label = $this->proc->tabdata['sys_datacheck'][$ci]['label'];
				$ch_type1 = $this->proc->tabdata['sys_datacheck'][$ci]['type1'];
				$ch_var = $this->proc->tabdata['sys_datacheck'][$ci]['var'];
				$ch_kind = $this->proc->tabdata['sys_datacheck'][$ci]['kind'];
				$ch_type2 = $this->proc->tabdata['sys_datacheck'][$ci]['type2'];
				$ch_param = $this->proc->tabdata['sys_datacheck'][$ci]['param'];
				$ch_typecheck = $this->proc->tabdata['sys_datacheck'][$ci]['typecheck'];
				$ch_tab = $this->proc->tabdata['sys_datacheck'][$ci]['tab'];
				$ch_errmsg = $this->proc->tabdata['sys_datacheck'][$ci]['errmsg'];
				$ch_tplmsg = $this->proc->tabdata['sys_datacheck'][$ci]['tplmsg'];
				if($this->formdata['POST'][$ch_formname] OR $this->formdata['GET'][$ch_formname]){
				$ch_tabreal = tab($ch_tab);
				$this->tab_check = $ch_tabreal;
				$this->proc->db->load_field($ch_tab);
				$this->tab_key[$this->tab_check] = $this->proc->db->fields[$ch_tabreal]['primary_key'];
				if($ch_type1){
					$val1 = parse_obj($this->formdata[$ch_type1], $ch_var);
				}else{
					$val1 = $ch_var;
				}
				if($ch_type2){
					$val2 = parse_obj($this->formdata[$ch_type2], $ch_param);
				}else{
					$val2 = $ch_param;
				}
				switch($ch_typecheck){
					case 'filled':
					if(!$val1){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'equal':
					if($val1!=$val2){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'differ':
					if($val1==$val2){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'exist':
					$this->proc->mod['filter'] = $ch_var.' = "'.$val1.'"';
					$this->proc->fetch($ch_tab);
					unset($this->proc->mod['filter']);
					if($this->proc->tab[$ch_tab]['qty']==0){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'empty':
					$this->proc->mod['filter'] = $ch_var.' = "'.$val1.'"';
					$this->proc->fetch($ch_tab);
					unset($this->proc->mod['filter']);
					if($this->proc->tab[$ch_tab]['qty']>0){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'update':
					$this->proc->mod['filter'] =  $ch_var.' = "'.$val1.'" and '.$this->tab_key[$this->tab_check].' != "'.$this->formdata['POST'][$this->tab_key[$this->tab_check]].'"';
					$this->proc->fetch($ch_tab);
					unset($this->proc->mod['filter']);
					if($this->proc->tab[$ch_tab]['qty']>0){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'longer':
					if(strlen($val1)<$val2){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'shorter':
					if(strlen($val1)>$val2){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'email':
					if(!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $val1)){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'numlat':
					if(!preg_match("/^[a-zA-Z0-9_\-]+$/", $val1)){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'login':
					if(!$_SESSION['logged'] and $val1 and $val2){
						$usertab = tab($ch_tab);
						$ch_param= $ch_param;
						$this->proc->mod['filter'] = $ch_var.' = "'.$val1.'"';
						$this->proc->mod['index'] = 1;
						$this->proc->fetch($ch_tab);
						unset($this->proc->mod);
						$this->param001 = $this->proc->tabdata[$usertab][0][$ch_param];
						if($this->proc->tab[$usertab]['qty']==0){
							$this->ok_form = FALSE;
							$this->message.= ($this->msg_separ.$ch_errmsg);
						}elseif($this->param001!=$val2 and $this->param001!=md5($val2)){
							$this->ok_form = FALSE;
							$this->message.= ($this->msg_separ.$ch_errmsg);
						}else{
							$_SESSION['logged']=TRUE;
							$_SESSION['user_id']=$this->proc->tabdata[tab($ch_tab)][0][$this->tab_key[$this->tab_check]];
							$_SESSION['uid'] = $_SESSION['user_id'];
							$_SESSION['username']=$val1;
							$this->proc->mod['index'] = 1;
							$this->proc->mod['filter'] = 'user_id = "'.$_SESSION['user_id'].'"';
							$this->proc->mod['order'] = 'acl_datetime DESC';
							$this->proc->fetch('sys_acc_cli');
							unset($this->proc->mod);
							$_SESSION['access_granted']=$this->proc->tabdata['sys_acc_cli'][0]['granted'];
							$_SESSION['rank']=$this->proc->tabdata['sys_acc_cli'][0]['acclabs'];
							$this->proc->fetch('sys_accrank');
							if($_SESSION['access_granted']>0){
								$_SESSION['rankrus']=$this->proc->tabdata['sys_accrank'][$_SESSION['rank']]['accname'];
							}else{
								$_SESSION['rankrus']='<strike>'.$this->proc->tabdata['sys_accrank'][$_SESSION['rank']]['accname'].'</strike>';
							}
						}
					}elseif(!$val1 or !$val2){
							$this->ok_form = FALSE;
							$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'logout':
					//echo '<br />logout: val1 '.$val1.', val2 '.$val2;
					if(isset($_SESSION['logged']) and $val1==$val2){
						//echo 'sess logged: '.$_SESSION['logged'];
						unset($_SESSION['logged']);
						unset($_SESSION['user_id']);
						unset($_SESSION['uid']);
						unset($_SESSION['STAN']);
						unset($_SESSION['PIN']);
						unset($_SESSION['KeyId']);
						unset($_SESSION['username']);
						unset($_SESSION['userdata']);
						unset($_SESSION['rank']);
						unset($_SESSION['rankrus']);
						unset($_SESSION['granted']);
						//echo 'sess logged: '.$_SESSION['logged'];
					}				
					break;
					case 'keeptags':
					$this->keeptagsfield[$ch_var] = 1;
					break;
					case 'dataput':
					$this->proc->db->load_field($ch_tab);
					$co = count($this->proc->db->fields[$ch_tab]['list']);
					$k2 = 0;
					for($kk=0; $kk<$co;$kk++){
						$xind = $this->proc->db->fields[$ch_tab]['list'][$kk][label_field];
						if($this->formdata['POST'][$xind]){
							$form_filters[$k2] =$xind.' = "'.$this->formdata['POST'][$xind].'"';
							$k2++;
						}
					}
					$this->proc->mod['filter'] = $this->form_filter;
					$this->proc->mod['index'] = 1;
					$this->proc->fetch($ch_tab);
					unset($this->proc->mod['filter']);
					if($this->proc->tab[$ch_tab]['qty']==0){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}else{
						$this->array_data = $this->proc->tabdata[$ch_tab];
					}
					break;
					case 'md5':
					$this->formdata['POST'][$ch_var]=md5($val1);
					break;
					case 'regexp':
					if(!preg_match($val2, $val1)){
						$this->ok_form = FALSE;
						$this->message.= ($this->msg_separ.$ch_errmsg);
					}
					break;
					case 'quotes':
						$val1=str_replace('"', '\"', $val1);
						$val1=str_replace("'", "\'", $val1);
						//$this->formdata[$ch_type1][$ch_var]= addslashes($val1); //вставляет \r\n и экранирует кавычки в тегах
						//ech($this->formdata);
					break;
					case 'html':
					$val1=htmlspecialchars($val1);
					break;
				}
				}
			}
			if($this->ok_form==FALSE or (count($this->formdata['POST'])==0 and count($this->formdata['GET'])==0 and count($this->formdata['FILE'])==0)){
				$this->tplmsg = $ch_tplmsg;
				$this->message.= ($this->msg_separ.$errmsg);
				$_SESSION['sys_tmp'] = $this->formdata;
			}else{
				$formres = $this->data_proc();
				//echo '<br />END of data_check $ci: '.$ci;
				return $formres;
			}
		}
	}
	public function data_proc(){ 
	//echo '<br />BEGIN of data_proc $di: '.$di;
		if($this->stage){
			$extra_filter = ' AND stage = "'.$this->stage.'"';
		}else{
			$extra_filter = ' AND (stage = "" OR stage = 0 OR stage IS NULL)';
		}
		$args = func_get_args();
		$this->proc->mod['filter'] = 'formname="'.$this->check_form['nam'].'"'.$extra_filter;
		$this->proc->mod['index'] = 1;
		$this->proc->fetch('sys_dataproc');
		$prc_qty = $this->proc->tab['sys_dataproc']['qty'];
		$prc_act = $this->proc->tabdata['sys_dataproc'];
		//ech($prc_act);
		for($di=0;$di<$prc_qty;$di++){
			$row_id = $prc_act[$di]['row_id'];
			$formname = $prc_act[$di]['formname'];
			$stage = $prc_act[$di]['stage'];
			$restype = $prc_act[$di]['restype'];
			$resvar = $prc_act[$di]['resvar'];
			$resparam = $prc_act[$di]['resparam'];
			$type1 = $prc_act[$di]['type1'];
			$var = $prc_act[$di]['var'];
			$param = $prc_act[$di]['param'];
			$tinstance = $this->formvars[$prc_act[$di]['instance']]; 
			$prockind = $prc_act[$di]['prockind'];
			$value = $prc_act[$di]['value'];
			if($value){
				$val = $value; 
			}else{
				if($type1){
					if($var){
						if($param){
							$val=parse_obj($this->formdata[$type1][$var], $param);
						}else{
							$val=$this->formdata[$type1][$var];
						}
					}else{
						$val=$this->formdata[$type1];
					}
				}else{
					if($param){
						$val=$this->formvars[$var][$param];
					}else{
						$val=$this->formvars[$var];
					}
				}
			}
			if($restype){
				if($resvar){
					if($resparam){
						$this->formdata[$restype][$resvar][$resparam] = func($prockind, $val, $tinstance);
					}else{
						//echo '<br />$restype '.$restype.', $resvar '.$resvar;
						$this->formdata[$restype][$resvar] = func($prockind, $val, $tinstance);
						//echo ', $prockind '.$prockind.', $val '.$val.', $tinstance'.$tinstance;
					}
				}else{
					$this->formdata[$restype] = func($prockind, $val, $tinstance);
				}
			}else{
				if($resparam){
					$this->formvars[$resvar][$resparam] = func($prockind, $val, $tinstance);
				}else{
					$this->formvars[$resvar] = func($prockind, $val, $tinstance);
				}
			}
			unset($res);
		}
		$actres = $this->sys_actions();
		/*
		// из за этого цикла обнуляется сессионная переменная username
		if(is_array($this->formdata['SESSION'])){
			foreach($this->formdata['SESSION'] as $key=>$val){
				$_SESSION[$key] = $val;
			}
		}
		*/
		//ech($this->formdata);
		//echo '<br />END of data_proc $di: '.$di;
		return($this->formdata);
	}
	public function sys_actions(){
		//echo '<br />BEGIN++ of sys_actions $ai: '.$ai;
		$args = func_get_args();
		$this->formname = $this->check_form['nam'];
		$this->formdata['POST']['ip'] = $_SERVER['REMOTE_ADDR'];
		if(!$this->formdata['POST']['cur_label'] and $this->formdata['POST']['insert_current_label']){ //Что это?
			$this->formdata['POST']['cur_label'] = $this->proc->cur_label;
		}
		if(is_array($this->keeptagsfield)){
			foreach($this->keeptagsfield as $key => $val){
				$this->proc->mod['keeptags'][$key] = $val;
			}
		}
		$this->formdata = $this->proc->security($this->formdata);
		if($this->stage){
			$extra_filter = ' AND stage = "'.$this->stage.'"';
		}else{
			$extra_filter = ' AND (stage = "" OR stage = 0 OR stage IS NULL)';
		}
		$this->proc->mod['filter']='formname="'.$this->check_form['nam'].'"'.$extra_filter;
		$this->proc->mod['index'] = 1;
		$this->proc->mod['order'] = 'row_id';
		//echo '<br />'.$this->proc->mod['filter'];
		$this->proc->fetch('sys_actions');
		$aqty = $this->proc->tab['sys_actions']['qty'];
		//echo '<br />Акций: '.$aqty;
		//ech($this->proc->tabdata['sys_actions']);
		for($ai=0; $ai<$aqty;$ai++){
			//ech($this->proc->tabdata['sys_actions'][$ai]);
			$ac_stage = $this->proc->tabdata['sys_actions'][$ai]['stage'];
			$ac_stageup = $this->proc->tabdata['sys_actions'][$ai]['stageup'];
			$ac_tplmsg = $this->proc->tabdata['sys_actions'][$ai]['tplmsg'];
			$this->action = $this->proc->tabdata['sys_actions'][$ai]['act'];
			$type1 = $this->proc->tabdata['sys_actions'][$ai]['type1'];
			$tab = $this->proc->tabdata['sys_actions'][$ai]['tab'];
			switch($this->action){
				case 'add':
					$this->proc->db->load_field($tab);
					$this->tab_key[$tab] = $this->proc->db->fields[$tab]['primary_key'];
					$dbres = $this->proc->put_array($this->formdata[$type1], $tab);
				break;
				case 'del':
					$this->proc->db->load_field($tab);
					$this->tab_key[$tab] = $this->proc->db->fields[$tab]['primary_key'];
					$dbres = $this->proc->del_array($this->formdata[$type1], $tab);
				break;
				case 'edit':
					$this->proc->db->load_field($tab);
					$this->tab_key[$tab] = $this->proc->db->fields[$tab]['primary_key'];
					$this->proc->mod['update'] = $this->tab_key[$tab].' = "'.$this->formdata[$type1][$this->tab_key[$tab]].'"';
					$dbres = $this->proc->put_array($this->formdata[$type1], $tab);
					unset($this->proc->mod);
				break;
				case 'udd': 
					$this->proc->db->load_field($tab);
					$this->tab_key[$tab] = $this->proc->db->fields[$tab]['primary_key'];
					$this->proc->mod['update'] = $this->tab_key[$tab].' = "'.$this->formdata[$type1][$this->tab_key[$tab]].'"';
					$this->proc->mod['updadd'] = 1;
					$dbres = $this->proc->put_array($this->formdata[$type1], $tab);
					unset($this->proc->mod);
				break;
				case 'put':
					$this->proc->db->load_field($tab);
					$this->tab_key[$tab] = $this->proc->db->fields[$tab]['primary_key'];
					$dbres = $this->proc->put_array($this->formdata[$type1], $tab);
				break;
				case 'file':
					if(!$tab){ //tab - в данном случае папка для загрузки
						$tab = $proc->config['uploaddir'];
					}
					$file_site_root = $_SERVER['DOCUMENT_ROOT']."/";
					$server_site_root = "http://".$_SERVER["HTTP_HOST"]."/";
					ini_set("include_dir", ini_get("include_dir").":".$file_site_root);
					
					@mkdir($tab, 0777);
					$fkey = key($this->formdata[$type1]); //индекс массива с параметрами файла(ов)
					$files = $this->formdata[$type1]; //основной элемент массива с параметрами файла(ов)
					foreach($files as $key=>$val){
						$files[$key] = (array)$val;
					}
					foreach($files['tmp_name'] as $key=>$val){
						//$tmpfile = preg_replace('/\\{2}/', '-', $val);
						//$uploadfile = $tab.basename($files['name'][$key]);
						$uploadfile = $tab.'/'.$files['name'][$key];
						//echo 'uplfile: '.$uploadfile;
						if(!move_uploaded_file($val, $uploadfile)) {
							//ошибка
							echo'<br />Ошибка<br />';
							ech($this->formdata);
						}
					}
					
				break;
				case 'php':
					$this->proc->mod['filter'] = 'label="'.$this->proc->tabdata['sys_actions'][$ai]['phpcode'].'" and scriptype="php"';
					$this->proc->mod['limit']=1;
					$this->proc->mod['index']=1;
					$this->proc->mod['order']='row_id';
					$this->proc->fetch('sys_scripts');
					eval($this->proc->tabdata['sys_scripts'][0]['scrip']);	
				break;
				case 'curlj': //Делал только для Платфона?
					if($this->curlj = curl_init()){ 
						if(is_array($this->formdata['POST'])){ 
							foreach($this->formdata['POST'] as $key=>$val){ 
								if(preg_match('/^CURLOPT/', $key)){
									curl_setopt($this->curlj, constant($key), $val);
								}
							}
							$len = strlen($this->formdata['POST'][$tab]);
							$head = array(
							'Content-Type: application/json', 
							'Host: pso_test.2tbank.ru', 
							'Content-Length: '.$len);
							curl_setopt($this->curlj, CURLOPT_POSTFIELDS, $this->formdata['POST'][$tab]);
							curl_setopt($this->curlj, CURLOPT_HTTPHEADER, $head);	
							$curljres = curl_exec($this->curlj);
							$this->formdata['CURL'] = $curljres;
						}
					}
				break;
				case 'soapcon':
					$url = $this->formdata['SOAP']['url'];
					$options = $this->formdata['SOAP']['options'];
					$this->formvars[$tab] = new  SoapClient($url, $options);
				break;
			}
			if($this->proc->tabdata['sys_actions'][$ai]['okmess']){
				$this->message.= $this->proc->tabdata['sys_actions'][$ai]['okmess'];
				$this->tplmsg = $ac_tplmsg;
			}
			if($ac_stageup){
				$this->stage = $ac_stage + $ac_stageup;
				$fres = $this->data_check();
			}
		}	
		//echo '<br />END of sys_actions $ai: '.$ai;
	}
	public function formxml(){ 
		$args = func_get_args();
		$template = new stdClass;
		foreach($args[0] as $kkey=>$vval){
			$res = &$template;
			$exp = preg_match_all("/(>|@|\|)([a-zA-Zа-яА-я0-9_\-]*)/", $kkey, $match);
			if(count($match[0])){
				foreach($match[2] as $key=>$val){
					$sep = $match[1][$key];
					$res=&$this->getelem($res, $val, $sep);
				}
				$res = $vval;
			}
		}
		return $template;
	}
	public function &getelem(&$ob, $prop, $separ){
		switch($separ){
			case '>':
			return $ob->$prop;
			break;
			case '|':
			return $ob[$prop];
			break;
		}
	}
}
?>