<!DOCTYPE html>
<html>
<!-- <head>
<style>
body {background-color: #DFCDFE;} 
h1 {background-color: #C5A2FC; font-family: 'Bradley Hand', cursive;}
h2 {background-color: #DBC5FE;}


</style>
<!-- Latest compiled and minified CSS, jQuery library, and Latest compiled JavaScript
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<h1>My First Pet</h1>

<h2>User Profile</h2> -->

<?php

include "database.php";
//include "user_login.php";

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $mysqli->prepare('SELECT USER_ID, PASSWORD, USERNAME FROM users WHERE USER_ID = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['loggedin']);
$stmt->execute();
$stmt->bind_result($pw, $uname);
$stmt->fetch();
$stmt->close();
echo "<p>pw " . $pw . " username " . $uname . " and u id " . $_SESSION['USER_ID'] . " .</p>"

?>

<head>
	<meta charset="utf-8">
	<title>Profile Page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
	<div class="content">
		<h2>Profile Page</h2>
		<div>
			<p>Your account details are below:</p>
			<table>
				<tr>
					<td>Username:</td>
					<td><?=$_SESSION['uname']?></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><?=$pw?></td>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>