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
		<form method="get" action="signup.php">
            <center>
            <table>
            <tr><td>Username*:</td><td><input type="text" class="tftextinput2" name="uname" size="21" maxlength="24"></td></tr>
            <tr><td>Password*:</td><td><input type="password" class="tftextinput2" name="pass" size="21" maxlength="32"></td></tr>
            <tr><td>Repeat Password*:</td><td><input type="password" class="tftextinput2" name="passrepeat" size="21" maxlength="32"></td></tr>
            <tr><td>e-mail*:</td><td><input type="text" class="tftextinput2" name="mail" size="21" maxlength="254"></td></tr>
            
            
            <tr><td  colspan="2">Only fill in below information if you're planning on <br>buying prints from artists</td></tr>
            <tr><td>Address:</td><td><input type="text" class="tftextinput2" name="address" size="21" maxlength="24"></td></tr>
            <tr><td>City:</td><td><input type="text" class="tftextinput2" name="city" size="21" maxlength="24"></td></tr>
            <tr><td>Country:</td><td><input type="text" class="tftextinput2" name="country" size="21" maxlength="24"></td></tr>
            <tr><td  colspan="2">Personalize your account a bit by adding an avatar and <br>a short description of you.</td></tr>
            <tr><td>About me:</td><td><input type="textarea" class="tftextinput2" name="about" size="21" maxlength="500"></td></tr>
            <tr><td>Avatar:</td><td><input type="file" class="tftextinput2" name="avatar" size="<10></10>"></td></tr>
            <tr><td  colspan="2"><input type="submit" value="Sign me up!" class="tfbutton2"></td></tr>
            </table>
            </center>
         </form>   
    </div>
    
</body>
<html>
    
    