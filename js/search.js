$(document).ready(function()
{
	$("#onsubmit").on("click",function()
	{	
	  $.ajax(
	  {
	    url: '../search_result.php',
		type: 'POST',
		data:
		{
		  name:$("#name").val(),
		  email:$("#email").val(),
		},
		success:function(data)
		{
		   //console.log(data);
		   $("#tab").html(data);
		},
		error:function(error)
		{
			$("#tab").text("Sorry, search result not found");
		}
	  });
		return false;
	});
});