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
            $queryUser="SELECT username,avatar,about FROM `korisnik` WHERE (username=\"" . $dividedTerm[$i] . "\" ";
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
            $queryTag="SELECT DISTINCT name, picID FROM tag, picture, pic_tag WHERE picID=p_id AND tagID=t_id AND (tagName=\"" . $dividedTerm[$i] . "\"";
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
    for($i=0; $i<$rowNCR['COUNT(*)']; $i++){
        $rowCategory = mysql_fetch_array($resultCategory, MYSQL_ASSOC);
        $top=$i*170;	
        print("<div>");
        print("<img style=\"height: 150px; width: 250px; padding:5px; position:absolute; top:" . $top. "px;\" src=\"getimg.php?id=". $rowCategory['picID'] . "\">");
        print("<div class=\"coverDiv\" style=\"; top:" . $top .";\">");
        print($rowCategory['name']);
        print($rowCategory['username']);
        print("</div>");
        
    }
    print("</div>");
    if($rowNCR['COUNT(*)']>0)
        print("</div>"); 
    mysql_free_result($resultCategory);
    mysql_free_result($numberCategoryResults);
    
    //Get and print tag results
    $resultTag= mysql_query($queryTag);
    $countqueryTag = "SELECT COUNT(*) FROM " . substr($queryTag, 33);
    $numberTagResults = mysql_query($countqueryTag);
    $rowNTR = mysql_fetch_array($numberTagResults, MYSQL_ASSOC);
    print("<div class=\"searchDivider\" style=\"left:297px\">");
    for($i=0; $i<$rowNTR['COUNT(*)'];$i++){
        $rowTag = mysql_fetch_array($resultTag, MYSQL_ASSOC);
        $top=$i*170;	
        print("<img style=\"height: 150px; width: 250px; padding:15px; position:absolute; top:" . $top. "px;\" src=\"getimg.php?id=". $rowTag['picID'] . "\">");
        print("<div class=\"coverDiv\" style=\"; top:" . $top .";\">");
        print($rowTag['name']);
        print("</div>");
        
    }
    print("</div>");  
 

    mysql_free_result($resultTag);
    mysql_free_result($numberTagResults);
    //Get and print user results
    $resultUser= mysql_query($queryUser);
    $countqueryUser = "SELECT COUNT(*) FROM " . substr($queryUser, 33);
    $numberUserResults = mysql_query($countqueryUser);
    $rowNUR = mysql_fetch_array($numberUserResults, MYSQL_ASSOC);
    print("<div class=\"searchDivider\" style=\"right:0px\">");
    for($i=0; $i<$rowNUR['COUNT(*)'];$i++){
        $rowUser = mysql_fetch_array($resultUser, MYSQL_ASSOC);
        
        print($rowUser['username']);
        print($rowUser['about']);
        print("<br>");
        
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