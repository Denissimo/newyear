<?
class preg{
	public $temp, $data, $data_proc, $separator, $multi;
	private $i, $data_qty, $object05;
	
	function build(){
		//if($this->multi){
		if(is_array($this->data)){
			$this->data_qty = count($this->data);
			for($this->i=0; $this->i<$this->data_qty; $this->i++){
				$res_pr[$this->i] = preg_replace_callback("/\[>([а-яА-Яa-zA-Z0-9_\-\s\/]+)<\]/u", array(get_class($this),'poster05'), $this->data[$this->i]);
			}
			
		}else{
			$res_pr = preg_replace_callback("/\[>([а-яА-Яa-zA-Z0-9_\-\s\/]+)<\]/u", array(get_class($this),'poster05'), $this->data);
		}
		return $res_pr;
		
	}
	
	public function poster05($matches){

			return($matches);
			
		}


}

?>