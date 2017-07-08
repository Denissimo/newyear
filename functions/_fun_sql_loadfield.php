<?

function loadfield($table){
	global $my;

$fields=mysql_list_fields(my_db, $table, $my);
$columns = mysql_num_fields($fields);
for ($i = 0; $i < $columns; $i++) {
    $fil[$i]=mysql_field_name($fields, $i);
}

	return $fil;
	
}
?>