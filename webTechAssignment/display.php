<!--$_GET['city', 'date', 'minTemp', 'maxTemp', 'avgTemp',
----------'windSpeed', 'windDir', 'humidity', 'description'] -->

<?php 
	session_start();
	//Prevents an error should the user navigate to this page
	//by typing the address rather than using a link, resulting //in no GET variables
	if (!isset($_GET['city'])){
		header("Location: weatherSystem.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Weather Record</title>
		<link rel="stylesheet" href="styles/masterStyle.css">
		<link rel="stylesheet" href="styles/display.css">
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
							echo "Welcome, " . $_SESSION["name"] . " " . "<a href='logout.php?src=3' id='loginLink'>[Log Out]</a>";
						} else{					
							echo 'Not logged in <a href="logInPage.php?src=3" id="logInLink">[Log In]</a>';
						}
					?>					
				</span> <!-- End of headerRight section -->
			</header>

			<nav>
				<a href="homepage.php" class="navLink" >Home</a>
				<a href="cvPage.php" class="navLink">CV</a>
				<a href="weatherData.php" class="navLink">Weather Data</a>
				<a href="list.php" id="current" class="navLink">Weather System</a>
			</nav>

			<div id="displayCont">
				<!--Using same styling from Weather Data page as its essentially the same function-->
				<span class="dataWrapper">
					<?php
						echo "<h3>" . $_GET['city'] . "</h3>" . "<br>" . $_GET['date'] . "<br>"; 
						?>					
					<span class="textCont">						
						<label class="tempAvg"><?php echo $_GET['avgTemp']; ?>&deg;C</label>
						<br>
						<label>Low: <?php echo $_GET['minTemp'];?>&deg;C</label>
						<label>High: <?php echo $_GET['maxTemp'];?>&deg;C</label>
						<br>
						<label>Wind Speed: <?php echo $_GET['windSpeed'];?>mph</label>
						<br>
						<label>Wind Direction: <?php echo $_GET['windDir'];?></label>
						<br>
						<label>Humidity: <?php echo $_GET['humidity'];?>%</label>
						<br>
						<label>Weather: <?php echo $_GET['description'];?></label>
						<br>
						<a href="list.php">Go Back</a>
					</span>
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