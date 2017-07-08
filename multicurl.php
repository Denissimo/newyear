<?
// создаем оба ресурса cURL

$ch1 = curl_init();
$ch2 = curl_init();

// устанавливаем URL и другие соответствующие опции

curl_setopt($ch1, CURLOPT_URL, "http://www.php.net/");
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_URL, "http://www.php.net/");
curl_setopt($ch2, CURLOPT_HEADER, 0);


//создаем набор дескрипторов cURL
$mh = curl_multi_init();
//echo $mh.'-<br />';;
//добавляем два дескриптора
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);

$active = null;
//запускаем дескрипторы
do {
	//echo CURLM_CALL_MULTI_PERFORM.'+<br />';
    $mrc = curl_multi_exec($mh, $active);
	//echo $mrc.'+<br />';
} while ($mrc == CURLM_CALL_MULTI_PERFORM);
$i=0;
while ($active && $mrc == CURLM_OK) {
	$i++;
    if (curl_multi_select($mh) != -1) {
        do {
            $mrc = curl_multi_exec($mh, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
    }
	
/*	if($i>200000){
		break;
	}
	*/
}
echo '$active: '.$active.', $mrc: '.$mrc.' -> '.$i.'<br />';
//закрываем все дескрипторы
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);

curl_multi_close($mh);

?>