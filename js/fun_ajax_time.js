// JavaScript Document


function show()
		{
			$.ajax({
				url: "time.php",
				cache: false,
				success: function(html){
					$("#content").html(html);
				}
			});
		}
	
$(document).ready(function(){
		show();
		setInterval('show()',3000);
});
		