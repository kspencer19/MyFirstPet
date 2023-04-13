<head>

<?php

session_start();



error_reporting(E_ALL);
ini_set('display_errors', 1);

include "database.php";

$username = addslashes($_POST['username']);
$password = $_POST['password'];

echo "You attempted to login with " . $username . " and " . $password . "<br>"; 


$stmt = $db->prepare("SELECT USER_ID, USERNAME, PASSWORD FROM users WHERE USERNAME = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);

if ($stmt->num_rows == 1) {
	echo "I found one person with that username<br>";
	$stmt->fetch();
	if (password_verify($password, $pw)) {
		echo "The password matches<br>";
		echo "The user " . $uname . " logged in successfully<br>";
		echo " <br>";
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['username'] = $uname;
		$_SESSION['userid'] = $userid;
		echo "<a href='user_profile.php'>Go to your User Profile</a><br>";
		echo "<a href='index.php'>Return to main page</a><br>";
		exit;
	} else {
		$_SESSION = [];
		 session_destroy();
	}
}
else {
	
	$_SESSION = [];
	session_destroy();

}
echo "login failed<br>";
echo "<a href='index.php'>return to main page</a>";


?>
