$.mobile.defaultPageTransition="none";
var tt={
	session:{
		user:{
			fio:""
		}
		,authenticated:false
		,id:false
		,psoid:false
	}
	,page:{
		vPromo:null
		,vPrivate:null
		,show:function(){
			tt.page.vPromo=new ttPromo();
			tt.page.vPrivate=new ttPrivate();
			tt.page.vPrivate.signin();
		}
	}
	,integration:{
		lkLink:"http://88.198.1.66:5555"
		,busLink:"srv/cross.requests.php"
	}
};
function ttPrivate(){
	var dd_data;
	this.container=$(".tt-private");
	this.login=function(user,pass){
		$.getJSON(tt.integration.busLink,{url:encodeURIComponent(tt.integration.lkLink+"/api/auth/"),username:user,pswd:pass}).success(function(lkResponse){
			dd_data = lkResponse;
			if(!lkResponse.success) return;
			tt.session.authenticated=true;
			tt.session.id=lkResponse.session;
			$.getJSON(tt.integration.busLink,{url:encodeURIComponent(tt.integration.lkLink+"/api/auth/info/"),session:tt.session.id}).success(function(lkResponse){
				tt.session.user.fio=lkResponse.fio;
				tt.session.psoid=lkResponse.temp_id;
				$("#tt-user").html('<i class="lIcon fa fa-user"></i>'+tt.session.user.fio);
				$.getJSON(tt.integration.busLink,{url:encodeURIComponent(tt.integration.lkLink+"/api/transactions/accounts/"),session:tt.session.id}).success(function(lkResponse){
					for(acct in lkResponse.data){
						//$("#tt-accounts").html();
						$("#tt-accounts").append("<tr><td><small><cite>Карточный счет 5101 **** **** "+lkResponse.data[acct].PAN_TAIL+"</cite></small></td>"
							+'<td><a href="#" data-inline="true">'+lkResponse.data[acct].Account_id+' <i class="fa fa-arrow-down"></i></a></td>'
							+'<td><b><i class="fa fa-rouble">&nbsp;1200.00</i></b></td></tr>');
						$("#tt-cards").append("<tr>"
								+'<td><i class="fa fa-cc-mastercard"></i></td>'
								+'<td><a href="#" data-inline="true">5101 **** **** '+lkResponse.data[acct].PAN_TAIL+' <i class="fa fa-arrow-down"></i></a></td>'
								+'<td><b><i class="fa fa-rouble">&nbsp;1200.00</i></b></td></tr>');
						var account =lkResponse.data[acct].Account_id;
						$.getJSON(tt.integration.busLink,{url:encodeURIComponent(tt.integration.lkLink+"/api/transactions/"),session:tt.session.id,account_id:account,date_from:"19.08.2014",date_to:"19.09.2014"}).success(function(lkResponse){
							//console.log(lkResponse.data);
							for(var i in lkResponse.data){
							}
						});
					}
				});
				
			});
			tt.page.vPrivate.show();
			
			// Drozdetskiy >
			tt.page.vPrivate.dd_load();
			// < Drozdetskiy
			
		});
	}
	this.show=function(){
		this.container.show();
	}
	this.signin=function(){
		this.login($("#tt-username").val(),$("#tt-pswd").val());
	}
	
	// Drozdetskiy >
	this.dd_load=function(){
		var dd_lgn = $("#tt-username").val();
		var dd_psw = $("#tt-pswd").val();
		var url = "/php/php_platmain.php?dd_lgn="+dd_lgn+"&dd_psw="+dd_psw+"&sess="+dd_data.session;
		//console.log(dd_data);
		//console.log(url);
		$.ajax({
			url: url,
			cache: false,
			dataType: "json",
			success: function(html){
				console.log(html);
				$("#monitor").html(";LUKGLFOV");
			}
		});

		//console.log(vPrivate.lkResponse.data);
		//$("body").html(dd_lgn+" "+dd_psw);
		//alert(3);		
	}
	// < Drozdetskiy
}
function ttPromo(){
	this.container=$(".tt-promo");
	this.container.show();
}
$(function(){
	$("#idAddPhoneNumber").click(function(){
		$("#idPopupMessage").html("На номер "+$("#idPhoneNumber").val()+" отправлен код проверки");
		$($(this).attr("data-ref")).popup("open",{transition:$(this).attr("data-transition"),positionTo:$(this).attr("data-position-to"),afterclose: function( event, ui ) {
			
		}});
	});
	$(".popuper").click(function(){
		$($(this).attr("data-ref")).popup("open",{transition:$(this).attr("data-transition"),positionTo:$(this).attr("data-position-to"),afterclose: function( event, ui ) {}});
	});
	$("#tt-login").click(function(){
		tt.page.vPrivate.signin();
	});
	tt.page.show();
});
