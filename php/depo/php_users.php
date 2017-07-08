<?

if(!$_SESSION['logged']){
	$_SESSION['comeback'] = $proc->sys['url']['full'];
	$proc->redirect('/login');
}else{
	unset($_SESSION['comeback']);
}



include 'php/depo/php_countries.php';
//ech($proc->sys['url']);
//ech($_SESSION);
//$_SESSION['formdata']['current_user'] = $_SESSION['username'];
$_SESSION['formdata']['username'] = $_SESSION['username'];
$clid = $proc->sys['url']['list'][1];
if($proc->sys['url']['qty']==1){
	$patt =  '<tr><td>[>create_time<]</td><td><a href="[{userlist}]/[>id<]">[>first_name<]&nbsp;[>middle_name<]&nbsp;[>last_name<]</a></td><td>[>sex<]</td><td>[>dob<]</td>
	<td>[>pob<]</td><td>[>phone<]</td><td><a href="mailto:[>email<]">[>email<]</a></td><td>[>country<]</td><td>[>passport_serial<]&nbsp;[>passport_number<]&nbsp;[>passport_date<]&nbsp;[>passport_taken<]&nbsp;[>passport_code<]
	&nbsp;[>adress_register<]&nbsp;[>adress_living<]&nbsp;[>code<]</td><td>[>description<]</td></tr>';
	//<td><a href="[{userlist}]/[>id<]"><span class="glyphicon glyphicon-wrench"></span></a></td>
	$th = '<table class="table">
	<tr><td>Дата</td><td>Клиент</td><td>Пол</td><td>Дата рождения</td><td>Место рождения</td><td>Телефон</td><td>Емайл</td><td>Гражданство</td><td>Паспортные данные</td>
	<td class="w150">Статус</td></tr>';
	$tf = '</table>';
	$proc->request = 'SELECT *, (SELECT co.country FROM data_countries co WHERE co.domain = cl.citizen LIMIT 1) AS country FROM data_clients cl LEFT JOIN (SELECT re.id AS reqid, re.client_id, re.status, 

	(SELECT st.description FROM data_statuses st WHERE re.status = st.status LIMIT 1) AS description, 
	(SELECT rh.username FROM data_request_history rh WHERE re.id = rh.id ORDER BY rh.create_time DESC LIMIT 1) AS username 
	FROM data_requests re) r ON cl.id=r.client_id  WHERE status="new" OR (username = "'.$_SESSION['username'].'" AND status="client_center") ORDER BY cl.id DESC';
	//echo $proc->request;
	//$proc->mod['index'] = 1;
	$proc->fetch('data_clients');
	$userlist = $proc->tabdata['data_clients'];
	
	$userlist = unset_zero($userlist, '0');
	//ech($userlist);
	//ech($proc->tabdata['data_clients']);
	//$cont->test = 'php_users';
	$users = $cont->load_cont($userlist, $patt);
	
	echo $th.$users.$tf;
}else{

	//ech($_POST);
	
	$proc->request = 'SELECT * FROM data_clients cl LEFT JOIN (SELECT re.id AS reqid, re.client_id, re.meet_time, re.status, (SELECT st.description FROM data_statuses st WHERE re.status = st.status LIMIT 1) AS description, (SELECT rh.username FROM data_request_history rh WHERE re.id = rh.id ORDER BY rh.id DESC LIMIT 1) AS username FROM data_requests re) r ON cl.id=r.client_id WHERE cl.id = "'.$clid.'" AND (status="new" OR (username = "'.$_SESSION['username'].'" AND status="client_center")) LIMIT 1';
	//echo '++'.$proc->request;
	$proc->mod['index'] = 1;
	$proc->fetch('data_clients');
	
	
	if(!$proc->tab['data_clients']['qty']){
		echo "<br />Данные недоступны<br />";
	}else{
		
		$cldata =$proc->tabdata['data_clients'][0];
		//ech($cldata);
		//echo date_trans('08.05.2012');
		$meet = explode(' ', $cldata['meet_time']);
		$cldata['dob'] =  date_trans($cldata['dob'], '-', '.');
		$cldata['passport_date'] =  date_trans($cldata['passport_date'], '-', '.');
		$cldata['meet_dat'] =  date_trans($meet[0], '-', '.');
		$cldata['meet_tim'] = $meet[1];
		//$cldata['meet_time'] =  date_trans($cldata['meet_time'], '-', '.');
		//ech($cldata);
		$cldata = unset_zero($cldata, '0');
		

		if($cldata['status']=='new'){
			$request = 'UPDATE data_requests SET status="client_center" WHERE client_id="'.$clid.'"';
			//echo $request;
			$proc->go_query($request);
			//$newid = $proc->db->insert_id();
			$request = 'INSERT INTO data_request_history (id, status_old, status_new, username) VALUES('.$cldata['reqid'].', "new", "client_center", "'.$_SESSION['username'].'")';
			$cldata['status'] = 'client_center';
			//echo '<br />'.$request.'<br />';
			$proc->go_query($request);
		}
		
		if(!$_SESSION['sys_tmp']['POST']){
			$_SESSION['sys_tmp']['POST']=$cldata;
		}
		if(!$_SESSION['sys_tmp']['POST']['citizen']){
			$_SESSION['sys_tmp']['POST']['citizen']='ru';
		}
		
		$sexarr = array('М' => 'Мужской', 'Ж' => 'Женский');
		$timearr = array(
		'00:00:00' => '00:00', '01:00:00' => '01:00', '02:00:00' => '02:00', '03:00:00' => '03:00', '04:00:00' => '04:00', '05:00:00' => '05:00', 
		'06:00:00' => '06:00', '07:00:00' => '07:00', '08:00:00' => '08:00', '09:00:00' => '09:00', '10:00:00' => '10:00', '11:00:00' => '11:00', 
		'12:00:00' => '12:00', '13:00:00' => '13:00', '14:00:00' => '14:00', '15:00:00' => '15:00', '16:00:00' => '16:00', '17:00:00' => '17:00',  
		'18:00:00' => '18:00', '19:00:00' => '19:00', '20:00:00' => '20:00', '21:00:00' => '21:00', '22:00:00' => '22:00', '23:00:00' => '23:00'
		);
		$options = options($opt, $_SESSION['sys_tmp']['POST']['citizen']);
		$options2 = options($sexarr, $_SESSION['sys_tmp']['POST']['sex']);
		$options3 = options($timearr, $_SESSION['sys_tmp']['POST']['meet_tim']);
		$form='
<div class="container-fluid">
<div class="col-md-3">		
	<div class="row marhor5">
			<div class="col-md-12 shad3">
			'.$cldata['first_name'].' <br />
			'.$cldata['middle_name'].'<br />
			'.$cldata['last_name'].'<br />
			'.$cldata['phone'].'<br />
			<a href="mailto:'.$cldata['email'].'">'.$cldata['email'].'</a><br />
			</div>
	</div>
</div>



<div class="col-md-6 shad3">		
<form action="[{post}]" method="post">
<input type="hidden" name="status_old" value="[<status>]">
<input type="hidden" name="status_new" value="wait_agreement">
<input type="hidden" name="status" value="wait_agreement">
	<div class="container-fluid form-group">
		<h4>Редактирование данных юзера</h4>
	</div>
<input type="hidden" name="id" value="'.$clid.'">
<input type="hidden" name="reqid" value="'.$cldata['reqid'].'">
<div class="container-fluid form-group">
<div class="col-md-12"><input name="pob" placeholder="Место рождения" class="form-control" value="[<pob>]" type="text"></div>
</div>

<div class="container-fluid form-group">
<div class="col-md-3"><input name="dob" placeholder="Дата рождения" class="form-control datpic" value="[<dob>]" type="text"></div>
<div class="col-md-3"><select name="sex" class="form-control">'.$options2.'</select></div>
<div class="col-md-6"><select name="citizen" class="form-control">'.$options.'</select></div>
</div>

<div class="container-fluid">
<div class="col-md-12"><label for="passport_serial">Паспорт</label></div>
</div>

<div class="container-fluid form-group">
<div class="col-md-2"><input name="passport_serial" placeholder="Серия" class="form-control" value="[<passport_serial>]" type="text"  maxlength="4"></div>
<div class="col-md-3"><input name="passport_number" placeholder="Номер паспорта" class="form-control" value="[<passport_number>]" type="text" maxlength="6"></div>
<div class="col-md-3"><input name="passport_date" placeholder="Дата выдачи" class="form-control datpic" value="[<passport_date>]" type="text"></div>
<div class="col-md-4"><input name="passport_code" placeholder="Код подразделения" class="form-control" value="[<passport_code>]" type="text"></div>
</div>

<div class="container-fluid form-group">
<div class="col-md-12"><textarea name="passport_taken" placeholder="Место выдачи" class="form-control">[<passport_taken>]</textarea></div>
</div>

<div class="container-fluid">
<div class="col-md-12"><label for="adress_register">Адрес</label></div>
</div>

<div class="container-fluid form-group">
<div class="col-md-12"><input name="adress_register" placeholder="Регистрации" class="form-control" value="[<adress_register>]" type="text"></div>
</div>

<div class="container-fluid form-group">
<div class="col-md-12"><input name="adress_living" placeholder="Фактический" class="form-control" value="[<adress_living>]" type="text"></div>
</div>

<div class="container-fluid">
<div class="col-md-12"><label for="code">Кодовое слово</label></div>
</div>

<div class="container-fluid form-group">
<div class="col-md-6"><input name="code" placeholder="Кодовое слово" class="form-control" value="[<code>]" type="text"></div>
<div class="col-md-3"><input name="meet_dat" placeholder="Дата встречи" class="form-control datpic" value="[<meet_dat>]" type="text"></div>
<div class="col-md-3"><select name="meet_tim" class="form-control">'.$options3.'</select></div>
</div>

<div class="container-fluid form-group">
<div class="col-md-12"><input type="submit" class="btn btn-primary col-md-12" name="savereq" value="Ввод"></div>
</div>


</form>

<div class="container-fluid form-group">
<div class="col-md-12"><a href="/userlist"><button class="btn btn-inverse col-md-12">Отложить</button></a></div>
</div>

</div>
<div class="col-md-3">		
	<div class="row marhor5">
			<div class="col-md-12 shad3">
			'.$cldata['first_name'].' <br />
			'.$cldata['middle_name'].'<br />
			'.$cldata['last_name'].'<br />
			'.$cldata['phone'].'<br />
			<a href="mailto:'.$cldata['email'].'">'.$cldata['email'].'</a><br />
			</div>
	</div>
</div>
</div>';
		

		//echo $resform;
		echo $form;
		//ech($cldata);
	}
}


?>