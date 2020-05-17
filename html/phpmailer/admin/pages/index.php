<?php include 'session.php';?>
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
          <a class="" href="index.html"><img src="../images/favicon.jpg" width="50px" alt="logo"/></a>
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
            
              <img src="../images/<?php if($_SESSION['pic']!=null){echo 'user.png';}else{ echo $_SESSION['pic'];}?>";>
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
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ui-features/buttons.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Buttons</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="forms/basic_elements.html">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Form elements</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="tables/basic-table.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="samples/login.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">login</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="samples/login.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Food</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="samples/login.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="samples/login.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Content</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="samples/login.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Message</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="samples/login.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Schedule</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <!-- overview--slaes --purchases  -->
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
               
                  <ul class="nav nav-tabs px-4" role="tablist">
                    
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Food</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">User</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Schedule</a>
                    </li>
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-clipboard-text icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Food</small>
                             <?php 
                             $sum=0;
                                   require_once("DBConnect.php");
                                  $sql1="SELECT * from `food`";
                                  $result1 = mysqli_query($conn, $sql1);
                                  $total = mysqli_num_rows($result1);
                                  while($row = $result1-> fetch_assoc()){ 
                                    $sum = $sum + $row['quantity'];
                                  }
                                  ?>
                                <h5 class="mb-0 d-inline-block"><?=$total?></h5>
                             
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-database mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Quantity</small>
                            <h5 class="mr-2 mb-0"><?=$sum;?></h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <!-- <i class="mdi mdi-eye mr-3 icon-lg text-success"></i> -->
                          <div class="d-flex flex-column justify-content-around">
                            <!-- <small class="mb-1 text-muted">Total views</small>
                            <h5 class="mr-2 mb-0">9833550</h5> -->
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <!-- <i class="mdi mdi-download mr-3 icon-lg text-warning"></i> -->
                          <div class="d-flex flex-column justify-content-around">
                            <!-- <small class="mb-1 text-muted">Downloads</small>
                            <h5 class="mr-2 mb-0">2233783</h5> -->
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <!-- <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i> -->
                          <div class="d-flex flex-column justify-content-around">
                            <!-- <small class="mb-1 text-muted">Flagged</small>
                            <h5 class="mr-2 mb-0">3497843</h5> -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Start date</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Downloads</small>
                            <h5 class="mr-2 mb-0">2233783</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total views</small>
                            <h5 class="mr-2 mb-0">9833550</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Revenue</small>
                            <h5 class="mr-2 mb-0">$577545</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Flagged</small>
                            <h5 class="mr-2 mb-0">3497843</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Start date</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Revenue</small>
                            <h5 class="mr-2 mb-0">$577545</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total views</small>
                            <h5 class="mr-2 mb-0">9833550</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Downloads</small>
                            <h5 class="mr-2 mb-0">2233783</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Flagged</small>
                            <h5 class="mr-2 mb-0">3497843</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="menu">
           

            <div class="wrapper">
                <div class="cards">
                  <figure class="card">             
                    <img src="../images/food.png" />             
                    <figcaption>Food</figcaption>            
                  </figure>           
                  <figure class="card">            
                    <img src="../images/register.jpg" />            
                    <figcaption>User</figcaption>          
                  </figure>         
                  <figure class="card">         
                    <img src="../images/content.png" />         
                    <figcaption>Content</figcaption>      
                  </figure>       
                  <figure class="card">              
                    <img src="../images/message.png" />             
                    <figcaption>Message</figcaption>             
                  </figure>  
                  <figure class="card">              
                    <img src="../images/schedule.png" />             
                    <figcaption>Schedule</figcaption>             
                  </figure>            
                </div>             
              </div>
          </div>    
          </div>
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Recent Food Added</p>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                          <th>S.N</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Exp. Date</th>
                            <th>Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count=1;
                      require_once("DBConnect.php");
                      $sql = "SELECT * from food ";
                        $result = $conn-> query($sql);
                        if($result-> num_rows >0){  
                          while($row = $result-> fetch_assoc()){      
                      ?>
                        <tr>
                          <td><?=$count?></td>
                            <td><?=$row['name']?></td>
                            <td><?=$row['location']?></td>
                            <td><?=$row['type']?></td>
                            <td><?=$row['quantity']?></td>
                            <td><?=$row['ExpDate']?></td>
                            <td><?=$row['Description']?></td>
                        </tr>
                          <?php $count++; }} ?>
                      </tbody>
                    </table>
                  </div>
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
 >
 
  <!-- End custom js for this page-->
</body>

</html>

