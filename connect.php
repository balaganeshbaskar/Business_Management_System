<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bgb_bms';

$mysqli = mysqli_connect($server, $username, $password) or die("Error in Connection!");
mysqli_select_db($mysqli, $database) or die("Could not connect to DB!");

?>
