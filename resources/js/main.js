$(document).ready(function(){
	//alert("Hello world");
	var base_url = "http://localhost:8002/CI/blog/";
	
	var links = $("a");
	var msg = $("#msg");
	links.click(function(e){
		e.preventDefault();
		for(var i = 0; i < links.length; i++){
			links.removeClass('active');
		}
		$(this).addClass('active');
		if( $(this).attr('href') != ""){
			window.location.assign($(this).attr('href'));
			//$('body').load($(this).attr('href'));
			$(this).addClass('active');
		}
		
	});
	
	$("input[name=keyword]").keyup(function(){
		var url = base_url+"post/searchLikePost";
		//window.location.assign(url);
		var userkeyword = $("input[name=keyword]").val();
		var searchBy = $("select[name=searchBy]").val();
		//alert(searchBy);
		if( userkeyword.length != 0){
		$("#searchResult").load(
			url,
				{
					keyword : userkeyword,
					searchWith : searchBy
				},
			function(status){
				//alert(status);
			});
		}
	});
	
	$("#commentbtn").click(function(){
	
		var comment = $("#commentbox").val();
		var post_id = $("input[name=post_id]").val();
		if ( comment.length == 0){
			var msgtext = "Empty comment not allowed";
			toast(msgtext, msg, 'info', 'danger', 4000);
		}else{
			$.ajax({
				url: base_url+"comment/regUserComment",
				method: "POST",
				data: {
					comment_value:comment,
					postid : post_id
				},
				success: function(status){
					toast(status, msg, 'danger', 'info', 4000);
					setTimeout(function(){
						location.reload();
					}, 5000); 
				}
			});
		}
		
	});
	
	$("input[name=login_btn]").click(function(e){
		e.preventDefault();
		//alert($("input[name=password]").val());
		var useremail = $("input[name=email]").val();
		var userpass = $("input[name=password]").val();
		$.ajax({
			url : base_url+"users/loginuser",
			method : 'POST',
			data : {
				email : useremail,
				password : userpass
			},
			success : function(data){
				//alert(status);
				toast(data, msg, 'danger', 'info', 4000);
			}
		});
	});
	
	
	$("input[name=register]").click(function(e){
		e.preventDefault();
		var url = base_url+"users/register";
		//alert($("input[name=password]").val());
		var userfirst_name = $("input[name=first_name]").val();
		var userlast_name = $("input[name=last_name]").val();
		var useremail = $("input[name=email]").val();
		var usergender = $("select[name=gender]").val();
		var userpassword = $("input[name=password]").val();
		var userconfirm_password = $("input[name=confirm_password]").val();
		var userrole = $("input[name=role]").val();
		var useruser_id = $("input[name=user_id]").val();
		//alert(usergender);
		$.ajax({
			url : url,
			method : "POST",
			data : {
				first_name : userfirst_name,
				last_name : userlast_name,
				email : useremail,
				gender : usergender,
				password : userpassword,
				confirm_password : userconfirm_password,
				role : userrole,
				user_id : useruser_id
			} ,
			success : function(data){
				//alert(data);
				toast(data, msg, 'info', 'info', 4000);
			}
		});
	});
	
	
	function toast(message, eltotoast, rtype, type, delay){
		//delay = 4000;
		eltotoast.removeClass('alert-'+rtype);
		eltotoast.addClass('alert-'+type);
		eltotoast.show();
		eltotoast.html(message);
		eltotoast.delay(delay).hide(0);
	}
});