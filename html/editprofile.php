<?php
include 'session.php';
if (isset($_POST['profile_edit'])) {
$b = $_POST['firstname'];
$c = $_POST['lastname'];
$d = $_POST['user_type'];
$e = $_POST['location'];
$lan = $_POST['lan'];
$log = $_POST['log'];
$f = $_POST['contact'];
// $g = $_POST['email'];
$h = $_POST['dob'];

//file
$errors= array();
$file_name =$_FILES['img']['name'];
$file_size =$_FILES['img']['size'];
$file_tmp =$_FILES['img']['tmp_name'];
$file_type=$_FILES['img']['type'];
$bb=strrpos($file_name,".")+1;
$file_ext=substr($file_name,$bb);
$extensions= array("jpeg","jpg","png");

if(in_array($file_ext,$extensions)=== false){
   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   echo "<script>alert('extension not allowed, please choose a JPEG or PNG file.');</script>";
   echo "<script>window.location='editprofile.php';</script>";
   exit;
   
}
if($file_size > 2097152){
   $errors[]='File size must be less than or equal to 2 MB';
   echo "<script>alert('File size must be less than or equal to 2 MB');</script>";
   echo "<script>window.location='editprofile.php';</script>";
   exit;
}
//file end

$id=$_SESSION['reg_id'];
if(isset($_SESSION['usergoogle'])){
    $sql = " UPDATE `register` SET `user_type`='$d',`firstname`='$b',`lastname`='$c',`email`='$g',`location`='$e',`contact`='$f',`dob`='$h' WHERE `reg_id`='$id'";
       }
        else{

// $b=$_SESSION['username'];
$sql = " UPDATE `register` SET `user_type`='$d',`firstname`='$b',`lastname`='$c',`location`='$e',`lan`='$lan',`log`='$log',`contact`='$f',`dob`='$h' WHERE `reg_id`='$id'";
// echo $sql;exit;
}
$_SESSION['name']=" ".$b." ".$c;
$_SESSION['pic']=$_SESSION['username'];
// Create connection
require_once("DBConnect.php");

if (mysqli_query($conn, $sql)) {
// echo "Record updated successfully";
// echo "<script>alert('Update Changes Successfully!');</script>";
// echo "<script>window.location='index.php';</script>";
} else {
echo "Error updating record: " . mysqli_error($conn);
}
$user=$_SESSION['username'].".jpg";
// $sql="SELECT * FROM `register` WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
$sql = " UPDATE `register` SET `pic`='$user' WHERE `reg_id`='$id'";

// require_once("DBConnect.php");
// $resultpic = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($resultpic);

//     $bbb=$_POST['name'].$row["food_id"];//foodname + id

//     $bname=$bbb.".jpg";
    if(empty($errors)==true){
    //    move_uploaded_file($file_tmp,"files/".$bname);
    move_uploaded_file($file_tmp,"files/".$user);
 
    //    $sql= "UPDATE `food` SET `pic`='$bname' WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
       require_once("DBConnect.php");

      if (mysqli_query($conn, $sql)) {
          echo "<script>window.location='editprofile.php';</script>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      } 
    }
    mysqli_close($conn);
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="files/mainlogo.jpg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="css/datetime.css">

    <title>Edit Profile</title>
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
            margin-top:5px;
            display:none;
        }
        .input-fil {
            /* position: relative; */
            /* overflow: hidden; */
            width: 200px;
            height: 30px;
            border: none;
            background-color: #0077CC;
            border-radius: 3px;
            box-shadow: 1px 1px 2px rgba(0, 0, 0, .5);
            cursor: pointer;
            transition: background-color .3s ease;
            margin-bottom:10px;
            margin-top:5px;
            padding:6px 0 6px 2px;
            margin-right:10px;
        }
        
        .input-files:hover,.input-fil:hover {
            background-color: #1748d8;
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
        
        .input-files label,.input-fil label {
            font-family: 'arial';
            color: #F1F1F1;
            font-weight: bold;
            font-size: 17px;
            cursor: pointer;
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
        .icons h6 {
top: 35%;
}
.icons h5 {
    bottom: -10px;
}
.icons strong {
    padding: 0.1em 0;
}
    </style>
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
                                        $id=$_SESSION['reg_id'];
                                    $sql = "SELECT * from `register` WHERE `reg_id`='$id'";// where `verified`='1' AND `status`='1'";
                                    require_once("DBConnect.php");
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        ?>
                            <form action="editprofile.php" method="POST" enctype="multipart/form-data">
                                    <h2>Picture</h2>
                                    <!-- <p><img id="outputs" width="150" /></p> -->
                                    <img id="outputs" src="files/<?php if($row["pic"]==null){echo 'user.png';}else{ echo $row["pic"];}?>" width="200" style="border-radius:10%">

                                    <div class="profile-details">
                                    
                                    <button class="input-files" id="uploadpic">
                                        <input type="file" name="img" onchange="loadFile(event)" value="files/<?php if($row["pic"]!=null){ echo $row["pic"];}?>" accept="image/jpg, image/jpeg, image/png" id="file-inputs file" required="required">
                                        <label for="file-inputs">UPLOAD</label>
                                      </button>
                                </div>
                                    <!-- upload pic -->
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-block">
                                    <header class="profile-header">
                                        <h2><i class="fa fa-user"></i> Information</h2>
                                        <ul class="actions">
                                        
                                            <li class="dropdown">

                                            <a class="input-fil" id="input-fil" href="changepassword.php"> <label for="file-inputs">Change Password</label> </a>
                                                <a href="#" data-toggle="dropdown">
                                                <i class="fa fa-pencil-square-o">Update Info</i>
                                                </a>

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
                                                <dd><?php echo $row["username"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>User Type</dt>
                                                <dd><?php echo $row["user_type"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Full Name</dt>
                                                <dd><?php echo $row["firstname"]." ".$row["lastname"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Email</dt>
                                                <dd><?php echo $row["email"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Address</dt>
                                                <dd><?php echo $row["location"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Location</dt>
                                                <dd><?php echo $row["lan"]." , ".$row["log"];?></dd>
                                            </dl>
                                            <hr class="blackLine">

                                            <dl class="dl-horizontal">
                                                <dt>Contact</dt>
                                                <dd><?php echo $row["contact"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>DoB</dt>
                                                <dd><?php echo $row["dob"];?></dd>
                                            </dl>
                                        </div>
                                    
                                        <div class="profile-edit">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">First Name</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="firstname" required="required" value="<?php echo $row["firstname"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Last Name</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="lastname" required="required" value="<?php echo $row["lastname"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">User Type</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <select class="form-control" name="user_type" required="required">
                                                                          <option value="Donator">Donator</option>
                                                                          <option value="Receiver">Receiver</option>
                                                                          <option value="Sponser">Sponser</option>
                                                                          <option value="Volunteer">Volunteer</option>
                                                                      </select>
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Address</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <select class="form-control" name="location" required="required">
                                                                          <option value="Bhaktapur">Bhaktapur</option>
                                                                          <option value="Kathmandu">kathmandu</option>
                                                                          <option value="Lalitpur">Lalitpur</option>
                                                                      </select>
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Location</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="number" step=0.0001 name="lan" class="form-control" value="<?php echo $row["lan"];?>" required placeholder="latitude">
                                                        <input type="number" step=0.0001 name="log" class="form-control" value="<?php echo $row["log"];?>" required placeholder="longitude">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Contact</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="contact" required="required" value="<?php echo $row["contact"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Email</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="email" class="form-control" value="<?php echo $row["email"];?>" name="email" required="required" readonly>
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">DoB</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="date" class="form-control" value="<?php echo $row["dob"];?>" name="dob" required="required">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <div class="m-t-30">
                                                <button class="btn btn-primary btn-sm waves-effect btnss" name="profile_edit">Save</button>
                                                <button href="#" data-profile-action="reset" class="btn-link btn-cancel">Cancel</button>
                                            </div>
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
    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/index1.js"></script>
    <script src="js/editprofile.js"></script>
    <script src="js/datetime.js"></script>

    
    <script>
  
    function showbuttom(){
    document.getElementById("uploadpic").style.display = "block";
    document.getElementById("input-fil").style.display="none";
    }
   
    var loadFile = function(event) {
	var image = document.getElementById('outputs');
	image.src = URL.createObjectURL(event.target.files[0]);
};

    </script>

</body>

</html>