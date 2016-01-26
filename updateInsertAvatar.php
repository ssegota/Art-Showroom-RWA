<?php
session_start();
	@mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
	
    $uname=$_SESSION['login_user'];
	
    
    
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);
$sql = "UPDATE korisnik SET `avatar`='{$image}' WHERE username='".$uname."'";
print($sql);
mysql_query($sql);

header("Location: update.php");
mysql_close();
   

?>