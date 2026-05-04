<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Exam</title>

    <link rel="shortcut icon" href="{{ asset('images/components/Logo.png') }}" type="image/x-icon">
</head>
<body class="w-full h-[100dvh] overflow-hidden bg-[#26AF5A] flex flex-col">
    <header class="w-full h-[80px] bg-[#1E7B42] flex items-center px-6">
        <div class="w-[15%] h-full flex items-center justify-start">
            <svg class=" w-[30px] h-[30px] text-white  cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </div>

        <div class="w-[70%] flex flex-col items-center justify-center text-white">
            <h4 class="font-bold text-2xl tracking-wide">Mathematics</h4>
            <span class="text-xs"> Questions 1 / 50 </span>
        </div>

        <div class="w-[15%] h-full flex items-center justify-end">
            <svg class=" w-[30px] h-[30px] text-white  cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
            </svg>
        </div>

    </header>

    <main class="w-full h-[calc(100dvh-80px)] flex items-center justify-center flex-col gap-3">
    
        <!-- QUESTION -->
        <div id="question"
            class="max-w-[300px] w-full py-5 text-black text-center flex items-center justify-center rounded-xl px-3 bg-[#CEF2F2]">
        </div>

        <!-- CHOICES -->
        <ul id="choices"
            class="w-full flex flex-col gap-2 items-center text-black min-h-[200px] bg-red-100">
        </ul>

        <button 
            id="next-btn"
            onclick="nextQuestion()"
            disabled
            class="max-w-[300px] w-full h-[40px] bg-gray-300 mt-3 rounded-xl hover:bg-gray-200 opacity-0">
            Next Question
        </button>

    </main>

    <script>
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

let currentIndex = Math.floor(Math.random() * quiz.length);


let current = currentIndex;
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
    const nextBtn = document.getElementById('next-btn');

    if(selected === quiz[current].answer){
        items[index].style.backgroundColor = '#00FF61';
    }else{
        items[quiz[current].answer].style.backgroundColor = '#00FF61';
        items[index].style.backgroundColor = '#FF0000';
        
    } 

    setTimeout(() => {
        items.forEach((item, i) => {
            if (i !== quiz[current].answer) {
                item.classList.add('choices');
                setTimeout(() => {

                }, 1000);
            }

        
            
        });
    }, 1000);

    


    items.forEach(item => {
        item.style.pointerEvents = "none";
    });

    nextBtn.disabled = false;
    nextBtn.classList.remove('opacity-0');
    nextBtn.classList.add('opacity-100');
    nextBtn.classList.add('cursor-pointer');
}

function nextQuestion() {

    if (selected === quiz[current].answer) {
      score++;
    }


    current++;
    selected = null;
    const nextBtn = document.getElementById('next-btn');
    nextBtn.classList.remove('opacity-100');
    nextBtn.classList.add('opacity-0');
    nextBtn.classList.remove('cursor-pointer');
    nextBtn.disabled = true;

    if (current < quiz.length) {
        loadQuestion();
    } else {
        document.querySelector("main").innerHTML =
            `<h2 class="text-white text-xl">Score: ${score}/${quiz.length}</h2>`;
    }
}

loadQuestion();

    </script>

    @vite(['resources/css/app.css', 'resources/css/pages/exam.css' ])
</body>
</html>