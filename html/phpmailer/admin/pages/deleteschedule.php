<?php include 'session.php';?>
	<?php
$schedule_id= @$_GET['id'];

if (isset($schedule_id)) {
    require_once('DBConnect.php');
$sql = "DELETE FROM `schedule` WHERE schedule_id='$schedule_id';";

if (mysqli_query($conn, $sql)) {
   
                echo "<script>window.location='schedule.php';</script>";
            }

}
if (!isset($user_id)) {
	echo "<script>window.location='schedule.php';</script>";
}
?>
