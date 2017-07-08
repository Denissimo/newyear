<?
$path_root = $_SERVER['DOCUMENT_ROOT'];
include $path_root.'/include/inc_config.php';
include $path_root.'/chromephp/ChromePhp.php';

include $path_root.'/php/depo/cls/config.php'; //VTBI

include $path_root.'/idiorm-master/idiorm.php';
include $path_root.'/paris-master/paris.php';

//include $path_root.'/classes/cls_basic.php';
include $path_root.'/classes/cls_log.php';
include $path_root.'/classes/cls_xml.php';
include $path_root.'/classes/cls_tree.php';
include $path_root.'/classes/cls_content.php';
require_once $path_root.'/amazon/sdk.class.php';
include $path_root.'/classes/cls_amazon.php';
//include $path_root.'/classes/cls_db.php';
include $path_root.'/classes/cls_mysql.php';
include $path_root.'/classes/cls_my_sql.php';
include $path_root.'/classes/cls_process.php';
include $path_root.'/classes/cls_curl.php';
include $path_root.'/classes/cls_form.php';
include $path_root.'/classes/cls_sqlite.php';
include $path_root.'/classes/cls_url.php';
include $path_root.'/classes/cls_filebro.php';

//include $path_root.'/classes/cls_redis.php';
//include'/redis/autoload.php';

// include $path_root.'/include/inc_cookies.php'; - перенесено в rewrite.php, т.к. инициализация класса для работы с MySQL происходит там.
include $path_root.'/include/inc_basic.php';
include $path_root.'/include/inc_defines.php';

include $path_root.'/functions/fun_dropsess.php';
include $path_root.'/functions/fun_urls.php';
include $path_root.'/functions/fun_binary.php';
//include $path_root.'/functions/fun_security.php';
include $path_root.'/functions/fun_menu.php';
include $path_root.'/functions/fun_preg_callback.php';
include $path_root.'/functions/fun_print_r.php';
include $path_root.'/functions/fun_array2xml.php';



?>