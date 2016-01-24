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
	$type=$_GET['t'];
    
    @mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
    
    if($type=="category"){
    for($i=0; $i<sizeof($dividedTerm); $i++){
        
        if($i==0){
            $queryCategory="SELECT name, picID,description,username FROM pic_kat, picture, kategorija, korisnik WHERE p_id=picID AND k_id=katID AND uID=userID AND (katName=\"" . $dividedTerm[$i] . "\" ";
        }
        else if($i>0){
            $queryCategory .= "OR katName=\"" . $dividedTerm[$i] . "\" " ;
        }
    }
    $queryCategory.= ")";
    
    $resultCategory = mysql_query($queryCategory);
    $countQueryCategory= "SELECT COUNT(*) FROM " . substr($queryCategory, 44);
    $numberCategoryResults = mysql_query($countQueryCategory);
    $rowNCR = mysql_fetch_array($numberCategoryResults, MYSQL_ASSOC);
    
    for($i=0; $i<6; $i++){ 
        $rowCategory = mysql_fetch_array($resultCategory, MYSQL_ASSOC);
        print("<a href=\"picture.php?id=". $rowCategory['picID'] ."\">");
        print("<div style= \"padding:6px; border: dotted; border-width: 1px; display:inline-block;\">");
        print("<img style=\"position:relative; top: 10px;   height: 50px; width: 75px; padding:5px; display:inline-block; \" src=\"getImg.php?id=". $rowCategory['picID'] . "\">");
        
        print("<div style=\"position:relative; top: 10px; height:50px; display: inline-block;\">");
        print($rowCategory['username'] . "<br>");
        print($rowCategory['name']);
        print("</div>");
        print("</div></a>");
        
    }
    mysql_free_result($resultCategory);
    mysql_free_result($numberCategoryResults);
    }
    
    
    else if($type=="tag"){
    for($i=0; $i<sizeof($dividedTerm); $i++){
        
        if($i==0){
            $queryTag="SELECT DISTINCT username,name, picID FROM tag, picture, pic_tag,korisnik WHERE uID=userID AND picID=p_id AND tagID=t_id AND (tagName=\"" . $dividedTerm[$i] . "\"";
        }
        else if($i>0){
            $queryTag .= "OR tagName=\"" . $dividedTerm[$i] . "\"";
        }
    }
    $queryTag.= ")";   
    $resultTag= mysql_query($queryTag);
    $countqueryTag = "SELECT COUNT(*) FROM " . substr($queryTag, 42);
    $numberTagResults = mysql_query($countqueryTag);
    $rowNTR = mysql_fetch_array($numberTagResults, MYSQL_ASSOC);
    for($i=0; $i<$rowNTR['COUNT(*)'];$i++){
        $rowTag = mysql_fetch_array($resultTag, MYSQL_ASSOC);
        print("<a href=\"picture.php?id=". $rowTag['picID'] ."\">");
        print("<div style= \"padding:6px; border: dotted; border-width: 1px; display:inline-block;\">");
        print("<img style=\"position:relative; top: 10px;   height: 50px; width: 75px; padding:5px; display:inline-block; \" src=\"getImg.php?id=". $rowTag['picID'] . "\">");
        
        print("<div style=\"position:relative; top: 10px; height:50px; display: inline-block;\">");
        print($rowTag['username'] . "<br>");
        print($rowTag['name']);
        print("</div></div></a>");
        
        
    }  
        mysql_free_result($resultTag);
    mysql_free_result($numberTagResults);
    }
    
    else if($type=="user"){
    for($i=0; $i<sizeof($dividedTerm); $i++){
        
        if($i==0){
            $queryUser="SELECT username,userID,about, avatar FROM `korisnik` WHERE (username=\"" . $dividedTerm[$i] . "\" ";
        }
        else if($i>0){
            $queryUser .= "OR username=\"" . $dividedTerm[$i] . "\" " ;
        }
    }
    
    $queryUser.= ")";
    
    $resultUser= mysql_query($queryUser);
    $countqueryUser = "SELECT COUNT(*) FROM " . substr($queryUser, 42);
    $numberUserResults = mysql_query($countqueryUser);
    $rowNUR = mysql_fetch_array($numberUserResults, MYSQL_ASSOC);
    
    for($i=0; $i<$rowNUR['COUNT(*)'];$i++){
        $rowUser = mysql_fetch_array($resultUser, MYSQL_ASSOC);
        print("<a href=\"user.php?id=". $rowUser['userID'] ."\">");
        print("<div style= \"padding:6px; border: dotted; border-width: 1px; display:inline-block;\">");
        if($rowUser['avatar'])
            print("<img style=\"position:relative; top: 10px;   height: 50px; width: 50px; padding:5px; display:inline-block; \" src=\"getAvatar.php?uid=". $rowUser['userID'] . "\">");
        else
            print("<img style=\"position:relative; top: 10px;   height: 50px; width: 50px; padding:5px; display:inline-block; \" src=\"img/defaultavatar.png\">");
        print("<div style=\"position:relative; top: 10px; height:50px; display: inline-block;\">");
        print($rowUser['username']);
        
        print("</div></div></a><br>");
       
        
    }
    mysql_free_result($resultUser);
    mysql_free_result($numberUserResults);
    }
    
    else{
        $query=$_GET['q'];
        
        $result = mysql_query($query);
        $countQuery= "SELECT COUNT(*) FROM picture WHERE uID='" . $_GET['t']."'";	
        
        $numberResults = mysql_query($countQuery);
        $rowNR = mysql_fetch_array($numberResults, MYSQL_ASSOC);
        for($i=0; $i<$rowNR['COUNT(*)']; $i++){
        $row = mysql_fetch_array($result, MYSQL_ASSOC);	
        print("<a href=\"picture.php?id=". $row['picID'] ."\">");
         print("<div style= \"padding:6px; border: dotted; border-width: 1px; display:inline-block;\">");
        print("<img style=\"position:relative; top: 10px;   height: 50px; width: 75px; padding:5px; display:inline-block; \" src=\"getImg.php?id=". $row['picID'] . "\">");
        
        print("<div style=\"position:relative; top: 10px; height:50px; display: inline-block;\">");
        print($row['name']);
        print("</div></div></a>");
    }
    }
    mysql_close();
?>

    </div>  
    
</body>
<html>