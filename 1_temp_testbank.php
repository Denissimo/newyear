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
<link rel="stylesheet" href="/css/jquery_1_10/jquery-ui-1.10.4.custom.css" />

<link rel="stylesheet" href="/css/bootsnew_tbank.css" />
<link rel="stylesheet" href="/css/testbank.css" />


<script src="/js/jquery_1_10/jquery-1.10.2.js"></script>
<script src="/js/jquery_1_10/jquery-ui-1.10.4.custom.js"></script>
<script src="/css/bootstrap3/js/bootstrap.min.js"></script>
<script src="/js/row.js"></script>



</head>

<body>
<div class="separator">&nbsp;</div>
<div class="container shad2">
<div class="marhor10">
  

<nav class="navbar navbar-yellow" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/images/2tlogo-new-black.png" /></a>
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
            <li><a href="[{inflistacc}]">Список счетов</a></li>
            <li><a href="[{inflistcard}]">Список карт</a></li>
			<li><a href="[{infbalance}]">Остатки</a></li>
			<li class="divider"></li>
			<li><a href="[{infhistory}]">История операций</a></li>
          </ul>
        </li>
		
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Переводы<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="[{inflistacc}]">Список счетов</a></li>
            <li><a href="[{inflistcard}]">Список карт</a></li>
			<li><a href="[{infbalance}]">Остатки</a></li>
			<li class="divider"></li>
			<li><a href="[{infhistory}]">История операций</a></li>
          </ul>
        </li>
		
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Управление<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="[{inflistacc}]">Список счетов</a></li>
            <li><a href="[{inflistcard}]">Список карт</a></li>
			<li><a href="[{infbalance}]">Остатки</a></li>
			<li class="divider"></li>
			<li><a href="[{infhistory}]">История операций</a></li>
          </ul>
        </li>
		
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

<div class="separator">&nbsp;</div>

<div class="row">
<div class="col-md-10 col-md-offset-2 bcrumb">
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
   <li><a id="tt-user" href="#" data-position="right" class="popuper ui-link" data-ref="#authentication" data-position-to="window" data-transition="pop">Пользователь</a></li>
</ol>  
</div>
</div>
<div class="separator">&nbsp;</div>
[>content<]


</div>

</div> <!-- /.container -->
<script src="/js/nativedroid.script.js"></script>
<script src="/js/ttbank.js"></script>
</body>
</html>