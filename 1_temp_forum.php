<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[>title<]</title>
<meta name="description" content="[>description<]" />
<meta name="Keywords" content="[>keywords<]" />

<!--[>noindex<]-->

<link rel="stylesheet" href="/css/eng_portal.css" />
<link rel="stylesheet" href="/css/bootstrap.css" />
<link rel="stylesheet" href="/css/bootsnew.css" />
<link rel="stylesheet" href="/css/style_forum.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/cabinet.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/jquery-ui.css" type="text/css"/>
<link rel="icon" href="/favicon.ico" type="image/x-icon">


<script type="text/javascript" src="/jquery-1.7.2.js"></script>
<script type="text/javascript" src="/flexcroll.js"></script>

<script src="/js/jquery-ui-1.8.20.custom.min.js"></script>

<script src="/js/jquery.ui.datepicker-ru.js"></script>
<script src="/js/corner.js"></script>
<script src="/js/jquery.easytooltip.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/jquery.timers.js"></script>
<script src="/js/boot/bootstrap.js"></script>
<script src="/js/boot/bootstrap-alert.js"></script>
<script src="/js/partial.js"></script>

<script src="/js/go_ales.js"></script>
<script src="/js/go_form_direct.js"></script>
<script src="/js/lightbox.js"></script>
<script src="/js/refresh_cap.js"></script>

<script type="text/javascript">
function clickdisplay(objName, a) {
var object = document.getElementById(objName);
object.style.display = (object.style.display == 'none') ? '' : 'none'
}
</script>
<!-- кнопка вверх -->
<script>
$(function(){
  $.fn.scrollToTop=function(){
    $(this).hide().removeAttr("href");
    if($(window).scrollTop()!="0"){
        $(this).fadeIn("slow")
  }
  var scrollDiv=$(this);
  $(window).scroll(function(){
    if($(window).scrollTop()=="0"){
    $(scrollDiv).fadeOut("slow")
    }else{
    $(scrollDiv).fadeIn("slow")
  }
  });
    $(this).click(function(){
      $("html, body").animate({scrollTop:0},"slow")
    })
  }
});
$(function() {$("#go-top").scrollToTop();});
$(function() {
    $(window).resize(function() {
        var width = $(window).outerWidth();
        if (width < 1380) {
            $("#go-top").addClass("go-top");
        } else {
            $("#go-top").removeClass("go-top");
        }
    });
 
	$(window).resize();
});
</script>
<!-- end кнопка вверх -->
<!-- плавное раскрытие и скрытие -->
<script language="javascript">
$(document).ready(function(){

	$(".slide-extremum").hover(function(){
		$(".slide-extremum>.extremum").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});
	
	 
});
</script>
<!-- end плавное раскрытие и скрытие -->
<!-- плавное раскрытие и скрытие блок документов для скачивания -->
<script language="javascript">
$(document).ready(function(){

	$(".slide-extremum-click h2").click(function(){
		$(".slide-extremum-click>.extremum-click").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});
	$(".slide-extremum-click1 h2").click(function(){
		$(".slide-extremum-click1>.extremum-click").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});

	 
});
</script>
<!-- end плавное раскрытие и скрытие 

<span><img src="/images/default-avatar.png" width="14" height="18" alt="Это Вы" title="Это Вы" style="align:left;"/>[>loginout<]</span>

-->

</head>
<body>
<!-- page -->
<div class="top-panel">
	<div class="top-content internal">
		<a href="/" class="logo-medium" id="logo-medium">Assymbix</a>
		<div class="settings-profile">
			<span><img src="/images/default-avatar.png" width="14" height="18" alt="Это Вы" title="Это Вы" style="align:left;"/>[>loginout<]</span>
			<div class="slide-extremum">
				<a href="/" class="language"></a>
				<ul class="extremum">
					<li><a href="#" class="active">Русский</a></li>
					<li><a href="/">English</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="page internal">
<!-- header -->
<div class="header" id="header">
	<div class="menu">
		<ul>
			<li><a class="group" href="/">О проекте</a>
				<ul>
					<li><a href="/">Принципы проекта</a></li>
					<li><a href="/">Платформа</a></li>
					<li><a href="/">Сообщество</a></li>
					<li><a href="/">Ко-маркетинг</a></li>
					<li><a href="/">Маркет</a></li>
					<li><a href="/">Перспективы</a></li>
					<li><a href="/">Ключевые достижения</a></li>
					<li><a href="/">Участники</a></li>
				</ul>
			</li>
			<li><a class="group" href="/">Платформа</a>
				<ul>
					<li><a href="/">Структура платформы</a></li>
					<li><a href="/">Свойства платформы</a></li>
					<li><a href="/">Применение платформы</a></li>
					<li><a href="/">Безопасность платформы</a></li>
					<li><a href="/">Безопасность облаков</a></li>
					<li><a href="/" >Прикладная система</a></li>
				</ul>
			</li>
			<li><a class="group"  href="/">Разработчикам</a>
				<ul>
					<li><a href="/">Техническое описание и стандарты платформы</a></li>
					<li><a href="/">Техническое описание прикладной системы</a></li>
					<li><a href="/">Документация для разработчиков</a></li>
					<li><a href="/">Шаблоны и примеры</a></li>
					<li><a href="/">Тестовая среда</a></li>
				</ul>
			</li>
			<li><a class="group" href="/">Маркет</a>
				<ul>
					<li><a href="/">AVL</a></li>
					<li><a href="/">SW компоненты</a></li>
					<li><a href="/">HW компоненты</a></li>
					<li><a href="/">SW решения</a></li>
					<li><a href="/">Коробочные решения</a></li>
					<li><a href="/">Услуги</a></li>
					<li><a href="/">Исследования</a></li>
					<li><a href="/">Правила работы</a></li>
					<li><a href="/">Правила размещения товаров/услуг</a></li>
				</ul>
			</li>
			<li><a class="group" href="/">Новости</a>
				<ul>
					<li><a href="/">Новости отрасли</a></li>
					<li><a href="/">Новости проекта</a></li>
					<li><a href="/">Новости участников</a></li>
					<li><a href="/">Объявления</a></li>
				</ul>
			</li>
			<li><a href="/" class="group">Аналитика</a>
				<ul>
					<li><a href="/">Аналитика рыночная</a></li>
					<li><a href="/">Аналитика технологическая</a></li>
				</ul>
			</li>
			<li><a class="group" href="/">Блог</a>
				<ul>
					<li><a href="/">Редакционные статьи</a></li>
					<li><a href="/">Персональные блоги</a></li>
					<li><a href="/">Блоги ключевых партнеров</a></li>
					<li><a href="/">Блоги приглашенных спикеров</a></li>
				</ul>
			</li>
			<li class="active"><a href="/">Форум</a></li>
			<li><a href="/">Контакты</a></li>
		</ul>
	</div>
</div>
<!-- end header -->
<!-- content -->
<div class="content">
	<!-- main -->
	<div class="main">
		<!-- left -->
		<div class="left">
			<div class="info-block">
				<h2 class="news-analitics">Новости рынка</h2>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Последняя новость рынка</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Запись новости о том, что есть запись рынка, о том, что прямо здесь</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Самая-самая важная запись аналитического мышления</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Самая-самая важная новость нашей рынка</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Самая-самая важная новость нашей рынки</a>
				</div>
				<a href="/" class="all">Все новости</a>
			</div> 
			<div class="info-block">
				<h2 class="technical">Технические новости</h2>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Последняя новость аналитики</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Запись новости о том, что есть запись аналитики, о том, что прямо здесь</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Самая-самая важная запись аналитического мышления</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Самая-самая важная новость нашей аналитики</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Самая-самая важная новость нашей аналитики </a>
				</div>
				<a href="/" class="all">Весь блог</a>
			</div>
			<div class="info-block">
				<h2 class="new-market">Новое на маркете</h2>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Последняя новость аналитики</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Запись новости о том, что есть запись аналитики, о том, что прямо здесь</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Самая-самая важная запись аналитического мышления</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Самая-самая важная новость нашей аналитики</a>
				</div>
				<div>
					<div class="date">12.08.2012</div>
					<a href="/">Самая-самая важная новость нашей аналитики </a>
				</div>
				<a href="/" class="all">Весь блог</a>
			</div>
		</div>
		<!-- end left -->
		<!-- forum -->
		<div class="forum">
[>content<]







<div class="message-f">
				<h2>Как, где и когда заработать свой первый миллион и как правильно его потратить!  <a href="/" class="add-message"></a></h2>
				<div class="left-m">
					<div class="date-l">
						<span>12.08.2012</span>
						<span>12:12</span>
					</div>
					<div class="avatar-l">
						<img src="/imag/upics/upicat.jpg" />
					</div>
					<div class="member-l">
						Участник
						<a href="/">Афанасий Пипкин</a>
					</div>
					<div class="company-l">
						Компания
						<a href="/">ОАО Вымпелком</a>
					</div>
					<div class="text-l">Сообщений 213 <br>Зарегистрирован: 25.06.13</div>
					<a href="/" class="send-message"></a>
				</div>
				<div class="main-m">
					<h3>Это заголовое сообщения некоего мистера Пипкина. Которй может быть очень длинным <a href="/" class="edit-m"></a><a href="/" class="blockquote"></a></h3>
					<p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.
					</p>
					<blockquote>
						<div class="date-m">
							<span>12.08.2012</span>
							<span>12:12</span>
							<a href="/">Pipkin</a>
						</div>
						Что играть на скрипке в Отрадном асто используемый в печати и вэб-дизайне. Lorem Ipsum является 
						"рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую 
						коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. 
					</blockquote>
					<p>Коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только 
						успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации 
						в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее 
						время, программы электронной вёрстки типа Aldus PageMaker. 
					</p>
					<div class="main-tools-m">
						<a href="#" class="button">Ответить</a>
						<div class="rating-mt">
							<a href="#">+</a>
							25
							<a href="#">–</a>
						</div>
					</div>
				</div>
</div>
       
       
       
            
            
		</div>
		<!-- forum -->
	</div>
	<!-- end-main -->
</div>
<!-- end content -->
	<!-- footer -->
	<div class="footer">
		<a href="#" id="go-top"></a>
		<div class="footer-left">
			Ascatel Inc., Holding Company <span>901 North Pitt Street, Suite 325, <br> Alexandria, VA 22314, USA</span>
			Все права защищены
		</div>
		<div class="footer-center">
			<img src="images/footer-logo.png" alt="Проект Asymbix" title="Проект Asymbix" />
			<span>ЗДЕСЬ УКАЗЫВАЕТСЯ НАЗВАНИЕ СЛУЖБЫ И ЕЕ ТЕЛЕФОН</span>
			<span>E-mail: <a href="mailto:info@ascatel.com">info@ascatel.com</a></span><span>Tel.: 1.202.835.0966</span>
		</div>
		<div class="footer-right">
			<a href="" class="footer-questions">Хотите задать вопрос?</a>
		</div>
	</div>
	<!-- end footer -->
</div>
<!-- end page -->
	<div class="footer-sitemap">
		<div>
			<ul>
				<li><a href="/">О проекте</a></li>
				<li><a href="/">Принципы проекта</a></li>
				<li><a href="/">Платформа</a></li>
				<li><a href="/">Сообщество</a></li>
				<li><a href="/">Ко-маркетинг</a></li>
				<li><a href="/">Маркет</a></li>
				<li><a href="/">Перспективы</a></li>
				<li><a href="/">Ключевые достижения</a></li>
				<li><a href="/">Участники</a></li>
			</ul>
			<ul>
				<li><a href="/">Платформа</a></li>
				<li><a href="/">Структура платформы</a></li>
				<li><a href="/">Свойства платформы</a></li>
				<li><a href="/">Применения платформы</a></li>
				<li><a href="/">Безопасность платформы</a></li>
				<li><a href="/">Безопасность облаков</a></li>
				<li><a href="/">Прикладная система</a></li>
			</ul>
			<ul>
				<li><a href="/">Разработчикам</a></li>
				<li><a href="/">Техническое описание и стандарты платформы</a></li>
				<li><a href="/">Техническое описание прикладной системы</a></li>
				<li><a href="/">Документация для разработчиков</a></li>
				<li><a href="/">Шаблоны и примеры</a></li>
				<li><a href="/">Тестовая среда</a></li>   
			</ul>
			<ul>
				<li><a href="/">Маркет</a></li>
				<li><a href="/">AVL</a></li>
				<li><a href="/">SW компоненты</a></li>
				<li><a href="/">HW компоненты</a></li>
				<li><a href="/">SW решения</a></li>
				<li><a href="/">Коробочные решения</a></li>
				<li><a href="/">Услуги</a></li>
				<li><a href="/">Исследования</a></li>
				<li><a href="/">Правила работы</a></li>
				<li><a href="/">Правила размещения товаров / услуг</a></li>
			</ul>
			<ul>
				<li><a href="/">Новости</a></li>
				<li><a href="/">Новости отрасли</a></li>
				<li><a href="/">Новости проекта</a></li>
				<li><a href="/">Новости участников</a></li>
				<li><a href="/">Объявления</a></li>
			</ul>
			<ul>
				<li><a href="/">Аналитика</a></li>
				<li><a href="/">Аналитика рыночная</a></li>
				<li><a href="/">Аналитика технологическая</a></li> 
			</ul>
			<ul>
				<li><a href="/">Блог</a></li>
				<li><a href="/">Редакционные статьи</a></li>
				<li><a href="/">Персональные блоги</a></li>
				<li><a href="/">Блоги ключевых партнеров</a></li>
				<li><a href="/">Блоги приглашенных спикеров</a></li>
			</ul>
			<ul>
				<li><a href="/">Форум</a></li>
			</ul>
			<ul>
				<li><a href="/">Контакты</a></li>
			</ul>
		</div>
	</div>
<!-- IE -->
<div class="ie">
Ваш браузер морально и физически изношен. Для просмотра сайта установите новую версию браузера.
</div>
<!-- end IE -->
</body>
</html>
