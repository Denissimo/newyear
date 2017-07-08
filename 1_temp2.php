<?
header('Content-type: text/html; charset=utf-8');
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Партнерам | Такси 1331</title>
<meta name="GENERATOR" content="
 -= Amiro.CMS (c) =- 
 www.amiro.ru 
">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="robots" content="index,follow">
<meta name="keywords" content="партнерам, если, управляете, владеете, таксомоторным, парком, можем, предложить, увеличить, доход, вашего, бизнеса, подключив, свои, автомобили, нашей, системе, нами, можете, получать, вывоза, подключенными, водителями, схема, работы, очень, проста">
<meta name="description" content="Партнерам. Если Вы управляете или владеете таксомоторным парком, мы можем предложить Вам увеличить доход Вашего бизнеса, подключив свои автомобили к нашей системе! С нами Вы можете получать до 10% от вывоза подключенными водителями!Схема работы очень">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="/css/bootstrap3/bootstrap.css" />
<link rel="stylesheet" href="/css/bootsnew.css" />

<link rel="stylesheet" href="/css/system.css" type="text/css">
<link rel="stylesheet" href="/_mod_files/_css/plugins.css?_ts=1318231583&_cv=5.14.0.16" type="text/css">
<link rel="stylesheet" href="/_mod_files/_css/home2.css?_cv=5.14.0.16" type="text/css">
<link rel="stylesheet" href="/css/taxi.css" />

<meta name="viewport" content="width=device-width, initial-scale=0.25">

<link rel="stylesheet" type="text/css" href="/calculate/calculate.css">
<link rel="stylesheet" type="text/css" href="/calculate/tabs.css">
<link rel="stylesheet" type="text/css" href="/calculate/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="/calculate/jquery-ui.css">



<link rel="stylesheet" href="/newstyle.css" type="text/css">



<script src="/js/jquery_1_10/jquery-1.10.2.js"></script>
<script src="/js/jquery_1_10/jquery-ui-1.10.4.custom.js"></script>
<script src="/js/go_test_ajax.js"></script>


<!--[if IE]>
<style type="text/css">
.menusplitter, .futr{width: 1068px;}
</style>
<![endif]--></head>

<body >

    <div id="stat"></div>
        <div id="body_wrap">
           
        
 <div id="lay_f1">
     
     <a href="http://zingaya.com/widget/8b035905638126e7f6b58522b4f51026" onclick="window.open(this.href+'?referrer='+escape(window.location.href), '_blank', 'width=236,height=220,resizable=no,toolbar=no,menubar=no,location=no,status=no'); return false" class="zingaya_button"><div class="zvonokzing" align="center">ЗВОНОК С<br>
 САЙТА</div></a>
<a href="" title="Такси"><div class="logo"></div></a> <br>
<br>
<div class="nav_head">  <br>
    <a href=""><div class="home_head"></div></a> 
    <a href="sitemap.html"><div class="map_head"></div></a> 
    <a href=""><div class="feed_head"></div></a> 
</div>

<div class="telefon_ba2"><br>
    <div class="zvonok"></div>
</div>

<div class="callback" style="margin-left:-150px;">
    <a class="noCall" href="#noCall">
        <img src="/calculate/images/nd-button.png">
    </a>
</div>
<div class="callback" style="margin-left: 175px; cursor:pointer">
    <a onClick="document.getElementById('parent_popup').style.display='block';">
        <img src="/calculate/images/otz-button.png">
    </a>
</div>


<div id="parent_popup">
	<div id="popup">
		  
			<div class="des">Имя:</div>
			<div class="pole"><input type="text" name="oname" id="oname" /></div>
			<div class="des">Номер телефона:</div>
			<div class="pole"><input type="text" name="ophone" id="ophone" /></div>
			<div class="des">Email:</div>
			<div class="pole"><input type="text" name="oemail" id="oemail" /></div>
			<div class="des">Опишите вашу проблему:<span style="color:#FF0000">*</span></div>
			<div class="pole"><textarea style="width:250px; height:100px" name="oproblem" id="oproblem"></textarea></div>
			<div class="des">Проверочный код:</div>
			<div class="pole"><img id="keyim" alt="Проверка ботов" src="http://1331.ru/captcha.php"></div>
						<div class="des">Введите код:</div>
			<div class="pole">
			<input type="text" name="okey" id="okey" maxlength="4" size="4" style="margin-right:15px;" />
			<img onClick="refreshkey();" style="cursor: pointer" src="http://1331.ru/calculate/images/refreshred.png">
			</div>
			
			<button id="osendproblem" onClick="send_form();">Отправить</button>
			<div id="oerrblock"></div>
		  
		  <a class="close" title="Закрыть" onClick="document.getElementById('parent_popup').style.display='none';">X</a>
	</div>
</div>


<style>
    
/* Всплывающее окно */	
#parent_popup {
  background-color: rgba(0, 0, 0, 0.8);
  display: none;
  position: fixed;
  z-index: 99999;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
#popup { 
 	background: #fff;
 	margin: 200px auto;
	width:400px;
	overflow: visible;
	padding: 10px;
	
	position: relative;
	/*--CSS3 CSS3 Тени для Блока--*/
	-webkit-box-shadow: 0px 0px 20px #000;
	-moz-box-shadow: 0px 0px 20px #000;
	box-shadow: 0px 0px 20px #000;
	/*--CSS3 Закругленные углы--*/
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}

/* кнопка закрытия */
.close {
    background-color: #000;
	border: 2px solid #ccc;
	cursor: pointer;
	
    height: 24px;
	width: 24px;
    line-height: 24px;
    position: absolute;
    right: -15px;
	top: -15px;
	
    font-weight: bold;
    text-align: center;
    text-decoration: none;
	color: rgba(255, 255, 255, 0.9);
    font-size: 12px;
    text-shadow: 0 -1px rgba(0, 0, 0, 0.9);
    
    
	-webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    -ms-border-radius: 15px;
    -o-border-radius: 15px;
    border-radius: 15px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
}
.close:hover {
    background-color: rgba(0, 122, 200, 0.8);
}

.pole{
margin-bottom: 5px;
width:100%;
}
.des{
color: #666666;
margin-right:10px;
width: 100%;
}

#errblock{
width:80%;
margin:5px auto;
color:#990000
}
</style>


<br>
<div class="menusplitter"><spec_mark name=spec_main_menu_00100133></spec_mark>
<ul class="mainMenu">
        
<li class="menuItem">
    
        <a  href="">Главная</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="tarify/">Тарифы</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="service">Услуги</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="akcii">Акции</a>
    
    <ul class="subMenu">
<li class="pulldownItem">
    
        <a class="subMenu_a" href="akcii/gorjaschie-predlozhenija" >Горящие предложения</a>
    
</li>

<li class="pulldownItem">
    
        <a class="subMenu_a" href="akcii/discount" >Дисконтные карты</a>
    
</li>
</ul>
</li>

<li class="menuItem">
    
        <a  href="on-line-tablo-aeroportov/">On-line табло аэропортов</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="rabota-v-kompanii/">Работа в компании</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="korporativnym-klientam/">Корпоративным клиентам</a>
    
    
</li>

<li class="menuItem">
    
        <a  class="item_active" href="partners/">Партнерам</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="nashi-partnery/">Наши партнёры</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="contacts">Контакты</a>
    
    
</li>

    </ul><spec_mark_ name=spec_main_menu_00100133></spec_mark_></div>
<div class="zvonokssayta"></div>

<div class="b-switch-city">
	<a href="javascript:;" class="b-switch-city__active">Москва &#9660;</a>
	<ul class="b-switch-city__options" style="display:none;">
                <li class="b-switch-city__option b-switch-city__option_tab"><a href="http://1331.ru/dmitrov/">Дмитров</a></li>
		<li class="b-switch-city__option"><a href="http://1331.ru/samara/">Самара</a></li>
	</ul>	
</div></div>
        
       
            
        <div id="wrapper">
         <div id="lay_f2"><ul class="aroundCity">
    <li class="head">По городу</li>
    <li><div class="title">От</div><span><input class="from autocomp" value="" type="text"></span></li>
    <li><div class="title">До</div><span><input class="to autocomp" value="" type="text"></span></li>
    <li class="errorMes"></li>
    <li><a class="calculate" href="javascript:void(0)">Рассчитать</a></li>
</ul>
<div class="splitter"></div>
<ul class="airport">
    <li class="head"><span class="in active">В</span><span class="out">Из</span>&nbsp;Аэропорт</li>
    <li class="fromList">
	<div class="title">От</div>
	<select class="from" name="regions">
            <option disabled="disabled" selected="selected" value="">Выберите...</option>
            <option>Центральный АО</option>
            <option>Западный АО</option>
            <option>Северо-Западный АО</option>
            <option>Северный АО</option>
            <option>Северо-Восточный АО</option>
            <option>Восточный АО</option>
            <option>Юго-Восточный АО</option>
            <option>Южный АО</option>
            <option>Юго-Западный АО</option>
            <option>Вокзал</option>
            <option>Шереметьево 1, 2</option>
            <option>Внуково</option>
            <option>Домодедово</option>
        </select>
    </li>
    <li class="toList">
	<div class="title">До</div>
	<select class="to" name="airport">
            <option disabled="disabled" selected="selected" value="">Выберите...</option>
            <option>Шереметьево 1, 2</option>
            <option>Домодедово</option>
            <option>Внуково</option>
        </select>
    </li>
    <li class="costWrapper">
	<ul>
            <li><div class="titleCost" title="Стандарт">Класс «Стандарт»</div><input value="" class="cost" disabled="disabled" type="text">руб.</li>
            <li><div class="titleCost" title="Комфорт">Класс «Комфорт»</div><input value="" class="cost" disabled="disabled" type="text">руб.</li>
            <li><div class="titleCost" title="Бизнес">Класс «Бизнес»</div><input value="" class="cost" disabled="disabled" type="text">руб.</li>
            <li><div class="titleCost" title="Минивен 5-6">Класс «Минивен (5-6 мест)»</div><input value="" class="cost" disabled="disabled" type="text">руб.</li>
            <li><div class="titleCost" title="Минивен 7-8">Класс «Минивен (7-8 мест)»</div><input value="" class="cost" disabled="disabled" type="text">руб.</li>
	</ul>
    </li>
    <li>
        <a class="order airport" href="#formDemand">Заказать</a>
        <a class="calculate" href="javascript:void(0)">Рассчитать</a>
    </li>
</ul>
<div class="splitter"></div>
<ul class="stations">
    <li class="head"><span class="in active">На</span><span class="out">С</span> Вокзал</li>
    <li class="fromList">
        <div class="title">От</div>
	<input class="from autocomp" value="" name="from" type="text">
    </li>
    <li class="toList">
        <div class="title">До</div>
        <select class="to" name="to">
            <option disabled="disabled" selected="selected" value="">Выберите...</option>
            <option value="Белорусский вокзал">Белорусский</option>
            <option value="Казанский вокзал">Казанский</option>
            <option value="Киевский вокзал">Киевский</option>
            <option value="Курский вокзал">Курский</option>
            <option value="Ленинградский вокзал">Ленинградский</option>
            <option value="Павелецкий вокзал">Павелецкий</option>
            <option value="Рижский вокзал">Рижский</option>
            <option value="Савёловский вокзал">Савёловский</option>
            <option value="Ярославский вокзал">Ярославский</option>
            <option value="Северный речной вокзал">Северный речной</option>
            <option value="Южный речной вокзал">Южный речной</option>
            <option value="Центральный автовокзал">Щелковский</option>
        </select>
    </li>
    <li class="option">
        <ul>
            <li><div class="title">Расстояние:</div><input class="distance" value="" disabled="disabled" type="text"><span></span></li>
            <li><div class="title">Время в пути:</div><input class="timeWay" value="" disabled="disabled" type="text"><span></span></li>
        </ul>
        <ul class="costWrapper">
            <li>
                <div class="titleCost" title="Стандарт">Класс «Стандарт»</div>
                <input value="" class="cost" disabled="disabled" type="text">руб.
            </li>
            <li>
                <div class="titleCost" title="Комфорт">Класс «Комфорт»</div>
                <input value="" class="cost" disabled="disabled" type="text">руб.
            </li>
            <li>
                <div class="titleCost" title="Бизнес">Класс «Бизнес»</div>
                <input value="" class="cost" disabled="disabled" type="text">руб.
            </li>
        </ul>
    </li>
    <li class="errorMes"></li>
    <li>
        <a class="order" href="#formDemand">Заказать</a>
        <a class="calculate" href="javascript:void(0)">Рассчитать</a>
    </li>
</ul>
<div id="formDemand">
    <form action="">
        <fieldset>
            <legend>Заявка</legend>
            <input type="hidden" name="type" value="demand">
            <ul class="fields">
                <li><div class="title">Имя:</div><input class="name" name="name" value="" type="text"></li>
                <li><div class="title">Телефон:<span>*</span></div><input class="telephone" name="telephone" value="" type="text"></li>
                <li class="listFT"><div class="title"><span class="ft">Куда:</span><span>*</span></div><input class="autocomp" value="" type="text"></li>
            </ul>
            <div class="route">
                <h2>Маршрут</h2>
                <input disabled="disabled" value="" class="from" type="text">→<input disabled="disabled" value="" class="to" type="text">
            </div>
            <div>	
                <span class="title">Класс</span>
                <select class="tariff" name="tariff">
                    <option>Стандарт</option>
                    <option>Комфорт</option>
                    <option>Бизнес</option>
                </select>
                <span class="title">Стоимость</span>
                <input disabled="disabled" value="" class="cost" name="cost" type="text">руб.
            </div>
            <div class="priceTitle">Цены приблизительные, уточняйте у оператора</div>	
            <div class="obligatory">* - обязательные поля</div>
            <div class="captcha">
                <img src="" alt="Проверка ботов" class="captchaImg">
                <input type="text" value="" class="textCapcha" size="4">
                <a href="javascript:void(0)" class="refresh" title="Обновить"><img src="/calculate/images/refreshred.png"></a>
            </div>	
            <div><input value="Отправить" class="submit" type="submit"></div>
        </fieldset>
    </form>
</div>
<div id="map">
    <div class="titleMap">Схема проезда:</div>
    <div id="Ymap"></div>
    <ul class="fieldsMap">
        <li>Вы собираетесь вызвать такси по маршруту:</li>
        <li><span class="from"></span>→<span class="to"></span></li>
        <li>Расстояние: <span class="distance"></span></li>
        <li>Поездка займёт примерно: <span class="time_way"></span></li>
        <li>
            <div class="titleCosts">Минимальная стоимость поездки без учета дополнительных услуг</div>
            <ul class="fieldsCost">
                <li><div class="title" title="Стандарт">в такси класса «Стандарт»</div> – <span class="cost">0</span>руб.</li>
                <li><div class="title" title="Комфорт">в такси класса «Комфорт»</div> – <span class="cost">0</span>руб.</li>
                <li><div class="title" title="Бизнес">в такси класса «Бизнес»</div> – <span class="cost">0</span>руб.</li>
                <!--
                <li><div class="title" title="Минивен 5-6">в такси класса «Минивен 5-6»</div> – <span class="cost">0</span>руб.</li>
                <li><div class="title" title="Минивен 7-8">в такси класса «Минивен 7-8»</div> – <span class="cost">0</span>руб.</li>
                -->
            </ul>
            <span class="addit">Цены приблизителные, уточнайте у оператора</span>
            <a class="next" href="javascript:void(0)">Заказать</a>
        </li>
    </ul>
</div>
<div id="onlineOrder">
    <form action="">
        <fieldset>
            <legend>Онлайн заказ</legend>
            <input name="type" value="onlineOrder" type="hidden">
            <ul>
                <li><div class="title">Имя:</div><input class="name" value="" name="name" type="text"></li>
                <li><div class="title">Телефон:<span>*</span></div><input class="telephone" value="" name="telephone" type="text"></li>
                <li>
                    <input class="datepicker" value="" readonly name="date" type="text">
                    <select class="hour" name="hour">
                        <option>00</option><option>01</option>
                        <option>02</option><option>03</option>
                        <option>04</option><option>05</option>
			<option>06</option><option>07</option>
                        <option>08</option><option>09</option>
                        <option>10</option><option>11</option>
                        <option>12</option><option>13</option>
                        <option>14</option><option>15</option>
                        <option>16</option><option>17</option>
                        <option>18</option><option>19</option>
                        <option>20</option><option>21</option>
                        <option>22</option><option>23</option>
                    </select>
                    <select class="minutes" name="minutes">
                        <option>00</option><option>05</option>
                        <option>10</option><option>15</option>
                        <option>20</option><option>25</option>
                        <option>30</option><option>35</option>
                        <option>40</option><option>45</option>
                        <option>50</option><option>55</option>
                    </select>
                </li>
                <li>
                    <div class="other">
                        <div>
                            <span>Откуда:<span>*</span></span>
                            <div class="wrapItem">
                                <a class="item" href="javascript:void(0)">аэропорт</a>|<a class="item" href="javascript:void(0)">вокзал</a>|<a class="item active" href="javascript:void(0)">адрес</a>
                            </div>
                        </div>
                        <ul class="option airport">
                            <li><a href="javascript: void(0)">Домодедово</a></li>
                            <li><a href="javascript: void(0)">Шереметьево 1,2</a></li>
                            <li><a href="javascript: void(0)">Внуково</a></li>
                        </ul>
                        <ul class="option stations">
                            <li><a href="javascript: void(0)">Белорусский</a></li>
                            <li><a href="javascript: void(0)">Казанский</a></li>
                            <li><a href="javascript: void(0)">Киевский</a></li>
                            <li><a href="javascript: void(0)">Курский</a></li>
                            <li><a href="javascript: void(0)">Ленинградский</a></li>
                            <li><a href="javascript: void(0)">Павелецкий</a></li>
                            <li><a href="javascript: void(0)">Рижский</a></li>
                            <li><a href="javascript: void(0)">Савёловский</a></li>
                            <li><a href="javascript: void(0)">Ярославский</a></li>
                            <li><a href="javascript: void(0)">Северный речной</a></li>
                            <li><a href="javascript: void(0)">Южный речной</a></li>
                            <li><a href="javascript: void(0)">Щелковский</a></li>
                        </ul>
                    </div>
                <input class="from autocomp" value="" type="text">
                </li>
                <li>
                    <div class="other">
                        <div>
                            <span>Куда:<span>*</span></span>
                            <div class="wrapItem">
                                <a class="item" href="javascript:void(0)">аэропорт</a>|<a class="item" href="javascript:void(0)">вокзал</a>|<a class="item active" href="javascript:void(0)">адрес</a>
                            </div>
                        </div>
                        <ul class="option airport">
                            <li><a href="javascript: void(0)">Домодедово</a></li>
                            <li><a href="javascript: void(0)">Шереметьево 1,2</a></li>
                            <li><a href="javascript: void(0)">Внуково</a></li>
                        </ul>
                        <ul class="option stations">
                            <li><a href="javascript: void(0)">Белорусский</a></li>
                            <li><a href="javascript: void(0)">Казанский</a></li>
                            <li><a href="javascript: void(0)">Киевский</a></li>
                            <li><a href="javascript: void(0)">Курский</a></li>
                            <li><a href="javascript: void(0)">Ленинградский</a></li>
                            <li><a href="javascript: void(0)">Павелецкий</a></li>
                            <li><a href="javascript: void(0)">Рижский</a></li>
                            <li><a href="javascript: void(0)">Савёловский</a></li>
                            <li><a href="javascript: void(0)">Ярославский</a></li>
                            <li><a href="javascript: void(0)">Северный речной</a></li>
                            <li><a href="javascript: void(0)">Южный речной</a></li>
                            <li><a href="javascript: void(0)">Щелковский</a></li>
                        </ul>
                    </div>
                    <input class="to autocomp" value="" type="text">
                </li>
                <li><span>Дополнительно:</span><textarea class="additional" name="additional"></textarea></li>
                <li>
                    <div class="captcha">
                        <img src="" alt="Проверка ботов" class="captchaImg">
                        <input type="text" value="" class="textCapcha" size="4">
                        <a href="javascript:void(0)" class="refresh" title="Обновить"><img src="/calculate/images/refreshred.png"></a>
                    </div>
                    <input value="Заказать такси" class="submit" type="submit">
                    <div class="clearFix"></div>
                </li>
            </ul>
        </fieldset>
    </form>
</div>
<div id="callMe">
    <form action="">
        <fieldset>
            <legend></legend>
            <input name="type" value="callMe" type="hidden">
            <ul>
                <li><div class="title">Имя:</div><input value="" class="name" name="name" size="20" type="text"></li>
                <li><div class="title">Телефон:<span>*</span></div><input value="" class="telephone" name="telephone" size="15" type="text"></li>
                <li>
                    <div class="captcha">
                        <img src="" alt="Проверка ботов" class="captchaImg">
                        <div>
                            <input type="text" value="" class="textCapcha" size="4">
                            <a href="javascript:void(0)" class="refresh" title="Обновить"><img src="/calculate/images/refreshred.png"></a>
                        </div>
                    </div>
                    <input class="submit" value="Отправить" type="submit">
                </li>
            </ul>
        </fieldset>
    </form>
</div>
<div id="noCall">
    <form action="">
        <fieldset>
            <legend></legend>
            <input name="type" value="callMe" type="hidden">
            <ul>
                <li><div class="title">Имя:</div><input value="" class="name" name="name" size="20" type="text"></li>
                <li><div class="title">Телефон:<span>*</span></div><input value="" class="telephone" name="telephone" size="15" type="text"></li>
                <li><div class="title">Причина:</div>
                <select class="reason" name="reason">
                    <option>Номер набран не верно!</option>
                    <option>Не отвечает!</option>
                    <option>Занято!</option>
                </select>
                </li>
                <li>
                    <div class="captcha">
                        <img src="" alt="Проверка ботов" class="captchaImg">
                        <div>
                            <input type="text" value="" class="textCapcha" size="4">
                            <a href="javascript:void(0)" class="refresh" title="Обновить"><img src="/calculate/images/refreshred.png"></a>
                        </div>
                    </div>
                    <input class="submit" value="Отправить" type="submit">
                </li>
            </ul>
        </fieldset>
    </form>
</div>
<div class="splitter"></div>
<br><h2 style="margin-bottom: 0cm;">Новости</h2><br><spec_mark name=spec_small_news_00100233></spec_mark>

<table cellspacing=0 cellpadding=0 border=0 width=100% class="small_news"><tr>
  <td valign=top  class="small_news_item_row" >
            <div class="h1"><div class="small_news_item_header"><a href="novosti/2014">ПОЗДРАВЛЯЕМ С НОВЫМ ГОДОМ И РОЖДЕСТВОМ!&nbsp;</a></div></div>
    <div class="small_news_item_announce">Дорогие друзья! Поздравляет Вас с наступающим Новым годом и Рождеством.
Благодарим Вас за то, что в 2013 году вы выбрали Такси 1331. Пусть в грядущем году Вам сопутствует удача.  А мы, как и прежде, максимально быстро доставим Вас в пункт назначения с комфортом.&nbsp;</div>
    <div>  </div>
    <div> </div>
    
    
  </td>
</tr></table>

<br>
<div class="small_news_rss" align="right">
<a href="http://1331.ru/novosti?action=export_rss" target="_blank"><img src="http://1331.ru/_img/rss.gif" border="0"></a></div>
<a href="novosti/">Другие новости</a>
<spec_mark_ name=spec_small_news_00100233></spec_mark_><br><br>
<div class="splitter"></div>
<a href="http://1331.ru/akcii/tez-tur"><img src="http://1331.ru/_mod_files/ce_images/banners/banner-tt_new.gif" width="230px" /></a>
<div class="splitter"></div>
<div class="statyi">
    <h2 style="margin-bottom: 0cm;">Статьи</h2><br><spec_mark name=spec_small_news_00200233></spec_mark>

<table cellspacing=0 cellpadding=0 border=0 width=100% class="small_news">
  <td valign=top  class="small_news_item_row" >
    <div class="small_news_item_date">14.08.13&nbsp;</div>
          <div class="h1"><div class="small_news_item_header"><a href="ctati/sovety-po-zaschite-avtomobilja-ot">Советы по защите автомобиля от угона&nbsp;</a></div></div>
        <div>  </div>
    <div> </div>
    
    
  </td>

</tr><tr><td height="30px" colspan=10><hr></td></tr><tr>

  <td valign=top  class="small_news_item_row" >
    <div class="small_news_item_date">08.08.13&nbsp;</div>
          <div class="h1"><div class="small_news_item_header"><a href="ctati/o-programme-lgotnogo-avtokreditovanija">О программе льготного автокредитования&nbsp;</a></div></div>
        <div>  </div>
    <div> </div>
    
    
  </td>

</tr><tr><td height="30px" colspan=10><hr></td></tr><tr>

  <td valign=top  class="small_news_item_row" >
    <div class="small_news_item_date">18.07.13&nbsp;</div>
          <div class="h1"><div class="small_news_item_header"><a href="ctati/predlozhenija-po-uslugam-taksi">Предложения по услугам такси&nbsp;</a></div></div>
        <div>  </div>
    <div> </div>
    
    
  </td>
</table>

<br>
<div class="small_news_rss" align="right"> 
<a href="http://1331.ru/ctati?action=export_rss" target="_blank"><img src="http://1331.ru/_img/rss.gif" border="0"></a></div>
<a href="ctati/">Другие статьи</a>
<spec_mark_ name=spec_small_news_00200233></spec_mark_><br><br>
</div>
</div>
        <div id="lay2_body"> <div id="lay_body">
                        <spec_mark name=status_messages></spec_mark><spec_mark_ name=status_messages></spec_mark_>
            













<div class="pages_name">
	</div>



 
<div>

CONTENT<br />
CONTENT<br />
CONTENT<br />
CONTENT<br />
CONTENT<br />
CONTENT<br />
CONTENT<br />
CONTENT<br />

<form action='http://95.85.40.115:3000/driver/catalog' method='post' name='test1'>
<input type="hidden" name="telephon" value="9035634034">
<input name='test' type='submit' value='Готово' /></form>

<?
/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://95.85.40.115:3000/driver/catalog');
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// разрешаем перенаправление
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // указываем, что результат запроса следует передать в переменную, а не вывести на экран
curl_setopt($ch, CURLOPT_TIMEOUT, 3); // таймаут соединения
curl_setopt($ch, CURLOPT_POST, 1); // указываем, что данные надо передать именно методом POST
curl_setopt($ch, CURLOPT_POSTFIELDS, "a=1");
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
print_r($ch); 
$res001 = json_decode(curl_exec($ch));
curl_close($ch); // завершаем сессию
echo '<br>++++<br>';
//print_r($ch); 
echo '>>>'.is_object($res001);
echo '<br>++++<br>';
echo '<pre>';
print_r($res001->areas[0]->name);
echo '</pre>';
*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://95.85.40.115:3000/site/client_info?telephone=9035634034');
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// разрешаем перенаправление
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // указываем, что результат запроса следует передать в переменную, а не вывести на экран
curl_setopt($ch, CURLOPT_TIMEOUT, 60); // таймаут соединения
//curl_setopt($ch, CURLOPT_POST, 1); // указываем, что данные надо передать именно методом POST
//curl_setopt($ch, CURLOPT_POSTFIELDS, "telephone=9035634034");
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
print_r($ch); 
$res001 = json_decode(curl_exec($ch));
curl_close($ch); // завершаем сессию
echo '<br>++++<br>';
//print_r($ch); 
echo '>>>'.is_object($res001);
echo '<br>++++<br>';
echo '<pre>';
print_r($res001);
echo '</pre>';

/*
foreach($res001 as $key=>$val){
	echo '<br />'.$key;
}
*/
?>


</div>

</div> </div>
               
                
                <br style="clear: both;">
        
                 
                </div>
            <div id="lay_f3"><div class="futr">
<spec_mark name=spec_bottom_menu_00100333></spec_mark>
             <ul class="mainMenu">
             
<li class="menuItem">
    
        <a  href="">Главная</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="tarify/">Тарифы</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="service">Услуги</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="akcii">Акции</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="on-line-tablo-aeroportov/">On-line табло аэропортов</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="rabota-v-kompanii/">Работа в компании</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="korporativnym-klientam/">Корпоративным клиентам</a>
    
    
</li>

<li class="menuItem">
    
        <a  class="item_active" href="partners/">Партнерам</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="nashi-partnery/">Наши партнёры</a>
    
    
</li>

<li class="menuItem">
    
        <a  href="contacts">Контакты</a>
    
    
</li>
</ul>
<spec_mark_ name=spec_bottom_menu_00100333></spec_mark_>


    
</div>

<a class="oferta" href="_mod_files/_upload/oferta.doc"><img src="_mod_files/_upload/page_white_word.png">Публичная оферта</a> 

<div class="copyrayt">
© Все права защищены <br>ООО "Диспетчерская служба 1331"
        
    
</div>
<div class="schetchik">
<script type="text/javascript">document.write("<a href='http://www.liveinternet.ru/click' target=_blank><img src='//counter.yadro.ru/hit?t45.4;r" + escape(document.referrer) + ((typeof(screen)=="undefined")?"":";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)) + ";u" + escape(document.URL) +";h"+escape(document.title.substring(0,80)) +  ";" + Math.random() + "' border=0 width=31 height=31 alt='' title='LiveInternet'><\/a>")</script>
</div>
</div>
            </div>



</body>
</html>