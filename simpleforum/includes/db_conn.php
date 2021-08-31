<?php
    
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "forumdb";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
   
?>