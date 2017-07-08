// JavaScript Document

$(function() {
	//$('#putcom').css('background','#0000FF');
	//$('#textcomment').css('background','#FF0000');
	$('#putcom').hide(0);
	//$('body').css('background','#FF0000');	
	//$('option').css('background-image', 'url(/imag/upics/tiger.jpg)');
	//$('option').css('background', '#FACE8D');
	//$('option').animate({opacity:'0.05'}, 0);
	//$('option').css('height', '110px');
	var texcom = $('#putcom').html();
	$('#putcom').draggable();
	//$('#putcom').resizable();
	if($('#textcomment').length) { 
		//alert('ЦК');
		CKEDITOR.replace( 'textcomment',
			{
				filebrowserBrowseUrl : '/ckbrowse/',
				filebrowserImageBrowseUrl : '/ckbrowse/?type=Images',
				filebrowserUploadUrl : '/ckupload/',
				filebrowserImageUploadUrl : '/ckupload/?type=Images'
			});
	}
	
	//$('#textcomment').remove();
	
	//$('#putcom form textarea').attr('id') = 'jigur';
	
	//$("#testech").text($('#putcom').height());
	
	
	$('.replylink').click(function(){
		
		//alert($("#textcomment").length);
		//$(this).text($(this).parent().attr('id'));
		//var par_id = $(this).parent().attr('id');
		//var par_id = $(this).parent().find('.comdiv').attr('id');
		
		//$('#putcom #parent_id').attr('value') = par_id;
		//$(this).html(par_id);
		//alert(par_id);
		//$(this).css('opacity','0.2');
		
		//$('#putcom').remove();
		
		//alert($('#putcom').offset().position());
		var par_id = $(this).parent().parent().parent().attr('id');
		$('#putcom #parent_id').val(par_id);
		
		//alert(par_id);
		//$('#putcom #param').val(param);
		//$('#parent_id').val(par_id);
		//$(this).text(par_id);
		//$(this).text($('#putcom #parent_id').attr('value'));
		//$(this).text($(this).parent().attr('id'));
		$('#putcom').toggle(0);
		
		
		//CKEDITOR.remove();
		//$('#putcom').remove().appendTo($(this).parent());
		
		//$('#putcom form textarea').remove();
		//$('#cke_textcomment').remove();
		//$('#putcom form').append('<textarea name=\'comment\' rows="10" id=\'textcomment\' class=\'textcom\'></textarea>');
		
		
	
		
		//var conten = $('#putcom').html();
		//alert(conten);
		//$("#testech").text(conten);
		
		//var myputcom = $('#putcom').remove();
		//myputcom.appendTo($(this).parent());
		//var texcom = $('#putcom form textarea');
		//$('#putcom').remove();
		//texcom.appendTo($(this).parent());


		//$(this).parent().append( $('#putcom'));
		//$('#putcom').effect("transfer", {to: $(this).parent()}, 800);
		
		//$('#putcom').show(0);
		//$('#putcom').toggle();
		
		
		 //$(this).hide(0);

		
		
	});
	
	$('a.blockquote').click(function(){
		var ids = 'c'+$(this).attr('id');
		var conts = '<blockquote>'+$('#'+ids).html()+'</blockquote>';
		
		var par_id = $(this).parent().parent().parent().attr('id');
		$('#putcom #parent_id').val(par_id);
		$('#putcom').show(0);
		//alert(par_id);
		
		CKEDITOR.instances.textcomment.setData(conts);
		//var getdat = 'iytf7896f';
		//alert(getdat);

		//alert($('#'+ids).text());
		//alert($(this).attr('id'));
		//alert($(this).parent().('c'+$(this).attr('id')).attr('id'));
		//$(this).parent().('textarea').hide(0);

		//$('#putcom textarea').val(conts);
		//$('#putcom textarea').val(getdat);
		//$("#testech").text(getdat);
		
		
	});
	
	$('#closeputcom').click(function(){
		$('#putcom').hide(0);
	});
	
	$(":reset").click(function(){
		CKEDITOR.instances.textcomment.setData('');
	});
	
	//alert('test');

});