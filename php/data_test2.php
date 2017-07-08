<?
//file_get_contents("http://promo/%D0%A2%D0%B5%D1%81%D1%82/?aaa=123&ddds=765");
//ech($http_response_header);
//$proc->kill_SDB('sdktestomni');
//echo '<br />123411<br />';

$proc->source['sdktestomni']='amazon';

//$proc->del_SDB('sdktestomni', 1);
//$proc->mod['index']=1;
//$proc->req = 'DELETE FROM sdktestomni';
//$proc->request = 'select * from sdktestomni where test02_x="4"';
//$proc->mod['limit']=1;
//$proc->mod['filter']='test02_x="8"';
$proc->fetch('sdktestomni');
$a1 = $proc->tabdata['sdktestomni'];
//$a2 = array_flip($a1);
ech($a1);


//$proc->mod['index'] = 1;
$proc->mod['limit'] = 25;
$proc->fetch('zz_bukets');
//ech($proc->tabdata['zz_bukets']);
//ech($proc->tab['zz_bukets']);
//unset($proc->tab['zz_bukets']['qty']);
//ech($proc->tabdata['zz_bukets']);

//$proc->put_SDB($proc->tabdata['zz_bukets'], 'sdktestomni');
//$amz = new AmSDB();
//ech(get_class_methods('AmSDB'));
//ech ($amz);
//ech(get_class_methods('AmSDB'));

/*
$proc->tabdata['sys_content']['button03']['content'] = $_SESSION['logged'];
$proc->formname = 't222';
$proc->form_exc = '0 row_id datetime';
$proc->form_maxlen = '30';
$mysql->load_field('events');
$form->data_check();

//echo '<br />mess: '.$form->message.'<br />';
echo $proc->form['events']['full'];*/
echo '<br /><br /><br /><br />';
echo md5('123111');
echo '<br /><br /><br /><br />

<form action="/%D0%9F%D1%80%D0%BE%D0%B1%D0%B0_2" method="post" name="user">
Фамилия  <input name="surname" type="text" value="[>surname<]" size="32" maxlength="32"> 
Имя  <input name="firstname" type="text" value="[>firstname<]" size="32" maxlength="32"> 
Отчество  <input name="middlename" type="text" value="[>middlename<]" size="32" maxlength="32"> <br />
Дата рождения <input name="birthday" type="text" value="[>birthday<]" size="10" maxlength="10" id="datepicker"> 
RFID  <input name="rfid" type="text" value="[>rfid<]" size="19" maxlength="19">
Email  <input name="email" type="text" value="[>email<]" size="32" maxlength="64"> 
Phone  <input name="phone" type="text" value="[>phone<]" size="16" maxlength="16"> <br />
Login  <input name="login" type="text" value="[>login<]" size="16" maxlength="16">
Login  <input name="pass" type="text" value="[>pass<]" size="16" maxlength="16">
<input name="typeuser" type="hidden" value="1">
<input name="adduser" type="submit" value="Готово" /></form>
';

$bb=234;
//$a='$_SERVER["REQUEST_URI"]';
//echo '<br />[>button02<][>button02<]  [>button02<]  [>button02<]<br />';
echo '<a href="'.$_SERVER["REQUEST_URI"].'">тыц</a><br />';
echo '<a href="[{test}]">тест</a><a href="[{test}]">тест</a><br />';

echo '<a href="[{test2}]">тест2</a><br />';
echo '<a href="[{test3}]">тест3</a><br />';
echo '<br />$form->message: '.$form->message;
echo '<br />'.$_SERVER['HTTP_REFERER'];
echo '<br />Сессия: '.$_SESSION['redir'];
echo '<br />Label: '.$proc->sys['label'];
echo '<br />';
//ech($proc->sys);
/*
$mer = 'Мера № 23';
$mmerr = $proc->make_url($mer);
echo '<br />mer: '.$mer.', mmerr: '.$mmerr; 
*/
unset($_SESSION['redir']);

echo '<button id="testbut">Кнопка</button><br />123456<br />';
echo ($proc->fill_url('[{test2}]/[{test3}]'));


//$country = geoip_country_code_by_name('www.example.com');
//echo '<br /><br />Хост расположен в: ' . $country;


?>

<div class="testdiv">


</div>

<!-- Add data-toggle="button" to activate toggling on a single button -->
    <button class="btn" data-toggle="button">Single Toggle</button>
     
    <!-- Add data-toggle="buttons-checkbox" for checkbox style toggling on btn-group -->


     
    <!-- Add data-toggle="buttons-radio" for radio style toggling on btn-group -->
    <div class="btn-group" data-toggle="buttons-radio">
    <button class="btn btn-inverse">Left</button>
    <button class="btn btn-danger">Middle 1</button>
    <button class="btn btn-info">Middle 2</button>
    <button class="btn btn-warning">Right</button>
    </div>
    <div class="btn-group" data-toggle="buttons-checkbox">
    <button class="btn btn-success">Left</button>
    <button class="btn btn-success">Middle</button>
    <button class="btn btn-success">Right</button>
    </div>
    
    <div class="alert alert-info">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <p><strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.</p>
    </div>
    
    <div class="well">
    ...
    </div>
    
<div class="pagination">
  <ul>
    <li><a href="#">Prev</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">Next</a></li>
  </ul>
</div>


<div class="bradi">
<br />
+++
</div>