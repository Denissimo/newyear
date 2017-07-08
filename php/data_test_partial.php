<?
echo 'Partial';
//include '/temps/par.tpl';
?>

<script type="text/pattern" id="source">
	<h1><%= caption %></h1><br />
	<b><%= ind01 %></b>
    <p><%@ /temps/par.tpl %></p>
	
	<% for ( var i = 0; i <= 10; i++ ){ %>
	<%@ /temps/par.tpl %>
	<% } %>

</script>
<div id="res2">

</div>


<div id="result">

</div>


<!--
<script type="text/javascript">
var data = {asdf:123, qwerty:456, zxcv:789};
var source = document.getElementById('source');
var result = document.getElementById('result');
Asymbix.Partial.getFromString(source.innerHTML).fetch(
data,
function(string){
result.innerHTML = string;
}
);
</script>
-->

<script type="text/javascript">

$('#result').css({"background":"#CCFFCC"});
$('#res2').css({"background":"#CCCCFF"});
/*
$('#result').html('sdf<br />1234');
$('#res2').css({"background":"#FFFFCC"});
$('#res2').html($('#result').html()+'<br />qqqqqqqqqqqqqqqq<br />');
*/

var data = {asdf:123, qwerty:456, zxcv:789, caption:'ФЫВАПРОЛДЖэ', ind01:'ячсмитьбю'};
	Asymbix.Partial.getFromString($('#source').html()).fetch(
		data,
	function(string){
	$('#result').html(string);
	}
);

</script>

<script type="text/javascript">
//$('#res2').html('asdv'); 
	  //alert('asdfg');
	var params = {
        url: 'http://promo/testecho',
        method: 'post',
        behavior: 'close',
        data: {
          key: 'Worker: '
		  //channel and other Bayex Message Field Definitions		  
        },
        onmessage: function(event){
          $('#res2').html(event.data);
        },
        onerror: function(event){
          $('#res2').html(event.data);
        }
      }

      var worker = Asymbix.AjaxWorker.postMessage(params);
      worker.close();
</script>