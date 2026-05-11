<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATchiever</title>
    <link rel="shortcut icon" href="{{ asset('images/components/Logo.png') }}" type="image/x-icon">

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        input[type=number] {
        -moz-appearance: textfield;
        }

        @media (max-width: 767px){
            .addCard{
                position: absolute;
                bottom: 0;
                border-radius: 20px 20px 0 0;
            }
        }

    </style>

</head>
<body class="w-screen h-screen overflow-hidden bg-[#128C40] font-sans flex flex-row">

    <div id="app" class="w-full h-full flex flex-col">

        {{-- OVERLAY --}}
        <div class="w-full h-full fixed sm:relative inset-0 bg-black/70 z-50 hidden items-center justify-center">
            <div class="addCard bg-[#f1f1f1] md:w-[370px] h-[510px] md:rounded-2xl sm:w-full flex flex-col overflow-hidden w-full">
                <header class="bg-[#26AF5A] w-full h-[70px] p-2 flex flex-row items-center">

                    <div class="flex items-center justify-end pr-2 w-[15%]">
                        <svg class="w-[35px] h-[35px] text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                        </svg>
                    </div>

                    <div class="py-2 flex flex-col leading-none w-[80%] justify-start">
                        <h4 class="font-bold text-white">Add New Question</h4>
                        <p class="text-xs text-white/70">Fill in the details below</p>
                    </div>

                    <div class="w-[10%] flex justify-end pr-2">
                        <svg class="w-[35px] h-[35px] text-white cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>

                </header>

                <form class="w-full h-[calc(100%-70px)] px-3 py-2 flex flex-col">
                    <h4 class="tracking-wide font-bold text-[12px] mb-2">Question</h4>
                    <textarea name="" id="" cols="30" rows="10"
                        class="w-full border-[#808080] border bg-[#f1f1f1] max-h-[80px] text-xs rounded-xl px-4 py-2 outline-none"
                        placeholder="Type your question here..."></textarea>
                    
                    <div class="w-full flex flex-row mt-2 gap-5">

                        <div class="flex flex-col">
                            <label class="tracking-wide font-bold text-[12px] mb-2">Correct Answer</label>
                            <select class="w-full border-1 border-[#808080] px-3 py-1 text-[10px] font-semibold text-center cursor-pointer rounded-lg bg-[#f1f1f1] outline-none appearance-none">
                                <option value="" disabled selected>
                                    Select a Answer
                                </option>
                                <option class="text-black text-start" value="A">A</option>
                                <option class="text-black text-start" value="B">B</option>
                                <option class="text-black text-start" value="C">C</option>
                                <option class="text-black text-start" value="D">D</option>
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <label class="tracking-wide font-bold text-[12px] mb-2">Points</label>
                            <input type="number" class="w-[50px] border-1 border-[#808080] font-semibold rounded-lg outline-none text-center text-[10px] py-1 px-3" value="1">
                        </div>

                        <div class="flex flex-col">
                            <label class="tracking-wide font-bold text-[12px] mb-2">Category</label>
                            <select class="w-full border-1 border-[#808080] px-3 py-1 text-[10px] font-semibold text-center cursor-pointer rounded-lg bg-[#f1f1f1] outline-none appearance-none">
                                <option value="" disabled selected>
                                    Select a Category
                                </option>
                                <option class="text-black text-start" value="Mathematics">Mathematics</option>
                                <option class="text-black text-start" value="English">English</option>
                                <option class="text-black text-start" value="Science">Science</option>
                                <option class="text-black text-start" value="General Knowledge">General Knowledge</option>
                                <option class="text-black text-start" value="Abstract Reasoning">Abstract Reasoning</option>
                            </select>
                        </div>
    
                    </div>

                    <div class="w-full flex flex-col mt-2 gap-2">
                        <label class="tracking-wide font-bold text-[12px] mb-2">Answer Choices</label>
                        
                            
                        <input type="text" class="outline-none border-1 border-[#808080] rounded-md w-full h-[35px] px-2 text-[12px]" placeholder="Enter Choice A">
                        <input type="text" class="outline-none border-1 border-[#808080] rounded-md w-full h-[35px] px-2 text-[12px]" placeholder="Enter Choice B">
                        <input type="text" class="outline-none border-1 border-[#808080] rounded-md w-full h-[35px] px-2 text-[12px]" placeholder="Enter Choice C">
                        <input type="text" class="outline-none border-1 border-[#808080] rounded-md w-full h-[35px] px-2 text-[12px]" placeholder="Enter Choice D">
                        
                    </div>

                    <div class="flex flex-row gap-3 items-center justify-end text-white pt-4">
                        <button class="text-[12px] bg-[#808080] px-4 py-1.5 rounded-sm cursor-pointer">Cancel</button>
                        <button class="text-[12px] bg-[#26AF5A] px-4 py-1.5 rounded-sm cursor-pointer">Add New Question</button>
                    </div>

                </form>

            </div>
        </div>

        {{-- SIDE BAR --}}
        <nav class="w-[250px] md:flex md:flex hidden h-full bg-[#26AF5A] border-[#808080] border-r-1 border-r fixed">

        </nav>

        <main class="lg:w-[calc(100%-250px)] lg:ml-[250px] sm:w-full flex flex-col p-2">
            <header class="bg-[#26AF5A] w-full md:h-[180px] h-[140px] rounded-t-xl md:px-4 px-3 py-2">
                <div class="w-full md:h-[100px] h-[70px] flex flex-row justify-between pt-3">

                    <div class="flex flex-col leading-none">
                        <h2 class="text-[#8BF7B4] md:text-xl text-sm">Admin Panel</h2>
                        <h1 class="md:text-2xl text-md font-bold text-white">Good Morning</h1>
                    </div>

                    <div>
                        <div class="rounded-full md:w-[45px] md:h-[45px] md:text-2xl text-lg w-[35px] h-[35px] bg-cyan-500 flex items-center justify-center font-bold  cursor-pointer">
                            J
                        </div>
                    </div>
                </div>

                <div class="w-full h-[70px] flex items-start pt-1 justify-center ">
                    <div class="relative">
                        <svg class="w-[20px] h-[20px] md:w-[20px] md:h-[20px] absolute left-2 top-2.5 md:top-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                    <input type="search" placeholder="Search Question here..." class="md:w-[80%] w-full border-1 border-white bg-[#128C40] md:h-[45px] h-[40px] rounded-xl px-[40px] outline-none text-white md:text-md text-[12px]">
                </div>
            </header>
        </main>
    </div>

    @vite(['resources/js/app.js','resources/css/app.css'])
</body>
</html>