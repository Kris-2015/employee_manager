$(document).ready(function(){
	display();
    /*
     *Send the request to get the privilege
    */
   $(document).on('change', '.role, .resource', function()
   {
      var get_role = $('.role').val();
      var get_resource = $('.resource').val();
      sendrrp(get_role,get_resource);
   });
   /*
    *Set the permission for the resource
   */
   $(document).on('change', '.privilege input[type="checkbox"]:checked', function()
   {
      var set_role = $('.role').val();
      var set_resource = $('.resource').val();
      var set_privilege; //= $(this).val();
      var action;
      if(set_privilege=='undefined')
      {
        set_privilege=0
        action = 'delete';
      }
      else
      {
        action ='add';
        set_privilege = $(this).val();
      }
      console.log(set_role);
      console.log(set_resource);
      console.log(set_privilege);
      console.log(action);
      setrrp(set_role,set_resource,set_privilege,action);
   });
});

/*
*function for printing the role, resource and privileges
* @param:none
* return: none
*/
function display() 
{
   $.ajax({
      url: '../panel.php',
      type: 'POST',
      dataType: 'json',
      data: {
         start: 1,
      },
      success: function(data) {
         var role = " ";
         var resource = " ";
         var privilege = " ";

         for (var key in data.role) {
            if (data.role.hasOwnProperty(key)) {
               role += '<option id="'+ data.role[key]['role_name'] +'" value="' +data.role[key]['role_id'] + '">' + data.role[key]['role_name'] + '</option>';
            }
         }

         for (var key in data.resource) {
            if (data.resource.hasOwnProperty(key)) {
               resource += '<option id="'+ data.resource[key]['resource_name'] +'" value="' + data.resource[key]['resource_id'] + '">' + data.resource[key]['resource_name'] + '</option>';
            }
         }

         for (var key in data.privilege) {
            if (data.privilege.hasOwnProperty(key)) {
               privilege += '<label class="checkbox-inline"><input type="checkbox" id="'+ data.privilege[key]['name'] +'" value="' + data.privilege[key]['privilege_id'] + '">' + data.privilege[key]['name'] + '</label>';
            }
         }
         $(".role").html(role);
         $(".resource").html(resource);
         $(".privilege").html(privilege);
      }
   });
}
/*
*function to select the privilege checkbox
* @param: role_id and resource_id
* @return: none
*/
function sendrrp(get_role,get_resource)
{
   $.ajax({
      url: '../panel.php',
      type: 'POST',
      dataType: 'json',
      data: {
         role: get_role,
         resource: get_resource,
         start:2,
      },
      success:function(response)
      {
         var getprivilege_id;
         var getresource_id = $('.resource').val();
         var getrole_id = $('.role').val();

        $('.privilege input[type="checkbox"]').each(function(i,obj){

            var checkbox_obj = $(this);
            $.each(checkbox_obj,function () {
                    $(this).prop('checked', false);
                });

            $.each(response, function(resp_key,resp_data)
            {
                if (checkbox_obj.val() === resp_data.privilege_id) {
                    checkbox_obj.prop('checked', true);
                }
                
            });
        });
      }
   });
}
/*
*fucntion to set permission
* @param: role_id,resource_id,privilege_id, action
* @return: none
*/
function setrrp(get_role,get_resource,get_privilege,action)
{
  $.ajax({
    url:'../panel.php',
    type:'POST',
    dataType:'json',
    data:{
        role:get_role,
        resource:get_resource,
        privilege:get_privilege,
        action:action,
        start:3,
    },
    success:function(response)
    {
        display();
    }
  });
}