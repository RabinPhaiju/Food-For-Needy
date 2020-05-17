<?php include 'session.php';?>
<?php
$userid = @$_GET['id'];
if (isset($_POST['edit_user'])) {
    // exit;
    $a = $_POST['reg_id'];
    $aa=$_POST['username'];
    $b = $_POST['firstname'];
    $c = $_POST['lastname'];
    $d = $_POST['user_type'];
    $e = $_POST['location'];
    $f = $_POST['contact'];
    $g = $_POST['email'];
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
       echo "<script>window.location='edituser.php';</script>";
       exit;
       
    }
    if($file_size > 2097152){
       $errors[]='File size must be less than or equal to 2 MB';
       echo "<script>alert('File size must be less than or equal to 2 MB');</script>";
       echo "<script>window.location='edituser.php';</script>";
       exit;
    }
    //file end
    
    // $b=$_SESSION['username'];
    $sql = " UPDATE `register` SET `user_type`='$d',`firstname`='$b',`lastname`='$c',`email`='$g',`location`='$e',`contact`='$f',`dob`='$h' WHERE `reg_id`='$a'";
    
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
    $sql = " UPDATE `register` SET `pic`='$user' WHERE `reg_id`='$a'";
    
    // require_once("DBConnect.php");
    // $resultpic = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($resultpic);
    
    //     $bbb=$_POST['name'].$row["food_id"];//foodname + id
    
    //     $bname=$bbb.".jpg";
        if(empty($errors)==true){
        //    move_uploaded_file($file_tmp,"files/".$bname);
        move_uploaded_file($file_tmp,"../../../files/".$user);
     
        //    $sql= "UPDATE `food` SET `pic`='$bname' WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
           require_once("DBConnect.php");
    
          if (mysqli_query($conn, $sql)) {
              echo "<script>window.location='user.php';</script>";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } 
        }
        mysqli_close($conn);
    }

if (!isset($userid)) {
	echo "<script>window.location='user.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FFN Admin</title>
  <link rel="stylesheet" href="../css/material.css">

<link rel="stylesheet" href="../css/menu.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="../images/favicon.jpg" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
        <a class="" href="index.php"><img src="../images/favicon.jpg" width="35px" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            
              <img src="../images/<?php if($_SESSION['pic']==null){echo 'user.png';}else{ echo $_SESSION['pic'];}?>";>
              <span class="nav-profile-name"><?=$_SESSION['username']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!-- <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a> -->
              <a class="dropdown-item" href="logout.php">
                <h5 class="mdi mdi-logout text-primary"> Logout</h5>
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        


          <li class="nav-item">
            <a class="nav-link" href="food.php">
              <i class="mdi mdi-food-apple menu-icon"></i>
              <span class="menu-title">Food</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="user.php">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="content.php">
              <i class="mdi mdi-file-cloud menu-icon"></i>
              <span class="menu-title">Content</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="message.php">
              <i class="mdi mdi-message-reply-text menu-icon"></i>
              <span class="menu-title">Message</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="schedule.php">
              <i class="mdi mdi-calendar-clock menu-icon"></i>
              <span class="menu-title">Schedule</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
          <div class="row">
          <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User id: <?=$userid?></h4>
                 
                  <?php
   $sql = "SELECT * from `register` WHERE `reg_id`='$userid'";// where `verified`='1' AND `status`='1'";
   require_once("DBConnect.php");
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
    ?>
 <form action="edituser.php" class="forms-sample" method="POST" enctype="multipart/form-data">

<div class="input-group col-sm-12">
  
  <input type="file" placeholder="Upload Image" class="form-control " name="img"  required="required">
   
  <img src="../../../files/<?=$row['pic']?>" alt="pic" width="60px">
</div>

<input type="text" name="reg_id" value="<?=$userid?>" hidden>
<input type="text" name="username" value="<?=$row['username']?>" hidden>


<div class="form-group row">
<label for="exampleInputUsername2" class="col-sm-3 col-form-label">First Name</label>
<div class="col-sm-9">
  <input type="text" class="form-control" value="<?=$row['firstname']?>" name="firstname" id="exampleInputUsername2" require>
</div>
</div>
<div class="form-group row">
<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Last Name</label>
<div class="col-sm-9">
  <input type="text" class="form-control" value="<?=$row['lastname']?>" name="lastname" id="exampleInputUsername2" require>
</div>
</div>
<div class="form-group row">
<label for="exampleInputEmail2" class="col-sm-3 col-form-label">User Type</label>
<div class="fg-line">
                                      <select class="form-control" name="user_type">
                                      <option value="Donator">Donator</option>
                                        <option value="Receiver">Receiver</option>
                                        <option value="Sponser">Sponser</option>
                                            <option value="Volunteer">Volunteer</option>
                                                </select>
                                  </div>
</div>
<div class="form-group row">
<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Location</label>
<div class="fg-line">
                                      <select class="form-control" name="location">
                                      <option value="Bhaktapur">Bhaktapur</option>
                                    <option value="Kathmandu">kathmandu</option>
                                      <option value="Lalitpur">Lalitpur</option>
                                                </select>
                                  </div>
</div>

<div class="form-group row">
<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Contact</label>
<div class="col-sm-9">
  <input type="number" name="contact" value="<?=$row['contact']?>" class="form-control" id="exampleInputPassword2" required>
</div>
</div>
<div class="form-group row">
<label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Email</label>
<div class="col-sm-9">
  <input type="text" class="form-control" value="<?=$row['email']?>" name="email" id="exampleInputConfirmPassword2" require>
</div>
</div>
<div class="form-group row">
<label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Dob</label>
<div class="col-sm-9">
  <input type="date" class="form-control"  name="dob" id="exampleInputConfirmPassword2" require>
</div>
</div>

<button type="submit" class="btn btn-primary mr-2" name="edit_user">Save</button>

</form>
<a href="user.php"><button class="btn btn-light close">Cancel</button></a>
                </div>
              </div>
            </div>
                 
                            </div>
                        </div>



      </div></div></div></div></div>

      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../js/base.js"></script>
  
  <script src="../js/template.js"></script>
 >
 
  <!-- End custom js for this page-->
</body>

</html>

