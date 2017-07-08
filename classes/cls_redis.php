<?
include"/redis/autoload.php";
//Predis\Autoloader::register();
try {
    $redis = new Predis\Client();
/*
    $redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => "127.0.0.1",
        "port" => 6379));
*/
    //$_SESSION['sys_tmp']['message'] = "Successfully connected to Redis";
}
catch (Exception $e) {
	//$_SESSION['sys_tmp']['message'] = $e->getMessage();
    //echo "Couldn't connected to Redis";
    //echo $e->getMessage();
}
?>