<?php
/**	---------------------------------------
 **	Отправка SMS с помощью PHP
 **	Источник: live-code.ru
 **	---------------------------------------
 **/
// данные для подключения к smsc.ru
$Connect['login'] = "Denissimo";		// Логин
$Connect['passw'] = "19741974";	// Пароль
$Connect['charset'] = "utf-8";		// Кодировка
// Текст сообщения
$Text = "Привет!";
// Получаем список номеров для отправки SMS
$List = file("number.txt");
foreach ($List as $k) {
	$SendSMS = file_get_contents("http://smsc.ru/sys/send.php?login={$Connect['login']}&psw={$Connect['passw']}&list={$k}:{$Text}&charset={$Connect['charset']}");
	echo "Номер: {$k} ".$SendSMS."
";
}
?>