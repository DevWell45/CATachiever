<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATchiever</title>
    <link rel="shortcut icon" href="{{ asset('images/components/Logo.png') }}" type="image/x-icon">

    <style>
        .users-ul li:hover{
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }

        #app::-webkit-scrollbar{
            display: none;
        }
    </style>
</head>
<body class="w-screen h-screen overflow-hidden bg-[#128C40] font-sans flex flex-row">

    <div id="app" class="w-full h-full flex flex-col overflow-auto">

        {{-- LEFT NAVIGATION BAR (TABLET and COMPUTER) --}}
        @include('Admin.Components.Navigation.TabletAndComputerNav')

        {{-- BOTTOM NAVIGATION BAR (MOBILE) --}}
        @include('Admin.Components.Navigation.MobileNav')

        <main class="md:w-[calc(100%-250px)] md:ml-[250px] sm:w-full flex flex-col md:p-2 p-1 gap-3">
            {{-- DASHBOARD HEADER --}}
            @include('Admin.Components.Headers.DashboardHeader')

            @include('Admin.Components.Cards.TotalsCard')

            <div class=" w-full flex items-center justify-between px-2 text-white">
                <h3 class="text-xl font-bold ">Users</h3>
                <a href="" class="underline text-xs hover:text-[#8BF7B4]">see more</a>
            </div>

            <users-lists :users='@json($users)'></users-lists>
            
        </main>

    </div>
    @include('Hidden_Forms.logout')
    {{-- VITE --}}
    @vite(['resources/js/app.js','resources/css/app.css', 'resources/css/Admin/Navigation.css', 'resources/js/functions/Auth/logout.js'])
</body>
</html>