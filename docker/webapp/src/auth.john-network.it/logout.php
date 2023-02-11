<?php
include('../config/Database.php');
include('../config/Functions.php');

if(!isset($con)) {
  http_response_code(503);
  die("The connection to the database could not be established. Try again later!");
}

session_start();

$_SESSION = array();
 
session_destroy();
 
header("location: ". getAuthURL() ."login.php?logout=1");
exit;
?>
