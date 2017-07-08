<?
header('Content-type: text/html; charset=utf-8');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>[>title<]</title>
<meta name="robots" content="index,follow">
<meta name="keywords" content="[>keywords<]">
<meta name="description" content="[>description<]">
<link rel="icon" href="/favicon.ico" type="image/x-icon">


<link rel="stylesheet" href="/css/bootstrap3/css/bootstrap.css" />
<link rel="stylesheet" href="/css/jquery_1_10/jquery-ui-1.10.4.custom.css" />

<link rel="stylesheet" href="/css/bootsnew_ent.css" />
<link rel="stylesheet" href="/css/basic_ent.css" />
<link rel="stylesheet" href="/css/basic2t.css" />
<!--
<link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
<link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
-->
<script src="/js/jquery_1_10/jquery-1.10.2.js"></script>
<script src="/js/jquery_1_10/jquery-ui-1.10.4.custom.js"></script>
<script src="/css/bootstrap3/js/bootstrap.js"></script>
<script src="/js/lightbox.js"></script>
<script src="/js/row.js"></script>



<script>
	$(function(){
		$("#idDepositPeriod").change(function(){
			var depends={
				2:9
				,3:9.1
				,4:9.4
				,5:9.7
				,6:10.1
				,7:10.1
				,8:10.1
				,9:10.5
				,10:10.5
				,11:10.5
				,12:11.14
			};
			$("#idDependsOnPeriod").html(depends[$(this).val()]+"%");
		});
	})
</script>
	
</head>

<body>
<div class="separator">&nbsp;</div>
<div class="container-fluid">
	<div class="marhor10">
		<nav class="navbar navbar-yellow" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="/"><img src="/images/2tlogo-new-black.png" /></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">unit 1<b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="[{test01}]">0</a></li>
						<li><a href="[{test02}]">2</a></li>
						<li><a href="[{test03}]">3</a></li>
						<li><a href="[{test01}]">4</a></li>
						<li><a href="#">5</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
						<li class="divider"></li>
						<li><a href="#">One more separated link</a></li>
					  </ul>
					</li>
					<li [#test01#]><a href="[{test01}]">unit 1</a></li>
					<li [#test02#]><a href="[{test02}]">unit 2</a></li>
					<li [#test03#]><a href="[{test03}]">unit 3</a></li>
					<li [#test01#]><a href="[{test01}]">unit 4</a></li>

				  </ul>

				  <ul class="nav navbar-nav navbar-right">
					<li><a href="#">Link</a></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
					  </ul>
					</li>
				  </ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>


		<div class="row">
			<div class="col-md-12 bcrumb">
				<ol class="breadcrumb col-md-10 col-md-offset-2">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Library</a></li>
				  <li class="active">Data</li>
				</ol>  
			</div>
		</div>


		<div class="container-fluid">
			<div class="row shad2 headers">
				<div class="col-md-12">
				<table width="100%">
					<tr>
						<td><a href="#ttb-menu" data-ajax="false" style="color:#000000; display:inline-block;"><span class="glyphicon glyphicon-align-justify fa fa-bars" style="color:#fa9a35; display:inline-block;"></span></a></td>
						<td><a href="http://2tbank.ru" target="blank"><img data-inline="true" alt="2ТБанк" src="/img/2t-logo.small.png"/></a></td>
						<td align="right"><a id="tt-user" href="#" data-position="right" class="popuper" data-ref="#authentication" data-position-to="window" data-transition="pop"><i class="lIcon fa fa-user"></i>Пользователь</a></td>
						<td align="right"><a id="tt-logout" href="#" data-position="right"><i class="lIcon fa fa-sign-out"></i>Выход</a></td>
					</tr></table>
				</div>
			</div>
		</div>

		<div class="separator">&nbsp;</div>
		
		<div class="container-fluid">
			<div class="row shad2">
				<div class="col-md-12">
					<div class="panel panel-warning marhor5 row">
						<div class="panel-heading">
							Личное пространство
						</div>
						<div class="row">
							<div class="col-md-6"><div class="shad3">
							
								<h3>Мои счета</h3>
								<h4>2014г.</h4>
								<table id="tt-accounts">

								</table>
								<h3>Мои карты</h3>
								<table  id="tt-cards">

								</table>
							</div></div>
							
							<div class="col-md-6"><div class="shad3">
									<h3>Последние операции</h3>
										<h4>2014г.</h4>
										<table>
											<tr>
												<td><i class="fa fa-arrow-left"></i> 03:19 <small>30 Авг</small></td>
												<td>Оплата сотовой связи <img src="http://moscow.megafon.ru/b-header/i/logo.svg" alt="Megafon" height="24px"/></td>
												<td><b><i class="fa fa-rouble">&nbsp;200</i></b></td>
											</tr>
											<tr>
												<td><i class="fa fa-arrow-left"></i> 19:41 <small>29 Авг</small></td>
												<td>Покупка товара <img src="http://av.ru/templates/av/img/logo.png" alt="АзбукаВкуса" height="24px"/></td>
												<td><b><i class="fa fa-rouble">&nbsp;234.71</i></b></td>
											</tr>
											<tr>
												<td><i class="fa fa-arrow-right"></i> 09:01 <small>29 Авг</small></td>
												<td>Начисление процентов по вкладу</td>
												<td><b><i class="fa fa-rouble">&nbsp;1 043.71</i></b></td>
											</tr>
											
											<tr>
												<td><i class="fa fa-frown-o"></i> 14:15 <small>28 Авг</small></td>
												<td>Внутрибанковский перевод</td>
												<td><b><i class="fa fa-rouble">&nbsp;24 000.00</i></b></td>
											</tr>
											<tr>
												<td><i class="fa fa-arrow-left"></i> 07:41 <small>27 Авг</small></td>
												<td>Покупка товара <img src="http://www.starbucks.com/static/images/global/logo.svg" alt="StartBucks" height="24px"/></td>
												<td><b><i class="fa fa-rouble">&nbsp;234.71</i></b></td>
											</tr>
										</table>
										<a href='#'><i class='fa fa-file-text-o'></i> Посмотреть всю историю..</a>
							</div></div>
						
						</div><div class="row">
						
							<div class="col-md-6"><div class="shad3">
								<h3>Платежи</h3>
								<div class="top_block2 mobile-pay">
								<a href="https://plat2.myplatfon.ru/mobile/" title="Оплатить мобильный, пополнить счет, МТС, Мегафон, Билайн, Скайлинк, BeeLine, MTS, Megafon,Megaphone,региональные оператор, Енисей-телеком, Волга-Телеком, Оренбург, НТК, Сотел, Смартс, Теле2, Tatincom, Ульяновск, СтекGSM..."><span class="tb_image"><span class="tb_text">Пополнить<br>мобильный<br></span><span class="tb_button">Положить деньги</span></span></a></div>
								<div class="top_block2 jku-pay">
								<a href="https://plat2.myplatfon.ru/categories/gkh-kom/935/" title="Оплатить ЖКУ, ЖКХ, квартплата, онлайн, через Интрнет, с банковской карты, Visa-Classic, Visa Electron, по всей России, оплата коммунальных услуг, в регионах, водоснабжение, газ, электроэнергия, счётчики за воду, квартплата, жировки..."><span class="tb_image"><span class="tb_text">Оплатить<br>услуги&nbsp;ЖКХ</span><span class="tb_button">Перейти к оплате</span></span></a></div>
								<div class="top_block2 gosposhlini-pay">
								<a href="https://plat2.myplatfon.ru/fines/findbills/" title="Оплатить штрафы и госпошлины ГИБДД..."><span class="tb_image"><span class="tb_text">Проверка<br>штрафов<br>ГИБДД</span><span class="tb_button">Перейти к оплате</span></span></a></div>
							</div></div>
							
							<div class="col-md-6"><div class="shad3">
								<h3>Платежи</h3>
								<div class="top_block2 credit-pay">
								<a href="https://plat2.myplatfon.ru/categories/credit/930/" title="Оплатить кредит, через Интернет, онлайн, перевод в банк, перевести на счет, с карты, с телефона, со счёта, оплата в любой банк, VISA, MasterCard, Master Card, Виза, оплата картой, пополнить баланс, пополнить счёт..."><span class="tb_image"><span class="tb_text">Погашение<br>кредитов</span><span class="tb_button">Выбрать банк</span></span></a></div>
								<div class="top_block2 internet-pay">
								<a href="https://plat2.myplatfon.ru/categories/internet-and-phone/910/" title="Оплата телефона через интернет банковской картой, оплати интернет на Платфоне..."><span class="tb_image"><span class="tb_text">Оплатить<br>Интернет</span><span class="tb_button">Перейти к оплате</span></span></a></div>
								<div class="top_block2 internet-purses-pay">
								<a href="https://2tbank.ru/money-transfer/" title="Перевод на карту..."><span class="tb_image"><span class="tb_text">Перевод<br>на карту</span><span class="tb_button">Положить деньги</span></span></a></div>
							</div></div>
						
						</div><div class="row">
						
							<div class="col-md-6"><div class="shad3">
								<h3>Избраные платежи</h3>
								<h4><img src="http://moscow.megafon.ru/b-header/i/logo.svg" alt="Megafon" height="24px"/></h4>
									"Мой мобильный"
								<table><tr>
									<td style="text-align:left;"><small>+7(926)111-2244</small></td>
									<td style="text-align:right;"><i class="fa fa-rub">&nbsp;100</i></td>
								</tr></table>
								<button class="col-md-12 btn btn-warning popuper" data-ref="#smsConfirmation" data-rel="popup" data-position-to="window" data-role="button" data-transition="pop"><i class="lIcon fa fa-check"></i> Выполнить</button>							
							</div></div>
							
							<div class="col-md-6"><div class="shad3">
								<h3>Избранные переводы</h3>
								[>content<]
								<h4><i class="fa fa-money"></i> Внутрибанковский перевод на счет</h4>
								"Перевод Васе Пупкину"
								<table><tr>
									<td style="text-align:left;"><small>БИК:0445678910;CЧЕТ:408..</small></td>
									<td style="text-align:right;"><i class="fa fa-usd">&nbsp;250</i></td>
								</tr></table>
								<button class="col-md-12 btn btn-warning popuper" data-ref="#smsConfirmation" data-rel="popup" data-position-to="window" data-role="button" data-transition="pop"><i class="lIcon fa fa-check"></i> Выполнить</button>
							</div></div>

						</div>

					</div>
					
					
					<div class="separator">&nbsp;</div>
					
					
					<div class="panel panel-warning marhor5 row">
						<div class="panel-heading">
							Дополнительные услуги банка
						</div>
						<div class="row">
							<div class="col-md-6"><div class="shad3">
								<h3>Вклад на срок</h3>
								<h4>Высокий доход при досрочном расторжении вклада</h4>
								<ul class='detail'>
									<li><i class='fa fa-line-chart sunny'></i>
										<span>Бонус</span>
										<span><i class='fa fa-plus'></i> 1%</span>
									</li>
									<li id="idDependsOnPeriod">11.14%</li>
								</ul>
								<div data-role="fieldcontain" data-theme="b">
									<label for="idDepositPeriod">Срок вклада:</label>
									<input type="range" name="slider2" id="idDepositPeriod" value="12" min="2" max="12" data-highlight="true">
								</div>
								<ul class='property'>
									<li>
										<a href="https://2tbank.ru/files/file/kbo-current/" target="blank"><i class='fa fa-file-pdf-o'></i></a>
										<small>Единые условия</small>
										<strong>КБО ФЛ</strong>
									</li>
									<li>
										<img alt="АСВ" src="img/asv-logo.32.png"/>
										<small>Вы Застрахованы</small>
									</li>
									<li>
										<a href="deposits.html?#idOpenDeposit" style="height:62px;">
											<i class='lIcon fa fa-check-circle-o fa'></i>
											Открыть сейчас
										</a>							
									</li>
								</ul>

							</div></div>
							
							<div class="col-md-6"><div class="shad3">
								<h3>Кредит на Вашу Карту</h3>
								<h4></h4>
								<ul class='detail'>
									<li><i class='fa fa-credit-card sunny'></i>
										<span>минимальный платеж</span>
										<span><i class='fa fa-chevron-circle-right'></i> 3%</span>
									</li>
									<li id="idDependsOnAmount">19.9%</li>
								</ul>
								<ul class='property'>
									<li>
										<a href="https://2tbank.ru/files/file/tariff-knvk-current/" target="blank"><i class='fa fa-file-pdf-o'></i></a>
										<small>Тарифный план</small>
										<strong>КнВК</strong>
									</li>
									<li>
										<small>Требования к заемщику</small>
										<strong>Гражданство РФ</strong>
										<strong>от 23 до 60 лет</strong>
									</li>
									<li>
										<a href="deposits.html?#idOpenDeposit" style="height:62px;">
											<i class='lIcon fa fa-check-circle-o fa'></i>
											Получить
										</a>							
									</li>
								</ul>
							</div></div>
						</div>
						<div class="row">
							<div class="col-md-6"><div class="shad3">
								<h3><i class="fa fa-usd">&nbsp;</i> Доллар США<span>36.3052</span></h3>
								<h3><i class="fa fa-euro">&nbsp;</i> Евро<span>47.952</span></h3>
								<h4>Курс ЦБ, 29 Авг</h4>
							</div></div>
							
							<div class="col-md-6"><div class="shad3">
								<h3>Default Card</h3>
								<h4>Subtitle of a default card</h4>
								<p id="monitor"></p>
							</div></div>
						</div>
						

					</div>
					
					
					
				</div>
			</div>
		</div>

	</div> 
	
</div><!-- /.container -->

<script src="/js/nativedroid.script.js"></script>
<script src="/js/ttbank.js"></script>
</body>
</html>
