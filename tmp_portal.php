<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Кабинет интегратора - страница 1</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="cabinet.css" type="text/css" media="screen" />
<script type="text/javascript" src="jquery-1.7.2.js"></script>
<script type="text/javascript" src="flexcroll.js"></script>
<script type="text/javascript">
function clickdisplay(objName, a) {
var object = document.getElementById(objName);
object.style.display = (object.style.display == 'none') ? '' : 'none'
}
	$(document).on('mouseover', '.menu ul li' , function(e){
		$(".menu ul li").addClass("hover");
	}).on('mouseout', '.menu ul li' , function(e){
		$(".menu ul li").removeClass("hover");
	});
	$(document).on('mouseover', '.top-menu-c ul li' , function(e){
		$(".top-menu-c ul li").addClass("hover");
	}).on('mouseout', '.top-menu-c ul li' , function(e){
		$(".top-menu-c ul li").removeClass("hover");
	});
</script>
</head>
<body>
<!-- page -->
<div class="top-panel">
	<div class="top-content">
		<a class="hide-menu" onclick="clickdisplay('header', this), clickdisplay('logo-small', this), this.className = (this.className == 'hide-menu top' ? 'hide-menu' : 'hide-menu top')"></a>
		<a href="/" class="logo-small" id="logo-small" style="display:none;">Assymbix</a>
		<div class="settings-profile">
			<span><img src="images/default-avatar.png" width="14" height="18" alt="Это Вы" title="Это Вы" /></span>
			<span>Иванов Иван Иванович</span>
			<a href="/">Личный кабинет</a>
			<a href="/">Выйти</a>
		</div>
	</div>
</div>
<div class="page">
<!-- header -->
<div class="header" id="header">
	<a href="/" class="logo">Assymbix</a>
	<div class="search-info">
		<span class="header-phone">8 (123) 123 123 123</span>
		<span class="header-phone">8 (123) 123 123 123</span>
		<input type="text" class="search" value="Поиск" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
	</div>
	<div class="menu">
		<ul>
			<li><a class="group" href="/">О проекте</a>
				<ul>
					<li><a href="/">Правила</a></li>
					<li><a href="/">Как это работает</a></li>
				</ul>
			</li>
			<li><a class="group" href="/">Платформа</a>
				<ul>
					<li><a href="/">Новинки платформы</a></li>
					<li><a href="/">Особенности платформы</a></li>
				</ul>
			</li>
			<li><a class="group"  href="/">Разработчикам</a>
				<ul>
					<li><a href="/">Исходный код</a></li>
					<li><a href="/">Готовые компоненты</a></li>
				</ul>
			</li>
			<li><a class="group" href="/">Маркет</a>
				<ul>
					<li><a href="/">Бесплатные программы</a></li>
					<li><a href="/">Платные программы</a></li>
				</ul>
			</li>
			<li><a class="group" href="/">Новости</a>
				<ul>
					<li><a href="/">Последние новости</a></li>
					<li><a href="/">Важные новости</a></li>
				</ul>
			</li>
			<li><a href="/">Аналитика</a></li>
			<li><a class="group" href="/">Блог</a>
				<ul>
					<li><a href="/">Свежие посты</a></li>
					<li><a href="/">С плесенью</a></li>
				</ul>
			</li>
			<li><a href="/">Форум</a></li>
			<li><a href="/">Контакты</a></li>
		</ul>
	</div>
</div>
<!-- end header -->
<!-- content cabinet -->
<div class="content-c">
	<div class="header-c">
		<h1 class="page-title-c">Кабинет интегратора</h1>
		<div class="top-menu-c">
			<ul>
				<li><a href="/">Организации и пользователи</a></li>
				<li><a href="/">Компоненты</a></li>
				<li><a href="/">Разворачивание ЭПС</a></li>
				<li><a href="/" class="active">Установленные ЭПС</a></li>
			</ul>
		</div>
	</div>
	<!--<div class="back-cabinet"><a href="/">Личный кабинет</a></div>-->
	<div class="menu-c">
		<a href="/" class="button-c active">Прикладные системы</a>
		<a href="/" class="button-c">Карточка пркладной системы</a>
		<a href="/" class="button-c">Мониторинг прикладной системы</a>
	</div>
	<!-- component -->
	<div class="component-c">
		<div class="caption-table-c">Установленные прикладные системы</div>
		<div class="caption-settings-c">
			<input type="text" class="search" value="Поиск" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
			<a href="#" class="refresh-c"></a>
		</div>
		<table class="applied-systems-c">
			<tr>
				<th><div>Наименование ЭПС<div class="sorting"><div class="top"></div><div class="bottom"></div></div></div></th>
				<th><div>Инсталлятор<div class="sorting"><div class="top"></div><div class="bottom"></div></div></div></th>
				<th><div>Характеристика инстанса<div class="sorting"><div class="top"></div><div class="bottom"></div></div></div></th>
				<th><div>Статус<div class="sorting"><div class="top"></div><div class="bottom"></div></div></div></th>
				<th><div>Серверы/Виджеты<div class="sorting"><div class="top"></div><div class="bottom"></div></div></div></th>
				<th><div>Организации<div class="sorting"><div class="top"></div><div class="bottom"></div></div></div></th>
				<th><div>Дата и время установки<div class="sorting"><div class="top"></div><div class="bottom"></div></div></div></th>
			</tr>
			<tr>
				<td><a href="/">Такси 1</a></td>
				<td><a href="/">Транспортная телематика</a></td>
				<td>Asymbix 1.22.235 12:21</td>
				<td><a href="#" class="ok-c">Работает</a></td>
				<td><a href="/">3/4</a></td>
				<td><a href="/">12</a></td>
				<td><span>12.12.2012</span><span>04:20</span></td>
			</tr>
			<tr>
				<td><a href="/">Такси 19</a></td>
				<td><a href="/">Транспортная телематика</a></td>
				<td>Asymbix 1.22.235 12:21</td>
				<td><a href="#" class="ok-c">Работает</a></td>
				<td><a href="/">3/8</a></td>
				<td><a href="/">18</a></td>
				<td><span>12.12.2012</span><span>04:20</span></td>
			</tr>
			<tr>
				<td><a href="/">Такси 10</a></td>
				<td><a href="/">Транспортная телематика</a></td>
				<td>Конфигурация 1.22.235 12:21</td>
				<td><a href="#" class="error-c">Ошибка</a></td>
				<td><a href="/">2/4</a></td>
				<td><a href="/">24</a></td>
				<td><span>12.12.2012</span><span>04:20</span></td>
			</tr>
			<tr>
				<td><a href="/">Такси 1000</a></td>
				<td><a href="/">Транспортная телематика</a></td>
				<td>Asymbix 1.22.235 12:21</td>
				<td><a href="#" class="stop-c">Остановлена</a></td>
				<td><a href="/">2/4</a></td>
				<td><a href="/">24</a></td>
				<td><span>12.12.2012</span><span>04:20</span></td>
			</tr>
			<tr>
				<td><a href="/">Такси 100</a></td>
				<td><a href="/">Транспортная телематика</a></td>
				<td>Конфигурация 1.22.235 12:21</td>
				<td><a href="#" class="ok-c">Работает</a></td>
				<td><a href="/">2/4</a></td>
				<td><a href="/">20</a></td>
				<td><span>12.12.2012</span><span>04:20</span></td>
			</tr>
			<tr>
				<td><a href="/">Такси 155</a></td>
				<td><a href="/">Транспортная телематика</a></td>
				<td>Asymbix 1.22.235 12:21</td>
				<td><a href="#" class="error-c">Ошибка</a></td>
				<td><a href="/">2/4</a></td>
				<td><a href="/">4</a></td>
				<td><span>12.12.2012</span><span>04:20</span></td>
			</tr>
			<tr>
				<td><a href="/">Такси 125</a></td>
				<td><a href="/">Транспортная телематика</a></td>
				<td>Конфигурация 1.22.235 12:21</td>
				<td><a href="#" class="ok-c">Работает</a></td>
				<td><a href="/">2/4</a></td>
				<td><a href="/">4</a></td>
				<td><span>12.12.2012</span><span>04:20</span></td>
			</tr>
			<tr>
				<td><a href="/">Такси 15</a></td>
				<td><a href="/">Транспортная телематика</a></td>
				<td>Asymbix 1.22.235 12:21</td>
				<td><a href="#" class="ok-c">Работает</a></td>
				<td><a href="/">12/4</a></td>
				<td><a href="/">1</a></td>
				<td><span>12.12.2012</span><span>04:20</span></td>
			</tr>
			<tr>
				<td><a href="/">Такси 12</a></td>
				<td><a href="/">Транспортная телематика</a></td>
				<td>Asymbix 1.22.235 12:21а</td>
				<td><a href="#" class="stop-c">Остановлена</a></td>
				<td><a href="/">2/4</a></td>
				<td><a href="/">4</a></td>
				<td><span>12.12.2012</span><span>04:20</span></td>
			</tr>
		</table>
	</div>
	<!-- end component -->
<div class="clear"></div>
</div>
<!-- end content cabinet -->
<div class="end-page"></div>
</div>
<!-- end page -->
<!-- footer -->
<div class="footer">
&#169 Все права защиищены. Копирование запрещено. 2012-<?php echo (date(Y)); ?>
</div>
<!-- end footer -->
<!-- select -->
<script>
$(function() {


		var select = $('select');
							
		select.each(function() {
 
				/**
				 * vars
				 */
				var $this = $(this);
				var select_main = $('<div />', { class: 'select-main' }).insertAfter(this);
				var select_wrap = $('<div />', { class: 'select-wrapper' }).appendTo(select_main);
				var span = $('<span />').appendTo(select_wrap);
				var div_button = $('<div />').appendTo(select_wrap);
				var select_menu = $('<ul />', { class: 'select-menu' }).appendTo(select_main);	
				var input = $('<input />', { type: 'hidden', name: this.name }).appendTo(select_main);
				var toggler;
 
				/** 
				 * add css styles по нужной ширине - в зависимости от содержимого присваивается ширина элементу 
				
				select_wrap.css('height', $this.height()).add(select_menu).css('width',$this.width());
				$this.css('display', 'none');
				 */
				/**
				 * create menu
				 */
				span.html(this.options[0].innerHTML);
				input.attr('value', this.options[0].value);
 
 
				for(var i=0; i < this.options.length; i++) {
					$('<li />', { value:this.options[i].value, html: this.options[i].innerHTML }).appendTo(select_menu).click(function() {
						span.html(this.innerHTML);
						input.attr('value', this.value);

						select_menu.hide();
						toggler = !toggler;
					});
				}
									
				select_wrap.click(function() {
					if (!toggler) {
						select_menu.show();
						
					} else {
						select_menu.hide();
					}
					toggler = !toggler;
				});
																												
																		
		});
 
});
</script>
<!-- end select -->
</body>
</html>
