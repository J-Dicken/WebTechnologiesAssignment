<?php
	session_start();
	session_destroy();
	switch ($_GET["src"]){
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
?>