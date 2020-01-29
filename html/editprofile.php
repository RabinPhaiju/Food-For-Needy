<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>User Login</title>
</head>

<body>
    <div class="navbars">
        <div class="nav0">
            <a href="../index.html"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
        </div>
        <div class="navbars1">
            <div class="nav3"><i class="fa fa-user fa-3x" aria-hidden="true"></i>
                <div class="middle">
                    <div class="menu">
                        <li class="item" id='profile'>
                            <a href="#profile" class="btn"><i class="far fa-user"></i>Profile</a>
                            <div class="smenu">
                                <a href="post.php">Posts</a>
                                <a href="#">Edit Profile</a>
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
        <div class="sidemenu">
            <ul>
                <!-- <li><a href="#"><span class="icon"><i class="fa fa-tachometer"></i></span><span></span></a></li> -->

                <div class="me userBg">
                    <div class="image"></div>

                    <div class="myinfo">
                        <p class="name">Name</p>
                        <p class="phone">Email</p>
                    </div>

                    <button class="setting">
                        <a href="#"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    </button>
                    <a id="hide" href="#" onclick="closeNav()"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a id="show" href="#" onclick="openNav()"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <button class="cloud">
                        <a href="index.html">DashBoard</a>
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
                                    <figure>
                                        <img src="http://i2.imgbus.com/doimg/5co1mm5on9b50e7.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="profile-details">
                                    <!-- <h2>Contact</h2>
                                    <ul>
                                        <li><i class="fa fa-tasks"></i> Business development</li>
                                        <li><i class="fa fa-users"></i> DHL</li>
                                        <li><i class="fa fa-phone"></i> 00971 12345678</li>
                                        <li><i class="fa fa-envelope"></i> joedoe@gmail.com</li>
                                    </ul> -->
                                    <img  src="../files/mother.jpg" width="200">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-block">
                                    <header class="profile-header">
                                        <h2><i class="fa fa-user"></i> Information</h2>
                                        <ul class="actions">
                                            <li class="dropdown">
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        <a data-profile-action="edit" href="#">Edit</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="profile-body">
                                        <div class="profile-view">
                                            <dl class="dl-horizontal">
                                                <dt>Full Name</dt>
                                                <dd>Joe Doe</dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Role</dt>
                                                <dd>Business development</dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Client Associated</dt>
                                                <dd>DHL</dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Phone</dt>
                                                <dd>00971 12345678</dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Email</dt>
                                                <dd>joedoe@gmail.com</dd>
                                            </dl>
                                        </div>

                                        <div class="profile-edit">
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Full Name</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" placeholder="eg. Joe Doe">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Role</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <select class="form-control">
                                                                          <option>Business development</option>
                                                                          <option>Business Analyst</option>
                                                                          <option>Operations Manager</option>
                                                                      </select>
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Client Associated</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <select class="form-control">
                                                                          <option>DHL</option>
                                                                          <option>Pepsico</option>
                                                                          <option>Addidas</option>
                                                                          <option>Nike</option>
                                                                      </select>
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Phone</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" placeholder="eg. 00971 12345678">
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt class="p-10">Email</dt>
                                                <dd>
                                                    <div class="fg-line">
                                                        <input type="text" class="form-control" placeholder="eg. 00971 12345678">
                                                    </div>
                                                </dd>
                                            </dl>

                                            <div class="m-t-30">
                                                <button class="btn btn-primary btn-sm waves-effect">Save</button>
                                                <button data-profile-action="reset" class="btn-link btn-cancel">Cancel</button>
                                            </div>
                                        </div>
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

</body>

</html>