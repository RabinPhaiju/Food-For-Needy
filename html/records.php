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
    <link rel="stylesheet" href="../css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/index.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Records</title>
    <style>
               body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
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
  border: 1px solid #ccc;
  border-collapse: collapse;
  table-layout: fixed;
  /* width: 100%; */
}
.panel table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}
.panel table tr {
  border: 1px solid #ddd;
  padding: .35em;
}
.panel table tr:nth-child(even) {
  background: #f8f8f8;  
}
.panel table th,
.panel table td {
  padding: .625em;
  text-align: left;
}
.panel table th {
  background: #999;
  color: #fff;
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}
.panel table td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
		@media only screen and (max-width: 1300px) {
            .panel td,.panel th{
					font-size: 14px;
				}
				.panel img{
		    height:30px;
        }
    }
    .contains {
        margin-left:5%;
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
                <li class="dropdown">
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
            <div class="col-md-8 col-sm-9 contains">
                <div class="panel profile-panel">
                    <!-- <div class="panel-heading">
                        <div class="text-left">
                            <h2>Joe Doe</h2>
                        </div>
                    </div> -->
                    <!-- panel body -->
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
        if($result-> num_rows>20){
            $del1=$result-> num_rows-20;
            // $del=$result-> num_rows-$del1;
            $del_count=0;
            while($del_count<$del1){
                $row = $result-> fetch_assoc();
                $record_ids=$row["record_id"];
               $sql0= "DELETE FROM `records` WHERE `record_id`='$record_ids'";
               require_once("DBConnect.php");
               mysqli_query($conn, $sql0);
               $del_count++;
            }}
            $sql = "SELECT * from records ORDER BY `date` DESC ";
            $result = $conn-> query($sql);
        ?>
        <table>
        <caption><b style="font-size:25px">Recent Records (20)</b></caption>
        <thead>
            <th scope="col"><strong>Sn.</strong></th>
            <th scope="col"><strong>Detail</strong></th>
        </thead>
        <tbody>
    <?php
        
        while($row = $result-> fetch_assoc()){?>
    <tr>
    <td scope="row"><?=$count?></td>
    <td><?=$row["description"]?></td>
    </tr>

         <?php   $count++;
				}}
		
        echo "</tbody></table>";
    
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