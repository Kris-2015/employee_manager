/*
 * @author: mfsi_krishnadev
 * @access: public
 * @purpose: validation of registration form
 * @param: none
 * @return: string
*/

function valid()
{
 	var first_name = document.getElementById('fname').value;
	var middle_name = document.getElementById('mname').value;
    var last_name = document.getElementById('lname').value;
    var dob = document.getElementById('dob').value;
    var email = document.getElementById('email').value;
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    var  password = document.getElementById('password').value;
    var confirm_password = document.getElementById('confirm_password').value;
    var employer = document.getElementById('employer').value;
    //var image =  document.getElementById('image').value;
    var home_street = document.getElementById('home_street').value;
    var home_city = document.getElementById('home_city').value;
    var home_state = document.getElementById('home_state').value;
    var home_mobile = document.getElementById('home_mobile').value;
    var home_zip = document.getElementById('home_zip').value;
    var home_landline = document.getElementById('home_landline').value;
    var home_fax = document.getElementById('home_fax').value;
    var office_street = document.getElementById('office_street').value;
    var office_state = document.getElementById('office_state').value;
    var office_city = document.getElementById('office_city').value;
    var office_zip = document.getElementById('office_zip').value;
    var office_mobile = document.getElementById('office_mobile').value;
    var office_landline = document.getElementById('office_landline').value;
    var office_fax = document.getElementById('office_fax').value;
    var communication = document.getElementsByName('communication[]');
    var flag = 0;



	var f_mess, m_mess, l_mess, dob_mess, email_mess, password_mess, confirm_password_mess, employer_mess,
	home_street_mess, home_state_mess, home_city_mess, home_mobile_mess,home_zip_mess, home_landline_mess, home_fax_mess,
	office_street_mess, office_city_mess, office_state_mess, office_zip_mess, office_mobile_mess, office_landline_mess,
	office_fax_mess, comm_mess, login_mess; 

	//variables with regular expression for validation
    var letters = /^[A-Za-z]+$/;
    var number =  /^\d{10}$/;

    //checking first name
    if(first_name === null || first_name === ' ')
    {	
    	f_mess = "Please fill the field";
    }
    else if(first_name.match(letters))
    {	
    	f_mess = ' ';
    }
    else
    {
    	
    	f_mess = " wrong input";
    }

    //checking middle name
    if(middle_name === null || middle_name === ' ' || middle_name === '')
    {
    	m_mess = "Please fill the field";
    }
    else if(middle_name.match(letters))
    {
    	m_mess = ' ';
    }
    else
    {
    	m_mess = " wrong input";
    }

    //checking last name
    if(last_name === null || last_name === ' ')
    {
    	l_mess = "Please fill the field";
    }
    else if(last_name.match(letters))
    {
    	l_mess = ' ';
    }
    else
    {
    	l_mess = " wrong input";
    }

    //checking date of birth
    if(dob === null || dob === ' ' || dob === '')
    {
    	dob_mess = "Mention your Date of Birth";
    }
    else
    {
    	dob_mess = ' ';
    }

    //checking email
    if(email === null || email === ' ')
    {
    	email_mess = "Please give your valid email id";
    }
    else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
    {
    	email_mess = " Please give your valid email id";
    }
    else
    {
    	email_mess = ' ';
    }

    //checking for password
    if(password === null || password === ' ' || password === '')
    {
    	password_mess = 'Please give your password';
    }

    //checking for confirm password
    if (confirm_password === null || confirm_password === ' ') 
    {
    	confirm_password_mess = ' Please give your password';
    }
    else if(confirm_password == password)
    {
    	confirm_password_mess = 'Given password does not match';
    }	

    //checking for employer
	if(employer === null || employer === ' ' || employer === '')
    {
    	employer_mess = "Please fill the field";
    }
    else if(last_name.match(letters))
    {
    	employer_mess = ' ';
    }
    else
    {
    	employer_mess = " wrong input";
    }	    

    //checking for home street
    if(home_street === null || home_street === ' ')
    {
    	home_street_mess = "Please give your address";
    }
    else if(home_street.match(letters))
    {
    	home_street_mess = ' ';
    }
    else
    {
    	home_street_mess = " Please give your address";
    }

    //check for home city
    if(home_city === null || home_city === ' ')
    {
    	home_city_mess = 'Please mention your city';
    }
    else if(home_city.match(letters))
    {
    	home_city_mess = ' ';
    }
    else
    {
    	home_city_mess = 'Please mention your city';
    }

    //checking for home_state
    if(home_state === 0)
    {
    	home_state_mess = 'Please select anyone option';
    }
    else if(home_state.match(letters))
    {
    	home_state_mess = ' ';
    }
	    
    //checking for home mobile number
    if(home_mobile === null || home_mobile === ' ')
    {
    	home_mobile_mess = 'Please give your mobile number';
    }
    else if(home_mobile.match(number))
    {
    	home_mobile_mess = ' ';
    }
    else
    {
    	home_mobile_mess = 'Please enter valid number';
    }

    //checking for home landline
    if(home_landline === null || home_landline === ' ')
    {
    	home_landline_mess = 'Please enter your landline number';
    }
    else if(home_landline.match(number))
    {
    	home_landline_mess = ' ';
    }
    else
    {
    	home_landline_mess = 'Please enter valid number';
    }

    //checking for home fax
    if(home_fax.match(number))
    {
    	home_fax_mess = 'Please enter valid number';
    }
    else
    {
    	home_fax_mess = ' ';
    }

    //checking form home zip code
    if(home_zip === null || home_zip === ' ')
    {
    	home_zip_mess = 'Please enter your zip code';
    }
    else if(home_zip.match(number))
    {
    	home_zip_mess = ' ';
    }
    else
    {
    	home_zip_mess = 'Please enter valid zip code';
    }

	//checking for office street		
	if(office_street === null || office_street === ' ')
    {
    	office_street_mess = "Please give your address";
    }
    else if(office_street.match(letters))
    {
    	office_street_mess = ' ';
    }
    else
    {
    	office_street_mess = " Please give your address";
    }

    //checking for office city
    if(office_city === null || office_city === ' ')
    {
    	office_city_mess = 'Please mention your city';
    }
    else if(home_city.match(letters))
    {
    	office_city_mess = ' ';
    }
    else
    {
    	office_city_mess = 'Please mention your city';
    }

    //checking for office state
    if(office_state === 0)
    {
    	office_state_mess = 'Please select anyone option';
    }
    else if(office_state.match(letters))
    {
    	office_state_mess = ' ';
    }
	    
    //checking for office mobile number
    if(office_mobile === null || office_mobile === ' ')
    {
    	office_mobile_mess = 'Please give your mobile number';
    }
    else if(office_mobile.match(number))
    {
    	office_mobile_mess = ' ';
    }
    else
    {
    	office_mobile_mess = 'Please enter valid number';
    }

    //checking for office landline number
    if(office_landline === null || office_landline === ' ')
    {
    	office_landline_mess = 'Please enter your landline number';
    }
    else if(office_landline.match(number))
    {
    	office_landline_mess = ' ';
    }
    else
    {
    	office_landline_mess = 'Please enter valid number';
    }

    //checking for office fax number
    if(office_fax.match(number))
    {
    	office_fax_mess = 'Please enter valid number';
    }
    else
    {
    	office_fax_mess = ' ';
    }

    //checking for office zip code
    if(office_zip === null || office_zip === ' ')
    {
    	office_zip_mess = 'Please enter your zip code';
    }
    else if(office_zip.match(number))
    {
    	office_zip_mess = ' ';
    }
    else
    {
    	office_zip_mess = 'Please enter valid zip code';
    }	    


	for(var i=0; i<communication.length; i++)
	{
		if(communication[i].checked === false)
		{
			flag++;
		}
		else if(flag > 0)
		{
			comm_mess = 'Please select atleast one option';
		}
	}

    //returning the value to the respective tag
    document.getElementById("f_mess").innerHTML = f_mess;
    document.getElementById("m_mess").innerHTML = m_mess;
    document.getElementById("l_mess").innerHTML = l_mess;
    document.getElementById("dob_mess").innerHTML = dob_mess;
    document.getElementById("email_mess").innerHTML = email_mess;
    document.getElementById("password_mess").innerHTML = password_mess;
    document.getElementById("cpass_mess").innerHTML = confirm_password_mess;
    document.getElementById("employer_mess").innerHTML = employer_mess;
    document.getElementById("hstreet_mess").innerHTML = home_street_mess;
    document.getElementById("hcity_mess").innerHTML = home_city_mess;
    document.getElementById("hstate_mess").innerHTML = home_state_mess;
    document.getElementById("hzip_mess").innerHTML = home_zip_mess;
    document.getElementById("hmobile_mess").innerHTML = home_mobile_mess;
    document.getElementById("hlandline_mess").innerHTML = home_landline_mess;
    document.getElementById("hfax_mess").innerHTML = home_fax_mess;
    document.getElementById("ostreet_mess").innerHTML = office_street_mess;
    document.getElementById("ocity_mess").innerHTML = office_city_mess;
    document.getElementById("ostate_mess").innerHTML = office_state_mess;
    document.getElementById("ozip_mess").innerHTML = office_zip_mess;
    document.getElementById("omobile_mess").innerHTML = office_mobile_mess;
    document.getElementById("olandline_mess").innerHTML = office_landline_mess;
    document.getElementById("ofax_mess").innerHTML = office_fax_mess;
    document.getElementById("communication_mess").innerHTML = comm_mess;
    document.getElementById("login_mess").innerHTML = login_mess;
}
/*
 * @purpose: validating the login id and password
 * @access: public
 * @param: null
 * @return : string																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																										 
*/	
function valid_login()
{
	var login_id = document.getElementById('login').value;
	var password = document.getElementById('password').value;
	var atpos = login_id.indexOf("@");
	var dotpos = login_id.lastIndexOf(".");

	var login_message, password_message;

	if(login_id === null || login_id === ' ')
	{
	    login_message = "Enter your valid email id";
	}
	else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	{
	   	login_message = " Enter your email id";
	}
	else
	{
	  	login_message = ' ';
	}
	if(password === null || password === '' || password === ' ')
	{
	  	password_message = 'Enter a password';
	}
	else
	{
	   	password_message = 'Incorrect password or login id';
	}
	document.getElementById('login_message').innerHTML = login_message;
	document.getElementById('password_message').innerHTML = password_message;
}