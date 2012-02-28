<?php
session_start();
if (isset($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
}
else {
	$_SESSION['submitattempt'] = 1;
	header( 'Location: login.php' );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GameCycler List a Game for Sale</title>
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
            <li><a href="createaccount.php">Sign Up</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="gamesubmit.php">Submit a Game</a></li>
            <li><a href="search.php">Search Games</a></li>
            <li><a href="usersearch.php">Search Users</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			
			<?php

			?>
            
            
            <p>&nbsp;</p>

            <fieldset>
                <legend>Submit a game for sale</legend>
                <form action="confirm.php" method="post">
                    <p><label for="title">Game Title:</label>
                    <input name="title" id="title" value="" type="text" /></p>

                    <p><label for="platform">Platform:</label>
                    <select name="platform">
                    <option value="PC">PC</option>
                    <option value="OSX">OS X</option>
					<option value="360">XBox360</option>
					<option value="PS3">PlayStation 3</option>
					<option value="PS2">PlayStation 2</option>
					<option value="PSOne">PlayStation</option>
					<option value="N64">Nintendo 64</option>
					<option value="SNES">Super Nintendo</option>
					<option value="NES">Nintendo</option>
					<option value="XBox">XBox</option></p>
					</select>
					
					<p><label for="condition">Condition</label>
					
					<select name="condition">
                    <option value="Pristine">Pristine</option>
                    <option value="Excellent">Excellent</option>
					<option value="Good">Good</option>
					<option value="Bad">Bad</option>
					<option value="Terrible">Terrible</option></p>
					</select>
					
					<p><label for="price">Price</label>
					<input name="price" id="price" type="text" /></p>
					
                    <p><input name="submit" style="margin-left: 150px;" class="formbutton" value="Submit" type="submit" /></p>
                </form>
            </fieldset>
            
        </div>
        
        <div class="sidebar">
            <ul>	
               <li>
                    <h3>Navigate</h3>
                    <ul class="blocklist">
                        <li><a href="index.php">Home</a></li>
						<li><a href="createaccount.php">Create an Account!</a></li>
                        <li><a href="gamesubmit.php">Post a Game!</a></li>
						<li><a href="search.php">Search for Games!</a></li>
                    </ul>
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
            <p>&copy; GameCycler 2012 | Design by GameCycler Team | <a href="http://www.justfreetemplates.com">Free Web Templates</a></p>
         </div>
    </div>
</div>
</body>
</html>
