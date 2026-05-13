<template>
    <div class="w-full min-h-full px-4 pb-6 pt-1">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-7 max-w-7xl mx-auto">

            <!-- MATHEMATICS CATEGORY -->
            <div class="category-type bg-blue-600 flex items-center relative group cursor-pointer"
                 @click="startMath">
                <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 p-2 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M6.32 1.827a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V4.757c0-1.47 1.073-2.756 2.57-2.93ZM7.5 11.25a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H8.25a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H8.25Zm-.75 3a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H8.25a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75H8.25Zm1.748-6a.75.75 0 0 1 .75-.75h.007a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.007a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.007Zm-.75 3a.75.75 0 0 1 .75-.75h.007a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.007a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75h-.007Zm1.754-6a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.008Zm-.75 3a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V18a.75.75 0 0 0-.75-.75h-.008Zm1.748-6a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 1.5a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75h-.008Zm-8.25-6A.75.75 0 0 1 8.25 6h7.5a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75v-.75Zm9 9a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-2.25Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="category-name flex-1 min-w-0 flex flex-col justify-center py-3 px-1">
                    <span class="text-white font-bold tracking-wide text-sm sm:text-base truncate">Mathematics</span>
                    <span class="text-white text-xs opacity-80">50 Questions</span>
                </div>
                <div class="enter-category flex-shrink-0 text-white flex items-center justify-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 transition-transform group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <!-- ENGLISH CATEGORY -->
            <div class="category-type bg-green-600 flex items-center relative group cursor-pointer"
                 @click="startEnglish">
                <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 p-2 flex items-center justify-center">
                    <span class="text-2xl">📚</span>
                </div>
                <div class="category-name flex-1 min-w-0 flex flex-col justify-center py-3 px-1">
                    <span class="text-white font-bold tracking-wide text-sm sm:text-base truncate">English</span>
                    <span class="text-white text-xs opacity-80">50 Questions</span>
                </div>
                <div class="enter-category flex-shrink-0 text-white flex items-center justify-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 transition-transform group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <!-- SCIENCE CATEGORY -->
            <div class="category-type bg-purple-600 flex items-center relative group cursor-pointer"
                @click="startScience">
                <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 p-2 flex items-center justify-center">
                    <span class="text-2xl">🔬</span>
                </div>
                <div class="category-name flex-1 min-w-0 flex flex-col justify-center py-3 px-1">
                    <span class="text-white font-bold tracking-wide text-sm sm:text-base truncate">Science</span>
                    <span class="text-white text-xs opacity-80">50 Questions</span>
                </div>
                <div class="enter-category flex-shrink-0 text-white flex items-center justify-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 transition-transform group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <!-- GENERAL KNOWLEDGE CATEGORY -->
            <div class="category-type bg-red-600 flex items-center relative group cursor-pointer"
                @click="startGK">
                <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 p-2 flex items-center justify-center">
                    <span class="text-2xl">🌐</span>
                </div>
                <div class="category-name flex-1 min-w-0 flex flex-col justify-center py-3 px-1">
                    <span class="text-white font-bold tracking-wide text-sm sm:text-base truncate">General Knowledge</span>
                    <span class="text-white text-xs opacity-80">50 Questions</span>
                </div>
                <div class="enter-category flex-shrink-0 text-white flex items-center justify-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 transition-transform group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <!-- ABSTRACT REASONING CATEGORY -->
            <div class="category-type bg-yellow-500 flex items-center relative group cursor-pointer"
                @click="startAR">
                <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 p-2 flex items-center justify-center">
                    <span class="text-2xl">🧩</span>
                </div>
                <div class="category-name flex-1 min-w-0 flex flex-col justify-center py-3 px-1">
                    <span class="text-white font-bold tracking-wide text-sm sm:text-base truncate">Abstract Reasoning</span>
                    <span class="text-white text-xs opacity-80">50 Questions</span>
                </div>
                <div class="enter-category flex-shrink-0 text-white flex items-center justify-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 transition-transform group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

        </div>
    </div>

    <!-- MATHEMATICS -->
     <form ref="mathForm" :action="props.examUrl" method="POST"  class="hidden">
        <input type="hidden" name="category" value="Mathematics">
     </form>

     <!-- ENGLISH -->
     <form ref="englishForm" :action="props.examUrl" method="POST"  class="hidden">
        <input type="hidden" name="category" value="English">
     </form>

     <!-- SCIENCE -->
     <form ref="scienceForm" :action="props.examUrl" method="POST"  class="hidden">
        <input type="hidden" name="category" value="Science">
     </form>

     <!-- GENERAL KNOWLEDGE -->
     <form ref="GKForm" :action="props.examUrl" method="POST"  class="hidden">
        <input type="hidden" name="category" value="General Knowledge">
     </form>

     <!-- ABSTRACT REASONING -->
     <form ref="ARForm" :action="props.examUrl" method="POST"  class="hidden">
        <input type="hidden" name="category" value="Abstract Reasoning">
     </form>
</template>

<script setup>

import {ref} from 'vue'

const props = defineProps({
    examUrl: String,
    csrfToken: String
})

function addCsrf(form) {
    let input = form.querySelector('input[name="_token"]')

    if (!input) {
        input = document.createElement('input')
        input.type = 'hidden'
        input.name = '_token'
        form.appendChild(input)
    }

    input.value = props.csrfToken
}


// MATHEMATICS
const mathForm = ref(null);
function startMath() {
    addCsrf(mathForm.value)
    mathForm.value.submit()
}


// ENGLISH
const englishForm = ref(null);
function startEnglish(){
    addCsrf(englishForm.value)
    englishForm.value.submit()
}

// SCIENCE
const scienceForm = ref(null);
function startScience(){
    addCsrf(scienceForm.value)
    scienceForm.value.submit()
}

// ENGLISH
const GKForm = ref(null);
function startGK(){
    addCsrf(GKForm.value)
    GKForm.value.submit()
}

// AR
const ARForm = ref(null);
function startAR(){
    addCsrf(ARForm.value)
    ARForm.value.submit()
}

</script>

<style scoped>
.category-type {
    min-height: 65px;
    border-radius: 12px;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
}

.category-type:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
}

.category-type:active {
    transform: translateY(0);
}
</style>