<?php include 'session.php';?>
<?php
$schedule_id = @$_GET['id'];

if (isset($_POST['edit_schedule'])) {
    $schedule_id=$_POST['schedule_id'];
    
$b = $_POST['start_time'];
$c = $_POST['end_time'];
$d = $_POST['date'];
$e = $_POST['title'];
$g = $_POST['description'];
$h = $_POST['location'];
$your_date=strtotime($d);
    $day = date('l', $your_date);

$sql = " UPDATE `schedule` SET `day`='$day',`start_time`='$b',`end_time`='$c',`date`='$d',`title`='$e',`description`='$g',`location`='$h' WHERE `schedule_id`='$schedule_id'";
// echo $sql;exit;

// Create connection
require_once("DBConnect.php");
if (mysqli_query($conn, $sql)) {

// echo "<script>alert('Update Changes Successfully!');</script>";
echo "<script>window.location='schedule.php';</script>";
} else {
echo "Error updating record: " . mysqli_error($conn);
}
}
if (!isset($schedule_id)) {
	echo "<script>window.location='schedule.php';</script>";
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
          <li class="nav-item">
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
          <li class="nav-item active">
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
                  <h4 class="card-title">Schedule id: <?=$schedule_id?></h4>
                 
                  <?php
   $sql = "SELECT * from `schedule` WHERE `schedule_id`='$schedule_id'";// where `verified`='1' AND `status`='1'";
   require_once("DBConnect.php");
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
    ?>
 <form action="editschedule.php" class="forms-sample" method="POST" enctype="multipart/form-data">


<input type="text" name="schedule_id" value="<?=$schedule_id?>" hidden>


                  <div class="form-group"> 
                                                            <label for="Location">Choose a Location:</label>
                                                            <select class="form-control" name="location">
                                                                <option value="<?=$row['location']?>"><?=$row['location']?></option>
                                                                <option value="Bhaktapur">Bhaktapur</option>
                                                                <option value="Kathmandu">Kathmandu</option>
                                                                <option value="Lalitpur">Lalitpur</option>
                                                            </select> 
                                                            <br>
                                                            <label for="Starting time">Starting time: (9 AM to 6 PM)</label>
                                                    <input type="time" class="form-control" value="<?=$row['start_time']?>" name="start_time" required/>
                                                             <label for="Ending time">Ending time: (9 AM to 6 PM)</label>
                                                    <input type="time" class="form-control" value="<?=$row['end_time']?>" name="end_time" required/>
                                                            <label for="date">Date:</label>
                                                    <input type="date" class="form-control" value="<?=$row['date']?>" name="date" required/>
                                                    <br>
                                                    <label for="Tittle">Tittle:</label>
                                                    <input type="text" class="form-control" placeholder="Enter tittle" value="<?=$row['title']?>" name="title" required/>
                                                    <br>
                                                    <label for="description">Description:</label>
                                                    <textarea name="description" class="form-control" rows="8" cols="80"><?=$row['description']?></textarea>                                                   
                                                    </div>


                    
                    <button type="submit" class="btn btn-primary mr-2" name="edit_schedule">Save</button>
                   
                  </form>
<a href="schedule.php"><button class="btn btn-light close">Cancel</button></a>
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

