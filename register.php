<?php
session_start();
if( isset($_SESSION['user'])!="" ){
header("Location: profile.php");
}
include_once 'connect.php';
if ( isset($_POST['sca']) )  { $username = trim($_POST['username']); $fname = trim($_POST['fname']); $lname = trim($_POST['lname']);
$phone = trim($_POST['phone']);
$pass = trim($_POST['pass']); $password = hash('sha256', $pass);
$query = "insert into people(username,fname,lname,pass,phone) values(?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($query); $stmt->execute([$username,$fname,$lname,$password, $phone]); $rowsAdded = $stmt->rowCount();
if ($rowsAdded == 1) {
$message = "Success! Proceed to login"; unset($fname);
unset($lname);
unset($phone);
unset($pass);
header("Location: login.php");
} else {
$message = "Failed! For some reason"; }
} ?>

<html lang="en">
<head>
<title>Esty Scheiner: Login Page</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="limiter">
<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
	<div class="wrap-login100">
		<form action = "register.php" method = "post" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Register	
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                                        <div class="wrap-input100 validate-input" data-validate = "Enter first name">
                                                <input class="input100" type="text" name="fname" placeholder="First Name">
                                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                        </div>
			                <div class="wrap-input100 validate-input" data-validate = "Enter last name">
                                                <input class="input100" type="text" name="lname" placeholder="Last Name">
                                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                        </div>	
                                        <div class="wrap-input100 validate-input" data-validate = "Enter phone number">
                                                <input class="input100" type="text" name="phone" placeholder="Phone Number">
                                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                        </div>
                                        <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" name="sca" value="Create Account"/>
					</div>

					<div class="text-center p-t-90">
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

</body>
</html>
