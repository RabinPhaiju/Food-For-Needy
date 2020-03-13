<?php include 'session.php';?>
	<?php
$message_id_inbox = @$_GET['msgid_inbox'];
$message_id_sent = @$_GET['msgid_sent'];
if (isset($message_id_inbox)) {
    require_once('DBConnect.php');
$sql = "DELETE FROM `messages` WHERE message_id='$message_id_inbox';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
        echo "<script>window.location='inbox.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}else if (isset($message_id_sent)) {
    require_once('DBConnect.php');
$sql = "DELETE FROM `messages` WHERE message_id='$message_id_sent';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
        echo "<script>window.location='sent.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}else{
    echo "<script>window.location='new.php';</script>";
}