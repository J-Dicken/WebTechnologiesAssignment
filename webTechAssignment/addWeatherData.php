<?php
	session_start();
	//Make sure user is admin
	if ((!isset($_SESSION["admin"])) || ($_SESSION["admin"] != 1)){
		header("Location: homepage.php");
	} else if(empty($_POST['city'])) {
		//Check fields have been set to prevent null data being added by navigating here through nav bar. Only need to check if one is set as if one is, all should be
		header("Location: homepage.php");
	}
	else{
		//Load JSON files
		$jsonArr = file_get_contents('data/weatherDB.json');
		$temp = json_decode($jsonArr, true);
		$recordId = $_POST["city"] . $_POST["date"] . $_POST["minTemp"] . $_POST["maxTemp"]; 
		$fileMessage;

		//Making sure a duplicate entry is not being added
		if (!isset($temp[$recordId])){
			//Make sure user has max and min temp right way round
			if ($_POST["minTemp"] > $_POST["maxTemp"]){
				$tempVal = $_POST["minTemp"];
				$_POST["minTemp"] = $_POST["maxTemp"];
				$_POST["maxTemp"] = $tempVal;
			}
			//Array to be converted to JSON, added to existing array that was loaded in
			$temp[$recordId] = Array (
				"city" => $_POST["city"],
				"date" => $_POST["date"],
				"avgTemp" => $_POST["avgTemp"],
				"minTemp" => $_POST["minTemp"],
				"maxTemp" => $_POST["maxTemp"],
				"windSpeed" => $_POST["windSpeed"],
				"windDir" => $_POST["windDir"],
				"humidity" => $_POST["humid"],
				"description" => $_POST["weatherDesc"]
			);

			//Encode array to JSON
			$jsonArr = json_encode($temp);

			//Write to file
			//Wrapped in if in case of error
			if (file_put_contents("data/weatherDB.json", $jsonArr)){
				$imageSrc = "img/tick.png";
				$imageAlt = "A green success tick";
				$fileMessage = "Record successfully added!";
			} else {
				$imageSrc = "img/error.png";
				$imageAlt = "A red warning triangle";
				$fileMessage = "There has been an error in the creation of the record, please try again";
			}

		} else {
			$imageSrc = "img/error.png";
			$imageAlt = "A red warning triangle";
			$fileMessage = "Record already exists!";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Storing Weather Data</title>
		<link rel="stylesheet" href="styles/masterStyle.css">
		<link rel="stylesheet" href="styles/addWeatherData.css">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
	</head>
	<body>
		<div id="fileMessage">
			<img src="<?php echo $imageSrc; ?>" alt="<?php echo $imageAlt;?>">
			<?php
				echo "<h2>" . $fileMessage . "</h2>";
			?>
			<a href="submit.php"><button id="ok">Ok!</button></a>
		</div>
	</body>
</html>