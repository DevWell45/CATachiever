<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATchiever</title>
    <link rel="shortcut icon" href="{{ asset('images/components/Logo.png') }}" type="image/x-icon">

</head>
<body class="w-screen h-screen overflow-hidden bg-[#128C40] font-sans flex flex-row">

    <div id="app" class="w-full h-full flex flex-col overflow-auto">

        {{-- LEFT NAVIGATION BAR (TABLET and COMPUTER) --}}
        @include('Admin.Components.Navigation.TabletAndComputerNav')

        {{-- BOTTOM NAVIGATION BAR (MOBILE) --}}
        @include('Admin.Components.Navigation.MobileNav')

        <main class="md:w-[calc(100%-250px)] md:ml-[250px] sm:w-full flex flex-col md:p-2 p-1">
            
            {{-- HEADER BAR --}}
            @include('Admin.Components.Headers.MainHeader')

            {{-- CARDS SECTION --}}
            @include('Admin.Components.Cards.InfoCards_Totals')

            <div class=" w-full flex items-center justify-between px-2 text-white my-3">
                <h3 class="text-xl font-bold ">Admins</h3>
                <button type="button" id="openAddModal" class="fixed right-3 md:py-2.5 py-2 md:px-3 px-2 md:rounded-xl rounded-lg md:gap-2 gap-1 text-white font-semibold flex flex-row md:text-sm text-[10px] bg-[#26AF5A] border items-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:w-[20px] w-[15px]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Create Admin Account
                </button>
            </div>

            <users-lists :users='@json($users->where('role', 'admin'))'></users-lists>

            <div class=" w-full flex items-center justify-between px-2 text-white my-3">
                <h3 class="text-xl font-bold ">Students</h3>
            </div>

            <users-lists :users='@json($users->where('role', 'student'))'></users-lists>
            
        </main>

    </div>
    {{-- VITE --}}
    @vite(['resources/js/app.js','resources/css/app.css', 'resources/css/Admin/Navigation.css'])
</body>
</html>