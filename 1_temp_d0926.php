<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>[>title<]</title>

<meta name="Language" content="Russian" lang="en">
<meta name="Description" content="Счета — Интернет банк — «2Тбанк »">
<meta name="Keywords" content="">
<meta name="Abstract" content="Интернет-банк «2Тбанк»" lang="ru">
<meta name="Copyright" content="Copyright 2012 2Тбанк" lang="en">
<meta name="Author-Corporate" content="2Тбанк" lang="en">
<meta name="viewport" content="width=970">



<link rel="shortcut icon" href="favicon.ico">


<link rel="stylesheet" href="/css/bootstrap3/css/bootstrap.min.css" />
<link rel="stylesheet" href="/css/jquery_1_10/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" href="/css/bootsnew_ttdemo.css" />
<link rel="stylesheet" href="/css/ttdemo.css" />

<link rel="stylesheet" type="text/css" href="/css/kichatov0926.css" media="all">



<script src="/js/jquery_1_10/jquery-1.10.2.js"></script>
<script src="/js/jquery_1_10/jquery-ui-1.10.4.custom.js"></script>
<script src="/css/bootstrap3/js/bootstrap.min.js"></script>

</head>


<body class="ib-page">


	<div class="container shad2">
		<div class="marhor10">
		
		<nav class="navbar navbar-info" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/images/logo-2tbox.png" id="logo" alt="kaspi bank" width="75px" height="70px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Счета<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="[{inflistacc}]">Список счетов</a></li>
            <li><a href="[{inflistcard}]">Список карт</a></li>
			<li><a href="[{infbalance}]">Остатки</a></li>
			<li class="divider"></li>
			<li><a href="[{infhistory}]">История операций</a></li>
          </ul>
        </li>

		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Платежи<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="[{paymobile}]">Мобильный телефон</a></li>
            <li><a href="[{payinternet}]">Интернет</a></li>
			<li><a href="[{payhouse}]">Оплата ЖКХ</a></li>
			<li><a href="[{payfines}]">Штрафы</a></li>
			<li><a href="[{payother}]">Прочее</a></li>
          </ul>
        </li>
		
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Переводы<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="[{transclient}]">Внутриклиентские</a></li>
            <li><a href="[{transintra}]">Внутрибанковские</a></li>
			<li><a href="[{transp2p}]">P2P</a></li>
			<li><a href="[{transdetail}]">По реквизитам</a></li>
			<li><a href="[{transbudget}]">В бюджет</a></li>
			<li><a href="[{transswift}]">SWIFT</a></li>
          </ul>
        </li>
		
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Счета<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="[{openacc}]">Открыть счёт</a></li>
            <li><a href="[{opendepo}]">Открыть депозит</a></li>
			<li><a href="[{opencard}]">Заказать карту</a></li>
			<li><a href="[{opencred}]">Получить кредит</a></li>
			<li class="divider"></li>
			<li><a href="[{opensett}]">Настройки</a></li>
			<li><a href="[{openref}]">Справки</a></li>
			<li><a href="[{openlimit}]">Лимиты</a></li>
          </ul>
        </li>
		

		
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li>
			<div class="select_region_payment_bloc corr001">
				<div class="select_region_cont">
				<h4>Мой регион:</h4>
				<div class="select_region">
				<div class="selected_region" id="18"><a href="#" class="corr002">Москва</a></div>
				<ins id="select_region_arrow">
				</ins>
				</div>
				<div style="display: none;" class="select_region_bloc">
				<div id="about" class="nano">
				<div class="nano-content">

				</div>
				</div>
				</div>
				</div>
			</div>

		</li>
        
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
			<div class="separator"><h1 class="h1corr">[>h1<]</h1></div>
			
			<div class="separator">&nbsp;</div>
			
			<div class="row">
			<div class="col-md-3">
				<div class="shad0">
					<div class="marhor5">
						<b>Финансовый анализ</b><br />
						<img src="/images/bank/finsmall01.png" width="250px;" />
						Результаты финансового анализа являются основой принятия управленческих решений, выработки стратегии дальнейшего развития предприятия. <a href="#">Read more...</a>
					</div>
				</div>
				
				<div class="separator">&nbsp;</div>
<!--
				<div class="shad0">
					<div class="marhor5">
						<b>Инвестиции</b><br />
						<img src="/images/bank/finsmall02.png" width="250px;" />
						Переход к относительным показателям позволяет проводить межхозяйственные сравнения экономического потенциала и результатов деятельности предприятий. <a href="#">Read more...</a>
					</div>
				</div>
-->				
				<div class="separator">&nbsp;</div>
				
				<div class="shad0">
					<div class="marhor5">
						<b>Инвестиции</b><br />
						<img src="/images/bank/finsmall03.png" width="250px;" />
						По характеру заключаемых договоров, по характеру производимых действий, по целям, по юридическим последствиям биржевые инвестиции и спекуляции не отличаются. <a href="#">Read more...</a>
					</div>
				</div>
				<div class="separator">&nbsp;</div>
				


				
			</div>
			
			<div class="col-md-9">
				[>content<]
			</div>
			
			</div>
		
		</div>
	</div>


    
        
    </body>
</html>
