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
		<title>Add Record</title>
		<link rel="stylesheet" href="styles/masterStyle.css">
		<link rel="stylesheet" href="styles/submit.css">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
	</head>

	<body>
		<!--Admin tools overlay-->
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
		<!--End of admin tools-->
		<div id="formWrapper">
			<form id="addData" action="addWeatherData.php" method="POST">
				<label for="city">Town/City</label>
				<input type="text" pattern="[a-zA-Z0-9 ]+" name="city" id="city" required>
				<label for="date">Date</label>
				<input type="date" id="date" name="date" required>
				<label for="avgTemp">Average Temperature</label>
				<input type="number" id="avgTemp" pattern="-*[0-9]+" name="avgTemp" placeholder="&#8451" required>
				<label for="minTemp">Minimum Temperature</label>
				<input type="number" id="minTemp" pattern="-*[0-9]+" name="minTemp" placeholder="&#8451" required>
				<label for="maxTemp">Maximum Temperature</label>
				<input type="number" id="maxTemp" pattern="-*[0-9]+" name="maxTemp" placeholder="&#8451" required>
				<label for="windSpeed">Wind Speed</label>
				<input type="number" id="windSpeed" pattern="[0-9]+" name="windSpeed" placeholder="mph" required>
				<label for="windDir">Wind Direction</label>
				<select name="windDir" required>
					<option value="North">North</option>
					<option value="North East">North East</option>
					<option value="East">East</option>
					<option value="South East">South East</option>
					<option value="South">South</option>
					<option value="South West">South West</option>
					<option value="West">West</option>
					<option value="North West">North West</option>
				</select>
				<label for="humid">Humidity</label>
				<input type="text" name="humid" id="humid" pattern="[0-9]+" placeholder="%" required>
				<label for="weatherDesc">Weather Summary</label>
				<input type="text" id="weatherDesc" pattern="[a-zA-Z0-9 ]+" name="weatherDesc" placeholder="E.g Rain, Snow etc" required>
				<button type="submit" id="addRecord">Add Record</button>
				<button type="reset" id="resetForm">Reset Fields</button>
			</form>
		</div><!--End of main content-->
	</body>
</html>