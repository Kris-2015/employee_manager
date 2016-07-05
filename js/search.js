$(document).ready(function()
{
	$("#onsubmit").on("click",function()
	{
		var name = $("#Name").val();
		var mail = $("#email").val();
		console.log(name);
		console.log(mail);

		$.ajax({
			url: 'xyz.php',
			data:
			{
				name:$("#name").val(),
				email:$("#email").val(),
			}
		});
		return false;
	});
});