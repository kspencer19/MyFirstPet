<html>
<body>

<?php

include create_forum_topic.php;


// get data that sent from form
/*session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
if (! $_SESSION['userid']) {
	echo "Only logged in users may access this page. Click <a href='login_form.php'here </a> to login<br>";
	exit;
}
*/
include "database.php";
if (isset($_POST['Submit'])) {
$new_animal = $_POST['animal'];
$new_topic = $_POST['topic'];
$new_details = $_POST['detail'];
//$userid = $_SESSION['userid'];

//search for word did in the database
echo "<h2>Successfully added the forum post for th animal '" . $new_animal . "' and the topic/qustion '" . $new_topic . "' and description '" . $new_details . "'</h2>";

$stmt = $db->prepare("INSERT INTO posts (POST_ID, A_TYPE, POST_TITLE, POST_DESCRIPTION) VALUES (null, ?, ?, ?)");
$stmt->bind_param("sss", $new_animal, $new_topic, $new_details);

$stmt->execute();
}
$stmt->close();


?>
<p><a href="main_forum.php">Click here view forum posts<a></p>
</body>
</html>