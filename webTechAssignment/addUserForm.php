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
		<title>Add User</title>
		<link rel="stylesheet" href="styles/masterStyle.css">
		<link rel="stylesheet" href="styles/userForm.css">
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
			<form id="addData" action="addUser.php" method="POST">
				<label for="username">Username</label>
				<input type="text" pattern="[a-zA-Z0-9 ]+" name="username" id="username" required>
				<label for="password">Password</label>
				<input type="password" id="password" name="password" required>
				<label for="password2">Re-type Password</label>
				<input type="password" id="password2" name="password2" required>
				<div id="radioBtns">
				<label for="admin" id="admin">Admin</label>
				<input type="radio" id="admin" name="admin" value="1" required>
				<label for="standard" id="standard">Standard</label>
				<input type="radio" id="standard" name="admin" value="0" required>
				</div>
				<button type="submit" id="addRecord">Add Record</button>
				<button type="reset" id="resetForm">Reset Fields</button>
			</form>			
		</div><!--End of main content-->
	</body>
</html>