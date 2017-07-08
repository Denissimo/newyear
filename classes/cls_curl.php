<?
class curl{
    private $curl;
	public $curlopt, $ob_twin, $curldata;
	
   
    public function __construct(){
	//echo '<br />++<br />';
		$args = func_get_args();
		if($this->curl = curl_init()) {
			if($args[0]){
				$this->curldata = $this->curlopt($args[0]);
			}
			//echo "kerr ok";
			//return $this->curldata;
		}else{
			//echo "kerr ?????";
			//return 0;
		}
		
		$this->separ['array'] = '|';
		$this->separ['object'] = '>';
		
	}
	
	public function curlopt(){
	//echo '<br />**<br />';
		if(!$this->curl){
			$this->curl = curl_init();
		}
		$args_opt = func_get_args();
		if($args_opt[0]){
			$this->curlopt = $args_opt[0];
		}
		curl_setopt($this->curl, 156, 2500);
		if(is_array($this->curlopt)){
			foreach($this->curlopt as $key=>$val){
				$param2 = constant(CURLOPT_.$key);
				//$param2 = CURLOPT_URL;
				//echo $param2."<br />";
				curl_setopt($this->curl, $param2, $val);
			}
		}
		$curlres = curl_exec($this->curl);
		return $curlres;
	}

	
	function __destruct() {
		if($this->curl){
			curl_close($this->curl);
		}
	}	

	
	public function pso(){
		$args = func_get_args();
		$postdata = json_encode($args[0]);
		$curlopt['URL'] = 'http://pso_test.2tbank.ru:2222/PSO.svc/json/'.$args[1].'/';
		$curlopt[RETURNTRANSFER] = 1;
		$curlopt[POST] =  1;
		$curlopt[POSTFIELDS] =  $postdata;//"login=SH&pass=3855359";
		$curlopt[HTTPHEADER] = array(                                                                          
		'Content-Type: application/json', 
		'Host: pso_test.2tbank.ru', 
		'Content-Length: '.strlen($postdata));
		if(!$args[2]){
			$args[2] = "Mozilla/5.0 (Windows NT 6.1 AppleWebKit/537.36 (KHTML, like Gecko Chrome/37.0.2062.103 Safari/537.36"; 
		}
		$curlopt[USERAGENT] = $args[2]; 
		$res = $this->curlopt($curlopt);
		$dec = json_decode($res);
		return $dec;
	}
	
	public function pso_login(){
		$args = func_get_args();
		
		$postdata['login'] = $args[0];
		$postdata['pass'] = $args[1];
		$pdata = json_encode($postdata);
		//echo $postdata;
		$curlopt['URL'] = 'http://pso_test.2tbank.ru:2222/PSO.svc/json/PSOCabinAuth/';
		$curlopt[RETURNTRANSFER] = 1;
		$curlopt[POST] =  1;
		$curlopt[POSTFIELDS] =  $pdata;//"login=SH&pass=3855359";
		$curlopt[HTTPHEADER] = array(                                                                          
		'Content-Type: application/json', 
		'Host: pso_test.2tbank.ru', 
		'Content-Length: '.strlen($pdata));
		$curlopt[USERAGENT] = "Mozilla/5.0 (Windows NT 6.1 AppleWebKit/537.36 (KHTML, like Gecko Chrome/37.0.2062.103 Safari/537.36"; 
		$res = $this->curlopt($curlopt);
		$dec = json_decode($res);
		return $dec;

	}
	
	public function do_deep(){
		$args = func_get_args();
		if(is_object($args[0])){
			//$twin
		}
		
	}
	public $index, $tmp_key, $separ;
	
	public function set(){
		$this->ob_twin = new stdClass;
		$this->separ['array'] = '|';
		$this->separ['object'] = '>';
		//$this->ob_twin->zzz[0] = 1;	
	}
	
	

	public function do_index(){
		//$this->ob_twin = $args[0];
		$args = func_get_args();
		/*
		if(is_array($args[0])){
			
			//$ind = $separ.$key;
			//$this->ob_twin->ind[$key] = $ind;
		}elseif(is_object($args[0])){
			$separ = $this->separ['object'];
			//$ind = $separ.$key;
			//$this->ob_twin->ind->$key = $ind;
		}
		*/		
		if(is_array($args[0])){
			$separ = $this->separ['array'];
			foreach($args[0] as $key=>$val){
				$ind = $separ.$key;
				$args[1][$key] = $ind;
			}
		}elseif(is_object($args[0])){
			$separ = $this->separ['object'];
			foreach($args[0] as $key=>$val){
				$ind = $separ.$key;
				$args[1]->$key = $ind;
			}
		}else{
			
		}
		//ech($args[1]);
				
	}



	
	}

?>