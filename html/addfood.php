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
    $sql0="SELECT * from `food` where `name`='$b'";
    $result0 = mysqli_query($conn, $sql0);
  $row0 = mysqli_fetch_assoc($result0);
  $foodid=$row0["food_id"];
  $foodname=$row0["name"];
  $foodlocation=$row0["location"];
  $foodquantity=$row0["quantity"];
  require_once("DBConnect.php");
  $des=$_SESSION['username']." added ".$foodname." in ".$foodlocation." (".$foodquantity.").";
  $sql2="INSERT INTO `records` (`description`,`reg_id`) VALUES ('$des','$a')";
//   echo "first";
  if(mysqli_query($conn, $sql2)){
    //   echo "done";//sent mail to the organization who are near to the location.

                    require('phpmailer/class.phpmailer.php');
                    require('phpmailer/class.smtp.php');
                    $sentEmail=$_SESSION['email'];
                    $sentBy=$_SESSION['name'];
                
                    $message_body = "$b is added from: $c <br> By :$sentBy<br>Email : $sentEmail<br/>
                    <a href='http://localhost/Food-For-Needy/html/index.php?name=$b'>Click to view</a><br/>";
                    // <a href='http://foodforneedy.000webhostapp.com/html/index.php?name=$b'>Click to view</a><br/>";
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->SMTPAuth = TRUE;
                    $mail->SMTPSecure = 'tls'; // tls or ssl
                    $mail->Port     = "587";
                    $mail->Username = "fforneedy@gmail.com";
                    $mail->Password = "FOODISLIFE2020";
                    $mail->Host     = "smtp.gmail.com";
                    $mail->Mailer   = "smtp";
                    $mail->SetFrom("fforneedy@gmail.com", "Food for needy");
                    $mail->Subject = "New food added";
                    $mail->MsgHTML($message_body);
                    $mail->IsHTML(true);	
                    $sqlEmail="SELECT `email` from `register` where `user_type`='Receiver'";
                    require_once("DBConnect.php");
                    $resultEmail = $conn-> query($sqlEmail);
                        if($resultEmail-> num_rows >0){
                             while($rowEmail = $resultEmail-> fetch_assoc()){
                                    $email=$rowEmail["email"];
                                    $mail->AddAddress($email);	
                                    $result = $mail->Send();
                                }
                             }
  }
  else {
    echo "Error updating record: " . mysqli_error($conn);
    }
// echo "Record updated successfully";
// echo "<script>alert('Update Changes Successfully!');</script>";
//echo "<script>window.location='index.php';</script>";
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
        //   echo "<script>window.location='index.php';</script>";
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
                                <a href="new.php">New</a>
                                <a href="inbox.php">Inbox</a>
                                <a href="sent.php">Sent</a>
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
                            <a class="btn" href="records.php"><i class="fas fa-compass"></i>Records</a>
                        </li>

                        <li class="item">
                            <a class="btn" href="schedule.php"><i class="fas fa-calendar"></i>Schedule</a>
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
                        <a href="editprofile.php"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    </button>
                    <a id="hide" href="#" onclick="closeNav()"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a id="show" href="#" onclick="openNav()"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <button class="cloud">
                        <a href="index.php">DashBoard</a>
                    </button>
                </div>

                <!-- <li><a href="#"><span class="icon"><i class="fa fa-compass"></i></span><span>Brand</span></a></li> -->
                <li class="dropdown">
                    <a href="editprofile.php"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Profile</span></a>
                    <ul>
                        <li><a href="changepassword.php"><span class="icon"></span><span>Change Password</span></a></li>
                        <li class=""><a href="editprofile.php"><span class="icon"></span><span>Edit Profile</span></a></li>
                    </ul>
                </li>
                <li class="dropdown active">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Food List</span></a>
                    <ul>
                        <li class="active_child"><a href="#"><span class="icon"></span><span>Add to List</span></a></li>
                        <li><a href="post.php"><span class="icon"></span><span>Your List</span></a></li>
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
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Member</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Sponser</span></a></li>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Donor</span></a></li>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Receiver</span></a></li>
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
                    <form action="addfood.php" method="POST" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-8">
                                <div class="profile-block">
                                    <header class="profile-header">
                                        <h2><i class="fas fa-apple-alt"></i> New Food Information</h2>

                                    </header>
                                    <div class="profile-body">
                                            <div class="profile-view">
                                                <dl class="dl-horizontal">
                                                    <dt class="p-10">Food Name</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" required="required" name="name">
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-10">Location</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <select class="form-control" name="location">
                                                                          <option value="Bhaktapur">Bhaktapur</option>
                                                                          <option value="Kathmandu">Kathmandu</option>
                                                                          <option value="Lalitpur">Lalitpur</option>
                                                                      </select>
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-10">Type</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <select class="form-control" name="type">
                                                                          <option value="Vegetable">Vegetable</option>
                                                                          <option value="Meet & Popultry">Meat & Poultry</option>
                                                                          <option value="Fruits">Fruits</option>
                                                                          <option value="Grains,Beans and Nuts">Grains,Beans and Nuts</option>
                                                                          <option value="Dairy Foods">Dairy Foods</option>
                                                                          <option value="Fish and Seafoods">Fish and Seafoods</option>
                                                                      </select>
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-10">Quanitity</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" name="quantity">
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-10">Description</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="text" class="form-control" required="required" name="Description">
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt class="p-10">Exp. Date</dt>
                                                    <dd>
                                                        <div class="fg-line">
                                                            <input type="date" class="form-control" required="required" name="ExpDate">
                                                        </div>
                                                    </dd>
                                                </dl>

                                                <div class="m-t-30">
                                                    <button class="btn btn-primary btn-sm waves-effect" name="add_food">Save</button>

                                                </div>
                                                <br>
                                                <a href="index.php">Cancel</a>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="profile-details">
                                    <h2>Picture</h2>
                                    <button class="input-files">
                                        <input type="file" name="img" onchange="loadFile(event)"  accept="image/jpg, image/jpeg, image/png" id="file-inputs file" required="required">
                                        <label for="file-inputs">UPLOAD</label>
                                      </button>
                                      <p><img id="outputs" width="150" /></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </form>
                    <!-- end panel body -->
                </div>
            </div>
        </div>
    </div>
    <script>
var loadFile = function(event) {
	var image = document.getElementById('outputs');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/editprofile.js"></script>

    <script src="js/index1.js"></script>


</body>

</html>