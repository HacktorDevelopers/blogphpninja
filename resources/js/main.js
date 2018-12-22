$(document).ready(function(){
	
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
		var userkeyword = $("input[name=keyword]").val();
		var searchBy = $("select[name=searchBy]").val();
		//alert(searchBy);
		if( userkeyword.length != 0){
		$("#searchResult").load(
			"http://localhost:8002/post/searchLikePost", 
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
				url: "http://localhost:8002/comment/regUserComment",
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
			url : "http://localhost:8002/users/loginuser",
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
	
	
	function toast(message, eltotoast, rtype, type, delay){
		//delay = 4000;
		eltotoast.removeClass('alert-'+rtype);
		eltotoast.addClass('alert-'+type);
		eltotoast.show();
		eltotoast.html(message);
		eltotoast.delay(delay).hide(0);
	}
});