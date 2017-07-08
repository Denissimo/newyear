<?
class xml{
	public $arr, $param, $proba;
	private $i, $dom, $node1;
	
	public function sub_array2xml($arr3){
		//global $dom, $i, $node1, $text1;
		//$this->i++;
		foreach($arr3 as $key3 => $value3){
					$key3 = str_ireplace(' ', '_', $key3);
					$key3 = preg_replace ('/[^a-zA-ZА-Яа-я0-9\s]/', '', $key3);
					$this->node1[$this->i] = $this->dom->createElement($key3);
					$text1[$this->i] = $this->dom->createTextNode($value3);//.'_++++++++_'.$key
					$this->node1[$this->i]->appendChild($text1[$this->i]);
					$this->node1[$this->i-1]->appendChild($this->node1[$this->i]);
		}
	}
		
	function build(){
		if(!$this->param['version']){
			$this->param['version'] = '1.0';
		}
		if(!$this->param['encoding']){
			$this->param['encoding'] = 'utf-8';
		}
		if(!$this->param['root']){
			$this->param['root'] = 'yml_catalog';
		}
	$this->dom = new DOMDocument('1.0', $this->param['encoding']);
	$root = $this->dom->createElement($this->param['root']);
	$root->setAttribute('date',date('d-m-yy'));
	
	$new = $this->dom->createElement('shop');
	$root->appendChild($new);
	//$node = $this->dom->createElement('node');
	//$text = $this->dom->createTextNode('qwe & asdf');
	//$node->appendChild($text);
	//$new->appendChild($node);
	
	
	if(is_array($this->arr)){
		foreach($this->arr as $key => $value){
			$this->i=0;
			$key = str_ireplace(' ', '_', $key);
			$key = str_ireplace('-', '_', $key);
			$key = preg_replace ('/[^a-zA-ZА-Яа-я0-9\s]/', '', $key);
			$key = 'unit_'.$key;
			
			$this->node1[0] = $this->dom->createElement($key);
			//$text = $this->dom->createTextNode($value);
			//$node->appendChild($text);
			
			if(is_array($value)){
				$this->i++;
				$this->sub_array2xml($value);
		
			}
			
			
			/*
			else{
				$text2 = $this->dom->createTextNode($value);
				$node1[0]->appendChild($text1);
			}
			*/
			//$node1[0] = appendChild($key);
			$new->appendChild($this->node1[0]);
		}
	}


	$this->dom->appendChild($root);
	
	return $this->dom->saveXML();
	}


}

?>