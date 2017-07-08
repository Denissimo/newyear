<?

$a['HTTP_X_REQUESTED_WITH'] = $_SERVER['HTTP_X_REQUESTED_WITH'];
$a['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];
$a['REQUEST_URI'] = $_SERVER['REQUEST_URI'];
$a['FORMDATA'] = $_POST;
$b = &$a;
$b = array('a'=>'123');
print_r(json_encode($a));


?>