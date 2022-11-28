<?php
	session_start();
	//Make sure user is admin
	if ((!isset($_SESSION["admin"])) || ($_SESSION["admin"] != 1)){
		header("Location: homepage.php");
	} else if((empty($_POST['username'])) || (empty($_POST['password'])) || (empty($_POST['password2']))) {
		//Check fields have been set to prevent null data being added by navigating here through nav bar. Only need to check if one is set as if one is, all should be
		header("Location: homepage.php");
	}
	else{
		//Load CSV file
		if (($fs = fopen("data/users.csv", "r+")) !== FALSE){
			//Read CSV into 2D array
			$count = 0;
			while (($users = fgetcsv($fs, 200)) !== FALSE) {
				for ($x = 0; $x < count($users); $x++){
					$userArray[$count][$x] = $users[$x];
				}
				$count++;
			}
		}
		//Making sure a duplicate entry is not being added
		$userExist = FALSE;
		for ($x = 0; $x < count($userArray); $x++){
			if (strtolower($userArray[$x][0]) === strtolower($_POST['username'])){
				$userExist = TRUE;
			}
		}

		if ((!$userExist) && ($_POST['password'] === $_POST['password2'])){
			//Write to file
			$arr = [$_POST['username'],$_POST['password'],$_POST['admin']];
			if (fputcsv($fs, $arr)){
				$imageSrc = "img/tick.png";
				$imageAlt = "A green success tick";
				$fileMessage = "User successfully added!";
				} else {
					$imageSrc = "img/error.png";
					$imageAlt = "A red warning triangle";
					$fileMessage = "There has been an error in the creation of the user, please try again";
				}						
		} else if ($_POST['password'] !== $_POST['password2']){
			$imageSrc = "img/error.png";
			$imageAlt = "A red warning triangle";
			$fileMessage = "Passwords must match!";
		} else {
			$imageSrc = "img/error.png";
			$imageAlt = "A red warning triangle";
			$fileMessage = "User already exists!";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Adding User</title>
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
			<a href="addUserForm.php"><button id="ok">Ok!</button></a>
		</div>
	</body>
</html>