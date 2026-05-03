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
        {{-- QUESTION --}}
        <div id="question" class="max-w-[300px] w-full py-5 text-black text-center flex items-center justify-center rounded-xl px-3 bg-[#CEF2F2]">
            What is the value of x in the equation: 2x + 5 = 15?
        </div>

        {{-- CHOICES --}}
        <ul class="w-full flex flex-col gap-2 items-center justify-center text-black">
            
            <li id="choices" class="max-w-[300px] w-full px-4 flex items-center justify-start py-3 rounded-xl text-xs font-semibold bg-[#CCCCCC] cursor-pointer hover:bg-gray-300">
                A. x = 5
            </li>

            <button onclick="nextQuestion()" class="max-w-[300px] w-full h-[40px] bg-gray-300 mt-3 rounded-xl hover:bg-gray-200 cursor-pointer ">Next Question</button>
        </ul>
    </main>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>