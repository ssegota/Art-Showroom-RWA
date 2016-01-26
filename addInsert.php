<?php
	@mysql_connect("localhost", "root", "vertrigo");
	@mysql_select_db("rwa_projekt");
	
$tags = $_GET['t'];
$cats = $_GET['c'];
$pic = $_GET['p'];

$divTags = explode(" ", $tags);
$divCats = explode(" ", $cats);

$getLastTag="SELECT tagID FROM tag ORDER BY tagID DESC LIMIT 1";
$resultTag=mysql_query($getLastTag);
$rowTag=mysql_fetch_array($resultTag, MYSQL_ASSOC);

$resultTag=mysql_query($getLastTag);
$rowTag=mysql_fetch_array($resultTag, MYSQL_ASSOC);

for($i=0; $i<sizeof($divTags); $i++){
    $query="INSERT INTO tag VALUES(NULL, '" . $divTags[$i]. "')";
    $tagident=$rowTag['tagID']+$i+1;
    $query2="INSERT INTO pic_tag VALUES('".$pic."', '".$tagident."')";
    mysql_query($query);
    
    
}

for($i=0; $i<sizeof($divCats); $i++){
    $query="INSERT INTO pic_kat VALUES ('".$pic."', '".$divCats[$i]."')";
    
    mysql_query($query);
   
}
?>