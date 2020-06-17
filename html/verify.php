<?php
// echo $_COOKIE["member_login"];exit;
if(empty($_SESSION)) // if the session not yet started
   session_start();
$code=null;
$sentmails=null;
$sentmails=@$_GET['sentmails'];
// echo $sentmails;
$p_username=$_SESSION['username'];
require_once('DBConnect.php');
if($conn-> connect_error){
 		die("Connection failed:". $conn-> connect_error);
 	}
 	$sql = "SELECT username from `register` where `username`='$p_username' and `verified`=1";
 	$result2 = $conn-> query($sql);
     if($result2-> num_rows >0){
        echo "<script>window.location='index.php';</script>";
     }

$code_id = @$_GET['code'];
if(isset($code_id)){
    // echo "entered";    
    $user_name=$_SESSION['username'];
	$sql = "SELECT * FROM `register` WHERE `username`='$user_name' AND `code`='$code_id';";
	//echo $sql;
	require_once('DBConnect.php');
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
        // echo "greater than 0";
        $sql6 = " UPDATE `register` SET `verified`=1 WHERE `username`='$user_name'";
        require_once("DBConnect.php");
            if (mysqli_query($conn, $sql6)) {
                // echo "sql6";
                echo "<script>window.location='editprofile.php';</script>";
            }
    }
}
    
   if (isset($_POST['profile_edit'])) {
    $b = $_POST['firstname'];
    $c = $_POST['lastname'];
    $d = $_POST['user_type'];
    $e = $_POST['location'];
    $f = $_POST['contact'];
    $g = $_POST['email'];
    $h = $_POST['dob'];
    $i = $_POST['code'];
    
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
    $id=$_SESSION['reg_id'];
    $sql="SELECT * FROM `register` WHERE `reg_id`='$id'";
    require_once("DBConnect.php");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $code_id=$row["code"];
    if($i!=$code_id){
       echo "<script>alert('Invalid code!');</script>";
       echo "<script>window.location='verify.php';</script>";
       exit;
    }
    //file end
    
    // $id=$_SESSION['reg_id'];
    if(isset($_SESSION['usergoogle'])){
        $sql = " UPDATE `register` SET `user_type`='$d',`firstname`='$b',`lastname`='$c',`email`='$g',`location`='$e',`contact`='$f',`dob`='$h' WHERE `reg_id`='$id'";
           }
            else{
    
    // $b=$_SESSION['username'];
    $sql = " UPDATE `register` SET `user_type`='$d',`firstname`='$b',`lastname`='$c',`email`='$g',`location`='$e',`contact`='$f',`dob`='$h',`verified`=1 WHERE `reg_id`='$id'";
    // echo $sql;exit;
    }
    $_SESSION['name']=" ".$b." ".$c;
    $_SESSION['pic']=$_SESSION['username'];
    // Create connection
    require_once("DBConnect.php");
    
    if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
    // echo "<script>alert('Update Changes Successfully!');</script>";
    // echo "<script>window.location='index.php';</script>";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }
    $user=$_SESSION['username'].".jpg";
    // $sql="SELECT * FROM `register` WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
    $sql = " UPDATE `register` SET `pic`='$user' WHERE `reg_id`='$id'";
    
    // require_once("DBConnect.php");
    // $resultpic = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($resultpic);
    
    //     $bbb=$_POST['name'].$row["food_id"];//foodname + id
    
    //     $bname=$bbb.".jpg";
        if(empty($errors)==true){
        //    move_uploaded_file($file_tmp,"files/".$bname);
        move_uploaded_file($file_tmp,"files/".$user);
     
        //    $sql= "UPDATE `food` SET `pic`='$bname' WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
           require_once("DBConnect.php");
    
          if (mysqli_query($conn, $sql)) {
              echo "<script>window.location='login.php';</script>";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } 
        }
        mysqli_close($conn);
    }
if(isset($_SESSION['usergoogle']) || isset($_SESSION['username']) ){
    if(isset($_SESSION['usergoogle'])){
        $p=$_SESSION['usergoogle'];
        $fn= $_SESSION['givenName'];
        $ln=$_SESSION['familyName'];
        $n="null";
        require_once('DBConnect.php');
        $sql = "SELECT email from `register` where `email`='$p'";
        $result2 = $conn-> query($sql);
        if($result2-> num_rows ==0){
            require_once('DBConnect.php');
            $sql1 ="INSERT INTO `register`(`username`,`firstname`,`lastname`,`email`,`password`,`verified`,`status`) VALUES ('$n','$fn','$ln','$p','$n','1','1')";
            if(mysqli_query($conn1, $sql1)){
            }
        }
        
    } 
else{
$p=$_SESSION['username'];
require_once('DBConnect.php');
if($conn-> connect_error){
 		die("Connection failed:". $conn-> connect_error);
 	}
 	$sql = "SELECT username from `register` where `username`='$p'";
 	$result2 = $conn-> query($sql);
 	if($result2-> num_rows ==0){
echo "<script>window.location='login.php';</script>";
	exit();

	}
}}
else{
       echo "<script>window.location='login.php';</script>";
	exit();

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
    <link rel="stylesheet" href="css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/toast.css">

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
        margin-left:20px;
    }
    </style>
</head>

<!-- <body  <?php if($sentmails!=null){echo "onload='toast()'";}?> > <body onload="showbuttom()"> -->
    <div class="navbars">
    <div class="nav0">
            <a href="../index.html"><img src="files/mainlogo.jpg" style="border-radius: 20%;" width="40px" alt="Food for Needy">&nbsp;</a>
        </div>
        <div class="navbars1">
            <div class="nav3"><i class="fa fa-user fa-3x"></i>
                <div class="middle">
                    <div class="menu">
                    <li class="item" id='dashboard'>
                            <a href="#dashboard" class="btn"><i class="fa fa-home"></i>Dashboard</a>
                            <div class="smenu">
                            <a href="#">Home</a>
                            </div>
                        </li>
                        <li class="item" id='profile'>
                            <a href="#profile" class="btn"><i class="far fa-user"></i>Profile</a>
                            <div class="smenu">
                                <a href="#">Change Password</a>
                                <a href="#">Edit Profile</a>
                            </div>
                        </li>
                        <li class="item">
                            <a class="btn" href="#"><i class="fas fa-commenting"></i>Conversation</a>
                        </li>

                        <!-- <li class="item" id="messages">
                            <a href="#messages" class="btn"><i class="far fa-envelope"></i>Messages</a>
                            <div class="smenu">
                                <a href="#">New</a>
                                <a href="#">Inbox</a>
                                <a href="#">Sent</a>
                            </div>
                        </li> -->

                        <li class="item" id="settings">
                            <a href="#settings" class="btn"><i class="fas fa-cog"></i>Food List</a>
                            <div class="smenu">
                                <a href="#">Add Food</a>
                                <a href="#">Your List</a>
                            </div>
                        </li>
                        <li class="item">
                            <a class="btn" href="#"><i class="fas fa-compass"></i>Records</a>
                        </li>

                        <li class="item">
                            <a class="btn" href="#"><i class="fa fa-calendar"></i>Schedule</a>
                        </li>

                        <li class="item">
                            <a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="nav4">&nbsp&nbsp&nbsp&nbsp<a href=""><span style="font-family:sans-serif"><i class="fas fa-address-book"></i> CONTACT US</span></a></div>

            <div class="nav2">&nbsp&nbsp&nbsp&nbsp<a href="login.php"><span style="font-family:sans-serif"><i class="fab fa-earlybirds"></i> JOIN US</span></a></div>

            <div class="nav1"><a href=""><span style="font-family:sans-serif"><i class="fas fa-hands-helping"></i> DONATE</span></a></div>
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
                        <li><a href="#"><span class="icon"></span><span>Change Password</span></a></li>
                        <li class=""><a href="#"><span class="icon"></span><span>Edit Profile</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Food List</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"></span><span>Add to List</span></a></li>
                        <li class="active_child"><a href="#"><span class="icon"></span><span>Your List</span></a></li>
                    </ul>
                </li>
                <li><a href="chat.php"><span class="icon"><i class="fa fa-commenting"></i></span><span>Conversation</span></a></li>
                <!-- <li class="dropdown ">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Messages</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"></span><span>New</span></a></li>
                        <li><a href="#"><span class="icon"></span><span>Inbox</span></a></li>
                        <li class=""><a href="#"><span class="icon"></span><span>Sent</span></a></li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Member</span></a>
                    <ul>
                        <li><a href="sponser.php"><span class="icon"><i class="fa fa-user"></i></span><span>Sponser</span></a></li>
                        <li><a href="donor.php"><span class="icon"><i class="fa fa-user"></i></span><span>Donor</span></a></li>
                        <li><a href="receiver.php"><span class="icon"><i class="fa fa-user"></i></span><span>Receiver</span></a></li>
                    </ul>
                    </li>
                <li><a href="#"><span class="icon"><i class="fa fa-compass"></i></span><span>Records</span></a></li>
                <li><a href="#"><span class="icon"><i class="fa fa-calendar"></i></span><span>Schedule</span></a></li>

            </ul>
        </div>

        <div class="container">
            <div class="col-md-9 col-sm-6 contains">
                <div class="panel profile-panel">
                    <!-- <div class="panel-heading">
                        <div class="text-left">
                            <h2>Joe Doe</h2>
                        </div>
                    </div> -->
                    <!-- panel body -->
                    <h3 style="color:red">Your Account is not verified.</h3>
      <h5 style="color:#f3f">Update your Information to verify!</h5>
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
    $id=$_SESSION['reg_id'];
   $sql = "SELECT * from `register` WHERE `reg_id`='$id'";// where `verified`='1' AND `status`='1'";
   require_once("DBConnect.php");
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
    ?>
    
<form action="verify.php" method="POST" enctype="multipart/form-data" name="form">
                                    <h2>Picture</h2>
                                    <!-- <p><img id="outputs" width="150" /></p> -->
                                    <img id="outputs" src="files/<?php if($row["pic"]==null){echo 'user.png';}else{ echo $row["pic"];}?>" width="200">

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
                                        <!-- <ul class="actions">
                                        
                                            <li class="dropdown">

                                            <a class="input-fil" id="input-fil" href="changepassword.php"> <label for="file-inputs">Change Password</label> </a>
                                                <a href="#" data-toggle="dropdown">
                                                <i class="fa fa-pencil-square-o">Update Info</i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        <a data-profile-action="edit" href="#" onclick="showbuttom()">Edit</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </header>
                                    <div class="profile-body">
                                        
                                    
                                        <div class="profile-body">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">First Name</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="firstname" required="required" value="<?php echo $row["firstname"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Last Name</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="lastname" required="required" value="<?php echo $row["lastname"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">User Type</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <select class="form-control" name="user_type" required="required">
                                                                          <option value="Donator">Donator</option>
                                                                          <option value="Receiver">Receiver</option>
                                                                          <option value="Sponser">Sponser</option>
                                                                          <option value="Volunteer">Volunteer</option>
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
                                                <dt class="p-10">Contact</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="contact" required="required" value="<?php echo $row["contact"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Email</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="email" class="form-control" value="<?php echo $row["email"];?>" name="email" required="required">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">DoB</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="date" class="form-control" value="<?php echo $row["dob"];?>" name="dob" required="required">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Code</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="code" placeholder="Enter code from email" required="required">
                                                        <a style="padding:0 0 0 5px; color:black" onclick="sentmail()" href="#">Sent code</a>
                                                    </div>
                                                </dd>
                                            </dl>

                                            <div class="m-t-30">
                                                <button class="btn btn-primary btn-sm waves-effect" name="profile_edit">Save</button>
                                                <a href="logout.php">Logout</a>
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
    <div id="snackbar"><?php if($sentmails!=null){echo $sentmails;}else { echo "Enter valid Email Address".$sentmails;}?></div>
    <script>
</script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/editprofile.js"></script>

    <script src="js/index1.js"></script>
    <script src="js/toast.js"></script>
    <script>
    function showbuttom(){
    document.getElementById("uploadpic").style.display = "block";
    document.getElementById("input-fil").style.display="none";
    }
    var loadFile = function(event) {
	var image = document.getElementById('outputs');
	image.src = URL.createObjectURL(event.target.files[0]);
};
    </script>
     <script>
        function sentmail() {
  var x = document.forms["form"]["email"].value;
  var filters = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if ( filters.test(x)) {
    window.location='codeverify.php?email='+x;
  }else{
    document.forms["form"]["email"].focus();
    toast();
  }
}
</script>


</body>
</html>