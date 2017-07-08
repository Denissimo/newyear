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


<link rel="stylesheet" href="/css/bootstrap3/css/bootstrap.min.css" />
<!--<link rel="stylesheet" href="/css/bootstrap3/css/bootswatch.css" />-->
<link rel="stylesheet" href="/css/jquery_1_10/jquery-ui-1.10.4.custom.css" />

<link rel="stylesheet" href="/css/bootsnew.css" />
<link rel="stylesheet" href="/css/flowers.css" />


<script src="/js/jquery_1_10/jquery-1.10.2.js"></script>
<script src="/js/jquery_1_10/jquery-ui-1.10.4.custom.js"></script>
<!--
<script src="/js/jquery.mobile-1.4.3.min.js"></script>
<script src="/js/jquery.maskedinput-1.3.js"></script>
-->
<script src="/css/bootstrap3/js/bootstrap.min.js"></script>
<script src="/css/bootstrap3/js/respond.js"></script>
<script src="/js/row.js"></script>



</head>

<body>

<div class="container">

<nav class="navbar navbar-sky">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/imag/back/logo3.png" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Наши цветы<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Игрушки из цветов</a></li>
            <li><a href="#">Букеты</a></li>
            <li><a href="#">Свадебные</a></li>
            <li><a href="#">Корзины</a></li>
            <li><a href="#">Цветы</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        <li class="active"><a href="#">Доставка</a></li>
        <li><a href="#">Оплата</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Гарантии</a></li>

      </ul>
      <!--
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      -->
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

<!--<div class="separator">11111111111111&nbsp;</div>-->
<div class="row">
<div class="col-md-10 col-md-offset-2 bcrumb">
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
  <li><a id="tt-user" href="#" data-position="right" class="popuper ui-link" data-ref="#authentication" data-position-to="window" data-transition="pop" data-toggle="modal" data-target="#myModal">Пользователь</a></li>
</ol>  
</div>
</div>
<div class="separator">&nbsp;</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f125.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>

</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f135.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f148.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f151.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f159.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f163.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f149.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f202.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>


<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f125.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>

</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f135.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f148.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f151.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f159.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f163.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f149.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>

<div class="goodunit goodunit-sky">
<a href="#"><img src="/imag/flowers/f202.png" /></a>
<div class="row"><div class="col-md-10 col-md-offset-1 bukname text-center"><a href="#">Название композиции</a></div></div>
<div class="row mart5">
	<div class="col-md-6 col-md-offset-1 price-sky">
	7450&nbsp;&#8381;
	</div>
	<div class="col-md-4">
		<form action="[{post}]" method="post">
		<input type="hidden" name="good_id" value="[>good_id<]">
		<input type="submit" name="good2basket" class="btn btn-sky" value="Заказать">
		</form>
	</div>
</div>
</div>
[>content<]




</div> <!-- /.container -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Авторизация</h4>
      </div>
      <div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Логин</label>
					<input type="email" class="form-control" id="tt-username" placeholder="testuser" value="LOGIN">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Пароль</label>
					<input type="password" class="form-control" id="tt-pswd" placeholder="Password" value="PASSWORD">
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary ui-link ui-btn ui-btn-inline ui-shadow ui-corner-all" id="tt-login" href="#" data-rel="back"  data-dismiss="modal">Вход</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal 

<script src="/js/nativedroid.script.js"></script>
<script src="/js/ttbank.js"></script>
-->
</body>
</html>