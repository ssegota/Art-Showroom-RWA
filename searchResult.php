<?php
    $term=strtoupper($_GET['q']);
    $dividedTerm=explode(" ", $term);
	
    @mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
    
    //Make queries
    for($i=0; $i<sizeof($dividedTerm); $i++){
        
        if($i==0){
            $queryCategory="SELECT name, picReference,description,username FROM pic_kat, picture, kategorija, korisnik WHERE p_id=picID AND k_id=katID AND uID=userID AND (katName=\"" . $dividedTerm[$i] . "\" ";
        }
        else if($i>0){
            $queryCategory .= "OR katName=\"" . $dividedTerm[$i] . "\" " ;
        }
    }
    $queryCategory.= ")";
    
    //Get and print category results
    //print($query);
    //print("<br><br>");
    $resultCategory = mysql_query($queryCategory);
    $countQueryCategory= "SELECT COUNT(*) FROM " . substr($queryCategory, 51);
    //print($countQuery);
    //print("<br><br>");
    $numberCategoryResults = mysql_query($countQueryCategory);
    $rowNCR = mysql_fetch_array($numberCategoryResults, MYSQL_ASSOC);


    for($i=0; $i<$rowNCR['COUNT(*)']; $i++){
        $rowCategory = mysql_fetch_array($resultCategory, MYSQL_ASSOC);	
        print($rowCategory['name']);
        print($rowCategory['description']);
        print($rowCategory['username']);
        print("<br>");
    }
    mysql_free_result($resultCategory);
    mysql_free_result($numberCategoryResults);
    
    //Get and print tag results
    
    //Get and print user results
    mysql_close();
?>