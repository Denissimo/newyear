<?
include 'idiorm.php';
ORM::configure('sqlite:./test03.db');

class User extends Model {
public static $_table = 'sys_urls';
public static $_id_column = 'row_id';
}

$chpu = Model::factory('User')->where('template', 'test')->find_one();

//$db = ORM::get_db();
//$db->for_table('sys_urls')->where('template="test"')->find_one();
//$db->exec('select * from "sys_urls" where template="test"');
//$req = ORM::for_table('sys_urls')->select('*')->where('template', 'test')->find_many();
/*
class tesst extends ORM{
	
}
$req = new tesst;
$req->for_table('sys_urls')->select('*')->where('template', 'test')->find_many();
*/
echo'<pre>';
print_r($chpu);//['_data']);
echo'</pre>';
?>