<?

//ech($form);

//$servplat = 'http://10.0.2.29:8080/axis2/services/banking?wsdl';
$servplat = 'http://10.0.31.111:8080/axis2/services/banking?wsdl';
$options = array('trace' => true);
$client = new  SoapClient($servplat, $options);

$catlist = $client->getCategoryList();
$categs = obj2arr($catlist->return->categories);

//ech($proc->sys['url']);
$extra_qty = $proc->sys['url']['extraqty'];
$base_qty = $proc->sys['url']['baseqty'];
$last = $proc->sys['url']['last'];
//echo $last;
switch($extra_qty){
	case '0':
		//$cont->debug=1;
		$catdivs = $cont->load_cont($categs, 'merchcat');
		echo $catdivs;
	break;
	
	case '1':
		if($last == 'mobile'){
			include 'php_mobile.php';
		}else{
			$cat_cols = array_flip(array_colum($categs, 'code'));
			$merchants = $categs[$cat_cols[$last]]['merchants'];
			$merdivs = $cont->load_cont($merchants, 'merchant');
			echo $merdivs;
			//ech($categs[$cat_cols[$last]]['merchants']);
		}
	break;
	
	case '2':
		echo'<script language="javascript">console.log(123);</script>';
		$merch = $client->getMerchant(array('_id'=>$last));
		$ob_mer = $merch->return->merchantInfo->template;
		$grp_mer = $ob_mer->groups;
		//$ar_mer = obj2arr($merch->return->merchantInfo->template);
		//$col_mer = array_colum($ar_mer['groups'], 'id');
		ech($ob_mer);
		$fields = $cont->buildform($grp_mer);
		
		$card =  '
 <div class="secret-code"> 
 <fieldset class="cardnumber"> 
 <label for="cardnumber">Номер карты<em class="required" title="Обязательное поле">*</em></label> 
 <span class="hint"> <dfn class="hintdescription display-none"> <b>Номер вашей банковской карты.</b></dfn> </span>  
 <input name="cardnumber" value="" maxlength="30" class="" id="cardnumber" type="text"> <p class="example">Например:&nbsp;4000&nbsp;0000&nbsp;0000&nbsp;0000</p> </fieldset> <fieldset class="valid-thru"> 
 <label for="month" id="valid-thru">VALID<em class="required" title="Обязательное поле">*</em><br>THRU</label> 
 <span class="vt-example">Month <b class="year">Year</b></span> 
 <select id="month" name="month" title="месяц"> 
 <option value="0">месяц</option> <option value="01">01</option> <option value="02">02</option> <option value="03">03</option> <option value="04">04</option> <option value="05">05</option> <option value="06">06</option> 
 <option value="07">07</option> <option value="08">08</option> <option value="09">09</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> 
 </select>&nbsp;/&nbsp;<select id="year" name="year" title="год"> 
 <option value="0">год</option> <option value="14">14</option> <option value="15">15</option> <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> 
 <option value="19">19</option> <option value="20">20</option> <option value="21">21</option> </select> 
 <span class="hint"> <dfn class="hintdescription display-none"> <b><strong>Дата окончания действия карты (VALID THRU)</strong> находится на лицевой стороне карты и указывает на <strong>месяц</strong> и <strong>год</strong> окончания срока действия карты.</b>  </dfn> </span> </fieldset> <fieldset class="cardholder"> 
 <div id="card-logo" class="default"></div> <label for="cardholder">Владелец карты<em class="required" title="Обязательное поле">*</em></label> 
 <span class="hint"> <dfn class="hintdescription display-none"> <b><strong>Укажите ваше имя</strong> так как оно указано на карте.</b> </dfn> </span> 
 <input name="cardholder" value="" maxlength="40" class="" id="cardholder" type="text"> <p class="example">Латинскими буквами, как указано на карте.</p> </fieldset> 
 <fieldset class="cvv"> <label for="cvv">CVV2/CVC2<em class="required" title="Обязательное поле">*</em></label> <input name="cvv" value="" size="6" class="" id="cvv" type="text"> <span class="hint"> 
 <dfn class="hintdescription display-none"> <b><strong>Код проверки подлинности банковской карты CVV2/CVC2</strong> указан на обратной стороне карты, в поле для подписи владельца.</b> </dfn> </span> 
 <p class="example">Введите последнюю группу цифр указанную на оборотной стороне карты.<br>Например: 123.</p> 
 </fieldset> </div> 
';

		$form1 = '
		<div class="row-fluid">
			<div class="col-md-6 col-md-offset-3">
			
				<form action="[{post}]" role="form" method="post">
				'.$fields.'
				
				'.$card.'
				
				<br /><input class="btn" type="submit" id="sendsoap" name="merchantInfo" value="Отправить">
				</form>
			</div>
		</div>
		';
		echo $form1;
		//ech($form->ob_twin);
		$form->set();
		
		//ech($cont->rules);
		//ech($grp_mer);
		
		
		
	break;
}




?>