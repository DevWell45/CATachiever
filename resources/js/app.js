import { createApp } from 'vue'

import Category from './vue/Category.vue'

const app = createApp({});

app.component('category-lists', Category);

app.mount('#app')