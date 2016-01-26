<?php
    session_start();
	@mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
	
    $uname=$_SESSION['login_user'];
    
    $query="SELECT userID FROM korisnik WHERE username='".$uname."'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);	
    
    
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);
$sql = "INSERT INTO picture (`picID`, `picReference`, `name`, `description`, `uID`) VALUES (NULL, '{$image}', '".$_POST['title']."','".$_POST['desc']."' ,'".$row['userID']."')";;
mysql_query($sql);
header("Location: upload.php");


mysql_close();
?>  