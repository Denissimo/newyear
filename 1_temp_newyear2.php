<?
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" href="/favicon.ico" type="image/x-icon">

		<!--<link rel="stylesheet" href="/css/jquery_1_10/jquery-ui-1.10.4.custom.css" />-->
		<link rel="stylesheet" href="/js/jquery_1_11/jquery-ui.css" />
		<link rel="stylesheet" href="/css/bootstrap3/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/bootsnewyear.css">
		<link rel="stylesheet" href="/css/newyear2.css">
		<title id="title">[>title<]</title>
		
		<!--<script src="/js/jquery_1_10/jquery-1.10.2.js"></script>
		<script src="/js/jquery_1_10/jquery-ui-1.10.4.custom.js"></script>-->
		
		<script src="/js/jquery-2.1.4.js"></script>
		<script src="/js/jquery_1_11/jquery-ui.js"></script>
		
		<!--<script src="/js/jquery_1_11/datepicker-ru.js"></script>-->
		<script src="/js/jquery.timers.js"></script>
		<script src="/js/jquery.transit.min.js"></script>
		
		<script src="/css/bootstrap3/js/bootstrap.min.js"></script>
		
		<script src="/js/lightbox.js"></script>
		<script src="/js/newyear2.js"></script>
		
		
	</head>
	<body>
	


	
		<div class="container-fluid">

				<div class="col-md-12 fix">	
						<div class="container-fluid">
							<div class="col-md-2">
								<div class="separ">&nbsp;</div>
								<div class="panel panel-default transp">
								  <div class="panel-heading">
									<h3 class="panel-title">Ёлочные украшения</h3>
								  </div>
								  <div class="panel-body">
									<ul class="menu1">

									<li><a href="#aboutus">О нас</a></li>
									<li><a href="#">Наши работы</a></li>
									<li><a href="#">Отзывы</a></li>
									<li><a href="#">Контакты</a></li>
									<li><a href="#">Пункт 5</a></li>
									<li><a href="#">Пункт 6</a></li>
									<li><a href="#">Пункт 7</a></li>

									</ul>
								  </div>
								  
								</div>

							</div>
							
							<div class="col-md-8">
											<nav class="navbar navbar-white transp">

											<!-- Brand and toggle get grouped for better mobile display -->
											<div class="navbar-header">
											  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											  </button>
											  <a class="navbar-brand" href="[{main}]"><img src="/assets/images/inner-logo2.png"  /></a>
											</div>

											<!-- Collect the nav links, forms, and other content for toggling -->
											<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
											  <ul class="nav navbar-nav">
												<li class="[#requests#]"><a href="#aboutus">О нас <span class="sr-only">(current)</span></a></li>

												
												<li class="dropdown [#products#]">
												  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Наши работы<span class="caret"></span></a>
												  <ul class="dropdown-menu">
													<li class="[#products#]"><a href="">Рустикальный стиль</a></li>
													<li class="[#products#]"><a href="">Европейский стиль</a></li>
													<li class="[#products#]"><a href="">Романтический Шебби-шик</a></li>
													<li role="separator" class="divider"></li>

													<li class="[#products#]"><a href="">Предоплаченные карты</a></li>
												  </ul>
												</li>
											<li><a href="#">Отзывы</a></li>	
											<li><a href="#">Контакты</a></li>	

											  </ul>
											  <!--
											  <form class="navbar-form navbar-left" role="search">
												<div class="form-group">
												  <input type="text" class="form-control" placeholder="Поиск">
												</div>
												<button type="submit" class="btn btn-default">Поиск</button>
											  </form>
											  -->
											  <ul class="nav navbar-nav navbar-right">
												<li><a href="#">[>user<]</a></li>
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

										</nav>
							
							</div>
							
							<div class="col-md-2">
								<div class="separ">&nbsp;</div>
								<div class="panel panel-default transp">
								  <div class="panel-heading">
									<h3 class="panel-title">Выбор даты</h3>
								  </div>
								  <div class="panel-body row">
									<div class="col-md-12"id="datepicker">
										
									</div>	
								  </div>
								</div>
							</div>
							

							
						</div>	
				</div>


	<div class="backframe" id="frm2">&nbsp;</div>
	<div class="backframe" id="frm1">&nbsp;</div>
	


	</div>
	
	<div class="container-fluid additional">
		<div class="container-fluid">
			<div class="col-md-8 col-md-offset-2 shad3 red" id="aboutus">
			<h4>О нас</h4>
			<span id="winter">Winter Trees</span>
- Прибавь скорость, - внезапно сказал Рэндом. - Похоже, что это охотничий рог Джулиана.<br />
Я повиновался.<br />
Звук рожка раздался еще раз, уже ближе.<br />
- Эти его проклятые гончие растерзают автомобиль на кусочки, а его птицы выклюют нам глаза! - сказал он. - Надо же было наткнуться на него, когда он так хорошо подготовлен к этой встрече. За чем бы он сейчас не охотился, он с наслаждением бросит любую дичь ради такой добычи, как два его брата.<br />
- Живи сам и дай жить другим, вот моя философия на сегодня, - заметил я.<br />
Рэндом ухмыльнулся.<br />
- Что за рыцарство! Могу поспорить, что оно продлится целых пять минут! Затем рожок послышался еще ближе и он выругался.<br />
Стрелка спидометра остановилась на красной цифре - 75 миль, а ехать быстрее по такой дороге я боялся.<br />
А рожок звучал все ближе и ближе - три долгих протяжных звука, и неподалеку, слева, я услышал лай гончих.<br />
- Мы сейчас почти на настоящей Земле, хотя все еще далеко от Эмбера, - сказал мой брат. - Бесполезно пробовать бежать через примыкающие отражения, потому что если он действительно преследует именно нас, он настигнет нас и там. Или его тень.<br />
- Что будем делать? - Прибавим еще газу и будем надеяться, что он все-таки гонится не за нами.<br />
И звук рожка послышался еще, на сей раз практически рядом.<br />
- На чем это он скачет? - спросил я. - На локомотиве? - Насколько я могу судить, это Моргенштерн, самый могучий и быстрый конь, которого он когда-либо создавал.<br />
Я задумался над последним словом, вспоминая, что все это могло значить. Да, верно, подсказывал мне внутренний голос. Он действительно создал Моргенштерна из Отражений, придав этому зверю силу и скорость урагана. Я вспомнил, что всегда боялся этого коня, и тут я увидел его.<br />
Моргенштерн был почти на метр выше любого из коней, которых мне доводилось видеть. Глаза его были мертвого цвета немецкой овчарки, седая грива вилась по ветру, копыта блестели, как отполированная сталь. Он несся за машиной, как ветер, а в седле, пригнувшись, сидел Джулиан - совсем такой, как на карте - длинные черные волосы, ослепительные голубые глаза, и одет в белые сверкающие доспехи.<br />
Джулиан улыбнулся нам и помахал рукой, а Моргенштерн вскинул вверх голову, и его великолепная грива взметнулась на ветру, как флаг. Ноги мелькали с такой скоростью, что их не было видно.<br />
Я вспомнил, что Джулиан однажды заставил своего подручного одеть мою старую одежду и мучить лошадь. Вот почему она чуть не убила меня в день охоты, когда я спешился, чтобы освежевать оленя.<br />
Я быстро поднял стекло, чтобы зверь не смог по запаху определить, что я в машине. Но Джулиан заметил меня, и мне казалось, что я понимаю, что это значит. Вокруг бежали его гончие, жесткие, твердотелые, с крепкими как сталь зубами. Они тоже были взяты из Отражения, потому что ни один нормальный пес не выдержал бы такой убийственной гонки. Но я был твердо уверен, что все, раньше бывшее для меня нормальным, здесь таковым не являлось.<br />
Джулиан сделал нам знак остановиться, и я посмотрел на Рэндома, который утвердительно кивнул в ответ.<br />
- Если мы не остановимся, он нас просто уничтожит.<br />
Так что пришлось нажать на тормоз.<br />
Моргенштерн взвился в воздух, присел на задние ноги, поднял передние и ударил в землю копытами. Собаки кружили неподалеку с высунутыми языками и тяжело вздымающимися боками. Лошадь покрылась блестящей пленкой пота.<br />
- Какой сюрприз! - протянул Джулиан своим медленным, почти ленивым голосом.<br />
Это была его манера разговаривать, и, пока он говорил, большой орел с черно-зеленым оперением, круживший у нас над головами, опустился и уселся к нему на плечо.<br />
- Вот именно, ничего не скажешь, - ответил я. - Как поживаешь? - О, прекрасно, - небрежно бросил он. - Как всегда. А как дела у тебя и братца Рэндома? - В полном здравии, - ответил я, а Рэндом кивнул головой и добавил: - Я думал, что в эти неспокойные времена ты найдешь себе другое занятие, кроме охоты.<br />
Джулиан чуть наклонил голову и иронически посмотрел на него сквозь боковое стекло.<br />
- Мне доставляет наслаждение убивать зверей. И я постоянно думаю о своих родственниках.<br />
У меня по спине пробежал ощутимый холодок.<br />
- Меня отвлек от охоты шум вашей машины. Да я и представить себе не мог, что в ней окажетесь именно вы. Насколько я понимаю, вы путешествуете не просто ради удовольствия, а едете куда-то, скажем, в Эмбер, так? - Так, - согласился я. - Могу я полюбопытствовать, почему ты сейчас здесь, а не там? - Эрик послал меня наблюдать за этой дорогой, - ответил он, и моя рука невольно легла на рукоятку одного из пистолетов.<br />
У меня возникла уверенность, что его доспехи не пробить. Я подумал, что придется стрелять в Моргенштерна.<br />
- Ну что ж, братья, - сказал он, улыбаясь. - Я рад, что вы вернулись, и пожелаю вам доброго пути. До свидания.<br />
И с этими словами он повернулся и поскакал в лес.<br />
- Давай-ка уберемся поскорее отсюда подобру-поздорову, - сказал Рэндом. - Наверное, он собирается устроить засаду, а может, опять начнет преследование.
			</div>
		</div>
	</div>
	
	</body>

</html>