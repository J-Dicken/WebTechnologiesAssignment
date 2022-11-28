<?php
	session_start();

	//Check for alert set when redirected from loginpage due to duplicate log in attempt, send error alert
	if (isset($_GET['alert'])){
		if ($_GET['alert'] == 1){
			echo '<script>alert("You are already logged in. Log out before trying to log in as a different user")</script>';
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="styles/masterStyle.css">
		<link rel="stylesheet" href="styles/homepageStyle.css">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
	</head>

	<body>
		<?php
			//Check authority of user to display admin tools or not
			if ((isset($_SESSION["admin"])) && ($_SESSION["admin"] == 1)) {
		?>
			<!--Admin Page sticky link-->
			<div id="linkDiv"><!--Needed to be wrapped so can be hidden untill hovered over-->
				<img src="img/adminIcon.png" id="adminIcon" alt="A cog and a spanner">
				<div id="adminLink">
					<a href="adminTools.php">
					<img src="img/adminIcon.png" alt="A cog and a spanner">
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
							echo "Welcome, " . $_SESSION["name"] . " " . "<a href='logout.php?src=0' id='loginLink'>[Log Out]</a>";
						} else{					
							echo 'Not logged in <a href="logInPage.php?src=0" id="logInLink">[Log In]</a>';
						}
					?>
				</span> <!-- End of headerRight section -->
			</header>

			<nav>
				<a href="homepage.php" class="navLink" id="current">Home</a>
				<a href="cvPage.php" class="navLink">CV</a>
				<a href="weatherData.php" class="navLink">Weather Data</a>
				<a href="list.php" class="navLink">Weather System</a>
			</nav>

			<!--CV Content Div-->
			<div class="pageContent">
				<span class="imgCont">
					<img src="img/cv.png" class="contentImg" alt="A CV being written">
				</span>

				<span class="textCont">
					<h2>CV</h2>
					<p>A web based CV used to demonstrate various HTML elements. The CV is written as though it is being used to apply for a job as a web developer.</p>
					<a href="cvPage.php" class="contBtn">View Page</a> 
				</span>
			</div>

			<!--Weather Data Content Div-->
			<div class="pageContent">
				<span class="imgCont">
					<img src="img/weatherData.png" class="contentImg" alt="Clouds with rain">
				</span>

				<span class="textCont">
					<h2>Rendering Weather Data</h2>
					<p>Using chart.js, data from JSON files was parsed and then used to generate charts displaying different pieces of weather information.</p>
					<a href="weatherData.php" class="contBtn">View Page</a> 
				</span>
			</div>

			<!--Log In System-->
			<div class="pageContent">
				<span class="imgCont">
					<img src="img/login.png" class="contentImg" alt="A picture of a log in and password entry field">
				</span>

				<span class="textCont">
					<h2>Log-In System</h2>
					<p>A basic system that a user can log into. Once logged in they may have access to furthr features depending on their session variables.</p>
					<p>The weather system component was built upon this</p>
					<a href="logInPage.php?src=0" class="contBtn">View Page</a> 
				</span>
			</div>

			<!--Weather System-->
			<div class="pageContent">
				<span class="imgCont">
					<img src="img/weatherSystem.png" class="contentImg" alt="Cartoon weather balloon">
				</span>

				<span class="textCont">
					<h2>Weather System</h2>
					<p>A weather tracking and reporting system for UK cities. Users can view a list of all weather records or view specific records.</p>
					<p>Administrators can add new records also.</p>
					<a href="list.php" class="contBtn">View Page</a> 
				</span>
			</div>

			

			<footer>
				<span>James Dicken</span>
				<br>
				<span>x1g31@students.keele.ac.uk</span>
			</footer>		
		</div> <!-- End of main content div -->
	</body>
</html>