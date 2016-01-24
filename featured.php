<?php

	@mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
	
	
	$left=5;
    $top=75;
    

	for($i=0; $i<6; ++$i){
        $id=$i+1;
        $query = "SELECT picID, username, name, description FROM korisnik, picture WHERE userID=uID AND picID='" . $id . "'";
	    $result = mysql_query($query);
        
        $row = mysql_fetch_array($result, MYSQL_ASSOC);	
        
        print("<img style=\"height: 150px; width: 250px; padding:15px; position:absolute; left:" . $left .  "px; top:" . $top ."px;\" src=\"getimg.php?id=". $id . "\">");
        print("<div class=\"coverDiv\" style=\" left:" . $left .  "; top:" . $top .";\">");
            print("<h1>" . $row['name'] . "</h1>");
            print("By: " . $row['username'] . "<br>");
        print("</div>");
        
        $left = $left + 300;
        if($i==2||$i==5){
            $top=$top+200;
            $left=5;
        }
	}

	mysql_free_result($result);
    mysql_close();
?>