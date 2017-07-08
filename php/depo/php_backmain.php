<?

echo '
<div class="row">
<div class="col-md-2 col-md-offset-2 shad3">
<a href="[{reg}]">Новый клиент</a>
</div>
<div class="col-md-2 col-md-offset-1 shad3">
<a href="[{userlist}]">Список Клиентов</a>
</div>

<div class="col-md-2 col-md-offset-1 shad3">
<a href="[{enter}]">Авторизация</a>
</div>

</div>
';

$proc->db->load_field("data_user");
//ech($proc->db->fields);

/*
$mysqli = new my_sql(my_host, my_user, my_password, my_db);
//$mysqli->def_query();
if (mysqli_connect_errno()) { 
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 

//$mysqli->query('SET NAMES utf8');

if ($result = $mysqli->query('SELECT * FROM data_user')) { 

    while( $row = $result->fetch_assoc() ){ 
        //ech($row);
    } 
    $result->close(); 
}
*/
//$res = $mysqli->load_field('zz');
//ech($res);
//ech($mysqli);

?>