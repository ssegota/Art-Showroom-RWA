<html>
<head>
    <title>ArtShowroom</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div id="header">
	
		<img class="logo" src="img/logo.png" >
		<div id="log"><a href="login.php">Log in.</a> <a href="signup.php">Sign Up.</a></div>
	
	
		<form method="get" action="http://www.google.com">
		        <input type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
		</form>
	<div class="tfclear"></div>
	</div>
	

    <div id="mainContainer">
		<?php include("featured.php"); ?>
    </div>
    
</body>
<html>
