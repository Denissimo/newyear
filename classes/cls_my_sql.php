<?
/*
Форматы автозамен
[>метка<] - замена контента
[<метка>] - замена  данных в форме
[{метка}] - замена  URL
[}метка{] - замена  ссылки

*/

class mysql extends mysqli{


	function __construct()
		{
			parent::__construct(my_host, my_user, my_password, my_db);
			//$this->query('SET NAMES utf8');
			$this->set_charset("utf8");
		}

	private $result, $query;
	public $primary, $fields, $keyfield;
	public function load_field($table){	
		if($table){
				$this->table=$table; 
				$this->query = 'SHOW COLUMNS FROM '.$this->table;
				$this->result = $this->query($this->query);
				while ($row = $this->result->fetch_assoc()) {
					$pat = '/(\D+)\((\d*)\)/';
					preg_match($pat, $row[label_type], $mat);
					if($mat[0]){
						$row[label_type] = $mat[1];
						$row[label_size] = $mat[2];
					}else{
						$row[label_size] = 0;
					}
					
					$fil[$this->table]['list'][] = $row;
					if($row['Key']){
						$fil[$this->table][$row['Key']] = $row[label_field];
						if($row['Key']=='PRI'){
							$fil[$this->table]['primary_key'] = $row[label_field]; //определяем, какое из полей - primary key
							$this->primary[$table] = $row[label_field];
						}
					}
					//print_r($row);
				}
				$this->fields=$fil;
		}
		return $fil;
	}

	public function load_key($table){
		$this->query = 'SELECT * FROM sys_keyfields WHERE tab="'.$table.'" LIMIT 1';
		$this->result = $this->query($this->query);
		if($this->result->num_rows>0){
		$data = $this->result->fetch_assoc();
			$this->keyfield[$table]=$data['keyfield'];
		}
	}
	
	public function fetch_row($mquer){
		$data = $mquer->fetch_assoc();
		return $data;
	}
	
	public function test(){
		echo "TEST!!";
	}

	public function affected_rows(){
		$num = $this->affected_rows;
		return $num;
	}

	public function count_rows($quer){
		$num = $quer->num_rows;
		return $num;
	}

	public function escape_string($datt){
		if(is_array($datt)){
			foreach($datt as $key => $value){
				$datt[$key] = $this->escape_string($value);
			}
			$rett = $datt;
		}else{
			$rett = $this->real_escape_string($datt);
		}
		return $rett;
	}
	
	public function data_seek(){ //necsry for mod['range']
		$arg = func_get_args();
		//if($arg[1]){
			mysqli_data_seek($arg[0], $arg[1]);
		//}
	}
	
	public function data_load(){
		$argdl = func_get_args();
		if($this->mod["index"]==""){
			for ($i=$this->fetch_begin; $i<=$this->fetch_end; $i++){
				$current=$this->fetch_row($argdl[0]);
				$curkey=$current[$this->keymark];
				$res['data'][$curkey]=$current;
				$res['param'][$i]=$curkey;
				/*
				if($res['data'][$curkey]['sortindex']){
					ech($res['data'][$curkey]);
					ech($current[$this->keymark]);
					ech($current);
				}
				*/
			}
		}else{
			for ($i=$this->fetch_begin; $i<=$this->fetch_end; $i++){
				$res['data'][$i]=$this->fetch_row($argdl[0]);
				$res['param'][$i]=$i;	
			}
		}
		return $res;
	}
	
	public function insert_id(){
		return $this->insert_id; 
	}
	
	public function is_table(){
		$argit = func_get_args();
		$req='SHOW TABLES LIKE "'.$argit[0].'"';
		$quer = $this->query($req);
		$num = $this->count_rows($quer);
		return $num;
	}
}
?>