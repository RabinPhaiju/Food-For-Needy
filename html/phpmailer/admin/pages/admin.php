<?php include 'session.php';?>
<?php
$admin=false;
if (isset($_POST['add_admin'])) {
    $b = $_POST['name'];
    $c = $_POST['username'];
    $d = $_POST['usertype'];
    $e = $_POST['email'];
    $f = $_POST['phone'];
    $g = $_POST['address'];
    $h = $_POST['dob'];
    $i = $_POST['gender'];
    $j = $_POST['password'];


    // file
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
       echo "<script>window.location='food.php';</script>";
       exit;
       
    }
    if($file_size > 2097152){
       $errors[]='File size must be less than or equal to 2 MB';
       echo "<script>alert('File size must be less than or equal to 2 MB');</script>";
       echo "<script>window.location='food.php';</script>";
       exit;
    }
    //file end
    
    // $b=$_SESSION['username'];
    $a=$_SESSION['reg_id'];
    $sql = "INSERT INTO `user` (`name`,`username`,`usertype`,`email`,`phone`,`address`,`dob`,`gender`,`password`,`verifiedby_id`) 
    VALUES('$b','$c','$d','$e','$f','$g','$h','$i',md5('$j'),'$a')";
    // echo $sql;exit;
  
    // Create connection
    require_once("DBConnect.php");
    
    if (mysqli_query($conn, $sql)) {
        
    echo "Record updated successfully";
    // echo "<script>alert('Update Changes Successfully!');</script>";
    //echo "<script>window.location='index.php';</script>";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }
    
    $sql="SELECT * FROM `user` WHERE `name`='$b'and`username`='$c' and `usertype`='$d' and `email`='$e' and `phone`='$f'";
    
    require_once("DBConnect.php");
    $resultpic = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultpic);
    $bc = str_replace(' ', '', $b);
        $bbb=$bc.$row["id"];//foodname + id
    
        $bname=$bbb.".jpg";
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"../../../files/".$bname);
     
           $sql= "UPDATE `user` SET `pic`='$bname' WHERE `name`='$b'and`username`='$c' and `usertype`='$d' and `email`='$e' and `phone`='$f'";
           require_once("DBConnect.php");
    
          if (mysqli_query($conn, $sql)) {
               echo "<script>window.location='admin.php';</script>";
            // exit();
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
          <li class="nav-item">
            <a class="nav-link" href="schedule.php">
              <i class="mdi mdi-calendar-clock menu-icon"></i>
              <span class="menu-title">Schedule</span>
            </a>
          </li>
          <?php
         if($_SESSION['reg_id']<4){
           ?>
              <li class="nav-item active">
            <a class="nav-link" href="admin.php">
              <i class="mdi mdi-security menu-icon"></i>
              <span class="menu-title">Admin</span>
            </a>
          </li>
           <?php
         }
          ?>
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
                  <h4 class="card-title">Add Admin-User</h4>
                 
                  <form action="admin.php" class="forms-sample" method="POST" enctype="multipart/form-data">


                  



                      <div class="input-group col-sm-12">
                        
                        <input type="file" placeholder="Upload Image" class="form-control " name="img"  required="required">
                         
                        
                      </div>




                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Admin</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" id="exampleInputUsername2" placeholder="Admin Name" require>
                      </div>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="username" id="exampleInputUsername2" placeholder="User Name" require>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">User Type</label>
                      <div class="fg-line">
                                                            <select class="form-control" name="usertype">
                                                                          <option value="Staff">Staff</option>
                                                                          <option value="Other">Other</option>
                                                                      </select>
                                                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <input type="email" name="email" class="form-control" id="exampleInputPassword2" placeholder="Enter Email" required>
                      </div>
                      <div class="col-sm-4">
                        <input type="number" name="phone" class="form-control" id="exampleInputPassword2" placeholder="Enter Phone" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <!-- <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Address</label> -->
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" id="exampleInputConfirmPassword2" placeholder="Enter address" require>
                      </div>
                      <div class="col-sm-4">
                      <select class="form-control" name="gender">
                                                                          <option value="Male">Male</option>
                                                                          <option value="Female">Female</option>
                                                                          <option value="Other">Other</option>
                                                                      </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">DoB</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="dob" id="exampleInputConfirmPassword2" require>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="exampleInputConfirmPassword2" placeholder="Enter password" require>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="add_admin">Save</button>
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
                  <p class="card-title">Admins</p>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>S.N</th><th>Reg.Id</th><th>username</th><th>Name</th><th>Picture</th><th>Type</th>
                          <th>Email</th><th>Phone</th><th>Address</th><th>Gender</th><th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count=1;
                      require_once("DBConnect.php");
                      $sql = "SELECT * from user ";
                        $result = $conn-> query($sql);
                        if($result-> num_rows >0){  
                          while($row = $result-> fetch_assoc()){      
                      ?>
                        <tr>
                          <td><?=$count?>  </td>
                          <td><?=$row['id']?></td>
                            <td><?=$row['username']?></td>
                            <th><?= $row['name']?></th>
                           
                           <td><img src="../../../files/<?=$row['pic']?>" alt=""></td>
                           <td><?=$row['usertype']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['phone']?></td>
                            <td><?=$row['address']?></td>
                            <td><?=$row['gender']?></td>
                            <th>
                            <?php
                            if($row['id']>3){
                                ?>
<a href="editadmin.php?id=<?=$row['id']?>"><button type="button" class=" btn btn-secondary mdi mdi-lead-pencil"></button></a>
                            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteadmin.php?id=<?=$row['id']?>"><button type="button" class="btn btn-danger mdi mdi-delete-forever"></button></a>				
                            
                                <?php
                            }
                            ?>
                            
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
 >
 
  <!-- End custom js for this page-->
</body>

</html>

