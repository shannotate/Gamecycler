<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GameCycler Welcome</title>
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
					$_SESSION['firstname'] = $row['firstname'];
					echo "<h2>Welcome, $_SESSION[firstname]!</h2>";
					echo "Perhaps you'd like to <a href=\"gamesubmit.php\">submit</a> a listing?";
					$userid = $row['userID'];
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
                    <h3>About</h3>
                    <ul>
						<li>
                        	<p style="margin: 0;">GameCycler was created by four students at the University of Mary Washington.  It it copyrighted under the Creative Commons license</p>
                        </li>
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
