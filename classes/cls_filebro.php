<?
class filebro{
	public $cur_folder, $tab_class, $send_var, $pic_height, $proc, $pict_path, $cur_path, $up_path, $local_path, $fullpath;
	private $tab_cls, $files_count, $tab_fold_tmp, $folders_count, $cur_pict, $cur_file, $separ, $up_param;
	
	
	public function __construct($proc){
			$this->proc = $proc;
	}
	
	public function scanpath($path){
		if($path){
			$fold_exp = explode('/', $path);
			$fold_qty = count($fold_exp);
			if(strlen(end($fold_exp))){
				unset($fold_exp[$fold_qty-1]);
				$fold_imp = implode('/', $fold_exp);
			}else{
				unset($fold_exp[$fold_qty-1]);
				$fold_tmp = implode('/', $fold_exp);
				$fold_imp = $this->scanpath($fold_tmp);
			}
			return $fold_imp;
		}else{
			return '';
		}
	}
	
	public function scanfold(){
		//echo '++++++++';
		$extens = array(
			'jpg' => true,
			'jpeg' => true,
			'gif' => true,
			'png' => true,
			'tif' => true
		);
		//ech($extens);
		if(!$this->cur_folder){
			//$this->cur_folder = mb_convert_encoding(urldecode($_GET['folder']), 'UTF-8', 'windows-1251') ;
			//$this->cur_folder = mb_convert_encoding($_GET['folder'], 'windows-1251', 'UTF-8');
			
			if($_GET['folder']){
				$this->cur_folder = mb_convert_encoding($_GET['folder'], 'windows-1251', 'UTF-8');
			}else{
				$this->cur_folder = 'images';
			}
			
		}
		//echo 'fold: '.mb_convert_encoding($this->cur_folder, 'UTF-8', 'windows-1251').'<br />';
		
		if($this->cur_folder == '/'){
			unset($this->cur_folder);
		}
		
		//echo '++ '.$this->cur_folder;
		if(!$this->cur_folder){
			
			$this->cur_folder = '.';
			$this->fullpath = '';
			$this->pict_path = '/';
			$this->cur_path = $_SERVER['DOCUMENT_ROOT'].'/';
			$this->local_path = '';
			//$this->cur_path = '/';
		}else{
			
			$this->fullpath = $this->cur_folder;
			$this->cur_path = $this->cur_folder.'/';
			$this->pict_path = '/'.preg_replace('|%2F|', '/', urlencode(mb_convert_encoding($this->cur_path, 'UTF-8', 'windows-1251')));
			$this->local_path = $this->cur_folder.'/';
			$fold_exp = explode('/', $this->cur_folder);
			//$fold_last = end($fold_exp);
			$fold_qty = count($fold_exp);
			if(strlen($last_fold)){
				$last_length = strlen(end(explode('/', $this->cur_folder)));
			}
			$cur_fol = explode('/', $this->cur_folder);
			$this->up_path = mb_substr($this->cur_folder, 0, strlen($this->cur_folder)-(strlen(end($cur_fol))+0));
		}
		$this->up_path = $this->scanpath($this->local_path);
		/*if(!$this->pic_height){
			$this->pic_height = '100px';
		}*/
		if(!$this->tab_class){
			$this->tab_cls = 'class = "'.$this->tab_class.'" ';
		}else{
			$this->tab_cls = '';
		}
		$this->files_count = 0;
		$this->folders_count = 0;

		//echo mb_substr($this->cur_folder, 0, 13);
		/*
		echo '<br />cur_folder: '.$this->cur_folder.'<br />';
		echo '<br />fullpath: '.$this->fullpath;	
		echo '<br />cur_path: '.$this->cur_path;	
		echo '<br />pict_path: '.$this->pict_path;	
		echo '<br />local_path: '.$this->local_path;
		echo '<br />up_path: '.$this->up_path;	
		*/
		
		
		if(base_url){
				$prefix = substr(base_url, 0, strlen(base_url)-1);
				$prefix='';
				//echo $prefix;
		}
		

		if ($dir = opendir($this->cur_folder)){
			$link = $this->proc->sys['url']['query'];
			//echo $link;
			if($link){
				$link = preg_replace('/^folder=[а-яА-Яa-zA-Z0-9_\-\s\/%]+\&/', '', $link);
				$link = preg_replace('/\&folder=[а-яА-Яa-zA-Z0-9_\-\s\/%]+$/', '', $link);
				$link = preg_replace('/\&folder=[а-яА-Яa-zA-Z0-9_\-\s\/%]+\&/', '&', $link);
			}
			if($this->up_path){
				$this->up_param = '?folder='.mb_convert_encoding($this->up_path, def_enc, "windows-1251").'&'.$link.'&fold1=попячься';
			}else{
				$this->up_param = '?'.$link.'&fold1=попячься';
			}
			
			$result['folder_table'] = '<table '.$this->tab_cls.' border="1"><tr><td class="foldcell"><a href="'.$this->proc->sys['url']['path'].$this->up_param.'">.......</td></tr>';
			while (false !== ($file = readdir($dir))){ 
				if (($file != '.') && ($file != '..')){ 
					//echo mb_convert_encoding($this->cur_path.$file, def_enc, "windows-1251").'<br />';
					if (is_file($this->cur_path.$file)){
						
						
						$this->cur_file = mb_convert_encoding($file, def_enc, "windows-1251");
						$result['files'][$this->files_count] = $this->cur_file;
						$filear = explode(".", $file);
						$ext = strtolower(end($filear));
						if($extens[$ext]){
						
							$this->cur_pict = $this->pict_path.$this->cur_file;
							//echo ' cur_pict '.$this->cur_pict;
							
							$result['pictures'].='<img src="'.$prefix.$this->cur_pict.'" class="browthumb" />';
							
						}
						$this->files_count++;
					}else{


						//echo $link.'<br />';
						$result['folders'][$this->folders_count] = mb_convert_encoding($file, def_enc, "windows-1251");
						$this->tab_fold_tmp[$this->folders_count] = '<tr><td class="foldcell"><a href="'.$this->proc->sys['url']['path'].'?folder='.mb_convert_encoding($this->local_path.$file.'&'.$link, def_enc, "windows-1251").'">'. mb_convert_encoding($file, def_enc, 'windows-1251').'</a></td></tr>';
						//echo $this->folders_count.'	'.$this->tab_fold_tmp[$this->folders_count].'<br />';
						//echo mb_convert_encoding($file, def_enc, 'windows-1251').'<br />';
						$this->folders_count++;						
					}
				$i++;
				} 
			}
			
			if(is_array($this->tab_fold_tmp)){
				sort($this->tab_fold_tmp);
				//ech($this->tab_fold_tmp);
				//echo count($this->tab_fold_tmp);
				$this->tab_fold_tmp = implode($this->tab_fold_tmp);
				$result['folder_table'] .= $this->tab_fold_tmp;
				
			}
			$result['folder_table'] .= '</table>';
			closedir($dir); 
		} 
		/*
		$foll = $_GET['fold1'];
		if ($dir = opendir(mb_convert_encoding($foll, 'windows-1251', 'UTF-8'))){
			echo $foll.' Попячься<br />';
			echo '/images<br />';
			echo urlencode('/images').'<br />';
			//echo mb_convert_encoding($foll, 'windows-1251', 'UTF-8').' Попячься<br />';
		}
		*/
		return $result;
	}
	
}

?>