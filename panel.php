<?php 
 include("control_permission.php");
//instaintiatign the the ACL class
$obj =  new ACL();

if(isset($_POST['start'])==1)
{
	$data = $obj->getrrp();
}
 
echo json_encode($data);
?>