<?php
session_start();
session_unset();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GameCycler Examples</title>
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
			include "db_connect.php";
			if ($_SESSION['submitattempt'] == 1) {
				echo "<h2>Please log in before submitting a game.</h2>";
				echo "<p>&nbsp;</p>";
			}
            ?>
            
            <h3>Form</h3>

            <fieldset>
                <legend>Login</legend>
                
					<form action="welcome.php" method="post">
					
                    <p><label for="email">Email:</label>
                    <input name="email" id="email" value="" type="text" /></p>
                    <p><label for="password">Password:</label>
                    <input name="password" id="password" type="password" /></p>

                    <p><input name="submit" style="margin-left: 150px;" class="formbutton" value="Submit" type="submit" /></p>
                </form>
            </fieldset>
            
        </div>

        <div class="sidebar">
        </div>
    	<div class="clear"></div>
    </div>
    <div id="footer">
        <div class="footer-content">
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; GameCycler 2012 | Design by GameCycler Team | <a href="http://www.justfreetemplates.com">Free Web Templates</a></p>
         </div>
    </div>
</div>
</body>
</html>
