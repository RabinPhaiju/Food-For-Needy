<?php
include 'session.php';
$foodid = @$_GET['foodid'];

if (isset($_POST['food_edit'])) {
    $foodid=$_POST['foodid'];
$b = $_POST['name'];
$c = $_POST['quantity'];
$d = $_POST['type'];
$e = $_POST['location'];
$g = $_POST['Description'];
$h = $_POST['ExpDate'];

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

if(isset($_SESSION['usergoogle'])){
    $sql = " UPDATE `food` SET `name`='$b',`location`='$e',`quantity`='$c',`ExpDate`='$h',`Description`='$g',`type`='$d' WHERE `food_id`='$foodid'";
       }
        else{

// $b=$_SESSION['username'];
$sql = " UPDATE `food` SET `name`='$b',`location`='$e',`quantity`='$c',`ExpDate`='$h',`Description`='$g',`type`='$d' WHERE `food_id`='$foodid'";
// echo $sql;exit;
}
// Create connection
require_once("DBConnect.php");
if (mysqli_query($conn, $sql)) {
// echo "Record updated successfully";
$sql0="SELECT * from `food` where `name`='$b'";
$result0 = mysqli_query($conn, $sql0);
$row0 = mysqli_fetch_assoc($result0);
$foodid=$row0["food_id"];
$foodname=$row0["name"];
$foodlocation=$row0["location"];
$foodquantity=$row0["quantity"];
require_once("DBConnect.php");
$des=$_SESSION['username']." updated ".$foodname." in ".$foodlocation." (".$foodquantity.").";
$sql2="INSERT INTO `records` (`description`,`reg_id`) VALUES ('$des','$a')";
//   echo "first";
if(mysqli_query($conn, $sql2)){
//   echo "done";
}
else {
echo "Error updating record: " . mysqli_error($conn);
}
// echo "<script>alert('Update Changes Successfully!');</script>";
// echo "<script>window.location='index.php';</script>";
} else {
echo "Error updating record: " . mysqli_error($conn);
}
$bc = str_replace(' ', '', $b);
$foodnames=$bc.$foodid.".jpg";
// $sql="SELECT * FROM `register` WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
$sql = " UPDATE `food` SET `pic`='$foodnames' WHERE `food_id`='$foodid'";

// require_once("DBConnect.php");
// $resultpic = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($resultpic);

//     $bbb=$_POST['name'].$row["food_id"];//foodname + id

//     $bname=$bbb.".jpg";
    if(empty($errors)==true){
    //    move_uploaded_file($file_tmp,"files/".$bname);
    move_uploaded_file($file_tmp,"files/".$foodnames);
 
    //    $sql= "UPDATE `food` SET `pic`='$bname' WHERE `name`='$b'and`location`='$c' and `quantity`='$d' and `ExpDate`='$e' and `type`='$g'";
       require_once("DBConnect.php");

      if (mysqli_query($conn, $sql)) {
          echo "<script>window.location='index.php';</script>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      } 
    }
    mysqli_close($conn);
}
if (!isset($foodid)) {
	echo "<script>window.location='index.php';</script>";
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

    <title>View Food</title>
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
       .button_delete a:link,.button_delete a:visited {
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        margin-left:10px;
        text-align: center;
        text-decoration: none;
        border-radius:5%;
        display: inline-block;
        }

        .button_delete a:hover,.button_delete a:active {
        background-color: red;
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
   $sql = "SELECT * from `food` WHERE `food_id`='$foodid'";// where `verified`='1' AND `status`='1'";
   require_once("DBConnect.php");
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
    ?>
<form action="viewfood.php" method="POST" enctype="multipart/form-data">
                                    <h2>Picture</h2>
                                    <!-- <p><img id="outputs" width="150" /></p> -->
                                    <img id="outputs" src="files/<?php if($row["pic"]==null){echo 'food.png';}else{ echo $row["pic"];}?>" width="200">

                                    <div class="profile-details">
                                    
                                    <button class="input-files" id="uploadpic">
                                        <input type="file" name="img" onchange="loadFile(event)"  accept="image/jpg, image/jpeg, image/png" id="file-inputs file" required="required">
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
                                                <a href="#" data-toggle="dropdown">
                                                <i class="fa fa-pencil-square-o">Update</i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><?php if ($_SESSION['reg_id']==$row['updated_by']){?>
                                                        <a data-profile-action="edit" href="#" onclick="showbuttom()">Edit</a>
                                                    <?php } else { ?> <a href="#">Not Allowed</a><?php }?>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="profile-body">
                                        <div class="profile-view">
                                        <dl class="dl-horizontal">
                                                <dt>Food Id</dt>
                                                <dd><?php echo $row["food_id"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Food Type</dt>
                                                <dd><?php echo $row["type"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Food Name</dt>
                                                <dd><?php echo $row["name"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Quantity</dt>
                                                <dd><?php echo $row["quantity"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Location</dt>
                                                <dd><?php echo $row["location"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Description</dt>
                                                <dd><?php echo $row["Description"];?></dd>
                                            </dl>
                                            <hr class="blackLine">
                                            <dl class="dl-horizontal">
                                                <dt>Exp Date</dt>
                                                <dd><?php echo $row["ExpDate"];?></dd>
                                            </dl>
                                        </div>
                                    
                                        <div class="profile-edit">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Food Name</dt>
                                                <input type="hidden" name="foodid" value="<?php echo $row["food_id"];?>">
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="name" required="required" value="<?php echo $row["name"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Quantity</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" name="quantity" required="required" value="<?php echo $row["quantity"];?>">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Food Type</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <select class="form-control" name="type" required="required">
                                                        <option value="Vegetable">Vegetable</option>
                                                                          <option value="Meet & Popultry">Meat & Poultry</option>
                                                                          <option value="Fruits">Fruits</option>
                                                                          <option value="Grains,Beans and Nuts">Grains,Beans and Nuts</option>
                                                                          <option value="Dairy Foods">Dairy Foods</option>
                                                                      </select>
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Location</dt>
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
                                                <dt class="p-10">Description</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" value="<?php echo $row["Description"];?>" name="Description" required="required">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Exp Date</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="date" class="form-control" value="<?php echo $row["ExpDate"];?>" name="ExpDate" required="required">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <hr class="blackLines">               
                                            <div class="m-t-30">
                                                <button class="btn btn-primary btn-sm waves-effect" style="float:left" name="food_edit">Save</button>
                                                <div class="button_delete"><a href="delete_food.php?food_id=<?= $row['food_id'];?>">Delete</a></div>
                                                <button data-profile-action="reset" class="btn-link btn-cancel">Cancel</button>
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
    <script src="js/editprofile.js"></script>

    <script src="js/index1.js"></script>
    <script src="js/datetime.js"></script>

    <script>
    function showbuttom(){
    document.getElementById("uploadpic").style.display = "block";
    }
    var loadFile = function(event) {
	var image = document.getElementById('outputs');
	image.src = URL.createObjectURL(event.target.files[0]);
};
    </script>

</body>

</html>