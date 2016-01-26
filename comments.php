<?php
    @mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
    $query = "SELECT tekst, datum, userID, username FROM komentar, korisnik WHERE p_id=" .$_GET['id'] ." AND u_id=userID";
    //print($query . "<br>");
	$result = mysql_query($query);
    $countQuery= "SELECT COUNT(*) FROM " . substr($query, 43);	
    //print($countQuery . "<br>");
    $numberResults = mysql_query($countQuery);
    $rowNR = mysql_fetch_array($numberResults, MYSQL_ASSOC);
    
    for($i=0; $i<$rowNR['COUNT(*)']; $i++){
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        print("<div class=\"comment\">");
        print("By: " . $row['username'] . ", on " . $row['datum'] . "<br>");	
        print($row['tekst'] . "<br>");
        print("</div><div class=\"divideComment\"></div>");
    }
    mysql_free_result($result);
    mysql_close();
?>