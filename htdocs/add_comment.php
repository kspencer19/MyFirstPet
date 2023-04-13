<html>
<body>

<?php

include post_with_comments.php;


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
$new_postid = $_POST['postid'];
$new_comment = $_POST['comment'];
//$userid = $_SESSION['userid'];

//search for word did in the database
echo "<h2>Successfully added the forum comment '" . $new_comment . "' to the database with post ID '" . $new_postid . "'</h2>";

$stmt = $db->prepare("INSERT INTO comments (COMMENT_ID, POST_ID, COMMENT_DESCRIPTION) VALUES (null, ?, ?)");
$stmt->bind_param("is", $new_postid, $new_comment);

$stmt->execute();
}
$stmt->close();


?>
<p><a href="main_forum.php">Click here view forum posts<a></p>
</body>
</html>