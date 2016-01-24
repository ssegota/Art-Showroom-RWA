<?php

    $userID = $_GET['uid'];

    @mysql_connect("localhost", "root", "vertrigo");
    @mysql_select_db("rwa_projekt");
        
    $query = "SELECT * FROM korisnik WHERE userID='" . $userID . "'";
    $result = mysql_query($query);

    $row = mysql_fetch_array($result, MYSQL_ASSOC);	

    $data = $row["avatar"];
    Header("Content-type: image/jpeg");
    echo $data;
    mysql_close();

?>
