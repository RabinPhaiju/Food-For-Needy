<?php
include 'session.php';
$foodid = @$_GET['foodid'];

if (isset($_POST['food_edit'])) {
    $foodid=$_POST['foodid'];
$b = $_POST['name'];
$c = $_POST['quantity'];
$d = $_POST['type'];
$e = $_POST['location'];
$g = $_POST['Description'];
$h = $_POST['ExpDate'];

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
   echo "<script>window.location='editprofile.php';</script>";
   exit;
   
}
if($file_size > 2097152){
   $errors[]='File size must be less than or equal to 2 MB';
   echo "<script>alert('File size must be less than or equal to 2 MB');</script>";
   echo "<script>window.location='editprofile.php';</script>";
   exit;
}
//file end

if(isset($_SESSION['usergoogle'])){
    $sql = " UPDATE `food` SET `name`='$b',`location`='$e',`quantity`='$c',`ExpDate`='$h',`Description`='$g',`type`='$d' WHERE `food_id`='$foodid'";
       }
        else{

// $b=$_SESSION['username'];
$sql = " UPDATE `food` SET `name`='$b',`location`='$e',`quantity`='$c',`ExpDate`='$h',`Description`='$g',`type`='$d' WHERE `food_id`='$foodid'";
// echo $sql;exit;
}
// Create connection
require_once("DBConnect.php");
if (mysqli_query($conn, $sql)) {
// echo "Record updated successfully";
$sql0="SELECT * from `food` where `name`='$b'";
$result0 = mysqli_query($conn, $sql0);
$row0 = mysqli_fetch_assoc($result0);
$foodid=$row0["food_id"];
$foodname=$row0["name"];
$foodlocation=$row0["location"];
$foodquantity=$row0["quantity"];
require_once("DBConnect.php");
$des=$_SESSION['username']." updated ".$foodname." in ".$foodlocation." (".$foodquantity.").";
$sql2="INSERT INTO `records` (`description`,`reg_id`) VALUES ('$des','$a')";
//   echo "first";
if(mysqli_query($conn, $sql2)){
//   echo "done";
}
else {
echo "Error updating record: " . mysqli_error($conn);
}
// echo "<script>alert('Update Changes Successfully!');</script>";
// echo "<script>window.location='index.php';</script>";
} else {
echo "Error updating record: " . mysqli_error($conn);
}
$bc = str_replace(' ', '', $b);
$foodnames=$bc.$foodid.".jpg";
// $sql="SELECT * FROM `register` WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
$sql = " UPDATE `food` SET `pic`='$foodnames' WHERE `food_id`='$foodid'";

// require_once("DBConnect.php");
// $resultpic = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($resultpic);

//     $bbb=$_POST['name'].$row["food_id"];//foodname + id

//     $bname=$bbb.".jpg";
    if(empty($errors)==true){
    //    move_uploaded_file($file_tmp,"files/".$bname);
    move_uploaded_file($file_tmp,"files/".$foodnames);
 
    //    $sql= "UPDATE `food` SET `pic`='$bname' WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
       require_once("DBConnect.php");

      if (mysqli_query($conn, $sql)) {
          echo "<script>window.location='index.php';</script>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      } 
    }
    mysqli_close($conn);
}
if (!isset($foodid)) {
	echo "<script>window.location='index.php';</script>";
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
    <title>Edit Profile</title>
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
            margin-top:5px;
            display:none;
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
    </style>
</head>

<body>
    <div class="navbars">
        <div class="nav0">
            <a href="../index.html"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
        </div>
        <div class="navbars1">
            <div class="nav3"><i class="fa fa-user fa-3x" aria-hidden="true"></i>
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
                                <a href="#">Edit Profile</a>
                            </div>
                        </li>

                        <li class="item" id="messages">
                            <a href="#messages" class="btn"><i class="far fa-envelope"></i>Messages</a>
                            <div class="smenu">
                            <div class="smenu">
                                <a href="new.php">New</a>
                                <a href="inbox.php">Inbox</a>
                                <a href="sent.php">Sent</a>
                            </div>
                        </li>

                        <li class="item" id="settings">
                            <a href="#settings" class="btn"><i class="fas fa-cog"></i>Food List</a>
                            <div class="smenu">
                                <a href="addfood.php">Add Food</a>
                                <a href="post.php">Your List</a>
                            </div>
                        </li>
                        <li class="item">
                            <a class="btn" href="records.php"><i class="fas fa-compass"></i>Records</a>
                        </li>

                        <li class="item">
                            <a class="btn" href="schedule.php"><i class="fa fa-calendar"></i>Schedule</a>
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
                <li class="dropdown active">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Food List</span></a>
                    <ul>
                        <li><a href="addfood.php"><span class="icon"></span><span>Add to List</span></a></li>
                        <li class="active_child"><a href="post.php"><span class="icon"></span><span>Your List</span></a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Messages</span></a>
                    <ul>
                        <li><a href="new.php"><span class="icon"></span><span>New</span></a></li>
                        <li><a href="inbox.php"><span class="icon"></span><span>Inbox</span></a></li>
                        <li class=""><a href="sent.php"><span class="icon"></span><span>Sent</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Product</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"></span><span>Add</span></a></li>
                        <li><a href="#"><span class="icon"></span><span>List</span></a></li>
                    </ul>
                    </li>
                <li><a href="records.php"><span class="icon"><i class="fa fa-compass"></i></span><span>Records</span></a></li>
                <li><a href="schedule.php"><span class="icon"><i class="fa fa-calendar"></i></span><span>Schedule</span></a></li>

            </ul>
        </div>

        <div class="container">
            <div class="col-md-8 col-sm-9">
                <div class="panel profile-panel">
                    <!-- <div class="panel-heading">
                        <div class="text-left">
                            <h2>Joe Doe</h2>
                        </div>
                    </div> -->
                    <!-- panel body -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="figure-wrapper">
                                    <!-- <figure>
                                        <img src="http://i2.imgbus.com/doimg/5co1mm5on9b50e7.jpg" alt="">
                                    </figure> -->
                                </div>
                                <div class="profile-details">
                                    <!-- <h2>Contact</h2>
                                    <ul>
                                        <li><i class="fa fa-tasks"></i> Business development</li>
                                        <li><i class="fa fa-users"></i> DHL</li>
                                        <li><i class="fa fa-phone"></i> 00971 12345678</li>
                                        <li><i class="fa fa-envelope"></i> joedoe@gmail.com</li>
                                    </ul> -->
                                    <?php
   $sql = "SELECT * from `food` WHERE `food_id`='$foodid'";// where `verified`='1' AND `status`='1'";
   require_once("DBConnect.php");
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
    ?>
<form action="viewfood.php" method="POST" enctype="multipart/form-data">
                                    <h2>Picture</h2>
                                    <!-- <p><img id="outputs" width="150" /></p> -->
                                    <img id="outputs" src="files/<?php if($row["pic"]==null){echo 'food.png';}else{ echo $row["pic"];}?>" width="200">

                                    <div class="profile-details">
                                    
                                    <button class="input-files" id="uploadpic">
                                        <input type="file" name="img" onchange="loadFile(event)"  accept="image/jpg, image/jpeg, image/png" id="file-inputs file" required="required">
                                        <label for="file-inputs">UPLOAD</label>
                                      </button>
                                </div>
                                    <!-- upload pic -->
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-block">
                                    <header class="profile-header">
                                        <h2><i class="fa fa-user"></i> Information</h2>
                                        <ul class="actions">
                                        
                                            <li class="dropdown">
                                                <a href="#" data-toggle="dropdown">
                                                <i class="fa fa-pencil-square-o">Update</i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><?php if ($_SESSION['reg_id']==$row['updated_by']){?>
                                                        <a data-profile-action="edit" href="#" onclick="showbuttom()">Edit</a>
                                                    <?php } else { ?> <a href="#">Not Allowed</a><?php }?>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="profile-body">
                                        <div class="profile-view">
                                        <dl class="dl-horizontal">
                                                <dt>Food Id</dt>
                                                <dd><?php echo $row["food_id"];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Food Type</dt>
                                                <dd><?php echo $row["type"];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Food Name</dt>
                                                <dd><?php echo $row["name"];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Quantity</dt>
                                                <dd><?php echo $row["quantity"];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Location</dt>
                                                <dd><?php echo $row["location"];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Description</dt>
                                                <dd><?php echo $row["Description"];?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Exp Date</dt>
                                                <dd><?php echo $row["ExpDate"];?></dd>
                                            </dl>
                                        </div>
                                    
                                        <div class="profile-edit">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Food Name</dt>
                                                <input type="hidden" name="foodid" value="<?php echo $row["food_id"];?>">
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="name" required="required" value="<?php echo $row["name"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Quantity</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="quantity" required="required" value="<?php echo $row["quantity"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Food Type</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <select class="form-control" name="type" required="required">
                                                        <option value="Vegetable">Vegetable</option>
                                                                          <option value="Meet & Popultry">Meat & Poultry</option>
                                                                          <option value="Fruits">Fruits</option>
                                                                          <option value="Grains,Beans and Nuts">Grains,Beans and Nuts</option>
                                                                          <option value="Dairy Foods">Dairy Foods</option>
                                                                      </select>
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Location</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <select class="form-control" name="location" required="required">
                                                                          <option value="Bhaktapur">Bhaktapur</option>
                                                                          <option value="Kathmandu">kathmandu</option>
                                                                          <option value="Lalitpur">Lalitpur</option>
                                                                      </select>
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Description</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" value="<?php echo $row["Description"];?>" name="Description" required="required">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Exp Date</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="date" class="form-control" value="<?php echo $row["ExpDate"];?>" name="ExpDate" required="required">
                                                    </div>
                                                </dd>
                                            </dl>

                                            <div class="m-t-30">
                                                <button class="btn btn-primary btn-sm waves-effect" name="food_edit">Save</button>
                                                <button data-profile-action="reset" class="btn-link btn-cancel">Cancel</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end panel body -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/editprofile.js"></script>

    <script src="js/index1.js"></script>
    <script>
    function showbuttom(){
    document.getElementById("uploadpic").style.display = "block";
    }
    var loadFile = function(event) {
	var image = document.getElementById('outputs');
	image.src = URL.createObjectURL(event.target.files[0]);
};
    </script>

</body>

</html>