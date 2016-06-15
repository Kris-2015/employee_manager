<?php

/*echo '<pre>';
print_r($_REQUEST);
print_r($_FILES);*/

// echo 'First name: ' . $_REQUEST['fname'];

/*foreach ($_GET AS $key => $value) {
	echo 'KEY: ' . $key . ' Value: ' . $value;
}*/

echo '<pre>';
print_r($_POST);
exit;


if ($_POST["fname"] || $_POST["mname"]|| $_POST["lname"]||$_POST['dob']||$_POST['gender']) {
	
	echo "Welcome ".$_POST['fname'].$_POST['mname'].$_POST['lname']."<br><br>";
	echo "Your are alpha ".$_POST['gender'].'<br>';
	echo "  Born on ".$_POST['dob']."<br>";
}

exit;