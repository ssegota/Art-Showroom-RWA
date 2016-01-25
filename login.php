<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=md5($_POST['password']);
print($username . " " . $password);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "vertrigo");

// Selecting Database
$db = mysql_select_db("rwa_projekt", $connection);
$sql="select COUNT(*) from korisnik where pass='" . $password. "' AND username='" . $username."'";
print("<br>" . $sql);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query($sql);
$rows = mysql_fetch_array($query, MYSQL_ASSOC);
if ($rows['COUNT(*)'] == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>