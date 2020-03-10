<?php
include 'session.php';
if (isset($_POST['add_food'])) {
$b = $_POST['name'];
$c = $_POST['location'];
$d = $_POST['quantity'];
$e = $_POST['ExpDate'];
$f = $_POST['Description'];
$g = $_POST['type'];
//file
$errors= array();
$file_name =$_FILES['img']['name'];
$file_size =$_FILES['img']['size'];
$file_tmp =$_FILES['img']['tmp_name'];
$file_type=$_FILES['img']['type'];
$bb=strrpos($file_name,".")+1;
$file_ext=substr($file_name,$bb);
$extensions= array("jpeg","jpg","png");

if(in_array($file_ext,$extensions)=== false){
   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   echo "<script>alert('extension not allowed, please choose a JPEG or PNG file.');</script>";
   echo "<script>window.location='addfood.php';</script>";
   exit;
   
}
if($file_size > 2097152){
   $errors[]='File size must be less than or equal to 2 MB';
   echo "<script>alert('File size must be less than or equal to 2 MB');</script>";
   echo "<script>window.location='addfood.php';</script>";
   exit;
}
//file end


if(isset($_SESSION['usergoogle'])){
    $a=$_SESSION['reg_id'];
    $sql = "INSERT INTO `food` (`updated_by`,`name`,`location`,`quantity`,`ExpDate`,`Description`,`type`) VALUES('$a','$b','$c','$d','$e','$f','$g')";
       }
        else{

// $b=$_SESSION['username'];
$a=$_SESSION['reg_id'];
$sql = "INSERT INTO `food` (`updated_by`,`name`,`location`,`quantity`,`ExpDate`,`Description`,`type`) VALUES('$a','$b','$c','$d','$e','$f','$g')";
// echo $sql;exit;
}
// Create connection
require_once("DBConnect.php");

if (mysqli_query($conn, $sql)) {
// echo "Record updated successfully";
// echo "<script>alert('Update Changes Successfully!');</script>";
// echo "<script>window.location='index.php';</script>";
} else {
echo "Error updating record: " . mysqli_error($conn);
}

$sql="SELECT * FROM `food` WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";

require_once("DBConnect.php");
$resultpic = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($resultpic);
$bc = str_replace(' ', '', $b);
    $bbb=$bc.$row["food_id"];//foodname + id

    $bname=$bbb.".jpg";
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"files/".$bname);
 
       $sql= "UPDATE `food` SET `pic`='$bname' WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
       require_once("DBConnect.php");

      if (mysqli_query($conn, $sql)) {
          echo "<script>window.location='index.php';</script>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      } 
    }
    mysqli_close($conn);
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>Add Food</title>
    <style>
        .input-files {
            position: relative;
            overflow: hidden;
            width: 150px;
            height: 40px;
            border: none;
            background-color: #0077CC;
            border-radius: 3px;
            box-shadow: 1px 1px 2px rgba(0, 0, 0, .5);
            cursor: pointer;
            transition: background-color .3s ease;
            margin-bottom:5px;
        }
        
        .input-files:hover {
            background-color: #1788d8;
        }
        
        .input-files [type=file] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        
        .input-files label {
            font-family: 'arial';
            color: #F1F1F1;
            font-weight: bold;
            font-size: 17px;
            cursor: pointer;
        }
        .panel table {
			margin-top: 18px;
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}
		.panel td, .panel th {
		  border: 0px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}
		.panel tr:nth-child(even) {
		  background-color: #dddddd;
		}
		@media only screen and (max-width: 1300px) {
            .panel td,.panel th{
					font-size: 8px;
				}
				.panel img{
		    height:30px;
        }
    }
    .contains {
        margin-left:5px;
    }
    </style>
</head>

<body>
    <div class="navbars">
        <div class="nav0">
            <a href="../index.html"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
        </div>
        <div class="navbars1">
            <div class="nav3"><i class="fa fa-user fa-3x"></i>
                <div class="middle">
                    <div class="menu">
                    <li class="item" id='dashboard'>
                            <a href="#dashboard" class="btn"><i class="fa fa-home"></i>Dashboard</a>
                            <div class="smenu">
                            <a href="index.php">Home</a>
                            </div>
                        </li>
                        <li class="item" id='profile'>
                            <a href="#profile" class="btn"><i class="far fa-user"></i>Profile</a>
                            <div class="smenu">
                                <a href="changepassword.php">Change Password</a>
                                <a href="editprofile.php">Edit Profile</a>
                            </div>
                        </li>

                        <li class="item" id="messages">
                            <a href="#messages" class="btn"><i class="far fa-envelope"></i>Messages</a>
                            <div class="smenu">
                                <a href="#">New</a>
                                <a href="#">Inbox</a>
                                <a href="#">Sent</a>
                            </div>
                        </li>

                        <li class="item" id="settings">
                            <a href="#settings" class="btn"><i class="fas fa-cog"></i>Food List</a>
                            <div class="smenu">
                                <a href="#">Add Food</a>
                                <a href="post.php">Your List</a>
                            </div>
                        </li>

                        <li class="item">
                            <a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="nav4"><a href="">CONTACT US</a></div>

            <div class="nav2"><a href="login.php">JOIN US</a></div>

            <div class="nav1"><a href="">DONATE</a></div>
        </div>


    </div>
    <div class="body_wrapper">
        <div class="sidemenu" id="mySidebar">
            <ul>
                <!-- <li><a href="#"><span class="icon"><i class="fa fa-tachometer"></i></span><span></span></a></li> -->

                <div class="me userBg">
                <div class="images">
                    <img style="margin-top:22px" src="files/<?php if($_SESSION['pic']==null){echo 'user.png';}else{ echo $_SESSION['pic'];}?>" width="60";>
                    </div>

                    <div class="myinfo">
                        <p class="name">Name :<?php echo $_SESSION['name']?></p>
                        <!-- <p class="phone">Email<?php echo $_SESSION['email']?></p> -->
                    </div>

                    <button class="setting">
                        <a href="#"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    </button>
                    <a id="hide" href="#" onclick="closeNav()"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a id="show" href="#" onclick="openNav()"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <button class="cloud">
                        <a href="index.php">DashBoard</a>
                    </button>
                </div>

                <!-- <li><a href="#"><span class="icon"><i class="fa fa-compass"></i></span><span>Brand</span></a></li> -->
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Profile</span></a>
                    <ul>
                        <li><a href="changepassword.php"><span class="icon"></span><span>Change Password</span></a></li>
                        <li class=""><a href="editprofile.php"><span class="icon"></span><span>Edit Profile</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Food List</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"></span><span>Add to List</span></a></li>
                        <li class="active_child"><a href="post.php"><span class="icon"></span><span>Your List</span></a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Messages</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"></span><span>New</span></a></li>
                        <li><a href="#"><span class="icon"></span><span>Inbox</span></a></li>
                        <li class=""><a href="#"><span class="icon"></span><span>Sent</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Product</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"></span><span>Add</span></a></li>
                        <li><a href="#"><span class="icon"></span><span>List</span></a></li>
                    </ul>
                </li>
                <li class="active"><a href="#"><span class="icon"><i class="fa fa-compass"></i></span><span>Records</span></a></li>
                <li><a href="calender.php"><span class="icon"><i class="fa fa-calendar"></i></span><span>Calender</span></a></li>

            </ul>
        </div>

        <div class="container">
            <div class="col-md-6 col-sm-9 contains">
                <div class="panel profile-panel">
                    <!-- <div class="panel-heading">
                        <div class="text-left">
                            <h2>Joe Doe</h2>
                        </div>
                    </div> -->
                    <!-- panel body -->
                    <table>
	<tr>
	    <td></td>
		<td><b>Recent added Items (10)</b></td>
		<!-- <td><b>Address</b></td>
		<td><b>Phone</b></td>
		<td><b>Bloodtype</b></td> -->
	</tr>
    <?php
    $count=1;
    require_once("DBConnect.php");
	if($conn-> connect_error){
		die("Connection failed:". $conn-> connect_error);
    }
    $session_reg_id=$_SESSION['reg_id'];
        $sql = "SELECT * from records ";
       
	$result = $conn-> query($sql);
    // echo $result-> num_rows;
	if($result-> num_rows >0){
        if($result-> num_rows>10){
            $del1=$result-> num_rows-10;
            // $del=$result-> num_rows-$del1;
            $del_count=0;
            while($del_count<$del1){
                $row = $result-> fetch_assoc();
                $food=$row["food_id"];
               $sql0= "DELETE FROM `records` WHERE `food_id`='$food'";
               require_once("DBConnect.php");
            //    mysqli_query($conn, $sql0);
               $del_count++;
            }
            // $sql = "SELECT * from records ORDER BY record_id DESC ";
            // $result = $conn-> query($sql);
        }
        
		while($row = $result-> fetch_assoc()){
    echo "<tr><td>";
        $food_reg_id=$row["food_id"];
        $sql1 = "SELECT * from `register` WHERE `reg_id`='$session_reg_id'";
        require_once("DBConnect.php");
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $sql2 = "SELECT * from `food` WHERE `food_id`='$food_reg_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
    	echo "</td>
            <td>". $count.") ".$row1["username"]." added"." ".$row2["name"]." from ".$row2["location"]." (".$row2["quantity"].")</td></tr>";
            $count++;
				}}
		
        echo "</table>";
    
        ?>
                    <!-- end panel body -->
                </div>
            </div>
        </div>
    </div>
    <script>
</script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/editprofile.js"></script>

    <script src="js/index1.js"></script>


</body>

</html>