$(document).ready(function(){
	
	var links = $("a");
	var comment_status = $("#comment_status");
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
		if( userkeyword.length != 0){
		$("#searchResult").load(
			"http://localhost:8002/post/searchLikePost", 
				{
					keyword:userkeyword
				},
			function(status){
				
			});
		}
	});
	
	$("#commentbtn").click(function(){
	
		var comment = $("#commentbox").val();
		var post_id = $("input[name=post_id]").val();
		if ( comment.length == 0){
			comment_status.removeClass('alert-info');
			comment_status.addClass('alert-danger');
			comment_status.show();
			comment_status.text("Empty comment not allowed");
			comment_status.delay(4000).hide(0);
		}else{
			$.ajax({
				url: "http://localhost:8002/comment/regUserComment",
				method: "POST",
				data: {
					comment_value:comment,
					postid : post_id
				},
				success: function(status){
					comment_status.removeClass('alert-danger');
					comment_status.addClass('alert-success');
					comment_status.show();
					comment_status.text(status);
					comment_status.delay(4000).hide(0);
					setTimeout(function(){
						location.reload();
					}, 5000); 
				}
			});
		}
		
	});
	
});