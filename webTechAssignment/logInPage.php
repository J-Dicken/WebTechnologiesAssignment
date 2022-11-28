<!--GET Variables
	"src": Used to redirect back to the page the user logged in from (before viewing the log in page). Sent directly in href
	"err": Sent by login.php when redirecting to logInPage.php in the event of an invalid log in so page can show appropriate message

	err values
	0: Username or password not entered
	1: Invalid username or password -->
<?php
	session_start();
	//If user has already logged in, redirect to home page with an alert set in GET
	if (isset($_SESSION['name'])){		
		header("Location: homepage.php?alert=1");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<link rel="stylesheet" href="styles/logIn.css">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
	</head>
	<body>
		<div id="logInContainer">
			<form id="logIn" action="logIn.php" method="post">
				<?php					
					echo "<input type='hidden' name='src' value={$_GET['src']}>";
					//Gives log in page a value to give back to logInPage through GET to allow appropriate redirection
				?>
				<label for="user">Username</label><br>
				<input type="text" id="user" name="user"><br>
				<label for="password">Password</label><br>
				<input type="password" id="password" name="password"><br>
				<input type="submit" value="Log In" id="LogInBtn">

				<a href="homepage.php">Return Home</a>

				<?php
				//Sets errString based on err code received by GET then echos to a span with error icon			
					if (isset($_GET["err"])){
						$errString;
						switch ($_GET["err"]){
							case 0:
								$errString = "Username or password not entered!";
								break;
							case 1:
								$errString = "Invalid username or password!";
								break;
							default:
								$errString = "Unknown Error!";
								break;
						}

						echo "<span><img src='img/error.png' alt='Red warning triangle with white exclamation mark'>" . $errString . "</span>";
					}
				?>
			</form>						
		</div><!-- End of logInContainer div -->
	</body>
</html>