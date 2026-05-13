<header class="sticky top-0 bg-[#26AF5A] flex flex-col justify-between w-full md:h-[150px] h-[120px] rounded-xl md:px-4 px-3 py-2">
    <div class="w-full md:h-[90px]  flex flex-row justify-between pt-3">

        <div class="flex flex-col">
            <h2 class="text-[#8BF7B4] md:text-lg text-sm leading-tight">Admin Panel</h2>
            <h1 class="md:text-2xl text-xl tracking-wide font-bold text-white -mt-1 leading-none tracking-wider">
                {{ $Current_Page }}
            </h1>
        </div>

        <div>
            <div id="logout" class="rounded-full text-xl w-[35px] h-[35px] bg-cyan-300 text-black flex items-center justify-center font-bold cursor-pointer">
                J
            </div>
        </div>
    </div>

    <div class=" py-3 font-semibold  text-md text-white">
        <h1>Good Morning, {{ $username }}!👋</h1>
    </div>
</header>