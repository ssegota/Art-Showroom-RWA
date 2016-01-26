<?php
    session_start();
    ini_set("SMTP","aspmx.l.google.com");
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: test@gmail.com" . "\r\n";
    if(!(isset($_SESSION['loggedin']))){
                header ("Location: login_form.php");
                exit; // stop further executing, very important
            }
    @mysql_connect("localhost", "root", "vertrigo");
    @mysql_select_db("rwa_projekt");  
    $query="SELECT userID, mail FROM korisnik WHERE username='". $_SESSION['login_user']."'";
    $result=mysql_query($query);
    $row=mysql_fetch_array($result, MYSQL_ASSOC);	
    
    $queryAuthor="SELECT userID,username,picID FROM korisnik,picture WHERE userID=uID AND picID='". $_GET['id']."'";
    $resultAuthor=mysql_query($queryAuthor);
    $rowAuthor=mysql_fetch_array($resultAuthor, MYSQL_ASSOC);
    print("Your mail has been sent. Here's the text:<br>");
    $mail="Hey " . ucwords(strtolower($rowAuthor['username']))." it seems that " . ucwords($_SESSION['login_user']). " wants to order a print from you!\n";
    $mail.="This is picture in question: " . "<a href=\"picture.php?id=".$_GET['id']."\">Link.</a>";
    $mail.="This is his/hers mail: ". $row['mail'] ."\n";
    $mail.="Please contact him/her to arrange the details!";  
    print($mail); 
    print("Click here to get back: <a href=\"picture.php?id=".$_GET['id']."\">Link.</a>");

$queryInsert="INSERT INTO request VALUES(NULL,'".$rowAuthor['userID']."', '".$row['userID']."', '".$mail."')";

mysql_query($queryInsert);  

mysql_free_result($result);     
mysql_free_result($resultAuthor);
mysql_close();
?>