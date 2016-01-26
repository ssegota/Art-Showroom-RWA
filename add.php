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

<form action="addInsert.php" method="get">
    <br>Tags: <input type="text" name="t">
    <br>Categories: <input type="text" name="c">
    <br>PictureID: <input type="text" name="p">
    <input type="submit" value="Add" name="submit">
</form>
Kategorije:
<table>
<tr><td>1</td><td>PHOTOGRAPHY</td></tr>
<tr><td>2</td><td>DIGITAL</td></tr>
<tr><td>3</td><td>PAINTING</td></tr>
<tr><td>4</td><td>DRAWING</td></tr>
<tr><td>5</td><td>GRAYSCALE</td></tr>
<tr><td>6</td><td>COLOR</td></tr>
<tr><td>7</td><td>NATURE</td></tr>
<tr><td>8</td><td>INDUSTRIAL</td></tr>
<tr><td>9</td><td>URBAN</td></tr>   
</table>

</body>
</html> 
    </div>
    
</body>
<html>