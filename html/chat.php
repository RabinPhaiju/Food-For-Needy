<?php
error_reporting(0);
include 'session.php';
$error=null;
$errors=null;
$pass_user=null;
$pass_user= @$_GET['session_name'];

if (isset($_POST['send'])) {
    $a = $_POST['sent_to'];
    
    $sqlcheck = "SELECT * FROM `register` WHERE `username`='$a'";
	require_once('DBConnect.php');
	$resultt = mysqli_query($conn, $sqlcheck);
	if (mysqli_num_rows($resultt) > 0) {
        $b = $_SESSION['username'];
        
        $d = $_POST['message-to-send'];
        if($d==null){
          $error="Empty!";
        }else{
        require_once("DBConnect.php");
      $sql="INSERT INTO `messages` (`msg_to`,`msg_from`,`message`) VALUES ('$a','$b','$d')";
      if(mysqli_query($conn, $sql)){
        echo "<script>window.location='chat.php?session_name=$pass_user';</script>";
      }
      else {
        echo "Error updating record: " . mysqli_error($conn);
        }}
    }else{
        $errors="Recipient is not available! Search";
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    
    <link rel="stylesheet" href="css/loginindex.css">
    
    <link rel="stylesheet" href="css/editprofile.css">
    
    <link rel="stylesheet" href="css/index.css">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    
    <link rel="stylesheet" href="css/chat.css">
    <title>Add Food</title>
    <style>
      .clear_hide{
        display:none;
      }
      .btnss{
            transition: all .4s;
            position: relative;
        }
        .btnss:hover{
            transform: translateY(-3px);
            box-shadow: 0 10p 20px rgba(0,0,0,0.6);
        }
        .btnss:active{
            transform: translateY(-1px);
            box-shadow: 0 10p 20px rgba(0,0,0,0.6);
        }
    </style>
    <script type="text/javascript">

function myFunction() {
  var element = document.getElementById("fsearch");
  var x = document.getElementById("fname");
  if(element.value.length!=0){
    x.classList.remove("clear_hide");
  }else{
    x.classList.add("clear_hide");
  }

  
   
}
  </script>
   
</head>

<body>
<?php include 'navbar1.html';?>
    <div class="body_wrapper">
    <?php include 'navbar2.html';?>

        <div class="container">
            <div class="col-md-9 col-sm-9 contains">
            <h3 style="margin-left:20px;"></h3>
            <div class="containers clearfix">
    <div class="people-list" id="people-list">
                                                                         
      <div class="search">
        <input type="text" style="color:black;width:80%" placeholder="search" id="fsearch" name="username" onkeyup="myFunction()"/>
        <i class="fa fa-search"></i>
      </div>
      <strong style="color:white; margin:-5px 0 0px 10px">Conversation</strong>
      <hr style="margin:0 0 0px 10px; width:74%">
      <ul class="list">
    <?php
        $current_userid=$_SESSION['reg_id'];
                                require_once('DBConnect.php');
                                $sql1="SELECT `username` FROM `register` WHERE `reg_id`='$current_userid'";
                                $result1 = mysqli_query($conn, $sql1);
                                $row1 = mysqli_fetch_assoc($result1);
                                $current_user=$row1['username'];
        $sql = "SELECT * from `messages` WHERE `msg_to`='$current_user' OR `msg_from`='$current_user'";
         require_once("DBConnect.php");
         $result = $conn-> query($sql);
         $total = mysqli_num_rows($result);
         $chat_users = array($current_user);

if($result-> num_rows >0){
    while($row = $result-> fetch_assoc()){  ?>
        <?php
                    
                    if(in_array($row['msg_to'],$chat_users)){

                    }else{
                    array_push($chat_users,$row['msg_to']);
            ?>

        <li class="clearfix">

        <a href="chat.php?session_name=<?=$row['msg_to']?>">
            <?php
              require_once('DBConnect.php');
              $current_username=$row['msg_to'];
              $sql2="SELECT `pic` FROM `register` WHERE `username`='$current_username'";
              $result2 = mysqli_query($conn, $sql2);
              $row2 = mysqli_fetch_assoc($result2);
              
              if($row2['pic']==null){?>
                <img class="btnss" src="files/user.png" height=55px style="border-radius:50%;margin-bottom: 5px" alt="avatar"/>
             <?php }else{
              ?>
        <img class="btnss" src="files/<?php echo $row2['pic'];?>" height=55px style="border-radius:50%;margin-bottom:5px"  alt="avatar" />
             <?php } ?>
          <div class="about">
            <div class="name"><p style="color:white"><?php echo $row['msg_to'];?></p></div>
            <div class="status">
              <!-- <i class="fa fa-circle online"></i> online -->
            </div>
          </div>
          </a>
        </li>  
          <hr class="blackLine">
    <?php } } }?>
    <div class="clear_hide" id="fname"> 
    <strong style="color:white; margin:-5px 0 0px 5px">Search</strong>
    <hr style="margin:0 0 0px 5px; width:74%">
                                                <?php
                                                require_once("DBConnect.php");
                                                $sql_s = "SELECT * from register ORDER BY `username` ASC ";
                                                 $result_s = $conn-> query($sql_s);
		                                        while($row_s = $result_s-> fetch_assoc()){  
                                                    $search_user=$row_s["username"];
                                                    if($search_user==$_SESSION['username']){
                                                        continue;
                                                    }else  if(in_array($search_user,$chat_users)){
                                                      continue;
                                                  }else{  ?>
              
              <li class="clearfix">
              <a href="chat.php?session_name=<?=$search_user?>">
                <?php
              if($row_s['pic']==null){?>
                <img src="files/user.png" class="btnss" height=55px style="border-radius:50%;margin-top:4px" alt="avatar" />
             <?php }else{
              ?>
        <img src="files/<?php echo $row_s['pic'];?>" class="btnss" height=55px style="border-radius:50%;margin-top:4px"  alt="avatar" />
             <?php } ?>
            <div class="about">
            <div class="name"><p style="color:white"><?php echo $search_user;?></p></div>
              <div class="status">
                <!-- <i class="fa fa-circle online"></i> online -->
              </div>
            </div>
             </a>
          </li>
          <hr style="margin:0 0 0px 5px; width:74%">
             <?php }} ?>  

    </div>

    <?php
    $sql = "SELECT * from `messages` WHERE `msg_from`='$current_user' OR `msg_to`='$current_user'";
         require_once("DBConnect.php");
         $result = $conn-> query($sql);
         $total = mysqli_num_rows($result);
        //  $chat_users = array($current_user);
if($result-> num_rows >0){
    while($row = $result-> fetch_assoc()){  ?>
        <?php 
                    if(in_array($row['msg_from'],$chat_users)){
                    }else{
                    array_push($chat_users,$row['msg_from']);
            ?>
        <li class="clearfix">
        <a href="chat.php?session_name=<?=$row['msg_from']?>">
        <?php
              require_once('DBConnect.php');
              $current_username=$row['msg_from'];
              $sql2="SELECT `pic` FROM `register` WHERE `username`='$current_username'";
              $result2 = mysqli_query($conn, $sql2);
              $row2 = mysqli_fetch_assoc($result2);
              
              if($row2['pic']==null){?>
                <img src="files/user.png" height=55px style="border-radius:50%" alt="avatar" />
             <?php }else{
              ?>
        <img src="files/<?php echo $row2['pic'];?>" height=55px style="border-radius:50%"  alt="avatar" />
             <?php } ?>
          <div class="about">
            <div class="name"><p style="color:white"><?php echo $row['msg_from'];?></p></div>
            <div class="status">
              <!-- <i class="fa fa-circle online"></i> online -->
            </div>
          </div>
          </a>
        </li>
        <hr style="margin:0 0 0px 5px; width:74%">           
    <?php } } } ?>
      </ul>
    </div>
    
    <div class="chat">
      <div class="chat-header clearfix">
          <?php
          if($pass_user!=null){
            $chat_users[1]=$pass_user;
          }
              require_once('DBConnect.php');
              $user_pic=$chat_users[1];
              $sql2="SELECT `pic` FROM `register` WHERE `username`='$user_pic'";
              $result2 = mysqli_query($conn, $sql2);
              $row2 = mysqli_fetch_assoc($result2);
              
            if($row2['pic']==null){?>
                <img src="files/user.png" height=55px style="border-radius:50%" alt="avatar" />
             <?php }else{
              ?>
        <img src="files/<?php echo $row2['pic'];?>" height=55px style="border-radius:50%"  alt="avatar" />
             <?php } ?>
        <div class="chat-about">

          <div class="chat-with">Chat with  <i><a href="viewprofile.php?view=<?php echo $chat_users[1];?>"><?php echo $chat_users[1];?></a></i></div>
          <?php
          $message_from=$chat_users[0];
          $message_to=$chat_users[1];
          $sqll = "SELECT * from `messages` where (`msg_to`='$message_to' AND `msg_from`='$message_from') OR (`msg_from`='$message_to' AND `msg_to`='$message_from') ORDER BY `date` ASC";
                            require_once("DBConnect.php");
                            $resulttotall = $conn-> query($sqll);
                            $totall = mysqli_num_rows($resulttotall);
                            ?>
          <div class="chat-num-messages"><p style="color:black"> <?php if($totall==0){echo "Start new conversation.";}else{?>already <?php echo $totall;?> messages <?php } ?> &nbsp&nbsp&nbsp<a href="chat.php?session_name=<?=$pass_user?>"><i class="fa fa-refresh fa-2x" aria-hidden="true"></i></a></p></div>

        </div>

      </div> <!-- end chat-header -->
      
      <div class="chat-history">
        <ul>
            <?php
        

if($resulttotall-> num_rows >0){
    while($rowl = $resulttotall-> fetch_assoc()){
        $chat_date=$rowl['date'];
        $timestamp = strtotime($chat_date);
        $day = date('d', $timestamp);
        $month=date('F',$timestamp);
        $time = date("H:i:s",strtotime($chat_date));

        if($rowl['msg_from']==$chat_users[0]){
        ?>
          <li class="clearfix">
            <div class="message-data align-right">
              <span class="message-data-time" > <?php echo $month.", ".$day.", ".$time;?></span> &nbsp; &nbsp;
              <span class="message-data-name" ><i style="color:skyblue" class="fa fa-circle"></i>&nbsp<?php echo $chat_users[0];?></span> 
              
            </div>
            <div class="message other-message float-right">
            <?php echo $rowl['message'];?>
            </div>
          </li>

        <?php }else{ ?>

          
          <li>
            <div class="message-data">
              <span class="message-data-name"><i class="fa fa-circle online"></i> <?php echo $chat_users[1];?></span>
              <span class="message-data-time" > <?php echo $month.", ".$day.", ".$time;?></span>
            </div>
            <div class="message my-message">
            <?php echo $rowl['message'];?>     
               </div>
          </li>

    <?php }}} ?>
        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
      <form action="chat.php?session_name=<?=$pass_user?>" method="POST" enctype="multipart/form-data">
          <input type="text" name="sent_to" value="<?php echo $chat_users[1];?>" hidden>
          <textarea name="message-to-send" id="message-to-send" placeholder="<?php if($error!=null){echo $error." Type your message";}else{echo "Type your message";}?>" placeholder ="Type your message" rows="3"></textarea>
          <button name="send" class="btnss">Send</button>
        </form>
        

      </div> <!-- end chat-message -->
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->

<!-- <script id="message-template" type="text/x-handlebars-template">
  <li class="clearfix">
    <div class="message-data align-right">
      <span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
      <span class="message-data-name" ><?php echo $chat_users[0];?></span> 
    </div>
    <div class="message other-message float-right">
      {{messageOutput}}
      <script>
          
          var res = "copy success";
          // alert(res);
        
          <?php
          $print="<script>document.writeln(res);</script>";
          echo "<script>alert(res);</script>";
        ?> 
      </script>

    </div>
  </li>
</script> -->
            </div>
        </div>
    </div>
    <script>
</script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/editprofile.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/index1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
    <script src="js/chat.js"></script>


</body>

</html>