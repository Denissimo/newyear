<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
		<link sizes="16x16" href="favicon-16x16.png" rel="icon" type="image/png">
		<link rel="stylesheet" href="/css/jquery_1_10/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="/css/bootstrap3/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/bootsnew_bsc.css" />
		<link rel="stylesheet" href="/css/basic.css">
		<link href="/assets/styles/common.css?1413448382800" rel="stylesheet">
		<link href="/assets/styles/letsplay.css" rel="stylesheet">
		<title id="title">[>title<]</title>
		
		<script src="/js/jquery_1_10/jquery-1.10.2.js"></script>
		<script src="/js/jquery_1_10/jquery-ui-1.10.4.custom.js"></script>
		<script src="/css/bootstrap3/js/bootstrap.min.js"></script>
		<script src="/js/lightbox.js"></script>
		<script src="/js/depo.js"></script>
		
		
	</head>
		<body>
		<div class="container w1300">
			<div class = "col-md-12 shad1">
				<div class="row">
					<div class = "col-md-12">
						<header class="inner-header"><a href="/" class="inner-logo">Темпл банк. Мой банк - моя крепость.</a>
						<!--
							<nav class="inner-header-nav">
								<ul class="nav-list">
									<li class="nav-item"><a href="#" class="nav-link">Для жизни+</a>
									</li>
									<li class="nav-item"><a href="#" class="nav-link">Для бизнеса</a>
									</li>
									<li class="nav-item"><a href="#" class="nav-link">О системе</a>
									</li>
									<li class="nav-item"><a href="#" class="nav-link">Партнерам</a>
									</li>
								</ul>
							</nav>
						-->
						<!--start b-main-nav-->
						<div class="b-main-nav"><a href="[{requests}]" class="b-main-nav__el [#requests#]"><span>Мои Заявки</span></a><a href="[{products}]" class="b-main-nav__el [#products#]"><span>Мои Продукты</span></a><a href="#" class="b-main-nav__el [#payments#]"><span>Мои Платежи</span></a><a href="#" class="b-main-nav__el [#payments#]"><span>Настройки</span></a>

						</div>
						<!--end b-main-nav-->
							<form action="[{entrance}]" method="post">
							<input name='action' type='hidden' value='logout' />
							<input class="btn btn-primary col-md-12" name="logout" value="Выход." type="submit" />
							</form>		
						
						
						</header>
						<div class="b-header b-header_mobile b-header_mobile--inner">
							<div class="h-wrap">
								<div class="b-header__menu"></div><a href="/" class="inner-logo">Темпл банк. Мой банк - моя крепость.</a><a href="[{ttlogin}]" class="btn-action btn-action--login">Вход/Выход</a>
							</div>
						</div>
						<div class="h-wrap b-header__menu_toggler b-header__menu_toggler--inner">
							<ul>
								<li><a href="#" class="line">Для жизни</a>
								</li>
								<li><a href="#" class="line">Для бизнеса</a>
								</li>
								<li><a href="#" class="line">О системе</a>
								</li>
								<li><a href="#" class="line">Партнерам</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			












<div class="borbot padb50 padt50 h600">

					<div class="row">
					<div class="col-md-8 col-md-offset-2 shad3">

					<div class="row">
					<div class="col-md-10 col-md-offset-1">
					<h4>Продукты</h4>
					<table class="table">
					<tbody>
					<tr>
					<td>&nbsp;</td>
					<td>Продукт</td>
					<td>Тариф</td>
					<td>Валюта</td>
					<td>Остаток</td>

					<td>Доход</td>
					<td>Пополнение</td>

					</tr>

					<tr>
					<td><img src="/imag/depo/niki.jpg" width="40px"> </td>
					<td><a href="#">Депозит</a></td>
					<td><a href="#">Платиновый</a></td>
					<td>Рубли РФ</td>
					<td>120&nbsp;000.00&nbsp;₽</td>
					<td>1&nbsp;200.00&nbsp;₽</td>
					<td><a href="/%D0%9F%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5"><img src="/imag/depo/dollar_blue.jpg" width="30px"></a></td>
					</tr>

					<tr>
					<td><img src="/imag/depo/coin.jpg" width="35px"> </td>
					<td><a href="#">Депозит</a></td>
					<td><a href="#">Золотой</a></td>
					<td>Доллары США</td>
					<td>120&nbsp;000.00&nbsp;$</td>
					<td>1&nbsp;200.00&nbsp;$</td>
					<td><a href="/%D0%9F%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5"><img src="/imag/depo/dollar_blue.jpg" width="30px"></a></td>
					</tr>

					<tr>
					<td><img src="/imag/depo/cred1.jpg" width="50px"> </td>
					<td><a href="#">Банк. карта</a></td>
					<td><a href="#">Дебетовая</a></td>
					<td>рубли</td>
					<td>27&nbsp;620.00&nbsp;₽</td>
					<td>&nbsp;62.50&nbsp;₽</td>
					<td><a href="/%D0%9F%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5"><img src="/imag/depo/dollar_blue.jpg" width="30px"></a></td>

					</tr>

					<tr>
					<td><img src="/imag/depo/cred1.jpg" width="50px"> </td>
					<td><a href="#">Банк. карта</a></td>
					<td><a href="#">Предоплач.</a></td>
					<td>рубли</td>
					<td>100&nbsp;000.00&nbsp;₽</td>
					<td>&nbsp;00.00&nbsp;₽</td>
					<td><a href="/%D0%9F%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5"><img src="/imag/depo/dollar_blue.jpg" width="30px"></a></td>
					</tr>

					<tr>
					<td><img src="/imag/depo/helmet.jpg" width="40px"> </td>
					<td><a href="#">ПИФ</a></td>
					<td><a href="#">Строительный.</a></td>
					<td>рубли</td>
					<td>250&nbsp;000.00&nbsp;₽</td>
					<td>25&nbsp;000.00&nbsp;₽</td>
					<td><a href="/%D0%9F%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5"><img src="/imag/depo/dollar_blue.jpg" width="30px"></a></td>
					</tr>

					</tbody>
					</table>

					</div>
					</div>

					</div>
					</div>


</div>















			
			
			
				<div class="row">
					<div class = "col-md-12 padt10 padb10">
								<div class="b-footer__copy padl20">© 2015 Банк</div><a href="+78001949465" class="b-footer__tell padr20">8 (800) 194-94-65</a>
								<nav class="b-footer__menu"><a href="#" class="b-footer__link line">Правила</a><a href="#" class="b-footer__link line">Условия использования</a><a href="#" class="b-footer__link line">Оферта</a><a href="#" class="b-footer__link line">Тарифы</a>
								</nav>

						<div class="b-footer b-footer_mobile">
							<div class="h-wrap"><a href="+78001949465" class="b-footer__tell">8 (800) 194-94-65</a>
								<nav class="b-footer__menu"><a href="#" class="b-footer__link line">Правила</a><a href="#" class="b-footer__link line">Условия использования</a><a href="#" class="b-footer__link line">Оферта</a><a href="#" class="b-footer__link line">Тарифы</a>
								</nav>
								<div class="b-footer__copy">© 2015 Банк</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>

		
		
			
		
		
		</div>
		
	</body>
		<script src="/assets/scripts/debug.js?1413448382800"></script>
		<script src="/assets/scripts/libs/jquery-2.1.1.min.js?1413448382800"></script>
		<script src="/assets/scripts/ui/jquery-ui.js"></script>
		<script src="/assets/scripts/mask.js?1413448382800"></script>
		<script src="/assets/scripts/common.js?1413448382800"></script>
		<script src="/assets/scripts/bootstrap.js"></script>
		<script src="/assets/scripts/letsplay.js"></script>
		<script src="/assets/scripts/master.js"></script>

</html>