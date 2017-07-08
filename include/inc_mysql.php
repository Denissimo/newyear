<?

$my_host = "ddrozdetskiy.narvac.office";

$my_user = "root";

$my_password = "root";

$my = mysql_connect($my_host, $my_user, $my_password);

$myb=mysql_select_db("totem", $my);

//$myr=mysql_query("SET NAMES 'cp1251'");  
//$myr=mysql_query("SET CHARACTER SET 'cp1251'"); 
//echo $myb."<br>";

?>