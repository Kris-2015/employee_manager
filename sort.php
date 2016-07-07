<?php
    ini_set("display_error","1");
    session_start();
	require("user.php");

	//accepting the value through ajax
	$first_name = $_POST['first_name'];
	$order = isset($_POST['order']) ? $_POST['order'] : ' ' ;

	$sort = new user();
	$data = [];
	$result  = $sort->sorting($first_name,$order1,$order2);

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

 json_encode($data);

?>