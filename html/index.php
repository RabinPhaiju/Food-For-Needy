<?php
include 'session.php';     
// echo $_SESSION['username'].$_SESSION['reg_id'];
$search=1;
$searchEmail=1;
$all=0;
$pos=@$_GET['pos'];
if($pos==9999){
    $pos=0;
    $all=1;
}
$today_time=date("Y-m-d");
$sql_schedule="DELETE FROM `schedule` WHERE `date`<'$today_time'";
require_once('DBConnect.php');
mysqli_query($conn, $sql_schedule);

$searchName=null;
$searchName=@$_GET['name'];
if(isset($searchName)){
    $search=0; 
    $searchEmail=0;
}

if (isset($_POST['searchsubmit'])) {
$search=0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/indexsearch.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/datetime.css">

    <title>Dashboard</title>
</head>

<body>
    <div class="navbar">
        <div class="nav0">
            <a href="../index.html"><img src="files/mainlogo.jpg" style="border-radius: 20%;" width="40px" alt="Food for Needy">&nbsp;</a>
        </div>
    
        <div class="navbar1">
            <div class="nav3">&nbsp;&nbsp;&nbsp;<i class="fa fa-user-cog fa-2x" aria-hidden="true"></i>
            
                <div class="middle">
                    <div class="menu">
                    <li class="item" id='dashboard'>
                            <a href="#dashboard" class="btn"><i class="fa fa-home"></i>Dashboard</a>
                            <div class="smenu">
                            <a href="#">Home</a>
                            </div>
                        </li>
                        <li class="item" id='profile'>
                            <a href="#profile" class="btn"><i class="far fa-user"></i>Profile</a>
                            <div class="smenu">
                            <a href="changepassword.php">Change Password</a>
                                <a href="editprofile.php">Edit Profile</a>
                            </div>
                        </li>
                        <li class="item">
                            <a class="btn" href="chat.php"><i class="fas fa-commenting"></i>Conversation</a>
                        </li>

                        <!-- <li class="item" id="messages">
                            <a href="#messages" class="btn"><i class="far fa-envelope"></i>Messages</a>
                            <div class="smenu">
                                <a href="new.php">New</a>
                                <a href="inbox.php">Inbox</a>
                                <a href="sent.php">Sent</a>
                            </div>
                        </li> -->

                        <li class="item" id="settings">
                            <a href="#settings" class="btn"><i class="fas fa-cog"></i>Food List</a>
                            <div class="smenu">
                                <a href="addfood.php">Add Food</a>
                                <a href="post.php">Your List</a>
                            </div>
                        </li>

                        <li class="item">
                            <a class="btn" href="records.php"><i class="fas fa-compass"></i>Records</a>
                        </li>

                        <li class="item">
                            <a class="btn" href="schedule.php"><i class="fas fa-calendar"></i>Schedule</a>
                        </li>
                        

                        <li class="item">
                            <a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="nav4">&nbsp&nbsp&nbsp&nbsp<a href=""><span style="font-family:sans-serif"><i class="fas fa-address-book"></i> CONTACT US</span></a></div>

            <div class="nav2">&nbsp&nbsp&nbsp&nbsp<a href="login.php"><span style="font-family:sans-serif"><i class="fab fa-earlybirds"></i> JOIN US</span></a></div>

            <div class="nav1"><a href=""><span style="font-family:sans-serif"><i class="fas fa-hands-helping"></i> DONATE</span></a></div>
        </div>


    </div>
    <div class="body_wrapper">
    <?php include 'navbar2.html';?>

        <form action="index.php" method="POST">
            <div class="wrap">
            <div class="search">
                <input type="text" style="color:black" class="searchTerm" placeholder="Search" name="search" required="required">
                <button type="submit" name="searchsubmit" class="searchButton">
                 <i class="fa fa-search"></i>
                 </button>
                 <a class="globe" href="index.php?pos=9999"><i class="fa fa-globe"></i></a>
              
              <div class="navi">
                  <?php
                          $sql = "SELECT * from `food`";// where `verified`='1' AND `status`='1'";
                            require_once("DBConnect.php");
                            $resulttotal = $conn-> query($sql);
                            $total = mysqli_num_rows($resulttotal);?>

              <?php if($pos==null){$pos=0;}?>
              <?php if($pos>0){?>
              <a class="navileft" href="index.php?pos=<?php echo $pos-10;?>"><i class="fa fa-chevron-left"></i></a>
              <?php }else { ?>
              <a class="navileft"><i class="fa fa-chevron-left"></i></a>
              <?php } if(($pos+10)<$total){ ?>
              <a class="naviright" href="index.php?pos=<?php echo $pos+10;?>"><i class="fa fa-chevron-right"></i></a>
              <?php } else { ?>
                <a class="naviright"><i class="fa fa-chevron-right"></i></a>
              <?php } ?>
              <p style="margin:8px 0 0 5px"><?php echo ($pos+1)." - ".($pos+10);?> out of <?php echo $total?></p>
                                        </div>
                            
            </div>
            
            
        </div>
        </form>
        

        <div class="cards">
            
        <!-- start -->
    <?php
        if($pos==null){$pos=0;
            $pos10=$pos+10;}else{
                $pos10=10;
            }
            if($all==1){$pos=0; $pos10=$total;}
             $sql = "SELECT * from `food` WHERE 1 Limit $pos, $pos10";// where `verified`='1' AND `status`='1'";
         
             require_once("DBConnect.php");
             $result = $conn-> query($sql);
             $total = mysqli_num_rows($result);

	if($result-> num_rows >0 && $search==1){
		while($row = $result-> fetch_assoc()){  
            $ids=$row["updated_by"];
            $sql1="SELECT * from `register` where `reg_id`='$ids'";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            ?>
            
            <div class="wrapper">
                <div class="container">
                    <div class="top">
                      <?php  $filepath="files/".$row["pic"];?>
                        <img src="<?php echo $filepath; ?>" >
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <div class="details">
                                <p style="font-weight:bold"><?php echo $row["name"];?></p>
                                <hr class="blackLin">
                                 <?php echo " By: ".$row1["username"];?>
                                <?php echo $row["location"];?>
                            </div>
                            <div class="buy"><a href="viewfood.php?foodid=<?= $row['food_id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <i><?php echo $row["quantity"];?></i>
                        </div>
                        </div>
                        <!-- <div class="right">
                            <div class="done"><i class="material-icons">done</i></div>
                            
                            <div class="remove"><i class="material-icons">clear</i></div>
                        </div> -->
                    </div>
                </div>
                <div class="inside">
                    <div class="icon"><i class="material-icons">&nbsp&nbsp&nbspInfo</i></div>
                    <div class="contents">
                        <table>
                            <tr>
                                <th><?php echo $row["location"];?></th>
                            </tr>
                            <tr>
                                <th><?php echo $row["type"];?></th>
                            </tr>
                            <tr>
                                <td><?php echo $row["Description"];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $row["ExpDate"];?></td>
                                
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
           
        <?php      }}else if($search==0) {
            if($searchEmail==0){
                    $search=@$_GET['name'];
            }else{
                    $search=$_POST['search'];
                }

             $sql = "SELECT * from food where `name`='$search'"; // where `verified`='1' AND `status`='1'";
             require_once("DBConnect.php");
             $result = $conn-> query($sql);
             if($result-> num_rows >0 && $search==0){
                while($row = $result-> fetch_assoc()){  
                    $ids=$row["updated_by"];
             $sql1="SELECT * from `register` where `reg_id`='$ids'";
             $result1 = mysqli_query($conn, $sql1);
             $row1 = mysqli_fetch_assoc($result1);
                    ?>
                
                    <div class="wrapper">
                        <div class="container">
                            <div class="top">
                              <?php  $filepath="files/".$row["pic"];?>
                                <img src="<?php echo $filepath; ?>" >
                            </div>
                            <div class="bottom">
                                <div class="left">
                                <div class="details">
                                <p><span style="font-weight:bold"><?php echo $row["name"];?></span></br>
                                 <?php echo " By: ".$row1["username"];?><br>
                                <?php echo $row["location"];?></p>
                            </div>
                                    <div class="buy"><a href="viewfood.php?foodid=<?= $row['food_id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <i><?php echo $row["quantity"];?></i>
                                </div>
                                </div>
                                <!-- <div class="right">
                                    <div class="done"><i class="material-icons">done</i></div>
                                    
                                    <div class="remove"><i class="material-icons">clear</i></div>
                                </div> -->
                            </div>
                        </div>
                        <div class="inside">
                            <div class="icon"><i class="material-icons">&nbsp&nbsp&nbsp&nbsp&nbspMore &nbsp&nbsp&nbsp&nbsp&nbspInfo</i></div>
                            <div class="contents">
                                <table>
                                    <tr>
                                        <th><?php echo $row["location"];?></th>
                                    </tr>
                                    <tr>
                                        <th><?php echo $row["type"];?></th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row["Description"];?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row["ExpDate"];?></td>
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                <?php      }}

        }else{
            ?><h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspYou have reached the End.</h1>
      <?php  }       ?>
            <!-- end -->
        </div>

    </div>
    <script src="js/index1.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="js/datetime.js"></script>
</body>

</html>