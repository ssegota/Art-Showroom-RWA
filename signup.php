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
@mysql_connect("localhost", "root", "vertrigo");
@mysql_select_db("rwa_projekt");

$username="";
if(isset($_POST['username']))
    $username = $_POST['username'];
print($username."<br>");

$password="";
if(isset($_POST['password']))
    $password = $_POST['password'];
print($password."<br>");
$reppassword="";

$mail="";
if(isset($_POST['mail']))
    $mail = $_POST['mail'];
print($mail."<br>");


$query="INSERT INTO korisnik (username, pass, mail) VALUES ('".$username."','".$password."','".$mail."')";

mysql_query($query)OR print ("ERROR: duplicate username or mail");;

?>
    </div>
    
</body>
<html>
