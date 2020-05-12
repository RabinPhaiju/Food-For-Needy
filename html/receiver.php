<?php
include 'session.php';
$search=0;
$pos=0;
$pos10=10;
if (isset($_POST['searchsubmit'])) {
    $search_name = $_POST['search'];
    $search=1;
    }
$all=0;
$pos=@$_GET['pos'];
if($pos==9999){
    $pos=0;
    $all=1;
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Receiver</title>
    <style>
               body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
               }
    .contains {
        margin-left:5%;
    }
.media {
  box-shadow: 0px 0px 4px -2px #000;
  margin: 10px 0;
  padding: 10px;
  background-color: rgba(20, 20, 20, 0.3);
}
.media-body {
  padding: 5px;
}
.media-body a {
  text-decoration: none;
}
.media .label {
  padding: 5px 10px;
}
.dp {
  border: 10px solid #eee;
  transition: all 0.2s ease-in-out;
}
.dp:hover {
  border: 2px solid #eee;
  transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  -webkit-transform: rotate(360deg);
  -webkit-font-smoothing: antialiased;
}
.search,
.navi {
    width: 100%;
    position: relative;
    display: flex;
   
}

.searchTerm {
    width: 30%;
    border: 3px solid rgb(134, 135, 135);
    border-right: none;
    padding: 15px;
    height: 20px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
}

.searchTerm:focus {
    color: rgba(100, 96, 103, 0.521);
}

.searchButton {
    width: 40px;
    height: 36px;
    border: 1px solid rgb(134, 135, 135);
    background: rgb(134, 135, 135);
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
}
.naviright {
    margin-left: 5px;
    padding-top: 5px;
    width: 40px;
    height: 36px;
    border: 1px solid rgb(134, 135, 135);
    background: rgb(134, 135, 135);
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
}

.navileft {
    padding-top: 5px;
    width: 40px;
    height: 36px;
    margin-left: 100px;
    border: 1px solid rgb(134, 135, 135);
    background: rgb(134, 135, 135);
    text-align: center;
    color: #fff;
    border-radius: 5px 0 0 5px;
    cursor: pointer;
    font-size: 20px;
}

.globe {
    padding-top: 5px;
    padding-left: 10px;
    padding-right: 10px;
    width: 40px;
    height: 36px;
    margin-left: 100px;
    border: 1px solid rgb(134, 135, 135);
    background: rgb(134, 135, 135);
    text-align: center;
    color: #fff;
    border-radius: 5px 5px 5px 5px;
    cursor: pointer;
    font-size: 20px;
}
    </style>
</head>

<body>
<?php include 'navbar1.html';?>
    <div class="body_wrapper">
    <?php include 'navbar2.html';?>

        <div class="container">
            <div class="col-md-8 col-sm-9 contains">
                <div class="panel profile-panel">
   
        
        <caption><b style="font-size:25px;">Food For Needy - Receiver</b></caption>
        <br>
        <form action="receiver.php" method="POST">
       
            <div class="search">
            <!-- <Strong style="font-size: 23px"> Receiver </Strong> -->
                <input type="text" style="color:black" class="searchTerm" placeholder="Search" name="search" required="required">
                <button type="submit" name="searchsubmit" class="searchButton">
                 <i class="fa fa-search"></i>
                 </button>
                 <a class="globe" href="receiver.php?pos=9999"><i class="fa fa-globe"></i></a>
              
              <!-- <div class="navi"> -->
                  <?php
                          $sql = "SELECT * from `register` WHERE  `user_type`='Receiver'";// where `verified`='1' AND `status`='1'";
                          
                            require_once("DBConnect.php");
                            $resulttotal = $conn-> query($sql);
                            $total = mysqli_num_rows($resulttotal);
                            
                            if($pos==null){$pos=0;
                                $pos10=$pos+10;}else{
                                    $pos10=10;
                                }
                                if($all==1){$pos=0; $pos10=$total;}
                            
                            ?>

                            

              <?php if($pos==null){$pos=0;}?>
              <?php if($pos>0){?>
              <a class="navileft" href="receiver.php?pos=<?php echo $pos-10;?>"><i class="fa fa-chevron-left"></i></a>
              <?php }else { ?>
              <a class="navileft"><i class="fa fa-chevron-left"></i></a>
              <?php } if(($pos+10)<$total){ ?>
              <a class="naviright" href="receiver.php?pos=<?php echo $pos+10;?>"><i class="fa fa-chevron-right"></i></a>
              <?php } else { ?>
                <a class="naviright"><i class="fa fa-chevron-right"></i></a>
              <?php } ?>
              <p style="margin:8px 0 0 5px"><?php echo ($pos+1)." - ".($pos+10);?> out of <?php echo $total?></p>
                                        <!-- </div> -->
            </div>
    </form>
        <br>
    <?php
     require_once("DBConnect.php");
     if($conn-> connect_error){
         die("Connection failed:". $conn-> connect_error);
     }
         if($search==1){
             $sql = "SELECT * from register WHERE `user_type`='Receiver' AND `firstname`='$search_name' ";
         }else{
         $sql = "SELECT * from register WHERE `user_type`='Receiver' AND 1 Limit $pos, $pos10";
         }
     $result = $conn-> query($sql);
     // echo $result-> num_rows;
     if($result-> num_rows >0){
        
        while($row = $result-> fetch_assoc()){
            if($row['reg_id']==$_SESSION['reg_id']){
                    continue;
            }
            ?>
    
    <div class="row">

<div class="col-md-12">
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object dp img-circle" src="<?php if($row['pic']==null){?>files/user.png<?php }else{?> files/<?php echo $row['pic'];}?>" style="width: 80px;height:80px;">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Name :<strong> <?=$row['firstname']." ".$row['lastname']?></strong></h4>
            <h5>Email: <?=$row['email']?></h5>
            <h6>Location: <?=$row['location']?></h6>
            <h6>Contact: <?=$row['contact']?></h6>
            <hr class="blackLine">
            <!-- <br> -->
            <a href="viewprofile.php?view=<?=$row['username']?>"><span class="label label-warning">View Profile</span></a>
            <a><span class="label label-default">Last Seen: Today</span></a>
            <a href="chat.php?session_name=<?=$row['username']?>"><span class="label label-success">Send Message</span></a>
            <!-- <a href="#"><span class="label label-warning">Remove</span></a> -->
        </div>
    </div>
</div>
</div>

         <?php  }}?>
                    <!-- end panel body -->
                </div>
            </div>
        </div>
    </div>
    <script>
</script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/editprofile.js"></script>

    <script src="js/index1.js"></script>


</body>

</html>