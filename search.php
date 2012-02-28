<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GameCycler</title>
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
			<?php
			if (isset($_SESSION['firstname']))
				echo "How you be, $_SESSION[firstname]?!";
			?>
			<h2>Search</h2>
            <p><strong>Search through our database here</strong> </p>
	<br><Br>
		<form action="searchresults.php" method="post">
			Title: <input type="text" name="title" /><br />
			Platform: <input type="text" name="platform" />
			Condition <input type="text" name="condition" />
			Price: <select name="price">
			<option value="10">Less than $10</option>
			<option value="20">Less than $20</option>
			<option value="30" selected="selected">Less than $30</option>
			<option value="40">Less than $40</option>
			<option value="allprice">All</option>
			</select>
			<button type="submit">Go!</button>
		</form>
		
		</div>
        
        <div class="sidebar">
            <ul>	

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
