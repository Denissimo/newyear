<?
//ech($proc->sys['url']['list'][1]);
?>

<div class="row">
	<div class="col-md-4 col-md-offset-4 shad3 h400">
	<br><br><br>
			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1">Пополнить <a href="#">Депозит</a> </div>
			</div>
			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="account" placeholder="Номер счёта" class="form-control" value="<?echo $proc->sys['url']['list'][1];?>" type="text"></div> 
			</div>
			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="number" placeholder="Номер Карты" class="form-control" value="" type="text"></div> 
			</div>
			<div class="container-fluid form-group">
				<div class="col-md-10 col-md-offset-1"><input name="owner" placeholder="Владелец карты" class="form-control" value="" type="text"></div> 
			</div>
			<div class="container-fluid form-group">
				<div class="col-md-4 col-md-offset-1"><input name="cvv" placeholder="CVV" class="form-control" value="" type="text"></div> 
				<div class="col-md-3"><input name="month" placeholder="ММ" class="form-control" value="" type="text"></div> 
				<div class="col-md-3"><input name="year" placeholder="ГГ" class="form-control" value="" type="text"></div> 
			</div>
			<div class="container-fluid form-group">
				<div class="col-md-5 col-md-offset-1"><input name="amount" placeholder="Сумма" class="form-control" value="" type="text"></div> 
				<div class="col-md-5"><button class="btn btn-primary col-md-12">Пополнить</button></div> 
			</div>

	</div>
</div>