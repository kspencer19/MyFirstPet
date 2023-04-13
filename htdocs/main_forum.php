<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: coral;} 
h1 {background-color: SlateBlue; font-family: 'Bradley Hand', cursive;}
h2 {background-color: SlateBlue;}


</style>
<!-- Latest compiled and minified CSS, jQuery library, and Latest compiled JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<?php

require_once 'database.php'; 

$resultFor = $db->query("SELECT A_TYPE FROM posts");


?>

<h1>Forums</h1>

<h2>Forum Posts</h2>

<a href="create_forum_topic.php">Add a Forum Topic<a>


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

<!--
<p>Please choose a specific animal to display topics regarding the animal</p>


<form action="/action_page.php">
  <label for="animal">Choose an animal:</label>
  <select name="animal" id="animal">
    <option value="dog">Dog</option>
    <option value="cat">Cat</option>
    <option value="fish">Fish</option>
    <option value="reptile">Reptile</option>
	<option value="rabbit">Rabbit</option>
	<option value="Rodent">Rodent</option>
	<option value="livestock">Livestock</option>
	<option value="bird">Bird</option>
	<option value="other">Other</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form> -->

<style>
.center {
 text-align: center
}
</style>
<?php

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
	echo "<h3><a href= post_with_comments.php>" . "Post ID: " . $row["POST_ID"] . " - " . $row["A_TYPE"] . "</a></h3>";
	echo "<div><h4>" . $row["POST_TITLE"] . "</h4></div>";
	echo "<div><p>" . $row["POST_DESCRIPTION"] . "</p></div>";
  }
  
  // echo "</div>";
} else {
	
  echo "0 results";
}

?>


</body>
</html>