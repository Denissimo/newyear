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
    //echo "Successfully connected to Redis";
}
catch (Exception $e) {
    echo "Couldn't connected to Redis";
    echo $e->getMessage();
}

if($_GET['action']=='set'){
	$redis->set($_GET['index'], $_GET['content']);
	echo 'index: '.$_GET['index'].' content: '.$_GET['content'];
}

if($_GET['action']=='mset'){
	$redis->mset($_GET['index1'], $_GET['content1'], $_GET['index2'], $_GET['content2']);
	echo 'index1: '.$_GET['index1'].' content1: '.$_GET['content1'].' index2: '.$_GET['index2'].' content2: '.$_GET['content2'];
}

if($_GET['lookfor']){
	$value = $redis->get($_GET['lookfor']);
	var_dump($value);
	//echo ($redis->exists("Santa Claus")) ? "true" : "false";
	echo ($redis->exists("asdf")) ? "true" : "false"; //шщет "asdf" в индексах
}

?>