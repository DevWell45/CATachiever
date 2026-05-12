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
            
            

            
        </main>

    </div>
    {{-- VITE --}}
    @vite(['resources/js/app.js','resources/css/app.css', 'resources/css/Admin/Navigation.css'])
</body>
</html>