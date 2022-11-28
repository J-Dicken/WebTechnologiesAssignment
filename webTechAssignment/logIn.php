<?php
	session_start();
	
	//If no data has been entered, return to logInPage with err 0
	if ((empty($_POST["user"]))||(empty($_POST{"password"}))){
		$src = "logInPage.php?err=0&src=" . $_POST['src'];
		//$src allows custom path to be made so after invalid logins, a successful one will still redirect to the page the user was on
 		header("Location: $src");
 	} else {//Rest of code only executes if input is not empty

		if (($handle = fopen("data/users.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	 			$users[strtolower($data[0])] = array("password"=>$data[1], "admin"=>$data[2]);
	 		}
	 		fclose($handle);
	 	}

	 	//strtolower used in array initialisation and username //variable so that username is not case sensitive
	 	$username = strtolower($_POST["user"]);
	 	$password = $_POST["password"];

	 	//If username and password are a match, set appropriate session variables
	 	if ((isset($users[$username])) && ($password == $users[$username]["password"])){
	 		$_SESSION["name"] = $username;
	 		$_SESSION["admin"] = $users[$username]["admin"];

	 		//Returns the user to the page that loaded the log in page, rather than returning them to the log in page or a random one
	 		switch ($_POST["src"]){
				case 0:
					header("Location: homepage.php");
					break;
				case 1:
					header("Location: cvPage.php");
					break;
				case 2:
					header("Location: weatherData.php");
					break;
				case 3:
					header("Location: list.php");
					break;
			}
	 	} else {
	 		$src = "logInPage.php?err=1&src=" . $_POST['src'];
	 		header("Location: $src");
	 	}		
	}
?>

