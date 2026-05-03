const quiz = [
    {
        question: "What is the value of x in the equation: 2x + 5 = 15?",
        choices: ["x = 5", "x = 10", "x = 3", "x = 7"],
        answer: 0
    },
    {
        question: "What is 5 + 3?",
        choices: ["6", "7", "8", "9"],
        answer: 2
    }
];

let current = 0;
let selected = null;
let score = 0;

function loadQuestion() {
    const q = quiz[current];

    document.getElementById("question").innerText = q.question;

    const choicesEl = document.getElementById("choices");
    choicesEl.innerHTML = "";

    q.choices.forEach((choice, index) => {
        const li = document.createElement("li");
        li.className = "max-w-[300px] w-full px-4 py-3 rounded-xl text-xs font-semibold bg-[#CCCCCC] cursor-pointer hover:bg-gray-300";
        li.innerText = String.fromCharCode(65 + index) + ". " + choice;

        li.onclick = () => selectChoice(index);

        choicesEl.appendChild(li);
    });
}

function selectChoice(index) {
    selected = index;

    const items = document.querySelectorAll("#choices li");
    items.forEach(item => item.classList.remove("bg-cyan-300"));

    items[index].classList.add("bg-cyan-300");
}

function nextQuestion() {
    if (selected === null) {
        alert("Select an answer first!");
        return;
    }

    if (selected === quiz[current].answer) {
        score++;
    }

    current++;
    selected = null;

    if (current < quiz.length) {
        loadQuestion();
    } else {
        document.querySelector("main").innerHTML =
            `<h2 class="text-white text-xl">Score: ${score}/${quiz.length}</h2>`;
    }
}

loadQuestion();
