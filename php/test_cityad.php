<? //файл не будет работать отдельно от CMS

class treecount{ //подсчёт сумм в дереве (рекурсия)
	public $tree, $arr, $field, $sumval;
	public function hours_count(){
		$args = func_get_args();
		foreach($args[0] as $key=>$val){
			$this->sumval[$key] += $this->arr[$key][$this->field];
			if(is_array($val)){
				$this->sumval[$key] += $this->hours_count($val);
			}
			$ret+=$this->sumval[$key];
		}
		return $ret;
	}
}

// В разработанную мной CMS входит, в числе прочего, класс $proc, содержащий в себе методы загрузки данных из MySQL и SQLite
// свойство mod содержит атрибуты, сообщающие классу особенности загрузки данных: есть или нет непосредственно SQL запрос, если нет, если нет, то по какому полю мортировать, все ли поля загружать, и есть ли зависимоть "родитель->дочь

$proc->mod['parent'] ='parent->id'; // указываем какие поля связаны как родитель-дочь
$proc->fetch('test_tbl'); // загружаем таблицу

//получаем надор совйств, содержащий данные из таблицы
// $proc->tabdata - массив с данными
// $proc->tab свойства таблицы (кол-во строк, первичный ключ, поле, назначенное ключевым в настройках CMS)
// $proc->tabbranch - дерево
// $proc->tablevel - уровни вложенности

$users = $proc->tabdata['test_tbl'];
$qty = $proc->tab['test_tbl']['qty'];

$treecount = new treecount();
$treecount->tree = $proc->tabbranch['test_tbl'];
$treecount->arr = $proc->tabdata['test_tbl'];
$treecount->field = 'value';
$res = $treecount->hours_count($treecount->tree, 0);

//строим табличку

$tab = '<table class="table shad1">';
$tab.='<tr><th>ID</th><th>Вложенность</th><th>Родит.</th><th>Имя пользователя</th><th >Емайл</th><th>Часы</th><th >Часы (доч)</th></tr>';
foreach($proc->tablevel['test_tbl'] as $key=>$val){
	$email_valid = preg_match('/^([0-9a-zA-Z]+[-._+&amp;])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$/', $users[$key]['email']); //валидация емайлов
	if($email_valid){
		$email = '<a href="mailto:'.$users[$key]['email'].'">'.$users[$key]['email'].'</a>';
	}else{
		$email = $users[$key]['email'];
	}
	$arrows = str_repeat('<i class="icon-arrow-right icon-garden"></i>', $val);
	$tab.='<tr class="datarow" rel="r'.$key.'"><td>'.$key.'</td><td>'.$arrows.'</td><td>'.$users[$key]['parent'].'</td><td>'.$users[$key]['name'].'</td><td >'.$email.'</td><td>'.$users[$key]['value'].'</td><td >'.($treecount->sumval[$key]-$users[$key]['value']).'</td></tr>';
	$div.='<div class="tex" id="r'.$key.'">'.$users[$key]['tex'].'</div>';
}
$tab .= '</table>';

//выводим

echo '<div class="row">';
echo '<div class="span8">'.$tab.'</div>';
echo '<div class="span4">'.$div.'</div>';
echo '</div>';

?>