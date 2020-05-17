<?php
if(empty($_SESSION)){
	session_start();
}
unset($_SESSION['username']);
unset($_SESSION['u_id']);
setcookie ("member_login","");
session_destroy();
$error=null;	
if(isset($_POST['submit'])){
	// echo "Nepal";
	$u = $_POST['username'];
	$p = md5($_POST['password']);

	$sql = "SELECT * FROM `user` WHERE `username`='$u' AND `password`='$p' AND `status`=1 AND `is_verified`=1;";
	//echo $sql;
	require_once('pages/DBConnect.php');
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// echo "Login Successful";exit;
		if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $u;
		$row = mysqli_fetch_assoc($result);
	
    $_SESSION['u_id'] = $row['id'];
    $_SESSION['pic'] = $row['pic'];
		if(!empty($_POST["remember_me"])) {
				setcookie ("member_login",$_POST["username"],time()+(60 * 60)); /* expire in 1 hour */
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
			}
		echo "<script>window.location='pages/index.php';</script>";		 
	}else{
    $error = "Username or password incorrect\n Contact admin for help!";
		// echo "<script>window.location='login.php';</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
 
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.jpg" />
  
</head>

<body class="background-login">
<?=$error?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img class="login-favicon" src="images/favicon.jpg" width="20px" alt="logo">
              </div>
              <h6 class="login-signin"><?php if($error==null){echo "Sign in to Continue...";}else{ echo $error;}?></h6>
             
              <form method="POST" class="pt-3">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <input type="checkbox" name="remember_me" id="lf" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
				<label for="lf-me">Remember me</label><br>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit">SIGN IN</button>
                </div>
              
               
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</body>

</html>
