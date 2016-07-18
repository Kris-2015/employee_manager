$(document).ready(function(){
	display();
});

//function for printing the role, resource and privileges
function display() {
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
               //role += "<option>" + "--select--" + "</option>";
               role += '<option value="' +data.role[key]['role_id'] + '">' + data.role[key]['role_name'] + '</option>';
            }
         }

         for (var key in data.resource) {
            if (data.resource.hasOwnProperty(key)) {
               //resource += "<option>" + "--select--" + "</option>";
               resource += '<option value="' + data.resource[key]['resource_id'] + '">' + data.resource[key]['resource_name'] + '</option>';
            }
         }

         for (var key in data.privilege) {
            if (data.privilege.hasOwnProperty(key)) {
               privilege += '<label class="checkbox-inline"><input type="checkbox" value="' + data.privilege[key]['name'] + '">' + data.privilege[key]['name'] + '</label>';
            }
         }
         $(".role").html(role);
         $(".resource").html(resource);
         $(".privilege").html(privilege);
      }
   });
}