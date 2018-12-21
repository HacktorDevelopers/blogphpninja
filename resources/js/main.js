$(document).ready(function(){
	
	var links = $(".nav-pills a");
	
	$("a").click(function(e){
		e.preventDefault();
		for(var i = 0; i < links.length; i++){
			links.removeClass('active');
		}
		$(this).addClass('active');
		if( $(this).attr('href') != ""){
			window.location = $(this).attr('href');
			$(this).addClass('active');
		}
		
	});
	
	$("input[name=keyword]").keyup(function(){
		
		$("#searchResult").load(
			"http://localhost:8002/post/searchLikePost", 
				{
					keyword:$("input[name=keyword]").val()
				},
			function(status){
				
			});
		
	});
	
	
	$("#commentbtn").click(function(){
	
		var comment = $("#commentbox").val();
		if ( comment.length == 0){
			alert("Empty Comment is not allowed");
		}else{
			$.ajax({
				url: "http://localhost:8002/comment/regUserComment",
				method: "POST",
				data: {comment_value:comment},
				success: function(status){
					alert(status);
				}
			});
		}
		
	});
	
});