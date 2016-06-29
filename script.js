$(document).ready(function(){
	$(document).on("click","#submit",function(){
		var pid = $("#pid").val();
		$.ajax({
			url : 'action_page.php',
			type : 'post',
			data : 'pid=' + pid,
			success : function(data)
			{
				alert(data);
				window.location.href = "buy.php";
			},
		});
	});
});