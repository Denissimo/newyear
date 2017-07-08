// JavaScript Document

$(function() {
	//alert('test L');
 var r, c;
	/*
	$('a').click(function(){
		alert('a click');
	});	 
	*/
  $('.lightbut').click(function(){
	//$(this).hide();
	r = $(this).attr('rel');
	//var link_off=$(this).offset();
	//var x = link_off.left-200+'px';
	//var y = link_off.top-250+'px';
	var wid = $(window).width()+'px';
	//var px = $(window).width()+'px';
	var hei = $(window).height()+'px';
	$('#'+r).css({
		'position':'fixed',
		'display':'block',
		'top':'0',
		'left':'0',
		'width':wid,
		'height':hei,
		'padding':'3px',
		'background':'#CCFFFF',
		'text-align':'left',
		'background':'rgba(0, 0, 0, 0.6)',
		'text-align':'center'
	});
	
	$('#'+r+' div').css({
		'position':'relative',
		'display':'inline-table', 
		'zoom':'1',
		'margin':'200px auto',
		'padding':'8px',
		'background':'#0080A0',
		'color':'#FFFFFF',
		//'background':'rgba(0, 160, 255, 0.5)',
		'box-shadow':'0 0 25px #00A0FF'
	});
	

  });
  
  $('.lightclose').click(function(){
	//$(this).hide();
	c = $(this).attr('rel');
	$('#'+c).css({
	 'display':'none'
	});
	//document.write('#'+r);
  });
  
  $('.lightbox').click(function(){
	//$(this).hide();
	c = $(this).css({
	 'display':'none'
	});

  });
 
 
 });