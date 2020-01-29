<?php
if(empty($_SESSION)){
	session_start();
}
unset($_SESSION['username']);
unset($_SESSION['reg_id']);
setcookie ("login","");
session_destroy();
$error="";   
if(isset($_POST['signin'])){
	$uu = $_POST['username'];
	$u=strtolower($uu);
	$p = md5($_POST['password']);

	$sql = "SELECT * FROM `register` WHERE (`username`='$u' OR `email`='$u') AND `password`='$p';";
	//echo $sql;
	require_once('DBConnect.php');
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// echo "Login Successful";exit;
		if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $u;
		$row = mysqli_fetch_assoc($result);
		//echo "<pre>"; print_r($row);exit;
		$_SESSION['reg_id'] = $row['reg_id'];
		if(!empty($_POST["remember_me"])) {
				setcookie ("login",$_POST["username"],time()+(60 * 60)); /* expire in 1 hour */
			} else {
				if(isset($_COOKIE["login"])) {
					setcookie ("login","");
				}
			}

		echo "<script>window.location='index.php';</script>";		
        exit; 
	}else{
		echo "<script>alert('Username or Password Incorrect!');</script>";
		echo "<script>window.location='login.php';</script>";
		exit;
	}
}
if(isset($_POST['signup'])) {
    
$aa=$_POST['username'];
$a=strtolower($aa);
$b=$_POST['firstname'];
$c=$_POST['lastname'];
$dd=$_POST['email'];
$at=strpos($dd,"@");
$dot=strrpos($dd,".");
$leng=strlen($dd);
$d=strtolower($dd);
$e=$_POST['psw'];
$f=$_POST['repsw'];
$k = $c.$leng.$at;     
require_once("DBConnect.php");

    $sql_u = "SELECT * FROM register WHERE username='$a'";
  	$sql_e = "SELECT * FROM register WHERE email='$d'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);
  	
if (mysqli_num_rows($res_u) > 0) {
        $name_error = "Sorry... username already taken";
        $error=$name_error; 	
  	}
 else if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $a)) {
    $name1_error = "Sorry... username is not valid"; 
    $error=$name1_error;
}
 else if(mysqli_num_rows($res_e) > 0){
        $email_error = "Sorry... email already taken"; 	
        $error=$email_error;
  	}
 else if( $at<4 || $at>$dot || ($dot-$at)<3 || $leng==$dot || ($leng-$dot)<3){
    $email1_error = "Enter valid Email address."; 
    $error=$email1_error;
 }
 else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $d)) {
     $email1_error = "Enter valid Email address.";
     $error=$email1_error;
}
else if($e!=$f){
    $password_error = "Password don't Match";
    $error=$password_error;
}

else{
        $sql = "INSERT INTO `register` (`username`,`firstname`,`lastname`,`email`,`password`) VALUES ('$a', '$b','$c','$d',md5('$e'))";

	
	if(mysqli_query($conn, $sql)){
			$to = $d;
			$subject = "Registration Successfull";
			$message = "Thank you  $b  $c for registering Raktasanchar. Use this key  $k  to verify your email.";
			$headers = "From: foodforneedy@gmail.com";
			// if(mail($to,$subject,$message,$headers)){
			 
			 
			// }
			// else{
			//     echo "Error2";
			// }
		}
		else{
			echo "Error1";
		}
		mysqli_close($conn);
	}}  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div id="particles-js">
        <div class="navbar">
            <div class="nav0">
                <a href="../index.html"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
            </div>
            <div class="navbar1">
                <div class="nav3"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></div>
                <div class="nav4"><a href="">CONTACT US</a></div>

                <div class="nav2"><a href="login.php">JOIN US</a></div>

                <div class="nav1"><a href="">DONATE</a></div>
            </div>
        </div>
    </div>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login.php" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="username" name="username" required>
                <input type="text" placeholder="First Name" name="firstname" required />
                <input type="text" placeholder="Last Name" name="lastname" required />
                <input id="email" type="email" name="email" placeholder="Email" required/>
                <input type="password" id="psw" placeholder="password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <div id="message">
                    <p id="letter" class="invalid">lowercase</p>
                    <p id="capital" class="invalid">uppercase</p>
                    <p id="number" class="invalid">number</p>
                    <p id="length" class="invalid">8 letter</p>
                </div>
                <input type="password" id="repsw" placeholder="Enter password again!" name="repsw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <div id="messageVerify">
                    <p id="match" class="invalid">Matched</p>
                </div>
                <button id="signupButton" name="signup" class="invalid1">Sign Up</button>
            </form>

        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
                </div>
                <span>or use your account</span>
                <input type="text" name="username" placeholder="Email or Username" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <a href="#">Forgot your password?</a>
                <button name="signin">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <br>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <br>
                    <button class="ghost" id="signUp">Sign Up</button>
                    <p style="color:red;"><?php if($error!=null){echo $error;}    ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
    <script src="../js/particles.js"></script>
    <script src="../js/app.js"></script>
    <script>
        var count_particles, update;
        let stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
            stats.begin();
            stats.end();
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script>
    <script>
        var email = document.getElementById("email");
        var button = document.getElementById("signupButton");

        var myInput = document.getElementById("psw");
        var myInputVerify = document.getElementById("repsw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        email.onkeyup = function() {
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (filter.test(email.value)) {
                button.classList.remove("invalid1");
                button.classList.add("valid1");
            } else {
                button.classList.remove("valid1");
                button.classList.add("invalid1");
            }
        }

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }
        myInputVerify.onfocus = function() {
            document.getElementById("messageVerify").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }
        myInputVerify.onblur = function() {
            document.getElementById("messageVerify").style.display = "none";
        }

        // When the user starts to type something inside the password field

        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
                button.classList.remove("invalid1");
                button.classList.add("valid1");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
                button.classList.remove("valid1");
                button.classList.add("invalid1");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
                button.classList.remove("invalid1");
                button.classList.add("valid1");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
                button.classList.remove("valid1");
                button.classList.add("invalid1");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
                button.classList.remove("invalid1");
                button.classList.add("valid1");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
                button.classList.remove("valid1");
                button.classList.add("invalid1");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
                button.classList.remove("invalid1");
                button.classList.add("valid1");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
                button.classList.remove("valid1");
                button.classList.add("invalid1");
            }
        }
        myInputVerify.onkeyup = function() {
            if (myInput.value == myInputVerify.value && myInputVerify.value != "") {
                match.classList.remove("invalid");
                match.classList.add("valid");
                button.classList.remove("invalid1");
                button.classList.add("valid1");
            } else {
                match.classList.remove("valid");
                match.classList.add("invalid");
                button.classList.remove("valid1");
                button.classList.add("invalid1");
            }
        }
    </script>
</body>

</html>