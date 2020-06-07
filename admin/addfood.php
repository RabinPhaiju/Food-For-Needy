
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="description" content="Colorlib Templates"> -->
    <meta name="author" content="Colorlib"> -->
    <meta name="keywords" content="Colorlib Templates"> -->

    <!-- Title Page-->
    <title>Add Food</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">ADD FOOD</h2>
                    <form method="POST">
                    <!-- <dd>-->
                        <input class="input--style-2" type="text" placeholder="Food Name" name="name">
                        <div class="fg-line">
                           <!-- <input type="text" class="form-control" required="required" name="name">
                        </div>-->
                   <!-- </dd>-->
                </dl>
                <hr class="blackLines">
                <dl class="dl-horizontal">
                    <dt class="p-10">Location</dt>
                    <dd>
                        <div class="fg-line">
                            <select class="form-control" name="location">
                              <option value="Bhaktapur">Bhaktapur</option>
                              <option value="Kathmandu">Kathmandu</option>
                              <option value="Lalitpur">Lalitpur</option>
                          </select>
                      </div>
                  </dd>
              </dl>
             <!-- <hr class="blackLines">
              <dl class="dl-horizontal">-->
                <dt class="p-10">Type</dt>
                <dd>
                    <div class="fg-line">
                        <select class="form-control" name="type">
                          <option value="Vegetable">Vegetable</option>
                          <option value="Meet & Popultry">Meat & Poultry</option>
                          <option value="Fruits">Fruits</option>
                          <option value="Grains,Beans and Nuts">Grains,Beans and Nuts</option>
                          <option value="Dairy Foods">Dairy Foods</option>
                          <option value="Fish and Seafoods">Fish and Seafoods</option>
                      </select>
                  </div>
              </dd>
          </dl>
          <hr class="blackLines">
          <dl class="dl-horizontal">
            <dt class="p-10">Quanitity</dt>
            <dd>
                <div class="fg-line">
                    <input type="text" class="form-control" name="quantity">
                </div>
            </dd>
        </dl>
        <hr class="blackLines">
        <dl class="dl-horizontal">
            <dt class="p-10">Description</dt>
            <dd>
                <div class="fg-line">
                    <input type="text" class="form-control" required="required" name="Description">
                </div>
            </dd>
        </dl>
        <hr class="blackLines">
        <dl class="dl-horizontal">
            <dt class="p-10">Exp. Date</dt>
            <dd>
                <div class="fg-line">
                    <input type="date" class="form-control" required="required" name="ExpDate">
                </div>
            </dd>
        </dl>
        <hr class="blackLines">
        <div class="m-t-30">
            <button class="btn btn-primary btn-sm waves-effect btnss" name="add_food">Save</button>

        </div>
        <br>
        <a href="index.php">Cancel</a>
        <a href="index.php">Save</a>

    </div>

</div>
</div>
</div>
<!--<div class="col-md-4">

    <div class="profile-details">
        <h2>Picture</h2>
        <button class="input-files">
            <input type="file" name="img" onchange="loadFile(event)"  accept="image/jpg, image/jpeg, image/png" id="file-inputs file" required="required">
            <label for="file-inputs">UPLOAD</label>
        </button>
        <p><img id="outputs" width="150" /></p>
    </div>-->
          <?php

require_once("DBConnect.php");

$sql = "SELECT * FROM `user` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
?>
                <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
      
      </tr>
  </thead>
  <?php
if (mysqli_num_rows($result) > 0) {
   
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
?>
  <tbody>
   <tr>
        <td><?= ++$i;?></td>
        <td><?= $row["name"];?></td>
        <td><?= $row["username"];?></td>
        <td><?= $row["email"];?></td>
        <td><a href="edit_user.php?id=<?= $row['id'];?>">Edit</a> &nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_user.php?id=<?= $row['id'];?>">Delete</a></td>
    </tr>
  </tbody>
  <?php
    }   
} else {
    ?>
    <tr>
        <td colspan="3">No Record(s) found.</td>
    </tr>
    <?php
}
?>
<?php 
mysqli_close($conn);
?>

</div>
</div>
</div>



                        <!--<div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Food Name" name="name">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <!-- <input class="input--style-2 js-datepicker" type="text" placeholder="Birthdate" name="birthday"> -->
                                   <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Food">
                                            <option disabled="disabled" selected="selected">Type of food</option>
                                            <option>Dairy product</option>
                                            <option>Vegetables</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="class">
                                    <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Quantity" name="quantity">
                        </div>
                                    <option disabled="disabled" selected="selected">Quantity</option>
                                    <option>Class 1</option>
                                    <option>Class 2</option>
                                    <option>Class 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Registration Code" name="res_code">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<?php include_once('includes/footer.php');?>
<!-- end document-->