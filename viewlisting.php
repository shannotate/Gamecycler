<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GameCycler Listing</title>
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
			$listingID = $_GET['listingID'];
			if (isset('listingID')) {
			
				$query = "SELECT * FROM `listings` WHERE `listingID` = '$listingID'"";
				
				$result = mysqli_query($db, $query)
					or die(mysqli_error($db));
				
				$row = mysqli_fetch_array($result);
				
				$title = $row['title'];
				$platform = $row['platform'];
				$condition = $row['condition'];
				$price = $row['price'];
				
				echo "<h3>Title: $title</h3>";
				echo "<h3>Platform: $platform</h3>";
				echo "<h3>Condition: $condition</h3>";
				echo "<h3>Price: $price</h3>";
			
				}
        
        ?>
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
