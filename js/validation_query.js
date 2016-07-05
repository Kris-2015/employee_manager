$(document).ready(function()
{
	$("#error_firstname").on("keypress keydown blur", function()
	{
	   var str = $(this).val().trim();
	   var alphabet = /^[A-Za-z]+$/;
		if(str.length == 0)
		{
		  //$(".input").css("visibility", "visible");
		  $(".error").css("visibility","visible");
		  $("#error_firstname").text("This field is required");
		  console.log("This filled is required");
		}
		else if(!str.match(alphabet))
		{
			console.log("Only alphabets are allowed	");
		}
		else 
		{
			$("#error_firstname").text("");
			$(".error").css("visibility", "hidden");
		}
	});	

	$("#error_middlename").on("keypress keydown blur", function()
	{
	   var str = $(this).val().trim();
	   var alphabet = /^[A-Za-z]+$/;
		if(str.length == 0)
		{
		  //$(".input").css("visibility", "visible");
		  $(".error").css("visibility","visible");
		  $("#error_middlename").text("This field is required");
		  console.log("This filled is required");
		}
		else if(!str.match(alphabet))
		{
			console.log("Only alphabets are allowed	");
		}
		else 
		{
			$("#error_middlename").text("");
			$(".error").css("visibility", "hidden");
		}
	});

	$("#error_lastname").on("keypress keydown blur", function()
	{
	   var str = $(this).val().trim();
	   var alphabet = /^[A-Za-z]+$/;
		if(str.length == 0)
		{
		  //$(".input").css("visibility", "visible");
		  $(".error").css("visibility","visible");
		  $("#error_lastname").text("This field is required");
		  console.log("This filled is required");
		}
		else if(!str.match(alphabet))
		{
			console.log("Only alphabets are allowed	");
		}
		else 
		{
			$("#error_lastname").text("");
			$(".error").css("visibility", "hidden");
		}
	});

    $("#error_dob").on("keypress keydown blur", function()
			{
	   var str = $(this).val().trim();
	   var dob= /(d{1,2}/d{1,2}/d{4})/gm;
		if(str.length == 0)
		{
		  //$(".input").css("visibility", "visible");
		  $(".error").css("visibility","visible");
		  $("#error_dob").text("Enter your date of birth");
		  console.log("This filled is required");
		}
		else if(!str.match(dob))
		{
			console.log("Invalid input	");
		}
		else 
		{	
			$("#error_dob").text("");
			$(".error").css("visibility", "hidden");
		}
	});														

   $("#error_employer").on("keypress keydown blur", function()
			{
	   var str = $(this).val().trim();
	   var alphabet= /^[A-Za-z]+$/;
		if(str.length == 0)
		{
		  //$(".input").css("visibility", "visible");
		  $(".error").css("visibility","visible");
		  $("#error_dob").text("Enter your date of birth");
		  console.log("This filled is required");
		}
		else if(!str.match(alphabet))
		{
			console.log("Invalid input	");
		}
		else 
		{	
			$("#error_employer").text("");
			$(".error").css("visibility", "hidden");
		}
	});	 

	$("#error_email").on("keypress keydown blur", function()
			{
	   var str = $(this).val().trim();
	   var email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}$/;
		if(str.length == 0)
		{
		  //$(".input").css("visibility", "visible");
		  $(".error").css("visibility","visible");
		  $("#error_email").text("Enter your mail address");
		  console.log("This filled is required");
		}
		else if(!str.match(email))
		{
			console.log("Enter valid mail address");
		}
		else 
		{	
			$("#error_email").text("");
			$(".error").css("visibility", "hidden");
		}
	});	 

	$("#error_password").on("keypress keydown blur", function()
			{
	   var str = $(this).val().trim();
	   var password = /^[a-z0-9_-]{6,18}$/;
		if(str.length == 0)
		{
		  //$(".input").css("visibility", "visible");
		  $(".error").css("visibility","visible");
		  $("#error_password").text("Enter your password");
		  console.log("This filled is required");
		}
		else if(!str.match(password))
		{
			console.log("Enter your password more than 8 character");
		}
		else 
		{	
			$("#error_password").text("");
			$(".error").css("visibility", "hidden");
		}
	});

	$("#error_cpassword").on("keypress keydown blur", function()
	{
	   var pass1 = $(this).val().trim();
	   var pass2 = $("password").val.trim();
	   
		if(pass1 == pass2)
		{
		  $(".error").css("visibility","visible");
		  $("#error_password").text("Password not ");
		  console.log("This filled is required");
		}
	});	 			 


	$("#error_home_street").on("keypress keydown blur", function()
	{
		var home_street = $(this).val().trim();
		var alphabet = /^[A-Za-z0-9 _.-]+$/;
		if(home_street.lenght == 0)
		{
		  $(".error").css("visibility","visible");
		  $("#error_home_street").text("This field is required");
		}
		else if(!home_street.match(alphabet))
		{
			$("#error_home_street").text("give valid street address")
		}
	});

	$("#error_home_city").on("keypress keydown blur", function()
	{
		var home_city = $(this).val().trim();
		var alphabet = /^[A-Za-z]+$/;
		if(home_street.lenght == 0)
		{
		  $(".error").css("visibility","visible");
		  $("#error_home_city").text("This field is required");
		}
		else if(!home_street.match(alphabet))
		{
			$("#error_home_city").text("give valid street address")
		}
	});

	$("#error_home_state").on("keypress keydown blur", function()
	{
		var home_state = $(this).val().trim();
		var alphabet = /^[A-Za-z]+$/;
		if(home_street == 'select')
		{
		  $(".error").css("visibility","visible");
		  $("#error_home_state").text("Select anyone");
		}
		else if(!home_street.match(alphabet))
		{
			$("#error_home_state").text("give valid street address")
		}
	});

	$("#error_home_zip").on("keypress keydown blur", function()
	{
		var home_zip = $(this).val().trim();
		var numeric = /^[0-9]+$/;
		if(home_zip.length == 0 || home_zip.length <= 7)
		{
		  $(".error").css("visibility","visible");
		  $("#error_home_zip").text("Enter your zip code");
		}
		else if(!home_zip.match(numeric))
		{
			$("#error_home_zip").text("give valid zip code;")
		}
	});

	$("#error_home_mobile").on("keypress keydown blur", function()
	{
		var home_mobile = $(this).val().trim();
		var numeric = /^[0-9]+$/;
		if(home_mobile.length == 0 || home_zip.length <= 10)
		{
		  $(".error").css("visibility","visible");
		  $("#error_home_mobile").text("Enter your zip code");
		}
		else if(!home_mobile.match(numeric))
		{
			$("#error_home_mobile").text("give valid mobile number");
		}
	});

	$("#error_home_landline").on("keypress keydown blur", function()
	{
		var home_landline = $(this).val().trim();
		var numeric = /^[0-9]+$/;
		if(home_landline.length == 0 || home_landline.length <= 10)
		{
		  $(".error").css("visibility","visible");
		  $("#error_state_city").text("Only numbers are allowed here");
		}
		else if(!home_mobile.match(numeric))
		{
			$("#error_home_landline").text("give valid number");
		}
	});

	$("#error_home_fax").on("keypress keydown blur", function()
	{
		var home_fax = $(this).val().trim();
		var numeric = /^[0-9]+$/;
		if(home_fax.length == 0 || home_fax.length <= 10)
		{
		  $(".error").css("visibility","visible");
		  $("#error_home_fax").text("Enter your zip code");
		}
		else if(!home_mobile.match(numeric))
		{
			$("#error_home_fax").text("give valid mobile number");
		}
	});

	/*-----------------------------------------------------------------*/

	$("#office_street").on("keypress keydown blur", function()
	{
		var office_street = $(this).val().trim();
		var alphabet = /^[A-Za-z0-9 _.-]+$/;
		if(office_street.length == 0)
		{
		  $(".error").css("visibility","visible");
		  $("#error_office_street").text("This field is required");
		}
		else if(!office_street.match(alphabet))
		{
			$("#error_office_street").text("give valid street address")
		}
	});

	$("#office_city").on("keypress keydown blur", function()
	{
		var office_city = $(this).val().trim();
		var alphabet = /^[A-Za-z]+$/;
		if(office_city.lenght == 0)
		{
		  $(".error").css("visibility","visible");
		  $("#error_office_city").text("This field is required");
		}
		else if(!office_city.match(alphabet))
		{
			$(".error").css("visibility","visible");
			$("#error_office_city").text("give valid street address")
		}
	});

	$("#office_state").on("keypress keydown blur", function()
	{
		var office_state = $(this).val().trim();
		var alphabet = /^[A-Za-z]+$/;
		if(office_state == 'select')
		{
		  $(".error").css("visibility","visible");
		  $("#error_home_state").text("Select anyone");
		}
		else if(!home_street.match(alphabet))
		{
			$("#error_home_state").text("Select anyone")
		}
	});

	$("#office_zip").on("keypress keydown blur", function()
	{
		var office_zip = $(this).val().trim();
		var numeric = /^[0-9]+$/;
		if(office_zip.length == 0 || office_zip.length <= 7)
		{
		  $(".error").css("visibility","visible");
		  $("#error_office_zip").text("Enter your zip code");
		}
		else if(!office_zip.match(numeric))
		{
			$("#error_office_zip").text("give valid zip code;")
		}
	});

	$("#office_mobile").on("keypress keydown blur", function()
	{
		var office_mobile = $(this).val().trim();
		var numeric = /^[0-9]+$/;
		if(office_mobile.length == 0 || office_mobile.length <= 10)
		{
		  $(".error").css("visibility","visible");
		  $("#error_office_mobile").text("Enter valid mobile number");
		}
		else if(!office_mobile.match(numeric))
		{
			$("#error_office_mobile").text("give valid mobile number");
		}
	});

	$("#office_landline").on("keypress keydown blur", function()
	{
		var office_landline = $(this).val().trim();
		var numeric = /^[0-9]+$/;
		if(office_landline.length == 0 || office_landline.length <= 10)
		{
		  $(".error").css("visibility","visible");
		  $("#error_office_landline").text("Only numbers are allowed here");
		}
		else if(!office_landline.match(numeric))
		{
			$("#error_office_landline").text("give valid number");
		}
	});

	$("#office_fax").on("keypress keydown blur", function()
	{
		var office_fax = $(this).val().trim();
		var numeric = /^[0-9]+$/;
		if(office_fax.length == 0 || office_fax.length <= 10)
		{
		  $(".error").css("visibility","visible");
		  $("#error_office_fax").text("Enter valid number");
		}
		else if(!office_fax.match(numeric))
		{
			$("#error_office_fax").text("give valid fax number");
		}
	});

	

});