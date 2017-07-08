<div class="row">
	<br /><br /><br />
</div>
<div class="row">

	<div class="col-md-8 col-md-offset-2 shad3">
		<div class="marhor20">
			<form role="form" action="[{handymenu}]" method="post">
				<div class="form-group">
				<label >Счёт</label>
					<select class="form-control">
						<option>Счет 40817978202000002119 (EUR)</option>
						<option>Счет 40817810302000000658 (RUB)</option>
						<option>Счет 40817978202000002119 (USD)</option>
						<option>Счет 40817810302000000658 (GBP)</option>
					</select>
				</div>
				
				<div class="form-group">
				<label >Провайдер</label>
					<select multiple class="form-control">
						<option>Akado</option>
						<option>Corbina</option>
						<option>NetByNet</option>
						<option>Netorn</option>
					</select>
				</div>
				
			  <div class="form-group">
				<label for="exampleInputEmail1">Номер счёта</label>
				<input type="text" class="form-control" id="mobilephone"  placeholder="0002581">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Сумма</label>
				<input type="text" class="form-control" id="exampleInputPassword1" placeholder="500">
			  </div>
			  <button type="submit" class="btn btn-info">Оплатить</button>
			</form>
		</div>
	</div>
	

	
</div>
<div class="row">
	<br /><br /><br /><br />
</div>

<?
//echo 'Тут будет <b>КОНТЕНТ</b>';
//ech($_SESSION);
$func = 'assign';
$a['test1'] = 'Проба 01';
$a['test2'] = 'Проба 02';

$d['test1'] = '000000';
$d['test2'] = '222222';

$e =&$d;
//ech($e);
$e['test2'] = 55;
ech($e);
//ech($d);
$b = $func($a);
//$b = json_encode($a);
//ech($b);
$s = 'testmode';
$proc->$s = 21;

//$proc->tt = 'testmode';
//$proc->$tt = '88';
//$proc->testmode = 14;
ech($proc->testmode);




echo 'testvar: '.$testvar;

?>