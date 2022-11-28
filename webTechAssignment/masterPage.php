<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles/masterStyle.css">
		<link rel="stylesheet" href="styles/homepageStyle.css">
	</head>

	<body>
		<?php
			//Check authority of user to display admin tools or not
			if ((isset($_SESSION["admin"])) && ($_SESSION["admin"] == 1)) {
		?>
			<!--Admin Page sticky link-->
			<div id="linkDiv"><!--Needed to be wrapped so can be hidden untill hovered over-->
				<img src="img/adminIcon.png" id="adminIcon">
				<div id="adminLink">
					<a href="adminTools.php">
					<img src="img/adminIcon.png">
					<span>Administrator Tools</span>
					</a>
				</div>
			</div><!--End of link div-->
			<!--End of admin page link-->
		<?php
			}
		?>
		<div id="mainContent">			
			<header>
				<span id="headerLeft">
					<h1 id="pageTitle">CSC-20021</h1>
					<span id="subTitle">Web Technologies Coursework</span>
				</span> <!-- End of headerLeft section -->

				<span id="headerRight">
					<?php
						if (isset($_SESSION["name"])){
							echo "Welcome, " . $_SESSION["name"];
						} else{					
							echo 'Not logged in <a href="logInPage.php?src=2" id="logInLink">[Log In]</a>';
						}
					?>					
				</span> <!-- End of headerRight section -->
			</header>

			<nav>
				<a href="homepage.php" class="navLink" id="current">Home</a>
				<a href="cvPage.php" class="navLink">CV</a>
				<a href="weatherData.php" class="navLink">Weather Data</a>
				<a href="weatherSystem.php" class="navLink">Weather System</a>
			</nav>

			<footer>
				<span>James Dicken</span>
				<br>
				<span>x1g31@students.keele.ac.uk</span>
			</footer>		
		</div> <!-- End of main content div -->
	</body>
</html>