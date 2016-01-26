<?php 
session_start();

if(!(isset($_SESSION['loggedin']))){
                header ("Location: login_form.php");
                exit; // stop further executing, very important
            }
@mysql_connect("localhost", "root", "vertrigo");
@mysql_select_db("rwa_projekt");
$userQuery="SELECT userID FROM korisnik WHERE username='" . strtoupper($_SESSION['login_user']) . "'";
$resultUser = mysql_query($userQuery);
$rowUser = mysql_fetch_array($resultUser, MYSQL_ASSOC);	

$query="INSERT INTO komentar VALUES(NULL, '".$_POST['pic']."', '".$rowUser['userID']."','" . $_POST['comment']."', '1970-01-01')";
mysql_query($query);
print($query);
$location="Location: picture.php?id=" . $_POST['pic'];
//header("location: picture.php?id=$id");
mysql_close();
header($location);
?>  