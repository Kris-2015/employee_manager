<?php
ini_set("display_error","1");
session_start();                            
include('user.php');

       		$search_name = $_POST['name'];
       		$search_email = $_POST['email'];
       		
            $obj = new user();
            $data = [];
            $result = $obj->search_user($search_name, $search_email);
            if (mysqli_num_rows($result) > 0)
            {
              while ($row = mysqli_fetch_assoc($result))
              {
              	$data[] = $row;
              }
          	}

echo json_encode($data); 
exit;