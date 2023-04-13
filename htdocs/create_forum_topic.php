<html>
<body>

<body>
<h1>My First Pet</h1>

<h2>Create A Forum Topic</h2>
</body>

<?php

include add_forum_topic.php;
include database.php;

?>


<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form id="form1" name="form1" method="post" action="add_forum_topic.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3" bgcolor="#E6E6E6"><strong>Create New Topic</strong> </td>
</tr>
<tr>
<td valign="top"><strong>Animal Type</strong></td>
<td valign="top">:</td>
<td> 
  <select name="animal" id="animal">
    <option value="Dog">Dog</option>
    <option value="Cat">Cat</option>
    <option value="Fish">Fish</option>
    <option value="Reptile">Reptile</option>
	<option value="Rabbit">Rabbit</option>
	<option value="Rodent">Rodent</option>
	<option value="Livestock">Livestock</option>
	<option value="Bird">Bird</option>
	<option value="Other">Other</option>
  </select>
  <br><br></td>
</tr>
<tr>
<td width="14%"><strong>Topic/Question</strong></td>
<td width="2%">:</td>
<td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
</tr>
<tr>
<td valign="top"><strong>Details</strong></td>
<td valign="top">:</td>
<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
</tr>
<td><form><input type= "submit" name="Submit" value="Submit"></input></form></td>
</table>




</body>
</html>