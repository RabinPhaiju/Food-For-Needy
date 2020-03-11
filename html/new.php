<?php
include 'session.php';
$error=null;
if (isset($_POST['send'])) {
    $a = $_POST['username'];
    
    $sqlcheck = "SELECT * FROM `register` WHERE `username`='$a'";
	require_once('DBConnect.php');
	$resultt = mysqli_query($conn, $sqlcheck);
	if (mysqli_num_rows($resultt) > 0) {
        $b = $_SESSION['username'];
        $c = $_POST['subject'];
        $d = $_POST['message'];
        require_once("DBConnect.php");
      $sql="INSERT INTO `messages` (`msg_to`,`msg_from`,`subject`,`message`) VALUES ('$a','$b','$c','$d')";
      if(mysqli_query($conn, $sql)){
        echo "<script>window.location='sent.php';</script>";
      }
      else {
        echo "Error updating record: " . mysqli_error($conn);
        }
    }else{
        $error="Recipient is not available! Search";
    }
  

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
        .demo-ribbon {
 width: 100%;
 height: 100%;
 /* background-color: #3F51B5; */
 flex-shrink: 0;
}

.demo-main {
 /* margin-top: -35vh; */
 flex-shrink: 0;
}

.demo-header .mdl-layout__header-row {
 padding-left: 40px;
}

.demo-container {
 max-width: 1600px;
 width: 100%;
 margin: 0 auto;
}

.demo-content {
 border-radius: 2px;
 padding: 0px 56px 80px;
}

.demo-layout.is-small-screen .demo-content {
 padding: 0px 28px 40px;
}

.demo-content h3 {
 margin-top: 48px;
}

.demo-footer {
 padding-left: 40px;
}

.demo-footer .mdl-mini-footer--link-list a {
 font-size: 13px;
}

.mdl-textfield {
 width: 100%
}

.success-help {
 padding: 0 15px;
 vertical-align: -3px;
 display: none;
 font-size: 16px;
 color: #444;
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
                        <li><a href="addfood.php"><span class="icon"></span><span>Add to List</span></a></li>
                        <li class="active_child"><a href="post.php"><span class="icon"></span><span>Your List</span></a></li>
                    </ul>
                </li>
                <li class="dropdown active">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Messages</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"></span><span>New</span></a></li>
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
                <li><a href="calender.php"><span class="icon"><i class="fa fa-calendar"></i></span><span>Calender</span></a></li>

            </ul>
        </div>

        <div class="container">
            <div class="col-md-9 col-sm-9 contains">
                <div class="panel profile-panel">
                    <div class="panel-heading">
                        <div class="text-left">
                            <h2>Sent new Message</h2>
                        </div>
                    </div>
                    <!-- panel body -->
                    <div class="container form-top">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="panel panel-danger">
                            <div class="panel-body">
                                <form id="reused_form" action="new.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label><i class="fa fa-user" aria-hidden="true"></i> To user</label>
                                        <br>
                                        <input type="text" list="usernames" placeholder="<?php if($error!=null){echo $error;}else{echo "Search";}?>" name="username" class="form-control" required>
                                                <datalist id="usernames">
                                                    <?php
                                                require_once("DBConnect.php");
                                                $sql = "SELECT * from register ORDER BY `username` ASC ";
                                                 $result = $conn-> query($sql);
		                                        while($row = $result-> fetch_assoc()){  
                                                    if($row["username"]==$_SESSION['username']){
                                                        continue;
                                                    }
                                                    ?> 
                                                <option value="<?php echo $row["username"];?>">
                                                <?php  }  ?>
                                                </datalist>
                                    </div>
                                    <?php if($error!=null){echo "<p style='color:red'>Recipient not found!</p><br>";} ?>
                                    <div class="form-group">
                                        <label><i class="fa fa-envelope" aria-hidden="true"></i> Subject</label>
                                        <input type="text" name="subject" placeholder="Enter Subject" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fa fa-comment" aria-hidden="true"></i> Message</label>
                                        <textarea rows="3" name="message" required class="form-control" placeholder="Type Your Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-raised btn-block btn-danger" name="send">Send Message &rarr;</button>
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
    <script>
</script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/editprofile.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/index1.js"></script>


</body>

</html>