<?
class tree{

	public $root_arr, $par_field, $par_key, $par_row, $par_lab, $datalevel, $full_row, $tree;
	public function draw_root(){
		$argdr = func_get_args();
		if(is_array($argdr[0]['list'])){
			foreach($argdr[0]['list'] as $key1=>$val1){
				if(!$argdr[0]['list'][$key1][$this->par_field]){
					$argdr[0]['list'][$key1][$this->par_field] = 0;
				}
				//echo '<br />key: '.$key1.' value: '.($argdr[0][$key1][$this->par_field]);
				//$this->full_row[$argdr[0][$key1][$this->par_key]][] = '123';
				$this->root_arr[$argdr[0]['list'][$key1][$this->par_field]][] = $val1;
			}
		}
		$this->par_row = 'key';
		$res_tree['tree'] = $this->find_root($this->root_arr);
		$this->tree = $res_tree['tree'];
		$res_tree['bread'] = $this->bread($this->tree);
		$res0 = $this->crumbs($res_tree['bread'], $argdr[0]['labs']);
		$res_tree['crumbs'] = $res0['crumbs'];
		$res_tree['address'] = $res0['address'];
		$res_tree['level'] = $this->datalevel;
		$res_tree['parent'] = $this->par_lab;
		//$res_tree['address'] = '';
		return $res_tree;
	}
	
	
	private function bread(){
		$argbe = func_get_args();
		//ech($argbe[0]);
		//echo $argbe[1].'<br />';
		if(is_array($argbe[0])){
			
			foreach($argbe[0] as $key=>$val){
				$this->par_lab[$key] = '';
				if(is_array($val)){
					//echo $key.' da<br />';
					//echo $key;	print_r($val); 	echo '<br />';
					if($argbe[1]){
						//echo '<br />param:'.$argbe[1].', key: '.$key.', full_row[key]: '.$this->full_row[$key]; print_r($this->full_row[$argbe[1]]);
						$this->full_row[$key] = $this->full_row[$argbe[1]];
						$this->par_lab[$key] = $argbe[1];
					}
					$this->full_row[$key][]=$key;
					//$this->full_row[$key][]=$key;
					$this->bread($val, $key);
				}else{
					$this->full_row[$key] = $this->full_row[$argbe[1]];
					$this->par_lab[$key] = $argbe[1];
					$this->full_row[$key][] = $key;
				}
			}
		}
		//echo $key2;
		return $this->full_row;
		//echo('asdf');
		//unset($this->full_row);
		//unset($this->par_lab);
	}
	
	private function crumbs(){
		$argcr = func_get_args();
		//ech($argcr);
		//if(is_array($argcr[0])){
			foreach($argcr[0] as $key => $val){
				$br_qty = count($val);
				for($i=0; $i<$br_qty; $i++){
					//ech($argcr[1]);
					$res_br['address'][$key].=('/'.str_replace('%2F', '/', urlencode(str_replace(' ', '_',$argcr[1][$val[$i]]))));
					$res_br['crumbs'][$key].=('/'.str_replace(' ', '_',$argcr[1][$val[$i]]));
				}
			}
		//}
		return $res_br;
	}
	

	private function find_root(){
		//$this->find_rootlvl++;
		$argb = func_get_args();
		$br_coun = count($argb[0][0]);
		//echo $br_coun;
		$br_data = $argb[0][0];
		$br_full = $this->root_arr;
		//ech($br_data[$i][$this->par_field]);
		//$this->full_row[$br_data[$i][$this->par_key]][] = '123';
		//echo '<br />row<br />';
		if(is_array($br_data)){
			foreach($br_data as $i=>$vali){
				$br_res[$br_data[$i][$this->par_key]] = $br_data[$i][$this->par_key];
				if($br_data[$i][$this->par_field]){
					$this->datalevel[$br_data[$i][$this->par_key]] = $this->datalevel[$br_data[$i][$this->par_field]]+1;
				}else{
					$this->datalevel[$br_data[$i][$this->par_key]] = 0;
				}
				if($br_full[$br_res[$br_data[$i][$this->par_key]]]){
						$br_next[0] = $br_full[$br_res[$br_data[$i][$this->par_key]]];
						$br_res[$br_data[$i][$this->par_key]] = $this->find_root($br_next);
				}
			}
		}
		return $br_res;
	}

}

?>