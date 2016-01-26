<?php
	@mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
$imagename=$_FILES["avatar"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['avatar']['tmp_name']));

//Insert the image name and image content in image_table
    $query = "INSERT INTO korisnik VALUES(NULL, '". strtoupper($_POST['uname'])."', '".md5($_POST['pass'])."', '".$_POST['mail']."', '".$imagetmp."', '".$_POST['about']."', '".$_POST['address']."', '".$_POST['city']."', '".$_POST['country']."', '".$_POST['instagram']."', '".$_POST['twitter']."', '".$_POST['facebook']."', '".$_POST['tumblr']."','0')";
    
    print($query);
	$result = mysql_query($query);
    

    mysql_close();
?>