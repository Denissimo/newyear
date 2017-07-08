<?
function dat_sel($datsel){
//$loc_ru = setlocale ( LC_ALL , 'ru_RU@euro' , 'ru_RU' , 'ru' , 'RUS' );
//echo "На этой системе русская локаль имеет имя '$loc_ru'" ; 
	$dats='<select name="delivdate"><option value="">Выберите дату.</option>';
	for($i=1; $i<30; $i++){
		$datr = strftime("%d	%B (%A)", time()+60*60*24*$i);
		//$datr = iconv('ISO-8859-5',"UTF-8", $datr);
		$datb=strftime("%Y%m%d",mktime(0,0,0,date("m"),date("d"),date("y"))+$i*86400);
		
		if($datb==$datsel){
			$dats.='<option selected="selected" value="'.$datb.'">'.$datr.'</option>';
		}else{
			$dats.='<option value="'.$datb.'">'.$datr.'</option>';
		}
	}	
	$dats.='</select>';
	return $dats;
}
?>