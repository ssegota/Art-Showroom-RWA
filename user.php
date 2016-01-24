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

    $id=$_GET['id'];
 	@mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
    $query = "SELECT avatar,userID,username,mail,about,instagram, facebook, twitter, tumblr FROM `korisnik` WHERE userID='". $id."'";
	$result = mysql_query($query);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);	
    
    if($row['avatar'])
        print("<div class=\"userHolder\"><img class=\"avatar\" src=\"getAvatar.php?uid=". $id ."\"></div>");       
    else
        print("<div class=\"userHolder\"><img class=\"avatar\" src=\"img/defaultAvatar.png\"></div>");
    print("<div class=\"userHolder\">" . $row['username'] . "</div><br>");
    print("<div class=\"aboutHolder\">" . $row['about'] . "</div><br>");
  
    print("<div id=\"contact\">");
    if(!$row['tumblr'])
        print("<img class=\"contactLink\" src=\"img/tumblr2.png\">");
    else
        print("<a href=\"" .$row['tumblr'] . ".tumblr.com \"><img class=\"contactLink\" src=\"img/tumblr.png\"></a>");
    if(!$row['instagram'])
        print("<img class=\"contactLink\" src=\"img/ig2.png\">");
    else
        print("<a href=\"http://www.instagram.com/" .$row['instagram'] . "\"><img class=\"contactLink\" src=\"img/ig.png\"></a>");
    if(!$row['twitter'])
        print("<img class=\"contactLink\" src=\"img/twitter2.png\">");
    else
        print("<a href=\"www.twitter.com/" .$row['twitter'] . "\"><img class=\"contactLink\" src=\"img/twitter.png\"></a>");
    if(!$row['facebook'])
        print("<img class=\"contactLink\" src=\"img/fb2.jpg\">");
    else
        print("<a href=\"" .$row['facebook'] . "\"><img class=\"contactLink\" src=\"img/fb.jpg\"></a>");
    print("</div>");
    
    print("<a href=\"commision.php?id=1\"><div id=\"commission\">Commision me!</div></a>")
?>        
<br>
<div id="bottomDiv">
    <?php include("userPictures.php"); ?>
</div>
    </div>
    
</body>
<html>
