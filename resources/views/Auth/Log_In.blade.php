<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATchiever | Log in</title>
    <link rel="shortcut icon" href="{{ asset('images/components/Logo.png') }}" type="image/x-icon">
    <style>
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }

        input[type="password"]::-webkit-credentials-auto-fill-button,
        input[type="password"]::-webkit-textfield-decoration-container {
            display: none !important;
        }
    </style>
</head>
<body class="w-screen h-screen overflow-hidden bg-[#128C40] font-sans">

    {{-- ══════════════════════════════════════ --}}
    {{-- MOBILE / TABLET  (hidden on md+)       --}}
    {{-- ══════════════════════════════════════ --}}
    <div class="flex md:hidden w-full h-full items-center justify-center p-5">

        <div class="w-full max-w-[400px] flex flex-col rounded-3xl overflow-hidden shadow-2xl"
             style="max-height: calc(100dvh - 2.5rem)">

            {{-- Green header --}}
            <div class="bg-[#26AF5A] flex flex-col items-center justify-center text-white
                        py-[clamp(1rem,3.5dvh,2rem)] px-6 shrink-0 gap-1">
                <img src="{{ asset('images/components/Logo.png') }}" alt="Logo"
                     class="object-contain mb-1 drop-shadow-lg"
                     style="width:clamp(52px,8dvh,80px); height:clamp(52px,8dvh,80px)">
                <h1 class="font-bold leading-tight m-0 tracking-wide"
                    style="font-size:clamp(1.2rem,3.5dvh,1.9rem)">CATchiever</h1>
                
                <div class="w-20 h-[3px] bg-yellow-300 rounded-full my-1"></div>
                <p class="font-medium m-0 opacity-90 tracking-wide"
                   style="font-size:clamp(0.65rem,1.6dvh,0.8rem)">Quiz Game</p>
            </div>

            {{-- White form body --}}
            <div class="bg-white flex flex-col justify-center
                        px-[clamp(1.25rem,5vw,2rem)] py-[clamp(1rem,3dvh,1.75rem)]">

                <h4 class="font-bold m-0 text-gray-800 tracking-wide"
                    style="font-size:clamp(1rem,2.5dvh,1.3rem)">WELCOME BACK</h4>
                <p class="text-gray-400 mt-1 mb-[clamp(0.8rem,2.5dvh,1.4rem)]"
                   style="font-size:clamp(0.65rem,1.5dvh,0.78rem)">
                    Log in to review and ace your entrance exam
                </p>

                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500 text-md w-full flex items-center justify-center py-2">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="/login" method="POST" class="flex flex-col gap-[clamp(0.6rem,1.8dvh,1rem)]">
                    @csrf
                    {{-- Email --}}
                    <div class="flex flex-col gap-1">
                        <label class="ps-1 font-semibold text-gray-700"
                               style="font-size:clamp(0.7rem,1.7dvh,0.85rem)">Email</label>
                        <input type="email" placeholder="example@gmail.com" name="email"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50
                                      w-full text-gray-700 focus:border-[#128C40] focus:bg-white
                                      transition-all duration-200"
                               style="height:clamp(40px,6dvh,52px); font-size:clamp(0.7rem,1.7dvh,0.85rem)">
                    </div>

                    {{-- Password --}}
                    <div class="flex flex-col gap-1 relative">
                        <label class="ps-1 font-semibold text-gray-700"
                               style="font-size:clamp(0.7rem,1.7dvh,0.85rem)">Password</label>
                        <input type="password" placeholder="••••••••••••" name="password"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50
                                      w-full placeholder:text-gray-400 focus:border-[#128C40] focus:bg-white
                                      transition-all duration-200"
                                id="passwordInput_mobile"
                               style="height:clamp(40px,6dvh,52px); font-size:clamp(0.85rem,1.8dvh,1rem)">
                        
                        {{-- OPEN EYE --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                            class="flex z-[100] size-6 absolute right-4 bottom-2 cursor-pointer text-gray-600 flex"
                            id="openedEye_mobile">
                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                        </svg>
                        {{-- CLOSE EYE --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                            class="hidden z-[100] size-6 absolute right-4 bottom-2 cursor-pointer text-gray-600"
                            id="closedEye_mobile">
                            <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                            <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                            <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                        </svg>
                    </div>

                    {{-- Remember / Forgot --}}
                    <div class="flex justify-between items-center px-1">
                        <label class="flex items-center gap-2 cursor-pointer text-gray-600"
                               style="font-size:clamp(0.65rem,1.5dvh,0.78rem)">
                            <input type="checkbox" class="w-3.5 h-3.5 accent-[#128C40]">
                            Remember me!
                        </label>
                        <a href="#" class="text-[#128C40] font-semibold hover:underline"
                           style="font-size:clamp(0.65rem,1.5dvh,0.78rem)">Forgot Password?</a>
                    </div>                    

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full bg-[#128c40] hover:bg-[#0e6e32] text-white font-bold
                                   rounded-full cursor-pointer shadow-md hover:shadow-lg
                                   transition-all duration-200 tracking-wide
                                   mt-[clamp(0.2rem,1dvh,0.6rem)]"
                            style="height:clamp(42px,6.5dvh,54px); font-size:clamp(0.85rem,2dvh,1rem)">
                        Log in
                    </button>

                    {{-- Sign up --}}
                    <div class="flex justify-center items-center gap-1.5
                                pt-[clamp(0.1rem,0.8dvh,0.4rem)]"
                         style="font-size:clamp(0.65rem,1.5dvh,0.78rem)">
                        <span class="text-gray-500">Don't have an account?</span>
                        <a href="{{ route('signup') }}" class="text-[#128C40] font-semibold hover:underline">Sign up</a>
                    </div>

                </form>
            </div>
        </div>
    </div>


    {{-- ══════════════════════════════════════ --}}
    {{-- DESKTOP  (hidden below md)             --}}
    {{-- ══════════════════════════════════════ --}}
    <div class="hidden md:flex w-full h-full">

        {{-- Left panel --}}
        <div class="w-1/2 h-full flex flex-col items-center justify-center text-white px-8 gap-3">
            <img src="{{ asset('images/components/Logo.png') }}" alt="Logo"
                 class="object-contain drop-shadow-2xl"
                 style="width:clamp(90px,11vw,170px); height:clamp(90px,11vw,170px)">

            <div class="text-center">
                <h1 class="font-bold m-0 leading-none tracking-wide"
                    style="font-size:clamp(2rem,4.5vw,3.5rem)">CATchiever</h1>
                
            </div>

            <div class="bg-yellow-300 rounded-full"
                 style="width:clamp(60px,7vw,110px); height:4px"></div>

            <div class="text-center">
                <h5 class="font-semibold m-0 leading-none opacity-95"
                    style="font-size:clamp(0.8rem,1.4vw,1.15rem)">Quiz Game</h5>
                <h6 class="font-medium m-0 mt-2 leading-none opacity-75"
                    style="font-size:clamp(0.65rem,0.9vw,0.8rem)">Nueva Vizcaya State University</h6>
            </div>
        </div>

        {{-- Right panel --}}
        <div class="w-1/2 h-full flex items-center justify-start px-8 lg:px-16">

            <form action="/login" method="POST" 
                class="w-full max-w-[460px] bg-white rounded-3xl shadow-2xl 
                flex flex-col px-[clamp(1.5rem,3vw,2.5rem)] py-[clamp(1.25rem,4vh,2.5rem)]">
                @csrf
                <h4 class="font-bold m-0 text-gray-800 tracking-wide"
                    style="font-size:clamp(1.2rem,2.2vw,1.75rem)">Welcome Back!</h4>
                <p class="text-gray-400 mt-1.5 mb-[clamp(1rem,3vh,2rem)] text-sm">
                    Log in to start reviewing and ace your entrance exam.
                </p>

                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500 text-md w-full flex items-center justify-center py-2">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {{-- Email --}}
                <div class="flex flex-col gap-1.5 mb-[clamp(0.6rem,2vh,1.1rem)]">
                    <label class="ps-2 font-semibold text-gray-700 text-sm">Email</label>
                    <input type="email" placeholder="example@gmail.com" name="email"
                           class="border border-gray-200 rounded-full px-5 outline-none bg-gray-50 text-sm text-gray-700 w-full focus:border-[#128C40] focus:bg-white transition-all duration-200"
                           style="height:clamp(44px,5.5vh,56px)">
                </div>

                {{-- Password --}}
                <div class="flex flex-col gap-1.5 mb-[clamp(0.6rem,2vh,1.1rem)] relative">
                    <label class="ps-2 font-semibold text-gray-700 text-sm">Password</label>
                    <input type="password" placeholder="••••••••" name="password"
                        id="passwordInput_desktop"
                           class="border border-gray-200 rounded-full px-5 outline-none bg-gray-50 w-full 
                           placeholder:text-xl placeholder:text-gray-400 focus:border-[#128C40] focus:bg-white transition-all duration-200"
                           style="height:clamp(44px,5.5vh,56px)">
                    {{-- OPEN EYE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                        class="flex z-[100] size-6 absolute right-4 bottom-2.5 cursor-pointer text-gray-600 flex"
                        id="openedEye_desktop">
                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                    </svg>
                    {{-- CLOSE EYE --}}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                        class="hidden z-[100] size-6 absolute right-4 bottom-2.5 cursor-pointer text-gray-600"
                        id="closedEye_desktop">
                        <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                        <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                        <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                    </svg>



                </div>

                {{-- Remember / Forgot --}}
                <div class="flex justify-between items-center px-2 mb-[clamp(0.5rem,2vh,1rem)]">
                    <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 accent-[#128C40]"> Remember me
                    </label>
                    <a href="#" class="text-sm text-[#128C40] font-semibold hover:underline">
                        Forgot Password?
                    </a>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full bg-[#128c40] hover:bg-[#0e6e32] text-white font-bold
                               rounded-full cursor-pointer shadow-md hover:shadow-xl
                               tracking-wide transition-all duration-200"
                        style="height:clamp(46px,5.5vh,58px); font-size:clamp(0.95rem,1.5vw,1.15rem)">
                    Log in
                </button>

                {{-- Sign up --}}
                <div class="flex justify-center items-center gap-2 text-sm
                            mt-[clamp(0.75rem,2vh,1.25rem)]">
                    <span class="text-gray-500">Don't have an Account?</span>
                    <a href="{{ route('signup') }}" class="text-[#128C40] font-semibold hover:underline">Sign Up</a>
                </div>

            </form>
        </div>
    </div>

    @vite(['resources/css/app.css'])
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // DESKTOP
            const openedEye_desktop = document.getElementById('openedEye_desktop');
            const closedEye_desktop = document.getElementById('closedEye_desktop');
            const passwordInput_desktop = document.getElementById('passwordInput_desktop');

            // MOBILE
            const openedEye_mobile = document.getElementById('openedEye_mobile');
            const closedEye_mobile = document.getElementById('closedEye_mobile');
            const passwordInput_mobile = document.getElementById('passwordInput_mobile');

            function updateEye() {

                if (passwordInput_desktop.type === "password" && passwordInput_mobile.type === "password") {
                //  openedEye_desktop
                    openedEye_desktop.classList.remove('hidden');
                    openedEye_desktop.classList.add('flex');
                //  closedEye_desktop
                    closedEye_desktop.classList.remove('flex');
                    closedEye_desktop.classList.add('hidden');

                //  openedEye_mobile
                    openedEye_mobile.classList.remove('hidden');
                    openedEye_mobile.classList.add('flex');
                //  closedEye_mobile
                    closedEye_mobile.classList.remove('flex');
                    closedEye_mobile.classList.add('hidden');

                } else {
                //  closedEye_desktop
                    closedEye_desktop.classList.remove('hidden');
                    closedEye_desktop.classList.add('flex');
                //  openedEye_desktop 
                    openedEye_desktop.classList.remove('flex');
                    openedEye_desktop.classList.add('hidden');
                    
                //  closedEye_mobile
                    closedEye_mobile.classList.remove('hidden');
                    closedEye_mobile.classList.add('flex');
                //  openedEye_mobile 
                    openedEye_mobile.classList.remove('flex');
                    openedEye_mobile.classList.add('hidden');
                }
            }

            // DESKTOP
            openedEye_desktop.addEventListener('click', () => {
                passwordInput_desktop.type = "text";
                passwordInput_desktop.focus();
                updateEye();
            });

            closedEye_desktop.addEventListener('click', () => {
                passwordInput_desktop.type = "password";
                passwordInput_desktop.focus();
                updateEye();
            });

            // MOBILE
            openedEye_mobile.addEventListener('click', () => {
                passwordInput_mobile.type = "text";
                passwordInput_mobile.focus();
                updateEye();
            });

            closedEye_mobile.addEventListener('click', () => {
                passwordInput_mobile.type = "password";
                passwordInput_mobile.focus();
                updateEye();
            });

            updateEye();
        });
    </script>
</body>
</html>