<?php
include 'session.php';
$search=0;
$pos=0;
$pos10=10;
if (isset($_POST['searchsubmit'])) {
    $search_name = $_POST['search'];
    $search=1;
    }
$all=0;
$pos=@$_GET['pos'];
if($pos==9999){
    $pos=0;
    $all=1;
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Donor</title>
    <style>
               body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
               }
    .contains {
        margin-left:5%;
    }
.media {
  box-shadow: 0px 0px 4px -2px #000;
  margin: 10px 0;
  padding: 10px;
  background-color: rgba(20, 20, 20, 0.3);
}
.media-body {
  padding: 5px;
}
.media-body a {
  text-decoration: none;
}
.media .label {
  padding: 5px 10px;
}
.dp {
  border: 10px solid #eee;
  transition: all 0.2s ease-in-out;
}
.dp:hover {
  border: 2px solid #eee;
  transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  -webkit-transform: rotate(360deg);
  -webkit-font-smoothing: antialiased;
}
.search,
.navi {
    width: 100%;
    position: relative;
    display: flex;
   
}

.searchTerm {
    width: 60%;
    border: 3px solid rgb(134, 135, 135);
    border-right: none;
    padding: 15px;
    height: 20px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
}

.searchTerm:focus {
    color: rgba(100, 96, 103, 0.521);
}

.searchButton {
    width: 80px;
    height: 36px;
    border: 1px solid rgb(134, 135, 135);
    background: rgb(134, 135, 135);
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
}
.naviright {
    margin-left: 5px;
    padding-top: 5px;
    width: 40px;
    height: 36px;
    border: 1px solid rgb(134, 135, 135);
    background: rgb(134, 135, 135);
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
}

.navileft {
    padding-top: 5px;
    width: 40px;
    height: 36px;
    margin-left: 100px;
    border: 1px solid rgb(134, 135, 135);
    background: rgb(134, 135, 135);
    text-align: center;
    color: #fff;
    border-radius: 5px 0 0 5px;
    cursor: pointer;
    font-size: 20px;
}

.globe {
    padding-top: 5px;
    padding-left: 10px;
    padding-right: 10px;
    width: 40px;
    height: 36px;
    margin-left: 100px;
    border: 1px solid rgb(134, 135, 135);
    background: rgb(134, 135, 135);
    text-align: center;
    color: #fff;
    border-radius: 5px 5px 5px 5px;
    cursor: pointer;
    font-size: 20px;
}
    </style>
</head>

<body>
    <div class="navbars">
    <div class="nav0">
            <a href="../index.html"><img src="files/mainlogo.jpg" style="border-radius: 20%;" width="40px" alt="Food for Needy">&nbsp;</a>
        </div>
        <div class="navbars1">
            <div class="nav3">&nbsp;&nbsp;&nbsp;<i class="fa fa-user-cog fa-3x"></i>
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
                                <a href="#">Add Food</a>
                                <a href="post.php">Your List</a>
                            </div>
                        </li>
                        <li class="item">
                            <a class="btn" href="#"><i class="fas fa-compass"></i>Records</a>
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
                    <img style="margin-top:22px;border-radius: 10%;" src="files/<?php if($_SESSION['pic']==null){echo 'user.png';}else{ echo $_SESSION['pic'];}?>" width="60";>
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
                        <li><a href="#"><span class="icon"><i class="fa fa-user"></i></span><span>Donor</span></a></li>
                        <li><a href="receiver.php"><span class="icon"><i class="fa fa-user"></i></span><span>Receiver</span></a></li>
                    </ul>
                    </li>
                <li><a href="records.php"><span class="icon"><i class="fa fa-compass"></i></span><span>Records</span></a></li>
                <li><a href="schedule.php"><span class="icon"><i class="fa fa-calendar"></i></span><span>Schedule</span></a></li>

            </ul>
        </div>

        <div class="container">
            <div class="col-md-8 col-sm-9 contains">
                <div class="panel profile-panel">
   
        
        <caption><b style="font-size:25px;">Food For Needy - Donors</b></caption>
        <br>
        <form action="donor.php" method="POST">
       
            <div class="search">
            <!-- <Strong style="font-size: 23px"> Donors </Strong> -->
                <input type="text" style="color:black" class="searchTerm" placeholder="Search" name="search" required="required">
                <button type="submit" name="searchsubmit" class="searchButton">
                 <i class="fa fa-search"></i>
                 </button>
                 <a class="globe" href="donor.php?pos=9999"><i class="fa fa-globe"></i></a>
              
              <!-- <div class="navi"> -->
                  <?php
                          $sql = "SELECT * from `register` WHERE  `user_type`='Donor'";// where `verified`='1' AND `status`='1'";
                          
                            require_once("DBConnect.php");
                            $resulttotal = $conn-> query($sql);
                            $total = mysqli_num_rows($resulttotal);
                            
                            if($pos==null){$pos=0;
                                $pos10=$pos+10;}else{
                                    $pos10=10;
                                }
                                if($all==1){$pos=0; $pos10=$total;}
                            
                            ?>

                            

              <?php if($pos==null){$pos=0;}?>
              <?php if($pos>0){?>
              <a class="navileft" href="donor.php?pos=<?php echo $pos-10;?>"><i class="fa fa-chevron-left"></i></a>
              <?php }else { ?>
              <a class="navileft"><i class="fa fa-chevron-left"></i></a>
              <?php } if(($pos+10)<$total){ ?>
              <a class="naviright" href="donor.php?pos=<?php echo $pos+10;?>"><i class="fa fa-chevron-right"></i></a>
              <?php } else { ?>
                <a class="naviright"><i class="fa fa-chevron-right"></i></a>
              <?php } ?>
              <p style="margin:8px 0 0 5px"><?php echo ($pos+1)." - ".($pos+10);?> of <?php echo $total?></p>
                                        <!-- </div> -->
            </div>
    </form>
        <br>
    <?php
     require_once("DBConnect.php");
     if($conn-> connect_error){
         die("Connection failed:". $conn-> connect_error);
     }
         if($search==1){
             $sql = "SELECT * from register WHERE `user_type`='Donor' AND `firstname`='$search_name' ";
         }else{
         $sql = "SELECT * from register WHERE `user_type`='Donor' AND 1 Limit $pos, $pos10";
         }
     $result = $conn-> query($sql);
     // echo $result-> num_rows;
     if($result-> num_rows >0){
        
        while($row = $result-> fetch_assoc()){
            if($row['reg_id']==$_SESSION['reg_id']){
                    continue;
            }
            ?>
    
    <div class="row">

<div class="col-md-12">
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object dp img-circle" src="<?php if($row['pic']==null){?>files/user.png<?php }else{?> files/<?php echo $row['pic'];}?>" style="width: 80px;height:80px;">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Name :<strong> <?=$row['firstname']." ".$row['lastname']?></strong></h4>
            <h5>Email: <?=$row['email']?></h5>
            <h6>Location: <?=$row['location']?></h6>
            <h6>Contact: <?=$row['contact']?></h6>
            <hr class="blackLine">
            <!-- <br> -->
            <a href="viewprofile.php?view=<?=$row['username']?>"><span class="label label-warning">View Profile</span></a>
            <a><span class="label label-default">Last Seen: Today</span></a>
            <a href="chat.php?session_name=<?=$row['username']?>"><span class="label label-success">Send Message</span></a>
            <!-- <a href="#"><span class="label label-warning">Remove</span></a> -->
        </div>
    </div>
</div>
</div>

         <?php  }}?>
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