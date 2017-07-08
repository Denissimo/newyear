<?
class url{
//protected $link;
	
	private $arr, $i, $full_url, $despaced, $uri;
	//public $not_logged;
	//private $request, $query, $number;
	public $sys, $url, $label, $url_sample, $cur_label, $req_uri;
	
	public function __construct($data){
		$this->data = $data;
		
		if($_SERVER["UNENCODED_URL"]){
			$this->req_uri = $_SERVER["UNENCODED_URL"];
		}else{
			$this->req_uri = $_SERVER['REQUEST_URI'];
		}
		
		
		$full_url=parse_url($this->req_uri);
		if($full_url['path']=='/'){
			$this->sys['url']['full'] = '/';
			$this->sys['url']['list'][0] = '/';
			$this->sys['url']['last'] = '/';
			//$this->sys['url']['pattern'] = '${1}1,$1';
			$this->sys['url']['qty']=1;
			//echo '+++';
		}else{
			$this->sys['url']['len']=strlen($full_url['path']);
			if(strpos($full_url['path'],"%20")){
				$despaced=str_replace("%20", "_", $full_url);
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $despaced");
			}
		
			$uri=explode("/", $full_url['path']) ;
			
			$i=1;
			$this->sys['url']['full']=str_replace('_', ' ', urldecode($uri[1]));
			//$this->sys["pat"]=' ';
			while ($uri[$i]){
				$this->sys['url']['list'][$i-1]=str_replace('_', ' ', urldecode($uri[$i]));
				if($i>1){
					$this->sys['url']['full'].=('/'.$this->sys['url']['list'][$i-1]);
				}
			$i++;
			}
			$this->sys['url']['last'] = $this->sys['url']['list'][$i-2];
			$this->sys['url']['qty']=$i-1;
		}

		//ech($this->db->link);
	}

	public function make_url($addr){
		$url = urlencode(str_replace(" ", "_", $addr));
		$url = str_replace("%2F", "/", $url);
		return($url);
	}

	public function by_label($lab){
		$this->data->mod['index'] = 1;
		$this->data->mod['filter'] = 'label = "'.$lab.'"';
		//echo $this->mod['filter'];
		$this->data->fetch('sys_urls');
		$this->data->tabdata['sys_urls'][0]['url'] = $this->make_url($this->tabdata['sys_urls'][0]['address']);
		return $this->data->tabdata['sys_urls'][0];
	}
	
	public function do_url($label){
		$this->data->mod['index'] = 1;
		$this->data->mod['limit'] = 1;
		$this->data->mod['filter'] = 'label = "'.$label.'"';
		$this->data->fetch('sys_urls');
		unset($this->data->mod);
		$url = make_url($this->data->tabdata['sys_urls'][0]['address']);
		$url2="/".$url;
		return($url2);
	}

	
	
}

?>