<?php

	@mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
	
	$query = "SELECT * FROM korisnik";
	$result = mysql_query($query);
	
    
	print("<table>");
	for($i=0; $i<4; $i++){
    $id=$i+1;
	$row = mysql_fetch_array($result, MYSQL_ASSOC);	
	print("<tr><td>");
	print($row["userID"]);
	print("</td>");
		print("<td>");
	print($row["username"]);
	print("</td>");
		print("<td>");
	print($row["pass"]);
	print("</td>");
		print("<td>");
	print($row["mail"]);
	print("</td>");
		print("<td>");
	print($row["about"]);
	print("</td>");

	print("</tr>");
    print("<img src=\"getimg.php?id=". $id . "\">");
	}
	print("</table>");
	mysql_free_result($result);
    mysql_close();
?>