<?

echo '
<div class="row">
	<div class="col-md-4 col-md-offset-4 shad3 h400">
	<br /><br /><br /><br /><br /><br />
		<form action="[{cabin}]" method="post">
			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="login" placeholder="Логин" class="form-control" value="" type="text" /></div> 
			</div>

			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="pin" placeholder="Пароль" class="form-control" value="" type="password" /></div> 
			</div>
<!--
			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="enter" class="col-md-8 col-md-offset-2 btn btn-primary" value="Вход" type="submit" /></div> 
			</div>
-->
			
			
		</form>
		<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><a href="[{requests}]"><button name="enter" class="col-md-8 col-md-offset-2 btn btn-primary" value="Вход">Войти</button></a></div> 
			</div>
	</div>
</div>
';
?>