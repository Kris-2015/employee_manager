<?php
ini_set("display_error","1");
require("DataFilter.php");

$sort_order = isset($_POST['get_sort']) ? $_POST['get_sort'] : 'asc-first_name';

$operation = explode('-', $sort_order);

$order = strtoupper($operation[0]);
$field_name = $operation[1]; 
$start_row = $_POST['page'];
//number of rows
$number_of_rows = 3;

//get the total numbet of rows
$obj = new data_filter();
$total_pages = ceil(mysqli_num_rows($obj->display())/$number_of_rows);

$page = new data_filter();
$data = $page->paging($field_name,$order,$start_row);

$result= ['total_pages' => $total_pages, 'data' => $data];
echo json_encode($result);
exit;
?>