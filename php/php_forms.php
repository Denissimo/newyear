<?
echo '<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="tester">Формы</div><br>
<br>
<br>
<br>
<br>
<br>
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
';

?>
<script language="javascript">
$(document).ready(function(){
	
	$('.tester').click(function (){
		//var tespos = new Object();
		
		var tespos = {};
		tespos["testedit"] = "Толстый";
		tespos["testhid"] = "Маленький";
		tespos["testpost"] = 1;
		//$.post( '/post', tespos );
		//$(this).hide('puff');
		
		$.ajax({
			type: "POST",
			url: '/post',
			data: tespos,
			//success: success,
			//dataType: dataType
			});
			
		
	});
	/*
	$('#but1').click(function (event) {
		event.preventDefault();
		var formdat = $('#for1').serializeArray();
		console.log(formdat[0]['name']);
	});
	*/
});
</script>

<form action="/post" method="post">
<input type="hidden" name="testedit" value="Fat">
<input type="hidden" name="testhid" value="Small">
<input name="testpost" type="submit" value="OK" class="btn btn-info">
</form>

<form action="/post" method="post" name="asdf" id="for1"  enctype="multipart/form-data">
<input type="text" name="testedit" value="[<testedit>]">
<input type="text" name="testhid" value="[<testhid>]">
<input type="file" name="filename">
<button name="testpost" class="btn btn-info" id="but1" value="OK">Кнопица</button>
</form>