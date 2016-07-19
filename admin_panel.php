<?php
session_start();
include("control_permission.php");
$obj = new ACL();
$role_id = $_SESSION['role_id'];
$checking_permission = $obj->isResourceAllowed($_SERVER['REQUEST_URI']);
$check_access = $obj->HadPermission($role_id);
?>
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
    <?php
        if(!in_array(preg_replace('/\.[^.\s]{3,4}$/', '',  basename(__FILE__)), $_SESSION['has_permission']))
        {
           $_SESSION['display_error']['display']= "You're not authorised to access page";
           header('location:dashboard.php');
           exit;
        }
      ?>
      <nav class="navbar navbar-inverse ">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">Admin Panel</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo isset($_SESSION['user_name'])? $_SESSION['user_name'] : '' ; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <?php              
                        foreach($_SESSION['user_permission'] as $page=>$val)
                        {
                          if(basename(__FILE__) == $page)
                          {
                            continue;
                          }
                          echo '<li><a href="' . $page . '.php">' . $page.'</a></li>' . "\n";
                        }
                        ?>  
                     <li><a href=" logout.php"> Logout </a></li>
                  </ul>
               </li>
            </ul>
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
