<?php include 'session.php';?>
	<?php
$food_id= @$_GET['id'];

if (isset($food_id)) {
    require_once('DBConnect.php');
$sql = "DELETE FROM `food` WHERE food_id='$food_id';";
            $sql1="SELECT `name` FROM `food` WHERE `food_id`='$food_id'";
            $result1 = mysqli_query($conn, $sql1);
             $row1 = mysqli_fetch_assoc($result1);
             $food_name=$row1['name'];

if (mysqli_query($conn, $sql)) {
   
                echo "<script>window.location='food.php';</script>";
            }

}
if (!isset($food_id)) {
	echo "<script>window.location='food.php';</script>";
}
?>
