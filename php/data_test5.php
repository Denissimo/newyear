<?
echo 'Фыва<br />';

//if ($dir = opendir('Щачло')){
if ($dir = opendir(mb_convert_encoding('попячься', 'windows-1251', 'UTF-8'))){

			while (false !== ($file = readdir($dir))){ 
				if (($file != '.') && ($file != '..')){ 
					echo mb_convert_encoding($file, 'UTF-8', 'windows-1251').'<br />';
					//echo $file.'<br />';

				$i++;
				} 
			}
}
?>