<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Weather Data</title>
		<link rel="stylesheet" href="styles/masterStyle.css">	
		<link rel="stylesheet" href="styles/weatherData.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"
  		integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q=="
  		crossorigin="anonymous" referrerpolicy="no-referrer">	</script>
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
							echo "Welcome, " . $_SESSION["name"] . " " . "<a href='logout.php?src=2' id='loginLink'>[Log Out]</a>";
						} else{					
							echo 'Not logged in <a href="logInPage.php?src=2" id="logInLink">[Log In]</a>';
						}
					?>

					
				</span> <!-- End of headerRight section -->
			</header>

			<nav>
				<a href="homepage.php" class="navLink">Home</a>
				<a href="cvPage.php" class="navLink">CV</a>
				<a href="weatherData.php" class="navLink" id="current">Weather Data</a>
				<a href="list.php" class="navLink">Weather System</a>
			</nav>

			<div id="taskOneWrapper">
				<!--Daily weather information-->				
				<span class="dataWrapper">
					<h1 id="loc1"></h1>
					<span class="imgCont">
						<img id="stokeImg">
					</span>

					<span class="textCont">
						<label id="cloud1"></label>
						<br>
						<label id="temp1" class="tempAvg"></label>
						<br>
						<label id="min1"></label>
						<label id="max1"></label>
						<br>
						<label id="feels1"></label>
						<br>
						<label id="lat1"></label>
						<label id="lon1"></label>
						<br>						
						<label id="wind1"></label>
						<br>
						<label id="humid1"></label>
					</span>
				</span>

				<span class="dataWrapper">
					<h1 id="loc2"></h1>
					<span class="imgCont">
						<img src="img/test.png" id="londonImg">
					</span>

					<span class="textCont">
						<label id="cloud2"></label>
						<br>
						<label id="temp2" class="tempAvg"></label>
						<br>
						<label id="min2"></label>
						<label id="max2"></label>
						<br>
						<label id="feels2"></label>
						<br>
						<label id="lat2"></label>
						<label id="lon2"></label>
						<br>						
						<label id="wind2"></label>
						<br>
						<label id="humid2"></label>
					</span>
				</span>
				<!--End of daily weather information-->
			</div> <!--Task 1 Div-->

			<div id="chartContainer">
				<label for="chartType" id="chartTypeLab">Select Chart Type<br> </label>
				<select id="chartType" onChange="onChange()" name="chartType" id="chartType">
				  	<option value="line">Line</option>
				  	<option value="bar">Bar</option>
				  	<option value="pie">Pie</option>
				</select>

				<h2 class="chartTitle">Stoke-on-Trent Temperature Forecast</h2>
				<div class="canvasWrapper">
					<canvas id="tempChart"></canvas>
				</div>
				<h2 class="chartTitle">Stoke-on-Trent Wind Speed Forecast</h2>
				<div class="canvasWrapper">
					<canvas id="windChart"></canvas>
				</div>
				<h2 class="chartTitle">Stoke-on-Trent Humidity Forecast</h2>
				<div class="canvasWrapper">
					<canvas id="humChart"></canvas>
				</div>
				<h2 class="chartTitle">Stoke Vs. London Temperature</h2>
				<div class="canvasWrapper">
					<canvas id="compareChart"></canvas>
				</div>
				
				<!--Chart edit tools-->
				<div id="chartTools">
					<label for="lonSel">London bar colour</label>
					<input type="color" id="lonSel" name="lonSel" value="#1d4289">

					<label for="stokeSel">Stoke bar colour</label>
					<input type="color" id="stokeSel" name="stokeSel" value="#dbfeff">

					<label for="fontSel">Select font</label>
					<select id="fontSel" name="fontSel">
						<option value="Arial">Arial</option>
						<option value="Verdana">Verdana</option>
						<option value="Helvetica">Helvetica</option>
						<option value="Tahoma">Tahoma</option>
						<option value="Trebuchet MS">Trebuchet MS</option>
						<option value="Times New Roman">Times New Roman</option>
						<option value="Georgia">Georgia</option>
						<option value="Garamond">Garamond</option>
						<option value="Courier New">Courier New</option>
						<option value="Brush Script MT">Brush Script MT</option>
					</select>

					<label for="fontSize">Font size</label>
					<select id="fontSize" name="fontSize">
						<!--For loop to populate drop down options as they increase uniformly-->
						<?php
							for ($x = 8; $x <= 22; $x+=2){
								echo "<option value='" . $x . "'>" . $x . "</option>";
							}
						?>
					</select>

					<button onclick="compOnChange()">Update Chart</button>
				</div><!--End of chart tools-->
			</div><!--End of chart container-->

			<footer>
				<span>James Dicken</span>
				<br>
				<span>x1g31@students.keele.ac.uk</span>
			</footer>		
		</div> <!-- End of main content div -->
	<!--Script loaded here to prevent null reference errors when trying to load data into table-->
	<script src="scripts/weatherData.js"></script>
	</body>
</html>