<?php
define('BASE_URL', ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1' ? 'http' : 'https') . '://' . $_SERVER['SERVER_NAME'] . '/');

$hostname = "localhost";
$username = "root";
$pass     = "mindfire";
$db_name  = "employee";


// Create connection

$conn = mysqli_connect($hostname, $username, $pass, $db_name);

// Check connection

if (!$conn) {
    die("Connection failed:" . mysqli_error());
}
//echo "Connected Successfully";

?>