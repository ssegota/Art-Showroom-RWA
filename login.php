<?php
if (session_status() == PHP_SESSION_NONE)
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
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
@mysql_connect("localhost", "root", "vertrigo");

// Selecting Database
@mysql_select_db("rwa_projekt");
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from korisnik where pass='$password' AND username='$username'");
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
$_SESSION['loggedin']=1;
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close(); // Closing Connection
}
}
?>