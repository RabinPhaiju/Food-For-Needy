<?php include 'session.php';?>
<?php
if($_SESSION['reg_id']>3){
  echo "<script>window.location='user.php';</script>";
}

$userid = @$_GET['id'];
if (isset($userid)) {

    $sql = " UPDATE `register` SET `verified`=1 WHERE `reg_id`=$userid";
    
    require_once("DBConnect.php");
    
    if (mysqli_query($conn, $sql)) {
   
    echo "<script>window.location='user.php';</script>";
    } else {
    // echo "Error updating record: " . mysqli_error($conn);
    }
 
       
        mysqli_close($conn);
    }

if (!isset($userid)) {
	echo "<script>window.location='user.php';</script>";
}
?>