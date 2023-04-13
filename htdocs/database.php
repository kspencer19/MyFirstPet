<?php  
// Database configuration  
$Host     = "localhost";  
$Username = "root";  
$Password = "root";  
$Name     = "myfirstpet";  
  
// Create database connection  
$db = new mysqli($Host, $Username, $Password, $Name);  
  
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}