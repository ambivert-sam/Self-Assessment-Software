<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="quiz.css" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
		/>
		<title></title>
	</head>

	<body>
		<header>
			<a id="leaderboard"
				>View Highscores <i class="fas fa-hand-point-left fa-lg"></i>
			</a>
			<span
				>Time: <span id="timer"><!--from scripts.js--></span></span
			>
		</header>

		<main>
			<div class="box active" id="startcard">
				<h2>Coding Quiz Challenge</h2>
				<p>
					Try to answer to following code-related questions within the time
					limit.
				</p>
				<p>
					Keep in mind that incorrect answers will penalize your score/time by
					ten seconds!
				</p>
				<a href="quiz.php"><button id="startbtn">Start Quiz</button></a>
			</div>
			<div class="box" id="highscores">
				<h2>Highscores</h2>
				<ol id="listOfScores">
					<!--from scripts.js-->
				</ol>
				<div id="buttons">
					<button id="gobackbtn">Go Back</button
					><button id="clearHighscoresBtn">Clear Highscores</button>
				</div>
			</div>
			<div class="box" id="questionbox">
				<h2 id="questionText"><!--from scripts.js--></h2>
				<div id="options"><!--from scripts.js--></div>
				<hr />
				<span id="result"><!--from scripts.js--></span>
			</div>
			<div class="box" id="endcard">
				<h2>All done!</h2>
				<p>
					Your final score is <span id="score"><!--from scripts.js--></span>.
				</p>
				<div id="submitbox">
					<span>Enter initials:</span>
					<input id="initialsInput" />
					<button id="submitbtn">Submit</button>
				</div>
			</div>
		</main>
		<script src="scripts.js"></script>
	</body>
</html>
