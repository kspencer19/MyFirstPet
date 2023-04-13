<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style> 
body {
background-color: coral;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
h1 {background-color: SlateBlue; font-family: 'Bradley Hand', cursive;}
h2 {background-color: SlateBlue;}
</style>

<body>
<h1>My First Pet</h1>

<h2>Please Register for My First Pet Account</h2>

<?php

include "database.php";

?>


<form class="form-horizontal" action="save_new_user.php">
<fieldset>

<!-- text entry-->
<div class="form-group">
  <label class="col-md-4 control-label" for="firstname">First Name</label>
  <div class="col-md-5">
    <input id="firstname" name="firstname" type="text" placeholder="first name" class="form-control input-md" required="">
    <p class="help-block">Please enter your first name</p>
  </div>
</div>

<!-- text entry-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lastname">Last Name</label>
  <div class="col-md-5">
    <input id="lastname" name="lastname" type="text" placeholder="last name" class="form-control input-md" required="">
    <p class="help-block">Please enter your last name</p>
  </div>
</div>

<!-- text entry-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>
  <div class="col-md-5">
    <input id="username" name="username" type="text" placeholder="your name" class="form-control input-md" required="">
    <p class="help-block">Please enter a username</p>
  </div>
</div>

<!-- text entry-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password1">Password</label>
  <div class="col-md-5">
    <input id="password1" name="password1" type="password" placeholder="password" class="form-control input-md" required="">
    <p class="help-block">Please enter a password</p>
  </div>
</div>

<!-- text entry-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password2">Password</label>
  <div class="col-md-5">
    <input id="password2" name="password2" type="password" placeholder="password" class="form-control input-md" required="">
    <p class="help-block">Please re-enter a password</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
    <button id="Submit" name="Submit" class="btn btn-success">Create new user</button>
  </div>
</div>

</fieldset>
</form>


<?php


$db->close();


?>

</body>


</html>