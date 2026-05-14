<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATchiever | Sign up</title>
    <link rel="shortcut icon" href="{{ asset('images/components/Logo.png') }}" type="image/x-icon">
</head>
<body class="w-screen h-screen overflow-hidden bg-[#128C40] font-sans">

    {{-- ══════════════════════════════════════ --}}
    {{-- MOBILE / TABLET (hidden on md+)       --}}
    {{-- ══════════════════════════════════════ --}}
    <div class="flex md:hidden w-full h-full items-center justify-center p-4">

        <div class="w-full max-w-[400px] flex flex-col rounded-3xl overflow-hidden shadow-2xl bg-white"
             style="max-height: 92dvh;">

            {{-- Green header - Reduced padding slightly to accommodate new field --}}
            <div class="bg-[#26AF5A] flex flex-col items-center justify-center text-white
                        py-[clamp(0.75rem,2.5dvh,1.5rem)] px-6 shrink-0 gap-1">
                <img src="{{ asset('images/components/Logo.png') }}" alt="Logo"
                     class="object-contain mb-1 drop-shadow-lg"
                     style="width:clamp(45px,6dvh,65px); height:clamp(45px,6dvh,65px)">
                <h1 class="font-bold leading-tight m-0 tracking-wide"
                    style="font-size:clamp(1.1rem,3dvh,1.6rem)">CATchiever</h1>
                
                <div class="w-20 h-[2px] bg-yellow-300 rounded-full my-1"></div>
                <p class="font-medium m-0 opacity-90 tracking-wide"
                   style="font-size:clamp(0.65rem,1.6dvh,0.8rem)">Quiz Game</p>
            </div>

            {{-- White form body - Added overflow-y-auto for small screens --}}
            <div class="flex-1 overflow-y-auto px-[clamp(1.25rem,5vw,2rem)] py-[clamp(1rem,2.5dvh,1.5rem)]">

                <h4 class="font-bold m-0 text-gray-800 tracking-wide"
                    style="font-size:clamp(1rem,2.5dvh,1.2rem)">Create Account</h4>
                <p class="text-gray-400 mt-1 mb-[clamp(0.8rem,2dvh,1.2rem)]"
                   style="font-size:clamp(0.65rem,1.5dvh,0.75rem)">
                    Create your account now to review and ace your entrance exam.
                </p>

                <form action="/register" method="POST" class="flex flex-col gap-[clamp(0.5rem,1.5dvh,0.85rem)]">
                    @csrf
                    {{-- Full Name --}}
                    <div class="flex flex-col gap-1">
                        <label class="ps-1 font-semibold text-gray-700" style="font-size:0.75rem">First Name and Last Name</label>
                        <input type="text" placeholder="First Name and Last Name" name="name"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50 w-full text-gray-700 focus:border-[#128C40] focus:bg-white transition-all duration-200"
                               style="height:clamp(38px,5dvh,48px); font-size:0.85rem">
                    </div>

                    {{-- Email --}}
                    <div class="flex flex-col gap-1">
                        <label class="ps-1 font-semibold text-gray-700" style="font-size:0.75rem">Email</label>
                        <input type="email" placeholder="example@gmail.com" name="email"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50 w-full text-gray-700 focus:border-[#128C40] focus:bg-white transition-all duration-200"
                               style="height:clamp(38px,5dvh,48px); font-size:0.85rem">
                    </div>

                    {{-- Password --}}
                    <div class="flex flex-col gap-1">
                        <label class="ps-1 font-semibold text-gray-700" style="font-size:0.75rem">Password</label>
                        <input type="password" placeholder="••••••••" name="password"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50 w-full focus:border-[#128C40] focus:bg-white transition-all duration-200"
                               style="height:clamp(38px,5dvh,48px); font-size:0.85rem">
                    </div>

                    {{-- Confirm Password --}}
                    <div class="flex flex-col gap-1">
                        <label class="ps-1 font-semibold text-gray-700" style="font-size:0.75rem">Confirm Password</label>
                        <input type="password" placeholder="••••••••" name="password_confirmation"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50 w-full focus:border-[#128C40] focus:bg-white transition-all duration-200"
                               style="height:clamp(38px,5dvh,48px); font-size:0.85rem">
                    </div>

                    @if ($errors->any())
                        <div>
                            @foreach ($errors->all() as $error)
                                <p class="text-red-500 text-xs w-full flex items-center justify-center py-2">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full bg-[#128c40] hover:bg-[#0e6e32] text-white font-bold rounded-full cursor-pointer shadow-md transition-all mt-2"
                            style="min-height:44px; font-size:0.9rem">
                        Create Account
                    </button>

                    <div class="flex justify-center items-center gap-1.5 pb-2 text-xs">
                        <span class="text-gray-500">Already have an account?</span>
                        <a href="{{ route('login') }}" class="text-[#128C40] font-semibold hover:underline">Log in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ══════════════════════════════════════ --}}
    {{-- DESKTOP (hidden below md)             --}}
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

            <form action="/register" method="POST"
                  class="w-full max-w-[460px] bg-white rounded-3xl shadow-2xl flex flex-col px-[clamp(1.5rem,3vw,2.5rem)] py-[clamp(1.25rem,3.5vh,2.25rem)]">
                @csrf

                <h4 class="font-bold m-0 text-gray-800 tracking-wide"
                    style="font-size:clamp(1.2rem,2.2vw,1.6rem)">Create Account!</h4>
                <p class="text-gray-400 mt-1.5 mb-[clamp(1rem,2.5vh,1.75rem)] text-sm">
                    Create your account now to review and ace your entrance exam.
                </p>

                {{-- Inputs - Using slightly tighter margins to keep the form contained --}}
                <div class="flex flex-col gap-[clamp(0.5rem,1.8vh,0.9rem)]">
                    <div class="flex flex-col gap-1">
                        <label class="ps-2 font-semibold text-gray-700 text-xs uppercase"><strong>First Name</strong> and <strong>Last Name</strong></label>
                        <input type="text" placeholder="First Name and Last Name" name="name"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50 text-sm text-gray-700 w-full focus:border-[#128C40] focus:bg-white transition-all duration-200"
                               style="height:clamp(40px,5vh,52px)">
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="ps-2 font-semibold text-gray-700 text-xs uppercase">Email</label>
                        <input type="email" placeholder="example@gmail.com" name="email"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50 text-sm text-gray-700 w-full focus:border-[#128C40] focus:bg-white transition-all duration-200"
                               style="height:clamp(40px,5vh,52px)">
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="ps-2 font-semibold text-gray-700 text-xs uppercase">Password</label>
                        <input type="password" placeholder="••••••••" name="password"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50 w-full focus:border-[#128C40] focus:bg-white transition-all duration-200"
                               style="height:clamp(40px,5vh,52px)">
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="ps-2 font-semibold text-gray-700 text-xs uppercase">Confirm Password</label>
                        <input type="password" placeholder="••••••••" name="password_confirmation"
                               class="border border-gray-200 rounded-full ps-5 outline-none bg-gray-50 w-full focus:border-[#128C40] focus:bg-white transition-all duration-200"
                               style="height:clamp(40px,5vh,52px)">
                    </div>
                </div>

                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500 text-xs w-full flex items-center justify-center py-2">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <button type="submit"
                        class="w-full bg-[#128c40] hover:bg-[#0e6e32] text-white font-bold rounded-full cursor-pointer shadow-md hover:shadow-xl tracking-wide transition-all duration-200 mt-6"
                        style="height:clamp(44px,5.5vh,54px); font-size:clamp(0.95rem,1.5vw,1.1rem)">
                    Create Account
                </button>

                <div class="flex justify-center items-center gap-2 text-sm mt-4">
                    <span class="text-gray-500">Already have an Account?</span>
                    <a href="{{ route('login') }}" class="text-[#128C40] font-semibold hover:underline">Log in</a>
                </div>

            </form>
        </div>
    </div>

    @vite(['resources/css/app.css'])
</body>
</html>