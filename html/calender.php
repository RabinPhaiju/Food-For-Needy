<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="../css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/calender.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>User Login</title>
</head>

<body>
    <div class="navbar">
        <div class="nav0">
            <a href="../index.html"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
        </div>
        <div class="navbar1">
            <div class="nav3"><i class="fa fa-user fa-2x" aria-hidden="true"></i>
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
                                <a href="addfood.php">Add Food</a>
                                <a href="post.php">Your List</a>
                            </div>
                        </li>

                        <li class="item">
                            <a class="btn" href="../index.html"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Profile</span></a>
                    <ul>
                        <li><a href="changepassword.php"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Change Password</span></a></li>
                        <li class=""><a href="editprofile.php"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Edit Profile</span></a></li>
                    </ul>
                </li>
                <li class="dropdown active">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Food List</span></a>
                    <ul>
                        <li><a href="addfood.php"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Add to List</span></a></li>
                        <li class="active_child"><a href="post.php"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Your List</span></a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Messages</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>New</span></a></li>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Inbox</span></a></li>
                        <li class=""><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Sent</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Product</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Add</span></a></li>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>List</span></a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="icon"><i class="fa fa-compass"></i></span><span>Records</span></a></li>
                <li><a href="#"><span class="icon"><i class="fa fa-calendar"></i></span><span>Calender</span></a></li>

            </ul>
        </div>

        <div id="current-day-info" class="color">


            <div class="dates">
                <h4 id="current-year" class="center default-cursor">2019 - </h4>
                <h4 id="cur-day" class="current-day-heading center default-cursor">
                    Monday-
                </h4>
                <h4 id="cur-month" class="current-month-heading center default-cursor">
                    June-
                </h4>
                <h3 id="cur-date" class="current-date-heading center default-cursor">
                    7-
                </h3>
            </div>

            <div class="time">
                <span> 22 </span>: <span> 55 </span>:
                <span> 23 </span>
            </div>

            <button id="theme-landscape" class="font btn">Change Theme</button>
        </div>

        <div id="calender">
            <h1 id="app-name-portrait" class="center ">JSCalender</h1>
            <!-- h1 'off-color' class was removed -->
            <table>
                <thead class="color">
                    <tr>
                        <th colspan="7" class="border-color">
                            <h4 id="cal-year" contenteditable="true">2018</h4>
                            <div>
                                <i class="fas fa-caret-left icon"> </i>
                                <h3 id="cal-month">july</h3>
                                <i class="fas fa-caret-right icon"> </i>
                            </div>
                        </th>
                    </tr>

                    <tr>
                        <th class="weekday border-color">Sun</th>
                        <th class="weekday border-color">Mon</th>
                        <th class="weekday border-color">Tue</th>
                        <th class="weekday border-color">Wed</th>
                        <th class="weekday border-color">Thu</th>
                        <th class="weekday border-color">Fri</th>
                        <th class="weekday border-color">Sat</th>
                    </tr>
                </thead>

                <tbody id="table-body">
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td class="tooltip-container">
                            <span class="day">1</span>
                            <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                            <span class="tooltip"> this is pretty tooltip</span>
                        </td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
            <button id="theme-portrait" class="font btn">Change Theme</button>
        </div>

        <div class="modal">
            <div id="fav-color" hidden>
                <div class="popup">
                    <h4>whats your favorite color ?</h4>

                    <div id="color-options">
                        <div class="color-option">
                            <div class="color-preview" id="blue" style="background-color: #1B19CD;">
                                <!-- <i class="fas fa-check checkmark"></i> -->
                            </div>
                            <h5>Blue</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="red" style="background-color: #D01212;"></div>
                            <h5>Red</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="purple" style="background-color: #721D89;"></div>
                            <h5>Purple</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="green" style="background-color: #158348;"></div>
                            <h5>Green</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="orange" style="background-color: #EE742D;"></div>
                            <h5>Orange</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="deep-orange" style="background-color: #F13C26;"></div>
                            <h5>Deep Orange</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="baby-blue" style="background-color: #31B2FC;"></div>
                            <h5>Baby Blue</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="cerise" style="background-color: #EA3D69;"></div>
                            <h5>Cerise</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="lime" style="background-color: #36C945;"></div>
                            <h5>Lime</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="teal" style="background-color: #2FCCB9;"></div>
                            <h5>Teal</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="pink" style="background-color: #F50D7A;"></div>
                            <h5>Pink</h5>
                        </div>

                        <div class="color-option">
                            <div class="color-preview" id="black" style="background-color: #212524;"></div>
                            <h5>Black</h5>
                        </div>
                    </div>

                    <button id="update-theme-button" class="font btn color">
                        Update Theme
                    </button>
                </div>
            </div>

            <div id="make-note" hidden>
                <div class="popup">
                    <h4> <span class="verb"></span> note on <span id="noteDate">2019 12 5</span></h4>
                    <input class="note-title" type="text" name="title" placeholder="note title ..." />
                    <textarea class="note-content" id="edit-post-it" name="post-it" placeholder="note description ..."></textarea>
                    <span style="color:red;" id="warning"></span>
                    <div>
                        <button class="btns font post-it-button" id="add-post-it">
                            Save
                        </button>
                        <button class="btns font post-it-button" id="delete-button">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="js/index1.js"></script>
    <script src="js/calender.js"></script>
</body>

</html>