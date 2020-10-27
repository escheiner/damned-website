<?php
session_start();
if( isset($_SESSION['user'])!="" ){
header("Location: index.php");
}
include_once 'connect.php';

if ( isset($_POST['sca']) ) {
$username = trim($_POST['username']);

$pass = trim($_POST['pass']);
$password = hash('sha256', $pass);

$query = "select userid, username, pass from people where username=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$username]);
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if( $count == 1 && $row['pass']==$password ) {
 $_SESSION['user'] = $row['userid'];
 header("Location: profile.php");
 }
else {
 $message = "Invalid Login";
}
$_SESSION['message'] = $message;
}
?>

<html>
<head>
	<title>Esty Scheiner: Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<p><h1>
<?php
if ( isset($message) ) {
echo $message;
}
?>
</h1></p>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="login.php" method="post" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
                                        <input class="container-login100-form-btn" type="submit" name="sca" value="Login"  /> 
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="forgot-password.php">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	


</body>
</html>

