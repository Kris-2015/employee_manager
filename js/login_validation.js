$(document).ready(function(){
	$("#email").on("blur", function()
	{
		var login = $(this).val().trim();
		var id = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}$/;
		if(login.length == 0)
		{
			$(".error").css("visibility", "visible");
			$("#error_login").text("Please enter your login id");
		}
		else if(!login.match(id))
		{
			$(".error").css("visibility", "visible");
			$("#error_login").text("Enter valid login id");
		}
		else
		{
			$("#error_login").text("Enter valid login id");	
		}
	});

	$("#password").on("blur", function()
	{
		var password = $(this).val().trim();
		if(password.length == 0)
		{
			$(".error").css("visibility", "visible");
			$("#error_login").text("Please enter your login id");
		}
		else
		{
			$(".error").css("visibility", "hidden");
			$("#error_login").text(" ");	
		}
	});
});