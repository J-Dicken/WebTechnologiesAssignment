<?php 
	session_start();
	//Make sure user is admin
	if ((!isset($_SESSION["admin"])) || ($_SESSION["admin"] != 1)){
		header("Location: homepage.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Tools</title>
		<link rel="stylesheet" href="styles/masterStyle.css">
		<link rel="stylesheet" href="styles/adminTools.css">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
	</head>

	<body>

		<div id="mainContent">			
			<header>
				<span id="headerLeft">
					<h1 id="pageTitle">CSC-20021</h1>
					<span id="subTitle">Web Technologies Coursework</span>
				</span> <!-- End of headerLeft section -->

				<span id="headerRight">
					<?php
						if (isset($_SESSION["name"])){
							echo "Welcome, " . $_SESSION["name"] . " " . "<a href='logout.php' id='loginLink'>[Log Out]</a>";
						}
					?>					
				</span> <!-- End of headerRight section -->
			</header>

			<nav>
				<a href="homepage.php" class="navLink">Home</a>
				<a href="cvPage.php" class="navLink">CV</a>
				<a href="weatherData.php" class="navLink">Weather Data</a>
				<a href="list.php" class="navLink">Weather System</a>
			</nav>

			<!--Admin Tools Start-->			
			<fieldset id="adminToolContainer">
				<legend>Website Admin Toolkit</legend>
				<div class="toolIcon">
					<a href="addUserForm.php">
					<img src="img/addUser.png" alt="A white outline of a head and shoulders with a plus symbol in the top right">
					<h2 class="toolName">Add User</h2>
					</a>
				</div>

				<div class="toolIcon">
					<a href="submit.php">
					<img src="img/addWeather.png" alt="A white cloud with a plus symbol on the right">
					<h2 class="toolName">Add Weather Data</h2>
					</a>
				</div>
			</fieldset>
			<!--Admin Tools End-->

			<footer>
				<span>James Dicken</span>
				<br>
				<span>x1g31@students.keele.ac.uk</span>
			</footer>		
		</div> <!-- End of main content div -->
	</body>
</html>