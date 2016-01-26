<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>ArtShowroom</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>ef="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    
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
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<b id="index"><a href="index.php">index</a></b>

Tools:<br>
<a href="update.php">Update or Change user info.</a></b><br>
<a href="upload.php">upload picture</a></b><br>
<a href="add.php">Add tags and categories to pictures</a></b><br>
<a href="requests.php">Received Requests</a></b><br>

</div>
</body>
</html>