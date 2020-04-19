<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "foodn";

//connection
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
	//connection failed msg
	die("Connection faile : " . mysqli_connect_error());
}
?>