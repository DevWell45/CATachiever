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
        <div class="max-w-[300px] w-full py-5 text-black  flex flex-col  rounded-xl px-3 bg-[#CEF2F2]">
            <div id="question" class="w-full flex items-center justify-center text-center">

            </div>
            <div id="explanationContainer" class="w-full mt-5 text-[10px] flex opacity-0 justify-end flex-col min-h-[0px]">
                <span id="explanationHeader" class="font-bold hidden">Explanation:</span>
                <span id="explanationBody" class="hidden"></span>
            </div>
        </div>

        <!-- CHOICES -->
        <ul id="choices"
            class="w-full flex flex-col gap-2 items-center text-black min-h-[200px] ">
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
        question: "What is the area of a triangle with base 10 cm and height 6 cm?",
        choices: ["20 cm²", "30 cm²", "40 cm²", " 50 cm²"],
        answer: 0,
        explanation: "2x + 5 = 15 Remove the +5 by subtracting 5 → 2x = 10  Now divide by 2 → x = 5"
    },
    {
        question: "Find 20% of 150.",
        choices: ["25", "30", "35", "40"],
        answer: 1,
        explanation: "20% is equal to 0.20 \n 0.20 × 150 = 30"
    },
    {
        question: "Find the next term:  2, 4, 6, 10, 16, _",
        choices: ["20", "22", "24", "26"],
        answer: 3,
        explanation: "Pattern: add previous two numbers 6+10=16, then 10+16=26"
    },
    {
        question: "What is 25% of 200?",
        choices: ["25", "40", "50", "75"],
        answer: 2,
        explanation : "25% is equal to 0.25 \n 0.25 × 200 = 50"
    },
    {
        question: "Find the missing number:  2, 3, 5, 8, 13, _",
        choices: ["18", "20", "21", "24"],
        answer: 2,
        explanation: "Pattern: add previous two 5+8=13, then 8+13=21"
    }
];

// let currentIndex = Math.floor(Math.random() * quiz.length);


let current = 0;
let selected = null;
let score = 0;

function loadQuestion() {
    const q = quiz[current];

    document.getElementById("question").innerText = q.question;
    document.getElementById("explanationBody").innerText = q.explanation;
    const nextBtn = document.getElementById('next-btn');

    

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
    const choicesContainer = document.getElementById('choices');
    const explanationContainer = document.getElementById('explanationContainer');

    if(selected === quiz[current].answer){
        items[index].style.backgroundColor = '#00FF61';
    }else{
        items[quiz[current].answer].style.backgroundColor = '#00FF61';
        items[index].style.backgroundColor = '#FF0000';
        
    } 
    

    // HIDE WRONG CHOICES
    setTimeout(() => {
        
        items.forEach((item, i) => {
            if (i !== quiz[current].answer) {
                item.classList.add('hidden');
            }
        });
        
    }, 1000);
    // FADE IN
    setTimeout(() => {
        
        items.forEach((item, i) => {
            if (i === quiz[current].answer) {
                item.classList.add('fadeIn');
            }
        });
        
    }, 1000);

    setTimeout(() => {
        choicesContainer.classList.add('hideContainer');
        explanationContainer.classList.add('showContainer')
        setTimeout(() => {
            const explanationHeader = document.getElementById('explanationHeader');
            const explanationBody = document.getElementById('explanationBody');
            explanationHeader.classList.remove('hidden');
            explanationHeader.classList.add('flex');
            explanationBody.classList.remove('hidden');
            explanationBody.classList.add('flex');
        }, 500)
    }, 1500);

    // BUTTON ANIMATION
    setTimeout(() => {
        nextBtn.disabled = false;
        nextBtn.classList.add('fadeIn');
        nextBtn.classList.add('cursor-pointer');
    },2500)
    


    items.forEach(item => {
        item.style.pointerEvents = "none";
    });

    
}

function nextQuestion() {

    if (selected === quiz[current].answer) {
      score++;
    }


    current++;
    selected = null;
    const nextBtn = document.getElementById('next-btn');
    const choicesContainer = document.getElementById('choices');
    const explanationContainer = document.getElementById('explanationContainer');
    nextBtn.classList.remove('fadeIn');
    nextBtn.classList.remove('cursor-pointer');
    nextBtn.disabled = true;
    choicesContainer.classList.remove('hideContainer');
    explanationContainer.classList.remove('showContainer')

    const explanationHeader = document.getElementById('explanationHeader');
    const explanationBody = document.getElementById('explanationBody');
    explanationHeader.classList.remove('flex');
    explanationHeader.classList.add('hidden');
    explanationBody.classList.remove('flex');
    explanationBody.classList.add('hidden');

    if(current === quiz.length - 1){
        nextBtn.innerText = "Done";
    }

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