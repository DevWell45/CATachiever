<header class="sticky top-0 bg-[#26AF5A] w-full md:h-[170px] h-[140px] rounded-xl md:px-4 px-3 py-2">
    <div class="w-full md:h-[90px] h-[70px] flex flex-row justify-between pt-3">

        <div class="flex flex-col">
            <h2 class="text-[#8BF7B4] md:text-lg text-sm leading-tight">Admin Panel</h2>
            <h1 class="md:text-2xl text-xl tracking-wide font-bold text-white -mt-1 leading-none">
                {{ $Current_Page }}
            </h1>
        </div>

        <div>
            <div class="rounded-full text-xl w-[35px] h-[35px] bg-cyan-300 text-black flex items-center justify-center font-bold cursor-pointer">
                J
            </div>
        </div>
    </div>

    <div class="w-full h-[70px] flex items-start pt-1 justify-center">
        <div class="flex items-center justify-start md:w-[80%] w-full border-[0.5px] border-gray-400 bg-[#128C40] md:h-[45px] h-[40px] rounded-xl text-white md:text-md text-[12px]">
            <div id="searchIcon" class="w-[50px] h-full flex items-center justify-center cursor-text">
                <svg class="w-[20px] h-[20px] md:w-[20px] md:h-[20px] text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
            <input type="search" id="searchInput" placeholder="Search Question here..." class="outline-none w-[calc(100%-50px)] h-full">
        </div>
    </div>
</header>