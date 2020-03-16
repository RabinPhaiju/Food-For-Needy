<?php
$sentemailcode=null;
$sentemailcode=@$_GET['email'];

if($sentemailcode!=null){
    $currentTimeinSeconds = time();
    $sqlcheck = "SELECT * FROM `register` WHERE `email`='$sentemailcode'";
	//echo $sql;
	require_once('DBConnect.php');
	$resultt = mysqli_query($conn, $sqlcheck);
	if (mysqli_num_rows($resultt) > 0) {

				$sqlcode="UPDATE `register` SET `code`='$currentTimeinSeconds' WHERE `email`='$sentemailcode'";
                if(mysqli_query($conn, $sqlcode)){
                    require('phpmailer/class.phpmailer.php');
                    require('phpmailer/class.smtp.php');
                    $email=$sentemailcode;
                    $otp=$currentTimeinSeconds;
                
                    $message_body = "Use this code to change your password. :<br>".$otp;
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->SMTPAuth = TRUE;
                    $mail->SMTPSecure = 'tls'; // tls or ssl
                    $mail->Port     = "587";
                    $mail->Username = "fforneedy@gmail.com";
                    $mail->Password = "FOODISLIFE2020";
                    $mail->Host     = "smtp.gmail.com";
                    $mail->Mailer   = "smtp";
                    $mail->SetFrom("fforneedy@gmail.com", "Food for needy");
                    $mail->AddAddress($email);
                    $mail->Subject = "Code to change your password";
                    $mail->MsgHTML($message_body);
                    $mail->IsHTML(true);		
                    $result = $mail->Send();

                    $sentmails="Mail sent. Check your inbox for code.";
                    echo "<script>window.location='login.php?sentmails=$sentmails';</script>";
                    //sent email to this email address
                }else{
                    // echo "Error1";
                    $sentmails="Cant sent mail";
                }
            }else{
                // echo "Not found";
                $sentmails="Enter correct email address";
            }

}else{
    echo "<script>window.location='login.php';</script>";	
}
?>