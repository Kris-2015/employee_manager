<?php
    ini_set("display_error","1");
    session_start();
	  require("user.php");

	//accepting the value through ajax
	
	$operation = explode('-', $_POST['name']);
	$order = strtoupper($operation[0]);
	$field_name = $operation[1];

	$sort = new user();
	$data = [];
	$result  = $sort->sorting($field_name,$order);

	if (mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_assoc($result))
      {
       	$data[] = $row;
      }
    }
    else 
    {
        echo 'else';
    }

 echo json_encode($data);
 exit;
?>