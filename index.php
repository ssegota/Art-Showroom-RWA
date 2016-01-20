<html>
<head>
	<style>
	
		body{
		background-color:rgba(165, 200, 200, 1);
		}


		#header{
			position: absolute;
			top: 0px;
			padding: 0;
			width: 100%;
			height: 50px;
			left: 0px;
			background: red; /* For browsers that do not support gradients */
			background: -webkit-linear-gradient(rgba(165, 200, 200, 1), rgba(145, 180, 180, 1)); /* For Safari 5.1 to 6.0 */
			background: -o-linear-gradient(rgba(165, 200, 200, 1), rgba(145, 180, 180, 1)); /* For Opera 11.1 to 12.0 */
			background: -moz-linear-gradient(rgba(165, 200, 200, 1), rgba(145, 180, 180, 1)); /* For Firefox 3.6 to 15 */
			background: linear-gradient(rgba(165, 200, 200, 1), rgba(145, 180, 180, 1)); /* Standard syntax */
			
		}

		#log{
			position: absolute;
			height: 25px;
			width: 100px;
			right: 0px;
			bottom: 0px;
			padding: 0px;
			font-size:10px;
		}

			#tfheader{
		background-color:#c3dfef;
	}
	#tfnewsearch{
		
		position: absolute;
		left: 300px;
	}
	.tftextinput{
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
	}
	.tfbutton {
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		outline: none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		border: solid 1px #0076a3; border-right:0px;
		background: #0095cd;
		background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
		background: -moz-linear-gradient(top,  #00adee,  #0078a5);
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;
	}
	.tfbutton:hover {
		text-decoration: none;
		background: #007ead;
		background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
		background: -moz-linear-gradient(top,  #0095cc,  #00678e);
	}
	/* Fixes submit button height problem in Firefox */
	.tfbutton::-moz-focus-inner {
	  border: 0;
	}
	.tfclear{
		clear:both;
	}
	
	.logo{
		height: 50px;
		width: auto;
		position: absolute;
		left: 500px;
	}
	
	#content{
		background-color: white;
		position: absolute;
		top: 150px;
		min-height: 300px;
		min-width: 500px;
	}
	</style>
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
	
	<div id="content">
		<?php include("featured.php"); ?>
	</div>
</body>
<html>
