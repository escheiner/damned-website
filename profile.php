<?php
session_start();
require_once 'connect.php';
if(!isset($_SESSION['user'])){
header("Location: index.php");
exit;
}
$query = "SELECT * FROM people WHERE userid=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['user']]);
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<html>
<head><title>You are logged in!</title></head>
<body>
Welcome to the profile page…<?php echo $userRow['fname']; ?>

<?php
if($userRow[‘role’] == “administrator”) {
echo “EDIT”;
}
?>
<p><a href="edit.php">Edit</a></p>


<p><a href="logout.php">Logout Here</a></p>
	</body>
</html>
