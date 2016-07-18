<!DOCTYPE html>
<html>
   <head>
      <title>Admin Panel</title>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/panel.js"></script>
   </head>
   <body>
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">Employee</a>
            </div>
         </div>
      </nav>
      <div class="container">
         <div class="row">
            <div class="col-xs-8">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <p align="center"><strong>ADMIN PANEL</strong></p>
                  </div>
                  <div class="panel-body">
                     <form class="form-inline" role="form">
                        <div class="form-group">
                           <label for="role">Role:</label>
                           <select class="form-control role" name="role">
                              <option>--select--</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="resource">Resource:</label>
                           <select class="form-control resource" name="resource">
                           </select>
                        </div>
                        <div class="form-group privilege">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
