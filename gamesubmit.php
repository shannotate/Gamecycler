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
        	<li class="start"><a href="index.html">Home</a></li>
            <li><a href="examples.html">Examples</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Solutions</a></li>
            <li class="end"><a href="#">Contact</a></li>
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="examples.html">Examples</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Solutions</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </li>
                
                <li>
                    <h3>About</h3>
                    <ul>
                        <li>
                        	<p style="margin: 0;">Aenean nec massa a tortor auctor sodales sed a dolor. Duis vitae lorem sem. Proin at velit vel arcu pretium luctus.</p>
                        </li>
                    </ul>
                </li>
                
                <li>
                	<h3>Search</h3>
                    <ul>
                    	<li>
                            <form method="get" class="searchform" action="http://wpdemo.justfreetemplates.com/" >
                                <p>
                                    <input type="text" size="20" value="" name="s" class="s" />
                                    <input type="submit" class="searchsubmit formbutton" value="Search" />
                                </p>
                            </form>	
						</li>
					</ul>
                </li>
                
                <li>
                    <h3>Sponsors</h3>
                    <ul>
                        <li><a href="http://www.themeforest.net/?ref=spykawg" title="premium templates"><strong>ThemeForest</strong></a> - premium HTML templates, WordPress themes and PHP scripts</li>
                        <li><a href="http://www.dreamhost.com/r.cgi?259541" title="web hosting"><strong>Web hosting</strong></a> - 50 dollars off when you use promocode <strong>awesome50</strong></li>
                        <li><a href="http://www.4templates.com/?aff=spykawg" title="4templates"><strong>4templates</strong></a> - brilliant premium templates</li>
                    </ul>
                </li>
                
            </ul> 
        </div>
    	<div class="clear"></div>
    </div>
    <div id="footer">
        <div class="footer-content">
            <ul>
            	<li><h4>Proin accumsan</h4></li>
                <li><a href="#">Rutrum nulla a ultrices</a></li>
                <li><a href="#">Blandit elementum</a></li>
                <li><a href="#">Proin placerat accumsan</a></li>
                <li><a href="#">Morbi hendrerit libero </a></li>
                <li><a href="#">Curabitur sit amet tellus</a></li>
            </ul>
            
            <ul>
            	<li><h4>Condimentum</h4></li>
                <li><a href="#">Curabitur sit amet tellus</a></li>
                <li><a href="#">Morbi hendrerit libero </a></li>
                <li><a href="#">Proin placerat accumsan</a></li>
                <li><a href="#">Rutrum nulla a ultrices</a></li>
                <li><a href="#">Cras dictum</a></li>
            </ul>
            
            <ul class="endfooter">
            	<li><h4>Suspendisse</h4></li>
                <li><a href="#">Morbi hendrerit libero </a></li>
                <li><a href="#">Proin placerat accumsan</a></li>
                <li><a href="#">Rutrum nulla a ultrices</a></li>
                <li><a href="#">Curabitur sit amet tellus</a></li>
                <li><a href="#">Donec in ligula nisl.</a></li>
            </ul>
            
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; GameCycler 2010. Design by GameCycler Team | <a href="http://www.justfreetemplates.com">Free Web Templates</a></p>
         </div>
    </div>
</div>
</body>
</html>
