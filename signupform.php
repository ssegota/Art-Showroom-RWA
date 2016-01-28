<!DOCTYPE html>
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
            <a href="login.php">Log in.</a> <a href="signup.php">Sign Up.</a>;
        </div>
	
	
		<form method="get" action="searchResult.php">
		        <input type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
		</form>
	<div class="tfclear"></div>
	</div>
	

    <div id="mainContainer" style="text-align: center;">
		<form  action="signup.php" method="post">

         username: <input type="text" name="username" maxlength="24"><br>
         password: <input type="password" name="password" maxlength="32"><br>
         mail: <input type="text" name="mail" maxlength="254"><br>  

         <input type="submit">
         </form>
    </div>
    
</body>
<html>
    
    