<?php
include 'session.php';
$pos=0;
$pos=@$_GET['pos'];
$error=null;
if (isset($_POST['submit'])) {
    $a = $_SESSION['username'];
    $c = $_POST['location'];
    $d = $_POST['start_time'];
    $e = $_POST['end_time'];
    $f = $_POST['date'];
    $g = $_POST['tittle'];
    $h = $_POST['description'];

    $to_time = strtotime($e);
    $from_time = strtotime($d);
    $total_time=round(abs($to_time - $from_time) / 60,2);
    // echo $total_time;

    // $now_date=time();
    $your_date=strtotime($f);
    // $datediff = $your_date - $now_date;
    // $cal_date=round($datediff / (60 * 60 * 24));
    // echo $cal_date;

    // if($cal_date<0 || $cal_date>6){
    //     $error="Date must be for next 7 days";
    //     // echo $error;
    // }else 
    
    if($total_time>300){
        $error="Duration cannot be more than 5 hours";
     }else if($d<"08:59:59" || $e>"18:00:01" || $e<"08:59:59" || $d>"18:00:01"){
        $error="Time must be greater than 9 AM and less than 6PM";
     }
    else{
    $b = date('l', $your_date);
    // echo $b;
    
    require_once("DBConnect.php");
      $sql="INSERT INTO `schedule` (`updated_by`,`day`,`start_time`,`end_time`,`date`,`title`,`description`,`location`) VALUES ('$a','$b','$d','$e','$f','$g','$h','$c')";
      if(mysqli_query($conn, $sql)){
                require_once("DBConnect.php");
                $des=$_SESSION['username']." schedule at ".$c." in ".$b." from ".$d." to ".$e." title: ".$g;
                $sql2="INSERT INTO `records` (`description`,`reg_id`) VALUES ('$des',0)";
                //   echo "first";
                if(mysqli_query($conn, $sql2)){
                //   echo "done";
                }
                else {
                echo "Error updating record: " . mysqli_error($conn);
                }
        // echo "<script>window.location='schedule.php';</script>";
      }
      else {
        echo "Error updating record: " . mysqli_error($conn);
        }
    }
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
    <link rel="stylesheet" href="css/schedule.css">
    <link rel="stylesheet" href="css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/datetime.css">
    <link rel="stylesheet" href="css/toast.css">
    <style>
    .plus {
        margin-left:30px;
        color:#4286f4; 
    }
.tooltiptext {
  display:none;
  width: 100px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 3px 0;
  size:0.8rem;
  position: absolute;
  z-index: 1;
}

.plus:hover .tooltiptext {
  display:inline;
}
.btnss{
            transition: all .4s;
            position: relative;
        }
        .btnss:hover{
            transform: translateY(-2px);
            box-shadow: 0 10p 20px rgba(0,0,0,0.6);
        }
        .btnss:active{
            transform: translateY(-1px);
            box-shadow: 0 10p 20px rgba(0,0,0,0.6);
        }
    </style>
    
    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>Schedule</title>
   </head>

<body onload=toast();>
<?php include 'navbar1.html';?>
    <div class="body_wrapper">
    <?php include 'navbar2.html';?>

        <div class="container">
            <div class="col-md-9 col-sm-10 contains">
                <div class="panel profile-panel">
                <div class="container">
                    <h3 style="margin:20px 0 -20px 100px;">Schedule
                    <a class="plus class="btn btn-success data-toggle="modal" data-target="#popUpWindow" href="#"><i class="fa fa-plus fa-2x btnss" aria-hidden="true"></i>
                    <span class="tooltiptext">Add</span></a>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <?php
                    if($pos>0){?>
                        <a href="schedule.php?pos=<?php echo $pos-1;?>" style="color:black"><i class="fa fa-caret-square-o-left btnss" aria-hidden="true"></i><a>
                <?php    }else{?>
                    <a href="#"><i class="fa fa-caret-square-o-left btnss" aria-hidden="true"></i><a>
              <?php  }
                    ?>
                    
                    <?php
                    $currentWeekNumber = date('W');
                    $pos_check=0;
                    if($pos!=0){
                        while($pos_check!=$pos){
                            $currentWeekNumber++;
                            if($currentWeekNumber>52){
                                $currentWeekNumber=1;
                            }
                            $pos_check++;
                        }
                    }
                    
                    echo '<a style="color:black">Week :'.$currentWeekNumber.'</a>';
                    ?>
                    <a href="schedule.php?pos=<?php echo $pos+1;?>" style="color:black"><i class="fa fa-caret-square-o-right btnss" aria-hidden="true"></i></a>
                    </h3>

                    <!-- <div id="snackbar">Click Plus to add new Schedule</div>  -->
                    <div id="snackbar"><?php if($error!=null){?><p style="color:red;"><?php echo $error;?></p> <?php }else{echo "Click Plus to add new Schedule";} ?></div>    
                      

                        <div class="modal fade" id="popUpWindow">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- header -->
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">Login Form</h3>
                                </div>
                                <!-- body -->
                                <div class="modal-header">
                                                <form role="form" action="schedule.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group"> 
                                                            <label for="Location">Choose a Location:</label>
                                                            <select class="form-control" name="location">
                                                                <option value="Bhaktapur">Bhaktapur</option>
                                                                <option value="Kathmandu">Kathmandu</option>
                                                                <option value="Lalitpur">Lalitpur</option>
                                                            </select> 
                                                            <br>
                                                            <label for="Starting time">Starting time: (9 AM to 6 PM)</label>
                                                    <input type="time" class="form-control" name="start_time" required/>
                                                             <label for="Ending time">Ending time: (9 AM to 6 PM)</label>
                                                    <input type="time" class="form-control" name="end_time" required/>
                                                            <label for="date">Date:</label>
                                                    <input type="date" class="form-control" name="date" required/>
                                                    <br>
                                                    <label for="Tittle">Tittle:</label>
                                                    <input type="text" class="form-control" placeholder="Enter tittle" name="tittle" required/>
                                                    <br>
                                                    <label for="description">Description:</label>
                                                    <textarea name="description" class="form-control" rows="4" cols="50">Enter Schedule description.</textarea>                                                   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" name="submit" value="Add" class="btn btn-primary btn-block"/>
                                                    </div>
                                                 </form>
                                </div>   
                            </div>
                            </div>
                        </div>
                        
                        </div> 
                  <!-- panel body -->
                   
    <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
        <div class="cd-schedule__timeline">
            <ul>
                <li><span>09:00</span></li>
                <li><span>09:30</span></li>
                <li><span>10:00</span></li>
                <li><span>10:30</span></li>
                <li><span>11:00</span></li>
                <li><span>11:30</span></li>
                <li><span>12:00</span></li>
                <li><span>12:30</span></li>
                <li><span>13:00</span></li>
                <li><span>13:30</span></li>
                <li><span>14:00</span></li>
                <li><span>14:30</span></li>
                <li><span>15:00</span></li>
                <li><span>15:30</span></li>
                <li><span>16:00</span></li>
                <li><span>16:30</span></li>
                <li><span>17:00</span></li>
                <li><span>17:30</span></li>
                <li><span>18:00</span></li>
            </ul>
        </div>
        <!-- .cd-schedule__timeline -->

        <div class="cd-schedule__events">
            <ul>
            <?php 
            $mydate=getdate(date("U"));
            $today_day=$mydate['weekday'];
            
            // $today_day="Friday";
            if($today_day=="Sunday"){
                $weeks = array("Sunday", "Monday", "Tuesday","Wednesday","Thursday","Friday","Saturday");
            }else if($today_day=="Monday"){
                $weeks = array("Monday", "Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
            }else if($today_day=="Tuesday"){
                $weeks = array("Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday","Monday");
            }else if($today_day=="Wednesday"){
                $weeks = array("Wednesday","Thursday","Friday","Saturday","Sunday","Monday","Tuesday");
            }else if($today_day=="Thursday"){
                $weeks = array("Thursday","Friday","Saturday","Sunday","Monday","Tuesday","Wednesday");
            }else if($today_day=="Friday"){
                $weeks = array("Friday","Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday");
            }else{
                $weeks = array("Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday");
            }


            $inc_date=0;
            if($pos!=0){
                $inc_date=$pos*7;
            }
            
            $i=0;
            while($i!=7){
                $today_time = date("Y-m-d", strtotime("$inc_date days"));
                //  echo $today_time;
                ?>
                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span><?php echo "&nbsp&nbsp&nbsp".$weeks[$i]."<br>".$today_time;?></span></div>
                    <ul>
                    <?php 
                $sql="SELECT * FROM `schedule` WHERE `date`='$today_time' and `day`='$weeks[$i]' ";
                require_once("DBConnect.php");
	            $result = $conn-> query($sql);
	            if($result-> num_rows >0){
                    while($row = $result-> fetch_assoc()){ 
                         ?>
                        <li class="cd-schedule__event">
                            <a data-start="<?=$row["start_time"]?>" data-end="<?=$row["end_time"]?>" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name"><?=$row["title"]?></em>
                                <em class="cd-schedule__content"><?=$row["description"]?></em>
                            </a>
                        </li>
                    <?php
                 } }?>
            </ul>
            </li><?php $i++; $inc_date++; } ?>
                             




            </ul>
        </div>

        <div class="cd-schedule-modal">
            <header class="cd-schedule-modal__header">
                <div class="cd-schedule-modal__content">
                    <span class="cd-schedule-modal__date"></span>
                    <h3 class="cd-schedule-modal__name"></h3>
                </div>

                <div class="cd-schedule-modal__header-bg"></div>
            </header>

            <div class="cd-schedule-modal__body">
                <div class="cd-schedule-modal__event-info"></div>
                <div class="cd-schedule-modal__body-bg"></div>
            </div>

            <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
        </div>

        <div class="cd-schedule__cover-layer"></div>
    </div>
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
    <script src="js/util.js"></script>
    <script src="js/main.js"></script>
    <script src="js/datetime.js"></script>
    <script src="js/toast.js"></script>


</body>

</html>