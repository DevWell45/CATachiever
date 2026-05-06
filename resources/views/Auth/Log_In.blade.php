<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAT Achiever | Log in</title>
    <link rel="shortcut icon" href="{{ asset('images/components/Logo.png') }}" type="image/x-icon">
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
                    style="font-size:clamp(1.2rem,3.5dvh,1.9rem)">NVSU</h1>
                <h3 class="font-bold leading-tight m-0"
                    style="font-size:clamp(1rem,3dvh,1.5rem)">AchieVR</h3>
                <div class="w-16 h-[3px] bg-yellow-300 rounded-full my-1"></div>
                <p class="font-medium m-0 opacity-90 tracking-wide"
                   style="font-size:clamp(0.65rem,1.6dvh,0.8rem)">Virtual Reality Quiz Game</p>
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

                <form action="/login" method="POST" class="flex flex-col gap-[clamp(0.6rem,1.8dvh,1rem)]">
                    @csrf
                    {{-- Email --}}
                    <div class="flex flex-col gap-1">
                        <label class="ps-1 font-semibold text-gray-700"
                               style="font-size:clamp(0.7rem,1.7dvh,0.85rem)">Email</label>
                        <input type="email" placeholder="example@gmail.com"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50
                                      w-full text-gray-700 focus:border-[#128C40] focus:bg-white
                                      transition-all duration-200"
                               style="height:clamp(40px,6dvh,52px); font-size:clamp(0.7rem,1.7dvh,0.85rem)">
                    </div>

                    {{-- Password --}}
                    <div class="flex flex-col gap-1">
                        <label class="ps-1 font-semibold text-gray-700"
                               style="font-size:clamp(0.7rem,1.7dvh,0.85rem)">Password</label>
                        <input type="password" placeholder="••••••••••••"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50
                                      w-full placeholder:text-gray-400 focus:border-[#128C40] focus:bg-white
                                      transition-all duration-200"
                               style="height:clamp(40px,6dvh,52px); font-size:clamp(0.85rem,1.8dvh,1rem)">
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
                        <a href="#" class="text-[#128C40] font-semibold hover:underline">Sign up</a>
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
                <h1 class="font-bold m-0 leading-none tracking-widest"
                    style="font-size:clamp(2rem,4.5vw,3.5rem)">CAT</h1>
                <h3 class="font-bold m-0 leading-none tracking-wide"
                    style="font-size:clamp(1.3rem,3vw,2.2rem)">Achiever</h3>
            </div>

            <div class="bg-yellow-300 rounded-full"
                 style="width:clamp(60px,7vw,110px); height:4px"></div>

            <div class="text-center">
                <h5 class="font-semibold m-0 leading-none opacity-95"
                    style="font-size:clamp(0.8rem,1.4vw,1.15rem)">Virtual Reality Quiz Game</h5>
                <h6 class="font-medium m-0 mt-2 leading-none opacity-75"
                    style="font-size:clamp(0.65rem,0.9vw,0.8rem)">Nueva Vizcaya State University</h6>
            </div>
        </div>

        {{-- Right panel --}}
        <div class="w-1/2 h-full flex items-center justify-start px-8 lg:px-16">

            <form action="/login" method="POST" class="w-full max-w-[460px] bg-white rounded-3xl shadow-2xl flex flex-col px-[clamp(1.5rem,3vw,2.5rem)] py-[clamp(1.25rem,4vh,2.5rem)]">
                @csrf
                <h4 class="font-bold m-0 text-gray-800 tracking-wide"
                    style="font-size:clamp(1.2rem,2.2vw,1.75rem)">Welcome Back!</h4>
                <p class="text-gray-400 mt-1.5 mb-[clamp(1rem,3vh,2rem)] text-sm">
                    Log in to start reviewing and ace your entrance exam.
                </p>

                {{-- Email --}}
                <div class="flex flex-col gap-1.5 mb-[clamp(0.6rem,2vh,1.1rem)]">
                    <label class="ps-2 font-semibold text-gray-700 text-sm">Email</label>
                    <input type="email" placeholder="example@gmail.com" name="email"
                           class="border border-gray-200 rounded-full px-5 outline-none bg-gray-50 text-sm text-gray-700 w-full focus:border-[#128C40] focus:bg-white transition-all duration-200"
                           style="height:clamp(44px,5.5vh,56px)">
                </div>

                {{-- Password --}}
                <div class="flex flex-col gap-1.5 mb-[clamp(0.6rem,2vh,1.1rem)]">
                    <label class="ps-2 font-semibold text-gray-700 text-sm">Password</label>
                    <input type="password" placeholder="••••••••" name="password"
                           class="border border-gray-200 rounded-full px-5 outline-none bg-gray-50 w-full placeholder:text-xl placeholder:text-gray-400 focus:border-[#128C40] focus:bg-white transition-all duration-200"
                           style="height:clamp(44px,5.5vh,56px)">
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

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</body>
</html>