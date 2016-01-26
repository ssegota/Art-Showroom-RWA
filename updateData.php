<?php
session_start();
@mysql_connect("localhost", "root", "vertrigo");
@mysql_select_db("rwa_projekt");

$query="UPDATE korisnik SET about='".$_GET['desc']."' WHERE username='" .$_SESSION['login_user']."'";
mysql_query($query);
print($query);

$query="UPDATE korisnik SET instagram='".$_GET['inst']."' WHERE username='" .$_SESSION['login_user']."'";
mysql_query($query);



$query="UPDATE korisnik SET facebook='".$_GET['face']."' WHERE username='" .$_SESSION['login_user']."'";
mysql_query($query);



$query="UPDATE korisnik SET tumblr='".$_GET['tumb']."' WHERE username='" .$_SESSION['login_user']."'";
mysql_query($query);



$query="UPDATE korisnik SET twitter='".$_GET['twit']."' WHERE username='" .$_SESSION['login_user']."'";
mysql_query($query);

mysql_close();
header("Location: update.php");
die();
?>