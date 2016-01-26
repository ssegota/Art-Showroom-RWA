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
<!DOCTYPE html>
<html>
<body>

<form action="uploadPic.php" method="post" enctype="multipart/form-data">
    <label>File: </label><input type="file" name="image" />
    <br>Name: <input type="text" name="title">
    <br>Description: <input type="text" name="desc">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html> 
    </div>
    
</body>
<html>
