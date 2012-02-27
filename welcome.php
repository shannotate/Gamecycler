<?php
session_start();
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
				include "db_connect.php";
				$email = mysqli_real_escape_string($db, $_POST['email']);
				$password =  mysqli_real_escape_string($db, $_POST['password']);
				
				$query = "SELECT * FROM users WHERE email = '$email' AND password = SHA('$password');";
				$result = mysqli_query($db, $query)
					or die(mysqli_error($db));
					
				if ($row = mysqli_fetch_array($result)) {
					$userid = $row['userID'];
					$firstname = $row['firstname'];
					echo "<h2>Welcome, $firstname!</h2>";
					unset($_SESSION['submitattempt']);
					$_SESSION['userid'] = $userid;
					} else {
					echo "<h2>Incorrect email or password.</h2>";
				}
				
			?>
			
            
            <p>&nbsp;</p>

            
            <h3>Lists</h3>
            <ul>
                <li>List item</li>
                <li>List item</li>
                <li>List item</li>
            </ul>
                    
            <ol>
                <li>List item</li>
                <li>List item</li>
                <li>List item</li>
            </ol>

            <p>&nbsp;</p>

            
                
            <h3>Code and blockquote</h3>
            <code>&lt;? echo('Hello world'); ?&gt;</code>

            <blockquote><p>Mauris sit amet tortor in urna tincidunt aliquam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</p></blockquote>

            
            <p>&nbsp;</p>           
            
            <h3>Table</h3>

            <table cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>John Smith</td>
                    <td>28</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Fred James</td>
                    <td>49</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Rachel Johnson</td>
                    <td>19</td>
                </tr>

            </table>

            <p>&nbsp;</p>

            
            <h3>Form</h3>

            <fieldset>
                <legend>Form legend</legend>
                <form action="#" method="get">
                    <p><label for="name">Name:</label>
                    <input name="name" id="name" value="" type="text" /></p>
                    <p><label for="email">Email:</label>
                    <input name="email" id="email" value="" type="text" /></p>

                    <p><label for="message">Message:</label>
                    <textarea cols="37" rows="11" name="message" id="message"></textarea></p>
                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Send" type="submit" /></p>
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
