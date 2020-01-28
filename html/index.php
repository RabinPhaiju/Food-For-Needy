<?php
$search=1;

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
    <link rel="stylesheet" href="../css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/indexsearch.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="css/card.css">

    <title>User Login</title>
</head>

<body>
    <div class="navbar">
        <div class="nav0">
            <a href="../index.html"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
        </div>
        <div class="navbar1">
            <div class="nav3"><i class="fa fa-user fa-2x" aria-hidden="true"></i>
                <div class="middle">
                    <div class="menu">
                        <li class="item" id='profile'>
                            <a href="#profile" class="btn"><i class="far fa-user"></i>Profile</a>
                            <div class="smenu">
                                <a href="post.php">Posts</a>
                                <a href="editprofile.php">Edit Profile</a>
                            </div>
                        </li>

                        <li class="item" id="messages">
                            <a href="#messages" class="btn"><i class="far fa-envelope"></i>Messages</a>
                            <div class="smenu">
                                <a href="#">new</a>
                                <a href="#">Sent</a>
                            </div>
                        </li>

                        <li class="item" id="settings">
                            <a href="#settings" class="btn"><i class="fas fa-cog"></i>Settings</a>
                            <div class="smenu">
                                <a href="#">Password</a>
                            </div>
                        </li>

                        <li class="item">
                            <a class="btn" href="../index.html"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="nav4"><a href="">CONTACT US</a></div>

            <div class="nav2"><a href="login.php">JOIN US</a></div>

            <div class="nav1"><a href="">DONATE</a></div>
        </div>


    </div>
    <div class="body_wrapper">
        <div class="sidemenu" id="mySidebar">
            <ul>
                <!-- <li><a href="#"><span class="icon"><i class="fa fa-tachometer"></i></span><span></span></a></li> -->

                <div class="me userBg">
                    <div class="image"></div>

                    <div class="myinfo">
                        <p class="name">Name</p>
                        <p class="phone">Email</p>
                    </div>

                    <button class="setting">
                        <a href="editprofile.php"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    </button>
                    <a id="hide" href="#" onclick="closeNav()"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a id="show" href="#" onclick="openNav()"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>

                    <button class="cloud">
                        <a href="index.php">DashBoard</a>
                    </button>
                </div>

                <!-- <li><a href="#"><span class="icon"><i class="fa fa-compass"></i></span><span>Brand</span></a></li> -->
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Profile</span></a>
                    <ul>
                        <li><a href="post.php"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Post</span></a></li>
                        <li class=""><a href="editprofile.php"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Edit Profile</span></a></li>
                    </ul>
                </li>
                <li class="dropdown active">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Food List</span></a>
                    <ul>
                        <li><a href="addfood.php"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Add to List</span></a></li>
                        <li class="active_child"><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Your List</span></a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Sub-Category</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Add</span></a></li>
                        <li class=""><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>List</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span class="icon"><i class="fa fa-window-restore"></i></span><span>Product</span></a>
                    <ul>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>Add</span></a></li>
                        <li><a href="#"><span class="icon"><i class="fa fa-sticky-note-o"></i></span><span>List</span></a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="icon"><i class="fa fa-compass"></i></span><span>Records</span></a></li>
                <li><a href="calender.php"><span class="icon"><i class="fa fa-calendar"></i></span><span>Calender</span></a></li>

            </ul>
        </div>

        <form action="index.php" method="POST">
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
   
    $sql = "SELECT * from food";// where `verified`='1' AND `status`='1'";
    require_once("DBConnect.php");
	$result = $conn-> query($sql);

	if($result-> num_rows >0 && $search==1){
		while($row = $result-> fetch_assoc()){   ?>

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
                                <p> <?php echo $row["updated_by"];?></p>
                                <p> <?php echo $row["location"];?></p>
                            </div>
                            <div class="buy"><i class="fa fa-eye" aria-hidden="true"></i>
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
                                <th><?php echo $row["quantity"];?></th>
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
           
        <?php      }}else{
            $search=$_POST['search'];
             $sql = "SELECT * from food where `name`='$search'"; // where `verified`='1' AND `status`='1'";
             require_once("DBConnect.php");
             $result = $conn-> query($sql);
             if($result-> num_rows >0 && $search==0){
                while($row = $result-> fetch_assoc()){   ?>
        
                    <div class="wrapper">
                        <div class="container">
                            <div class="top">
                              <?php  $filepath="files/".$row["pic"];?>
                                <img src="<?php echo $filepath; ?>" >
                            </div>
                            <div class="bottom">
                                <div class="left">
                                    <div class="details">
                                        <h1><?php echo $row["name"];?></h1>
                                        <p> <?php echo $row["updated_by"];?></p>
                                        <p> <?php echo $row["location"];?></p>
                                    </div>
                                    <div class="buy"><i class="fa fa-eye" aria-hidden="true"></i>
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
                                        <th><?php echo $row["quantity"];?></th>
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
</body>

</html>