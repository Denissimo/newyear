// JavaScript Document
$(document).ready(function(){  
function show()  
        {  
            $.ajax({  
                url: "/include/inc_unset_cap.php",  
                cache: false,  
                success: function(html){  
                    $("div.capt").html(html);  
                }  
            });  
        } 
/*
$(document).ready(function(){  
	show();  
	setInterval('show()',3000);
});
*/
	$("#refresh").click(function(){  
		show();  
	});

});