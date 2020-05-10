<?php
include 'session.php';
$printerror="";
$print="";
$same="";
if (isset($_POST['change_password'])) {
$real=$_POST['realpsw'];
$old = md5($_POST['repsw']);
$new = md5($_POST['psw']);

if($real==$old){
    if($old!=$new){
if(isset($_SESSION['usergoogle'])){
    $a=$_SESSION['reg_id'];
    $sql = "UPDATE SET `password`='$new' where `reg_id`='$a'";
       }
        else{

// $b=$_SESSION['username'];
$a=$_SESSION['reg_id'];
$sql = "UPDATE`register` SET `password`='$new' where `reg_id`='$a'";
// echo $sql;exit;
}
// Create connection
require_once("DBConnect.php");

if (mysqli_query($conn, $sql)) {
// echo "Record updated successfully";
$print="Password changed successfully";
// echo "<script>alert('Update Changes Successfully!');</script>";
// echo "<script>window.location='index.php';</script>";
} else {
echo "Error updating record: " . mysqli_error($conn);
}   
}else{$printerror="You Entered Same Password";}
} else{
    $printerror="Password dont match! Enter Again";
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
            #message , #messageVerify {
    display: none;
    background: rgb(3,3,3,0.1);
    border-radius:10px;
    color: #000;
    position: absolute;
    margin-bottom: -3px;
    margin-top: 2px;
    padding-left: 50px;
    padding-right:10px;
}
#message p {
    padding: 0px 5px;
    font-size: 12px;
    text-align: left;
    width: 80px;
}
/* Add a green text color and a checkmark when the requirements are right */
.valid {
    color: green;
}
.invalid1:hover {
    color: red;
    cursor: not-allowed;
    opacity: 0.4;
    transform: scale(0.9);
}
.valid:before {
    position: relative;
    left: -35px;
    content: "✔";
}
/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
    color: red;
}

.invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
}
.btnss{
            transition: all .4s;
            position: relative;
        }
        .btnss:hover{
            transform: translateY(-3px);
            box-shadow: 0 10p 20px rgba(0,0,0,0.6);
        }
        .btnss:active{
            transform: translateY(-1px);
            box-shadow: 0 10p 20px rgba(0,0,0,0.6);
        }
        </style>
    </head>

    <body>
        <div class="navbars">
            <div class="nav0">
                <a href="../index.html"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
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
                                    <a href="#">Change Password</a>
                                    <a href="editprofile.php">Edit Profile</a>
                                </div>
                            </li>
                            <li class="item">
                            <a class="btn" href="chat.php"><i class="fas fa-commenting"></i>Conversation</a>
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
                            <img style="margin-top:22px" src="files/<?php if($_SESSION['pic']==null){echo 'user.png';}else{ echo $_SESSION['pic'];}?>" width="60" ;>
                        </div>

                        <div class="myinfo">
                            <p class="name">Name :
                                <?php echo $_SESSION['name']?>
                            </p>
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
                    <li class="dropdown active">
                        <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Profile</span></a>
                        <ul>
                            <li><a href="#"><span class="icon"></span><span>Change Password</span></a></li>
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
<?php
            $id=$_SESSION['reg_id'];
   $sql = "SELECT * from `register` WHERE `reg_id`='$id'";// where `verified`='1' AND `status`='1'";
   require_once("DBConnect.php");
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);  ?>

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

                                    <div class="profile-details">
                                        <h2>Picture</h2>
                                        <p><img style="margin-top:22px" src="files/<?php if($_SESSION['pic']==null){echo 'user.png';}else{ echo $_SESSION['pic'];}?>" width="180";>
                                        </p>
                                    </div>

                                </div>
                                <form action="changepassword.php" method="POST">
                                    <div class="col-md-8">
                                        <div class="profile-block">
                                            <header class="profile-header">
                                                <h2><i class="fas fa-lock"></i> Change Your Password</h2>

                                            </header>
                                            <div class="profile-body">
                                                <div class="profile-view">
                                                   <p style="color:red"><?php if($printerror==null){echo "";}else{echo $printerror;}?></p>
                                                   <p style="color:green"><?php if($print==null){echo "";}else{echo $print;}?></p>
                                                   <p style="color:yellow"><?php if($same==null){echo "";}else{echo $same;}?></p>
                                                    <dl class="dl-horizontal">
                                                        <dt class="p-10">Old Password</dt>
                                                        <dd>
                                                            <div class="fg-line">
                                                                <input type="password" id="old" value="<?php echo $row["password"];?>" hidden name="realpsw">
                                                                <input type="password" id="repsw" class="form-control" required="required" name="repsw" placeholder="Enter old Password">
                                                            </div>
                                                            <div id="messageVerify">
                                                            <p id="match" class="invalid">Matched</p>
                                                        </div>
                                                                      
                                                        </dd>
                                                    </dl>
                                                    <!-- <br/> -->
                                                    <hr class="blackLines">
                                                    <dl class="dl-horizontal">
                                                        <dt class="p-10">New Password</dt>
                                                        <dd>
                                                            <div class="fg-line">
                                                                <input type="password" id="psw" placeholder="Enter New Password" class="form-control" required="required" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                                            </div>
                                                            <div id="message">
                                                                            <p id="letter" class="invalid">lowercase</p>
                                                                            <p id="capital" class="invalid">uppercase</p>
                                                                            <p id="number" class="invalid">number</p>
                                                                            <p id="length" class="invalid">8 letter</p>
                                                                        </div>
                                                        </dd>
                                                    </dl>

                                                    <div class="m-t-30">
                                                        <button id="signbtn" class="btn btn-primary btn-sm waves-effect btnss" name="change_password">Save</button>

                                                    </div>
                                                    <br>
                                                    <a href="editprofile.php">Cancel</a>
                                                </div>

                                            </div>
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
           
// var button = document.getElementById("signupButton");
var button = document.getElementById("signbtn");
var myInput = document.getElementById("psw");
var myInputVerify = document.getElementById("repsw");
var myInputOld = document.getElementById("old");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}
myInputVerify.onfocus = function() {
    document.getElementById("messageVerify").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}
myInputVerify.onblur = function() {
    document.getElementById("messageVerify").style.display = "none";
}

// When the user starts to type something inside the password field

myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
        button.classList.remove("invalid1");
        button.classList.add("valid1");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
        button.classList.remove("valid1");
        button.classList.add("invalid1");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
        button.classList.remove("invalid1");
        button.classList.add("valid1");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
        button.classList.remove("valid1");
        button.classList.add("invalid1");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
        button.classList.remove("invalid1");
        button.classList.add("valid1");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
        button.classList.remove("valid1");
        button.classList.add("invalid1");
    }

    // Validate length
    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
        button.classList.remove("invalid1");
        button.classList.add("valid1");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
        button.classList.remove("valid1");
        button.classList.add("invalid1");
    }
}
myInputVerify.onkeyup = function() {

var data = calcMD5(myInputVerify.value);
// var data=myInputVerify.value;
// document.write(data);
    if (myInputOld.value == data && myInputVerify.value != "") {
        match.classList.remove("invalid");
        match.classList.add("valid");
        button.classList.remove("invalid1");
        button.classList.add("valid1");
    } else {
        match.classList.remove("valid");
        match.classList.add("invalid");
        button.classList.remove("valid1");
        button.classList.add("invalid1");
    }
}


        </script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/editprofile.js"></script>

        <script src="js/index1.js"></script>
        <script src="js/jsmd5.js"></script>


        </body>

    </html>