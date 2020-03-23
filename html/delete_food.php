<?php include 'session.php';?>
	<?php
$food_id= @$_GET['food_id'];

if (isset($food_id)) {
    require_once('DBConnect.php');
$sql = "DELETE FROM `food` WHERE food_id='$food_id';";
            $sql1="SELECT `name` FROM `food` WHERE `food_id`='$food_id'";
            $result1 = mysqli_query($conn, $sql1);
             $row1 = mysqli_fetch_assoc($result1);
             $food_name=$row1['name'];

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
            require_once("DBConnect.php");
            $des=$_SESSION['username']." deleted ".$food_name." (".$food_id.")";
            $a=$_SESSION['reg_id'];
            $sql2="INSERT INTO `records` (`description`,`reg_id`) VALUES ('$des','$a')";
            if(mysqli_query($conn, $sql2)){
                echo "<script>window.location='post.php';</script>";
            }
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}
?>
