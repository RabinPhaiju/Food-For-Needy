<?php include 'session.php';?>
	<?php
$message_id = @$_GET['msgid'];
if (!isset($message_id)) {
	echo "<script>window.location='new.php';</script>";
}
require_once('DBConnect.php');
$sql = "DELETE FROM `messages` WHERE message_id='$message_id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    echo "<script>window.location='new.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}