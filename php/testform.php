<?
echo 'TEST';
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=plat', $user, $pass);
$sel = $dbh->query('SELECT * from sys_urls');
/*
foreach($dbh->query('SELECT * from sys_urls') as $row) {
        ech($row);
    }
*/	
ech($sel);

ech($mysqli);

?>

<!--
<div class="row">
	<div class="col-md-4 green">
	<form action= "[{post}]" method="POST">
	<input type="hidden" name="login" value="SH">
	<input type="hidden" name="pass" value="3855359">
	<input type="submit" name="testpsologin" value = "cURL">
	</form>
	</div>
	
	<div class="col-md-4 blue">
	<form action= "[{post}]" method="POST">
	<input type="text" name="login" value="9261234215">
	<input type="hidden" name="pass" value="YVGM8D">
	<input type="submit" name="testplatlogin" value = "SOAP">
	</form>
	</div>
	
	<div class="col-md-4 red">
	<form action= "[{post}]" method="POST">
	<input type="hidden" name="login" value="9261234215">
	<input type="hidden" name="pass" value="YVGM8D">
	<input type="submit" name="testplatmerch" value = "SOAP">
	</form>
	</div>
	
</div>	


<div class="row">
	<div class="col-md-12 red">
	<form action= "http://pso_test.2tbank.ru:2222/PSO.svc/json/PSOCabinAuth/" method="POST">
	<input type="hidden" name="login" value="SH">
	<input type="hidden" name="pass" value="3855359">
	<input type="submit" name="tespsologin" value = "Адеваж">
	</form>
	
	</div>
</div>
<div class="row">
	<div class="col-md-12 blue">
<p id="p1">
	<?
		ech($_SESSION);
	?>
	</p>
	</div>
</div>

<div id="div1" style="width:300px; height:50px; background:#CCFFFF;float:left;display:inline;">
<form action= "http://88.198.1.66:5555/api/auth/" method="POST">
<input type="text" name="username" value="LOGIN">
<input type="text" name="pswd" value="PASSWORD">
<input type="submit" name="sub" value="Авторизация">
</form>
</div>

<div id="div2" style="width:180px; height:50px; background:#FFCCFF;float:left;display:inline;">
<form action= "http://88.198.1.66:5555/api/auth/info/" method="POST">
<input type="submit" name="sub" value="Инфо по авторизации">
</form>
</div>

<div id="div3" style="width:150px; height:50px; background:#FFCCCC;float:left;display:inline;">
<form action= "http://88.198.1.66:5555/api/transactions/accounts/" method="POST">
<input type="submit" name="sub" value="Список счетов">
</form>
</div>

<div id="div4" style="width:150px; height:50px; background:#FFFFCC;float:left;display:inline;">
<form action= "[{testgetpost}]" method="POST">
<input type="submit" name="sub" value="Проба GET/POST">
</form>
</div>

<div id="div5" style="width:120px; height:50px; background:#CCFFCC;float:left;display:inline;">
<form action= "[{testgetpost}]" method="POST">
<input type="submit" id="tes01" name="sub" value="AJAX (прямой)">
</form>
</div>
<div id="div6" style="width:120px; height:50px; background:#CCCCFF;float:left;display:inline;">
<form action= "[{testajpost}]" method="POST">
<input type="submit" id="tes02" name="testpsologin" value="AJAX &#8375;" style="font-family: Arial Rubl Sign;">
</form>
</div>

-->

<!--
<div id="d1" style="width:100px;height:100px;background:red;">1</div>
<div id="d2" style="width:100px;height:100px;background:green;">2</div>
-->

<!--
<form action= "http://88.198.1.66:5555/api/transactions/" method="POST">
<input type="text" name="account_id" value="909">
<input type="text" name="date_from" value="01.01.2000">
<input type="text" name="date_to" value="01.09.2014">
<input type="submit" name="sub" value="Список операций">
</form>


<form action= "http://88.198.1.66:5555/api/auth/logout/" method="POST">
<input type="submit" name="sub" value="Logout">
</form>

<form action= "http://88.198.1.66:5555/api/auth/" method="POST">
<input type="text" name="username" value="LOGIN">
<input type="text" name="pswd" value="PASSWORD">
<input type="submit" name="sub" value="123">
</form>
-->