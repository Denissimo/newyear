<?
/*
Форматы автозамен
[>метка<] - замена контента
[<метка>] - замена  данных в форме
[{метка}] - замена  URL
[}метка{] - замена  ссылки

*/

class mysql2{
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
		//$quer=mysqli_query("SET NAMES utf8;", $this->link);
		//$quer=mysqli_query("SET CHARACTER SET utf8;", $this->link);
		
		if($_SERVER["UNENCODED_URL"]){
			$this->req_uri = $_SERVER["UNENCODED_URL"];
		}else{
			$this->req_uri = $_SERVER['REQUEST_URI'];
		}
	}
	

    
    private function connect()
    {
		//echo $this->server;
		$this->link = mysqli_connect($this->server, $this->username, $this->password);
		//ech($this->link);
		$qty = count($this->database);
		//ech($this->database);
		for($i=0; $i<$qty; $i++){
			//$this->link[$i] = mysqli_connect($this->server[$i], $this->username[$i], $this->password[$i]);
			
			mysqli_select_db($this->link, $this->database[$i]);
			$quer=mysqli_query($this->link, "SET NAMES utf8;");
			//$quer=mysqli_query("SET CHARACTER SET utf8;", $this->link);
			//echo $quer.'	'.$i.' <br />';
		}
		//$quer=mysqli_query("SELECT * FROM sys_urls", $this->link);
		//$num = mysqli_num_rows($quer);
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
		$this->link = mysqli_close($this->link);
    }
	public $primary;
	public function load_field($table){
			$res = $this->query('SELECT * FROM "data_user"', MYSQLI_USE_RESULT);
			return $res;
		}

	public function load_key($table){
		$tab_exist = $this->is_table('sys_keyfields');
		if($tab_exist){
			$req='SELECT * FROM sys_keyfields WHERE tab="'.$table.'" LIMIT 1';
			//echo '<br />'.$req;
			$quer=mysqli_query($req, $this->link);
			if(mysqli_num_rows($quer)>0){
				$kf=mysqli_result($quer, 0, "keyfield");
				$this->keyfield[$table]=$kf;
			}
			//echo $this->keyfield[$table];
		}
	}
	
	public function fetch_row($mquer){
		$mcurrent = mysqli_fetch_array($mquer, mysqli_ASSOC);	
		return $mcurrent;
	}
	
	public function test(){
		echo "TEST!!";
	}
	
	public function query($req){
		//echo $req.' DB:'.$this->database[$this->db].'<br />';
		mysqli_select_db($this->link, $this->database[$this->db]);
		//echo ' ::'.$this->link.':: ';
		$quer = mysqli_query($this->link, $req);
		//echo $quer.'<<<br />';
		return $quer;
	}
		
	public function affected_rows(){
		$num = mysqli_affected_rows();
		return $num;
	}
	
	public function count_rows($quer){
		$num = mysqli_num_rows($quer);
		return $num;
	}
	
	public function escape_string($datt){
		if(is_array($datt)){
			foreach($datt as $key => $value){
				$this->escape_string($value);
			}
		}else{
			$rett = mysqli_real_escape_string($datt);
		}
		return $rett;
	}
	
	public function data_seek($quer, $go_0){ //necsry for mod['range']
		mysqli_data_seek($quer, $go_0);
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
		return mysqli_insert_id(); 
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