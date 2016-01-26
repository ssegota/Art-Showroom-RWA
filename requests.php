<html>
<head>
    <title>ArtShowroom</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div id="header">
	
		<a href="index.php"><img class="logo" src="img/logo.png" ></a>
		<div id="log">
            <?php include("logandsign.php"); ?>
        </div>
	
	
		<form method="get" action="searchResult.php">
		        <input type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
		</form>
	<div class="tfclear"></div>
	</div>
	

    <div id="mainContainer">
		<?php
        if (session_status() == PHP_SESSION_NONE)
            session_start();
       @mysql_connect("localhost", "root", "vertrigo");
	   @mysql_select_db("rwa_projekt");
       
       $query="SELECT k.username,tekst, reqID FROM korisnik k, korisnik a, request WHERE a_id=a.userID AND u_id=k.userID and a.username='" .$_SESSION['login_user']."'"; 
       $result = mysql_query($query);
        
       
       
       $queryCount="SELECT COUNT(*) FROM korisnik k, korisnik a, request WHERE a_id=a.userID AND u_id=k.userID and a.username='" .$_SESSION['login_user']."'";
              $resultCount = mysql_query($queryCount);
        
       $rowCount = mysql_fetch_array($resultCount, MYSQL_ASSOC);
       for($i=0; $i<$rowCount['COUNT(*)']; $i++){
           $row = mysql_fetch_array($result, MYSQL_ASSOC);
           print("<b>".$row['username']."</b><br>");
           print($row['tekst']."<br><br>");
           print("<form method=\"get\" action=\"deleteRequest.php?\"><input type=\"hidden\" name=\"id\" value=\"".$row['reqID']."\"><input type=\"submit\"></form>");
       }	
       
        ?>
    </div>
    
</body>
<html>
