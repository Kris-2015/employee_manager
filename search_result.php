<?php 
ini_set("display_error","1");
session_start();                            
include('user.php');
?>
<!DOCTYPE html>
<html>
<head>
																																																																																																																																																																																																		
</head>
       <div class="container">
       <div class="row">
       <div class="col-xs-12">
       <div class="panel panel-default">
       <div class="panel-body">
       <div class="table-responsive">
       <table class="table table-bordered">
       <thead>
          <tr>
             <td align="center"><u>NAME</u></td>
             <td align="center"><u>GENDER</u></td>
             <td align="center"><u>DOB</u></td>
             <td align="center"><u>Marital Status</u></td>
             <td align="center"><u>Email id</u></td>
             <td align="center"><u>OFFICIAL ADDRESS</u></td>
             <td align="center"><u>RESIDENCE ADDRESS</u></td>
             <td align="center"><u>COMMUNICATION</u></td>											
          </tr>
       </thead>
       <tbody>
        	<?php
       		$search_name = $_POST['name'];
       		$search_email = $_POST['email'];
       		
            $obj = new user();
            $result = $obj->search_user($search_name, $search_email);
            if (mysqli_num_rows($result) > 0)
            {
              while ($row = mysqli_fetch_assoc($result))
              {
                echo "<tr>";
                   echo "<td>" . $row["name"];
                   echo "<td>" . $row["gender"] . "</td>";
                   echo "<td>" . $row["dob"] . "</td>";
                   echo "<td>" . $row["marital_status"] . "</td>";
                   echo "<td>" . $row["email_id"]. "</td>";
                   echo "<td>" . $row["office"] . "</td>";
                   echo "<td>" . $row["residence"] . "</td>";
                   echo "<td>" . $row["communication"] . "</td>";
                echo "</tr>";
               }
             }
        ?>					
        </tbody>
       </table>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>      
 </body>
</html>