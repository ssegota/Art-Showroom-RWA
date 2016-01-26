<?php
       @mysql_connect("localhost", "root", "vertrigo");
	   @mysql_select_db("rwa_projekt");
       
$query="DELETE FROM request WHERE reqID='".$_GET['id']."'";
print($query);
mysql_query($query);

header("Location: requests.php");
    mysql_close();
?>