$(document).ready(function(){
	
	$("input[name=keyword]").keyup(function(){
		
		$("#searchResult").load("http://localhost:8002/post/searchLikePost", {keyword:$("input[name=keyword]").val()},function(status){});
		
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