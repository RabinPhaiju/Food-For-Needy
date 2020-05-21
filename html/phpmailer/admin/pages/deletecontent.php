<?php include 'session.php';?>
	<?php
$content_id= @$_GET['id'];

if (isset($content_id)) {
    require_once('DBConnect.php');
$sql = "DELETE FROM `content` WHERE `id`='$content_id';";

if (mysqli_query($conn, $sql)) {
   
                echo "<script>window.location='content.php';</script>";
            }

}
if (!isset($content_id)) {
	echo "<script>window.location='content.php';</script>";
}
?>
