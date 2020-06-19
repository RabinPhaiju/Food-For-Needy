<?php include 'session.php';?>
<?php
if (isset($_POST['add_schedule'])) {
    $a = $_SESSION['username'];
    $c = $_POST['location'];
    $d = $_POST['start_time'];
    $e = $_POST['end_time'];
    $f = $_POST['date'];
    $g = $_POST['tittle'];
    $h = $_POST['description'];

    $to_time = strtotime($e);
    $from_time = strtotime($d);
    $total_time=round(abs($to_time - $from_time) / 60,2);
    
    $your_date=strtotime($f);
 
    if($total_time>300){
        $error="Duration cannot be more than 5 hours";
     }else if($d<"08:59:59" || $e>"18:00:01" || $e<"08:59:59" || $d>"18:00:01"){
        $error="Time must be greater than 9 AM and less than 6PM";
     }
    else{
    $b = date('l', $your_date);
    // echo $b;
    
    require_once("DBConnect.php");
      $sql="INSERT INTO `schedule` (`updated_by`,`day`,`start_time`,`end_time`,`date`,`title`,`description`,`location`) VALUES ('$a','$b','$d','$e','$f','$g','$h','$c')";
      if(mysqli_query($conn, $sql)){
              
        echo "<script>window.location='schedule.php';</script>";
      }
      else {
        echo "Error updating record: " . mysqli_error($conn);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FFN Admin</title>
  <link rel="stylesheet" href="../css/custom.min.css">
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
                 
                  <div class="table-responsive">
      <a class="plus class="btn btn-success data-toggle="modal" data-target="#popUpWindow" href="#"><button class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;&nbsp;&nbsp;</button><i class="fa fa-plus fa-2x btnss" aria-hidden="true"></i></a>
            <div class="modal fade" id="popUpWindow">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- header -->
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <!-- <h3 class="modal-title">Login Form</h3> -->
                                </div>
                                <!-- body -->
                                <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Schedule</h4>
                 
                  <form action="schedule.php" class="forms-sample" method="POST" enctype="multipart/form-data">


                  <div class="form-group"> 
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
                                                            <label for="date">Date:</label>
                                                    <input type="date" class="form-control" name="date" required/>
                                                    <br>
                                                    <label for="Tittle">Tittle:</label>
                                                    <input type="text" class="form-control" placeholder="Enter tittle" name="tittle" required/>
                                                    <br>
                                                    <label for="description">Description:</label>
                                                    <textarea name="description" class="form-control" rows="4" cols="50">Enter Schedule description.</textarea>                                                   
                                                    </div>


                    
                    <button type="submit" class="btn btn-primary mr-2" name="add_schedule">Save</button>
                    <button class="btn btn-light close" data-dismiss="modal">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
                            </div>
                            </div>
                        </div>





      </div></div></div></div></div>

      <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Recent Schedule</p>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>S.N</th>
                            <th>Organized By</th>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count=1;
                      require_once("DBConnect.php");
                      $sql = "SELECT * from schedule ";
                        $result = $conn-> query($sql);
                        if($result-> num_rows >0){  
                          while($row = $result-> fetch_assoc()){      
                      ?>
                        <tr>
                          <td><?=$count?> </td>
                            <td><?=$row['updated_by']?></td>
                            <td><?=$row['day']?></td>
                            <td><?=$row['start_time']?></td>
                            <td><?=$row['end_time']?></td>
                            <td><?=$row['date']?></td>
                            <td><?=$row['title']?></td>
                            
                            <td><?=$row['description']?></td>
                            <td><?=$row['location']?></td>
                            <th>
                            <a href="editschedule.php?id=<?=$row['schedule_id']?>"><button type="button" class=" btn btn-secondary mdi mdi-lead-pencil"></button></a>
                            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteschedule.php?id=<?=$row['schedule_id']?>"><button type="button" class="btn btn-danger mdi mdi-delete-forever"></button></a>				
                            </th>
                        </tr>
                          <?php $count++; }} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 Food For Needy. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../js/base.js"></script>
  
  <script src="../js/template.js"></script>
  <script src="../js/datatable.js"></script>
  <script src="../js/custom.min.js"></script>
 
 
  <!-- End custom js for this page-->
</body>

</html>

