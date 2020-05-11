<?php
include 'session.php';
$view_user= @$_GET['view'];
if($view_user==null){
    echo "<script>window.location='chat.php';</script>";
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
    <title><?php echo $view_user;?></title>
   
</head>

<body>
    <div class="navbars">
    <div class="nav0">
            <a href="../index.html"><img src="files/mainlogo.jpg" style="border-radius: 20%;" width="40px" alt="Food for Needy">&nbsp;</a>
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
                        <li class="item">
                            <a class="btn" href="chat.php"><i class="fas fa-commenting"></i>Conversation</a>
                        </li>

                        <!-- <li class="item" id="messages">
                            <a href="#messages" class="btn"><i class="far fa-envelope"></i>Messages</a>
                            <div class="smenu">
                                <a href="new.php">New</a>
                                <a href="inbox.php">Inbox</a>
                                <a href="sent.php">Sent</a>
                            </div>
                        </li> -->

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
                            <a class="btn" href="schedule.php"><i class="fas fa-calendar"></i>Schedule</a>
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
                    <img style="margin-top:22px;border-radius:5%" src="files/<?php if($_SESSION['pic']==null){echo 'user.png';}else{ echo $_SESSION['pic'];}?>" width="60";>
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
                        <li class=""><a href="#"><span class="icon"></span><span>Edit Profile</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Food List</span></a>
                    <ul>
                        <li><a href="addfood.php"><span class="icon"></span><span>Add to List</span></a></li>
                        <li class="active_child"><a href="post.php"><span class="icon"></span><span>Your List</span></a></li>
                    </ul>
                </li>
                <li><a href="chat.php"><span class="icon"><i class="fa fa-commenting"></i></span><span>Conversation</span></a></li>
                <!-- <li class="dropdown ">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Messages</span></a>
                    <ul>
                        <li><a href="new.php"><span class="icon"></span><span>New</span></a></li>
                        <li><a href="inbox.php"><span class="icon"></span><span>Inbox</span></a></li>
                        <li class=""><a href="sent.php"><span class="icon"></span><span>Sent</span></a></li>
                    </ul>
                </li> -->
                <li class="dropdown active">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Member</span></a>
                    <ul>
                        <li><a href="sponser.php"><span class="icon"><i class="fa fa-user"></i></span><span>Sponser</span></a></li>
                        <li><a href="donor.php"><span class="icon"><i class="fa fa-user"></i></span><span>Donor</span></a></li>
                        <li><a href="receiver.php"><span class="icon"><i class="fa fa-user"></i></span><span>Receiver</span></a></li>
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
   $sql = "SELECT * from `register` WHERE `username`='$view_user'";// where `verified`='1' AND `status`='1'";
   require_once("DBConnect.php");
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
    ?>
                                    <h2>Picture</h2>
                                    <!-- <p><img id="outputs" width="150" /></p> -->
                                    <img id="outputs" src="files/<?php if($row["pic"]==null){echo 'user.png';}else{ echo $row["pic"];}?>" width="200" style="border-radius:10%">
                                    <!-- upload pic -->
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-block">
                                    <header class="profile-header">
                                        <h2><i class="fa fa-user"></i> Information</h2>
                                        <ul class="actions">
                                            <li class="dropdown">
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        <a data-profile-action="edit" href="#" onclick="showbuttom()">Edit</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="profile-body">
                                        <div class="profile-view">
                                        <dl class="dl-horizontal">
                                                <dt>User Name</dt>
                                                <dd><strong><?php echo $row["username"];?></strong></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>User Type</dt>
                                                <dd><strong><?php echo $row["user_type"];?></strong></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Full Name</dt>
                                                <dd><strong><?php echo $row["firstname"]." ".$row["lastname"];?></strong></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Email</dt>
                                                <dd><strong><?php echo $row["email"];?></strong></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Location</dt>
                                                <dd><strong><?php echo $row["location"];?></strong></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Contact</dt>
                                                <dd><strong><?php echo $row["contact"];?></strong></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>DoB</dt>
                                                <dd><strong><?php echo $row["dob"];?></strong></dd>
                                            </dl>
                                        </div>
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
    <script src="js/index1.js"></script>
    <script src="js/editprofile.js"></script>

</body>

</html>