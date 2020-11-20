<?php
include 'session.php';
// echo $_SESSION['username'].$_SESSION['reg_id'];
$search=1;

if (isset($_POST['searchsubmit'])) {
$search=0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="files/mainlogo.jpg" type="image/gif" sizes="16x16">
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

    <title>Food List</title>
 
</head>

<body>
    <div class="navbar">
        <div class="nav0">
            <a href="../index.php"><img src="files/mainlogo.jpg" style="border-radius: 20%;" width="40px" alt="Food for Needy">&nbsp;</a>
        </div>
        <div class="navbar1">
            <div class="nav3">&nbsp;&nbsp;&nbsp;<i class="fa fa-user-cog fa-2x" aria-hidden="true"></i>
                <div class="middle">
                    <div class="menu">
                    <li class="item" id='dashboard'>
                            <a href="#dashboard" class="btn"><i class="fa fa-home"></i>Dashboard</a>
                            <div class="smenu">
                            <a href="index.php">Home</a>
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
                                <a href="#">Your List</a>
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
            <div class="nav1">&nbsp&nbsp&nbsp&nbsp<a href="index.php"><span style="font-family:sans-serif"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a></div>

            <div class="nav4">&nbsp&nbsp&nbsp&nbsp<a href="editprofile.php"><span style="font-family:sans-serif"><i class="fa fa-user-circle" aria-hidden="true"></i><?php echo $_SESSION['name'];?> </span></a></div>

            <div class="nav2">&nbsp&nbsp&nbsp&nbsp<a href="chat.php"><span style="font-family:sans-serif"><i class="fa fa-envelope" aria-hidden="true"></i> Message</span></a></div>

            <div class="nav1"><a href="schedule.php"><span style="font-family:sans-serif"><i class="fa fa-calendar" aria-hidden="true"></i> Schedule</span></a></div>
        
        </div>


    </div>
    <div class="body_wrapper">
    <?php include 'navbar2.html';?>

        <form action="post.php" method="POST">
        <div class="wrap">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Search" name="search" required="required">
                <button type="submit" name="searchsubmit" class="searchButton">
                 <i class="fa fa-search"></i>
              </button>
            </div>
        </div>
        </form>

        <div class="cards">
            
        <!-- start -->
    <?php
   $session_reg_id=$_SESSION['reg_id'];
    $sql = "SELECT * from food where `updated_by`='$session_reg_id'";// where `verified`='1' AND `status`='1'";
    require_once("DBConnect.php");
	$result = $conn-> query($sql);

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
           
        <?php      }}
        else if($result-> num_rows ==0 && $search==1){
            
            echo "<table><tr><td>You haven't added any items yet.</td></tr></table>";
        }
        else{
            $search=$_POST['search'];
             $sql = "SELECT * from food where `name`='$search' and `updated_by`='$session_reg_id'"; // where `verified`='1' AND `status`='1'";
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
                                <h2><?php echo $row["name"];?></h2>
                                <p> <?php echo " By: ".$row1["username"];?></p>
                                <p> <?php echo $row["location"];?></p>
                            </div>
                                    <div class="buy"><a><i class="fa fa-eye" aria-hidden="true"></i></a>
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

        }       ?>
            <!-- end -->
        </div>

    </div>
    <script src="js/index1.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="js/datetime.js"></script>

</body>

</html>