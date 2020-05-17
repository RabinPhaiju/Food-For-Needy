<?php
// echo $_COOKIE["member_login"];exit;
if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { 
	echo "<script>window.location='../index.php';</script>";
	exit;
}
?>