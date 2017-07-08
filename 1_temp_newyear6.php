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
		<link rel="stylesheet" href="/css/social-likes_classic.css">
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
		<script src="/js/social-likes.min.js"></script>
		<script src="/css/bootstrap3/js/bootstrap.min.js"></script>
		
		
		<script src="/js/lightbox.js"></script>
		<script src="/js/newyear2.js"></script>
		
		
	</head>
	<body>
	
		<div class="container">
			<div class="row">
				<div class="col-md-12 center">
					<a href="/"><div class="ellipse">
						
					</div></a>
					<div class="winter">
						<a href="/">Winter Trees</a>
					</div>
				</div>
			</div>
			<div class="row mart30">
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-11 sideblock">
							<div class="social-likes">
								<div class="facebook" title="Поделиться ссылкой на Фейсбуке"><!--Facebook--></div>
								<div class="twitter" title="Поделиться ссылкой в Твиттере"><!--Twitter--></div>
								<div class="mailru" title="Поделиться ссылкой в Моём мире"><!--Мой мир--></div>
								<div class="vkontakte" title="Поделиться ссылкой во Вконтакте"><!--Вконтакте--></div>
								<div class="odnoklassniki" title="Поделиться ссылкой в Одноклассниках"><!--Одноклассники--></div>
								<div class="plusone" title="Поделиться ссылкой в Гугл-плюсе"><!--Google+--></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-8">
					<ul class="row topmenu">
						<li class="">
						<a href="#">Главная</a>
						</li>
						<li class="">
						<a href="#">Коллекция</a>
							<ul class="">
								<li class="">
									<a href="#">Рустикальный стиль</a>
								</li>
								<li class="">
									<a href="#">Европейский стиль</a>
								</li>
								<li class="">
									<a href="#">Романтический шебби-шик</a>
								</li>
								<li class="">
									<a href="#">Цветы</a>
								</li>
							</ul>
						</li>
						<li class="">
						<a href="#">О нас</a>
						</li>
						<li class="">
						<a href="#">Контакты</a>
						</li>
					</ul>
					<div class="row mart30">
						<div class="col-md-12 center">
							
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								<li data-target="#carousel-example-generic" data-slide-to="3"></li>
								<li data-target="#carousel-example-generic" data-slide-to="4"></li>
								<li data-target="#carousel-example-generic" data-slide-to="5"></li>
								<li data-target="#carousel-example-generic" data-slide-to="6"></li>
							  </ol>

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
							  	<div class="item active">
								  <img src="/imag/newyear/gallery/image07.jpg" alt="Описалово 7">
								  <div class="carousel-caption">
									Длинное описалово 7
								  </div>
								</div>
								<div class="item">
								  <img src="/imag/newyear/gallery/image01.jpg" alt="Описалово 1">
								  <div class="carousel-caption">
									Длинное описалово 1
								  </div>
								</div>
								<div class="item">
								  <img src="/imag/newyear/gallery/image02.jpg" alt="Описалово 2">
								  <div class="carousel-caption">
									Длинное описалово 2
								  </div>
								</div>
								<div class="item">
								  <img src="/imag/newyear/gallery/image03.jpg" alt="Описалово 3">
								  <div class="carousel-caption">
									Длинное описалово 3
								  </div>
								</div>
								<div class="item">
								  <img src="/imag/newyear/gallery/image04.jpg" alt="Описалово 4">
								  <div class="carousel-caption">
									Длинное описалово 4
								  </div>
								</div>
								<div class="item">
								  <img src="/imag/newyear/gallery/image05.jpg" alt="Описалово 5">
								  <div class="carousel-caption">
									Длинное описалово 5
								  </div>
								</div>
								<div class="item">
								  <img src="/imag/newyear/gallery/image06.jpg" alt="Описалово 6">
								  <div class="carousel-caption">
									Длинное описалово 6
								  </div>
								</div>

							  </div>

							  <!-- Controls -->
							  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							  </a>
							</div>
							
							
							
						</div>
					</div>
					

					
				</div>
				
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-11 col-md-offset-1 center sideblock" id="datepicker">
							
						</div>
					</div>
				</div>
				
			</div>
	

		</div>

	</body>

</html>