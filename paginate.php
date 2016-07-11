<?php
ini_set("display_error","1");
require("DataFilter.php");

$start_row = $_POST['page'];
//get the total numbet of rows
$obj = new data_filter();
$total_pages = mysqli_num_rows($obj->display())/3;

$page = new data_filter();
$data = $page->paging($start_row);

$result= ['total_pages' => $total_pages, 'data' => $data];
echo json_encode($result);
exit;
?>