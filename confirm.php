<?php
session_start();
?>
<!--confirm game submission-->
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
				include "db_connect.php";
				$userid = $_SESSION['userid'];
				$title = $_POST['title'];
				$platform = $_POST['platform'];
				$condition = $_POST['condition'];
				$price = $_POST['price'];
				
				$query = "INSERT INTO listings 
						(`title`, `platform`, `condition`, `price`, `userID`) 
						VALUES 
						('$title', '$platform', '$condition', '$price', '$userid');";
						
				$result = mysqli_query($db, $query)
					or die(mysqli_error($db));
				
				
				$_SESSION['justposted'] = 1;
				echo "<h3>Thank you!</h3>";	
				echo "&nbsp;";
				echo "<a href=\"viewlisting.php\">Click here</a> to view your listing.";
				
				?>
			
            
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
