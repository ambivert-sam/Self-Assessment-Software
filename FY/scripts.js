

const questions = [
	{
		questionText: 'Commonly used data types DO NOT include:',
		options: ['1. strings', '2. booleans', '3. alerts', '4. numbers'],
		answer: '3. alerts',
	},
	{
		questionText: 'Arrays in JavaScript can be used to store ______.',
		options: [
			'1. numbers and strings',
			'2. other arrays',
			'3. booleans',
			'4. all of the above',
		],
		answer: '4. all of the above',
	},
	{
		questionText:
			'String values must be enclosed within _____ when being assigned to variables.',
		options: ['1. commas', '2. curly brackets', '3. quotes', '4. parentheses'],
		answer: '3. quotes',
	},
	{
		questionText:
			'A very useful tool used during development and debugging for printing content to the debugger is:',
		options: [
			'1. JavaScript',
			'2. terminal/bash',
			'3. for loops',
			'4. console.log',
		],
		answer: '4. console.log',
	},
	{
		questionText:
			'Which of the following is a statement that can be used to terminate a loop, switch or label statement?',
		options: ['1. break', '2. stop', '3. halt', '4. exit'],
		answer: '1. break',
	},
];

// MY SCRIPTS //

// Variables //

let savedScore = '';
let initials = '';
let showHighscores = false;
let lastlyActiveElement = {};
let timer = 50; // defaultly 50 seconds timer.
let interval;
let questionIndex = 0;
let totalPoint = 0;

// Functions //

for (let i = 0; i < localStorage.length; i++) {
	savedScore += `<li>${localStorage.key(i)} - ${localStorage.getItem(
		localStorage.key(i)
	)}</li>`;
}

function startTimer() {
	interval = setInterval(() => {
		timer--;
		document.getElementById(
			'timer'
		).innerHTML = `<span id="timer">${timer}</span>`;
		timer === 0 && isEndOfTheGame();
	}, 1000);
}

function startQuiz() {
	startTimer();
	document.getElementById('questionbox').classList.add('active');
	document.getElementById('startcard').classList.remove('active');
	toggleNextQuestion();
}

function isEndOfTheGame() {
	if (timer <= 0 || questionIndex === questions.length) {
		document.getElementById('highscores').classList.contains('active') &&
			toggleHighscores();
		clearInterval(interval);
		document.getElementById('questionbox').classList.remove('active');
		document.getElementById('endcard').classList.add('active');
		questionIndex = 0;
		totalPoint = timer;
		document.getElementById('timer').innerHTML = '<span id="timer"></span>';
		document.getElementById(
			'score'
		).innerHTML = `<span id='score'>${totalPoint}</span>`;
	}
}

function isSelectedTrue(optionText) {
	let result = document.getElementById('result');
	document.getElementById('options').style.pointerEvents = 'none';
	if (optionText === questions[questionIndex].answer) {
		result.innerHTML = '<span id="result">Correct!</span>';
	} else {
		timer -= 10;
		result.innerHTML = '<span id="result">Incorrect!</span>';
		timer < 0 && (timer = 0);
	}
	questionIndex += 1;
	setTimeout(() => {
		document.getElementById('options').style.pointerEvents = 'auto';
		result.innerHTML = '<span id="result"></span>';
		toggleNextQuestion();
	}, 1000);
	isEndOfTheGame();
}

function toggleNextQuestion() {
	let questionTitle = `<h2 id="questionText">${questions[questionIndex].questionText}</h2>`;
	let questionOptions =
		'<div id="options">' +
		`<button class="option">${questions[questionIndex].options[0]}</button>` +
		`<button class="option">${questions[questionIndex].options[1]}</button>` +
		`<button class="option">${questions[questionIndex].options[2]}</button>` +
		`<button class="option">${questions[questionIndex].options[3]}</button>` +
		'</div>';

	document.getElementById('questionText').innerHTML = questionTitle;
	document.getElementById('options').innerHTML = questionOptions;

	for (let option of document.getElementsByClassName('option')) {
		option.addEventListener('click', () => isSelectedTrue(option.innerText));
	}
}

function toggleHighscores() {
	showHighscores = !showHighscores;
	if (showHighscores) {
		for (let element of document.getElementsByClassName('box')) {
			if (element.classList.contains('active')) {
				lastlyActiveElement = element;
				element.classList.remove('active');
			}
		}
		document.getElementById('highscores').classList.add('active');
	} else {
		lastlyActiveElement.classList.add('active');
		document.getElementById('highscores').classList.remove('active');
	}

	let listOfScores = document.getElementById('listOfScores');
	localStorage.length === 0
		? (listOfScores.innerHTML = '<p>NO SCORES</p>')
		: (listOfScores.innerHTML = savedScore);
}

// Button Functionalities //

document.getElementById('startbtn').addEventListener('click', () => {
	startQuiz();
});

document
	.getElementById('leaderboard')
	.addEventListener('click', toggleHighscores);

document
	.getElementById('gobackbtn')
	.addEventListener('click', toggleHighscores);

document.getElementById('clearHighscoresBtn').addEventListener('click', () => {
	localStorage.clear();
	listOfScores.innerHTML = '<p>NO SCORES</p>';
});

document.getElementById('initialsInput').addEventListener('change', (event) => {
	initials = event.target.value;
});

document.getElementById('submitbtn').addEventListener('click', () => {
	window.location.reload();
	localStorage.setItem(initials, totalPoint);
});
