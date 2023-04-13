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

<form class="form-horizontal" action="search_forum.php">
<!-- Form Name -->
<h4>Search for a topic</h4>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Search Input</label>
  <div class="col-md-5">
    <input id="keyword" name="keyword" type="search" placeholder="e.g. feeding schedule" class="form-control input-md" required="">
    <p class="help-block">Enter a word to search for in the forum database</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
    <button id="Submit" name="Submit" class="btn btn-success">Search</button>
  </div>
</div>
</form>

<p><a href="main_forum.php">Click here to return to the main forum page<a></p>

<?php

include "database.php";


error_reporting(E_ALL);
ini_set('display_errors', 1);

$keyword = $_GET['keyword'];

//echo $keyword;

//search for word in the database
echo "<h2>show all posts with the word " . $keyword . "</h2>";

$keyword = "%" . $keyword . "%";
$stmt = $db->prepare("SELECT POST_ID, A_TYPE, POST_TITLE, POST_DESCRIPTION FROM posts WHERE POST_TITLE LIKE ? OR POST_DESCRIPTION LIKE ?");

$stmt->bind_param("ss", $keyword, $keyword);

$stmt->execute();
$stmt->store_result();
$stmt->bind_result($POST_ID, $A_TYPE, $POST_TITLE, $POST_DESCRIPTION);



//echo "Select returned $result->num_rows rows of data<br>";

if ($stmt->num_rows > 0) {
  // output data of each row
  while($row = $stmt->fetch()) {
	  
	  $safe_post_title = htmlspecialchars($POST_TITLE);
	  $safe_post_description = htmlspecialchars($POST_DESCRIPTION);
	  echo "<h3>" . "Post ID: " . $POST_ID . " - " . $A_TYPE . "</h3>";
	  echo "<div><h4>" . $safe_post_title . "</h4></div>";
	  echo "<div><p>" . $safe_post_description . "</p></div>";
  }
  
  // echo "</div>";
} else {
	
  echo "0 results";
}

//include "main_forum.php";

?>



</body>
</html>
