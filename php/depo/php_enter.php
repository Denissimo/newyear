<?

$adtrack = $_GET['tracker'];
if0($adtrack, 1);

$ad_id = $_GET['ad_id'];
if0($ad_id, 1);

$prod_id = $_GET['prod_id'];
if0($prod_id, 1);

//echo preg_match('/[0-9]{10}/', '79057107350');
$act = 'echo "Проба";';
//$res = eval($act);
//ech($res);


//$test=2;
//echo '<br />test:'.$test;
echo '
<div class="row">
	<div class="col-md-4 col-md-offset-4 shad3 h400">
	<br /><br /><br /><br /><br /><br />
		<form action="[{post}]" method="post">
			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="login" placeholder="Логин" class="form-control" value="79057107350" type="text" /></div> 
			</div>

			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="pin" placeholder="Пароль" class="form-control" value="" type="password" /></div> 
			</div>

			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="enter" class="col-md-8 col-md-offset-2 btn btn-primary" value="Вход" type="submit" /></div> 
			</div>
		</form>
	</div>
</div>
';
?>