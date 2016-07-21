$(document).ready(function() {
   //on clicking on the username, get the data-github value and make a ajax call
   $(document).on('click', '.u_name', function() {
      // store the variable value in variable
      //console.log($(this));
      var git_id = $(this).data('github');
      //write a ajax function and pass the value in ajax url page

      $(".loader-container").removeClass('hidden');
      $(".github-container").addClass('hidden');
      $(".git_name").html('Loading Github Profile ');

      $.ajax({
         url: 'info.php',
         type: 'POST',
         dataType: 'json',
         data: {
            gituser_id: git_id,
         },
         success: function(response) {
            $(".loader-container").addClass('hidden');
            $(".github-container").removeClass('hidden');

            $(".git_name").html('Github Profile of <strong>' + response.name + '</strong>');
            $(".image").html('<img src="' + response.avatar_url + '"id="image" height="150px" width="150px"/>');
            $("#git_login").html('<strong id="log">Login Id: </strong>' + '<a href="' + response.html_url + '" target="_blank">' + response.login + '</a>');
            $("#git_location").html('<strong>Location: </strong>' + response.location);
            $("#git_repositories").html('<strong>Number of repositories: </strong>' + response.public_repos);
            $("#git_follower").html('<strong>Follower: </strong>' + response.followers);
            $("#git_following").html('<strong>Following: </strong>' + response.following);
         }
      });
   });
   //triggering the modal call
   $(document).on('click', '.u_name', function() {
      $("#profile").modal({
         backdrop: 'static',
         keyboard: false
      }, 'show');
   });

   function loading() {
      myVar = setTimeout(showPage, 3000);
   }
});