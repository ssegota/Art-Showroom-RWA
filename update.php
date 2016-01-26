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
        Update your avatar:
    <form action="updateInsertAvatar.php" method="post" enctype="multipart/form-data">
    <label>File: </label><input type="file" name="image" />
    <input type="submit" value="Upload Image" name="submit">
    </form>
        Update other data:
     <form action="updateData.php" method="get">
         Description: <input type="text" name="desc"/>
         <br>Instagram: <input type="text" name="inst"/>
         <br>Facebook: <input type="text" name="face"/>
         <br>Twitter: <input type="text" name="twit"/>
         <br>Tumblr: <input type="text" name="tumb"/>
         <br><input type="submit">
     </form>
</div>

  
    
</body>
<html>