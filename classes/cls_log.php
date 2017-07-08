<?
/*
Форматы автозамен
[>метка<] - замена контента
[<метка>] - замена  данных в форме
[{метка}] - замена  URL
[}метка{] - замена  ссылки

*/

class log{
   
    public function __construct(){}
	static public function log(){
		$arg = func_get_args();
		//echo '<div class="console_unit"><span class="glyphicon glyphicon-star pointer" aria-hidden="true">'.$arg[0].'</span><div class="console_data">';
		foreach($arg as $key=>$val){
			//echo '<pre>';
			//print_r($val);
			//echo '</pre>';
		}
		//echo '</div></div>';
	}
	

}