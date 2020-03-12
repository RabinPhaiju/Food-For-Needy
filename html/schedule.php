<?php
include 'session.php';
$error=null;
if (isset($_POST['submit'])) {
    $a = $_SESSION['username'];
    $b = $_POST['day'];
    $c = $_POST['location'];
    $d = $_POST['start_time'];
    $e = $_POST['end_time'];
    $f = $_POST['date'];
    $g = $_POST['tittle'];
    $h = $_POST['description'];
    require_once("DBConnect.php");
      $sql="INSERT INTO `schedule` (`updated_by`,`day`,`start_time`,`end_time`,`date`,`title`,`description`,`location`) VALUES ('$a','$b','$d','$e','$f','$g','$h','$c')";
      if(mysqli_query($conn, $sql)){
                require_once("DBConnect.php");
                $des=$_SESSION['username']." schedule at ".$c." in ".$b." from ".$d." to ".$e." title: ".$g;
                $sql2="INSERT INTO `records` (`description`,`reg_id`) VALUES ('$des',0)";
                //   echo "first";
                if(mysqli_query($conn, $sql2)){
                //   echo "done";
                }
                else {
                echo "Error updating record: " . mysqli_error($conn);
                }
        // echo "<script>window.location='schedule.php';</script>";
      }
      else {
        echo "Error updating record: " . mysqli_error($conn);
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
    <link rel="stylesheet" href="css/schedule.css">
    <link rel="stylesheet" href="../css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/datetime.css">
    <link rel="stylesheet" href="css/toast.css">
    <style>
    .plus {
        margin-left:30px;
        color:#4286f4; 
    }
.tooltiptext {
  display:none;
  width: 100px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 3px 0;
  size:0.8rem;
  position: absolute;
  z-index: 1;
}

.plus:hover .tooltiptext {
  display:inline;
}
    </style>
    
    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>Schedule</title>
   </head>

<body onload=toast()>
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
                            <a class="btn" href="#"><i class="fas fa-calendar"></i>Schedule</a>
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
                <!-- <div class="images">
                    <img style="margin-top:22px" src="files/<?php if($_SESSION['pic']==null){echo 'user.png';}else{ echo $_SESSION['pic'];}?>" width="60";>
                    </div> -->
                    <div class="holders">
                <a href="schedule.php"> 
                            <div class="cells">
                            <time class="icons" id="four">
                                <strong></strong>
                                <h6></h6>
                                <h5></h5>
                            </time>
                            </div>
                            
                            </a>
                            </div>

                    <div class="myinfo">
                        <p class="name">Name :<?php echo $_SESSION['name']?></p>
                        <!-- <p class="phone">Email<?php echo $_SESSION['email']?></p> -->
                    </div>

                    <button class="setting">
                        <a href="editprofile.php">  <img src="files/<?php if($_SESSION['pic']==null){echo 'user.png';}else{ echo $_SESSION['pic'];}?>"></a>
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
                <li class="active"><a href="#"><span class="icon"><i class="fa fa-calendar"></i></span><span>Schedule</span></a></li>

            </ul>
        </div>

        <div class="container">
            <div class="col-md-9 col-sm-10 contains">
                <div class="panel profile-panel">
                <div class="container">
                    <h3 style="margin:20px 0 -20px 100px;">Schedule for 7 days 
                    <a class="plus class="btn btn-success data-toggle="modal" data-target="#popUpWindow" href="#"><i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                    <span class="tooltiptext">Add</span></a></h3>

                    <div id="snackbar">Click Plus to add new Schedule</div>      

                        <div class="modal fade" id="popUpWindow">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- header -->
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">Login Form</h3>
                                </div>
                                <!-- body -->
                                <div class="modal-header">
                                                <form role="form" action="schedule.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                             <label for="Day">Choose a day:</label>
                                                            <select class="form-control" name="day">
                                                                <option value="Sunday">Sunday</option>
                                                                <option value="Monday">Monday</option>
                                                                <option value="Tuesday">Tuesday</option>
                                                                <option value="Wednusday">Wednusday</option>
                                                                <option value="Thursday">Thursday</option>
                                                                <option value="Friday">Friday</option>
                                                                <option value="Saturday">Saturday</option>
                                                            </select> 
                                                            <label for="Location">Choose a Location:</label>
                                                            <select class="form-control" name="location">
                                                                <option value="Bhaktapur">Bhaktapur</option>
                                                                <option value="Kathmandu">Kathmandu</option>
                                                                <option value="Lalitpur">Lalitpur</option>
                                                            </select> 
                                                            <br>
                                                            <label for="Starting time">Starting time: (9 AM to 6 PM)</label>
                                                    <input type="time" class="form-control" name="start_time" required/>
                                                             <label for="Ending time">Ending time: (9 AM to 6 PM)</label>
                                                    <input type="time" class="form-control" name="end_time" required/>
                                                            <label for="date">Date: ( Next 7 days only.)</label>
                                                    <input type="date" class="form-control" name="date" required/>
                                                    <br>
                                                    <label for="Tittle">Tittle:</label>
                                                    <input type="text" class="form-control" placeholder="Enter tittle" name="tittle" required/>
                                                    <br>
                                                    <label for="description">Description:</label>
                                                    <textarea name="description" class="form-control" rows="4" cols="50">Enter Schedule description.</textarea>                                                   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" name="submit" value="Add" class="btn btn-primary btn-block"/>
                                                    </div>
                                                 </form>
                                </div>   
                            </div>
                            </div>
                        </div>
                        
                        </div> 
                  <!-- panel body -->
                   
    <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
        <div class="cd-schedule__timeline">
            <ul>
                <li><span>09:00</span></li>
                <li><span>09:30</span></li>
                <li><span>10:00</span></li>
                <li><span>10:30</span></li>
                <li><span>11:00</span></li>
                <li><span>11:30</span></li>
                <li><span>12:00</span></li>
                <li><span>12:30</span></li>
                <li><span>13:00</span></li>
                <li><span>13:30</span></li>
                <li><span>14:00</span></li>
                <li><span>14:30</span></li>
                <li><span>15:00</span></li>
                <li><span>15:30</span></li>
                <li><span>16:00</span></li>
                <li><span>16:30</span></li>
                <li><span>17:00</span></li>
                <li><span>17:30</span></li>
                <li><span>18:00</span></li>
            </ul>
        </div>
        <!-- .cd-schedule__timeline -->

        <div class="cd-schedule__events">
            <ul>
            <?php 
            $today_time=date("Y-m-d");
            $mydate=getdate(date("U"));
            $today_day=$mydate['weekday'];
            // $today_day="Friday";
            if($today_day=="Sunday"){
                $weeks = array("Sunday", "Monday", "Tuesday","Wednusday","Thursday","Friday","Saturday");
            }else if($today_day=="Monday"){
                $weeks = array("Monday", "Tuesday","Wednusday","Thursday","Friday","Saturday","Sunday");
            }else if($today_day=="Tuesday"){
                $weeks = array("Tuesday","Wednusday","Thursday","Friday","Saturday","Sunday","Monday");
            }else if($today_day=="Wednusday"){
                $weeks = array("Wednusday","Thursday","Friday","Saturday","Sunday","Monday","Tuesday");
            }else if($today_day=="Thursday"){
                $weeks = array("Thursday","Friday","Saturday","Sunday","Monday","Tuesday","Wednusday");
            }else if($today_day=="Friday"){
                $weeks = array("Friday","Saturday","Sunday","Monday","Tuesday","Wednusday","Thursday");
            }else{
                $weeks = array("Saturday","Sunday","Monday","Tuesday","Wednusday","Thursday","Friday");
            }
            $i=0;
            while($i!=7){
                ?>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span><?php echo $weeks[$i];?></span></div>
                    <ul>
                    <?php 
                $sql="SELECT * FROM `schedule` WHERE `date`>='$today_time' and `day`='$weeks[$i]' ";
                require_once("DBConnect.php");
	            $result = $conn-> query($sql);

	            if($result-> num_rows >0){
                    while($row = $result-> fetch_assoc()){ 
                         ?>
                        <li class="cd-schedule__event">
                            <a data-start="<?=$row["start_time"]?>" data-end="<?=$row["end_time"]?>" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name"><?=$row["title"]?></em>
                                <em class="cd-schedule__content"><?=$row["description"]?></em>
                            </a>
                        </li>
                    <?php
                 } }?>
            </ul>
            </li>
                             <?php $i++; } ?>
            </ul>
        </div>

        <div class="cd-schedule-modal">
            <header class="cd-schedule-modal__header">
                <div class="cd-schedule-modal__content">
                    <span class="cd-schedule-modal__date"></span>
                    <h3 class="cd-schedule-modal__name"></h3>
                </div>

                <div class="cd-schedule-modal__header-bg"></div>
            </header>

            <div class="cd-schedule-modal__body">
                <div class="cd-schedule-modal__event-info"></div>
                <div class="cd-schedule-modal__body-bg"></div>
            </div>

            <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
        </div>

        <div class="cd-schedule__cover-layer"></div>
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

    <script src="js/index1.js"></script>
    <script src="js/util.js"></script>
    <script src="js/main.js"></script>
    <script src="js/datetime.js"></script>
    <script src="js/toast.js"></script>


</body>

</html>