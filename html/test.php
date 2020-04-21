<?php
$now = time(); // or your date as well
$your_date = strtotime("2020-03-15");
$datediff = $now - $your_date;

// echo round($datediff / (60 * 60 * 24));


$timestamp = strtotime('2009-10-22');

$day = date('D', $timestamp);
echo $day;

$to_time = strtotime("10:42:00");
$from_time = strtotime("10:21:00");
$d="06:00:00";
$e="10:00:00";
// echo round(abs($to_time - $from_time) / 60,2). " minute";


if($d < "09:00:00" || $e > "18:00:00"){
    $error="Time must be greater than 9 AM and less than 6PM";
    // echo $error;
 }
//  echo $d;
//  echo $e;

?>
<?php
$sentmails="Mail sent. Check your inbox for code.";
$email="rabinphaiju15@gmail.com";
// echo "<script>window.location='login.php?sentmails=$sentmails?email=$email';</script>";	
                    ?>
<?php 
    // the date 30 days from now.
    $i=12;
$thirtyDays = date("Y-m-d", strtotime("$i days"));
// echo $thirtyDays;
    
  
//   ?>
// <script>
//    var res = "copy success";
// </script>
// <?php
// $print="<script>document.writeln(res);</script>";
//    echo $print;
// ?>
 