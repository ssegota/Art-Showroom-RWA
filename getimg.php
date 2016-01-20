<?php

    $picID = $_GET['id'];

    @mysql_connect("localhost", "root", "vertrigo");
    @mysql_select_db("rwa_projekt");
        
    $query = "SELECT * FROM picture WHERE picID='" . $picID . "'";
    $result = mysql_query($query);

    $row = mysql_fetch_array($result, MYSQL_ASSOC);	

    $data = $row["picReference"];
    Header("Content-type: image/jpeg");
    echo $data;
    mysql_close();

?>