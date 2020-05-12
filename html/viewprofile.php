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
    <link rel="stylesheet" href="css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title><?php echo $view_user;?></title>
   
</head>

<body>
<?php include 'navbar1.html';?>
    <div class="body_wrapper">
    <?php include 'navbar2.html';?>

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