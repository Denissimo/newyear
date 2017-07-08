<?
//$mas = array('first_name'=>'Антуан', 'middle_name'=>'де Сент', 'last_name'=>'Экзюпери');
//$res = $proc->put_array($mas, 'data_clients');
//$quer = 'INSERT INTO data_clients (first_name, middle_name, last_name, phone) VALUES("Антуан", "де Сент", "Экзюпери", )';
//$res = $proc->db->query($quer);
//ech($res);
$adtrack = $_GET['tracker'];
if0($adtrack, 1);

$ad_id = $_GET['ad_id'];
if0($ad_id, 1);

$prod_id = $_GET['prod_id'];
if0($prod_id, 1);



//$test=2;
//echo '<br />test:'.$test;
echo '
<div class="container-fluid">
<div class="col-md-6 col-md-offset-3 shad1">
<form action="[{post}]" method="post">
	<input type="hidden" name="adtrack" value="'.$adtrack.'">
	<input type="hidden" name="ad_id" value="'.$ad_id.'">
	<input type="hidden" name="prod_id" value="'.$prod_id.'">
	<div class="form-group">
	<div class="container-fluid" align="center"><div class="col-md-12 formhead">
		<b>Заполните, пожалуйста, регистрационную форму.</b>
	</div></div>
	<div class="container-fluid form-group">
		<div class="col-md-2 padt5"><label for="first_name" >Имя</label></div>
		<div class="col-md-10"><input type="text" name="first_name" placeholder="Иван" class="form-control" value="[<first_name>]" /></div>
		
	</div>
	<div class="container-fluid form-group">
		<div class="col-md-2 padt5"><label for="middle_name" >Отчество</label></div>
		<div class="col-md-10"><input type="text" name="middle_name" placeholder="Иванович" class="form-control" value="[<middle_name>]"  /></div>
	</div>
	<div class="container-fluid form-group">
		<div class="col-md-2 padt5"><label for="last_name" >Фамилия</label></div>
		<div class="col-md-10"><input type="text" name="last_name" placeholder="Иванов" class="form-control" value="[<last_name>]"  /></div>
	</div>
	
	<div class="container-fluid form-group">
		<div class="col-md-2 padt5"><label for="phone" >Телефон</label></div>
		<div class="col-md-4"><input type="text" name="phone" placeholder="" class="form-control" value="[<phone>]" /></div>
		
		<div class="col-md-2 padt5" align="right"><label for="email" >Е-майл&nbsp;</label></div>
		<div class="col-md-4"><input type="text" name="email" placeholder="" class="form-control" value="[<email>]" ></div>
	</div>

	<div class="container-fluid" align="center"><div class="col-md-12 formhead">
		Все поля обязательны для заполнения<br /><br />
		<input type="submit" name="regclient" class="btn btn-primary" value="Отправить" />
	</div></div>
	
	
	</div>
</form>
</div>
</div>
';
?>