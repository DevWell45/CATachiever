<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAT Achiever</title>
    <link rel="shortcut icon" href="{{ asset('images/components/Logo.png') }}" type="image/x-icon">
</head>
<body class="w-full h-[100dvh] overflow-hidden bg-[#128C40]">

    

    <div id="app" class="w-full h-full flex flex-col">

        {{-- OVERLAY --}}
        <div id="hidden-overlay" class="fixed inset-0 bg-black/50 hidden items-start justify-center pt-10 z-50"></div>
        {{-- CARD --}}
        <div id="dropdown-card" class="w-[300px] h-[400px] bg-white fixed flex-col hidden top-3 right-3 rounded-xl px-3 py-2 z-100">
            {{-- EXIT --}}
            <svg id="close-dropdown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 absolute top-2 right-2 z-10 cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>

            {{-- HEADER --}}
            <div class="w-full h-[70px] border-b-1 border-gray-300 flex items-center flex-row gap-2">
                {{-- Profile --}}
                <div class="rounded-full w-[40px] h-[40px] bg-black flex items-center justify-center font-bold text-xl text-white">
                    {{ auth()->user()->name[0] }}
                </div>
                {{-- Name and Email --}}
                <div class="flex flex-col leading-none">
                    <h3 class="font-bold text-m"> {{ auth()->user()->name }} </h3>
                    <span class="text-[12px] text-gray-500 mt-[2px]">{{ auth()->user()->email }}</span>
                </div>
            </div>
            {{-- BUTTONS --}}
            <div class="w-full h-[305px] flex flex-col">
                <div class="w-full h-[260px] flex flex-col py-2 gap-2 font-semibold">
                    <button class="w-full h-[40px] rounded-[10px] bg-gray-200 cursor-pointer hover:bg-gray-300">Change Password</button>
                    <button class="w-full h-[40px] rounded-[10px] bg-gray-200 cursor-pointer hover:bg-gray-300">Send Feedback</button>
                </div>

                <div class="w-full h-[45px] flex items-center ">
                    <button id="logout" class="w-full font-semibold text-red-600 h-[40px] bg-gray-200 rounded-[10px] cursor-pointer hover:bg-gray-300">Log Out</button>
                </div>
            </div>
        </div>

        {{-- HEADER BAR --}}
        <div class="w-full flex-shrink-0 bg-[#26AF5A]">

            {{-- LOGO + GREETING + SETTINGS --}}
            <div class="relative w-full px-4 py-3 flex items-center">
                <img src="{{ asset('images/components/Logo.png') }}" alt="NVSU logo" class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 rounded-full">
                <div class="flex flex-col pl-3 text-white">
                    <h3 class="tracking-wide font-bold text-base sm:text-lg md:text-xl">Welcome, {{ auth()->user()->name }}!</h3>
                    <h6 class="text-xs sm:text-sm font-medium opacity-90">Ready to ace your exam?</h6>
                </div>

                <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center text-white">
                    <div id="show-dropdown" class="w-[35px] h-[35px] rounded-full bg-black flex items-center justify-center font-bold text-lg cursor-pointer">
                        {{ auth()->user()->name[0] }}
                    </div>
                </div>
            </div>

            {{-- STATS CARDS --}}
            <div class="w-full px-4 pb-5 pt-2">
                <div class="flex justify-center items-stretch gap-7 max-w-md mx-auto">

                    {{-- TOTAL SCORE CARD --}}
                    <div class="flex-1 bg-white/20 backdrop-blur-sm rounded-2xl p-4 flex flex-col items-center justify-center gap-2 min-h-[110px]">
                        <div class="w-8 h-8 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                            </svg>
                        </div>
                        <span class="text-white text-2xl font-bold leading-none">0</span>
                        <span class="text-white text-xs font-semibold opacity-90 text-center">Total Score</span>
                    </div>

                    {{-- ACCURACY CARD --}}
                    <div class="flex-1 bg-white/20 backdrop-blur-sm rounded-2xl p-4 flex flex-col items-center justify-center gap-2 min-h-[110px]">
                        <div class="w-8 h-8 text-white">
                            <svg width="100%" height="100%" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="100" cy="100" r="90" fill="none" stroke="white" stroke-width="10"/>
                                <circle cx="100" cy="100" r="60" fill="none" stroke="white" stroke-width="10"/>
                                <circle cx="100" cy="100" r="30" fill="none" stroke="white" stroke-width="10"/>
                                <circle cx="100" cy="100" r="10" fill="white"/>
                            </svg>
                        </div>
                        <span class="text-white text-2xl font-bold leading-none">0%</span>
                        <span class="text-white text-xs font-semibold opacity-90 text-center">Accuracy</span>
                    </div>

                    {{-- COMPLETED CARD --}}
                    <div class="flex-1 bg-white/20 backdrop-blur-sm rounded-2xl p-4 flex flex-col items-center justify-center gap-2 min-h-[110px]">
                        <div class="w-8 h-8 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <span class="text-white text-2xl font-bold leading-none">0</span>
                        <span class="text-white text-xs font-semibold opacity-90 text-center">Completed</span>
                    </div>

                </div>
            </div>
        </div>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 w-full overflow-y-auto min-h-0 bg-[#128C40]">
            <div class="min-h-full">
                <h4 class="text-white font-bold text-base sm:text-lg md:text-xl px-4 py-4 tracking-wide sticky top-0 bg-[#128C40] z-10">
                    Choose a Category
                </h4>
                <category-lists></category-lists>
            </div>
        </main>
    </div>

    @include('Hidden_Forms.logout')
    @vite(['resources/js/app.js','resources/css/app.css', 'resources/js/functions/Auth/Logout.js', 'resources/js/functions/pages/Home.js'])
    
</body>
</html>