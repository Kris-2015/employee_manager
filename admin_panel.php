<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
          <form role="form">
            <div class="form-group">
              <label class="control-label col-xs-5">Administrator</label>
               <div class="checkbox">
                <label><input type="checkbox" value="">view</label>
                <label><input type="checkbox" value="">insert</label>
                <label><input type="checkbox" value="">update</label>
                <label><input type="checkbox" value="">delete</label>
                <label><input type="checkbox" value="">all</label>
             </div>    
           </div>
           <div class="form-group">
              <label class="control-label col-xs-5">User</label>
              <div class="checkbox">
                <label><input type="checkbox" value="">view</label>
                <label><input type="checkbox" value="">insert</label>
                <label><input type="checkbox" value="">update</label>
                <label><input type="checkbox" value="">delete</label>
                <label><input type="checkbox" value="">all</label>
              </div>    
           </div>
            <div class="form-group" style="position:relative; left:35%;">
              <div class="col-lg-12">
                <input type = 'submit' name = 'submit' value = 'REGISTER' class = 'btn btn-info'>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>