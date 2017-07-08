<?
if($_SESSION['logged'] and $_SESSION['comeback']){
	$proc->redirect($_SESSION['comeback']);
}elseif($_SESSION['logged']){
	$proc->redirect('/');
}
//$_SESSION['username'] = 'bushuev';
//$_SESSION['username'] = 'den';
//unset($_SESSION);
//print_r($_SESSION);
?>
<br /><br /><br />
<div class="row">
	<div class="col-md-4 col-md-offset-4 shad3 h400">
	<br /><br /><br /><br /><br /><br />
		<form action="[{post}]" method="post">
			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="username" placeholder="Логин" class="form-control" value="den" type="text" /></div> 
			</div>

			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="password" placeholder="" class="form-control" value="123111" type="password" /></div> 
			</div>

			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="userlogin" class="col-md-8 col-md-offset-2 btn btn-primary" value="Вход" type="submit" /></div> 
			</div>
		</form>
	</div>
</div>