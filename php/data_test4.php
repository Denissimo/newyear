<?
ech($conf_db['mylocal']);
$nc = new mysql_($conf_db['mylocal']);
$ur = $nc->is_table('sys_urls'); 
ech($ur);

function foo(&$var) { }

foo($a); // $a создана и равна null

$b = array();
foo($b['b']);
var_dump(array_key_exists('b', $b)); // bool(true)

$c = new StdClass;
foo($c->d);
var_dump(property_exists($c, 'd')); // bool(true)

ech($_SESSION);
/*
$bro = new filebro($proc);
$res_files = $bro->scanfold();
//ech($proc->sys['url']);
$etalon = 'type=Images&CKEditor=editor1&CKEditorFuncNum=3&langCode=ru';
$qu = 'folder=фыва&type=Images&CKEditor=editor1&CKEditorFuncNum=3&langCode=ru';
echo $qu.'<br />';
$qu = preg_replace('/^folder=[а-яА-Яa-zA-Z0-9_\-\s\/%]+\&/u', '', $qu);
$qu = preg_replace('/\&folder=[а-яА-Яa-zA-Z0-9_\-\s\/%]+$/u', '', $qu);
$qu = preg_replace('/\&folder=[а-яА-Яa-zA-Z0-9_\-\s\/%]+\&/u', '&', $qu);
//$qu = preg_replace('/\&\&/', '&', $qu);
echo $qu.'<br />';
if($qu == $etalon){
	echo '<font color="#339900"><b>OK</b></font>';
}

ech($res_files);
*/
/*
$dirr = scandir('..');
echo '<pre>';
print_r($dirr);
echo '</pre>';
*/
/*
$input['asdf'] = 'qwerty';
$input['ghjk'] = '&nbsp;';



$input2['qaz'] = 'sdfh';
$input2['wsx'] = 'xgnn';



echo $resul;
echo '<br />';
echo $resul2;
*/


/*
echo chr(32);
$i=0;
if ($dir = opendir('imag'))  
{       
   while (false !== ($file874 = readdir($dir))){ 
      if (($file874 != '.') && ($file874 != '..')){  
		  if (is_file($file874)){ 
			 //echo $file874.'<br />'; 
			 $result_files.=($file874.'<br />');
		  }else{
			 //echo $i.'+++	'.$file874.'<br />';
			 $result_folders.=($file874.'<br />');
		  }
		  $i++;
      } 
   } 
closedir($dir); 
} 
//echo 'ж';
$result_folders = mb_convert_encoding($result_folders, "utf-8", "windows-1251");
$result_files = mb_convert_encoding($result_files, "utf-8", "windows-1251");

echo '<b>'.$result_folders.'</b>';
echo $result_files;
//echo mb_convert_encoding($result987, "utf-8", "windows-1251");
//echo mb_strcut ($result987, 0, 1314);
//echo strlen($result987);
//echo $result987;
*/

?>