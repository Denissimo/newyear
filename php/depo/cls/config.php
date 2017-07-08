<?php
date_default_timezone_set('Europe/Moscow');
define("TYM_PATH",$_SERVER['DOCUMENT_ROOT'].'/php/depo/cls/src/');
define("MOBI_SERIVCE_URL","http://10.0.31.111:8080/axis2/services/banking.bankingHttpSoap12Endpoint/");
define("MOBI_WSDL_LOCATION","http://10.0.31.111:8080/axis2/services/banking?wsdl");
//echo dirname(__FILE__);
require_once(TYM_PATH.'log4php/Logger.php');
Logger::configure(dirname(__FILE__).'/config.xml');
$logger=Logger::getRootLogger();
?>
