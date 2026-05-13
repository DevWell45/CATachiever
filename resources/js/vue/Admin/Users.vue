<template>
    <ul class="users-ul w-full grid md:grid-cols-2 grid-cols 1 gap-2">
        <li class="bg-[#f1f1f1] h-[60px] flex items-center justify-between py-2 px-4 rounded-lg cursor-pointer" v-for="user in users">
            <!-- USER INFO -->
            <div class="gap-3 flex">
                <div class="w-[35px] h-[35px] flex items-center justify-center flex-row rounded-full bg-[#26AF5A] text-white font-bold text-[16px]">
                    {{ user.name[0] }}
                </div>
                <div class="flex flex-col items-start justify-center text-black">
                    <span class="text-md font-bold leading-none">{{ user.name }}</span>
                    <p class="text-[10px] text-[#808080] -mt-0">{{ user.email }}</p>
                </div>
            </div>
            <!-- USER ROLE -->
            <div class="flex flex-row gap-4 items-center">
                <span v-if="user.role === 'admin'" class="bg-[#DBEAFE] text-[#0000FF] rounded-lg text-xs p-2">Admin</span>
                <span v-else-if="user.role === 'student'" class="bg-[#D8F3DC] text-[#15803D] rounded-lg text-xs p-2">Student</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </li>
    </ul>
</template>

<script setup>
    const props = defineProps({
        users: Array
    });
</script>

<style scope>
</style>