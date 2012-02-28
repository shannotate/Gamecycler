<?php
session_start();
session_unset();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GameCycler Create Account</title>
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
            <fieldset>
                 <legend>Create an account</legend>
                <form action="welcome.php?newaccount=1" method="post">
                    <p><label for="email">Email:</label>
                    <input name="email" id="email" value="" type="text" /></p>
					
					<p><label for="password">Password:</label>
					<input name="password" id="password" type="password" /></p>
					
					<p><label for="firstname">First Name:</label>
					<input name="firstname" id="firstname" type="text" /></p>
					
					<p><label for="lastname">Last Name:</label>
					<input name="lastname" id="lastname" type="text" /></p>
					
					<p><label for="address">Address:</label>
					<input name="address" id="address" type="text" /></p>
					
					<p><label for="apt">Address Line 2:</label>
					<input name="apt" id="apt" type="text" /></p>
					
					<p><label for="country">Country:</label>
					<input name="country" id="country" type="text" /></p>
					
					<p><label for="city">City:</label>
					<input name="city" id="city" type="text" /></p>
					
					<p><label for="zipcode">Zipcode:</label>
					<input name="zipcode" id="zipcode" type="text" /></p>
					
                    <p><input name="submit" style="margin-left: 150px;" class="formbutton" value="Submit" type="submit" /></p>
                </form>
            </fieldset>
            
        </div>
        
        <div class="sidebar">
            <ul>	
			<li>
				<h3>About</h3>
				<ul>
					<li>
						<p style="margin: 0;">GameCycler was created by four students at the University of Mary Washington.  It it copyrighted under the Creative Commons license</p>
					</li>
            </ul> 
			</li>
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
