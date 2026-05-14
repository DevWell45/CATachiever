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

        @media (max-width: 767px) {
            .addCard {
                position: absolute;
                bottom: 0;
                border-radius: 20px 20px 0 0;
            }
        }

        

        .category-button {
            cursor: pointer;
            padding: 10px 30px 10px 30px;
            border-radius: 10px;
            border: 0.5px #26AF5A solid;
            white-space: nowrap;
        }

        .category-button:hover {
            background: #13a44bad;
        }

        .category-lists::-webkit-scrollbar,
        #app::-webkit-scrollbar {
            display: none;
        }
    </style>

</head>
<body class="w-screen h-screen overflow-hidden bg-[#128C40] font-sans flex flex-row">

    <div id="app" class="w-full h-full flex flex-col overflow-auto">
        {{-- LOADER OVERLAY --}}
        {{-- OVERLAY — outside #app, fixed to viewport --}}
        <div id="addModalOverlay" class="fixed inset-0 bg-black/70 z-[8888] hidden items-center justify-center">
            <div class="addCard bg-[#f1f1f1] md:w-[370px] h-[510px] md:rounded-2xl sm:w-full flex flex-col overflow-hidden w-full">
                <header class="bg-[#26AF5A] w-full h-[70px] p-2 flex flex-row items-center">

                    <div class="flex items-center justify-end pr-2 w-[15%]">
                        <svg class="w-[35px] h-[35px] text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                        </svg>
                    </div>

                    <div class="py-2 flex flex-col leading-none w-[80%] justify-start">
                        <h4 class="font-bold text-white">Add New Question</h4>
                        <p class="text-xs text-white/70">Fill in the details below</p>
                    </div>

                    <div class="w-[10%] flex justify-end pr-2">
                        <svg id="closeAddModal" class="w-[35px] h-[35px] text-white cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
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
                                <option value="" disabled selected>Select a Answer</option>
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
                                <option value="" disabled selected>Select a Category</option>
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
                        <button type="button" id="cancelAddModal" class="text-[12px] bg-[#808080] px-4 py-1.5 rounded-sm cursor-pointer">Cancel</button>
                        <button type="submit" class="text-[12px] bg-[#26AF5A] px-4 py-1.5 rounded-sm cursor-pointer">Add New Question</button>
                    </div>

                </form>

            </div>
        </div>
        {{-- LEFT NAVIGATION BAR (TABLET and COMPUTER) --}}
        @include('Admin.Components.Navigation.TabletAndComputerNav')

        {{-- BOTTOM NAVIGATION BAR (MOBILE) --}}
        @include('Admin.Components.Navigation.MobileNav')

        <main class="md:w-[calc(100%-250px)] md:ml-[250px] sm:w-full flex flex-col md:p-2 p-1">
            
            {{-- HEADER BAR --}}
            @include('Admin.Components.Headers.MainHeader')

            {{-- CARDS SECTION --}}
            @include('Admin.Components.Cards.InfoCards_Totals')

            {{-- CATEGORY LISTS CARD --}}
            @include('Admin.Components.CategoryLists.CategoryCards')


            {{-- MATHEMATICS --}}
            <section class="w-full flex flex-col px-3">
                <div class="flex flex-row w-full items-center py-3 justify-between">
                    <div class="flex flex-row md:gap-6 gap-2 items-center">
                        <span class="text-white font-bold md:text-xl text-md">Mathematics</span>
                        <p class="text-[#8BF7B4] md:text-[12px] text-[10px]"> • 58 Question</p>
                    </div>

                    <button type="button" id="openAddModal" class="fixed right-3 md:py-2.5 py-2 md:px-3 px-2 md:rounded-xl rounded-lg md:gap-2 gap-1 text-white font-semibold flex flex-row md:text-sm text-[10px] bg-[#26AF5A] border items-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:w-[20px] w-[15px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add New Question
                    </button>
                </div>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 flex md:flex-row flex-col">
                    <div class="flex flex-row p-2 bg-[#f1f1f1] rounded-lg gap-1 px-3 justify-between">
                        <div class="flex flex-row">
                            <div class="w-[50px] h-full flex items-center justify-center">
                                <h1 class="w-[30px] h-[30px] bg-[#128c40] rounded-full text-white font-bold flex items-center justify-center">1</h1>
                            </div>
                            <div class="flex flex-col p-2">
                                <p class="md:text-[16px] text-sm h-[85%]">What is the area of a triangle with base 10 cm and height 6 cm?</p>
                                <div class="flex flex-row items-center gap-3 md:text-xs text-[10px] text-[#808080] h-[15%]">
                                    <span class="text-[#26AF5A] font-bold">1 pt.</span>
                                    <p>Correct Answer: <u class="text-[#26AF5A]">30 cm²</u></p>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex items-center justify-center gap-3">
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#f7f7f5] border-[0.5px] border-[#E8E6E0] cursor-pointer text-[#5F5E5A]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#FEF2F2] border-[0.5px] border-[#FEE2E2] cursor-pointer text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    
                </div>
            </section>

            <hr class="my-8 border-0 h-px bg-gradient-to-r via-gray-400">

            {{-- ENGLISH --}}
            <section class="w-full flex flex-col px-3">
                <div class="flex flex-row w-full items-center py-3 justify-between">
                    <div class="flex flex-row gap-6 items-center">
                        <span class="text-white font-bold text-xl">English</span>
                        <p class="text-[#8BF7B4] text-[12px]"> • 63 Question</p>
                    </div>
                </div>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 flex md:flex-row flex-col">
                    <div class="flex flex-row p-2 bg-[#f1f1f1] rounded-lg gap-1 px-3 justify-between">
                        <div class="flex flex-row">
                            <div class="w-[50px] h-full flex items-center justify-center">
                                <h1 class="w-[30px] h-[30px] bg-[#128c40] rounded-full text-white font-bold flex items-center justify-center">1</h1>
                            </div>
                            <div class="flex flex-col p-2">
                                <p class="md:text-[16px] text-sm h-[85%]">Which of the following is a synonym for "benevolent"?</p>
                                <div class="flex flex-row items-center gap-3 text-xs text-[#808080] h-[15%]">
                                    <span class="text-[#26AF5A] font-bold">1 pt.</span>
                                    <p>Correct Answer: <u class="text-[#26AF5A]">Kind</u></p>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex items-center justify-center gap-3">
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#f7f7f5] border-[0.5px] border-[#E8E6E0] cursor-pointer text-[#5F5E5A]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#FEF2F2] border-[0.5px] border-[#FEE2E2] cursor-pointer text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    @for ($i = 0; $i <= 4; $i++)
                    <div class="flex flex-row p-2 bg-[#f1f1f1] rounded-lg gap-1 px-3 justify-between">
                        <div class="flex flex-row">
                            <div class="w-[50px] h-full flex items-center justify-center">
                                <h1 class="w-[30px] h-[30px] bg-[#128c40] rounded-full text-white font-bold flex items-center justify-center">{{ $i + 2 }}</h1>
                            </div>
                            <div class="flex flex-col p-2">
                                <p class="md:text-[16px] text-sm h-[85%]">What is the plural form of "criterion"?</p>
                                <div class="flex flex-row items-center gap-3 text-xs text-[#808080] h-[15%]">
                                    <span class="text-[#26AF5A] font-bold">1 pt.</span>
                                    <p>Correct Answer: <u class="text-[#26AF5A]">Criteria</u></p>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex items-center justify-center gap-3">
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#f7f7f5] border-[0.5px] border-[#E8E6E0] cursor-pointer text-[#5F5E5A]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#FEF2F2] border-[0.5px] border-[#FEE2E2] cursor-pointer text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endfor
                </div>
            </section>

            <hr class="my-8 border-0 h-px bg-gradient-to-r via-gray-400">

            {{-- SCIENCE --}}
            <section class="w-full flex flex-col px-3">
                <div class="flex flex-row w-full items-center py-3 justify-between">
                    <div class="flex flex-row gap-6 items-center">
                        <span class="text-white font-bold text-xl">Science</span>
                        <p class="text-[#8BF7B4] text-[12px]"> • 63 Question</p>
                    </div>
                </div>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 flex md:flex-row flex-col">
                    <div class="flex flex-row p-2 bg-[#f1f1f1] rounded-lg gap-1 px-3 justify-between">
                        <div class="flex flex-row">
                            <div class="w-[50px] h-full flex items-center justify-center">
                                <h1 class="w-[30px] h-[30px] bg-[#128c40] rounded-full text-white font-bold flex items-center justify-center">1</h1>
                            </div>
                            <div class="flex flex-col p-2">
                                <p class="md:text-[16px] text-sm h-[85%]">What is the chemical symbol for water?</p>
                                <div class="flex flex-row items-center gap-3 text-xs text-[#808080] h-[15%]">
                                    <span class="text-[#26AF5A] font-bold">1 pt.</span>
                                    <p>Correct Answer: <u class="text-[#26AF5A]">H₂O</u></p>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex items-center justify-center gap-3">
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#f7f7f5] border-[0.5px] border-[#E8E6E0] cursor-pointer text-[#5F5E5A]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#FEF2F2] border-[0.5px] border-[#FEE2E2] cursor-pointer text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    @for ($i = 0; $i <= 4; $i++)
                    <div class="flex flex-row p-2 bg-[#f1f1f1] rounded-lg gap-1 px-3 justify-between">
                        <div class="flex flex-row">
                            <div class="w-[50px] h-full flex items-center justify-center">
                                <h1 class="w-[30px] h-[30px] bg-[#128c40] rounded-full text-white font-bold flex items-center justify-center">{{ $i + 2 }}</h1>
                            </div>
                            <div class="flex flex-col p-2">
                                <p class="md:text-[16px] text-sm h-[85%]">What planet is known as the Red Planet?</p>
                                <div class="flex flex-row items-center gap-3 text-xs text-[#808080] h-[15%]">
                                    <span class="text-[#26AF5A] font-bold">1 pt.</span>
                                    <p>Correct Answer: <u class="text-[#26AF5A]">Mars</u></p>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex items-center justify-center gap-3">
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#f7f7f5] border-[0.5px] border-[#E8E6E0] cursor-pointer text-[#5F5E5A]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#FEF2F2] border-[0.5px] border-[#FEE2E2] cursor-pointer text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endfor
                </div>
            </section>

            <hr class="my-8 border-0 h-px bg-gradient-to-r via-gray-400">

            {{-- GENERAL KNOWLEDGE --}}
            <section class="w-full flex flex-col px-3">
                <div class="flex flex-row w-full items-center py-3 justify-between">
                    <div class="flex flex-row gap-6 items-center">
                        <span class="text-white font-bold text-xl">General Knowledge</span>
                        <p class="text-[#8BF7B4] text-[12px]"> • 67 Question</p>
                    </div>
                </div>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 flex md:flex-row flex-col">
                    <div class="flex flex-row p-2 bg-[#f1f1f1] rounded-lg gap-1 px-3 justify-between">
                        <div class="flex flex-row">
                            <div class="w-[50px] h-full flex items-center justify-center">
                                <h1 class="w-[30px] h-[30px] bg-[#128c40] rounded-full text-white font-bold flex items-center justify-center">1</h1>
                            </div>
                            <div class="flex flex-col p-2">
                                <p class="md:text-[16px] text-sm h-[85%]">What is the capital of the Philippines?</p>
                                <div class="flex flex-row items-center gap-3 text-xs text-[#808080] h-[15%]">
                                    <span class="text-[#26AF5A] font-bold">1 pt.</span>
                                    <p>Correct Answer: <u class="text-[#26AF5A]">Manila</u></p>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex items-center justify-center gap-3">
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#f7f7f5] border-[0.5px] border-[#E8E6E0] cursor-pointer text-[#5F5E5A]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#FEF2F2] border-[0.5px] border-[#FEE2E2] cursor-pointer text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    @for ($i = 0; $i <= 4; $i++)
                    <div class="flex flex-row p-2 bg-[#f1f1f1] rounded-lg gap-1 px-3 justify-between">
                        <div class="flex flex-row">
                            <div class="w-[50px] h-full flex items-center justify-center">
                                <h1 class="w-[30px] h-[30px] bg-[#128c40] rounded-full text-white font-bold flex items-center justify-center">{{ $i + 2 }}</h1>
                            </div>
                            <div class="flex flex-col p-2">
                                <p class="md:text-[16px] text-sm h-[85%]">How many provinces does the Philippines have?</p>
                                <div class="flex flex-row items-center gap-3 text-xs text-[#808080] h-[15%]">
                                    <span class="text-[#26AF5A] font-bold">1 pt.</span>
                                    <p>Correct Answer: <u class="text-[#26AF5A]">82</u></p>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex items-center justify-center gap-3">
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#f7f7f5] border-[0.5px] border-[#E8E6E0] cursor-pointer text-[#5F5E5A]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#FEF2F2] border-[0.5px] border-[#FEE2E2] cursor-pointer text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endfor
                </div>
            </section>

            <hr class="my-8 border-0 h-px bg-gradient-to-r via-gray-400">

            {{-- ABSTRACT REASONING --}}
            <section class="w-full flex flex-col px-3 mb-10">
                <div class="flex flex-row w-full items-center py-3 justify-between">
                    <div class="flex flex-row gap-6 items-center">
                        <span class="text-white font-bold text-xl">Abstract Reasoning</span>
                        <p class="text-[#8BF7B4] text-[12px]"> • 63 Question</p>
                    </div>
                </div>

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 flex md:flex-row flex-col">
                    <div class="flex flex-row p-2 bg-[#f1f1f1] rounded-lg gap-1 px-3 justify-between">
                        <div class="flex flex-row">
                            <div class="w-[50px] h-full flex items-center justify-center">
                                <h1 class="w-[30px] h-[30px] bg-[#128c40] rounded-full text-white font-bold flex items-center justify-center">1</h1>
                            </div>
                            <div class="flex flex-col p-2">
                                <p class="md:text-[16px] text-sm h-[85%]">Which shape comes next in the pattern: circle, square, triangle, circle, square, ___?</p>
                                <div class="flex flex-row items-center gap-3 text-xs text-[#808080] h-[15%]">
                                    <span class="text-[#26AF5A] font-bold">1 pt.</span>
                                    <p>Correct Answer: <u class="text-[#26AF5A]">Triangle</u></p>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex items-center justify-center gap-3">
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#f7f7f5] border-[0.5px] border-[#E8E6E0] cursor-pointer text-[#5F5E5A]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#FEF2F2] border-[0.5px] border-[#FEE2E2] cursor-pointer text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    @for ($i = 0; $i <= 4; $i++)
                    <div class="flex flex-row p-2 bg-[#f1f1f1] rounded-lg gap-1 px-3 justify-between">
                        <div class="flex flex-row">
                            <div class="w-[50px] h-full flex items-center justify-center">
                                <h1 class="w-[30px] h-[30px] bg-[#128c40] rounded-full text-white font-bold flex items-center justify-center">{{ $i + 2 }}</h1>
                            </div>
                            <div class="flex flex-col p-2">
                                <p class="md:text-[16px] text-sm h-[85%]">If all bloops are razzles and all razzles are lazzles, are all bloops definitely lazzles?</p>
                                <div class="flex flex-row items-center gap-3 text-xs text-[#808080] h-[15%]">
                                    <span class="text-[#26AF5A] font-bold">1 pt.</span>
                                    <p>Correct Answer: <u class="text-[#26AF5A]">Yes</u></p>
                                </div>
                            </div>
                        </div>
                        <div class="h-full flex items-center justify-center gap-3">
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#f7f7f5] border-[0.5px] border-[#E8E6E0] cursor-pointer text-[#5F5E5A]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button class="p-1 rounded-md flex items-center justify-center bg-[#FEF2F2] border-[0.5px] border-[#FEE2E2] cursor-pointer text-[#DC2626]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[20px] h-[20px]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endfor
                </div>
            </section>

        </main>
    </div>

    {{-- VITE --}}
    @vite(['resources/js/app.js','resources/css/app.css','resources/css/Admin/Navigation.css'])

    {{-- SCRIPT --}}
    <script>
        
        document.addEventListener("DOMContentLoaded", () => {

            
            
            const openBtn = document.getElementById('openAddModal');
            const modalOverlay = document.getElementById('addModalOverlay');
            const closeBtn = document.getElementById('closeAddModal');
            const cancelBtn = document.getElementById('cancelAddModal');

            

            function openModal() {
                modalOverlay.classList.remove('hidden');
                modalOverlay.classList.add('flex');
            }

            function closeModal() {
                modalOverlay.classList.remove('flex');
                modalOverlay.classList.add('hidden');
            }

            openBtn.addEventListener('click', openModal);
            closeBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);

            modalOverlay.addEventListener('click', (e) => {
                if (e.target === modalOverlay) closeModal();
            });
        });
    </script>
</body>
</html>