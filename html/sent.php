<?php
include 'session.php';
$pos=null;
$pos_count=1;
if(@$_GET['pos']){
$pos=@$_GET['pos'];
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
        margin-left:5px;
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
                        <li><a href="new.php"><span class="icon"></span><span>New</span></a></li>
                        <li><a href="inbox.php"><span class="icon"></span><span>Inbox</span></a></li>
                        <li class=""><a href="#"><span class="icon"></span><span>Sent</span></a></li>
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
            <div class="col-md-6 col-sm-9 contains">
            <h3 style="margin-left:20px;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Sent Messages.</h3>
                <div class="panel profile-panel">
                    <!-- <div class="panel-heading">
                        <div class="text-left">
                            <h2>Joe Doe</h2>
                        </div>
                    </div> -->
                    <!-- panel body -->
                    
                    <h2>
                    <?php
                    $from=$_SESSION['username'];
                          $sql = "SELECT * from `messages` where `msg_from`='$from'";// where `verified`='1' AND `status`='1'";
                            require_once("DBConnect.php");
                            $resulttotal = $conn-> query($sql);
                            $total = mysqli_num_rows($resulttotal);?>
                            

              <?php if($pos==null){$pos=0;}?>
              <?php if($pos>0){?>
              
              <a style="float:left;" href="sent.php?pos=<?php echo $pos-10;?>"><i class="fa fa-chevron-left"></i></a>
              <?php }else { ?>
              <a style="float:left;"><i class="fa fa-chevron-left"></i></a>
              <?php }
              if($pos<$total && $total-$pos>10){ ?>
              <a style="float:left;" href="sent.php?pos=<?php echo $pos+10;?>"><i class="fa fa-chevron-right"></i></a>
              <?php } else { ?>
                <a style="float:left;"><i class="fa fa-chevron-right"></i></a>
              <?php } ?>
              <p style="margin:8px 0 0 5px;"><?php echo ($pos+1)." - ".($pos+10);?> out of <?php echo $total?></p>
              </h2>
     <table>
    <?php
    $count=1;
    require_once("DBConnect.php");
	if($conn-> connect_error){
		die("Connection failed:". $conn-> connect_error);
    }
    $session_reg_id=$_SESSION['reg_id'];
    $from=$_SESSION['username'];
        $sql = "SELECT * from `messages` WHERE `msg_from`='$from' ORDER BY `message_id` DESC";
	$result = $conn-> query($sql);
    // echo $result-> num_rows;
	if($result-> num_rows >0){
        if($pos!=null){
            while($row = $result-> fetch_assoc() && $pos_count<$pos){
                $pos_count++;
            }
        }
       
            $del_count=0;
            while($del_count<10 && $row = $result-> fetch_assoc()){
                echo "<tr><td>".$count.") Subject : ".$row["subject"].". Message : ".$row["message"].". To ".$row["msg_to"]." "."</td>";
                ?>
                <td>
                <a onclick="return confirm('Are you sure you want to delete this message?')" href="delete_message.php?msgid_sent=<?= $row['message_id'];?>"><i style="color: red;" class="fa fa-trash" aria-hidden="true"></i></a>
            </td></tr>
               <?php
            $count++;
               
               $del_count++;
            }}else{
                echo "<tr><td>No Messages</td></tr>";
            }
        
		
        echo "</table>";
    
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