<?php 	
    @mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
    $query = "SELECT picID,name FROM picture, korisnik WHERE uid=userID AND userID=" .$_GET['id'];
    
	$result = mysql_query($query);
    $countQuery= "SELECT COUNT(*) FROM " . substr($query, 22);	
    $numberResults = mysql_query($countQuery);
    $rowNR = mysql_fetch_array($numberResults, MYSQL_ASSOC);
    
    if($rowNR['COUNT(*)']>5){
        print("<a href=\"showall.php?q=SELECT+*+FROM+picture+WHERE+uID='" . $_GET['id']."'&t=". $_GET['id']."\">". $rowNR['COUNT(*)']." results found. See all.</a><br>");
        $length=5;
    }
    else
        $length=$rowNR['COUNT(*)'];
    for($i=0; $i<$length; $i++){
        $row = mysql_fetch_array($result, MYSQL_ASSOC);	
        print("<a href=\"picture.php?id=". $row['picID'] ."\">");
        print("<img style=\"position:relative; top: 10px;   height: 50px; width: 75px; padding:5px; display:inline-block; \" src=\"getImg.php?id=". $row['picID'] . "\">");
        
        print("<div style=\"position:relative; top: 10px; height:50px; display: inline-block;\">");
        print($row['name']);
        print("</div></a>");
    }
    
    mysql_free_result($result);
    mysql_free_result($numberResults);
    mysql_close();
?>