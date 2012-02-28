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
				
				if ($_GET['newaccount'] == 1) {
					$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
					$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
					$street = mysqli_real_escape_string($db, $_POST['address']);
					$apt = mysqli_real_escape_string($db, $_POST['apt']);
					$country = mysqli_real_escape_string($db, $_POST['country']);
					$city = mysqli_real_escape_string($db, $_POST['city']);
					$zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
					
					$query = "SELECT * FROM users WHERE `email` = '$email';";
					
					$result = mysqli_query($db, $query)
						or die(mysqli_error($db));
						
					if ($row = mysqli_fetch_array($result)) {
						echo "<h2>That email address is taken.</h2>";
					} else {
						$query = "INSERT INTO users	(
								`firstname`, `lastname`, `email`, `password`, `street`, `apt`, `country`, `city`, `zipcode`)
								VALUES (
								'$firstname', '$lastname', '$email', SHA('$password'), '$street', '$apt', '$country', '$city', '$zipcode');";
					
						$result = mysqli_query($db, $query)
							or die(mysqli_error($db));
							
						echo "<h2>Thanks for registering, $firstname</h2>";
						
						$query = "SELECT * FROM users WHERE email = '$email';";
						$result = mysqli_query($db, $query)
							or die(mysqli_error($db));
							
						if ($row = mysqli_fetch_array($result)) {
							$userid = $row['userID'];
							$_SESSION['userid'] = $userid;
						}
					}
					
				}
				else {
					$query = "SELECT * FROM users WHERE email = '$email' AND password = SHA('$password');";
					$result = mysqli_query($db, $query)
						or die(mysqli_error($db));
					
					if ($row = mysqli_fetch_array($result)) {
						echo "<h2>Welcome, $firstname!</h2>";
						$userid = $row['userID'];
						$firstname = $row['firstname'];
						unset($_SESSION['submitattempt']);
						$_SESSION['userid'] = $userid;
						} else {
							echo "<h2>Incorrect email or password.</h2>";
						}
				}
			?>
			
            
            <p>&nbsp;</p>

            
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
