<?
/*
Форматы автозамен
[>метка<] - замена контента
[<метка>] - замена  данных в форме
[{метка}] - замена  URL
[}метка{] - замена  ссылки

*/

class mysql{
    //protected $link;
	static $proba;
    private $server, $username, $password, $database, $list_db;
	//public $not_logged;
	//private $request, $query, $number;
	public $link, $sys, $keyfield, $keymark, $mod, $tab, $fetch_begin, $fetch_end, $tabload, $table, $db; //tabload - предварительные данные;
    
    public function __construct()
    {
		$this->server = my_host;
		$this->username = my_user;
		$this->password = my_password;
		//$this->bases['host'] = explode(' ', my_host);
		//$this->bases['user'] = explode(' ', my_user);
		//$this->bases['password'] = explode(' ', my_password); 
		//$this->bases['db'] = explode(' ', my_db);
		$this->bases = explode(' ', my_db);

		//foreach($this->bases as $akey => $aval){
			foreach($this->bases as $key => $val){
				$ind = $key;
				$this->database[$ind] = $val;
				$this->list_db[$ind] = $key;
			}			
		//}
		//ech($this->bases);
		if(!$this->db){
			//$this->db = $this->list_db[0];
			$this->db = 0;
		}
		
        //$this->server = $this->bases['host'];
        //$this->username = $this->bases['user'];
        //$this->password = $this->bases['password'];
        //$this->database = $this->bases['db'];
		$this->database = $this->bases;
		
		$this->connect();
		
		//$this->proba = "PROBA!!!";

		// Перенесено внуть connect()
		//$quer=mysql_query("SET NAMES utf8;", $this->link);
		//$quer=mysql_query("SET CHARACTER SET utf8;", $this->link);
		
		if($_SERVER["UNENCODED_URL"]){
			$this->req_uri = $_SERVER["UNENCODED_URL"];
		}else{
			$this->req_uri = $_SERVER['REQUEST_URI'];
		}
	}
	

    
    private function connect()
    {
		$this->link = mysql_connect($this->server, $this->username, $this->password);
		$qty = count($this->database);
		for($i=0; $i<$qty; $i++){
			//$this->link[$i] = mysql_connect($this->server[$i], $this->username[$i], $this->password[$i]);
			
			mysql_select_db($this->database[$i], $this->link);
			$quer=mysql_query("SET NAMES utf8;", $this->link);
			//$quer=mysql_query("SET CHARACTER SET utf8;", $this->link);
			//echo $quer.'	'.$i.' <br />';
		}
		//$quer=mysql_query("SELECT * FROM sys_urls", $this->link);
		//$num = mysql_num_rows($quer);
    }
    
    public function __sleep()
    {
        return array('server', 'username', 'password', 'db');
    }
    
    public function __wakeup()
    {
        $this->connect();
    }
	
	    public function close()
    {
		$this->link = mysql_close($this->link);
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
		//echo '<br />++++++'.$table;
		if($table){
			$this->table=$table; 
			//echo '<br />-> '.$this->table;
			//ech($this->fields);
				if(!$this->fields[$this->table]){
					$fields = mysql_list_fields($this->database[$this->db], $this->table, $this->link);
					//ech($fields);
					$columns = mysql_num_fields($fields);
					for ($i = 0; $i < $columns; $i++) {
						$fil[$this->table]['list'][$i]['field']=mysql_field_name($fields, $i);
						$fil[$this->table]['list'][$i]['type']=mysql_field_type($fields, $i);
						$fil[$this->table]['list'][$i]['flags']=mysql_field_flags($fields, $i);
						if(strpos($fil[$this->table]['list'][$i]['flags'], 'primary_key')){
							$fil[$this->table]['primary_key'] = $fil[$this->table]['list'][$i]['field']; //определяем, какое из полей - primary key
							$this->primary[$table] = $fil[$this->table]['list'][$i]['field'];
						}
						$fil[$this->table]['list'][$i]['len']=mysql_field_len($fields, $i);
					}
					//$this->form[$this->table]['end'] = '<input name="ok" type="submit" value="Готово" /></form>';
					//$this->form[$this->table]['full'].=$this->form[$this->table]['end'];
					$this->fields=$fil;
					//ech($this->fields);
					
				}
			}
		}

	public function load_key($table){
		$tab_exist = $this->is_table('sys_keyfields');
		if($tab_exist){
			$req='SELECT * FROM sys_keyfields WHERE tab="'.$table.'" LIMIT 1';
			//echo '<br />'.$req;
			$quer=mysql_query($req, $this->link);
			if(mysql_num_rows($quer)>0){
				$kf=mysql_result($quer, 0, "keyfield");
				$this->keyfield[$table]=$kf;
			}
			//echo $this->keyfield[$table];
		}
	}
	
	public function fetch_row($mquer){
		$mcurrent = mysql_fetch_array($mquer, MYSQL_ASSOC);	
		return $mcurrent;
	}
	
	public function test(){
		echo "TEST!!";
	}
	
	public function query($req){
		//echo $req.' DB:'.$this->database[$this->db].'<br />';
		mysql_select_db($this->database[$this->db], $this->link);
		//echo ' ::'.$this->link.':: ';
		$quer = mysql_query($req, $this->link);
		//echo $quer.'<<<br />';
		return $quer;
	}
		
	public function affected_rows(){
		$num = mysql_affected_rows();
		return $num;
	}
	
	public function count_rows($quer){
		//ech($quer);
		$num = mysql_num_rows($quer);
		//echo '<br />NUM: '.$num;
		return $num;
	}
	
	public function escape_string($datt){
		if(is_array($datt)){
			foreach($datt as $key => $value){
				$this->escape_string($value);
			}
		}else{
			$rett = mysql_real_escape_string($datt);
		}
		return $rett;
	}
	
	public function data_seek($quer, $go_0){ //necsry for mod['range']
		mysql_data_seek($quer, $go_0);
	}
	
	public function data_load(){
		$argdl = func_get_args();
		if($this->mod["index"]==""){
			for ($i=$this->fetch_begin; $i<=$this->fetch_end; $i++){
				$current=$this->fetch_row($argdl[0]);	
				$curkey=$current[$this->keymark];
				$res['data'][$curkey]=$current;
				$res['param'][$i]=$curkey;
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
		return mysql_insert_id(); 
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