let presentQuestion = {};
let acceptingAnswers = false;
var score = 0;
let Counter = 0;
let QuestionsLeft = [];
let questions = [];
const question = document.getElementById('question');
const choices = Array.from(document.getElementsByClassName('choice-text'));
const progressText = document.getElementById('progressText');
const scoreText = document.getElementById('score');
const progressBarFull = document.getElementById('progressBarFull');
const game = document.getElementById('game');


increaseScore = (x) => {
    score += x;
    scoreText.innerText = score;
};


fetch('questions.json')
    .then((res) => {
        return res.json();
    })
    .then((loadedQuestions) => {
        questions = loadedQuestions;
        startGame();
    });
    
const BONUS = 10;
const NUMBER_OF_QUESTONS = 8;

startGame = () => {
    Counter = 0;
    score = 0;
    QuestionsLeft = [...questions];
    NextQuestion();
    game.classList.remove('hidden');
};



NextQuestion = () => {
    if (QuestionsLeft.length === 0 || Counter >= NUMBER_OF_QUESTONS) {
        
        document.cookie="wynik="+score+"; max-age=3600";
        
        return window.location.assign('/end.php');
    }
    
    Counter++;
    progressText.innerText = `Pytanie ${Counter}/${NUMBER_OF_QUESTONS}`;
    progressBarFull.style.width = `${(Counter / NUMBER_OF_QUESTONS) * 100}%`;

    const questionIndex = Math.floor(Math.random() * QuestionsLeft.length);
    presentQuestion = QuestionsLeft[questionIndex];
    question.innerHTML = presentQuestion.question;

    choices.forEach((choice) => {
        const number = choice.dataset['number'];
        choice.innerHTML = presentQuestion['choice' + number];
    });

    QuestionsLeft.splice(questionIndex, 1);
    acceptingAnswers = true;
};

choices.forEach((choice) => {
    choice.addEventListener('click', (e) => {
        if (!acceptingAnswers) return;

        acceptingAnswers = false;
        const ClickedChoice = e.target;
        const selectedAnswer = ClickedChoice.dataset['number'];

        const classToApply =
            selectedAnswer == presentQuestion.answer ? 'correct' : 'incorrect';

        if (classToApply === 'correct') {
            increaseScore(BONUS);
        }
        
        ClickedChoice.parentElement.classList.add(classToApply);
        choices[presentQuestion.answer - 1].parentElement.classList.add('correct');

        setTimeout(() => {
            ClickedChoice.parentElement.classList.remove(classToApply);
            choices[presentQuestion.answer - 1].parentElement.classList.remove('correct');
            NextQuestion();
        }, 1000);

        
        
    });
});

