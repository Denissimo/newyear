<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
		<link sizes="16x16" href="favicon-16x16.png" rel="icon" type="image/png">
		<link rel="stylesheet" href="/css/jquery_1_10/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="/css/bootstrap3/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/bootsnew.min.css">
		<link rel="stylesheet" href="/css/newyear.css">
		<title id="title">[>title<]</title>
		
		<script src="/js/jquery_1_10/jquery-1.10.2.js"></script>
		<script src="/js/jquery_1_10/jquery-ui-1.10.4.custom.js"></script>
		<script src="/css/bootstrap3/js/bootstrap.min.js"></script>
		
		<script src="/js/lightbox.js"></script>
		<script src="/js/newyear.js"></script>
		
		
	</head>
	<body>
		<div class="container-fluid">
			<div class="container">
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="[{main}]"><img src="/assets/images/inner-logo2.png" /></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li class="[#requests#]"><a href="[{requests}]">Мои заявки <span class="sr-only">(current)</span></a></li>
						<li class=""><a href="#">Мои платежи</a></li>
						
						<li class="dropdown [#products#]">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Мои Продукты <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li class="[#products#]"><a href="[{products}]">Депозиты</a></li>
							<li class="[#products#]"><a href="[{products}]">Микрозаймы</a></li>
							<li role="separator" class="divider"></li>
							<li class="[#products#]"><a href="[{products}]">Банковские карты</a></li>
							<li class="[#products#]"><a href="[{products}]">Предоплаченные карты</a></li>
						  </ul>
						</li>
						
					<li><a href="#">Настройки</a></li>	

					  </ul>
					  <form class="navbar-form navbar-left" role="search">
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Поиск">
						</div>
						<button type="submit" class="btn btn-default">Поиск</button>
					  </form>
					  <ul class="nav navbar-nav navbar-right">
						<li><a href="#">[>username<]</a></li>
						<!--
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
						  </ul>
						</li>
						-->
						<form action="/post" class="navbar-form navbar-right" method="post">
							<input name="action" value="logout" type="hidden">
							<input class="btn btn-primary col-md-12" name="logout" value="Выход" type="submit">
						</form>
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
				
				<!--
				<div class="separator">&nbsp;</div>
				
				
				<div class="row">
					<div class="col-md-12 white">
						&nbsp;+++
					</div>
				</div>
				-->
				
				<div class="row">

							<div class="col-md-12">
								<div class="green hdr">
									<div class="transpar">
	<b>Депозиты 10% годовых:</b><br />
	Открывая депозитный счёт в нашем банке, вы сможете наблюдать в интерактивном режиме, как растёт Ваш доход. 
	<br />При вкладе на любую сумму услуга по интерактивному отображению дохода предоставляется бесплатно.
	<br /><a href="#" class="mart20 label label-primary">Подробнее</a>
								
									</div>
								</div>
							</div>

				</div>
				
				<div class="row">
					<div class="col-md-12">
					
						<div class="row">
							<div class="col-md-2">
						
							<div class="panel panel-default">
							  <div class="panel-heading">
								<h3 class="panel-title">Наши предложения</h3>
							  </div>
							  <div class="panel-body">
								<table class="table">
								<tr><td><a href="#">Депозиты</a></td></tr>
								<tr><td><a href="#">Микрозаймы</a></td></tr>
								<tr><td><a href="#">Банковские карты</a></td></tr>
								<tr><td><a href="#">Предоплаченные карты</a></td></tr>
								</table>
							  </div>
							  
							</div>
							
							<div class="panel panel-default">
							  <div class="panel-heading">
								<h3 class="panel-title">Новости</h3>
							  </div>
							  <div class="panel-body">
								<div class="newst-header"><a href="#">Банк выпустил премиальную карту «Банк-VISA Signature»</a></div>
								<p>Банк запустил статусный продукт&nbsp;— премиальную дебетовую карту «Банк-VISA Signature», которая пополнит линейку ко-брендовых карт банка. <a href="#">Подробнее</a></p>
							  </div>
							</div>
						
							</div>
							
							
						<div class="col-md-8">
							<div class="panel panel-default">
							  <div class="panel-heading">
								<h3 class="panel-title">Личный Кабинет</h3>
							  </div>
							  <div class="panel-body">
									[>content<]
							  </div>
							</div>
						</div>
						
						<div class="col-md-2">
						
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h3 class="panel-title">Банковское приложение</h3>
						  </div>
						  <div class="panel-body">
								<img src="/imag/applic.jpg" class="col-md-12" style="padding-bottom:15px;" />
								
								<br />Банковское приложение содержит данные, необходимые для осуществления банковских операций в платежной системе «Универсальная электронная карта». <br />
								Вы можете использовать УЭК как полноценный платежный инструмент на территории Российской Федерации.<br /><br />
	<!--Платежный сервис обеспечивает платежная система ПРО100, что позволяет использовать УЭК при предоставлении государственных и муниципальных услуг и гарантирует надежность и безопасность операций, связанных с использованием данных пользователя.-->

								<img src="/imag/buttonsga.jpg" class="col-md-12" style="padding-bottom:15px;" />
						  </div>
						  
						</div>
						
						
						
						</div>
							
							
						</div>	
				
					</div>
				</div>		
				
				<div class="row">
					<div class="col-md-12">
							<div class="col-md-12 ftr">
								<div class="col-md-4">&copy; 2015 банк</div>
								<div class="col-md-6"><a href="[{contracts}]" class="footerlink">Договоры</a><a href="[{personal}]" class="footerlink">Личный кабинет</a><a href="[{cabinet}]" class="footerlink">Продукты</a><a href="#" class="footerlink">Тарифы</a></div>
								<div class="col-md-2" align="right">+7 (800)-555-5555</div>						
							</div>
							
					</div>
				</div>	
				
			</div>
		</div>	

	</body>

</html>