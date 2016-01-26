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
	

    <div id="mainContainer"">

<?php
    global $picture;
   @mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
    $query = "SELECT picID, name, description,username,userID FROM picture,korisnik WHERE uID=userID AND picID='" .$_GET['id'] . "'"; 
    $result = mysql_query($query);
    
    $row = mysql_fetch_array($result, MYSQL_ASSOC);	
    print("<div class=\"userHolder\">" . "<img style=\"position:relative; top: 10px;   height: 250px; width: 375px; padding:0px; display:inline-block; \" src=\"getImg.php?id=". $row['picID'] . "\">" . "</div><br>");
    print("<a href=\"user.php?id=".$row['userID']."\"><div class=\"userHolder2\" style=\"padding:0px;\"><img class=\"avatar2\" src=\"getAvatar.php?uid=". $row['userID'] ."\">");       

    print($row['username'] . "</div></a>");   
    print("<a href=\"order.php?id=". $_GET['id']."\"><div id=\"commission\">Buy this print!</div></a>") ;
    print("<div class=\"userHolder\" style=\"padding:0px;\">" . $row['name'] . "</div><br>");
    print("<div class=\"aboutHolder\" style=\"padding:0px;\"> " . $row['description'] . "</div><br>");
    

        
    mysql_free_result($result);
   
    mysql_close();
?>
<div id="bottomDiv">
         <?php
         if(!(isset($_SESSION['loggedin'])))
            print("Please log in to comment");
         else{
         print("<form id=\"addComment\" method=\"POST\" action=\"insertComment.php\">");
         print("<input type=\"text\" name=\"comment\" size=\"21\" maxlength=\"200\">");
         print("<input type=\"hidden\" name=\"pic\" value=\"" . $_GET['id'] . "\">");
         //print("<input type=\"hidden\" name=\"pic\" value=\"" .$_GET['id'] . "\>");
         print("<input type=\"submit\" value=\"Comment!\">");
             
         print("</form>");
         }
         ?>
    <?php include("comments.php"); ?>
</div>   
    </div>

</body>
<html>