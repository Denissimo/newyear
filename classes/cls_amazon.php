<?
//$sdb = new AmazonSDB();
//select * from sdktestomni where itemName() = '4'
class AmSDB{
private $response;
public $source, $domain, $request, $ress, $obj, $mod, $tab;
	public function __construct(){
		$this->source = new AmazonSDB();
		return $this;
	}		
	public function go_req($request){
		$this->request = $request;
		//echo '<br />'.$this->request;
		$this->response = $this->source->select($this->request);
		$this->ress = (array)$this->response->body->SelectResult;
		//return $this->obj2arr($ress['Item']);
		/*
		echo '<pre>';
		print_r($this->response);
		echo '</pre>';
		*/
		/*
		if(is_object($this->ress['Item'])){
			echo '<br />Объект';
		}elseif(is_array($this->ress['Item'])){
			echo '<br />Массив';
		}else{
			echo '<br />Ни то ни сё';
		}
		*/
		if(is_object($this->ress['Item'])){
			$res = get_object_vars($this->ress['Item']);
			$ind = $res['Name'];
			$res1[$ind] = $res;
			//echo '<br />Index: '.$ind;
			//$res1 = $this->ress['Item'];
		}else{
			$res1 = $this->ress['Item'];
		}
		return $this->obj2arr($res1);
		//return $this->ress;
	}
	
	public function obj2arr($obj){
		//$this->obj = $obj;
		//print_r($this->mod);
		$i=0;
		if($obj){
			if(is_object($obj)){
					$obj=get_object_vars($obj);
					$intmd = $obj['Attribute'];
					unset($obj);
					$obj[0]=$intmd;
			}
			foreach($obj as $key => $value){
				if(is_object($obj[$key])){
					$obj[$key]=get_object_vars($obj[$key]);
					//echo '<br />+++: '.$obj[$key]['Name'];
				}
				
				if(is_array($obj[$key])){
					if($obj[$key]['Attribute']){
						//echo '<br />+++Name: '.$obj[$key]['Name'];
						if($this->mod['index']){
							$kkey = $key;
						}else{
							$kkey = $obj[$key]['Name'];
						}
						$i++;
						$this->tab[$i]=$obj[$key]['Name'];
						$vval = $obj[$key]['Attribute'];
						unset($obj[$key]);
						
						$res[$kkey] = $this->obj2arr($vval);
/*
						echo '<pre>'.$kkey.'<br />';
						print_r($res[$kkey]);
						echo '</pre>';
*/						
					}elseif($obj[$key]['Name']){
						if(is_object($obj[$key]['Value'])){
							$obj[$key]['Value']=(string)$obj[$key]['Value'];
						}
						$res[$obj[$key]['Name']] = $obj[$key]['Value'];
						unset($obj[$key]);
					}
					
					if($obj[$key]){
						$res[$key] = $this->obj2arr($obj[$key]);
					}
					
				}
			}
		}
		
		
		
		//Загружает с числовыми номерами (независимо от реального индекса)
		/*
		if($obj){
			foreach($obj as $key => $value){
				if(is_object($obj[$key])){
					$obj[$key]=get_object_vars($obj[$key]);
				}
				if(is_array($obj[$key])){
					if($obj[$key]['Attribute']){
						$obj[$key] = $obj[$key]['Attribute'];
					}elseif($obj[$key]['Name']){
						if(is_object($obj[$key]['Value'])){
							$obj[$key]['Value']=(string)$obj[$key]['Value'];
						}
						$obj[$obj[$key]['Name']] = $obj[$key]['Value'];
						unset($obj[$key]);
					}
					if($obj[$key]){
						$obj[$key] = $this->obj2arr($obj[$key]);
					}
					
				}
			}
		}
		*/
		
		
		//загружает смесь массива с объектом
		/* 
		if($obj){
			foreach($obj as $key => $value){
				if(is_object($obj[$key])){
					$obj[$key]=get_object_vars($obj[$key]);
				}
				if(is_array($obj[$key])){
					$obj[$key] = $this->obj2arr($obj[$key]);
				}
			}
		}
		*/
		return $res;
		//return $obj;
	}
	
	public function erase($table){
		$this->response = $this->source->delete_domain($table);
		$this->response = $this->source->create_domain($table);
		return $this->response;

	}
	
	public function delete($table, $ind){
		$this->response = $this->source->delete_attributes($table, $ind);
		return $this->response;
	}
	
}
?>