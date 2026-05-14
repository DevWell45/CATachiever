import { createApp } from 'vue'

import Category from './vue/Users/Category.vue';
import Users_Lists from './vue/Admin/Users_Lists.vue';


const app = createApp({});

app.component('category-lists', Category);
app.component('users-lists', Users_Lists);

app.mount('#app')

