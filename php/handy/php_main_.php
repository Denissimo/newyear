<?
if($_SESSION['logged']){
	ob_start();
	include 'php_inflistacc.php';
	$inflistacc = ob_get_clean();
	echo '<div class="h-wrap">
					<div class="wrapper main-auth">
						<div class="payment-template">
							<figure class="payment-item">
								<header class="payment-header">
									<h2 class="payment-title title--megafon"><a href="#">На телефон</a></h2><span class="payment-value">+7 929 566-24-89</span>
								</header>
								<div class="payment-action">
									<input type="text" class="text-field payment-action-input">
									<button type="button" class="btn payment-action-btn">Оплатить</button>
								</div>
							</figure>
							<figure class="payment-item">
								<header class="payment-header">
									<h2 class="payment-title title--mts"><a href="#">Маме на телефон</a></h2><span class="payment-value">+7 929 566-24-89</span>
								</header>
								<div class="payment-action">
									<input type="text" class="text-field payment-action-input">
									<button type="button" class="btn payment-action-btn">Оплатить</button>
								</div>
							</figure>
							<figure class="payment-item">
								<header class="payment-header">
									<h2 class="payment-title title--mts"><a href="#">Маме на телефон</a></h2><span class="payment-value">+7 929 566-24-89</span>
								</header>
								<div class="payment-action">
									<input type="text" class="text-field payment-action-input">
									<button type="button" class="btn payment-action-btn">Оплатить</button>
								</div>
							</figure>
							<figure class="payment-item">
								<header class="payment-header">
									<h2 class="payment-title title--mts"><a href="#">Маме на телефон</a></h2><span class="payment-value">+7 929 566-24-89</span>
								</header>
								<div class="payment-action">
									<input type="text" class="text-field payment-action-input">
									<button type="button" class="btn payment-action-btn">Оплатить</button>
								</div>
							</figure>
							<figure class="payment-item">
								<header class="payment-header">
									<h2 class="payment-title title--mts"><a href="#">Маме на телефон</a></h2><span class="payment-value">+7 929 566-24-89</span>
								</header>
								<div class="payment-action">
									<input type="text" class="text-field payment-action-input">
									<button type="button" class="btn payment-action-btn">Оплатить</button>
								</div>
							</figure>
							<figure class="payment-item">
								<header class="payment-header">
									<h2 class="payment-title title--mts"><a href="#">Маме на телефон</a></h2><span class="payment-value">+7 929 566-24-89</span>
								</header>
								<div class="payment-action">
									<input type="text" class="text-field payment-action-input">
									<button type="button" class="btn payment-action-btn">Оплатить</button>
								</div>
							</figure><a href="#" class="show-all-template"><span>Показать все <b class="template-value">8</b> шаблонов</span></a>
						</div>
						<div class="button-holder"><a href="#" class="btn-white btn-templats"><span>Мои шаблоны</span></a><a href="#" class="btn-blue btn-operations"><span>Частые операции</span></a>
						</div>
						<div class="content-wrapper">
							<section class="wallet-info">
								<div class="wallet-holder">
									<header class="wallets-value">
										<img src="assets/images/2tbank.png" alt="" class="bank-logo"><strong class="wallets-money">На счетаx: <span>2 157 500<b class="rubl">o</b></span></strong>
									</header>
									<div class="wallet-item"><span class="wallet-name"><a href="#">Позитрон</a></span><strong class="wallet-number">40817978202000002119<span>Зарплатный</span></strong>
										<div class="wallet-value"><span class="wallet-value--current">192 000<b class="rubl">o</b></span>
										</div>
									</div>
									<div class="wallet-item"><span class="wallet-name"><a href="#">Позитрон</a></span><strong class="wallet-number">40817978202000002119</strong>
										<div class="wallet-value"><span class="wallet-value--current">192 000 $</span><span class="wallet-value--translated">(1 920 400<b class="rubl">o</b>)</span>
										</div>
									</div>
								</div>
								<div class="ad">
									<h2 class="ad-title">Не хватает до зарплаты? Попробуйте наш «<a href="#">Кредит на карту</a>»</h2>
									<p class="ad-text">Единая ставка 19,9%, нужен только паспорт, 3% минимальный платеж «кредитиные каникулы», на карту любого банка.</p>
								</div>
								<div class="operations-holder">
									<header class="operations-header">
										<h2 class="operations-title">Последние операции</h2><a href="#" class="operations-more">По всем счетам</a>
									</header>
									<div class="operations-item">
										<time datetime="14.10.2014 12:00:35" class="operations-time succes">14.10.2014<span>12:00:35</span>
										</time><strong class="operations-name">Пополнение счет <a href="#">На квартиру</a></strong><span class="operations-value">50 000<b class="rubl">o</b></span>
									</div>
									<div class="operations-item">
										<time datetime="14.10.2014 12:00:35" class="operations-time fail">14.10.2014<span>12:00:35</span>
										</time><strong class="operations-name">Пополнение счет <a href="#">На квартиру</a></strong><span class="operations-value euro">50 000<b class="rubl">o</b></span>
									</div>
									<div class="operations-item">
										<time datetime="14.10.2014 12:00:35" class="operations-time processing">14.10.2014<span>12:00:35</span>
										</time><strong class="operations-name">Пополнение счет <a href="#">На квартиру</a></strong><span class="operations-value usd">50 000<b class="rubl">o</b></span>
									</div>
								</div>
							</section>
							<aside class="side-bar">
								<div class="operations">
									<h2>Частые операции</h2><a href="#" class="operations-link">Мобильный телефон</a><a href="#" class="operations-link">Интернет</a><a href="#" class="operations-link">Оплата ЖКХ</a><a href="#" class="operations-link">Между своими счетами</a><a href="#" class="operations-link">Другому клиенту банка</a>
								</div>
								<div class="messages"><a href="#" class="messages-title">Сообщения<span class="messages-value">1</span></a>
									<p class="message-text">Добро пожаловать в ТЕМПЛ! Мы рады вас приветствовать</p>
								</div>
								<div class="currency-rate"><a href="#" class="rate-title">Курс валюты</a>
									<div class="rate-item dollar"><span class="growup">$ 40.1523 </span><span class="fall">40.3412</span>
									</div>
									<div class="rate-item euro"><span class="growup">€ 40.1523</span><span class="fall">40.3412</span>
									</div>
								</div>
							</aside>
						</div>
					</div><br />';
}else{
	echo '
	<div class="content-wrapper content-wrapper--main">
					<h1>Быстрые и безопасные платежи</h1>
					<main class="quick-payment">
						<div class="quick-payment-holder">
							<a href="[{payments}]/mobile/" class="quick-payment-item">
								<img src="assets/images/payment-phone.png" alt="" class="quick-payment-img"><span class="quick-payment-title">Мобильная связь</span>
							</a>
							<a href="[{payments}]/internet-and-phone/" class="quick-payment-item">
								<img src="assets/images/payment-notebook.png" alt="" class="quick-payment-img"><span class="quick-payment-title">Интернет и ТВ</span>
							</a>
							<a href="[{payments}]/gkh-kom/" class="quick-payment-item">
								<img src="assets/images/payment-tap.png" alt="" class="quick-payment-img"><span class="quick-payment-title">Оплатить услуги ЖКХ</span>
							</a>
							<a href="[{payments}]/credit/" class="quick-payment-item">
								<img src="assets/images/payment-home.png" alt="" class="quick-payment-img"><span class="quick-payment-title">Погашение кредита</span>
							</a>
							<a href="[{payments}]/trains-tickets/" class="quick-payment-item">
								<img src="assets/images/payment-train.png" alt="" class="quick-payment-img"><span class="quick-payment-title">Ж/д билеты</span>
							</a>
							<a href="[{payments}]/mobile/internet-purses/" class="quick-payment-item">
								<img src="assets/images/payment-wm.png" alt="" class="quick-payment-img"><span class="quick-payment-title">Электронные деньги</span>
							</a>
							<a href="[{payments}]/other/11007" class="quick-payment-item">
								<img src="assets/images/payment-gibdd.png" alt="" class="quick-payment-img"><span class="quick-payment-title">ГИБДД, налоги</span>
							</a>
							<a href="[{payments}]/credit/120" class="quick-payment-item">
								<img src="assets/images/payment-card.png" alt="" class="quick-payment-img"><span class="quick-payment-title">Перевод на карту</span>
							</a>
							<a href="[{payments}]/games/" class="quick-payment-item">
								<img src="assets/images/payment-games.png" alt="" class="quick-payment-img"><span class="quick-payment-title">Online Игры</span>
							</a>
						</div>
						<aside class="quick-payment-sidebar">
							<div class="quick-payment-all-payments"><a href="[{payments}]" class="quick-payment-all">Все платежи</a><em class="quick-payment-desc">более 30 000 компаний <br> примут ваши платежи</em>
							</div>
							<div class="quick-payment-legal-person">
								<h3 class="quick-payment-legal-person-title">Юридическое лицо?</h3><a href="#" class="quick-payment-legal-person-link">Доступные платежи для юридических лиц</a>
							</div>
							<a href="#" class="quick-payment-app">
								<img src="assets/images/payment-iphone.png" alt="">
								<p>Скачайте бесплатно платежный сканер для iPhone, Android и Windows Mobile</p>
							</a>
						</aside>
					</main>
				</div>
				<div class="content-wrapper content-wrapper--bank-features">
					<section class="bank-features">
						<div class="bank-features-item">
							<h3 class="bank-features-title">Безопасность <br> платежей</h3>
							<p class="bank-features-content">ТЕМПЛ банк сертифицирован на соответствие международному стандарту безопасности банковских карт PCI DSS.</p>
						</div>
						<div class="bank-features-item">
							<h3 class="bank-features-title">Вклады <br> застрахованы</h3>
							<p class="bank-features-content">Государство гарантирует вкладчикам возврат средств в общей сумме до 700 000 Р (или эквивалента в $ или €). На эту сумму застрахован и сам вклад, и начисленные проценты.</p>
						</div>
						<div class="bank-features-item">
							<h3 class="bank-features-title">ТЕМПЛ Банк для жизни</h3>
							<div class="bank-features-list-holder">
								<ul class="bank-features-list">
									<li class="bank-features-li"><a href="#" class="bank-features-link">Счет для жизни</a>
									</li>
									<li class="bank-features-li"><a href="#" class="bank-features-link">Кредит на Вашу карту</a>
									</li>
									<li class="bank-features-li"><a href="#" class="bank-features-link">Вклад</a>
									</li>
									<li class="bank-features-li"><a href="#" class="bank-features-link">Вклад на срок — Онлайн</a>
									</li>
									<li class="bank-features-li"><a href="#" class="bank-features-link">Ипотека</a>
									</li>
								</ul>
								<ul class="bank-features-list">
									<li class="bank-features-li"><a href="#" class="bank-features-link">Фонд недвижимости</a>
									</li>
									<li class="bank-features-li"><a href="#" class="bank-features-link">«Новая Москва»</a>
									</li>
									<li class="bank-features-li"><a href="#" class="bank-features-link">Брокерский счет</a>
									</li>
									<li class="bank-features-li"><a href="#" class="bank-features-link">Документы и тарифы</a>
									</li>
									<li class="bank-features-li"><a href="#" class="bank-features-link">Личный кабинет</a>
									</li>
									<li class="bank-features-li"><a href="#" class="bank-features-link">Интернет-банк</a>
									</li>
								</ul>
							</div>
						</div>
					</section>
				</div>
	
	';
}

?>