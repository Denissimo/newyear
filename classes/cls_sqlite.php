<?
/*
Форматы автозамен
[>метка<] - замена контента
[<метка>] - замена  данных в форме
[{метка}] - замена  URL
[}метка{] - замена  ссылки

*/

class sqlite{
    private $database, $link, $xnum, $bases, $list_db;
	//public $not_logged;
	//private $request, $query, $number;
	public $req, $request, $table, $sour, $db;
    
    public function __construct()
    {	
		$this->bases = explode(' ', sqlite_db);

		foreach($this->bases as $key => $val){
			//$ind = defsource.$key;
			$ind = $key;
			$this->database[$ind] = $val;
			$this->list_db[$ind] = $key;
			//$this->link[$ind] = $key;
			
		}
		$this->connect();
		$this->xnum = 17;
		if(!$this->db){
			$this->db = $this->list_db[0];
		}
		
		//print_r($this->database);
	}
	
	private function connect()
    {
		foreach($this->database as $key => $val){
			/*$res = */
			ORM::configure('sqlite:'.$val , null, $this->list_db[$key]);
			//echo '<br />'.$res;
		}
		ORM::configure('return_result_sets', true);
    }
	
	public function __wakeup()
    {
        $this->connect();
    }
	
	public function close()
    {
        //$this->close();
    }
	
	private function as_array(&$obj)
	  {
		$obj = array_map(function($model) {
		  return $model->as_array();
		} , $obj);
	  }
	

	
	public $primary;
	public function load_field($table){
		$tabsep = strpos($table, separator1);
		if($tabsep){
			$tabmas = explode(separator1, $table);
			$table = $tabmas[1];
			$this->db = $tabmas[0];
			  //ech($tabmas);
		}
		if($table){
			$this->table = $table; 
			//$tab_exist = $this->is_table($this->table);
			if(!$this->fields[$this->table]){
				$fields = $this->query('PRAGMA table_info('.$this->table.')');
				
				//$this->as_array($fields);
				$i = 0;
				//ech($fields[0]->name);
				//$row = $fields->find_many();//->as_array();
				//ech($row[0]);
				//$row = $fields->find_one(3)->as_array();
				//ech($row);
				
				
				while($row = $fields[$i]){	//(SQLITE3_ASSOC)){ 
					//$row = $fields->find_one($i)->as_array();
					//ech($row);
					$fil[$this->table]['list'][$i]['field'] = $row->name;
					$fil[$this->table]['list'][$i]['type'] = $row->type;
					$fil[$this->table]['list'][$i]['flags']=0;
					$fil[$this->table]['list'][$i]['len']=0;
					if($row['pk']){
						$fil[$this->table]['primary_key'] = $fil[$this->table]['list'][$i]['field']; //определяем, какое из полей - primary key
						$this->primary[$table] = $fil[$this->table]['list'][$i]['field'];
					}
				$i++;	
				}
				$this->fields=$fil;
		
			}
		}
		//unset($this->db);
		
	}
			
	public function load_key($table)
	{
		$tab_exist = $this->is_table('sys_keyfields');
		if($tab_exist){
			$req='SELECT * FROM sys_keyfields WHERE tab="'.$table.'"';
			//echo $req.'<br />';
			$quer=$this->query($req);
			$kfrow = $this->fetch_row($quer);
			//ech($kfrow);
			$kf=$kfrow["keyfield"];
			$this->keyfield[$table]=$kf;
			//ech($this->keyfield);
		}
	}
	
	public function fetch_row(){
		$argfr = func_get_args();
		//$mcurrent = mysql_fetch_array($mquer, MYSQL_ASSOC);	
		$mas2 = array_values((array)$argfr[0][0]);
		$mcurrent = $mas2[$this->xnum];
		return $mcurrent;
	}
	
	public function query($req){
		//echo $req.'<br />';
		//echo '<br />->db: '.$this->db.' req: '.$req;
		$quer = ORM::for_table('', $this->db)->raw_query($req)->find_result_set();
		return $quer;
	}
	
	public function count_rows($quer){
		$num = $quer->count();
		return $num;
	}
	
	public function affected_rows(){
		//$num = mysql_affected_rows();
		return 0;
	}
	
	public function data_seek($quer, $go_0){
		//mysql_data_seek($quer, $go_0);
	}
	
	public function data_load(){
		$argdl = func_get_args();
		//ech($argdl[0]);
		if($this->mod["index"]==""){
			for ($i=$this->fetch_begin; $i<=$this->fetch_end; $i++){
				//echo $this->keymark.'	'.$i.' assoc: <br />';
				$mas1 = array_values((array)$argdl[0][$i]);
				$current = $mas1[$this->xnum];
				$curkey=$current[$this->keymark];
				$res['data'][$curkey]=$current;
				$res['param'][$i]=$curkey;
			}
		}else{
			for ($i=$this->fetch_begin; $i<=$this->fetch_end; $i++){
				//echo $i.' num: <br />';
				$mas1 = array_values((array)$argdl[0][$i]);
				$current = $mas1[$this->xnum];
				//$curkey=$current[$this->keymark];
				$res['data'][$i] = $current;
				$res['param'][$i]=$i;	
				
			}
		}
		return $res;
	}
	
	public function escape_string($datt){
		$rett = str_replace("'", "''", $datt);
		//$rett = str_replace('"', '""', $rett);
		return $rett;
	}
	
	public function insert_id(){
		$resq = $this->query('select last_insert_rowid()');
		$resn = $this->count_rows($resq);
		$resr = $this->fetch_row($resq);
		return $resr['last_insert_rowid()'];
		//ech(ORM::for_table('', $this->link)->raw_query('select last_insert_rowid()'))->find_result_set();
		//return last_insert_rowid(); 
		//return 0;
	}
	public function is_table(){
		$argit = func_get_args();
		$req='SELECT name FROM sqlite_master WHERE TYPE="table" and name="'.$argit[0].'"';
		//echo '<br />'.$req.'<br />';
		//$req='SELECT * FROM sys_urls';
		//echo $req.'<br />';
		$quer=$this->query($req);
		$num = $this->count_rows($quer);
		return $num;
		
	}
}