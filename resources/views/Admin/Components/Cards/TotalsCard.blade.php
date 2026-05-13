<div class="grid md:grid-cols-4 grid-cols-2 gap-2  ">
    {{-- TOTAL USERS --}}
    <div class="p-3 flex flex-row bg-[#f1f1f1] rounded-md gap-2">
        <div class="p-2 bg-[#37D372]/70 text-[#2A6E28] rounded-xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
        </div>
        <div class="flex flex-col">
            <span class="text-xl font-bold ">{{ $users->count() }}</span>
            <p class="text-xs text-[#808080]">TOTAL USERS</p>
        </div>
    </div>
    {{-- TOTAL ADMINS --}}
    <div class="p-3 flex flex-row bg-[#f1f1f1] rounded-md gap-2">
        <div class="p-2 bg-[#F04D4D]/55 text-[#E32727] rounded-xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
            </svg>
        </div>
        <div class="flex flex-col">
            <span class="text-xl font-bold ">{{ $users->where('role', 'admin')->count() }}</span>
            <p class="text-xs text-[#808080]">TOTAL ADMIN</p>
        </div>
    </div>
    {{-- TOTAL QUESTIONS --}}
    <div class="p-3 flex flex-row bg-[#f1f1f1] rounded-md gap-2">
        <div class="p-2 bg-[#FAB331]/55 text-[#721E1E]/71 rounded-xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
            </svg>
        </div>
        <div class="flex flex-col">
            <span class="text-xl font-bold ">453</span>
            <p class="text-xs text-[#808080]">TOTAL QUESTIONS</p>
        </div>
    </div>
    {{-- TOTAL FEEDBACKS --}}
    <div class="p-3 flex flex-row bg-[#f1f1f1] rounded-md gap-2">
        <div class="p-2 bg-[#0000FF]/17 text-[#0A0A8F]/53 rounded-xl flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
            </svg>
        </div>
        <div class="flex flex-col">
            <span class="text-xl font-bold ">57</span>
            <p class="text-xs text-[#808080]">TOTAL FEEDBACKS</p>
        </div>
    </div>
</div>