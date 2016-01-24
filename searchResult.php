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
    $term=strtoupper($_GET['q']);
    $dividedTerm=explode(" ", $term);
	
    @mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
    
    //Make queries
    //Categories query
    for($i=0; $i<sizeof($dividedTerm); $i++){
        
        if($i==0){
            $queryCategory="SELECT name, picID,description,username FROM pic_kat, picture, kategorija, korisnik WHERE p_id=picID AND k_id=katID AND uID=userID AND (katName=\"" . $dividedTerm[$i] . "\" ";
        }
        else if($i>0){
            $queryCategory .= "OR katName=\"" . $dividedTerm[$i] . "\" " ;
        }
    }
    $queryCategory.= ")";
    //users query
    for($i=0; $i<sizeof($dividedTerm); $i++){
        
        if($i==0){
            $queryUser="SELECT username,userID,about, avatar FROM `korisnik` WHERE (username=\"" . $dividedTerm[$i] . "\" ";
        }
        else if($i>0){
            $queryUser .= "OR username=\"" . $dividedTerm[$i] . "\" " ;
        }
    }
    
    $queryUser.= ")";
    /*
    TAG query:
    */
    for($i=0; $i<sizeof($dividedTerm); $i++){
        
        if($i==0){
            $queryTag="SELECT DISTINCT username,name, picID FROM tag, picture, pic_tag,korisnik WHERE uID=userID AND picID=p_id AND tagID=t_id AND (tagName=\"" . $dividedTerm[$i] . "\"";
        }
        else if($i>0){
            $queryTag .= "OR tagName=\"" . $dividedTerm[$i] . "\"";
        }
    }
    $queryTag.= ")";    
    //Get and print category results
    $resultCategory = mysql_query($queryCategory);
    $countQueryCategory= "SELECT COUNT(*) FROM " . substr($queryCategory, 44);
    $numberCategoryResults = mysql_query($countQueryCategory);
    $rowNCR = mysql_fetch_array($numberCategoryResults, MYSQL_ASSOC);

    print("<div class=\"searchDivider\" style=\"left:0px\">");
    
    
    if($rowNCR['COUNT(*)']>6){
        $length=6;
        print("<a href=\"showall.php?q=" . $term. "&t=category\">". $rowNCR['COUNT(*)']." results found. See all.</a><br>");
    }
    else
        $length=$rowNCR['COUNT(*)'];
    
    for($i=0; $i<$length;$i++){
        $rowCategory = mysql_fetch_array($resultCategory, MYSQL_ASSOC);
        print("<a href=\"picture.php?id=". $rowCategory['picID'] ."\">");
        print("<img style=\"position:relative; top: 10px;   height: 50px; width: 75px; padding:5px; display:inline-block; \" src=\"getImg.php?id=". $rowCategory['picID'] . "\">");
        
        print("<div style=\"position:relative; top: 10px; height:50px; display: inline-block;\">");
        print($rowCategory['username'] . "<br>");
        print($rowCategory['name']);
        print("</div></a><br>");
        
    }
    
    //if($rowNCR['COUNT(*)']>0)
        print("</div>"); 


    mysql_free_result($resultCategory);
    mysql_free_result($numberCategoryResults);
    
    //Get and print tag results
    $resultTag= mysql_query($queryTag);
    $countqueryTag = "SELECT COUNT(*) FROM " . substr($queryTag, 42);
    $numberTagResults = mysql_query($countqueryTag);
    $rowNTR = mysql_fetch_array($numberTagResults, MYSQL_ASSOC);
    print("<div class=\"searchDivider\" style=\"left:297px\">");
    
    if($rowNTR['COUNT(*)']>6){
        $length=6;
        print("<a href=\"showall.php?q=" . $term. "&t=tag\">". $rowNTR['COUNT(*)']." results found. See all.</a><br>");
    }
    else
        $length=$rowNTR['COUNT(*)'];
    
    for($i=0; $i<$length;$i++){
        $rowTag = mysql_fetch_array($resultTag, MYSQL_ASSOC);
        print("<a href=\"picture.php?id=". $rowTag['picID'] ."\">");
        print("<img style=\"position:relative; top: 10px;   height: 50px; width: 75px; padding:5px; display:inline-block; \" src=\"getImg.php?id=". $rowTag['picID'] . "\">");
        
        print("<div style=\"position:relative; top: 10px; height:50px; display: inline-block;\">");
        print($rowTag['username'] . "<br>");
        print($rowTag['name']);
        print("</div></a><br>");
        
        
    }
    print("</div>");  
 

    mysql_free_result($resultTag);
    mysql_free_result($numberTagResults);
    //Get and print user results
    $resultUser= mysql_query($queryUser);
    $countqueryUser = "SELECT COUNT(*) FROM " . substr($queryUser, 42);
    $numberUserResults = mysql_query($countqueryUser);
    $rowNUR = mysql_fetch_array($numberUserResults, MYSQL_ASSOC);
    print("<div class=\"searchDivider\" style=\"right:0px\">");
    
    if($rowNUR['COUNT(*)']>6){
        $length=6;
        print("<a href=\"showall.php?q=" . $term. "&t=user.php\">". $rowNUR['COUNT(*)']." results found. See all.</a><br>");
    }
    else
        $length=$rowNUR['COUNT(*)'];
    
    for($i=0; $i<$length;$i++){
        $rowUser = mysql_fetch_array($resultUser, MYSQL_ASSOC);
        print("<a href=\"user.php?id=". $rowUser['userID'] ."\">");
        if($rowUser['avatar'])
            print("<img style=\"position:relative; top: 10px;   height: 50px; width: 50px; padding:5px; display:inline-block; \" src=\"getAvatar.php?uid=". $rowUser['userID'] . "\">");
        else
            print("<img style=\"position:relative; top: 10px;   height: 50px; width: 50px; padding:5px; display:inline-block; \" src=\"img/defaultavatar.png\">");
        print("<div style=\"position:relative; top: 10px; height:50px; display: inline-block;\">");
        print($rowUser['username']);
        
        print("</div></a><br>");
       
        
    }
    print("</div>");
    print("</div>"); 
    mysql_free_result($resultUser);
    mysql_free_result($numberUserResults);
    mysql_close();
?>

    </div>  
    
</body>
<html>
    
   