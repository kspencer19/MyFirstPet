<html>
<head>
<style>
body {
background-color: coral;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
h1 {background-color: SlateBlue; font-family: 'Bradley Hand', cursive;}
h2 {background-color: SlateBlue;}
</style>
<!-- Latest compiled and minified CSS, jQuery library, and Latest compiled JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>


<h1>My First Pet</h1>

<h2>Forum Posts</h2>

<?php


include "database.php";


$sql = "SELECT POST_ID, A_TYPE, POST_TITLE, POST_DESCRIPTION FROM posts";
$result = $db->query($sql);

//$post = mysqli_fetch_assoc($sql);

// Get all comments from database
$comments = "SELECT * FROM comments WHERE EXISTS (SELECT * FROM posts WHERE comments.POST_ID = posts.POST_ID)";
//$comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);
$result2 = $db->query($comments);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo "<h3>" . "Post ID: " . $row["POST_ID"] . " - " . $row["A_TYPE"] . "</a></h3>";
	echo "<div><h4>" . $row["POST_TITLE"] . "</h4></div>";
	echo "<div><p>" . $row["POST_DESCRIPTION"] . "</p></div>";
	if ($result2->num_rows > 0) {
		while($rowo = $result2->fetch_assoc()) {
			echo "<h4>" . "Comment ID " . $rowo[COMMENT_ID] . " - Comment</h4>";
			echo "<div><p>" . $rowo[COMMENT_DESCRIPTION] . "</p></div>";
			
		}
	} else {
		echo "<div><h4>no comments</h4></div>";
	}
	?> <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form id="form1" name="form1" method="post" action="add_comment.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3" bgcolor="#E6E6E6"><strong>Add a Comment</strong> </td>
<tr>
<td width="14%"><strong>Post ID</strong></td>
<td width="2%">:</td>
<td width="84%"><input name="postid" type="number" id="postid" size="50" /></td>
</tr>
<tr>
<td valign="top"><strong>Details</strong></td>
<td valign="top">:</td>
<td><textarea name="comment" cols="50" rows="3" id="comment"></textarea></td>
</tr>
<td><form><input type= "submit" name="Submit" value="Submit"></input></form></td>
</table><?php
  }
  
  // echo "</div>";
} else {
	
  echo "0 results";
}





?>

</body>

</html>