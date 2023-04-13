<?php

include "database.php";

$new_firstname = addslashes($_GET['firstname']);
$new_lastname = addslashes($_GET['lastname']);
$new_username = addslashes($_GET['username']);
$new_password1 = addslashes($_GET['password1']);
$new_password2 = addslashes($_GET['password2']);

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

echo "<h2>Trying to add a new user named " . $new_firstname . " " . $new_lastname . " with the username '" . $new_username . "' and password '" . $new_password1 . "' and '" . $new_password2 . "'</h2>";

//check to see if password1 and password2 match
if ($new_password1 != $new_password2) {
	echo "The passwords do not match. Please try again.";
	exit;
}

preg_match('/[0-9]+/', $new_password1, $matches);
if (sizeof($matches ) == 0) {
	echo "The password must have at least one number, one special character like !@#$%^&*(), and be 8 characters long<br>";
	exit;
}

preg_match('/[!@#$%^&*()]+/', $new_password1, $matches);
if (sizeof($matches ) == 0) {
	echo "The password must have at least one number, one special character like !@#$%^&*(), and be 8 characters long<br>";
	exit;
}

if (strlen($new_password1) <= 8) {
	echo "The password must have at least one number, one special character like !@#$%^&*(), and be 8 characters long<br>";
	exit;
}


//check to see if the user exists
$sql = "SELECT * FROM users where USERNAME = '$new_username'";

$result = $db->query($sql) or die (mysqli_error($db));

if ($result->num_rows > 0) {
	//someone has that name
	echo "The username " . $new_username . " is already in use. Can't register twice!";
	exit;
}

// insert a new user
//$sql = "INSERT INTO users (id, username, password) VALUES (null, '$new_username', '$hashed_password')";
$stmt = $db->prepare("INSERT INTO users (USER_ID, FIRST_NAME, LAST_NAME, USERNAME, PASSWORD) VALUES (null, ?, ?, ?, ?)");

$stmt->bind_param("ssss", $new_firstname, $new_lastname, $new_username, $hashed_password);
$results = $stmt->execute();



if ($results) {
	echo "Registration success";
}
else {
	echo "Something went wrong. not registered";
}

echo "<a href= 'index.php'>Return to main page</a>";

?>