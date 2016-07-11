<?php
ini_set("display_error","1");
session_start();
require("DataFilter.php");

//accepting the value through ajax	
$operation = explode('-', $_POST['name']);
$order = strtoupper($operation[0]);
$field_name = $operation[1]; 

$sort = new data_filter();
$data  = $sort->sorting($field_name,$order);

 echo json_encode($data);
 exit;
?>