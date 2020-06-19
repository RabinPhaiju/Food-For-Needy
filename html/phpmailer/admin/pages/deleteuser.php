<?php include 'session.php';?>
    <?php
    if($_SESSION['reg_id']>3){
        echo "<script>window.location='user.php';</script>";
      }

$user_id= @$_GET['id'];

if (isset($user_id)) {
    require_once('DBConnect.php');
$sql = "DELETE FROM `register` WHERE reg_id='$user_id';";

if (mysqli_query($conn, $sql)) {
   
                echo "<script>window.location='user.php';</script>";
            }

}
if (!isset($user_id)) {
	echo "<script>window.location='user.php';</script>";
}
?>
