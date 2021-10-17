<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
// $_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
echo '<script>alert("Successful Logout.")</script>';
// throw new Exception("Value must be 1 or below");
header("location: index.php");
exit;
?>