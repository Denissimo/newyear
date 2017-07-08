<?


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://hst-api.wialon.com/wialon/ajax.html?svc=core/login&params={"user":"amtest","password":"testtest"}');
//curl_setopt($curl, CURLOPT_URL, 'https://hst-api.wialon.com/wialon/ajax.html?svc=core/login&params={"user":"wialon_test","password":"test"}');
//curl_setopt($curl, CURLOPT_URL, 'https://kit-api.wialon.com/wialon/ajax.html?svc=core/login&params={"user":"kitdemo","password":"kitdemo"}');
//curl_setopt($curl, CURLOPT_URL, 'http://flow/php/test_testpost3.php');
//curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);// разрешаем перенаправление
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
//curl_setopt($curl, CURLOPT_POSTFIELDS, "a=4&b=7");
curl_setopt($curl, CURLOPT_POSTFIELDS, "submit=1");
$cout = curl_exec($curl);
echo '<br />curl: '.$curl;
$arr = json_decode($cout);
echo gettype($arr);
ech($arr->eid);
/*
curl_close($curl);
$curl = curl_init();
*/

$url4 = 'http://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params={"id":868204003939690,"flags":1025}&sid='.$arr->eid;
ech($url4);
curl_setopt($curl, CURLOPT_URL, $url4);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, "submit=1");
$cout4 = curl_exec($curl);
$arr4 = json_decode($cout4);
ech($arr4);


$url2 = 'http://hst-api.wialon.com/wialon/ajax.html?svc=core/search_item&params={"id":868204003939690,"flags":1025}&sid='.$arr->eid;
echo '&para';
ech($url2);
curl_setopt($curl, CURLOPT_URL, $url2);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, "submit=1");
$cout2 = curl_exec($curl);
$arr2 = json_decode($cout2);
ech($arr2);


curl_setopt($curl, CURLOPT_URL, 'http://hst-api.wialon.com/wialon/ajax.html?svc=core/logout&params={}&sid='.$arr->eid);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, "submit=1");
$cout3 = curl_exec($curl);
$arr3 = json_decode($cout3);
ech($arr3);


curl_close($curl);


?>
<div id="mon" style="background:#FFFF00">

</div>
<form method='post' action='http://hst-api.wialon.com/wialon/ajax.html?svc=core/login&params={"user":"amtest","password":"testtest"}'>
    <input type="submit" value="АДЕВАЖ">
</form>
<!--
<script language="javascript">
$.post('https://hst-api.wialon.com/wialon/ajax.html?svc=core/login&params={"user":"amtest","password":"testtest"}', function(data){
  alert("Data Loaded: " + data);
}, function(){
  alert("hui");});
$('#mon').html('хуй');

</script>
-->