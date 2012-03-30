<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GameCycler Search</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<!--
genesis, a free CSS web template by spyka Webmaster (www.spyka.net)

Download: http://www.spyka.net/web-templates/genesis/

License: Creative Commons Attribution
//-->
</head>
<body>
<div id="container">
	<div id="header">
    	<h1><a href="/">GameCycler</a></h1>
        <h2>Where dead games are reborn</h2>
        <div class="clear"></div>
    </div>
    <div id="nav">
    	<ul>
        	<li class="start"><a href="index.php">Home</a></li>
            <li><a href="search.php">Search Games</a></li>
			<?php
			if (isset($_SESSION['firstname'])) {
				echo "<li><a href=\"logout.php\">Logout</a></li>";
				echo "<li><a href=\"gamesubmit.php\">Submit a Game</a></li>";
			}
			else {
				echo "<li><a href=\"login.php\">Login</a></li>";
				echo "<li><a href=\"createaccount.php\">Sign Up</a></li>";
			}
			?>
        </ul>
    </div>
    <div id="body">
		<div id="content">
            <p><strong>Search through our database here</strong> </p>
	<br><Br>
		<fieldset>
		<form action="searchresults.php" method="post">
			<p><label for="title">Title:</label>
			<input type="text" name="title" /><br /></p>
			<p><label for="platform">Platform:</label>
			<input type="text" name="platform" /></p>
			
			<p><label for="condition">Condition:</label>
			<select name="condition"></p>
			<option value="1">1 - Pristine</option>
			<option value="2">2 - Excellent</option>
			<option value="3" selected="selected">3 - Good</option>
			<option value="4">4 - Bad</option>
			<option value="5">5 - Terrible</option>
			<option value="6">All</option> 
			</select>
			
			<p><label for="price">Price:</label>
			<select name="price"></p>
			<option value="10">Less than $10</option>
			<option value="20">Less than $20</option>
			<option value="30" selected="selected">Less than $30</option>
			<option value="40">Less than $40</option>
			<option value="allprice">All</option>
			</select>
			<p><input name="submit" style="margin-left: 150px;" class="formbutton" value="Go!" type="submit" /></p>
		</form>
		</fieldset>
		
		</div>
        
        <div class="sidebar">
            <ul>	
				<h3>About</h3>
				<li>
                  	<p style="margin: 0;">GameCycler was created by four students at the University of Mary Washington.  It it copyrighted under the Creative Commons license</p>
                </li>
            </ul> 
        </div>
    	<div class="clear"></div>
    </div>
    <div id="footer">
        <div class="footer-content">
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; GameCycler 2012 | Design by GameCycler Team | Template Source: <a href="http://www.spyka.net" title="spyka webmaster">spyka Webmaster</a> <a href="http://www.justfreetemplates.com">Free Web Templates</a></p>
         </div>
    </div>
</div>
</body>
</html>
