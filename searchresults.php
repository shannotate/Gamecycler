<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GameCycler Search Results</title>
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
				echo "How're tricks, $_SESSION[firstname]?!";
			?>
			<h2>Search</h2>
            <p><strong>Search through our database here</strong> </p>
	<br><Br>
		<fieldset>
		<form action="searchresults.php" method="post">
			<p><label for="title">Title:</label>
			<input type="text" name="title" /><br /></p>
			<p><label for="platform">Platform:</label>
			<input type="text" name="platform" /></p>
			
			<p><label for="condition">Condition:</label>
			<select name="condition"></p>
			<option value="1">1 - Pristine</option>
			<option value="2">2 - Excellent</option>
			<option value="3" selected="selected">3 - Good</option>
			<option value="4">4 - Bad</option>
			<option value="5">5 - Terrible</option>
			</select>
			
			<p><label for="price">Price:</label>
			<select name="price"></p>
			<option value="10">Less than $10</option>
			<option value="20">Less than $20</option>
			<option value="30" selected="selected">Less than $30</option>
			<option value="40">Less than $40</option>
			<option value="allprice">All</option>
			</select>
			<p><input name="submit" style="margin-left: 150px;" class="formbutton" value="Go!" type="submit" /></p>
		</form>
		</fieldset>
		
		<?php
		include "db_connect.php";

		$query = "SELECT title, platform, `condition`, price, email FROM listings NATURAL JOIN users";

		if (empty($_POST['title']) == false)
		{
			$titleSearch = mysqli_real_escape_string($db, trim($_POST['title']));
			$query .= " WHERE (title LIKE '$titleSearch%' OR title LIKE '%$titleSearch%')";
			$result = mysqli_query($db, $query)
				or die("Error Querying Database");
		}

		if (empty($_POST['platform']) == false) {
			if (empty($_POST['title']) == true)
				$query .= " WHERE";
			else
				$query .= " AND";
			$platformSearch = mysqli_real_escape_string($db, trim($_POST['platform']));
			$query .= " (platform LIKE '$platformSearch%' OR platform LIKE '%$platformSearch%')";
		}

		if (empty($_POST['condition']) == false && ($_POST['condition']) != 6)
		{
			if (empty($_POST['title']) == true && empty($_POST['platform']) == true)
				$query .= " WHERE";
			else
				$query .= " AND";
			$conditionSearch = $_POST['condition'];
			$query .= " (`condition` = $conditionSearch)";
		}

		$priceSearch = mysqli_real_escape_string($db, trim($_POST['price']));
		if (empty($_POST['title']) == true && empty($_POST['platform']) == true && empty($_POST['condition']) == true)
		{
			if ($priceSearch <> 'allprice')
				$query .= " WHERE price <= $priceSearch ORDER BY price";
			else
				$query .= " ORDER BY price DESC";
		}
		else
		{
			if ($priceSearch <> 'allprice')
				$query .= " AND price <= $priceSearch ORDER BY title, price DESC";
			else
				$query .= " ORDER BY title, price DESC";
		}

		$result = mysqli_query($db, $query)
			or die("Error Querying Database");

		echo "<table id=\"hor-minimalist-b\">\n<tr><th>Title</th><th>Platform</th><th>Condition</th><th>Price</th><th>UserID</th><tr>\n\n";
		while($row = mysqli_fetch_array($result)) {
			$title = $row['title'];
			$platform = $row['platform'];
			$condition = $row['condition'];
			$price = $row['price'];
			$userID = $row['userID'];
	#		$userQuery = "SELECT email FROM users WHERE userID = $userID";
	#		$userResult = mysqli_query($db, $userQuery);
	#		$row = mysqli_fetch_array($userResult);
			$email = $row['email'];
			echo "<tr><td	>$title</td><td	>$platform</td><td	>$condition</td><td	>$price</td><td	>$email</td></tr>\n";
		}
		echo "</table>\n";
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
            <p>&copy; GameCycler 2012 | Design by GameCycler Team | Template Source: <a href="http://www.spyka.net" title="spyka webmaster">spyka Webmaster</a> <a href="http://www.justfreetemplates.com">Free Web Templates</a></p>
         </div>
    </div>
</div>
</body>
</html>
