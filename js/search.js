$(document).ready(function()
{
	$("#onsubmit").on("click",function()
	{	
	  $.ajax(
	  {
	    url: '../search_result2.php',
		type: 'POST',
		dataType: 'json',
		data:
		{
		  name:$("#name").val(),
		  email:$("#email").val(),
		},
		success:function(data)
		{
           var arr_data = "";
		   for(var key in data)
		   {
		   	if(data.hasOwnProperty(key))
		   	{
		   		arr_data += "<tr>";
		   		    arr_data += "<td>" + data[key]["name"] + "</td>";
		   		    arr_data += "<td>" + data[key]["gender"] + "</td>";
		   		    arr_data += "<td>" + data[key]["dob"] + "</td>";
		   		    arr_data += "<td>" + data[key]["email_id"] + "</td>";
		   		    arr_data += "<td>" + data[key]["marital_status"] + "</td>";
		   		    arr_data += "<td>" + data[key]["office"] + "</td>" ;
		   		    arr_data += "<td>" + data[key]["residence"] + "</td>"; 
		   		    arr_data += "<td>" + data[key]["communication"] + "</td>";
		   		    arr_data += "<td>" + '<a href="/registration.php/?emp_id=' + data[key]["id"] +'&action=delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>&nbsp;&nbsp;&nbsp;<a href="/registration.php/?emp_id='+ data[key]["id"] + '&action=update"<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' +"</td>";
		   		arr_data += "</tr>";
		   	}
		   }

		   $("#tab tbody").html(arr_data);		   
		}
		});
	});


    //getting the field name and orderby value

	get_data(0,'asc-first_name');
	//ajax function for listing the number of data
	function get_data(page_val,sort)
	{
		$.ajax({
			url:'paginate.php',
			dataType: 'json',
			type: 'POST',
			data:
			   {
                 page:page_val,
                 get_sort:sort,
			   },
			success:function(result)
			{
				var show_data = " ";
				var add_pagination = " ";

				for(var key in result.data)
				{
					
					if(result.data.hasOwnProperty(key))
					{
						show_data += "<tr>";
							show_data += "<td>" + result.data[key]["name"] + "</td>";
	    			        show_data += "<td>" + result.data[key]["gender"] + "</td>";
	    			        show_data += "<td>" + result.data[key]["dob"] + "</td>";
	    			        show_data += "<td>" + result.data[key]["email_id"] + "</td>";
	    			        show_data += "<td>" + result.data[key]["marital_status"] + "</td>";
	    			        show_data += "<td>" + result.data[key]["office"] + "</td>";
	    			        show_data += "<td>" + result.data[key]["residence"] + "</td>";
	    			        show_data += "<td>" + result.data[key]["communication"] + "</td>";
	    			        show_data += "<td>" + '<a href="/registration.php/?emp_id=' + result.data[key]["id"] +'&action=delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>&nbsp;&nbsp;&nbsp;<a href="/registration.php/?emp_id='+ result.data[key]["id"] + '&action=update"<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' +"</td>";
						show_data += "</tr>";
					}
				}

				var total_page_number = result.total_pages;

				for(var i=0; i<total_page_number; i++)
				{
					var x;
					if ( i == 0 ) {
						x = 0;
					}
					else {
						x = i * 3;
					}
					var active = (page_val == x) ? 'active' : '';
					add_pagination += '<li class="page ' + active + '" id='+ x +'><a href="#">'+ (i+1) +'</a></li>';
				}
				$(".page_body").html(show_data);
				$("#display_button").html(add_pagination);
			}

		});
	}

	//ajax function for listing the number of page number
	$(document).on("click",".pagination li", function(e)
	{
	   e.preventDefault();
       var num = this.id;
       $(this).addClass('active');
       get_data(num);
	});

	$(document).on("click",".class_order", function(e)
	{
	   e.preventDefault();
	   var page_no = $('.pagination .active').attr('id');
	   var sort = $(this).attr('id');
	   // var current_page = $($)

	   console.log(sort);
       get_data(page_no, sort);
	});

});