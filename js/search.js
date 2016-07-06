$(document).ready(function()
{
	$("#onsubmit").on("click",function()
	{	
		$.ajax({
			url: '../search_result.php',
			type: 'post',
			data:
			{
				name:$("#name").val(),
				email:$("#email").val(),
			},
			success:function(data)
				{
					//console.log(data);
					$("#tab").html(data);
				}
		});
		return false;
	});
});