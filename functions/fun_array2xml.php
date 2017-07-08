<?
function array2xml($arr){	
	$dom = new DOMDocument('1.0', 'utf-8');
	$root = $dom->createElement('yml_catalog');
	$root->setAttribute('date',date('d-m-yy'));
	
	$new = $dom->createElement('shop');
	$root->appendChild($new);
	$node = $dom->createElement('node');
	$text = $dom->createTextNode('qwe & asdf');
	$node->appendChild($text);
	$new->appendChild($node);
	
	function sub_array2xml($arr3){
		global $dom, $i, $node1, $text1;
		$i++;
		foreach($arr3 as $key3 => $value3){
					$key3 = str_ireplace(' ', '_', $key3);
					$key3 = preg_replace ('/[^a-zA-ZА-Яа-я0-9\s]/', '', $key3);
					$node1[$i] = $dom->createElement($key3);
					$text1[$i] = $dom->createTextNode($value3);//.'_++++++++_'.$key
					$node1[$i]->appendChild($text1[$i]);
					$node1[$i-1]->appendChild($node1[$i]);
		}
	}


	if(is_array($arr)){
		foreach($arr as $key => $value){
			$i=0;
			$key = str_ireplace(' ', '_', $key);
			$key = str_ireplace('-', '_', $key);
			$key = preg_replace ('/[^a-zA-ZА-Яа-я0-9\s]/', '', $key);
			$key = 'unit_'.$key;
			
			$node1[0] = $dom->createElement($key);
			//$text = $dom->createTextNode($value);
			//$node->appendChild($text);
			if(is_array($value)){
				//sub_array2xml($value);
				
				$i++;
				foreach($value as $key2 => $value2){
					$key2 = str_ireplace(' ', '_', $key2);
					$key2 = preg_replace ('/[^a-zA-ZА-Яа-я0-9\s]/', '', $key2);
					$node1[$i] = $dom->createElement($key2);
					$text1[$i] = $dom->createTextNode($value2);//.'_++++++++_'.$key
					$node1[$i]->appendChild($text1[$i]);
					$node1[$i-1]->appendChild($node1[$i]);
				}
				
			}else{
				$text2 = $dom->createTextNode($value);
				$node1[0]->appendChild($text1);
			}
		  $new->appendChild($node1[0]);
		}
	}

	$dom->appendChild($root);
	
	return $dom->saveXML();
}


function array_colum($arr, $col){
	foreach($arr as $key=>$value){
		$res[$key] = $value[$col];		
	}	
	return $res;
}


?>