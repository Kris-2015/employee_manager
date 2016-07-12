<?php
ini_set("display_error","1");
session_start();                            
include('DataFilter.php');

$search_name = $_POST['name'];
$search_email = $_POST['email'];
     		
$obj = new data_filter();
$data = $obj->searching($search_name, $search_email);

echo json_encode($data); 
exit;
?>