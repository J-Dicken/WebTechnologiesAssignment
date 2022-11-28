<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Curriculum Vitae</title>
		<link rel="stylesheet" href="styles/masterStyle.css">
		<link rel="stylesheet" href="styles/cvPage.css">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<script src="scripts/moduleInfo.js"></script>
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
		<div id="mainContent">			
			<header>
				<span id="headerLeft">
					<h1 id="pageTitle">CSC-20021</h1>
					<span id="subTitle">Web Technologies Coursework</span>
				</span> <!-- End of headerLeft section -->

				<span id="headerRight">
					<?php
						if (isset($_SESSION["name"])){
							echo "Welcome, " . $_SESSION["name"] . " " . "<a href='logout.php?src=1' id='loginLink'>[Log Out]</a>";
						} else{					
							echo 'Not logged in <a href="logInPage.php?src=1" id="logInLink">[Log In]</a>';
						}
					?>					
				</span> <!-- End of headerRight section -->
			</header>

			<nav>
				<a href="homepage.php" class="navLink">Home</a>
				<a href="cvPage.php" class="navLink" id="current">CV</a>
				<a href="weatherData.php" class="navLink">Weather Data</a>
				<a href="list.php" class="navLink">Weather System</a>
			</nav>
			
			<!--cvPage.php content-->
			<!--should include
				Profile summary
				Information about computer science skills
				Achievements within the field
				Modules taken
				3rd year project area of interest-->
			<div id="cvPageCont">
				<fieldset class="cvField">
					<legend>Profile Summary</legend>
					<p>Ever since I played my first N64 game as a child I had an interest in video games. As I got older this progressed into an overall interest in the field of computer science. My main interest within the field now is web development, including having the website communicate with a supplementary app that can be installed on mobiles.</p>
				</fieldset>

				<div class="sideBySide">
					<fieldset class="cvField" id="side">
						<legend>Computer Science Skills</legend>
						<ul>
							<li>Python</li>
							<li>Java</li>
							<li>HTML, CSS and Javascript</li>
							<li>PHP</li>
						</ul>
					</fieldset>

					<fieldset class="cvField" id="side">
						<legend>Achievements</legend>
						<ul>
							<li>1st Place Hack Keele Hackathon Dec 2019</li>
							<li>Creation of Python script for large scale Excel data processing</li>
							<li>Creation of Python script for video game automation</li>
						</ul>
					</fieldset>
				</div>

				<fieldset class="cvField" id="modules">
					<legend>Modules Taken</legend>
					<select id="modulesTaken" onchange="updateModDisplay()">
						<optgroup label="First Year">
							<option value="csc10025">Cybercrime</option>
							<option value="csc10029">Fundamentals of Computing</option>
							<option value="csc10024">Programming 1 - Programming Fundamentals</option>
							<option value="csc10033">Systems and Architecture</option>
							<option value="csc10056">Communication, Confidence and Competence</option>
							<option value="csc10026">Computer Animation and Multimedia</option>
							<option value="csc10040">Introduction to Interaction Design</option>
							<option value="csc10035">Natural Computation</option>			
						</optgroup>

							<optgroup label="Second Year">
								<option value="csc20043">Artificial Intelligence</option>
								<option value="csc20038">Mobile Application Development</option>
								<option value="csc20037">Programming 2 - Data Structures and Algorithms</option>
								<option value="csc20021">Web Technologies</option>
								<option value="csc20002">Database Systems</option>
								<option value="csc20004">Advanced Programming Practices</option>
								<option value="csc20041">Software Engineering</option>
								<option value="csc20047">Individual Study in Computer Science</option>
							</optgroup>
						</select>

						<h2 id="moduleName"></h2>
						<h3 id="moduleCode"></h3>
						<span id="lecturer"></span>
						<br>
						<h4>Module Description</h4>
						<p id="description"></p>
						<h4>Module Aims</h4>
						<p id="aims"></p>
						<h4>Module Objectives</h4>
						<ul>
							<li id="obj1"></li>
							<li id="obj2"></li>
							<li id="obj3"></li>
						</ul>
						<a id="modLink">Module Page</a>
					</fieldset>

					<fieldset class="cvField">
						<legend>Project Area of Interest</legend>
						<p>One of my ideas for a final project brings together my interest in computer science and my love of playing music. I'd like to try and develop an app that, through a phones microphone, will not only record what you play, but transpose it into both sheet music and guitar tab.</p>
						<br>
						<p>An app like this will help guitarists, and possibly other musicians if it can be expanded, create music by creating sheet music of what they are currently improvising. This would be a lot quicker than the current method of recording a jam session and trying to write it down later by ear.</p>
							
						</p>
					</fieldset>
			</div><!--End of cvCont Div-->		
			<!--end of cvPage-->
			
			<footer>
				<span>James Dicken</span>
				<br>
				<span>x1g31@students.keele.ac.uk</span>
			</footer>		
		</div> <!-- End of main content div -->
	</body>
</html>