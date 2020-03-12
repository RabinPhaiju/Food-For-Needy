<?php
include 'session.php';
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
    
    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>Schedule</title>
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
                <li><a href="calender.php"><span class="icon"><i class="fa fa-calendar"></i></span><span>Calender</span></a></li>

            </ul>
        </div>

        <div class="container">
            <div class="col-md-9 col-sm-9 contains">
                <div class="panel profile-panel">
                    <!-- <div class="panel-heading">
                        <div class="text-left">
                            <h2>Joe Doe</h2>
                        </div>
                    </div> -->
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
            <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Sunday</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                            <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">Circuit</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="11:00" data-end="11:30" data-content="event-rowing-workout" data-event="event-2" href="#0">
                                <em class="cd-schedule__name">Workout</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="14:00" data-end="14:15" data-content="event-yoga-1" data-event="event-3" href="#0">
                                <em class="cd-schedule__name">Yoga</em>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Monday</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                            <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">Abs Circuit</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2" href="#0">
                                <em class="cd-schedule__name">Rowing Workout</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="14:00" data-end="15:15" data-content="event-yoga-1" data-event="event-3" href="#0">
                                <em class="cd-schedule__name">Yoga Level 1</em>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Tuesday</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                            <a data-start="10:00" data-end="11:00" data-content="event-rowing-workout" data-event="event-2" href="#0">
                                <em class="cd-schedule__name">Rowing Workout</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="11:30" data-end="13:00" data-content="event-restorative-yoga" data-event="event-4" href="#0">
                                <em class="cd-schedule__name">Restorative Yoga</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="13:30" data-end="15:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">Abs Circuit</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="15:45" data-end="16:45" data-content="event-yoga-1" data-event="event-3" href="#0">
                                <em class="cd-schedule__name">Yoga Level 1</em>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Wednesday</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                            <a data-start="09:00" data-end="10:15" data-content="event-restorative-yoga" data-event="event-4" href="#0">
                                <em class="cd-schedule__name">Restorative Yoga</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="10:45" data-end="11:45" data-content="event-yoga-1" data-event="event-3" href="#0">
                                <em class="cd-schedule__name">Yoga Level 1</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="12:00" data-end="13:45" data-content="event-rowing-workout" data-event="event-2" href="#0">
                                <em class="cd-schedule__name">Rowing Workout</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="13:45" data-end="15:00" data-content="event-yoga-1" data-event="event-3" href="#0">
                                <em class="cd-schedule__name">Yoga Level 1</em>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Thursday</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                            <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">Abs Circuit</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="12:00" data-end="13:45" data-content="event-restorative-yoga" data-event="event-4" href="#0">
                                <em class="cd-schedule__name">Restorative Yoga</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="15:30" data-end="16:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">Abs Circuit</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="17:00" data-end="18:30" data-content="event-rowing-workout" data-event="event-2" href="#0">
                                <em class="cd-schedule__name">Rowing Workout</em>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Friday</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                            <a data-start="10:00" data-end="11:00" data-content="event-rowing-workout" data-event="event-2" href="#0">
                                <em class="cd-schedule__name">Rowing Workout</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">Abs Circuit</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="15:45" data-end="16:45" data-content="event-yoga-1" data-event="event-3" href="#0">
                                <em class="cd-schedule__name">Yoga Level 1</em>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>saturday</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                            <a data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">hello</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2" href="#0">
                                <em class="cd-schedule__name">Rowing done</em>
                            </a>
                        </li>

                        <li class="cd-schedule__event">
                            <a data-start="14:00" data-end="15:15" data-content="event-yoga-1" data-event="event-3" href="#0">
                                <em class="cd-schedule__name">Yoga Level 100</em>
                            </a>
                        </li>
                    </ul>
                </li>
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


</body>

</html>