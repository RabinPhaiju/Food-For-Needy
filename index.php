<?php
    if(isset($_POST['contact'])){
        $a = $_POST['name'];
        $b = $_POST['email'];
        $c = $_POST['message'];

    $sql = "INSERT INTO contact (`name`,`email`,`message`) VALUES ('$a', '$b', '$c')";
	//echo $sql;
	require_once('html/DBConnect.php');
	mysqli_query($conn, $sql);
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="icon" href="html/files/mainlogo.jpg" type="image/gif" sizes="16x16">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food For Needy</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/nprogress/nprogress.css" rel="stylesheet">

        <link rel="stylesheet" href="css/botton.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/navbar-mobile.css">
        <link rel="stylesheet" href="css/third.css">
        <link rel="stylesheet" href="css/fourth.css">
        <link rel="stylesheet" href="css/fifth.css">
        <link rel="stylesheet" href="css/sixth.css">
        <link rel="stylesheet" href="css/seventh.css">
        <link rel="stylesheet" href="css/eighth.css">
        <link rel="stylesheet" href="css/ninth.css">
        <link rel="stylesheet" href="css/tenth.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/tojoin.css">
        <link rel="stylesheet" href="css/scrollup.css">
        <link rel="stylesheet" href="css/donorslider.css">
        <link rel="stylesheet" href="css/heroslider.css">
        <link rel="stylesheet" href="css/D-R-DCounts.css">
        <link rel="stylesheet" href="css/parallax.css">
        <link rel="stylesheet" href="css/newnavs.css">
        <link rel="stylesheet" href="css/testimonials.css">


        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <style>
            html {
                scroll-behavior: smooth;
            }
            
            .hero-card img {
                display: block;
                margin-left: auto;
                margin-right: auto;
                border-radius: 8px;
                height: 20rem;
                width: 20rem
            }
            
            @media (min-width: 1200px) {
                .container {
                    max-width: 100%;
                }
            }
            
            @media (min-width: 992px) {
                .container {
                    max-width: 100%;
                }
            }
            
            @media (min-width: 768px) {
                .container {
                    max-width: 100%;
                }
            }
            
            @media (min-width: 576px) {
                .container {
                    max-width: 100%;
                }
            }
            
            p {
                margin-bottom: 2rem;
            }
            
            h2 {
                margin-top: 5px;
            }
            
            .size-pos {
                margin-left: 2%;
                height: 400px;
                width: 96%;
            }
            
            #nprogress .bar {
                height: 4px;
            }
            
            #nprogress .bar {
                background: rgb(21, 128, 7);
            }
            
            #nprogress .spinner-icon {
                border-top-color: white;
                border-left-color: orange;
            }
        </style>
    </head>

    <body onload="test()">
        <!-- page loader undo the comment when finish -->

        <div class="loader_bg" style="margin-top:-4.1rem;z-index:99">
            <div class="load">
                <hr/>
                <hr/>
                <hr/>
                <hr/>
            </div>
        </div>


        <nav class="navbar navbar-expand-lg navbar-mainbg">
            <img src="files/mainlogo.jpg" style="margin-left:60px;border-radius:50%" alt="logo" height="50px">
            <a class="navbar-brand navbar-logo" href="#"><strong style="margin-left:10px;">Food for Needy</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars text-white"></i>
    </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <div class="hori-selector">
                        <div class="left"></div>
                        <div class="right"></div>
                    </div>
                    <li class="nav-item active">
                        <a class="nav-link" href="#home"><i class="fas fa-home"></i>Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus"><i class="far fa-clone"></i>About US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactform"><i class="far fa-address-book"></i>Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="html/login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">&nbsp&nbsp&nbsp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">&nbsp&nbsp&nbsp</a>
                    </li>

                </ul>
            </div>
        </nav>
        <div id="home" style="margin: -4px 0">
            .
        </div>
        <div class="container">

            <div class="third">
                <div class="image">
                    <div class="whoweare">
                        <p class="briefHead">
                            Who <span style="color: hsl(34, 100%, 60%);">We</span><br> Are
                        </p>
                        <p class="brief">
                            <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='brief'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                        </p>
                        <button>
                        <a href="#aboutus"><strong>More Info</strong> &nbsp; <i class="fa fa-arrow-right"></i></a>
                        </button>
                    </div>
                </div>
            </div>

            <div class="scrollup" id="up">
                <a href="#">
                    <i class="fa fa-arrow-up fa-2x"></i>
                </a>
            </div>

            <div class="fourth">
                <div class="ourStory">
                    <p class="storyHead">What We <span style="color: hsl(34, 100%, 60%);">Do</span></p>
                    <p class="story">

                        <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='story'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                    </p>

                    <div class="hidepart" id="hidepart">
                        <button class="hides" onclick="show();">
                            <a href="#0">More Info &nbsp; <i class="fa fa-arrow-right"></i></a>
                        </button>
                    </div>

                    <div class="showpart" id="showpart">
                        <button class="shows" onclick="hide();">
                            <a href="#0" onclick="hide();"><strong> Hide</strong> &nbsp; <i class="fa fa-arrow-up"></i></a>
                        </button>
                        <br>
                        <br>
                        <p class="hideWhoweare">
                            <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='hideWhoweare'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                        </p>
                        <ul class="hideWhoweare" type="disc">
                            <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='disc'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                        </ul>
                        <br>
                        <p class="hideWhoweare">
                            <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='hideWhoweare1'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                        </p>
                    </div>
                </div>
                <div class="choice" id="choice">
                    <div class="donor">
                        <i class="fa fa-dropbox fa-4x" id="iconpart"></i>
                        <p class="choicetitle">Make <span style="color: hsl(34, 100%, 60%);">Donation</span></p>
                        <p class="choicetext">
                            <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='donation'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                        </p>
                    </div>
                    <div class="volunteer">
                        <i class="fa fa-vimeo fa-4x" id="iconpart"></i>
                        <p class="choicetitle">Become A <span style="color: hsl(34, 100%, 60%);">Volunteer</span></p>
                        <p class="choicetext">
                            <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='volunteer'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                        </p>
                    </div>
                    <div class="distributor">
                        <i class="fa fa-users fa-4x" id="iconpart"></i>
                        <p class="choicetitle">Become A <span style="color: hsl(34, 100%, 60%);">Distributor</span></p>
                        <p class="choicetext">
                            <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='distributor'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="fifth">
                <div class="schedule">
                    <?php
                    $sql = "SELECT * from `schedule`";// where `verified`='1' AND `status`='1'";
                            
                    require_once("html/DBConnect.php");
                    $result = $conn-> query($sql);
                    $total = mysqli_num_rows($result);
                    ?>
                        <p class="scheduletitle">
                            <?php if ($total ==0){echo "Become a Sponser";}else{ echo 'Schedule';}?>
                        </p>
                </div>

                <section class="cd-horizontal-timeline">
                    <?php if($total !=0){ ?>
                    <div class="timeline">
                        <div class="events-wrapper">
                            <div class="events">
                                <ol>
                                    <?php
                            $sql = "SELECT * from `schedule`";// where `verified`='1' AND `status`='1'";
                            
                            require_once("html/DBConnect.php");
                            $result = $conn-> query($sql);
                            $total = mysqli_num_rows($result);
                            $schedule_count=1;
                            $schedule_date;

                            if($result-> num_rows >0 && $total>0){
                                while($row = $result-> fetch_assoc()){  
                                    $schedule_date=strtotime($row['date']);
                            ?>

                                        <li><a href="#0" data-date="<?=date('d', $schedule_date);?>/<?=date('m', $schedule_date);?>/<?=date('Y', $schedule_date);?>" <?php if($schedule_count==1){echo 'class="selected"';}?>>
                                    <?php echo date('d', $schedule_date); echo " "; echo date('M', $schedule_date);?></a></li>
                                        <?php 
                                    $schedule_count++;
                                }
                            
                                }?>


                                </ol>
                                <span class="filling-line" aria-hidden="true"></span>
                            </div>
                            <!-- .events -->
                        </div>
                        <!-- .events-wrapper -->

                        <ul class="cd-timeline-navigation">
                            <li><a href="#0" class="prev inactive"><i class="fas fa-angle-right fa-3x"></i></a></li>
                            <li><a href="#0" class="next"><i class="fas fa-angle-right fa-3x"></i></a></li>
                        </ul>
                        <!-- .cd-timeline-navigation -->
                    </div>
                    <!-- .timeline -->
                    <?php } ?>
                    <div class="events-content">
                        <ol>
                            <?php
                        $sql = "SELECT * from `schedule`";// where `verified`='1' AND `status`='1'";
                            
                            require_once("html/DBConnect.php");
                            $result = $conn-> query($sql);
                            $total = mysqli_num_rows($result);
                            $schedule_count=0;
                            $schedule_date;

                            if($result-> num_rows >0){?>
                                <ol>
                                    <?php
                                while($row = $result-> fetch_assoc()){  
                                    $schedule_count++;
                                    $schedule_date=strtotime($row['date']); 
                            ?>
                                        <li data-date="<?=date('d', $schedule_date);?>/<?=date('m', $schedule_date);?>/<?=date('Y', $schedule_date);?>" <?php if($schedule_count==1){echo 'class="selected"';}?>>
                                            <h2 style="margin-top:10px">
                                                <?php echo $row['title'];?>
                                            </h2>
                                            <em><?php 
                                            $post_date=strtotime($row['date']); 
                                            echo date('d', $post_date); echo " ";
                                 echo date('M', $post_date);
                                ?>
                                 <?php echo " "; echo date('Y', $post_date);?>
                                 </em>
                                            <p>
                                                <?php echo $row['description'];?>
                                                
                                                <br><br>Location : <?php echo $row['location'];?>
                                                <br>Date : <?php echo $row ['day']?>, <?php echo $row['date']?> 
                                                
                                                <br>Time : <?php 
                                                $time_start = $row['start_time'];
                                                if($time_start <= "12:00:00")
                                                    {echo date("h",strtotime($time_start));
                                                    echo(":");
                                                    echo date("i",strtotime($time_start));
                                                    echo('am');}
                                                else{echo date("h",strtotime($time_start));
                                                    echo(":");
                                                    echo date("i",strtotime($time_start));
                                                    echo('pm');}
                                                ?> - 
                                                <?php 
                                                $time_end = $row['end_time'];
                                                if($time_end <= "12:00:00")
                                                    {echo date("h",strtotime($time_end));
                                                    echo(":");
                                                    echo date("i",strtotime($time_end));  
                                                    echo('am');}
                                                else{echo date("h",strtotime($time_end));
                                                    echo(":");
                                                    echo date("i",strtotime($time_end));echo('pm');}
                                                ?>
                                                
                                            </p>
                                        </li>
                                        <?php }} ?>

                                </ol>
                    </div>
                    <!-- .events-content -->
                </section>

                <div class="schedule1">
                    <div class="box">
                        <p class="scheduletext">
                            <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='scheduletext'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                        </p>
                        <button>
                            <a href="#">More Info &nbsp; <i class="fa fa-arrow-right"></i></a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="sixth" id="aboutus">
                <div class="aboutus">
                    <p class="abouthead">About <span style="color: hsl(34, 100%, 60%);">Us</span></p>
                    <p class="text">
                        <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='aboutus'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                    </p>
                </div>
                <div class="aboutus2">
                    <p class="text">
                        <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='aboutus2'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                    </p>
                </div>
            </div>

            <!-- <div class="parallax1">
                   <p data-aos="zoom-in-down" data-aos-duration="2000" >
                       " <span class="parallax-text">THE BEST </span><br>
                       AMONG THOSE YOU ARE THOSE<br>
                       WHO BRING GREATEST BENEFITS<br>
                       TO MANY OTHERS. "
                    </p>
            </div> -->
            
            <br>

            <div class ="donorslider">
                <div class="carousel-1">
                    <div class="card-carousel-1">
                        <?php
                                $sql = "SELECT * from `register` WHERE `user_type`='Donator'";// where `verified`='1' AND `status`='1'";
                                    require_once("html/DBConnect.php");
                                    $result = $conn-> query($sql);
                                    $total = mysqli_num_rows($result);
                                    $hero_count =0;

                                if($result-> num_rows >0){
                                while($row = $result-> fetch_assoc()){  
                                  $filepath="html/files/".$row["pic"];
                                  if($row["pic"]!=null){
                            ?>
                            <div class="my-card hero-card" id="1"><img src="<?php echo $filepath; ?>"></div>
                            <?php 
                                $hero_count++;
                            if($hero_count==10){
                            break;
                            }
                            }}} ?>

                    </div>
                </div>
                <div class="donortitle">
                    <p>Food <br>Rescue <br><span style="color: hsl(34, 100%, 60%);">Donor</span></p>
                </div>
            </div>

            <br>

            <div class="heroslider">
                <div class="herotitle">
                    <p>Food <br>Rescue <br><span style="color: hsl(34, 100%, 60%);">Volunteer</span></p>
                </div>
                
                <div class="carousel">
                    <div class="card-carousel">
                        <?php
                                $sql = "SELECT * from `register` WHERE `user_type`='Volunteer'";// where `verified`='1' AND `status`='1'";
                                    require_once("html/DBConnect.php");
                                    $result = $conn-> query($sql);
                                    $total = mysqli_num_rows($result);
                                    $hero_count =0;

                                if($result-> num_rows >0){
                                while($row = $result-> fetch_assoc()){  
                                  $filepath="html/files/".$row["pic"];
                                  if($row["pic"]!=null){
                            ?>
                            <div class="my-card hero-card" id="1"><img src="<?php echo $filepath; ?>"></div>
                            <?php 
                                $hero_count++;
                            if($hero_count==10){
                            break;
                            }
                            }}} ?>

                    </div>
                </div>
            </div>

            <div class="D-R-D-Counts">
                <?php 
                  $sql = "SELECT * from `food`";// where `verified`='1' AND `status`='1'";
                  require_once("html/DBConnect.php");
                  $resulttotal = $conn-> query($sql);
                  $total = mysqli_num_rows($resulttotal);
                ?>
                <div class="FoodRescued" data-aos="fade-up" data-aos-duration="2000">
                    <p>No of Donated Food</p>
                    <h4 style="color:black">
                        <?php echo $total;?>
                    </h4>
                </div>
                <?php 
                  $sql = "SELECT * from `register` where `user_type`='Donor' || `user_type`='Donator'";// where `verified`='1' AND `status`='1'";
                  require_once("html/DBConnect.php");
                  $resulttotal = $conn-> query($sql);
                  $total = mysqli_num_rows($resulttotal);
                ?>
                <div class="NoOfUser" data-aos="fade-up" data-aos-duration="2000">
                    <p>No of Donor</p>
                    <h4 style="color:black">
                        <?php echo $total;?>
                    </h4>
                </div>
                <?php 
                  $sql = "SELECT * from `register` where `user_type`='Volunteer'";// where `verified`='1' AND `status`='1'";
                  require_once("html/DBConnect.php");
                  $resulttotal = $conn-> query($sql);
                  $total = mysqli_num_rows($resulttotal);
                ?>
                <div class="MealServed" data-aos="fade-up" data-aos-duration="2000">
                    <p>No of Volunteer</p>
                    <h4 style="color:black">
                        <?php echo $total;?>
                    </h4>
                </div>
            </div>

            <div class="tojoin">
                <div class="box">
                    <p class="no1">Become a Volunteer</p>
                    <p class="no2">Be a part of a team to make a real difference</p>
                    <button>
                        <a href="html/login.php">Join In &nbsp; <i class="fa fa-arrow-right"></i></a>
                    </button>
                </div>
            </div>

            <div class="testimonial-container">
                <h2>Testimonials</h2>
                <br>
                <div class="dk-container">
                    <div class="cd-testimonials-wrapper cd-container">
                        <ul class="cd-testimonials">
                            <li>
                                <div class="testimonial-content">
                                    <p><i class="fa fa-quote-left"></i> If you can't feed a hundred people, then feed just one. <i class="fa fa-quote-right"></i></p>
                                    <div class="cd-author">
                                        <img src="files/mother.jpg" alt="Author image">
                                        <ul class="cd-author-info">
                                            <li><strong>Mother Teresa</strong><br><span>Source Google</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-content">
                                    <p><i class="fa fa-quote-left"></i> What you do makes a difference, and you have to decide what kind of difference you want to make. <i class="fa fa-quote-right"></i></p>
                                    <div class="cd-author">
                                        <img src="files/jane.jpg" alt="Author image">
                                        <ul class="cd-author-info">
                                            <li><strong>Jane Goodall</strong><br><span>Source google</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial-content">
                                    <p><i class="fa fa-quote-left"></i>Sharing food with another human being is an intimate act that should not be indulged in lightly.<i class="fa fa-quote-right"></i></p>
                                    <div class="cd-author">
                                        <img src="files/fisher.jpg" alt="Author image">
                                        <ul class="cd-author-info">
                                            <li><strong>M.F.K.Fishers</strong><br><span>Source Google</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="seventh">
                <p>Our <span style="color: hsl(34, 100%, 60%);">Supporter</span></p>
                <div class="logo">
                    <div class="image1"></div>
                    <div class="image2"></div>
                    <div class="image3"></div>
                    <div class="image4"></div>
                    <div class="image5"></div>
                </div>
            </div>

            <div class="eighth">
                <div class="getintouch">
                    <p class="contactHead">Get in <span style="color: hsl(34, 100%, 60%);">Touch</span></p>
                    <p>
                        <?php  require_once("html/DBConnect.php");
                                $sql = "SELECT * FROM `content` WHERE `title`='getintouch'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                        echo $row["description"];?>
                    </p>
                    <br>
                    <ul>
                        <li>&nbsp;&nbsp;<i class="fa fa-mobile fa-2x"></i> &nbsp;&nbsp;&nbsp;<span style="font-size: 20px;">:</span>&nbsp;&nbsp;+977-9823652307, 01-5543901</li>
                        <br>
                        <li><a href=""><span style="font-size: 30px; font-weight: 600;">@</span>&nbsp;&nbsp;<span style="font-size: 20px;">:</span>&nbsp;&nbsp;foodforneedy@gmail.com</a></li>
                        <br>
                        <li>&nbsp;<i class="fa fa-map-marker fa-2x"></i> &nbsp;&nbsp;&nbsp;<span style="font-size: 20px;">:</span>&nbsp;&nbsp;Bhaktapur - 10, Nepal</li>
                    </ul>
                </div>

                <div class="contactform" id="contactform">
                    <form action="index.php" method="POST">
                        <input type="text" name="name" placeholder="Enter Your Name" required>
                        <br>
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                        <br>
                        <textarea name="message" id="message" rows="4" placeholder="Enter Your Message" required></textarea>
                        <br><br>
                        <button type="submit" name="contact"> Send Message</button>
                    </form>
                </div>
            </div>

            <iframe class="size-pos" src="html/Map.php"></iframe>

            <div class="tenth">
                <hr>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook fa-1x"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram fa-1x"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter fa-1x"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
                <p>Copyright &copy; 2020 All rights reserved by InNeed.</p>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        setTimeout(function() {
            $('.loader_bg').fadeToggle();
        }, 500);


        window.addEventListener("scroll", function() {
            let menu = document.getElementById('second');
            if (window.pageYOffset > 105) {
                menu.classList.add("cus-nav");
            } else {
                menu.classList.remove("cus-nav");
            }
        });

        window.addEventListener("scroll", function() {
            let up = document.getElementById('up');
            if (window.pageYOffset > 130) {
                up.style.display = "block";
            } else {
                up.style.display = "none";
            }
        })
    </script>

    <script src="js/mobileMenu.js"></script>
    <script src=" https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/timeline.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.1/jquery.flexslider.min.js"></script>
    <script src="js/testimonials.js"></script>
    <script src="css/nprogress/nprogress.js"></script>

    <script>
        // ---------Responsive-navbar-active-animation-----------
        function test() {
            var tabsNewAnim = $("#navbarSupportedContent");
            var selectorNewAnim = $("#navbarSupportedContent").find("li").length;
            var activeItemNewAnim = tabsNewAnim.find(".active");
            var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
            var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
            var itemPosNewAnimTop = activeItemNewAnim.position();
            var itemPosNewAnimLeft = activeItemNewAnim.position();
            $(".hori-selector").css({
                top: itemPosNewAnimTop.top + "px",
                left: itemPosNewAnimLeft.left + "px",
                height: activeWidthNewAnimHeight + "px",
                width: activeWidthNewAnimWidth + "px"
            });
            $("#navbarSupportedContent").on("click", "li", function(e) {
                $("#navbarSupportedContent ul li").removeClass("active");
                $(this).addClass("active");
                var activeWidthNewAnimHeight = $(this).innerHeight();
                var activeWidthNewAnimWidth = $(this).innerWidth();
                var itemPosNewAnimTop = $(this).position();
                var itemPosNewAnimLeft = $(this).position();
                $(".hori-selector").css({
                    top: itemPosNewAnimTop.top + "px",
                    left: itemPosNewAnimLeft.left + "px",
                    height: activeWidthNewAnimHeight + "px",
                    width: activeWidthNewAnimWidth + "px"
                });
            });
        }
        $(document).ready(function() {
            setTimeout(function() {
                test();
            });
        });
        $(window).on("resize", function() {
            setTimeout(function() {
                test();
            }, 500);
        });
        $(".navbar-toggler").click(function() {
            setTimeout(function() {
                test();
            });
        });
        NProgress.start(); // start    
        NProgress.set(0.8); // To set a progress percentage, call .set(n), where n is a number between 0..1
        NProgress.inc(); // To increment the progress bar, just use .inc(). This increments it with a random amount. This will never get to 100%: use it for every image load (or similar).If you want to increment by a specific value, you can pass that as a parameter
        NProgress.configure({
            ease: 'ease',
            speed: 1000
        }); // Adjust animation settings using easing (a CSS easing string) and speed (in ms). (default: ease and 200)
        NProgress.configure({
            trickleSpeed: 100
        }); //Adjust how often to trickle/increment, in ms.
        NProgress.configure({
            showSpinner: true
        }); //Turn off loading spinner by setting it to false. (default: true)
        NProgress.configure({
            parent: '#container'
        }); //specify this to change the parent container. (default: body)
        NProgress.done(); // end
    </script>
    <script src="js/hideandshow.js"></script>

    </html>