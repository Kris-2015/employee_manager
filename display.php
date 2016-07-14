<?php 
session_start();                            
include('control_permission.php');
$role_id = $_SESSION['role_id'];
$obj = new role();
$get_role = $obj->getrole($role_id);
//name the user according to there role
if ('1' == $role_id)
{
  $name = "admin";
}
else
{
  $name = "user";
}
//checking if user has the permission to access the resource or not
$checking_permission = $obj->isResourceAllowed($_SERVER['REQUEST_URI'], 'all');

$check_access = $obj->HadPermission($role_id);
?>

<!DOCTYPE html>
<html>
   <head>
      <title>DISPLAY INFORMATION</title>
      <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/cover.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/search.js"></script>
   </head>
   <body background="image/wood.jpg">
      <nav class="navbar navbar-inverse ">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href=" dashboard.php">DASHBOARD</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo isset($_SESSION['user_name'])? $_SESSION['user_name'] : '' ; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <?php
                     //generating the dropdown menu according to user's role
                        foreach($_SESSION['user_permission'] as $page=>$val)
                        {
                          if(basename(__FILE__) == $page)
                          {
                            continue;
                          }
                          echo '<li><a href="' . $page . '.php">' . $page .'</a></li>' . "\n";
                        }
                        ?>  
                     <li><a href=" logout.php"> Logout </a></li>
                  </ul>
               </li>
            </ul>
         </div>
      </nav>
      <?php
           if(!in_array(preg_replace('/\.[^.\s]{3,4}$/', '',  basename(__FILE__)), $_SESSION['has_permission']))
           {
              $_SESSION['display_error']['display']= "You're not authorised to access page";
              header('location:dashboard.php');
              exit;
           }
      ?>

      <h2 align="center"><u>REGISTERED USER</u></h2>
      <div class="container">
         <div class="row">
            <div class="col-xs-6">
               <form class="form-inline" role="form">
                  <div class="form-group">
                     <label for="name">Name:</label>
                     <input type="text" name="name" class="form-control" id="name" placeholder="First  Name">
                  </div>
                  <div class="form-group">
                     <label for="email">Email:</label>
                     <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                  </div>
                  <button type="button" class="btn btn-info" id="onsubmit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
               </form>
            </div>
            <div class="col-xs-6 pull-right">
            </div>
            <br><br> 
            <div class="col-xs-12 col-md-12" id="tab">
               <div class="panel panel-default">
                  <div class="panel-body">
                     <div class="table-responsive">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <td align="center"><u>NAME</u><br><button type="button" class="btn btn-default btn-xs class_order" id="asc-first_name"><span class="glyphicon glyphicon-menu-up"></span></button><button type="button" class="btn btn-default btn-xs class_order" id="desc-first_name"><span class="glyphicon glyphicon-menu-down"></span></button></td>
                                 <td align="center"><u>GENDER</u></td>
                                 <td align="center"><u>DOB</u><br><button type="button" class="btn btn-default btn-xs class_order" id="asc-dob"><span class="glyphicon glyphicon-menu-up"></span></button><button type="button" class="btn btn-default btn-xs class_order" id="desc-dob"><span class="glyphicon glyphicon-menu-down"></span></button></td>
                                 <td align="center"><u>email id</u><br><button type="button" class="btn btn-default btn-xs class_order" id="asc-email_id"><span class="glyphicon glyphicon-menu-up"></span></button><button type="button" class="btn btn-default btn-xs class_order" id="desc-email_id" ><span class="glyphicon glyphicon-menu-down"></span></button></td>
                                 <td align="center"><u>Marital Status</u></td>
                                 <td align="center"><u>OFFICIAL ADDRESS</u></td>
                                 <td align="center"><u>RESIDENCE ADDRESS</u></td>
                                 <td align="center"><u>COMMUNICATION</u></td>
                                 <td align="center"><u>ACTION</u></td>
                              </tr>
                           </thead>
                           <tbody class="page_body">
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- pagination links --> 
            <div  class="col-xs-8 col-xs-offset-4">
               <nav>
                  <ul id="display_button" class="pagination">
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </body>
</html>