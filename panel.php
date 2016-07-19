<?php 
 include("control_permission.php");
//instaintiatign the the ACL class
$obj =  new ACL();

if($_POST['start']==1)
{
	$data = $obj->getrrp();
}
else if($_POST['start']==2)
{
	$data = $obj->getprivilege($_POST['role'],$_POST['resource']);
}
else if($_POST['start']==3)
{
	$data = $obj->setprivilege($_POST['role'],$_POST['resource'],$_POST['privilege'],$_POST['action']);
}
 
echo json_encode($data);
?>