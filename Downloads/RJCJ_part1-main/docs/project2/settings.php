<?php
if (!defined('ALLOW_SETTINGS')) {
    die('Direct access not permitted.');
}

$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "Group05";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>