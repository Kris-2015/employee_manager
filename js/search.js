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

	$(".class_order").on("click", function()
	{
	  $.ajax(
	  {
		url:'../sort.php',
		type:'POST',
		dataType:'json',
		data:
		{
		    name:$(this).attr("id"),
		},
		success:function(data)
		{
		    var sort_data = "";
		    for(var key in data)
		    {
		    	if(data.hasOwnProperty(key))
		    	{
		    		sort_data += "<tr>";
	    			    sort_data += "<td>" + data[key]["name"] + "</td>";
	    			    sort_data += "<td>" + data[key]["gender"] + "</td>";
	    			    sort_data += "<td>" + data[key]["dob"] + "</td>";
	    			    sort_data += "<td>" + data[key]["email_id"] + "</td>";
	    			    sort_data += "<td>" + data[key]["marital_status"] + "</td>";
	    			    sort_data += "<td>" + data[key]["office"] + "</td>";
	    			    sort_data += "<td>" + data[key]["residence"] + "</td>";
	    			    sort_data += "<td>" + data[key]["communication"] + "</td>";
	    			    sort_data += "<td>" + '<a href="/registration.php/?emp_id=' + data[key]["id"] +'&action=delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>&nbsp;&nbsp;&nbsp;<a href="/registration.php/?emp_id='+ data[key]["id"] + '&action=update"<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' +"</td>";
		    		sort_data += "</tr>";
			    }
			}
			 $("#tab tbody").html(sort_data);
		   }
	    });
    });

	get_data(0);
	//ajax function for listing the number of data
	function get_data(page_val)
	{
		console.log(page_val);

		$.ajax({
			url:'paginate.php',
			dataType: 'json',
			type: 'POST',
			data:
			   {
                 page:page_val,
			   },
			success:function(result)
			{
				var show_data = "";
				
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
				$(".page_body").html(show_data);
			}

		});
	}

	//ajax function for listing the number of page number
	$(".pagination").on("click", function()
	{
      var num = $('#paging').attr("data-attr");
      console.log(num);
	});

});